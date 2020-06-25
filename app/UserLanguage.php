<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserLanguage extends Model
{
    protected $table = 'user_languages';
    protected $primaryKey = 'user_languages_id';

    public function language()
    {
        return $this->belongsTo('App\Language', 'language_id');
    }
}
