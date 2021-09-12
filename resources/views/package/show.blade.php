@extends('layouts.app')

@section('title')
    <title>Packages</title>
@endsection

@section('css')
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link rel="stylesheet" href="{{ asset('css/place.css') }}">
@endsection

@section('content')
    @include('partials.nav')
    <!--main section starts-->
    <section id="main">
        <section class="my-5">
            <div class="container text-center">
                @if (session()->has('tran_msg'))
                    <div style="background: rgb(158, 158, 219); color:rgb(1, 1, 1); text:center; padding:1% 1%" 
                    class="alert alert-success" role="alert">
                        {{ session()->get('tran_msg') }}
                    </div>
                @endif
            </div>
        </section>
        <div class="container">
            <div class="row" id="post-content">
                <div class="col-12" style="margin-top: 20px"></div>
                <div class="col-12">
                    <div class="container">
                        <ul class="list-group list-group-horizontal">
                            <li class="list-group-item"><a href="/packages?location={{ $package->location }}">{{ $package->location }}</a></li>
                            <li class="list-group-item"><a href="/packages?type={{ $package->location_type }}">{{ $package->location_type }}</a></li>
                        </ul>
                    </div>
                </div>

                <div class="col-sm-12 col-md-12">
                    <div class="content">
                        <div class="post-content">
                            <div class="mt-3">
                                <h1 class="title">
                                    {{ $package->title }}
                                </h1>
                            </div>
                            <div class="post-summary">
                                <h2><i class="fas fa-child"></i> {{ $package->type }} </h2>
                            </div>

                            <!--profile section starts-->
                            <div class="mt-3">
                                <div class="d-flex bd-highlight ">
                                    <div class="p-2 bd-highlight">
                                        <img src="/resources/profile/{{ $package->user->dp }}" class="rounded-circle"
                                            width="60" />
                                    </div>
                                    <div class="p-2 bd-highlight">
                                        <h4 class="mb-1"><a href="/profile/{{$package->user->username}}">{{ $package->user->name }}</a></h4>
                                        <p class="mb-0"><strong>সময়সীমা :</strong> {{ date('F d, Y', strtotime($package->deadline)) }} </p>
                                        <p class="mb-0"><strong>মূল্য :</strong> জনপ্রতি {{ $package->price }} টাকা</p>
                                    </div>
                                </div>
                            </div>
                            <!--profile section ends-->
                        </div>



                        <div class="mt-5">
                            <!--carousel starts-->
                            <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                                <ol class="carousel-indicators">
                                    <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                                </ol>
                                <div class="carousel-inner">
                                    @foreach ($package->packagePics as $pic)
                                        <div class="carousel-item @if ($loop->first) active @endif">
                                            <img src="/resources/packages/{{ $pic->path }}" class="d-block w-100"
                                                alt="...">
                                        </div>
                                    @endforeach
                                </div>
                                <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button"
                                    data-slide="prev">
                                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                    <span class="sr-only">Previous</span>
                                </a>
                                <a class="carousel-control-next" href="#carouselExampleIndicators" role="button"
                                    data-slide="next">
                                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                    <span class="sr-only">Next</span>
                                </a>
                            </div>

                            <!--carousel ends-->


                            <!--Description parts starts-->
                            <figure class="figureClass mt-5">
                                <figcaption class="captionClass">
                                    <strong class="display-4"> বিস্তারিত:</strong>
                                </figcaption>
                            </figure>
                            <p>
                                {{ $package->description }}
                            </p>

                            <!--Description parts Ends-->

                            <!--Direction Parts Start-->
                            <p><strong class="display-4">এক্সপেরিয়েন্সটিতে থাকছে:</strong></p>
                            <p>
                                {{ $package->benefit }}
                            </p>

                            <!--Direction parts Ends-->
                            <p><strong class="display-4">বুকিংয়ের নিয়মাবলী ও সতর্কতা:</strong> </p>

                            <p>
                                {{ $package->rule }}
                            </p>
                            <p class="display-4">প্যাকেজ সংক্রান্ত তথ্যের জন্য যোগাযোগ করুন <span
                                    class="alert-dark">{{ $package->phone }}</span> নম্বরে</p>

                            <div>
                                <a href="/buypackage/{{ $package->id }}" class="btn btn-success">Buy Package</a>
                            </div>
                            {{-- exampleEasycheckout --}}
                            <!--Budget Parts starts-->

                            <!--related package section-->

                            <div class="related-posts mt-5">
                                <div class="d-flex justify-content-between mb-3">
                                    <h3>Related Packages</h3>
                                    <a href="/packages" class="my-auto">See All</a>
                                </div>
                                <div class="d-flex justify-content-start">
                                    @foreach ($relatedPackage as $pack)
                                        <div class="card col-sm-12 col-md-6 col-lg-4">
                                            <div class="place-img">
                                                <img src="/resources/packages/{{ $pack->packagePics->first()->path }}"
                                                    class="position-relative">
                                            </div>
                                            <div class="card-body pl-0">
                                                <h5 class="card-title">
                                                    <a href="/packages/{{ $pack->id }}">
                                                        {{ $pack->title }}
                                                    </a>
                                                </h5>
                                                <p class="my-0">{{$pack->price}} টাকা</p>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                            <!--related package section-->

                        </div>
                    </div>
                </div>
            </div>
    </section>

    @include('partials.footer')
@endsection
