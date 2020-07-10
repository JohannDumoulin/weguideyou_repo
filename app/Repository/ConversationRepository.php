<?php

namespace App\Repository;

use App\User;
use App\Message;
use App\Conversation;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

/**
 * 
 */
class ConversationRepository {

	private $user;

	private $message;

	private $conversation;

	public function __construct(User $user, Message $message, Conversation $conversation) {
		$this->user = $user;
		$this->message = $message;
		$this->conversation = $conversation;
	}
	
	public function getConversations (int $userId) {
		$conversations = DB::table('conversations')

			->join('users', function ($join) {
			    $join->on('conversations.to_id', '=', 'users.id')->orOn('conversations.from_id', '=', 'users.id');
			})
			->join('advertisement', function ($join) {
			    $join->on('conversations.ad_id', '=', 'advertisement.id')->orOn('conversations.from_id', '=', 'advertisement.id');
			})

            ->where('conversations.from_id', '=', Auth::User()->id)
            ->orWhere('conversations.to_id', '=', Auth::User()->id)

			->select('conversations.id as conv_id', 
				'conversations.from_id as from_id',
				'conversations.to_id as to_id',
				'advertisement.id as ad_id',
				'advertisement.name as ad_name',
				'advertisement.user_name as ad_user_name',
				'advertisement.price_one_h as ad_price',
				'advertisement.salaire as ad_salaire',
			)

			->distinct()
		    ->get();
		return $conversations;
	}

	public function getOneConversation (int $ad_id) {

		$conversation = DB::table('conversations')

			->join('users', function ($join) {
			    $join->on('conversations.to_id', '=', 'users.id')->orOn('conversations.from_id', '=', 'users.id');
			})
			->join('advertisement', function ($join) {
			    $join->on('conversations.ad_id', '=', 'advertisement.id')->orOn('conversations.from_id', '=', 'advertisement.id');
			})

			->Where('advertisement.id', '=', $ad_id)

			->select('conversations.id as conv_id', 
				'conversations.from_id as from_id',
				'conversations.to_id as to_id',
				'advertisement.id as ad_id',
				'advertisement.name as ad_name',
				'advertisement.user_name as ad_user_name',
				'advertisement.price_one_h as ad_price',
				'advertisement.salaire as ad_salaire',
			)

			->distinct()
		    ->get();

		return $conversation;
	}

	public function createMessage (string $content, int $from, int $to, int $conv_id) {
		return $this->message->newQuery()->create([
			'content' => $content,
			'from_id' => $from,
			'to_id' => $to,
			'conversation_id' => $conv_id,
			'created_at' => Carbon::now('UTC')
		]);
	}

	public function createConversation (int $from, int $to, int $ad) {
		return $this->conversation->newQuery()->create([
			'ad_id' => $ad,
			'from_id' => $from,
			'to_id' => $to,
			'created_at' => Carbon::now('UTC')
		]);


	}

	public function checkIfConversationExist (int $from, int $to, int $ad, $conversations) {
		$r = false;
		// $conversations = json_decode($conversations);
		$conversations = $conversations->first();

		if ($conversations != null) {
			foreach ($conversations as $conversation) {
				if ($conversations->ad_id === $ad && $conversations->from_id === $from && $conversations->to_id === $to) {
					$r = true;
				}
			}

			if ($r === true) {
				return true;
			}else {
				return false;
			}
		}else {
			return false;
		}
	}

	public function getMessagesFor (int $from, int $to, int $conv): Builder {
		return $this->message->newQuery()
			->whereRaw("((from_id = $from AND to_id = $to AND conversation_id = $conv) OR (from_id = $to AND to_id = $from AND conversation_id = $conv))")
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