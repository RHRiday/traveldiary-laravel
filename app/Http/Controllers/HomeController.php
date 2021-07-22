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
        if (!User::where('id', Auth::id())->first()->following()->where('user_id', Auth::id())->exists()) {
            User::where('id', Auth::id())->first()->following()->attach(Auth::id());
        } //if it is his 1st time, he will follow himself

        return view('home', [
            'user' => $user,
            'posts' => Post::whereIn('user_id', $user->following()
                ->pluck('user_id'))
                ->orderBy('created_at', 'DESC')
                ->get(),
            'notFollowed' => User::whereNotIn('id', $user->following()
                ->pluck('user_id'))
                ->where('role', 'visitor')
                ->inRandomOrder()
                ->limit(3)
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
        $auth = User::where('id', Auth::id())->first();
        $user = User::where('username', $username)->first();
        // dd($user->following()->where('user_id', '<>', $user->id)->get());
        // dd(Post::whereIn('user_id', $user->following()->pluck('user_id', 'follower_id'))->orderBy('created_at', 'DESC')->get());
        return view('profile.index', [
            'user' => $user,
            'followings' => $user->following()->where('user_id', '<>', $user->id)->get(),
            'followers' => $user->followers()->where('follower_id', '<>', $user->id)->get(),
            'notFollowed' => User::whereNotIn('id', $auth->following()
                ->pluck('user_id'))
                ->where('role', 'visitor')
                ->inRandomOrder()
                ->limit(3)
                ->get(),
        ]);
    }

    /**
     * Handle following requests
     * This user will follow given user
     * 
     * @returns response
     */
    public function followRequest($id)
    {
        if (!User::where('id', Auth::id())->first()->following()->where('user_id', $id)->exists()) {
            User::where('id', Auth::id())->first()->following()->attach($id);
        } else {
            User::where('id', Auth::id())->first()->following()->detach($id);
        }

        return redirect()->back();
    }

}
