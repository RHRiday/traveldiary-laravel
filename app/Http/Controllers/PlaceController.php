<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Place;

class PlaceController extends Controller
{
    public function show(Place $id)
    {
        return view('place.show', [
            'place' => $id,
            'pics' => $id->placePics,
        ]);
    }
}
