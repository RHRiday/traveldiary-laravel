<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use Illuminate\Http\Request;
use App\Models\Package;
use App\Models\PackagePic;
use App\Models\Upazila;
use App\Models\User;
use App\Models\Orders;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

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
        if (!Auth::user()->guide || Auth::user()->guide->approval == 0) {
            return redirect('/guides');
        }
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
        $request->validate([
            'description' => 'required',
            'benefit' => 'required',
            'rule' => 'required',
        ]);
        $package = Package::create([
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
            $name = $image->store('1yyR_P10WVi3bzVdYDNv3kU4BThIQQPwR', 'google');

            PackagePic::create([
                'package_id' => $package->id,
                'path' => Storage::disk('google')->url($name),
            ]);
        }

        GuideController::give_points(Auth::id(), 1);

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
        $user = User::find(Auth::id());
        if (!$package) {
            abort(404);
        }
        $relatedPackage = Package::where('location', $package->location)
            ->where('id', '<>', $id)
            ->inRandomOrder()
            ->limit(3)
            ->get();

        return view('package.show', [
            'package' => $package,
            'relatedPackage' => $relatedPackage,
            'user' => $user
        ]);
    }
    /*
        $id -> package_id
    */
    public function orderList($id)
    {
        $user = User::find(Auth::id());
        $orderList = Orders::where('package_id', $id)->get();

        return view('package.showOrders', [
            'orderList' => $orderList
        ]);
    }

    /**
     * Register a booking for a package
     * @param $package_id, $request
     * 
     * saves into database
     */
    public function confirmBook(Request $request, $id)
    {
        Booking::create([
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'amount' => $request->book_for,
            'package_id' => $id,
            'user_id' => Auth::id(),
            'token' => uniqid('pkgToken-'),
        ]);

        return redirect(route('packages.index'))
            ->with('message', 'Your booking has been confirmed! Thank you');
    }

    /**
     * Display registering a booking for a package page
     * @param $package_id
     * 
     * return view with resource
     */
    public function book($id)
    {
        $package = Package::where('id', $id)->first();
        $user = User::find(Auth::id());

        return view('package.book', [
            'package' => $package,
            'user' => $user,
        ]);
    }
}
