<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\User;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(User $user) {
        $users = User::all()->random(4);

        return view('home', compact('users'));
    }

    public function index2(User $user) {
        $users = User::all()->random(4);

        return view('home', compact('users'));
    }

    public function showprofile($username) {
        $user = User::where('username', $username)
        ->FirstOrFail();

        return view('profile')
        ->with('user', $user);
    }
}
