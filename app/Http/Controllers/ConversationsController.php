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

        $user_conversations = DB::table('users')
            ->join('conversations', function ($join) {
                $join->on('conversations.to_id', '=', 'users.id')->orOn('conversations.from_id', '=', 'users.id');
            })
            ->select('conversations.*')
            ->where('conversations.from_id', '=', Auth::User()->id)
            ->orWhere('conversations.to_id', '=', Auth::User()->id)
            ->get();

        if(count($user_conversations) == 0)
            return view("pages/show");
        else
            return redirect(route('conversations.show', [
                'conversation' => $user_conversations->first()->id
            ]));

    }

    public function show (Conversation $conversation) {

    	$me = $this->auth->user();

        $messages = $this->conversationRepository->getMessagesFor($conversation->from_id, $conversation->to_id, $conversation->id)->paginate(50);

    	$unread = $this->conversationRepository->unreadCount($me->id);
    	if (isset($unread[$conversation->to_id])) {
    		$this->conversationRepository->readAllFrom($conversation->to_id, $me->id);
    		unset($unread[$conversation->to_id]);
    	}

        $conversations = $this->conversationRepository->getConversations($me->id);
        $conversation = $this->conversationRepository->getOneConversation($conversation->ad_id);

        // défine value to
        $id_pers[0] = $conversation[0]->from_id;
        $id_pers[1] = $conversation[0]->to_id;
        $id_pers = array_diff($id_pers, (array) $me->id);
        $conversation[0]->to = array_values((array) $id_pers);
        // definie value from
        $conversation[0]->from_user_name = User::findOrFail($conversation[0]->to)[0]->name;

    	return view('pages/show', [
    		'users' => $this->conversationRepository->getConversations($me->id),
    		'messages' => $messages,
            'last_message' => DB::table('messages')->where('messages.conversation_id','=', $conversation[0]->conv_id)->orderBy('created_at', 'desc')->first(),
    		'unread' => $unread,
            'conversations' => $conversations,
            'conversation' => $conversation
    	]);
    }

    public function store(StoreMessageRequest $request, Conversation $conversation) {

        $me = $this->auth->user();

        $this->conversationRepository->createMessage(
            $request->get('content'),
            $me->id,
            $request->get('to'),
            $request->get('conv_id')
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
                $request->get('to'),
                $ad->id,
                $this->conversationRepository->getConversations($me->id)
             );

        if ($r === true) {
           $this->conversationRepository->createMessage(
                $request->get('content'),
                $me->id,
                $request->get('to'),
                $ad->id              
            );

        }else {
            $conv = $this->conversationRepository->createConversation(
                $me->id,
                $user->id,
                $ad->id
             );

            $this->conversationRepository->createMessage(
                $request->get('content'),
                $me->id,
                $request->get('to'),
                $conv->id
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

        return view('pages/new_message', compact('NewMessageForm', 'user', 'ad'));
    }
}
