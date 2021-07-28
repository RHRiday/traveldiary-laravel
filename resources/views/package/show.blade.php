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
        <div class="container">
            <div class="row" id="post-content">
                <div class="col-12" style="margin-top: 20px"></div>
                <div class="col-12">
                    <div class="container">
                        <ul class="list-group list-group-horizontal">
                            <li class="list-group-item"><a href="">{{ $package->location }}</a></li>
                            <li class="list-group-item"><a href="">{{ $package->location_type }}</a></li>
                        </ul>
                    </div>
                </div>

                <div class="col-sm-12 col-md-12">
                    <div class="content">
                        <div class="post-content">
                            <div class="mt-5">
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
                                        <img src="/resources/profile/{{ $user->dp }}" class="rounded-circle" width="60" />
                                    </div>
                                    <div class="p-2 bd-highlight">
                                        <h4 class="mb-1">{{ $user->username }}</h4 >
                                        <p class="mb-0"><strong>Deadline :</strong> {{ $package->deadline }} </p>
                                        <p class="mb-0"><strong>Price :</strong> {{ $package->price }} BDT</p>
                                    </div>
                                    @if(Auth::check())
                                        <div class="ml-auto p-2 bd-highlight">
                                            <button class="btn btn-outline-dark btn-md px-2 ml-5 ">Follow</button>
                                        </div>
                                    @endif
                                </div>
                            </div>
                            <!--profile section ends-->
                        </div>



                        <div class="mt-5">
                            <!--carousel starts-->
                            @if($packagePic)
                                <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                                    <ol class="carousel-indicators">
                                        <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                                    </ol>
                                    <div class="carousel-inner">
                                        @foreach($packagePic as $pic)
                                            <div class="carousel-item @if($loop->first) active @endif">
                                                <img src="/resources/packages/{{ $pic->path }}" class="d-block w-100" alt="...">
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
                            @endif

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
                                {{$package->benefit}}
                            </p>

                            <!--Direction parts Ends-->
                            <p><strong class="display-4">বুকিংয়ের নিয়মাবলী ও সতর্কতা:</strong> </p>
                            
                            <p>
                                {{$package->rule}}
                            </p>
                            <p class="display-4">প্যাকেজ সংক্রান্ত তথ্যের জন্য যোগাযোগ করুন <span class="alert-dark">{{ $package->phone }}</span> নম্বরে</p>
                        <div>
                            <a class="btn btn-success">Buy Package</a>
                        </div>
                        <!--Budget Parts starts-->

                        <!--related package section-->

                        <div class="related-posts mt-5">
                            <div class="d-flex justify-content-between mb-3">
                                <h3>Related Packages</h3>
                                <a href="/packages">See All</a>
                            </div>
                            <div class="card-deck">
                                @foreach($relatedPackage as $pack)
                                    <div class="card">
                                        {{-- <a href="/packages/{{ $pack->id }}"><img src="/resources/packages/{{ $pack->packagePics->first()->path }}" width="50" class="card-img-top" alt="..." /> </a> --}}
                                        <div class="card-body">
                                            <h5 class="card-title">
                                                {{ $pack->title }}
                                            </h5>
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