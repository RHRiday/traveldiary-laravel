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
        @if ($membership == 'pending')
            <div class="alert alert-success container mt-5 text-center">
                Your request is submitted. Please wait for our response to become a member of this community.
            </div>
        @else

        @endif
    @endif

    @include('partials.footer')
@endsection
