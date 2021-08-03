<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Place;
use Illuminate\Support\Facades\Auth;
use App\Models\Rating;
use App\Models\Post;
use App\Models\Package;
use App\Models\User;

class PlaceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('place.index');
    }

    public function show(Place $id)
    {
        $alreadyRated = false ;

        foreach($id->ratings as $rating) {
            if($rating->user_id == Auth::id() && $rating->place_id == $id->id) {
                $alreadyRated = true ;
            }
        }

        $relatedPackage = Package::where('location', $id->location)
                ->inRandomOrder()
                ->limit(3)
                ->get();

        $relatedPost = Post::where('location', $id->location)
                ->inRandomOrder()
                ->limit(3)
                ->get();

        return view('place.show', [
            'place' => $id,
            'alreadyRated' => $alreadyRated,
            'relatedPost' => $relatedPost,
            'relatedPackage' => $relatedPackage,
        ]);
    }

    public function saveRating(Request $request, $place_id) {

        $point = User::find(Auth::id())->points;

        User::where('id', Auth::id())->update([
            'points' => $point + 3,
        ]);
        
        Rating::create([
            'user_id' => Auth::id(),
            'place_id' => $place_id,
            'rating' => $request->rated,
        ]);

        return redirect('/places/' . $place_id) ;
    }
}
