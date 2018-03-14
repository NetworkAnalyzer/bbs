<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    // ログインしないと入れないようにする
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(){

        $user  = User::find(Auth::user()->id);
        $posts = $user->posts()->paginate(10);

        return view('user', ['posts' => $posts,'user' => $user]);
    }
}
