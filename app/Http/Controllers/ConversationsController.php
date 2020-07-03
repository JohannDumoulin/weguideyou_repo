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
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\DB;

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
        return redirect(route('conversations.show', ['conversation' => 1]));
    }

    public function show (Conversation $conversation) {
    	$me = $this->auth->user();
        if ($me->id === $conversation->to_id) {
            $messages = $this->conversationRepository->getMessagesFor($me->id, $conversation->from_id)->paginate(50);
        }else {
            $messages = $this->conversationRepository->getMessagesFor($me->id, $conversation->to_id)->paginate(50);
        }
    	$unread = $this->conversationRepository->unreadCount($me->id);
    	if (isset($unread[$conversation->to_id])) {
    		$this->conversationRepository->readAllFrom($conversation->to_id, $me->id);
    		unset($unread[$conversation->to_id]);
    	}

    	return view('pages/show', [
    		'users' => $this->conversationRepository->getConversations($me->id),
    		'messages' => $messages,
            'last_message' => DB::table('messages')->where('messages.conversation_id','=', $conversation->id)->orderBy('created_at', 'desc')->first(),
    		'unread' => $unread,
            'conversations' => $this->conversationRepository->getConversations($me->id),
            'conversation' => $this->conversationRepository->getOneConversation($me->id, $conversation->ad_id)->first()
    	]);
    }

        public function store (StoreMessageRequest $request, Conversation $conversation) {
            $me = $this->auth->user();

            $this->conversationRepository->createMessage(
                $request->get('content'),
                $me->id,
                $conversation->to_id,
                $this->conversationRepository->getOneConversation($me->id, $conversation->ad_id)
             );

            /*
                Send Mail : Bug

                $user->notify(new MessageReceived($message));
            */
            

            return redirect(route('conversations.show', ['conversation' => $conversation->id]));
        }

    public function storeNewMessage (User $user, StoreMessageRequest $request, Advertisement $ad) {
        $me = $this->auth->user();

        $r = $this->conversationRepository->checkIfConversationExist(
                $me->id,
                $user->id,
                $ad->id,
                $this->conversationRepository->getConversations($me->id)
             );

        if ($r === true) {
           $this->conversationRepository->createMessage(
                $request->get('content'),
                $me->id,
                $user->id,
                $this->conversationRepository->getOneConversation($me->id, $ad->id)                
            );
        }else {
            $this->conversationRepository->createConversation(
                $me->id,
                $user->id,
                $ad->id
             );

            $this->conversationRepository->createMessage(
                $request->get('content'),
                $this->auth->user()->id,
                $user->id,
                $this->conversationRepository->getOneConversation($me->id, $ad->id)
             );
        }
    	

    	/*
			Send Mail : Bug

			$user->notify(new MessageReceived($message));
    	*/
    	

    	return redirect(route('conversations'));
    }

    public function newMessage (FormBuilder $formBuilder, User $user, Advertisement $ad) {
        $NewMessageForm = $formBuilder->create(\App\Forms\NewMessage::class, [
            'method' => 'POST',
        ]);

        if ($user->id === $ad->user_id) {
           return view('pages/new_message', compact('NewMessageForm', 'user', 'ad'));
        }else {
            return view('pages/home');
        }
    }

    public function test () {
        return view('pages/home');
    }
}
