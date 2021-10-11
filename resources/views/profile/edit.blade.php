@extends('layouts.app')
@section('title')
    <title>{{ $user->name }}</title>
@endsection
@section('css')
    <link rel="stylesheet" href="{{ asset('css/home.css') }}">
    <style>
        input[type="password"]::placeholder {
            font-size: 90%;
        }

        .changer {
            display: flex;
            justify-content: space-around;
            margin-top: 10px;
        }

        .errors {
            background-color: rgba(220, 20, 60, 0.041);
            padding: 20px;
            font-size: 80%;
        }
        .errors>strong {
            color: crimson;
        }

    </style>
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
                                <img src="{{ $user->cover }}" class="z" id="edit-cp">
                            </div>
                            <div class="profile-picture">
                                <img src="{{ $user->dp }}" class="z" id="edit-dp">
                            </div>
                        </div>
                        <div class="row">
                            <input type="text" class="textarea title" name="name" placeholder="Your name"
                                value="{{ $user->name }}" autocomplete="off" required>
                            <select type="text" class="textarea title" name="location" required>
                                @foreach ($upazilas as $upazila)
                                    <option value="{{ $upazila }}"
                                        {{ $user->location == $upazila ? 'selected' : '' }}>
                                        {{ $upazila }}</option>
                                @endforeach
                            </select>
                            <input type="password" class="textarea title" name="password"
                                placeholder="Change password (or leave blank)" autocomplete="off">
                            <div class="changer">
                                <label class="btn-follow" for="dp">Change Profile Picture</label>
                                <input id="dp" type="file" name="dp" accept="image/*"
                                    onchange="changePicture(this, 'edit-dp')" hidden>
                                <label class="btn-follow" for="cp">Change Cover</label>
                                <input id="cp" type="file" name="cp" accept="image/*"
                                    onchange="changePicture(this, 'edit-cp')" hidden>
                            </div>
                            <div class="row">
                                <input type="submit" value="Update" class="btn-post">
                            </div>
                        </div>
                    </form>
                </div>
                @if (count($errors) > 0)
                    <div class="middleContent errors">
                        <strong>Please fix the problems with your input.</strong>
                        <ol>
                            @foreach ($errors->all() as $error)
                                <li>{{$loop->index+1 .'. '. $error }}</li>
                            @endforeach
                        </ol>
                    </div>
                @endif
            </div>
            <!-------- RIGHT CONTENT-------->
            @include('partials.right')

        </div>
    </div>

@endsection
