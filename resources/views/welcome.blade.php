@extends('layouts.app')

@section('title')
    <title>Travel Diary</title>
@endsection

@section('css')
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link rel="stylesheet" href="{{ asset('css/welcome.css') }}">
    <style>
        .wait {
            width: 100vw;
            height: 100vh;
            position: absolute;
            text-align: center;
            background-color: #000000e8;
            z-index: 99;
        }

        .warn {
            position: absolute;
            bottom: 50px;
        }

    </style>
@endsection

@section('content')
    {{-- top navbar --}}
    <div class="wait">
        <div style="max-width: 100%; margin-top: 200px">
            <p class="text-center warn text-info mx-auto" id="textContainer">

            </p>
            <h1 class="text-success mt-3">
                <span class="spinner-grow spinner-grow-sm" role="status" aria-hidden="true"></span>
                <span class="sr-only">Loading...</span>
                <span class="mt-2">TravelDiary</span>
                <span class="spinner-grow spinner-grow-sm" role="status" aria-hidden="true"></span>
                <span class="sr-only">Loading...</span>
            </h1>
        </div>
    </div>
    <nav class="navbar navbar-expand-lg navbar-light">
        <div class="container">
            <img class="title" src="/resources/travel-diary.png" alt="Travel-Diary">
            <form class="search-btn" action="/search" method="GET">
                <input type="search" class="form-control" placeholder="Search Your Destination" name="key">
            </form>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item d-block d-md-none">
                        <a class="nav-link" href="/about">LEARN MORE</a>
                    </li>
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
                </ul>
            </div>

        </div>
    </nav>

    <!---------------------------------navbar end---------------------------------------------->

    <!-------------------------------- top section starts-------------------------------------->
    <section class="top-section">
        <div class="container">
            <div class="front-look">
                <div class=" d-flex justify-content-around row ">
                    <div class=" col-md-6 px-3 order-md-0">
                        <div class="description">
                            <h1>
                                Explore Bangladesh <br />and
                                <span>share stories</span>
                            </h1>
                            <h5>"Sailing round the world in a dirty gondola <br>oh, to be back in the land of
                                Coca-Cola!"</h5>
                            <p class="banner-text">— Bob Dylan</p>
                            <a class="common-btn js--com" href="#signup">Join Our Community</a>
                            <a class="common-btn light" href="{{ route('about') }}">Learn More</a>
                        </div>
                    </div>

                    <div class="col-md-6 px-3 mb-3 order-md-0">
                        <div class="forms-pane" id="forms">
                            {{-- login form --}}
                            <div id="login-form">
                                @if (session('message'))
                                    <div class="alert alert-danger">{{ session('message') }}</div>
                                @endif
                                <form method="POST" action="{{ route('login') }}" class="log-sign-form">
                                    @csrf
                                    <h3>Explore <span>Now</span></h3>
                                    <div class="input-group mb-2 mr-sm-2">
                                        <div class='input-group-prepend'>
                                            <div class='input-group-text'>@</div>
                                        </div>
                                        <input id="email" type="email"
                                            class="form-control @error('email') is-invalid @enderror" name="email"
                                            value="{{ old('email') }}" placeholder="Username or E-mail" required
                                            autocomplete="email" autofocus>
                                        @error('email')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <input id="password" type="password"
                                        class="mb-2 mr-sm-2 form-control @error('password') is-invalid @enderror"
                                        name="password" placeholder="Password" required autocomplete="current-password">

                                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                    <div class="form-check mb-2 mr-sm-2">
                                        <input class="form-check-input" type="checkbox" name="remember" id="remember"
                                            {{ old('remember') ? 'checked' : '' }}>

                                        <label class="form-check-label" for="remember">
                                            {{ __('Remember Me') }}
                                        </label>
                                    </div>
                                    <input type="submit" class="form-control mb-2 mr-sm-2 btn" value="Login">
                                    <p class="text-center">First time here? Create an account for free</p>
                                </form>
                                <button id="signup-btn" class='form-control mb-2 mr-sm-2 btn toggle-btn'>Signup</button>
                            </div>

                            {{-- registration form --}}
                            <div id="signup-form" style="display: none;">
                                <form method="POST" action="{{ route('register') }}" class="log-sign-form"
                                    autocomplete="off">
                                    @csrf
                                    <h3>Open a Diary <span>Now</span></h3>
                                    <input id="name" type="text"
                                        class="mb-2 mr-sm-2 form-control @error('name') is-invalid @enderror" name="name"
                                        value="{{ old('name') }}" placeholder="Your name" required autocomplete="name"
                                        autofocus>

                                    @error('name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                    <input type="email"
                                        class="form-control mb-2 mr-sm-2 @error('email') is-invalid @enderror" name="email"
                                        value="{{ old('email') }}" placeholder="Your email" required
                                        autocomplete="email">

                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                    <input type="password"
                                        class="mb-2 mr-sm-2 form-control @error('password') is-invalid @enderror"
                                        name="password" placeholder="Password (Between 6 and 20 characters)" required
                                        pattern="^(.){6,20}$" autocomplete="new-password">

                                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                    <input id="password-confirm" type="password" class="mb-2 mr-sm-2 form-control"
                                        name="password_confirmation" placeholder="Confirm password" required
                                        pattern="^(.){6,20}$" autocomplete="off">
                                    <input type="submit" class="form-control mb-2 mr-sm-2 btn" value="Signup">
                                    <p class="text-center">Already have an account?</p>
                                </form>
                                <button id="login-btn" class='form-control mb-2 mr-sm-2 btn toggle-btn'>Login</button>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </section>
    <script src="https://unpkg.com/typeit"></script>
    <script>
        typedJs = new TypeIt('#textContainer', {
            strings: "Loading resources in your browser for the first time may take a while. Please be patient. ",
            speed: 50,
            startDelay: 0,
        });
        setTimeout(function() {
            typedJs.go();
        }, 1000);
    </script>
@endsection
