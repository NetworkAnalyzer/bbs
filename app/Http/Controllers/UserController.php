<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function index(){

        $user  = User::find(Auth::user()->id);
        $posts = $user->posts()->paginate(10);

        // posts == posts()->get()

        //dd($posts);

        return view('user', ['posts' => $posts,'user' => $user]);
    }
}
