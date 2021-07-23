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
            <a title="Logout" href="http://localhost:8080/logout"
                onclick="event.preventDefault();
                                                                            document.getElementById('logout-form').submit();"><i class="fas fa-sign-out-alt"></i>
                Logout
            </a>
        </div>
    </div>
    <div class="container">
        <div class="mt-3 text-center">
            <img class="d-block mx-auto mb-4" src="{{ asset('logo.ico') }}" alt="" width="72" height="72">
            <h2 class="bg-dark py-2 mx-5 rounded text-light">Add Tour Spots</h2>
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
                <form class="needs-validation" action="{{ route('admin.update', $place->id) }}" method="POST"
                    enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="row">
                        <div class="col-12 mb-3">
                            <label for="name">Name</label>
                            <input name="name" type="text" class="form-control" id="name" placeholder="Write a title here"
                                value="{{ $place->name }}" required>
                        </div>
                        <div class="col-md-5 mb-3">
                            <label for="location">Location (Upazila)</label>
                            <select name="location" type="text" class="form-control" id="location"
                                placeholder="ex: Sitakunda" required>
                                @foreach ($upazilas as $upazila)
                                    <option value="{{ $upazila }}"
                                        {{ $place->location == $upazila ? 'selected' : '' }}>
                                        {{ $upazila }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-md-4 mb-3">
                            <label for="Type">Type</label>
                            <input name="type" class="form-control" list="types" placeholder="ex: Beach"
                                value="{{ $place->type }}" required>
                            <datalist id="types">
                                @foreach ($types as $type)
                                    <option value="{{ $type }}">
                                @endforeach
                            </datalist>
                        </div>
                        <div class="col-md-3 mb-3">
                            <label for="budget">Budget</label>
                            <input name="budget" type="text" class="form-control" id="budget"
                                placeholder="From checkpoint (in BDT)" pattern="[0-9]*" value="{{ $place->budget }}"
                                required>
                        </div>
                        <div class="col-12 mb-3">
                            <label for="checkpoint">Checkpoint</label>
                            <input name="checkpoint" type="text" class="form-control" id="checkpoint"
                                placeholder="Where to begin" value="{{ $place->checkpoint }}" required>
                        </div>
                        <div class="col-12 mb-3">
                            <label for="description">Short description</label>
                            <input name="description" type="text" class="form-control" id="description"
                                placeholder="An attracting detail of the place" value="{{ $place->description }}"
                                required>
                        </div>
                        <div class="col-12 mb-3">
                            <label for="direction">Direction</label>
                            <textarea name="direction" rows="5" class="form-control" id="direction"
                                placeholder="Direction from the checkpoint" required>{{ $place->direction }}</textarea>
                        </div>
                        <div class="col-12 mb-3">
                            <label for="info">Additional info (Optional)</label>
                            <textarea name="info" rows="3" class="form-control" id="info"
                                placeholder="ex: Don't dust the place">{{ $place->additional_info }}</textarea>
                        </div>
                        @foreach ($place->placePics as $pic)
                            <div class="col-4 mb-3">
                                <img src="/resources/places/{{ $pic->path }}" width="100%">
                            </div>
                        @endforeach
                        <div class="col-12 mb-3">
                            <label for="image">Image(s)</label>
                            <input name="image[]" type="file" accept="image/*" class="form-control" id="image" multiple>
                        </div>
                    </div>
                    <hr class="mb-4">
                    <button class="btn btn-info btn-lg btn-block mb-3" type="submit">Add to the site</button>
                </form>
                <form action="{{route('admin.destroy', $place->id)}}" method="POST">
                    @csrf
                    @method('delete')
                    <button class="btn btn-danger btn-lg btn-block" type="submit">Delete</button>
                </form>
            </div>
        </div>

        <footer class="my-5 pt-5 text-muted text-center text-small">
            <p class="mb-1">© 2020-2021 TravelDiary</p>
        </footer>
    </div>
@endsection
