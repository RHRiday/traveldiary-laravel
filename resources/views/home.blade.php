@extends('layouts.app')
@section('title')
    <title>TravelDiary</title>
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
                <div class="middleContent page-head">
                    <a class="title" href="">
                        <i class="fas fa-home"></i> &nbsp; Home
                    </a>
                    <a class="btn-post" href="{{ route('story.create') }}">Post</a>
                </div>

                <!-- phone view -->
                @include('partials.phone')

                <a class="middleContent post-story" href="{{ route('story.create') }}">Post your story</a>
                @if (session()->has('reported'))
                    <div class="middleContent">
                        <div class="row end-of-post">
                            <p style="font-weight: initial">Story has been reported!!</p>
                        </div>
                    </div>
                @endif
                <!-- //posts of users followed by the logged user// -->
                @foreach ($posts as $post)
                    <div class="middleContent">
                        <div class="row">
                            <div class="col-2">
                                <div class="DP-circular-img">
                                    <a href="/profile/{{ $post->user->username }}">
                                        <img src="{{ $post->user->dp }}">
                                    </a>
                                </div>
                            </div>
                            <div class="col-10">
                                <div>
                                    <div id="post-option{{ $post->id }}" class="modal">
                                        @if ($post->user->id === Auth::id())
                                            <a class="middleContent modal-link"
                                                href="{{ route('story.edit', $post->id) }}">Edit</a>
                                        @else
                                            <a class="middleContent modal-link"
                                                href="{{ route('story.report', $post->id) }}">Report</a>
                                        @endif
                                    </div>
                                    <div>
                                        <a class="name"
                                            href="/profile/{{ $post->user->username }}">{{ $post->user->name }}</a>
                                        &nbsp;<span>.</span>&nbsp;
                                        <a href="/story/{{ $post->id }}" style="font-size: 60%;"
                                            class="name">{{ $post->time($post->created_at) }}</a>
                                        <a href="#post-option{{ $post->id }}" rel="modal:open"><i
                                                class="fas fa-ellipsis-h"></i></a>
                                    </div>
                                    <p class="profile-name">at — {{ $post->location }}</p>
                                    <h2 class="title">{{ $post->title }}</h2>
                                    <p class="caption">
                                        {{ mb_substr($post->story, 0, 250) }} <a style="color: cadetblue"
                                            href="/story/{{ $post->id }}">. . . read</a>
                                    </p>
                                </div>
                                <div class="pic-post">
                                    @if ($post->postPics->count() == 1)
                                        @foreach ($post->postPics as $pic)
                                            <div class="postImgCol1">
                                                <img class="zoom" src="{{ $pic->path }}">
                                            </div>
                                        @endforeach
                                    @endif
                                    @if ($post->postPics->count() == 2)
                                        <div class="postImgCol2">
                                            @foreach ($post->postPics as $pic)
                                                <div>
                                                    <img class="zoom" src="{{ $pic->path }}">
                                                </div>
                                            @endforeach
                                        </div>
                                    @endif
                                    @if ($post->postPics->count() > 2)
                                        <div class="postImgCol3">
                                            <div>
                                                <img class="zoom" src="{{ $post->postPics->first()->path }}">
                                            </div>
                                            <a href="/story/{{ $post->id }}">
                                                <div style="background-image:  linear-gradient(to bottom, #00000099, #00000091),
                                                            url({{ $post->postPics[1]->path }});"
                                                    class="moreImg">
                                                    <h2>+{{ $post->postPics->count() - 1 }}</h2>
                                                </div>
                                            </a>
                                        </div>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
                <!-- end of posts -->
                <div class="middleContent">
                    <div class="row end-of-post">
                        <p>Your diary ends here!!</p>
                        <p>Follow more travellers to get more stories!</p>
                    </div>
                </div>
            </div>

            <!-------- RIGHT CONTENT-------->
            @include('partials.right')

        </div>
    </div>

@endsection
