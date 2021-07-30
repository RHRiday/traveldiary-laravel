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
        @if (request()->get('key'))
            <h5 class="mt-2 text-center display-4">Search Results</h5>
            <div class="row">
                <div class="col-lg-4 d-flex flex-column text-center order-lg-last">
                    <div class="">
                        <div class="p-2 border-bottom shadow-sm m-1 alert-success">
                            Filter
                        </div>
                        <form class="py-2" action="/search" method="get">
                            <input type="hidden" name="key" value="{{ request()->get('key') }}">
                            <div class="d-flex p-2 border border-dark rounded m-1">
                                <label for="price" class="mb-2">Price/Budget:</label>
                                <div class="ml-auto w-50">
                                    <input type="number" class="form-control" id="price" name="price" step="100"
                                        value="{{ request()->get('price') }}">
                                </div>
                            </div>
                            <div class="d-flex p-2 border border-dark rounded m-1">
                                <label for="type" class="mb-2">Type:</label>
                                <div class="ml-auto w-50">
                                    <select name="type" class="form-control" id="type">
                                        <option value="" selected></option>
                                        @forelse ( array_unique($types) as $type)
                                            <option value="{{ $type }}">{{ $type }}</option>
                                        @empty
                                            <option value="{{ request()->get('type') }}">{{ request()->get('type') }}
                                            </option>
                                        @endforelse
                                    </select>
                                </div>
                            </div>
                            <input type="submit" class="btn btn-sm w-100 btn-dark">
                        </form>
                    </div>

                </div>
                <div class="col-lg-8 order-lg-first">
                    @if ($users->count() > 0)
                        <div class="mt-2 alert alert-info" id="travellers">
                            <i class="fas fa-user" aria-hidden="true"></i> Travellers
                        </div>
                        @foreach ($users as $user)
                            <div class="col-12 d-flex border rounded bg-white mb-1">
                                <div class="p-2 my-auto">
                                    <img src="/resources/profile/{{ $user->dp }}" class="rounded-circle" width="60">
                                </div>
                                <div class="p-2 my-auto">
                                    <h5 class="mb-1">
                                        <a href="/profile/{{ $user->username }}">{{ $user->name }}</a>
                                    </h5>
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
                                <div class="my-auto ml-auto p-2 bd-highlight">
                                    <a href="/profile/{{ $user->username }}"
                                        class="btn btn-success btn-md px-2 ml-5">Profile</a>
                                </div>
                            </div>
                        @endforeach
                    @endif

                    @if ($places->count() > 0)
                        <div class="mt-2 alert alert-info" id="travellers">
                            <i class="fas fa-hashtag" aria-hidden="true"></i> Places
                        </div>
                        @foreach ($places as $place)
                            <div class="col-12 d-flex border rounded bg-white mb-1">
                                <div class="p-2 col-4 place-img">
                                    <img src="/resources/places/{{ $place->placePics->first()->path }}">
                                </div>
                                <div class="col-7 my-auto ml-1">
                                    <h5 class="mb-1">
                                        <a href="/places/{{ $place->id }}">{{ $place->name }}</a>
                                    </h5>
                                    <p class="mb-0">
                                        <strong>
                                            <i class="fa fa-map-marker-alt" title="Location" aria-hidden="true"></i>
                                        </strong> {{ $place->location }}
                                    </p>
                                    <p class="mb-0">
                                        <strong>
                                            <i class="fa fa-tag" title="Type" aria-hidden="true"></i>
                                        </strong> {{ $place->type }}
                                    </p>
                                    <p class="mb-0">
                                        <strong>
                                            <i class="fa fa-wallet" title="Budget" aria-hidden="true"></i>
                                        </strong> {{ $place->budget }}
                                    </p>
                                </div>
                            </div>
                        @endforeach
                    @endif

                    @if ($packages->count() > 0)
                        <div class="mt-2 alert alert-info" id="travellers">
                            <i class="fas fa-box-open" aria-hidden="true"></i> Packages
                        </div>
                        @foreach ($packages as $package)
                            <div class="col-12 d-flex border rounded bg-white mb-1">
                                <div class="p-2 col-4 place-img">
                                    <img src="/resources/packages/{{ $package->packagePics->first()->path }}">
                                </div>
                                <div class="col-7 my-auto ml-1">
                                    <h5 class="mb-1">
                                        <a href="/packages/{{ $package->id }}">{{ $package->title }}</a>
                                    </h5>
                                    <p class="mb-0">
                                        <strong>
                                            <i class="fa fa-map-marker-alt" title="Location" aria-hidden="true"></i>
                                        </strong> {{ $package->location }}
                                    </p>
                                    <p class="mb-0">
                                        <strong>
                                            <i class="fa fa-tag" title="Type" aria-hidden="true"></i>
                                        </strong> {{ $package->location_type }}
                                    </p>
                                    <p class="mb-0">
                                        <strong>
                                            <i class="fa fa-wallet" title="Price" aria-hidden="true"></i>
                                        </strong> {{ $package->price }} BDT
                                    </p>
                                </div>
                            </div>
                        @endforeach
                    @endif

                    @if ($posts->count() > 0)
                        <div class="mt-2 alert alert-info" id="travellers">
                            <i class="fas fa-bookmark" aria-hidden="true"></i> Stories
                        </div>
                        @foreach ($posts as $post)
                            <div class="col-12 d-flex border rounded bg-white mb-1">
                                <div class="p-2 col-4 place-img">
                                    <img src="/resources/stories/{{ $post->postPics->first()->path }}">
                                </div>
                                <div class="col-7 my-auto ml-1">
                                    <h5 class="mb-1">
                                        <a href="/story/{{ $post->id }}">{{ $post->title }}</a>
                                    </h5>
                                    <p class="mb-0">
                                        <strong>
                                            <i class="fa fa-map-marker-alt" title="Location" aria-hidden="true"></i>
                                        </strong> {{ $post->location }}
                                    </p>
                                    <p class="mb-0">
                                        <strong>
                                            <i class="fa fa-clock" title="Time" aria-hidden="true"></i>
                                        </strong> {{ date('F d, Y', strtotime($post->created_at)) }}
                                    </p>
                                </div>
                            </div>
                        @endforeach
                    @endif

                    @if ($users->count() < 1 && $places->count() < 1 && $packages->count() < 1 && $posts->count() < 1)
                        <div class="my-2 text-center alert alert-danger rounded">
                            Nothing was found!!
                        </div>
                    @endif
                </div>
            </div>
        @else
            <form action="/search" method="GET" class="form-inline my-2 my-lg-0 d-lg-none justify-content-center">
                <label for="search" class="p-2 mr-2">Search:</label>
                <input class="form-control mr-sm-2" id="search" type="search" placeholder="Search" aria-label="Search"
                    name="key" value="{{ request()->get('key') }}" />
                <button class="btn btn-success my-2 my-sm-0" type="submit">
                    Search
                </button>
            </form>
        @endif
    </div>

    @include('partials.footer')

@endsection
