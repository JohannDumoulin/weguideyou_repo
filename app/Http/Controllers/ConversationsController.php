<?php

namespace App\Http\Controllers;

use App\Repository\ConversationRepository;
use Illuminate\Auth\AuthManager;
use App\User;
use App\Notifications\MessageReceived;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\StoreMessageRequest;

class ConversationsController extends Controller
{
	private $conversationRepository;

	private $auth;


	public function __construct(ConversationRepository $conversationRepository, AuthManager $auth) {
		$this->middleware('auth');
		$this->conversationRepository = $conversationRepository;
		$this->auth = $auth;
	}

    public function index () {
    	// return view('pages/mailbox', [
    	// 	'users' => $this->conversationRepository->getConversations($this->auth->user()->id),
    	// 	'unread' => $this->conversationRepository->unreadCount($this->auth->user()->id)
    	// ]);
        return redirect(route('conversations.show', ['user' => 2]));
    }

    public function show (User $user) {
    	$me = $this->auth->user();
    	$messages = $this->conversationRepository->getMessagesFor($me->id, $user->id)->paginate(50);
    	$unread = $this->conversationRepository->unreadCount($me->id);
    	if (isset($unread[$user->id])) {
    		$this->conversationRepository->readAllFrom($user->id, $me->id);
    		unset($unread[$user->id]);
    	}

    	return view('pages/show', [
    		'users' => $this->conversationRepository->getConversations($this->auth->user()->id),
    		'user' => $user,
    		'messages' => $messages,
    		'unread' => $unread
    	]);
    }

    public function store (User $user, StoreMessageRequest $request) {
    	$this->conversationRepository->createMessage(
    		$request->get('content'),
    		$this->auth->user()->id,
    		$user->id
    	);

    	/*
			Send Mail : Bug

			$user->notify(new MessageReceived($message));
    	*/
    	

    	return redirect(route('conversations.show', ['user' => $user->id]));
    }
}
