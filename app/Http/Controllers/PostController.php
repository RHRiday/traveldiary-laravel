<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateStoryRequest;
use App\Models\User;
use App\Models\Post;
use App\Models\PostPic;
use App\Models\Upazila;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\PotentiallyMissing;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        abort(404);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('story.create')->with([
            'upazilas' => Upazila::pluck('upazila'),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateStoryRequest $request)
    {
        Post::create([
            'user_id' => Auth::id(),
            'title' => $request->title,
            'story' => $request->story,
            'location' => $request->location,
        ]);

        foreach ($request->image as $image){
            $name = $request->location . time() . mt_rand(9,999) . '.' . $image->extension();

            PostPic::create([
                'post_id' => Post::max('id'),
                'path' => $name,
            ]);
            $image->move(public_path('resources/stories'), $name);
        }

        return redirect('/home');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $post = Post::find($id);
        if(!$post){
            abort(404);
        }
        $user = User::find(Auth::id());
        return view('story.show', [
            'post' => $post,
            'notFollowed' => User::whereNotIn('id', $user->following()
                ->pluck('user_id'))
                ->where('role', 'visitor')
                ->inRandomOrder()
                ->limit(3)
                ->get(),
            'user' => $user,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if(!Post::find($id) || Post::find($id)->user->id !== Auth::id()){
            abort(404);
        }
        $upazila = Upazila::pluck('upazila');
        return view('story.edit', [
            'post' => Post::find($id),
            'upazilas' => $upazila,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        if(Post::find($id)->user->id !== Auth::id()){
            abort(404);
        }
        $post = Post::find($id);
        $post->update([
            'title' => $request->title,
            'location' => $request->location,
            'story' => $request->story,
        ]);

        return redirect('/home')->with('message', 'Updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if(Post::find($id)->user->id !== Auth::id()){
            abort(404);
        }
        $post = Post::find($id);
        $post->delete();

        return redirect('/home');
    }
}
