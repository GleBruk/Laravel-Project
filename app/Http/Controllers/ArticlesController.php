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
        $this->middleware('auth', ['except' => ['index', 'show']]);//требует
        // авторизации при обращении к моделям Articles кроме index и show
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //$articles = Article::all();
        //$articles = Article::orderBy('created-at', 'asc')->get();
       // $articles = Article::where('title', 'First article')->get();
       //$articles = DB::select('SELECT * FROM `articles`');
        //$articles = Article::orderBy('created_at', 'desc')->take(2)->get();
        $articles = Article::orderBy('created_at', 'desc')->paginate(1);//позволяет переключать статьи
        // в index.blade.php
        return view('articles.index')->with('articles', $articles);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()//вызывает шаблон, с помощью которого создаётся статья
    {
        return view('articles.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)//функция сохраняет новую запись в базе данных
    {
        if($request->input('article_id') > 0) {
            // Идет добавление комментария, поэтому работаем как с комментарием
            $comment = new Comment();
            $comment->article_id = $request->input('article_id');
            $comment->text = $request->input('text');
            $comment->save();
            return redirect('/articles/'.$request->input('article_id'))->with('success', 'Комментарий добавлен');
        }

        $this->validate($request, [//функция проверяет значения из формы
            'title' => 'required|max:190',// 190 - максимальное значение, которое можно добавить в title
            'text' => 'required|min:20',//конкретные значения, которая должна проверить функция
            'main_image' => 'nullable|image|max:1999'//позволяет полю быть либо пустым либо картинкой
        ]);

        if($request->hasFile('main_image')){
            $file = $request->file('main_image')->getClientOriginalName();

            $image_name_without_ext = pathinfo($file, PATHINFO_FILENAME);

            $ext= $request->file('main_image')->getClientOriginalExtension();

            $image_name = $image_name_without_ext."_".time().".".$ext;
            $path = $request->file('main_image')->storeAs('public/images', $image_name);

        } else
            $image_name = 'noimage.jpg';

        $article = new Article();
        $article->title = $request->input('title');
        $article->text = $request->input('text');
        $article->user_id = auth()->user()->id;//user_id равен id авторизованного пользователя
        $article->image = $image_name;
        $article->save();

        return redirect('/articles')->with('success', 'Статья была добавлена');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)//отображает определённую статью по ID
    {
        $article = Article::find($id);

        $comments = Comment::where('article_id', $id)->get();
        $data = ['article' => $article, 'comments' => $comments];
        return view('articles.show')->with('data', $data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)//позволяет редактировать статью
    {
        $article = Article::find($id);

        if(auth()->user()->id != $article->user_id)
            return redirect('/articles')->with('error', 'Это не ваша статья');

        return view('articles.edit')->with('article', $article);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)//принимает запрос и ID статьи и обновляет саму статью
    {
        $this->validate($request, [
            'title' => 'required|max:190',
            'text' => 'required|min:20',
        ]);

        if($request->hasFile('main_image')){
            $file = $request->file('main_image')->getClientOriginalName();

            $image_name_without_ext = pathinfo($file, PATHINFO_FILENAME);

            $ext= $request->file('main_image')->getClientOriginalExtension();

            $image_name = $image_name_without_ext."_".time().".".$ext;
            $path = $request->file('main_image')->storeAs('public/images', $image_name);

        }

        $article = Article::find($id);
        $article->title = $request->input('title');
        $article->text = $request->input('text');

        if($request->hasFile('main_image')) {
            if($article->image != "moimage.jpg")
                Storage::delete('public/images/'.$article->image);

            $article->image = $image_name;
        }

        $article->save();

        return redirect('/articles')->with('success', 'Статья была обновлена');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)//удаляет статью
    {
        $article = Article::find($id);

        if(auth()->user()->id != $article->user_id)
            return redirect('/articles')->with('error', 'Это не ваша статья');

        if($article->image != "moimage.jpg")
            Storage::delete('public/images/'.$article->image);

        $article->delete();
        return redirect('/articles')->with('success', 'Статья была удалена');
    }
}
