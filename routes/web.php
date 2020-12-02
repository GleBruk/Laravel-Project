<?php

Route::get('/', 'StaticController@index');//вызываем функцию index у контроллера StaticController

Route::get('/about us', 'StaticController@about');

Route::get('/article/{id}/{second_param}', function($id, $second_param){
    return 'ID статьи: '.$id . '. Второй параметр: ' . $second_param;
});

Route::get('/blog', 'BlogController@blog');

Route::resource('articles', 'ArticlesController');

Route::resource('shop', 'ShopController');


Auth::routes();

Route::get('/user', 'UserController@index');
