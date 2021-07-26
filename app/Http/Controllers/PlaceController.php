<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Place;
use Illuminate\Support\Facades\Auth;
use App\Models\Rating;

class PlaceController extends Controller
{
    public function show(Place $id)
    {
        $alreadyRated = false ;

        foreach($id->ratings as $rating) {
            if($rating->user_id == Auth::id()) {
                $alreadyRated = true ;
            }
        }

        return view('place.show', [
            'place' => $id,
            'alreadyRated' => $alreadyRated,
        ]);
    }

    public function saveRating(Request $request, $place_id) {
        $user_id = Auth::id();


        Rating::create([
            'user_id' => Auth::id(),
            'place_id' => $place_id,
            'rating' => $request->rated,
        ]);

        return redirect('/places/' . $place_id) ;
    }
}
