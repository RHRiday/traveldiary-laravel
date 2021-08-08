<?php

namespace App\Http\Controllers;

use App\Models\Application;
use App\Models\Guide;
use App\Models\Hire;
use App\Models\Place;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HireController extends Controller
{
    public function __construct()
    {
        return $this->middleware('auth');   
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        return view('hire.create',[
            'place' => Place::find($id),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $id)
    {
        Hire::create([
            'user_id' => Auth::id(),
            'place_id' => $id,
            'info_letter' => $request->info_letter,
            'date' => $request->date,
        ]);

        return redirect('/guides');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Hire  $hire
     * @return \Illuminate\Http\Response
     */
    public function show(Hire $hire)
    {
        return view('hire.show', [
            'data' => $hire,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Hire  $hire
     * @return \Illuminate\Http\Response
     */
    public function edit(Hire $hire)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Hire  $hire
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Hire $hire)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Hire  $hire
     * @return \Illuminate\Http\Response
     */
    public function destroy(Hire $hire)
    {
        $hire->delete();
        
    }

    public function applications($id)
    {
        // dd(Application::where('guide_id', User::where('id', Auth::id())->first()->guide->id)->exists());
        if (Guide::where('user_id', Auth::id())->get() == null || Hire::findOrFail($id)->guide_id != null) {
            abort(404);
        }
        Application::create([
            'hire_id' => $id,
            'guide_id' => Guide::where('user_id', Auth::id())->first()->id,
        ]);

        return redirect('/guides');
    }
}
