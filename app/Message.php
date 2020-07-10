<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
	protected $table = 'messages';

    protected $fillable = [
    	'content', 'from_id', 'to_id', 'conv_id', 'read_at', 'created_at', 'conversation_id'
    ];

    protected $dates = ['created_at', 'read_at'];

    public $timestamps = false; 

    public function from () {
    	return $this->belongsTo(User::class, 'from_id');
    }
}
