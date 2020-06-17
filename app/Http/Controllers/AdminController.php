<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class AdminController extends Controller
{
    public function index(){
        $users = User::all();
        return view('pages/admin', compact('users'));
    }
}
