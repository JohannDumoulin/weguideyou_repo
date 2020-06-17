<?php

namespace App\Http\Controllers;

use App\Repository\ConversationRepository;
use Illuminate\Auth\AuthManager;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ConversationsController extends Controller
{
	private $conversationRepository;

	private $auth;


	public function __construct(ConversationRepository $conversationRepository, AuthManager $auth) {
		$this->conversationRepository = $conversationRepository;
		$this->auth = $auth;
	}

    public function index () {
    	return view('pages/mailbox', [
    		'users' => $this->conversationRepository->getConversations($this->auth->user()->id)
    	]);
    }

    public function show (User $user) {
    	return view('pages/show', [
    		'users' => $this->conversationRepository->getConversations($this->auth->user()->id),
    		'user' => $user,
    		'messages' => $this->conversationRepository->getMessagesFor($this->auth->user()->id, $user->id)->get()->reverse()
    	]);
    }

    public function store (User $user, Request $request) {
    	$this->conversationRepository->createMessage(
    		$request->get('content'),
    		$this->auth->user()->id,
    		$user->id
    	);
    	return redirect(route('conversations.show', ['user' => $user->id]));
    }
}
