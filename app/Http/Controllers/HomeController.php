<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth')->except(['root']);
    }

    public function root()
    {
        if (Auth::id()) {
            return redirect('/home');
        } else {
            return view('welcome');
        }
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        if (Auth::user()->role === 'admin') {
            return redirect('/admin');
        }
        $user = User::where('id', Auth::id())->first();
        return view('home', [
            'user' => User::where('username', Auth::user()->username)->first(),
            'posts' => Post::whereIn('user_id', $user->following()
                                                    ->pluck('user_id', 'follower_id'))
                                                    ->orderBy('created_at', 'DESC')
                                                    ->get(),
        ]);
    }

    /**
     * Show the user profile.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function profile($username)
    {
        $user = User::where('username', $username)->first();
        // dd(Post::whereIn('user_id', $user->following()->pluck('user_id', 'follower_id'))->orderBy('created_at', 'DESC')->get());
        return view('profile.index', [
            'user' => $user,
        ]);
    }
}
