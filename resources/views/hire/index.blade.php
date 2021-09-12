@extends('layouts.app')

@section('title')
    <title>Hire guides</title>
@endsection

@section('css')
    <link rel="stylesheet" href="/css/app.css">
@endsection

@section('content')
    @include('partials.nav')

    <div class="container mt-3">
        <h1 class="text-center border-bottom mb-3">
            Guide requests
        </h1>
        {{-- @dd($data) --}}
        @if ($data->count() < 1)
            <div class="alert bg-white">
                <p class="text-center mb-0">
                    You haven't requested any guide for your tour yet.
                </p>
            </div>
        @endif
        @foreach ($data as $request)
            <div class="card mb-3 package">
                <div class="row no-gutters">
                    <div class="col-md-4 placeholder-img overflow-hidden my-auto">
                        <img src="/resources/places/{{ $request->place->placePics->first()->path }}">
                    </div>
                    <div class="col-md-7 my-auto">
                        <div class="card-body">
                            <h4><a href="/places/{{ $request->place->id }}">{{ $request->place->name }}</a>
                            </h4>
                            <p class="mb-1">
                                <i class="fa fa-map-marker-alt" title="Location" aria-hidden="true"></i>
                                {{ $request->place->location }}
                            </p>
                            <p class="mb-0">
                                <i class="fa fa-clock" title="Time" aria-hidden="true"></i>
                                {{ $request->date }}
                            </p>
                            <p class="mb-0">
                                <i class="fa fa-info" title="Letter" aria-hidden="true"></i>
                                {{ $request->info_letter }}
                            </p>
                        </div>
                    </div>
                    <div class="m-auto col-md-1">
                        <div class="float-md-right mr-md-2 text-center mb-1">
                            @if ($request->guide_id != null)
                                <p class="badge badge-success my-1">Hired</p>
                            @endif
                            @if ($request->date < now())
                                <p class="badge badge-danger my-1">Passed</p>
                            @endif
                            <a href="/hires/{{ $request->id }}" class="btn btn-primary">Applications</a>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>

    @include('partials.footer')
@endsection
