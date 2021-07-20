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
    <div class="container">
        <div class="mt-3 text-center">
            <img class="d-block mx-auto mb-4" src="{{ asset('logo.ico') }}" alt="" width="72" height="72">
            <h2 class="bg-dark py-2 mx-5 rounded text-light">Add Tour Spots</h2>
        </div>

        <div class="row">
            <div class="col-md-10 mx-auto">
                <form class="needs-validation" action="{{ route('admin.store') }}" method="POST">
                    @csrf
                    <div class="row">
                        <div class="col-12 mb-3">
                            <label for="name">Name</label>
                            <input name="name" type="text" class="form-control" id="name" placeholder="Write a title here"
                                required>
                        </div>
                        <div class="col-md-5 mb-3">
                            <label for="location">Location (Upazila)</label>
                            <select name="location" type="text" class="form-control" id="location"
                                placeholder="ex: Sitakunda" required>
                                @foreach ($upazilas as $upazila)
                                    <option value="{{ $upazila }}">{{ $upazila }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-md-4 mb-3">
                            <label for="Type">Type</label>
                            <input name="type" class="form-control" list="types" placeholder="ex: Beach" required>
                            <datalist id="types">
                                @foreach ($types as $type)
                                    <option value="{{ $type }}">
                                @endforeach
                            </datalist>
                        </div>
                        <div class="col-md-3 mb-3">
                            <label for="budget">Budget</label>
                            <input name="budget" type="text" class="form-control" id="budget"
                                placeholder="From checkpoint (in BDT)" pattern="[0-9]*" required>
                        </div>
                        <div class="col-12 mb-3">
                            <label for="checkpoint">Checkpoint</label>
                            <input name="checkpoint" type="text" class="form-control" id="checkpoint"
                                placeholder="Where to begin" required>
                        </div>
                        <div class="col-12 mb-3">
                            <label for="description">Short description</label>
                            <input name="description" type="text" class="form-control" id="description"
                                placeholder="An attracting detail of the place" required>
                        </div>
                        <div class="col-12 mb-3">
                            <label for="direction">Direction</label>
                            <textarea name="direction" rows="5" class="form-control" id="direction"
                                placeholder="Direction from the checkpoint" required></textarea>
                            <div class="invalid-feedback">
                                Valid direction is required.
                            </div>
                        </div>
                        <div class="col-12 mb-3">
                            <label for="add_info">Additional info (Optional)</label>
                            <textarea name="info" rows="3" class="form-control" id="add_info"
                                placeholder="ex: Don't dust the place"></textarea>
                        </div>
                    </div>
                    <hr class="mb-4">
                    <button class="btn btn-info btn-lg btn-block" type="submit">Add to the site</button>
                </form>
            </div>
        </div>

        <footer class="my-5 pt-5 text-muted text-center text-small">
            <p class="mb-1">© 2020-2021 TravelDiary</p>
        </footer>
    </div>
@endsection
