<?php

namespace App\Http\Controllers;

use App\Advertisement;
use Illuminate\Http\Request;
use App\User;

class AdminController extends Controller
{
    public function index(){
        $users = User::all();
        $ads = Advertisement::all();
        return view('pages/admin', compact('users', 'ads'));
    }
}
