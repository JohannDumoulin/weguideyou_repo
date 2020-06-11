<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Register extends Model
{
    protected $table = 'users';

    protected $fillable = [
        'name_user',
        'surname_user',
        'email_user',
        'password',
        'gender_user',
        'birth_user',
        'address_user',
        'city_user',
        'pc_user',
        'phone_user',
        'pic_user',
        'status_user',
        'license_user',
        'urssaf_user',
    ];
}
