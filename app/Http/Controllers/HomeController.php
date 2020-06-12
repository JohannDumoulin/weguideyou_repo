<?php

namespace App\Http\Controllers;

use App\Users;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        return view('pages/home', ['user'=>$user]);
    }
}
