<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Session;

class Users extends Model
{
    public function scopeConnected($query){
        /*$values = Session::get('laravel_session');
        dd($values);*/
        //return $query->where('id', 9);
    }
}
