<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AdvertCourse extends Model
{
    protected $table = 'advertisement';
    protected $fillable = ['name', 'desc', 'type', 'date_from', 'date_to', 'price_one_h', 'price_two_h', 'price_four_h', 'price_half_day', 'price_day', 'phone_bool'];
}
