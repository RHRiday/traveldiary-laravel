@extends('layouts.app')

@section('title')
    <title>Search</title>
@endsection

@section('css')
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link rel="stylesheet" href="{{ asset('css/place.css') }}">
@endsection

@section('content')
    @include('partials.nav')
    <div class="container">
        <h5 class="mt-2 text-center display-4">Search Results</h5>
        <div class="row">
            <div class="col-lg-4 d-flex flex-column text-center order-lg-last">
                <div class="">
                    <div class="p-2 border-bottom shadow-sm m-1 alert-success">
                        Search in
                    </div>
                    <div class="p-2 border border-dark rounded m-1">
                        Travelers
                    </div>
                    <div class="p-2 border border-dark rounded m-1">
                        Places
                    </div>
                    <div class="p-2 border border-dark rounded m-1">
                        Packages
                    </div>
                </div>
                <div class="">
                    <div class="p-2 border-bottom shadow-sm m-1 alert-success">
                        Filter
                    </div>
                    <form class="py-2" action="/search" method="get">
                        <input type="hidden" name="key" value="{{ request()->get('key') }}">
                        <div class="d-flex p-2 border border-dark rounded m-1">
                            <label for="price" class="mb-2">Price/Budget:</label>
                            <div class="ml-auto">
                                <input type="number" class="w-100 form-control" id="price" name="price" step="100"
                                    value="{{ request()->get('price') }}">
                            </div>
                        </div>
                        <div class="d-flex p-2 border border-dark rounded m-1">
                            <label for="type" class="mb-2">Type:</label>
                            <div class="ml-auto">
                                <input type="text" class="w-100 form-control" id="type" name="type"
                                    value="{{ request()->get('type') }}">
                            </div>
                        </div>
                        <input type="submit" class="btn btn-sm w-100 btn-dark">
                    </form>
                </div>

            </div>
            <div class="col-lg-8 order-lg-first">
                @if ($users->count() > 0)
                    <div class="alert alert-info" id="travellers">
                        <i class="fas fa-user" aria-hidden="true"></i> Travellers
                    </div>
                    @if (request()->get('all') == 'user')
                        @foreach ($users as $user)
                            <div class="col-12 d-flex border rounded bg-white mb-1">
                                <div class="p-2 bd-highlight">
                                    <img src="/resources/profile/{{ $user->dp }}" class="rounded-circle" width="60">
                                </div>
                                <div class="p-2 bd-highlight">
                                    <h5 class="mb-1">{{ $user->name }}</h5>
                                    <p class="mb-0">
                                        <strong>
                                            <i class="fa fa-map-marker-alt" title="Location" aria-hidden="true"></i>
                                        </strong> {{ $user->location }}
                                    </p>
                                    <p class="mb-0">
                                        <strong>
                                            <i class="fa fa-bookmark" title="Points" aria-hidden="true"></i>
                                        </strong> {{ $user->points }}
                                    </p>
                                </div>
                                <div class="ml-auto p-2 bd-highlight">
                                    <a href="/follow/{{ $user->id }}"
                                        class="btn btn-success btn-md px-2 ml-5">Follow</a>
                                </div>
                            </div>
                        @endforeach
                    @else
                        @foreach ($users->slice(0, 2) as $user)
                            <div class="col-12 d-flex border rounded bg-white mb-1">
                                <div class="p-2 bd-highlight">
                                    <img src="/resources/profile/{{ $user->dp }}" class="rounded-circle" width="60">
                                </div>
                                <div class="p-2 bd-highlight">
                                    <h5 class="mb-1">{{ $user->name }}</h5>
                                    <p class="mb-0">
                                        <strong>
                                            <i class="fa fa-map-marker-alt" title="Location" aria-hidden="true"></i>
                                        </strong> {{ $user->location }}
                                    </p>
                                    <p class="mb-0">
                                        <strong>
                                            <i class="fa fa-bookmark" title="Points" aria-hidden="true"></i>
                                        </strong> {{ $user->points }}
                                    </p>
                                </div>
                                <div class="ml-auto p-2 bd-highlight">
                                    <a href="/follow/{{ $user->id }}"
                                        class="btn btn-success btn-md px-2 ml-5">Follow</a>
                                </div>
                            </div>
                        @endforeach
                        <div class="my-2 text-center">
                            <a href="/search?key={{ request()->get('key') }}&all=user" class="my-3">Show all</a>
                        </div>
                    @endif
                @else
                    <div class="my-2 text-center alert alert-danger rounded">
                        No traveller found!!
                    </div>
                @endif

                @if ($places->count() > 0)
                    <div class="alert alert-info" id="travellers">
                        <i class="fas fa-user" aria-hidden="true"></i> Places
                    </div>
                    @if (request()->get('all') == 'place')
                        @foreach ($places as $place)
                            <div class="col-12 d-flex border rounded bg-white mb-1">
                                <div class="p-2 col-5">
                                    <img src="/resources/places/{{ $place->placePics->first()->path }}" width="100%">
                                </div>
                                <div class="p-2 col-7">
                                    <h5 class="mb-1">{{ $place->name }}</h5>
                                    <p class="mb-0">
                                        <strong>
                                            <i class="fa fa-map-marker-alt" title="Location" aria-hidden="true"></i>
                                        </strong> {{ $place->location }}
                                    </p>
                                    <p class="mb-0">
                                        <strong>
                                            <i class="fa fa-bookmark" title="Points" aria-hidden="true"></i>
                                        </strong> {{ $place->type }}
                                    </p>
                                </div>
                            </div>
                        @endforeach
                    @else
                        @foreach ($places->slice(0, 2) as $place)
                            <div class="col-12 d-flex border rounded bg-white mb-1">
                                <div class="p-2 col-5">
                                    <img src="/resources/places/{{ $place->placePics->first()->path }}" width="100%">
                                </div>
                                <div class="p-2 col-7">
                                    <h5 class="mb-1">{{ $place->name }}</h5>
                                    <p class="mb-0">
                                        <strong>
                                            <i class="fa fa-map-marker-alt" title="Location" aria-hidden="true"></i>
                                        </strong> {{ $place->location }}
                                    </p>
                                    <p class="mb-0">
                                        <strong>
                                            <i class="fa fa-bookmark" title="Points" aria-hidden="true"></i>
                                        </strong> {{ $place->type }}
                                    </p>
                                </div>
                            </div>
                        @endforeach
                        <div class="my-2 text-center">
                            <a href="/search?key={{ request()->get('key') }}&all=place" class="my-3">Show all</a>
                        </div>
                    @endif
                @else
                    <div class="my-2 text-center alert alert-danger rounded">
                        No tour spot found!!
                    </div>
                @endif

            </div>
        </div>
    </div>


    @include('partials.footer')

@endsection
