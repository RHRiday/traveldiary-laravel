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
    <div class="container mt-3">
        <h1 class="text-center border-bottom mb-3">
            Membership Requests
        </h1>
        @if ($requests->count() < 1)
            <div class="alert bg-white">
                <p class="text-center mb-0">
                    No request left
                </p>
            </div>
        @endif
        @foreach ($requests as $request)
            <div class="card mb-3 package">

                <div class="row no-gutters">
                    <div class="col-md-4 placeholder-img overflow-hidden my-auto">
                        <img src="/resources/profile/{{ $request->user->dp }}">
                    </div>
                    <div class="col-md-7 my-auto">
                        <div class="card-body">
                            <h4><a href="/profile/{{ $request->user->username }}">{{ $request->user->name }}</a></h4>
                            <p class="mb-1">
                                <i class="fa fa-map-marker-alt" title="Location" aria-hidden="true"></i>
                                {{ $request->user->location }}
                            </p>
                            <p class="mb-0">
                                <i class="fa fa-user" title="NID" aria-hidden="true"></i>
                                {{ $request->national_id }}
                            </p>
                            <p class="mb-0 text-justify">
                                <i class="fa fa-phone" title="Contact" aria-hidden="true"></i>
                                {{ $request->contact }}
                            </p>
                        </div>
                    </div>
                    <div class="m-auto col-md-1">
                        <div class="float-md-right mr-md-2 text-center mb-1">
                            <form action="/memberships/{{ $request->id }}" method="POST">
                                @csrf
                                <input type="submit" class="btn btn-sm btn-success m-1" name="status" value="Accept">
                                <input type="submit" class="btn btn-sm btn-danger m-1" name="status" value="Decline">
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
