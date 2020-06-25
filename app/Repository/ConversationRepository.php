<?php

namespace App\Repository;

use App\User;
use App\Message;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\DB;

/**
 * 
 */
class ConversationRepository {

	private $user;

	private $message;

	public function __construct(User $user, Message $message) {
		$this->user = $user;
		$this->message = $message;
	}
	
	public function getConversations (int $userId) {
		$conversations = DB::table('users')
		    ->join('messages', function ($join) {
	            $join->on('users.id', '=', 'messages.to_id')->orOn('users.id', '=', 'messages.from_id');
	        })
		    ->select('users.name', 'users.id')
		    ->where('users.id','!=', $userId)
		    ->get();
		return $conversations;
	}

	public function createMessage (string $content, int $from, int $to) {
		return $this->message->newQuery()->create([
			'content' => $content,
			'from_id' => $from,
			'to_id' => $to,
			'created_at' => Carbon::now()
		]);
	}

	public function getMessagesFor (int $from, int $to): Builder {
		return $this->message->newQuery()
			->whereRaw("((from_id = $from AND to_id = $to) OR (from_id = $to AND to_id = $from))")
			->orderBy('created_at', 'DESC')
			->with([
				'from' => function ($query) { return $query->select('name', 'id'); }
			]);
	}



	/*
		Récupère le nombre de messages non lus pour chaques conversation
	*/
	public function unreadCount (int $userId) {
		return $this->message->newQuery()
			->where('to_id', $userId)
			->groupBy('from_id')
			->selectRaw('from_id, COUNT(id) as count')
			->whereRaw('read_at IS NULL')
			->get()
			->pluck('count', 'from_id');
	}

	/*
		Marque tous les messages de cet utilisateur comme lu
	*/
	public function readAllFrom (int $from, int $to) {
		$this->message->where('from_id', $from)->where('to_id', $to)->update(['read_at' => Carbon::now()]);
	}
}