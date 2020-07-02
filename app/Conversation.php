<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Conversation extends Model
{
    protected $table = 'conversations';
    
    protected $fillable = [
    	'ad_id', 'from_id', 'to_id', 'read_at', 'created_at'
    ];
}
