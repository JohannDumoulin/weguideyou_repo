<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserSector extends Model
{
    protected $table = 'user_sectors';
    protected $primaryKey = 'user_sector_id';
    protected $fillable = ['sector_id', 'user_id'];

    public function language()
    {
        return $this->belongsTo('App\Sectors', 'id');
    }
}
