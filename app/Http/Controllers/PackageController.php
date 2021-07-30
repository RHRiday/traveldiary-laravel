<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Package;
use App\Models\PackagePic;
use App\Models\Upazila;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class PackageController extends Controller
{
    public function __construct()
    {
        return $this->middleware('auth')->except(['index', 'show']);
    }
    /**
     * Display a listing of the resource.
     * show all packages
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $packages = Package::where('deadline', '>', now())->orderBy('deadline')->get();
        if ($request->location) {
            $packages = $packages->where('location', $request->location);
        }
        if ($request->type) {
            $packages = $packages->where('location_type', $request->type);
        }
        // dd(Package::where('deadline', '>', now())->first());
        return view('package.index', [
            'packages' => $packages,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('package.create', [
            'upazilas' => Upazila::pluck('upazila'),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Package::create([
            'title' => $request->name,
            'location' => $request->location,
            'type' => $request->type,
            'location_type' => $request->exp_type,
            'price' => $request->price,
            'description' => $request->description,
            'benefit' => $request->benefit,
            'rule' => $request->rule,
            'phone' => $request->phone,
            'bkash' => $request->bkash,
            'deadline' => $request->deadline,
            'user_id' => Auth::id(),
        ]);

        foreach ($request->image as $image) {
            $name = $request->location . time() . mt_rand(9, 99) . '.' . $image->extension();

            PackagePic::create([
                'package_id' => Package::max('id'),
                'path' => $name,
            ]);
            $image->move(public_path('resources/packages'), $name);
        }

        return redirect('/packages')->with('message', 'Your package has been added');
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
}
