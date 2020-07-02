<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sectors extends Model
{
    protected $table = "sectors";
    protected $primaryKey = "id";
    protected $fillable = ['sector_name','sector_type'];
}
