@extends('layouts.app')

@section('title')
    <title>Contribute</title>
@endsection

@section('css')
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
@endsection

@section('content')
@include('partials.nav')
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
                <form class="needs-validation" action="{{ route('place.store') }}" method="POST"
                    enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="col-12 mb-3">
                            <label for="name">Name</label>
                            <input name="name" type="text" class="form-control" id="name" placeholder="Write a title here"
                                value="{{ old('name') }}" required>
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
                            <input name="type" class="form-control" list="types" placeholder="ex: Beach"
                                value="{{ old('type') }}" required>
                            <datalist id="types">
                                @foreach ($types as $type)
                                    <option value="{{ $type }}">
                                @endforeach
                            </datalist>
                        </div>
                        <div class="col-md-3 mb-3">
                            <label for="budget">Budget</label>
                            <input name="budget" type="text" class="form-control" id="budget"
                                placeholder="From checkpoint (in BDT)" pattern="[0-9]*" value="{{ old('budget') }}"
                                required>
                        </div>
                        <div class="col-12 mb-3">
                            <label for="checkpoint">Checkpoint</label>
                            <input name="checkpoint" type="text" class="form-control" id="checkpoint"
                                placeholder="Where to begin" value="{{ old('checkpoint') }}" required>
                        </div>
                        <div class="col-12 mb-3">
                            <label for="description">Short description</label>
                            <input name="description" type="text" class="form-control" id="description"
                                placeholder="An attracting detail of the place" value="{{ old('description') }}" required>
                        </div>
                        <div class="col-12 mb-3">
                            <label for="direction">Direction</label>
                            <textarea name="direction" rows="5" class="form-control" id="direction"
                                placeholder="Direction from the checkpoint" required>{{ old('direction') }}</textarea>
                        </div>
                        <div class="col-12 mb-3">
                            <label for="info">Additional info (Optional)</label>
                            <textarea name="info" rows="3" class="form-control" id="info"
                                placeholder="ex: Don't dust the place">{{ old('info') }}</textarea>
                        </div>
                        <div class="col-12 mb-3">
                            <label for="image">Image(s)</label>
                            <input name="image[]" type="file" accept="image/*" class="form-control" id="image" multiple
                                required>
                        </div>
                    </div>
                    <hr class="mb-4">
                    <button class="btn btn-info btn-lg btn-block" type="submit">Submit</button>
                </form>
            </div>
        </div>
    </div>
    
    @include('partials.footer')
@endsection