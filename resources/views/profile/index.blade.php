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
    <style>
        .badge {
            display: inline-block;
            padding: 0.3rem 0.25rem !important;
            font-size: .7rem !important;
            font-weight: 700;
            line-height: 1;
            text-align: center;
            white-space: nowrap;
            vertical-align: baseline;
            border-radius: 50%;
            background-color: #21b573 !important;
            color: white !important;
        }

    </style>
@endsection

@section('content')
    <!-- Followers-following Modal -->
    <div id="followers" class="modal">
        <div class="follow-people">
            <h3>{{ $user->name }}'s followers</h3> <br>
            @foreach ($followers as $follower)
                <a href="/profile/{{ $follower->username }}">
                    <div class="all-follower">
                        <div class="col-2">
                            <div class="circular-img">
                                <img src="{{ $follower->dp }}">
                            </div>
                        </div>
                        <div class="col-6">
                            <p class="follow-name">{{ $follower->name }}</p>
                            <p class="follow-username">@ {{ $follower->username }}</p>
                        </div>

                        <div class="col-4">
                            @if ($follower->status($follower->id))
                                @if ($follower->id == Auth::id())
                                    <a href="/profile/{{ $follower->username }}">
                                        <button class="btn-follow">Profile</button>
                                    </a>
                                @else
                                    <a href="/follow/{{ $follower->id }}">
                                        <button class="btn-follow">Unfollow</button>
                                    </a>
                                @endif
                            @else
                                <a href="/follow/{{ $follower->id }}">
                                    <button class="btn-follow">Follow</button>
                                </a>
                            @endif
                        </div>
                    </div>
                </a>
            @endforeach
            <h6>Nothing more to show here</h6>
        </div>
    </div>
    <div id="following" class="modal">
        <div class="follow-people">
            <h3>{{ $user->name }} is following</h3> <br>
            @foreach ($followings as $following)
                <a href="/profile/{{ $following->username }}">
                    <div class="all-follower">
                        <div class="col-2">
                            <div class="circular-img">
                                <img src="{{ $following->dp }}">
                            </div>
                        </div>
                        <div class="col-6">
                            <p class="follow-name">{{ $following->name }}</p>
                            <p class="follow-username">@ {{ $following->username }}</p>
                        </div>

                        <div class="col-4">
                            @if ($following->status($following->id))
                                @if ($following->id == Auth::id())
                                    <a href="/profile/{{ $following->username }}">
                                        <button class="btn-follow">Profile</button>
                                    </a>
                                @else
                                    <a href="/follow/{{ $following->id }}">
                                        <button class="btn-follow">Unfollow</button>
                                    </a>
                                @endif
                            @else
                                <a href="/follow/{{ $following->id }}">
                                    <button class="btn-follow">Follow</button>
                                </a>
                            @endif
                        </div>
                    </div>
                </a>
            @endforeach
            <h6>Nothing more to show here</h6>
        </div>
    </div>

    <div class="container">
        <div class="row">
            <!-------- LEFT CONTENT-------->
            @include('partials.left')

            <!-------- MIDDLE CONTENT-------->

            <div class="col-6 middle">
                <div class="middleContent page-head">
                    <a class="title" href="">
                        <i class="fas fa-user"></i> &nbsp; Profile
                    </a>
                    <a class="btn-post" href="{{ route('story.create') }}">Post</a>
                </div>

                <!-- phone view -->
                @include('partials.phone')

                {{-- user profile --}}
                <div class="middleContent">
                    <div class="details-profile">
                        <div class="cover-picture">
                            <img src="{{ $user->cover }}" class="zoom medium-zoom-image">
                        </div>
                        <div class="profile-picture">
                            <img src="{{ $user->dp }}" class="zoom medium-zoom-image">
                        </div>

                        <div>
                            @if ($user->id === Auth::id())
                                <a href="/profile/edit">
                                    <button class="profile-btn">Edit Profile</button>
                                </a>
                            @else
                                <a href="/follow/{{ $user->id }}">
                                    <button
                                        class="profile-btn">{{ $user->status($user->id) ? 'Unfollow' : 'Follow' }}</button>
                                </a>
                            @endif
                        </div>
                    </div>
                    <div class="details-profile2">
                        <div class="name-and-handle">
                            <h4 class="profile-name">{{ $user->name }}
                                @if ($user->username == 'rhriday' || $user->username == 'noyon31' || $user->username == 'shajjad71')
                                    <a href="/about"><i class="fas fa-code badge" title="Dev Badge"></i></a>
                                @endif
                            </h4>
                            <p class="profile-handle" title="Username">@ {{ $user->username }}</p>
                            <p class="profile-name"><i class="fa fa-map-marker-alt" title="Location"
                                    aria-hidden="true"></i>
                                {{ $user->location ? $user->location : 'N/A' }}</p>
                            <p class="profile-handle"><i class="fa fa-bookmark" title="Points"></i> {{ $user->points }}
                            </p>
                        </div>
                        <div class="followers-and-following">
                            <a href="#followers" rel="modal:open"><span>{{ $followers->count() }}</span> Followers </a>
                            &nbsp;
                            &nbsp;
                            <a href="#following" rel="modal:open"><span>{{ $followings->count() }}</span> Following</a>
                        </div>
                    </div>
                </div>

                <a class="middleContent post-story" href="{{ route('story.create') }}">Post your story</a>
                <!-- //posts of users followed by the logged user// -->
                @foreach ($user->posts->reverse() as $post)
                    <div class="middleContent">
                        <div class="row">
                            <div class="col-2">
                                <div class="DP-circular-img">
                                    <a href="/profile/{{ $user->username }}">
                                        <img src="{{ $user->dp }}">
                                    </a>
                                </div>
                            </div>
                            <div class="col-10">
                                <div>
                                    <div id="post-option{{ $post->id }}" class="modal">
                                        @if ($user->id === Auth::id())
                                            <a class="middleContent modal-link"
                                                href="{{ route('story.edit', $post->id) }}">Edit</a>
                                        @else
                                            <a class="middleContent modal-link"
                                                href="{{ route('story.report', $post->id) }}">Report</a>
                                        @endif
                                    </div>
                                    <div>
                                        <a class="name"
                                            href="/profile/{{ $user->username }}">{{ $user->name }}</a>
                                        &nbsp;<span>.</span>&nbsp;
                                        <a href="/story/{{ $post->id }}" style="font-size: 60%;"
                                            class="name">{{ $post->time($post->created_at) }}</a>
                                        <a href="#post-option{{ $post->id }}" rel="modal:open"><i
                                                class="fas fa-ellipsis-h"></i></a>
                                    </div>
                                    <p class="profile-name">at — {{ $post->location }}</p>
                                    <h2 class="title">{{ $post->title }}</h2>
                                    <p class="caption">
                                        {{ mb_substr($post->story, 0, 550) }} <a style="color: cadetblue"
                                            href="/story/{{ $post->id }}">. . . read</a>
                                    </p>
                                </div>
                                <div class="pic-post">
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
                                                    <img class="zoom"
                                                        src="{{ $post->postPics->first()->path }}">
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
                    </div>
                @endforeach
                <!-- end of posts -->
                <div class="middleContent">
                    <div class="row end-of-post">
                        <p>This diary ends here!!</p>
                    </div>
                </div>
            </div>

            <!-------- RIGHT CONTENT-------->
            @include('partials.right')

        </div>
    </div>

@endsection
