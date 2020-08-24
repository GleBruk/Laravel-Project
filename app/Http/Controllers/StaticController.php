<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class StaticController extends Controller
{
    public function index(){
        $title = "Главная страница сайта!";
        return view('static.index')->with('header', $title);//функция начинает путь с папки resources
        // 'header' принимает значения переменной $title
    }

    public function about(){

        $data = array(
            'title' => 'Страничка про нас!',
            'params' => ['BMW', 'Audi', 'Volvo']
        );

        return view('static.about')->with($data);
    }
}
    /*public function index(){
        $title = "Главная страница сайта";
        return view('static.index', compact( 'title'));//функция начинает путь с папки resources
        // параметр data принимает значения переменной title
    }*/

    /*public function about(){

        $data = array(
            'title' => 'Страничка про нас',
            'params' => ['BMW', 'Audi', 'Volvo']
        );

        return view('static.about')->width($data);
    Если применять метод width, то в файле about.blade.php к $data['title'] нужно обратиться через {{$title}}
    }*/
