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

    <!--main section starts-->
    <section id="main">
        <div class="container">
            <div class="row" id="post-content">
                <div class="col-12" style="margin-top: 20px"></div>
                <div class="col-12">
                    <div class="container">
                        <ul class="list-group list-group-horizontal">
                            <li class="list-group-item"><a href="">{{ $place->location }}</a></li>
                            <li class="list-group-item"><a href=""> {{ $place->type }} </a></li>
                        </ul>
                    </div>
                </div>

                <div class="col-sm-12 col-md-12">
                    <div class="content">
                        <div class="post-content">
                            <div class="post-title mt-5">
                                <h1 class="title">
                                    {{ $place->name }}
                                </h1>
                            </div>
                            <div class="post-meta mt-3">
                                <div class="d-flex justify-content-center px-5">
                                    <div class="row text-center">
                                        <div class="mx-auto my-2 alert alert-info">
                                            <strong>Rating : </strong> {{ $place->ratings->avg('rating') }}
                                        </div>
                                        @if (Auth::check())
                                            @if (!$alreadyRated)
                                                <div class="col-12">
                                                    <fieldset class="rating alert mx-auto">
                                                        <input type="radio" id="star1" name="rating" value="5" />
                                                        <label class="full" for="star1"
                                                            title="Sucks big time - 1 star"></label>
                                                        <input type="radio" id="star2" name="rating" value="4" />
                                                        <label class="full" for="star2" title="Kinda bad - 2 stars"></label>
                                                        <input type="radio" id="star3" name="rating" value="3" />
                                                        <label class="full" for="star3" title="Meh - 3 stars"></label>
                                                        <input type="radio" id="star4" name="rating" value="2" />
                                                        <label class="full" for="star4"
                                                            title="Pretty good - 4 stars"></label>
                                                        <input type="radio" id="star5" name="rating" value="1" />
                                                        <label class="full" for="star5" title="Awesome - 5 stars"></label>
                                                    </fieldset>
                                                    <span class="myratings"></span>

                                                    <form action="" method="POST">
                                                        @csrf
                                                        <input type="number" name="rated" id="rating" hidden>
                                                        <button type="submit" class="btn btn-sm btn-success">Rate
                                                            This</button>
                                                    </form>
                                                </div>
                                            @endif
                                        @else
                                            <div class="ml-sm-1 mx-auto my-2 alert alert-danger">
                                                Please <a href="/">login</a> to rate this place !!
                                            </div>
                                        @endif
                                    </div>
                                </div>
                            </div>

                            <div class="post-text text-style fzaWUy">

                                <!--carousel starts-->
                                <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                                    <ol class="carousel-indicators">
                                        <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                                    </ol>

                                    <div class="carousel-inner">
                                        @foreach ($place->placePics as $pic)
                                            <div class="carousel-item @if ($loop->first) active @endif">
                                                <img src="/resources/places/{{ $pic->path }}" class="d-block w-100"
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

                                <!--carousel pic caption starts-->
                                <br>
                                <!--Description parts starts-->
                                <figure class="figureClass">
                                    <figcaption class="captionClass">
                                        <strong class="display-4"> বিস্তারিত :</strong>
                                    </figcaption>
                                </figure>
                                <p>
                                    {{ $place->description }}
                                </p>

                                <!--Description parts Ends-->

                                <!--Direction Parts Start-->

                                <p><strong class="display-4">যেভাবে যাবেন :</strong></p>
                                <p>
                                    {{ $place->direction }}
                                </p>


                                <!--Direction parts Ends-->

                                <!--additional info parts start-->
                                <p><strong class="display-4">বিশেষ দ্রষ্টব্য :</strong> </p>
                                <ul>
                                    <li>
                                        {{ $place->additional_info }}
                                    </li>
                                </ul>
                            </div>

                            <!--additional info parts ends-->

                            <!--Budget Parts starts-->
                            <div>
                                <p><strong>বাজেট :</strong> </p>
                                <p><b>{{ $place->budget }}</b> / Person</p>

                            </div>
                            <!--Budget Parts starts-->




                            <!--related package section-->

                            <div class="related-posts mt-5">
                                <div class="d-flex justify-content-between mb-3">
                                    <button type="button" class="btn btn-dark">Add Packages <span><i
                                                class="far fa-plus-square"></i></span> </button>
                                    <h3>Related Packages</h3>
                                    <a href="">See All</a>
                                </div>
                                <div class="card-deck">
                                    @foreach ($relatedPackage as $pack)
                                        <div class="card">
                                            <a href="/packages/{{ $pack->id }}"><img src="/resources/packages/{{ $pack->packagePics->first()->path }}" width="50" class="card-img-top" alt="..." /> </a>
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


                            <!--related posts section-->

                            <div class="related-posts mt-5">
                                <div class="d-flex justify-content-between mb-3">
                                    <h3>Related Posts</h3>
                                    <a href="">See All</a>
                                </div>
                                <div class="card-deck">
                                    @foreach ($relatedPost as $post)
                                        <div class="card">
                                            <a href="/story/{{ $post->id }}"><img
                                                    src="/resources/stories/{{ $post->postPics->first()->path }}"
                                                    width="50" class="card-img-top" alt="..." /> </a>
                                            <div class="card-body">
                                                <h5 class="card-title">
                                                    {{ $post->title }}
                                                </h5>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                            <!--related posts section-->
                            <br> <br>

                        </div>
                    </div>
                </div>
            </div>
    </section>

    @include('partials.footer')

    <!--main section ends-->
@endsection
