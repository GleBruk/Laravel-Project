<?php


    namespace App\Http\Controllers;


    class BlogController extends Controller {
        public function blog(){
            // Устанавливаем данные
            $data = array(
                'title' => 'Blog',
                'posts' => array(
                    'post_1' => [
                        'post_title' => 'Запись на сайте',
                        'post_content' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit.'
                        ],
                    'post_2' => [
                        'post_title' => 'Запись на сайте',
                        'post_content' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit.'
                        ],
                    'post_3' => [
                        'post_title' => 'Запись на сайте',
                        'post_content' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit.'
                        ],
                    'post_4' => [
                        'post_title' => 'Запись на сайте',
                        'post_content' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit.'
                    ]));

            // Вызываем шаблон страницы блога и передаём данные
            return view('static.blog')->with($data);
        }
    }
