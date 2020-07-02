<?php

namespace App\Http\Controllers;

use App\Repository\ConversationRepository;
use Illuminate\Auth\AuthManager;
use App\User;
use App\Advertisement;
use App\Conversation;
use App\Notifications\MessageReceived;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\StoreMessageRequest;
use Kris\LaravelFormBuilder\FormBuilder;

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
        return redirect(route('conversations.show', ['conversation' => 1]));
    }

    public function show (Conversation $conversation) {
    	$me = $this->auth->user();
    	$messages = $this->conversationRepository->getMessagesFor($me->id, $conversation->to_id)->paginate(50);
    	$unread = $this->conversationRepository->unreadCount($me->id);
    	if (isset($unread[$conversation->to_id])) {
    		$this->conversationRepository->readAllFrom($conversation->to_id, $me->id);
    		unset($unread[$conversation->to_id]);
    	}

    	return view('pages/show', [
    		'users' => $this->conversationRepository->getConversations($me->id),
    		'messages' => $messages,
    		'unread' => $unread,
            'conversations' => $this->conversationRepository->getConversations($me->id),
            'conversation' => $this->conversationRepository->getOneConversation($me->id, $conversation->to_id, $conversation->ad_id)->first()
    	]);
    }

    public function store (User $user, StoreMessageRequest $request, Advertisement $ad) {
        $r = $this->conversationRepository->checkIfConversationExist(
                $this->auth->user()->id,
                $user->id,
                $ad->id,
                $this->conversationRepository->getConversations($this->auth->user()->id)
             );

        if ($r === true) {
           $this->conversationRepository->createMessage(
                $request->get('content'),
                $this->auth->user()->id,
                $user->id,
                $this->conversationRepository->getOneConversation($this->auth->user()->id, $user->id, $ad->id)                
            );
        }else {
            $this->conversationRepository->createConversation(
                $this->auth->user()->id,
                $user->id,
                $ad->id
             );

            $this->conversationRepository->createMessage(
                $request->get('content'),
                $this->auth->user()->id,
                $user->id,
                $this->conversationRepository->getOneConversation($this->auth->user()->id, $user->id, $ad->id)
             );
        }
    	

    	/*
			Send Mail : Bug

			$user->notify(new MessageReceived($message));
    	*/
    	

    	return redirect(route('conversations.show', ['user' => $user->id, 'ad' => $ad]));
    }

    public function newMessage (FormBuilder $formBuilder, User $user, Advertisement $ad) {
        $NewMessageForm = $formBuilder->create(\App\Forms\NewMessage::class, [
            'method' => 'POST',
        ]);

        return view('pages/new_message', compact('NewMessageForm', 'user', 'ad'));
    }

    public function test () {
        return view('pages/home');
    }
}
