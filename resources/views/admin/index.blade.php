@extends('layouts.app')

@section('title')
    <title>Admin Panel</title>
@endsection

@section('css')
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
@endsection

@section('content')
    <div class="navbar navbar-dark bg-dark shadow-sm">
        <div class="container d-flex justify-content-between">
            <a href="{{ route('admin.index') }}" class="navbar-brand d-flex align-items-center">
                <img src="{{ asset('logo.ico') }}" alt="logo" width="30x">
                <strong>&nbsp;TravelDiary</strong>
            </a>
            <form id="logout-form" action="http://localhost:8080/logout" method="POST" hidden>
                @csrf
            </form>
            <a title="Logout" href="http://localhost:8080/logout" onclick="event.preventDefault();
                                                    document.getElementById('logout-form').submit();"><i
                    class="fas fa-sign-out-alt"></i>
                Logout
            </a>
        </div>
    </div>
    <main role="main">
        <section class="my-5 text-center">
            <div class="container">
                <h1>Admin Panel</h1>
                <a href="{{ route('admin.create') }}" class="btn btn-primary my-2">Add More Places</a>
                <a href="#" class="btn btn-secondary my-2">Contribution Requests</a>
                @if (session()->has('message'))
                    <p class="alert alert-success">{{ session()->get('message') }}</p>
                @endif
            </div>
        </section>

        <div class="album bg-light">
            <div class="container">
                <h3 class="py-2 mb-3 rounded text-light text-center bg-secondary">Places</h3>
                <div class="row">
                    @foreach ($places as $place)
                        <div class="col-md-4">
                            <div class="card mb-4 shadow-sm">
                                <img class="bd-placeholder-img card-img-top" src="{{ asset('resources/coxs-bazar.jpg') }}"
                                    width="100%" height="225">
                                <div class="card-body">
                                    <h3 class="card-title">{{ $place->name }}</h3>
                                    <p class="card-text">{{ $place->location }}</p>
                                    <p class="card-text">{{ $place->description }}</p>
                                    <div class="d-flex justify-content-between align-items-center">
                                        <div class="btn-group">
                                            <button type="button" class="btn btn-sm btn-outline-secondary">View</button>
                                            <button type="button" class="btn btn-sm btn-outline-secondary">Edit</button>
                                        </div>
                                        <small class="text-muted">{{ $place->type }}</small>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>

    </main>
@endsection
