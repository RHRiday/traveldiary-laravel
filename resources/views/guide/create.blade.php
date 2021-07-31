@extends('layouts.app')

@section('title')
    <title>Become a guide</title>
@endsection

@section('css')
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
@endsection

@section('content')
    @include('partials.nav')

    <div class="container">
        <div class="mt-3 text-center">
            <h2 class="bg-danger py-2 mx-md-5 rounded text-light">Become a member</h2>
        </div>

        <div class="row">
            <div class="col-md-10 mx-auto">

                <div class="alert alert-danger">
                    @if (count($errors) > 0)
                        <strong>Sorry!</strong> There were some problems with your input.
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    @else
                        Please input carefully. Your request will be validated.
                    @endif
                </div>

                <form action="{{ route('guides.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="col-12 col-lg-6 mb-3">
                            <label for="nid">National ID</label>
                            <input name="nid" type="text" pattern="[0-9]*" class="form-control" id="nid"
                                placeholder="NID number" value="{{ old('nid') }}" required>
                        </div>
                        <div class="col-12 col-lg-6 mb-3">
                            <label for="contact">Contact no.</label>
                            <input name="contact" type="text" pattern="01[0-9]{9}" class="form-control" id="contact"
                                placeholder="ex: 01234567890" value="{{ old('contact') }}" required>
                        </div>
                    </div>
                    <hr class="mb-4">
                    <button class="btn btn-success btn-lg text-light" type="submit">Submit</button>
                </form>
            </div>
        </div>
    </div>

    @include('partials.footer');
@endsection
