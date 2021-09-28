@extends('layouts.app')

@section('title')
    <title>Packages</title>
@endsection

@section('css')
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link rel="stylesheet" href="{{ asset('css/package.css') }}">
@endsection

@section('content')
    @include('partials.nav')
    <!--main section starts-->
    <section class="mb-5">

        <div class="container">
            <div class="title mt-5">
                <div class="d-flex justify-content-between">
                    <h3>Packages list</h3>
                    <a href="{{ route('packages.create') }}" class="btn btn-outline-danger my-auto">Advertise</a>
                </div>
                @if (session()->has('message'))
                    <p class="alert alert-success">
                        <i class="fa fa-check-circle"></i> {{ session()->get('message') }}
                    </p>
                @endif
            </div>
            @foreach ($packages as $package)
                <div class="card mb-3 package">
                    <div class="row no-gutters">
                        <div class="col-md-4 placeholder-img overflow-hidden my-auto">
                            <img src="/resources/packages/{{ $package->packagePics->first()->path }}">
                        </div>
                        <div class="col-md-7">
                            <div class="card-body">
                                <h4>{{ $package->title }}</h4>
                                <h5 class="mb-2">
                                    <strong>
                                        <i class="fa fa-map-marker-alt" title="Location" aria-hidden="true"></i>
                                        {{ $package->location }}
                                    </strong>
                                </h5>
                                <p class="mb-0">
                                    <strong>
                                        <i class="fa fa-clock" title="Deadline" aria-hidden="true"></i>
                                        {{ date('F d, Y', strtotime($package->deadline)) }}
                                    </strong>
                                </p>
                                <p class="mb-0 text-justify">
                                    <strong>
                                        <i class="fa fa-info-circle" title="Details" aria-hidden="true"></i>
                                        {{ strip_tags($package->description) }}
                                    </strong>
                                </p>
                                <p class="mb-0 text-justify">
                                    <strong>
                                        <i class="fa fa-check-square" title="Booked" aria-hidden="true"></i>
                                        by {{ $package->bookings->count() }} People
                                    </strong>
                                </p>
                            </div>
                        </div>
                        <div class="m-auto col-md-1">
                            <div class="float-md-right mr-md-2 text-center mb-1">
                                <h5>{{ $package->price }} &#2547; </h5>
                                <a href="/packages/{{ $package->id }}" class="btn btn-info"> Details </a>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach

        </div>
    </section>

    @include('partials.footer')
@endsection
