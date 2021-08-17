<?php

namespace App\Http\Controllers;

use App\Http\Requests\GuideRequest;
use App\Models\Guide;
use App\Models\Hire;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class GuideController extends Controller
{
    public function __construct()
    {
        return $this->middleware('auth')->except('index');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        // dd(Hire::all());
        if (!Auth::id() || (Auth::id() && Guide::where('user_id', Auth::id())->first() == null)) {
            $membership = false;
        } elseif (Guide::where('user_id', Auth::id())->first()->approval == 0) {
            $membership = 'pending';
        } else {
            $membership = 'approved';
        }
        $data = Hire::all();
        $user = User::all();

        if ($request->sort == 'own') {
            $data = $data->where('user_id', Auth::id());
        }

        return view('guide.index', [
            'membership' => $membership,
            'data' => $data,
            'user' => $user,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (Guide::where('user_id', Auth::id())->exists()){
            return redirect('/guides');
        }
        return view('guide.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Guide::create([
            'national_id' => $request->nid,
            'contact' => $request->contact,
            'user_id' => Auth::id(),
        ]);
        return redirect('/guides');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Guide  $guide
     * @return \Illuminate\Http\Response
     */
    public function show(Guide $guide)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Guide  $guide
     * @return \Illuminate\Http\Response
     */
    public function edit(Guide $guide)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Guide  $guide
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Guide $guide)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Guide  $guide
     * @return \Illuminate\Http\Response
     */
    public function destroy(Guide $guide)
    {
        //
    }
}
