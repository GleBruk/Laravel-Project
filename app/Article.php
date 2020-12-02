<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    protected $table = 'articles';
    public $primaryKey = 'id';
    public $timestamps = true;

    public function user(){
        // Указываем, что статья будет принадлежать пользователю, который её создал
        return $this->belongsTo('App\User');
    }
}
