<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserLanguages extends Model
{
    protected $table = 'user_languages';
    protected $primaryKey = 'user_languages_id';

    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
