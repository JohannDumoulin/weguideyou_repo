<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ConversationsController extends Controller
{
    public function index () {
    	$users = User::select('name', 'id')->where('id','!=', Auth::user()->id)->get();
    	return view('pages/mailbox', compact('users'));
    }

    public function show (int $id) {

    }
}
