<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Package;
use App\Models\PackagePic;
use App\Models\User;

class PackageController extends Controller
{
    /**
     * Display a listing of the resource.
     * show all packages
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // dd(Package::where('deadline', '>', now())->first());
        return view('package.index', [
            'packages' => Package::where('deadline', '>', now())->orderBy('deadline')->get(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $package = Package::where('id', $id)->first();
        if (!$package) {
            abort(404);
        }
        $relatedPackage = Package::where('location', $package->location)
                ->inRandomOrder()
                ->limit(3)
                ->get();

        return view('package.show', [
            'package' => $package,
            'relatedPackage' => $relatedPackage,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
