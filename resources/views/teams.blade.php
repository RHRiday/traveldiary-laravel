@extends('layouts.app')
@section('title')
    <title>TravelDiary Dev Team</title>
@endsection
@section('css')
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link rel="stylesheet" href="{{ asset('css/welcome.css') }}">
    <link rel="stylesheet" href="{{ asset('css/teams.css') }}">
@endsection

@section('content')
    {{-- top navbar --}}
    <nav class="navbar navbar-expand-lg navbar-light">
        <div class="container">
            <a href="{{ url('/') }}" class="title">
                <img class="title" src="/resources/travel-diary.png" alt="Travel-Diary">
            </a>
            <form class="search-btn" action="/search" method="GET">
                <input type="search" class="form-control" placeholder="Search Your Destination" name="key">
            </form>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="/home">STORIES</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/packages">PACKAGES</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/places">EXPLORE</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/guides">CAREER</a>
                    </li>
                    <li class="nav-item">
                        <form class="phone-search form-inline" action="/search" method="GET">
                            <div class="input-group">
                                <input class="form-control" type="search" name="key"
                                    placeholder="Search Your Destination">
                                <div class="input-group-prepend">
                                    <button class="btn btn-secondary" type="submit"><i
                                            class="fas fa-search-location"></i></button>
                                </div>
                            </div>
                        </form>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <!-- ======= Team Section ======= -->
    <section id="team" class="team">
        <div class="container" data-aos="fade-up">
            <header class="section-header">
                <h2>Team</h2>
                <p>Meet the developers <i class="fas fa-fire orange"></i></p>
            </header>
            <div class="container">
                <div class="row gy-4">
                    <div class="col-lg-4 d-flex align-items-stretch my-1" data-aos="fade-up" data-aos-delay="100">
                        <div class="member">
                            <div class="member-img">
                                <img src="{{ asset('resources/profile/rhriday.jpg') }}" class="img-fluid" alt="">
                            </div>
                            <div class="member-info">
                                <h4>Rifat Hossen Riday</h4>
                                <span>Lead Dev</span>
                                <p>Project leader | UX/UI designer | Database model designer | Director of operations</p>
                            </div>
                            <div class="container d-flex justify-content-around">
                                <a href="https://github.com/rhriday" class="git"><i
                                        class="fab fa-2x fa-github"></i></a>
                                <a href="https://facebook.com/riffatriday" class="fb"><i
                                        class="fab fa-2x fa-facebook"></i></a>
                                <a href="https://twitter.com/rhriday" class="tw"><i
                                        class="fab fa-2x fa-twitter"></i></a>
                                <a href="https://linkedin.com/in/rhriday" class="in"><i
                                        class="fab fa-2x fa-linkedin"></i></a>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 d-flex align-items-stretch my-1" data-aos="fade-up" data-aos-delay="100">
                        <div class="member">
                            <div class="member-img">
                                <img src="{{ asset('resources/profile/shajjad71.jpg') }}" class="img-fluid" alt="">
                            </div>
                            <div class="member-info">
                                <h4>Sajjadul Kabir Abir</h4>
                                <span>Asst. Dev</span>
                                <p>Technical writer | Asst. front-end developer | Data analyst</p>
                            </div>
                            <div class="container d-flex justify-content-around">
                                <a href="https://github.com/shajjadKabir" class="git"><i
                                        class="fab fa-2x fa-github"></i></a>
                                <a href="https://www.facebook.com/SajjadAbir71" class="fb"><i
                                        class="fab fa-2x fa-facebook"></i></a>
                                <a href="#" class="tw"><i class="fab fa-2x fa-twitter"></i></a>
                                <a href="https://linkedin.com/in/shajjadabir" class="in"><i
                                        class="fab fa-2x fa-linkedin"></i></a>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 d-flex align-items-stretch my-1" data-aos="fade-up" data-aos-delay="100">
                        <div class="member">
                            <div class="member-img">
                                <img src="{{ asset('resources/profile/noyon31.jpg') }}" class="img-fluid" alt="">
                            </div>
                            <div class="member-info">
                                <h4>Md. Sajjad Hossen Noyon</h4>
                                <span>Asst. Dev</span>
                                <p>Asst. back-end developer | App developer | Social Media designer</p>
                            </div>
                            <div class="container d-flex justify-content-around">
                                <a href="https://github.com/NYN31" class="git"><i
                                        class="fab fa-2x fa-github"></i></a>
                                <a href="https://www.facebook.com/md.noyon.9440" class="fb"><i
                                        class="fab fa-2x fa-facebook"></i></a>
                                <a href="#" class="tw"><i class="fab fa-2x fa-twitter"></i></a>
                                <a href="https://linkedin.com/in/noyon31" class="in"><i
                                        class="fab fa-2x fa-linkedin"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
    </section><!-- End Team Section -->
    <footer class="py-3 text-muted text-center text-small">
        <p class="mb-2">© 2020-2021 TravelDiary</p>
    </footer>
@endsection
