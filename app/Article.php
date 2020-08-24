<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    protected $table = 'articles';
    public $primaryKey = 'id';
    public $timestamps = true;

    public function user(){
        return $this->belongsTo('App\User');//запись созданная с помощью Article, также будет
        // принадлежать 1 User
    }
}

//Article::all();//выводит все статьи закреплённые этой моделью(таблица articles)
