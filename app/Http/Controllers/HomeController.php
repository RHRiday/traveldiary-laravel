<?php

namespace App\Http\Controllers;

use App\Models\Package;
use App\Models\Post;
use App\Models\Upazila;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Place;
use Illuminate\Support\Facades\Hash;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth')->except(['root', 'search']);
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
    public function show($username)
    {
        $auth = User::where('id', Auth::id())->first();
        $user = User::where('username', $username)->first();

        if (!$user) {
            abort(404);
        }
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
     * Show profile edit page
     * 
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function edit()
    {
        $user = User::find(Auth::id());

        return view('profile.edit', [
            'user' => $user,
            'notFollowed' => User::whereNotIn('id', $user->following()
                ->pluck('user_id'))
                ->where('role', 'visitor')
                ->inRandomOrder()
                ->limit(3)
                ->get(),
            'upazilas' => Upazila::pluck('upazila'),
        ]);
    }

    /**
     * Handles profile edit request
     * 
     * @returns changes
     */
    public function update(Request $request)
    {
        $user = User::find(Auth::id());

        if ($request->dp) {
            $dp = Auth::user()->username . '.' . $request->dp->getClientOriginalExtension();
            $request->dp->move(public_path('resources/profile'), $dp);
        } else {
            $dp = $user->dp;
        }

        if ($request->cp) {
            $cp = Auth::user()->username . '.' . $request->cp->getClientOriginalExtension();
            $request->cp->move(public_path('resources/cover'), $cp);
        } else {
            $cp = $user->cover;
        }

        if ($request->password) {
            $user->update([
                'password' => Hash::make($request->password),
            ]);
        }

        $user->update([
            'name' => $request->name,
            'location' => $request->location,
            'dp' => $dp,
            'cover' => $cp,

        ]);

        return redirect('/profile/' . $user->username);
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

    /**
     * Handle search query
     * Returs users only
     * 
     * @returns response
     */
    public function search(Request $request)
    {
        $users = User::where('name', 'LIKE', '%' . $request->key . '%')
            ->orWhere('username', 'LIKE', $request->key . '%');
        $places = Place::where('name', 'LIKE', '%' . $request->key . '%')
            ->orWhere('location', 'LIKE', '%' . $request->key . '%');
        $packages = Package::where('title', 'LIKE', '%' . $request->key . '%')
            ->orWhere('location', 'LIKE', '%' . $request->key . '%');
            
        if ($request->price) {
            $places = $places->where('budget', '<=', $request->price);
            $packages = $packages->where('price', '<=', $request->price);
        }
        if ($request->type) {
            $places = $places->where('type', $request->type);
            $packages = $packages->where('location_type', $request->type);
        }


        return view('search', [
            'users' => $users->get(),
            'places' => $places->get(),
            'packages' => $packages->get(),
        ]);
    }
}
