@extends('layouts.app')
@section('title')
    <title>{{ $user->name }}</title>
@endsection
@section('css')
    <link rel="stylesheet" href="{{ asset('css/home.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-modal/0.9.1/jquery.modal.min.css" />
    <!-- FONT links -->
    <link href="https://fonts.googleapis.com/css2?family=Source+Sans+Pro:wght@300;400;600;700;900&display=swap"
        rel="stylesheet" />
    <!-- FONT-ICON LINK  -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" />

    <link rel="preconnect" href="https://fonts.gstatic.com" />
@endsection

@section('content')

    <div class="container">
        <div class="row">
            <!-------- LEFT CONTENT-------->
            @include('partials.left')

            <!-------- MIDDLE CONTENT-------->
            <div class="col-6 middle">
                <!-- phone view -->
                @include('partials.phone')
                <a class="middleContent post-story">Edit your profile</a>
                <div class="middleContent">
                    <form action="/profile/edit" enctype="multipart/form-data" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="details-profile">
                            <div class="cover-picture">
                                <img src="/resources/cover/{{ $user->cover }}" class="z">
                            </div>
                            <div class="profile-picture">
                                <img src="/resources/profile/{{ $user->dp }}" class="z">
                            </div>
                        </div>
                        <div class="row">
                            <input type="text" class="textarea title" name="name" placeholder="Your name"
                                value="{{ $user->name }}" autocomplete="off" required>
                            <select type="text" class="textarea title" name="location" required>
                                @foreach ($upazilas as $upazila)
                                    <option value="{{ $upazila }}" {{ $user->location == $upazila ? 'selected' : '' }}>
                                    {{ $upazila }}</option>
                                @endforeach
                            </select>
                            <input type="password" class="textarea title" name="password"
                                placeholder="New password (Leave blank to leave unchanged)" autocomplete="off">
                            <label class="btn-follow" for="dp">Click Here to change Profile Picture</label>
                            <input id="dp" type="file" name="dp" accept="image/*" hidden>
                            <label class="btn-follow" for="cp">Click Here to change Cover Picture</label>
                            <input id="cp" type="file" name="cp" accept="image/*" hidden>
                            <div class="row">
                                <input type="submit" value="Update" class="btn-post">
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <!-------- RIGHT CONTENT-------->
            @include('partials.right')

        </div>
    </div>

@endsection
