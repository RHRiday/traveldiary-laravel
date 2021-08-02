@extends('layouts.app')

@section('title')
    <title>{{ $place->name }}</title>
@endsection

@section('css')
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link rel="stylesheet" href="{{ asset('css/place.css') }}">
@endsection

@section('content')

@include('partials.nav')

<div class="container">

    <div class="row align-items-center places mt-5">
        <div class="col-md-6 ">
            <h1>Cox's Bazar</h1>
        </div>
    </div>

    <div class="row g-4 rounded mt-5 mb-3">
        <div class="col-md-6 col-lg-4">
            <div class="places-bg">
                <img class="p-1 img-fluid" src="images/rupshi jhorna.jpg" class="card-img-top" alt="...">
            </div>
            <div class="d-flex justify-content-between align-items-center">
                <h5 class="mt-2"><span>jhorna</span></h5>
                <i class="fas fa-bookmark"></i>
            </div>

            <div class="my-3">
                <h3>বোয়ালিয়া ট্রেইল এবং খইয়াছড়া ঝর্ণা অভিযানে টিজিবি</h3>
                <h6 class="mt-2"><span>Mirsharai</span></h6>
            </div>
        </div>

    </div>

</div>


@include('partials.footer')

@endsection