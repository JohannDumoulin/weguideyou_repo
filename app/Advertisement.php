<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Advertisement extends Model
{
    protected $table = 'advertisement';
    protected $fillable = [
    	'name',
    	'desc',
    	'type',
    	'place',
    	'date_from',
    	'date_to',
    	'price_one_h',
    	'price_two_h',
    	'price_half_day',
    	'price_day',
    	'phone_bool',
    	'premium_in_front_week',
    	'premium_in_front_month',
    	'premium_banner_week',
    	'premium_banner_month',
    	'premium_urgent_week',
    	'premium_urgent_month',
    	'premium_booking',
    	'premium_securing',
    	'premium_insurance',
    ];
}
