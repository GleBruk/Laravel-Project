<?php

namespace App\Http\Controllers;

use App\Article;
use App\Comment;
use Composer\Downloader\PathDownloader;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class ArticlesController extends Controller
{

    public function __construct()
    {
        // При обращении к методам Articles, выводится страница авторизации, кроме методов
        // index и show
        $this->middleware('auth', ['except' => ['index', 'show']]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // Берём статьи из БД и вызываем пагинацию
        $articles = Article::orderBy('created_at', 'desc')->paginate(1);
        //Вызываем шаблон страницы со всеми статьями и пагинацией
        return view('articles.index')->with('articles', $articles);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // Вызываем шаблон для создания статьи
        return view('articles.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Если из формы передаётся id статьи, то происходит добавление комментария
        if($request->input('article_id') > 0) {
            // Делаем новый объект
            $comment = new Comment();
            // Устанавливаем id пользователя
            $comment->user_id = auth()->user()->id;
            // Устанавливаем id статьи
            $comment->article_id = $request->input('article_id');
            // Устанавливаем текст комментария
            $comment->text = $request->input('text');
            // Добавляем в БД
            $comment->save();
            // Переадресовываем на страницу статьи и выводим сообщение
            return redirect('/articles/'.$request->input('article_id'))->with('success',
                'Комментарий добавлен');
        }

        // Проводим валидацию
        $this->validate($request, [
            'title' => 'required|max:190',
            'text' => 'required|min:20',
            'main_image' => 'nullable|image|max:1999'//позволяет полю быть либо пустым либо
            // картинкой
        ]);

        // Если из формы передаётся изображение, то добавляем её в БД
        if($request->hasFile('main_image')){
            // Получаем название изображения
            $file = $request->file('main_image')->getClientOriginalName();

            // Получаем название изображения без расширения
            $image_name_without_ext = pathinfo($file, PATHINFO_FILENAME);

            // Получаем расширение изображения
            $ext = $request->file('main_image')->getClientOriginalExtension();

            // Делаем новое название изображения добавляя текущее время
            $image_name = $image_name_without_ext."_".time().".".$ext;
            // Сохраняем изображение с новым названием
            $path = $request->file('main_image')->storeAs('public/images', $image_name);
        } else
            $image_name = 'noimage.jpg';

        // Создаём новую статью
        $article = new Article();
        // Устанавливаем заголовок статьи
        $article->title = $request->input('title');
        // Устанавливаем текст статьи
        $article->text = $request->input('text');
        // Устанавливаем id пользователя
        $article->user_id = auth()->user()->id;
        // Устанавливаем изображение
        $article->image = $image_name;
        // Добавляем в БД
        $article->save();

        // Переадресовываем на страницу со всеми статьями  и выводим сообщение
        return redirect('/articles')->with('success', 'Статья была добавлена');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // Берём данные статьи из БД по id из аргумента
        $article = Article::find($id);

        // Берём комментарии из БД по id статьи
        $comments = Comment::where('article_id', $id)->get();
        // Устанавливаем данные
        $data = ['article' => $article, 'comments' => $comments];
        // Вызываем шаблон для просмотра статьи и передаём данные
        return view('articles.show')->with('data', $data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        // Берём данные статьи из БД по id из аргумента
        $article = Article::find($id);

        // Если пользователь хочет отредактировать не свою статью, то выводится ошибка
        if(auth()->user()->id != $article->user_id)
            return redirect('/articles')->with('error', 'Это не ваша статья');

        // Вызываем шаблон для редактирования статьи и передаём данные
        return view('articles.edit')->with('article', $article);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        // Проводим валидацию
        $this->validate($request, [
            'title' => 'required|max:190',
            'text' => 'required|min:20',
        ]);

        // Если передаются данные нового изображения, то обновляем его
        if($request->hasFile('main_image')){
            // Получаем название изображения
            $file = $request->file('main_image')->getClientOriginalName();

            // Получаем название изображения без расширения
            $image_name_without_ext = pathinfo($file, PATHINFO_FILENAME);

            // Получаем расширение изображения
            $ext = $request->file('main_image')->getClientOriginalExtension();

            // Делаем новое название изображения добавляя текущее время
            $image_name = $image_name_without_ext."_".time().".".$ext;
            // Сохраняем новое изображение
            $path = $request->file('main_image')->storeAs('public/images',
                $image_name);

        }

        // Берём данные статьи из БД по id статьи из аргумента
        $article = Article::find($id);
        // Устанавливаем новый заголовок статьи
        $article->title = $request->input('title');
        // Устанавливаем новй текст статьи
        $article->text = $request->input('text');

        // Если пользователь изменил фотографию и название старой фотографии не noimage.jpg, то
        // тогда удаляем старую фотографию
        if($request->hasFile('main_image')) {
            if($article->image != "noimage.jpg")
                Storage::delete('public/images/'.$article->image);

            // Устанавливаем новую фотографию
            $article->image = $image_name;
        }

        // Сохраняем статью
        $article->save();

        // Переадресовываем на страницу со всеми статьями и выводим сообщение
        return redirect('/articles')->with('success', 'Статья была обновлена');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // Берём данные статьи из БД по id статьи из аргумента
        $article = Article::find($id);

        // Если пользователь хочет удалить не свою статью, то выводим ошибку
        if(auth()->user()->id != $article->user_id)
            return redirect('/articles')->with('error', 'Это не ваша статья');

        // Если название изображения статьи не noimage.jpg, то удаляем изображение
        if($article->image != "noimage.jpg")
            Storage::delete('public/images/'.$article->image);

        // Удаляем статью
        $article->delete();
        // Переадресовываем на страницу со всеми статьями и выводим сообщение
        return redirect('/articles')->with('success', 'Статья была удалена');
    }
}
