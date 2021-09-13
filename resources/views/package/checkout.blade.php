@extends('layouts.app')

@section('title')
    <title>Buy Package</title>
@endsection

@section('css')
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link rel="stylesheet" href="{{ asset('css/package.css') }}">
@endsection

@section('content')
    @include('partials.nav')

    <!--main section starts-->
    <div class="container">
        <div class="my-4 text-center">
            <h2>{{ $package->title }}</h2>
            <p class="lead">{{ $package->description }}</p>
        </div>

        <div class="row">
            <div class="col-md-4 order-md-2 mb-4">
                <h4 class="d-flex justify-content-between align-items-center mb-3">
                    <span class="text-muted">Package</span>
                </h4>
                <ul class="list-group mb-3">
                    <li class="list-group-item d-flex justify-content-between lh-condensed">
                        <div>
                            <h6 class="my-0">Type</h6>
                        </div>
                        <span class="text-muted">{{ $package->type }}</span>
                    </li>
                    <li class="list-group-item d-flex justify-content-between lh-condensed">
                        <div>
                            <h6 class="my-0">Location</h6>
                        </div>
                        <span class="text-muted">{{ $package->location }}</span>
                    </li>
                    <li class="list-group-item d-flex justify-content-between">
                        <span>Price (BDT)</span>
                        <strong>{{ $package->price }}</strong>
                    </li>
                </ul>
            </div>
            <div class="col-md-8 order-md-1">
                <h4 class="mb-3">Billing information</h4>
                <form action="{{ url('/pay') }}" method="POST" class="needs-validation">
                    @csrf
                    <div class="mb-3">
                        <label>Full name</label>
                        <input type="text" name="name" class="form-control" value={{ $user->name }} readonly>
                    </div>
                    <div class="mb-3">
                        <label>Email</label>
                        <input type="email" value={{ $user->email }} name="email" class="form-control" readonly>
                    </div>
                    <div class="mb-3">
                        <input hidden type="number" value={{ $package->id }} name="package_id" class="form-control" id="id"
                                 required>
                    </div>
                    <div class="mb-3">
                        <label for="mobile">Phone <span class="text-muted">(Account with payment apps)</span></label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text">+88</span>
                            </div>
                            <input type="text" name="phone" class="form-control" id="mobile" placeholder="ex: 01912345678"
                                pattern="01[0-9]{9}" required>
                            <div class="invalid-feedback" style="width: 100%;">
                                Your Mobile number is required.
                            </div>
                        </div>
                    </div>
                    <input type="hidden" name="amount" value="{{ $package->price }}">
                    <hr class="mb-4">
                    <button class="btn btn-primary btn-lg btn-block" type="submit">Continue to checkout</button>
                </form>
            </div>
        </div>
    </div>

    @include('partials.footer')
@endsection
