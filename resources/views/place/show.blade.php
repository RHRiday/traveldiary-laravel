@extends('layouts.app')

@section('css')
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link rel="stylesheet" href="{{ asset('css/place.css') }}">
@endsection

@section('content')
    <!--navbar section starts-->
    <div class="container">
        <nav class="navbar navbar-expand-lg navbar-dark bg-success">
            <a class="navbar-brand" href="/home">
                <img class="mx-auto" src="{{ asset('logo.ico') }}" width="32" height="32">
                <span class="d-md-none"> TravelDiary</span>
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
                aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item">
                        <a class="nav-link text-light" href="/home">Stories</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-light" href="/places">Explore</a>
                    </li>
                </ul>
                <form class="form-inline my-2 my-lg-0">
                    <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search" />
                    <button class="btn btn-success my-2 my-sm-0" type="submit">
                        Search
                    </button>
                </form>
            </div>
        </nav>
    </div>

    <!--navbar section ends-->

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
                                @if(Auth::check())
                                        <div class="d-flex justify-content-center px-5">
                                            <div class="row text-center">
                                                @if(!$alreadyRated)
                                                    <fieldset class="rating">
                                                        <input type="radio" id="star5" name="rating" value="5" />
                                                        <label class="full" for="star5" title="Awesome - 5 stars"></label>
                                                        <input type="radio" id="star4" name="rating" value="4" />
                                                        <label class="full" for="star4" title="Pretty good - 4 stars"></label>
                                                        <input type="radio" id="star3" name="rating" value="3" />
                                                        <label class="full" for="star3" title="Meh - 3 stars"></label>
                                                        <input type="radio" id="star2" name="rating" value="2" />
                                                        <label class="full" for="star2" title="Kinda bad - 2 stars"></label>
                                                        <input type="radio" id="star1" name="rating" value="1" />
                                                        <label class="full" for="star1" title="Sucks big time - 1 star"></label>
                                                        <input type="radio" class="reset-option" name="rating" value="reset" />
                                                    </fieldset>
                                                    <span class="myratings"></span>
                                                    
                                                    <form action="" method="POST">
                                                        @csrf
                                                        <input type="number" name="rated" id="rating" hidden>
                                                        <button type="submit" class="btn btn-sm btn-success ml-3">Rate This</button>
                                                    </form>
                                                @else 
                                                    <b> <span class="h2"> Ratings: </span> {{ round($place->ratings->avg('rating'), 2) }}</b>
                                                @endif
                                            </div>
                                        </div>
                                @else
                                    <div class="text-center alert alert-danger">
                                        Please <a href="/">login</a> to rate this place !!
                                    </div>
                                @endif
                            </div>

                            <div class="post-text text-style fzaWUy">

                                <!--carousel starts-->
                                <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                                    <ol class="carousel-indicators">
                                        <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                                    </ol>

                                    <div class="carousel-inner">
                                        @foreach($place->placePics as $pic)
                                            <div class="carousel-item @if($loop->first) active @endif">
                                                <img src="/resources/places/{{ $pic->path }}" class="d-block w-100" alt="...">
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
                                    {{ $place->description}}
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
                                        {{ $place->additional_info}}
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
                                    <div class="card">
                                        <img src="images/boalia trail.jpg" class="card-img-top" alt="..." />
                                        <div class="card-body">
                                            <h5 class="card-title">
                                                বোয়ালিয়া ট্রেইল - মিরসরাই রেঞ্জের অন্যতম আকর্ষণ
                                            </h5>
                                        </div>
                                    </div>
                                    <div class="card">
                                        <img src="images/no-kaba.jpg" class="card-img-top" alt="..." />
                                        <div class="card-body">
                                            <h5 class="card-title">
                                                ন-কাবা ছড়া এই পাহাড়ি ঝর্ণা বাংলাদেশের অন্য সকল ঝর্ণার
                                            </h5>
                                        </div>
                                    </div>
                                    <div class="card">
                                        <img src="images/dhuppani.jpg" class="card-img-top" alt="..." />
                                        <div class="card-body">
                                            <h5 class="card-title">জোছনাতরীর সাথে ধুপপানি ভ্রমণ</h5>
                                        </div>
                                    </div>
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
                                    @foreach($relatedPost as $post)
                                        <div class="card">
                                            <a href="/story/{{ $post->id }}"><img src="/resources/stories/{{ $post->postPics->first()->path }}" width="50" class="card-img-top" alt="..." /> </a>
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

    <!--main section ends-->
@endsection
