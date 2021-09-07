@extends('layouts.app')

@section('title')
    <title>Hire a guide</title>
@endsection

@section('css')
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
@endsection

@section('content')
    @include('partials.nav')

    <div class="container">
        <div class="mt-3 text-center">
            <h2 class="bg-danger py-2 mx-md-5 rounded text-light">Hire a guide</h2>
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

                <form action="{{ route('hires.store', $place->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="col-12 my-3 text-center h3">{{ $place->name }}<hr class="w-25"></div>
                        
                        <div class="col-12 col-md-8 mb-3">
                            <label for="letter">Letter:</label>
                            <textarea name="info_letter" class="form-control" id="letter"
                                placeholder="Your expectations from the guide" rows="7"
                                required>{{ old('info_letter') }}</textarea>
                        </div>
                        <div class="col-12 col-lg-6 mb-3">
                            <label for="date">Expected date.</label>
                            <input name="date" type="date" class="form-control" id="date" value="{{ old('date') }}"
                                required>
                        </div>
                    </div>
                    <hr class="mb-4">
                    <button class="btn btn-success text-light" type="submit">Submit</button>
                </form>
            </div>
        </div>
    </div>

    @include('partials.footer')

    <!--main section ends-->
@endsection
