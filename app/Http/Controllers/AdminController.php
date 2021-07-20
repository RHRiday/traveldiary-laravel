<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use App\Models\Place;
use App\Models\Upazila;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\CreatePlaceRequest;
use App\Models\PlacePic;

class AdminController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (Auth::user()->role !== 'admin') {
            abort(404); 
        };

        return view('admin.index', [
            'places' => Place::all(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (Auth::user()->role !== 'admin') {
            abort(404); 
        };

        $upazila = Upazila::pluck('upazila');
        $type = Place::pluck('type');
        // dd($type->toArray());

        return view('admin.create', [
            'upazilas' => $upazila,
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
        if (Auth::user()->role !== 'admin') {
            abort(404); 
        };

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

        foreach ($request->image as $image){
            $name = $request->location . time() . mt_rand(9,99) . '.' . $image->extension();
            Place::max('id');

            PlacePic::create([
                'place_id' => Place::max('id'),
                'path' => $name,
            ]);
            $image->move(public_path('resources/places'), $name);
        }

        return redirect('/admin',)->with('message', 'Tour spot has been added');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Admin  $admin
     * @return \Illuminate\Http\Response
     */
    public function show(Admin $admin)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Admin  $admin
     * @return \Illuminate\Http\Response
     */
    public function edit(Admin $admin)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Admin  $admin
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Admin $admin)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Admin  $admin
     * @return \Illuminate\Http\Response
     */
    public function destroy(Admin $admin)
    {
        //
    }
}
