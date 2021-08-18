<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreatePlaceRequest;
use App\Models\Contribution;
use Illuminate\Http\Request;
use App\Models\Place;
use Illuminate\Support\Facades\Auth;
use App\Models\Rating;
use App\Models\Post;
use App\Models\Package;
use App\Models\PlacePic;
use App\Models\Upazila;
use App\Models\User;

class PlaceController extends Controller
{
    public function __construct() {
        return $this->middleware('auth')->only(['create']);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('place.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // if (Auth::user()->role == 'admin') {
        //     return redirect('/admin/create');
        // }

        $type = Place::pluck('type');
        return view('place.contribute', [
            'upazilas' => Upazila::pluck('upazila'),
            'types' => array_unique($type->toArray()),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreatePlaceRequest $request)
    {
        Place::create([
            'name' => $request->name,
            'location' => $request->location,
            'type' => $request->type,
            'checkpoint' => $request->checkpoint,
            'budget' => $request->budget,
            'description' => $request->description,
            'direction' => $request->direction,
            'additional_info' => $request->info,
        ]);

        foreach ($request->image as $image) {
            $name = $request->location . time() . mt_rand(9, 99) . '.' . $image->extension();

            PlacePic::create([
                'place_id' => Place::max('id'),
                'path' => $name,
            ]);
            $image->move(public_path('resources/places'), $name);
        }

        Contribution::create([
            'place_id' => Place::max('id'),
            'user_id' => Auth::id(),
            'status' => (int) 0,
        ]);

        return redirect('/guides')->with('message', 'Tour spot has been added temporarily.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Place  $id
     * @return \Illuminate\Http\Response
     */
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
