@extends('layouts.app')

@section('title')
    <title>TravelDiary | Explore</title>
@endsection

@section('css')
    {{-- <link href="https://wowthemesnet.github.io/jekyll-theme-memoirs/assets/css/theme.css" rel="stylesheet"> --}}
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link rel="stylesheet" href="{{ asset('css/place.css') }}">
@endsection

@section('content')

    @include('partials.nav')

    <div class="container">
        <div class="row justify-content-center my-3">
            @foreach ($divisions as $div)
                <div class="text-center">
                    <a class="nav-link dropdown dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown"
                        aria-haspopup="true" aria-expanded="false">
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
            <div class="firstpage">
                <div class="blog-grid-container">

                    @foreach ($places as $place)
                        <!-- begin post -->
                        <div class="blog-grid-item">
                            <div class="card h-100">
                                <div class="maxthumb">
                                    <a href="/places/{{ $place->id }}">
                                        <img class="img-thumb"
                                            src="{{ asset('/resources/places/' . $place->placePics->first()->path) }}"
                                            alt="{{ $place->name }}">
                                    </a>
                                </div>
                                <div class="card-body">
                                    <h2 class="card-title">
                                        <a class="text-dark"
                                            href="/places/{{ $place->id }}">{{ $place->name }}</a>
                                    </h2>
                                </div>
                                <div class="card-footer bg-white">
                                    <div class="wrapfooter">
                                        <span class="post-name font-weight-bold"><i class="fas fa-map-marker-alt mx-2"></i>
                                            {{ $place->location }}</span>
                                        <span class="post-date"><i class="fas fa-bookmark mx-2"></i>
                                            {{ $place->type }}</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- end post -->
                    @endforeach

                </div>
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
