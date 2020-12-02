<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    public $timestamps = false;

    public function articles() {
        // Указываем, что комментарий будет принадлежать статье, под которой его написали
        return $this->belongsTo('App\Article');
    }

    public function user(){
        // Указываем, что комментарий будет принадлежать пользователю, который её создал
        return $this->belongsTo('App\User');
    }
}
