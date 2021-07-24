@extends('layouts.app') ;

@section('css')
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
@endsection

<div class="alert alert-danger">
    {{ $place->description }}

    <br>

    @foreach($place->placePics as $pic) 
        <img src="{{ asset('resources/places/' . $pic->path)}}" alt="">
    @endforeach

</div>