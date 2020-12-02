<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class StaticController extends Controller
{
    public function index(){
        $title = "Главная страница сайта!";
        // Вызываем шаблон главной страницы передаём данные
        return view('static.index')->with('header', $title);
    }

    public function about(){

        // Устанавливаем данные
        $data = array(
            'title' => 'Страничка про нас!',
        );

        // Вызываем шаблон страницы "О нас" и передаём данные
        return view('static.about')->with($data);
    }
}
