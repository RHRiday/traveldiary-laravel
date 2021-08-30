@extends('layouts.app')

@section('title')
    <title>TravelDiary | Explore</title>
@endsection

@section('css')
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link rel="stylesheet" href="{{ asset('css/place.css') }}">
@endsection

@section('content')

    @include('partials.nav')

    
        <div class="container">
        <nav class="navbar navbar-expand-lg">
            <div class="d-flex justify-content-around">
                @foreach ($divisions as $div)
                    <div class="col-4">
                        <a class="nav-link dropdown dropdown-toggle" href="#" id="navbarDropdownMenuLink"
                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            {{ $div }}
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                            @foreach ($upazilas->where('division', $div) as $upazila)
                                <a class="dropdown-item"
                                    href="/places?location={{ $upazila->upazila }}">{{ $upazila->upazila }}</a>
                            @endforeach
                        </div>
                    </div>
                @endforeach
            </div>
            </nav>
        </div>
   

    <div class="container">
      
    <p class="text-dark">Did you request for a guide? Check <a href="/hires">here</a>.</p>
        @if ($places->count() > 0)
            @php
                $random = rand(0, $places->count() - 1);
            @endphp
            <a href="/places/{{ $places[$random]->id }}" class="row align-items-center places mt-5 text-decoration-none"
                style="background-image: linear-gradient(
                                      rgba(0, 0, 0, 0.2), 
                                      rgba(0, 0, 0, 0.2)
                                      ), url('/resources/places/{{ $places[$random]->placePics->first()->path }}')">
                <div class="col-md-6">
                    <h1 class="text-white">{{ $places[$random]->name }}</h1>
                </div>
            </a>
            <div class="row g-4 rounded mt-5 mb-3">
                @foreach ($places as $place)
                    <a class="col-md-6 col-lg-4 text-dark text-decoration-none" href="/places/{{ $place->id }}">
                        <div class="placeholder-img col-auto overflow-hidden rounded">
                            <img class="card-img-top rounded"
                                src="/resources/places/{{ $place->placePics->first()->path }}">
                        </div>
                        <div class="d-flex justify-content-between">
                            <div class="mt-2 d-flex flex-row">
                                <i class="fas fa-map-marker-alt mx-2"></i>
                                <h5 class="mr-1"><span>{{ $place->location }}</span></h5>
                            </div>
                            <div class="mt-2 d-flex flex-row">
                                <i class="fas fa-bookmark mx-2"></i>
                                <h5 class="mr-1"><span>{{ $place->type }}</span></h5>
                            </div>
                        </div>
                        <div class="my-3">
                            <h3 class="text-justify">{{ $place->name }}</h3>
                        </div>
                    </a>
                @endforeach
            </div>
        @else
            <div class="alert bg-white">
                <p class="text-center mb-0">
                    Sorry. No match found!!
                </p>
            </div>
        @endif
    </div>


    @include('partials.footer')

@endsection
