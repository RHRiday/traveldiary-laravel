@extends('layouts.app')

@section('title')
    <title>Guides {{ $membership ? '| Career' : '' }}</title>
@endsection

@section('css')
    <link rel="stylesheet" href="/css/app.css">
@endsection

@section('content')
    @include('partials.nav')

    @if (!$membership)
        <section id="services" class="mt-4 services section-bg">
            <div class="container">
                <div class="row">
                    <div class="col-lg-4">
                        <div class="section-title" data-aos="fade-right">
                            <h2>New to being a guide?</h2>
                            <p class="text-justify">We offer people to increase their guide profile. It will help you to
                                take
                                advantage of the feature and earn money from it. Build up your points by mentioned actions.
                                A
                                user can post their requirments of a guide for their tours and we give you an opportunity to
                                apply for it. Upon the user's choice of applications you may deal with the user of your
                                requirements over the phone. If accepted, points will be added to your profile.</p>
                        </div>
                        <a href="{{ route('guides.create') }}"
                            class="d-block text-center btn btn-outline-danger my-3">Become a
                            member</a>
                    </div>
                    <div class="col-lg-8">
                        <h2>How to earn points?</h2>
                        <div class="row">
                            <div class="col-md-6 d-flex align-items-stretch">
                                <div class="icon-box" data-aos="zoom-in" data-aos-delay="100">
                                    <div class="icon"><i class="bx bxl-dribbble"></i></div>
                                    <h5><a href="">Contribute</a></h6>
                                        <p class="text-justify">As our site is still new, we'd like you to take this
                                            opportunity
                                            to contribute to our site and earn points from doing so. If your contribution is
                                            validated it will be added to our site in the <a href="/places">places</a>
                                            section.
                                        </p>
                                </div>
                            </div>

                            <div class="col-md-6 d-flex align-items-stretch mt-4 mt-lg-0">
                                <div class="icon-box" data-aos="zoom-in" data-aos-delay="200">
                                    <div class="icon"><i class="bx bx-file"></i></div>
                                    <h5><a href="/packages">Selling packages</a></h5>
                                    <p class="text-justify">We are giving you an opportunity to sell packages as a tour
                                        organizer.
                                        Make your profile rich by selling your packages.</p>
                                </div>
                            </div>

                            <div class="col-md-6 d-flex align-items-stretch mt-4">
                                <div class="icon-box" data-aos="zoom-in" data-aos-delay="300">
                                    <div class="icon"><i class="bx bx-tachometer"></i></div>
                                    <h4><a href="/places">Rating places</a></h4>
                                    <p class="text-justify">We want our users to have the best experience as possible. So we
                                        want to gather as much information as we can collect. Therefore, rating each places
                                        will
                                        earn you some points as well.</p>
                                </div>
                            </div>

                            <div class="col-md-6 d-flex align-items-stretch mt-4">
                                <div class="icon-box" data-aos="zoom-in" data-aos-delay="400">
                                    <div class="icon"><i class="bx bx-world"></i></div>
                                    <h4><a href="/guides">Being a guide</a></h4>
                                    <p class="text-justify">This is self-explainatory. After becoming a guide in our site,
                                        you
                                        will be able to earn points by being selected as a tour guides by the users. Make
                                        sure
                                        your client accepts your offer by enriching your profile with many <a
                                            href="/home">stories</a>.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </section>
    @else
        @if ($membership != 'pending')
            <div class="container mt-3">
                <h1 class="text-center border-bottom mb-3">
                    Guide opportunities
                    <span class="float-right">
                        <a href="/guides?sort=own" class="btn btn-sm btn-primary">My posts</a>
                    </span>
                </h1>
                @if ($data->count() < 1)
                    <div class="alert bg-white">
                        <p class="text-center mb-0">
                            No request at the moment. Please be patient
                        </p>
                    </div>
                @endif
                @foreach ($data as $request)
                    <div class="card mb-3 package">

                        <div class="row no-gutters">
                            <div class="col-md-4 placeholder-img overflow-hidden my-auto">
                                <img src="/resources/places/{{ $request->place->placePics->first()->path }}">
                            </div>
                            <div class="col-md-7 my-auto">
                                <div class="card-body">
                                    <h4><a href="/places/{{ $request->place->id }}">{{ $request->place->name }}</a>
                                    </h4>
                                    <p class="mb-1">
                                        <i class="fa fa-map-marker-alt" title="Location" aria-hidden="true"></i>
                                        {{ $request->place->location }}
                                    </p>
                                    <p class="mb-0">
                                        <i class="fa fa-clock" title="Time" aria-hidden="true"></i>
                                        {{ $request->date }}
                                    </p>
                                    <p class="mb-0">
                                        <i class="fa fa-info" title="Letter" aria-hidden="true"></i>
                                        {{ $request->info_letter }}
                                    </p>
                                </div>
                            </div>
                            <div class="m-auto col-md-1">
                                <div class="float-md-right mr-md-2 text-center mb-1">
                                    <form action="{{ route('guides.apply', $request->id) }}" method="POST">
                                        @csrf
                                        @if ($request->user_id != Auth::id())
                                            @if(!$request->applications->where('guide_id', $user->where('id', Auth::id())->first()->guide->id)->first())    
                                                <input type="submit" class="btn btn-sm btn-success m-1" name="apply"
                                                        value="Apply">
                                            @else
                                                <p class="badge bg-primary text-white p-1">Applied</p>
                                            @endif
                                        @else
                                            <a class="btn btn-sm btn-info m-1"
                                                href="{{ route('guides.show', $request->id) }}">Applicants</a>
                                        @endif

                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        @else
            <div class="alert alert-success container mt-5 text-center">
                Your request is submitted. Please wait for our response to become a member of this community.
            </div>
        @endif
    @endif

    @include('partials.footer')
@endsection
