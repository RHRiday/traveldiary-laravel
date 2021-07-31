<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use App\Models\Place;
use App\Models\Upazila;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\CreatePlaceRequest;
use App\Models\Guide;
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

        return view('place.create', [
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

        foreach ($request->image as $image) {
            $name = $request->location . time() . mt_rand(9, 99) . '.' . $image->extension();

            PlacePic::create([
                'place_id' => Place::max('id'),
                'path' => $name,
            ]);
            $image->move(public_path('resources/places'), $name);
        }

        return redirect('/admin')->with('message', 'Tour spot has been added');
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
     * @param  \App\Models\Place  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if (Auth::user()->role !== 'admin') {
            abort(404);
        };

        $upazila = Upazila::pluck('upazila');
        $type = Place::pluck('type');

        return view('place.edit', [
            'place' => Place::where('id', $id)->first(),
            'upazilas' => $upazila,
            'types' => array_unique($type->toArray()),
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Admin  $admin
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        if (Auth::user()->role !== 'admin') {
            abort(404);
        };
        $place = Place::where('id', $id);

        $place->update([
            'name' => $request->name,
            'location' => $request->location,
            'type' => $request->type,
            'checkpoint' => $request->checkpoint,
            'budget' => $request->budget,
            'description' => $request->description,
            'direction' => $request->direction,
            'additional_info' => $request->info,
        ]);

        if ($request->image) {
            PlacePic::where('place_id', $id)->delete();
            foreach ($request->image as $image) {
                $name = $request->location . time() . mt_rand(9, 99) . '.' . $image->extension();

                PlacePic::create([
                    'place_id' => $id,
                    'path' => $name,
                ]);
                $image->move(public_path('resources/places'), $name);
            }
        }

        return redirect('/admin')->with('message', 'Tour spot has been updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Admin  $admin
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $place = Place::find($id);

        $place->delete();

        return redirect('/admin')->with('message', 'Tour spot has been deleted');
    }

    /**
     * View the specified resource from storage.
     *
     * @return \Illuminate\Http\Response
     */
    public function membership()
    {
        if (Auth::user()->role !== 'admin') {
            abort(404);
        }

        return view('admin.membership', [
            'requests' => Guide::where('approval', 0)->get(),
        ]);
    }

    /**
     * Handles the specified request.
     *
     * @return \Illuminate\Http\Response
     */
    public function approval(Request $request, $id)
    {
        if (Auth::user()->role !== 'admin') {
            abort(404);
        }

        if ($request->status == 'Accept') {
            Guide::where('id', $id)->update([
                'approval' => 1,
            ]);
            $action = 'Approved';
        } else {
            Guide::find($id)->delete();
            $action = 'Declined';
        }

        return redirect('/admin')->with('message', 'Request has been '. $action);
    }
}
