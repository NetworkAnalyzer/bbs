<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function index(){

        $user  = User::find(Auth::user()->id);
        $posts = $user->posts()->paginate(10);

        return view('user', ['posts' => $posts,'user' => $user]);
    }
}
