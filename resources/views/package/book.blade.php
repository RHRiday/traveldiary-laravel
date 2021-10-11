@extends('layouts.app')

@section('title')
    <title>Packages</title>
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
            <p class="lead">{!! $package->description !!}</p>
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
                        <strong id="package_price">{{ $package->price }}</strong>
                    </li>
                </ul>
            </div>
            <div class="col-md-8 order-md-1">
                <h4 class="mb-3">Booking information</h4>
                <form action="{{ route('packages.book', $package->id) }}" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label>Full name</label>
                        <input type="text" name="name" class="form-control" value="{{ $user->name }}" readonly>
                    </div>
                    <div class="mb-3">
                        <label>Email</label>
                        <input type="email" value="{{ $user->email }}" name="email" class="form-control" readonly>
                    </div>
                    <div class="mb-3">
                        <label for="phone">Phone</label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text">+88</span>
                            </div>
                            <input type="text" name="phone" class="form-control" id="phone" placeholder="ex: 01912345678"
                                pattern="01[0-9]{9}" required>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-6 mb-3">
                            <label for="book_for">Book for</label>
                            <input type="number" name="book_for" min="1" class="form-control" id="book_for"
                                placeholder="Number of people you want to book for" required>
                        </div>
                        <div class="col-6 mb-3">
                            <label for="total_price">Total price (BDT)</label>
                            <input type="number" name="total_price" value="0" class="form-control" id="total_price" readonly>
                        </div>
                    </div>
                    <hr class="mb-4">
                    <button class="btn btn-primary btn-lg btn-block" type="submit">Continue to book</button>
                </form>
            </div>
        </div>
    </div>

    @include('partials.footer')
@endsection
