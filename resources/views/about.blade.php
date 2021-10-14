@extends('layouts.app')
@section('title')
    <title>TravelDiary Dev Team</title>
@endsection
@section('css')
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link rel="stylesheet" href="{{ asset('css/welcome.css') }}">
    <link rel="stylesheet" href="{{ asset('css/teams.css') }}">
    <style>
        .rotate-90 {
            transform: rotate(90deg)
        }
    </style>
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
        <div class="container">
            <header class="section-header">
                <h2>Team</h2>
                <p>Meet the developers <i class="fas fa-fire orange"></i></p>
            </header>
            <div class="container">
                <div class="row gy-4">
                    <div class="col-md-8 col-lg-4 d-flex align-items-stretch my-1 mx-auto">
                        <div class="member">
                            <div class="member-img">
                                <img src="{{ asset('resources/profile/rhriday.jpg') }}" class="img-fluid" alt="">
                            </div>
                            <div class="member-info">
                                <h4>Rifat Hossen Riday</h4>
                                <span>Lead Dev</span>
                                <p>Team leader | UX/UI designer | Database model designer | Lead developer</p>
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
                    <div class="col-md-8 col-lg-4 d-flex align-items-stretch my-1 mx-auto">
                        <div class="member">
                            <div class="member-img">
                                <img src="{{ asset('resources/profile/shajjad71.jpg') }}" class="img-fluid" alt="">
                            </div>
                            <div class="member-info">
                                <h4>Sajjadul Kabir Abir</h4>
                                <span>Asst. Dev</span>
                                <p>Technical writer | Asst. front-end developer | Content Manager | Software quality tester
                                </p>
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
                    <div class="col-md-8 col-lg-4 d-flex align-items-stretch my-1 mx-auto">
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

    <!-- ======= document Section ======= -->
    <section id="document" class="team">
        <div class="container">
            <header class="section-header">
                <h2>Documentation</h2>
                <p>See how it works <i class="fas fa-cogs text-info"></i></p>
            </header>
            <div class="container table-responsive">
                <table class="table table-bordered">
                    <thead class="thead-dark">
                        <tr>
                            <th scope="col">Feature</th>
                            <th scope="col">Description</th>
                            <th scope="col">Route</th>
                        </tr>
                    </thead>
                    <tbody>
                        <div>
                            <tr>
                                <td>Social media</td>
                                <td>Sign up for an account and take the advantage of making a traveler profile, following people and watch their stories, share your own stories and much more.</td>
                                <td><a href="{{ route('home') }}" class="btn btn-success btn-sm btn-block">Link</a></td>
                            </tr>
                            <tr>
                                <td><i class="fas fa-level-up-alt rotate-90 float-right"></i></td>
                                <td>Watch stories, Share stories, Follow others.</td>
                                <td></td>
                            </tr>
                        </div>
                        <div>
                            <tr>
                                <td>Explore Bangladesh</td>
                                <td>You want to know where you can travel in your holidays? No worries, our library contains the information of the most attractive tourist spots of Bangladesh.</td>
                                <td><a href="{{ route('places') }}" class="btn btn-success btn-sm btn-block">Link</a></td>
                            </tr>
                            <tr>
                                <td><i class="fas fa-level-up-alt rotate-90 float-right"></i></td>
                                <td>Explore places, rate them, search for desired spot, filter by location, filter by type and filter by traveling budget.</td>
                                <td></td>
                            </tr>
                        </div>
                        <div>
                            <tr>
                                <td>Advertise your package</td>
                                <td>If you are a travel agency or a tour guide yourself we provide an opportunity to advertise any of your packages to attract more customers to buy your package.</td>
                                <td><a href="{{ route('packages.index') }}" class="btn btn-success btn-sm btn-block">Link</a></td>
                            </tr>
                            <tr>
                                <td><i class="fas fa-level-up-alt rotate-90 float-right"></i></td>
                                <td>Advertise your package as tour agency.</td>
                                <td rowspan="2"><a href="{{ route('packages.create') }}" class="btn btn-success btn-sm btn-block">Link</a></td>
                            </tr>
                            <tr>
                                <td><i class="fas fa-level-up-alt rotate-90 float-right"></i></td>
                                <td>Look for travelers to go with you if you an tour guide yourself.</td>
                            </tr>
                            <tr>
                                <td><i class="fas fa-level-up-alt rotate-90 float-right"></i></td>
                                <td>If you are traveler, you can explore those packages, filter them by your budget, location and book those for you upcoming holidays.</td>
                                <td>Go to any package and click on 'Book'.</td>
                            </tr>
                        </div>
                        <div>
                            <tr>
                                <td>Hire tour guides</td>
                                <td>You'd like to travel a lot. But you're unable to explore due to lack of experience? We provide an opportunity to hire a tour guide to travel with you and be the navigator throughout your tour.</td>
                                <td>Go to any place and click on 'Hire a guide'.</td>
                            </tr>
                            <tr>
                                <td><i class="fas fa-level-up-alt rotate-90 float-right"></i></td>
                                <td>Contact with the guide, view guide's profile, give a feedback for the guide.</td>
                                <td></td>
                            </tr>
                        </div>
                        <div>
                            <tr>
                                <td {{-- class="bg-warning text-danger" --}}>Apply as a guide</td>
                                <td>If you are an experienced traveler and want to make a living out of your experience, we provide the finest opportunity to apply as a guide.</td>
                                <td><a href="{{ route('guides.create') }}" class="btn btn-success btn-sm btn-block">Link</a></td>
                            </tr>
                            <tr>
                                <td><i class="fas fa-level-up-alt rotate-90 float-right"></i></td>
                                <td>Get notified when a traveler requests for a guide (as described in the previous module) and apply for it.</td>
                                <td><a href="{{ route('guides.index') }}" class="btn btn-success btn-sm btn-block">Link</a></td>
                            </tr>
                            <tr>
                                <td><i class="fas fa-level-up-alt rotate-90 float-right"></i></td>
                                <td>You can also ask for tour guide yourself as well as maintain your social media profile.</td>
                                <td></td>
                            </tr>
                        </div>
                        <div>
                            <tr>
                                <td {{-- class="bg-warning text-danger" --}}>Contribute to the site</td>
                                <td>As our site is still on development, we provide an opportunity for you to chip in!! You can contribute your own experience of a place to the site like so in the <a href="{{ route('places') }}">Places</a> module.</td>
                                <td><a href="{{ route('places.contribute') }}" class="btn btn-success btn-sm btn-block">Link</a></td>
                            </tr>
                            <tr>
                                <td><i class="fas fa-level-up-alt rotate-90 float-right"></i></td>
                                <td>Earn TravelDiary points for doing so which can be redeemed for exciting gifts in the future of our development.</td>
                                <td rowspan="4">Look at 'Points' in your profile.</td>
                            </tr>
                        </div>
                        <div>
                            <tr>
                                <td {{-- class="bg-warning text-danger" --}}>Earn points</td>
                                <td>TravelDiary points will be crucial to attact more travelers as a guide or agency. Trust us! You need it! :D Points can be earned by: </td>
                            </tr>
                            <tr>
                                <td><i class="fas fa-level-up-alt rotate-90 float-right"></i></td>
                                <td>Contributing to site.</td>
                            </tr>
                            <tr>
                                <td><i class="fas fa-level-up-alt rotate-90 float-right"></i></td>
                                <td>Good feedback after selected as a guide for a tour.</td>
                            </tr>
                            <tr>
                                <td><i class="fas fa-level-up-alt rotate-90 float-right"></i></td>
                                <td>Rating places.</td>
                                <td>Go to any places and rate them.</td>
                            </tr>
                        </div>
                    </tbody>
                </table>
            </div>
    </section><!-- End Team Section -->
    <footer class="py-3 text-muted text-center text-small">
        <p class="mb-2">© 2020-2021 TravelDiary</p>
    </footer>
@endsection
