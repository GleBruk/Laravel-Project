<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // При обращении к методам UserController, выводится страница авторизации
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        // Получаем id авторизованного пользователя
        $user_id = auth()->user()->id;
        // Берём статьи пользователя из БД по полученному id пользователя
        $user = User::find($user_id);
        // Вызываем шаблон личного кабинета пользователя и передаём данные
        return view('user')->with('articles', $user->articles);
    }
}
