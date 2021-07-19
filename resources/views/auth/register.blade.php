@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Register') }}</div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('register') }}" class="log-sign-form">
                            @csrf
                            <h3>Open a Diary <span>Now</span></h3>
                            <input id="name" type="text"
                                class="mb-2 mr-sm-2 form-control @error('name') is-invalid @enderror" name="name"
                                value="{{ old('name') }}" placeholder="Your name" required autocomplete="name" autofocus>

                            @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                            <input id="email" type="email"
                                class="form-control mb-2 mr-sm-2 @error('email') is-invalid @enderror" name="email"
                                value="{{ old('email') }}" placeholder="Your email" required autocomplete="email">

                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                            <input id="password" type="password"
                                class="mb-2 mr-sm-2 form-control @error('password') is-invalid @enderror" name="password"
                                placeholder="Password" required autocomplete="new-password">

                            @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                            <input id="mb-2 mr-sm-2 password-confirm" type="password" class="form-control"
                                name="password_confirmation" placeholder="Confirm password" required
                                autocomplete="new-password">
                            <input type="submit" class="form-control mb-2 mr-sm-2 btn" value="Signup">
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
