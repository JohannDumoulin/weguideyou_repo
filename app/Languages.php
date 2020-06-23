<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Languages extends Model
{
    protected $table = "languages";
    protected $primaryKey = "language_id";

    public function user()
    {
        return $this->belongsTo('App\UserLanguages');
    }
}
