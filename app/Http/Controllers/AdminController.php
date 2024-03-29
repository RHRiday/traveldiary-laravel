<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use App\Models\Place;
use App\Models\Upazila;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\CreatePlaceRequest;
use App\Models\Contribution;
use App\Models\Guide;
use App\Models\Package;
use App\Models\PlacePic;
use App\Models\Post;
use App\Models\Report;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

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
        $files = Storage::disk('google')->allFiles();
        $size = 0;
        foreach ($files as $file) {
            $size += Storage::disk('google')->size($file);
        }

        $used = round($size / 1024 / 1024 / 12288 * 100, 2); //in MegaBytes

        return view('admin.index', [
            'places' => Place::all(),
            'guides' => Guide::where('approval', 0)->get(),
            'contributions' => Contribution::where('status', 0)->get(),
            'reports' => Report::where('status', 0)
                            ->groupBy('post_id')
                            ->havingRaw('count(*) > 5')
                            ->get(),
            'packages' => Package::where('deadline', '>', now())->get(),
            'users' => User::where('role', 'visitor')->get(),
            'stories' => Post::all(),
            'guides' => Guide::all(),
            'used' => $used,
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
        }

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
        }

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
        }

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
        }
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
                $name = $image->store('19FxlYfRs_XxW79ANIWWZX4sWuu23EXpX', 'google');
    
                PlacePic::create([
                    'place_id' => $id,
                    'path' => Storage::disk('google')->url($name),
                ]);
            }
        }

        return redirect('/admin/places')->with('message', 'Tour spot has been updated');
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
    public function places()
    {
        if (Auth::user()->role !== 'admin') {
            abort(404);
        }

        return view('admin.places', [
            'places' => Place::inRandomOrder()->get(),
        ]);
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
     * View the specified resource from storage.
     *
     * @return \Illuminate\Http\Response
     */
    public function contribution()
    {
        if (Auth::user()->role !== 'admin') {
            abort(404);
        }

        return view('admin.contribution', [
            'requests' => Contribution::where('status', 0)->get(),
        ]);
    }

    /**
     * View the specified resource from storage.
     *
     * @return \Illuminate\Http\Response
     */
    public function report()
    {
        if (Auth::user()->role !== 'admin') {
            abort(404);
        }

        return view('admin.report', [
            'requests' => Report::where('status', 0)
                            ->groupBy('post_id')
                            ->havingRaw('count(*) > 5')
                            ->get(),
        ]);
    }

    /**
     * Handles the specified request.
     *
     * @return \Illuminate\Http\Response
     */
    public function m_approval(Request $request, $id)
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
    /**
     * Handles the specified request.
     *
     * @return \Illuminate\Http\Response
     */
    public function c_approval(Request $request, $id)
    {
        if (Auth::user()->role !== 'admin') {
            abort(404);
        }

        $contribution = Contribution::where('id', $id);

        if ($request->status == 'Accept') {
            $contribution->update([
                'status' => 1,
            ]);

            GuideController::give_points($contribution->first()->user->id, 10);

            $action = 'Approved';
        } else {
            Contribution::find($id)->place->delete();
            $action = 'Declined';
        }

        return redirect('/admin')->with('message', 'Request has been '. $action);
    }
    /**
     * Handles the specified request.
     *
     * @return \Illuminate\Http\Response
     */
    public function r_approval(Request $request, $id)
    {
        if (Auth::user()->role !== 'admin') {
            abort(404);
        }

        $report = Report::findOrFail($id);

        if ($request->status == 'Accept') {
            //give negative feedback to post publisher
            GuideController::give_points($report->first()->post->user->id, -5);
            //then delete that post
            $report->post->delete();

            $action = 'Approved';
        } else {
            // dd(Report::where('post_id', $report->post_id));
            Report::where('post_id', $report->post_id)
                    ->update([
                        'status' => 1
                    ]);
            $action = 'Declined';
        }

        return redirect('/admin')->with('message', 'Request has been '. $action);
    }
}
