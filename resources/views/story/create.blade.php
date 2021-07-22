@extends('layouts.app')

@section('title')
    <title>Stories</title>
@endsection

@section('css')
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
@endsection

@section('content')
    <nav class="navbar navbar-expand-md navbar-dark bg-success">
        <div class="container">
            <a class="navbar-brand" href="/home">
                <img class="mx-auto" src="{{ asset('logo.ico') }}" width="32" height="32">
                <span class="d-md-none"> TravelDiary</span>
            </a>
            <button class="navbar-toggler collapsed" type="button" data-toggle="collapse" data-target="#navbarCollapse"
                aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="navbar-collapse collapse" id="navbarCollapse" style="">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item">
                        <a class="nav-link text-light" href="/home">Stories</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-light" href="/profile/{{ Auth::user()->username }}">Profile</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-light" href="/places">Explore</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <div class="container">
        <div class="mt-3 text-center">
            <h2 class="bg-danger py-2 mx-md-5 rounded text-light">Share your Story</h2>
        </div>

        <div class="row">
            <div class="col-md-10 mx-auto">
                @if (count($errors) > 0)
                    <div class="alert alert-danger">
                        <strong>Sorry!</strong> There were some problems with your input.
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <form action="{{ route('story.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="col-12 mb-3">
                            <label for="title">Title</label>
                            <input name="title" type="text" class="form-control" id="title" placeholder="Write a title here"
                                value="{{ old('title') }}" required>
                        </div>
                        <div class="col-md-4 mb-3">
                            <label for="location">Location (Upazila)</label>
                            <select name="location" type="text" class="form-control" id="location" required>
                                @foreach ($upazilas as $upazila)
                                    <option value="{{ $upazila }}"
                                        {{ old('location') == $upazila ? 'selected' : '' }}>
                                        {{ $upazila }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-md-8 mb-3">
                            <label for="image">Image(s)</label>
                            <input name="image[]" type="file" accept="image/*" class="form-control py-1" id="image" multiple
                                required>
                        </div>
                        <div class="col-12 mb-3">
                            <label for="story">Story</label>
                            <textarea name="story" rows="8" class="form-control" id="story"
                                placeholder="Tell us your story briefly" required>{{ old('story') }}</textarea>
                        </div>
                    </div>
                    <hr class="mb-4">
                    <button class="btn btn-success btn-lg btn-block text-light" type="submit">Share story</button>
                </form>
            </div>
        </div>

        <footer class="my-5 pt-5 text-muted text-center text-small">
            <p class="mb-1">© 2020-2021 TravelDiary</p>
        </footer>
    </div>
@endsection
