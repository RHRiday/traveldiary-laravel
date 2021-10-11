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
use Illuminate\Support\Facades\Storage;

class PlaceController extends Controller
{
    public function __construct()
    {
        return $this->middleware('auth')->only(['create']);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $places = Place::inRandomOrder();

        //filter
        if ($request->location != null) {
            $places->where('location', $request->location);
        }
        if ($request->type != null) {
            $places->where('type', $request->type);
        }

        $divisions = Upazila::pluck('division');
        return view('place.index', [
            'places' => $places->get(),
            'divisions' => array_unique($divisions->toArray()),
            'upazilas' => Upazila::all(),
        ]);
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
        $place = Place::create([
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
            $name = $image->store('19FxlYfRs_XxW79ANIWWZX4sWuu23EXpX', 'google');

            PlacePic::create([
                'place_id' => $place->id,
                'path' => Storage::disk('google')->url($name),
            ]);
        }

        Contribution::create([
            'place_id' => $place->id,
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
        $alreadyRated = false;
        $alreadyHired = false;

        foreach ($id->ratings as $rating) {
            if ($rating->user_id == Auth::id() && $rating->place_id == $id->id) {
                $alreadyRated = true;
            }
        }
        foreach ($id->hires as $hire) {
            if ($hire->user_id == Auth::id() && $hire->place_id == $id->id && $hire->date > now()) {
                $alreadyHired = true;
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
            'alreadyHired' => $alreadyHired,
            'relatedPost' => $relatedPost,
            'relatedPackage' => $relatedPackage,
        ]);
    }

    public function saveRating(Request $request, $place_id)
    {

        GuideController::give_points(Auth::id(), 3);

        Rating::create([
            'user_id' => Auth::id(),
            'place_id' => $place_id,
            'rating' => $request->rated,
        ]);

        return redirect('/places/' . $place_id);
    }
}
