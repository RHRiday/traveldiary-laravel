@extends('layouts.app')

@section('title')
    <title>Applicants</title>
@endsection

@section('css')
    <link rel="stylesheet" href="/css/app.css">
@endsection

@section('content')
    @include('partials.nav')

    <div class="container">
        <h3 class="text-center mt-5">{{ $data->place->name }}</h3>
        <h4 class="text-center mt-2 alert alert-info">Applicants</h4>
        @if ($status === false)
            @if ($data->applications->count() < 1)
                <div class="alert bg-white">
                    <p class="text-center mb-0">
                        No applications at the moment. Please be patient!
                    </p>
                </div>
            @endif
            @foreach ($data->applications->all() as $application)
                <div class="row">
                    <div class="card mb-3 package col-lg-6">
                        <div class="row no-gutters">
                            <div class="col-3 my-auto">
                                <img src="/resources/profile/{{ $application->guide->user->dp }}" width="100%">
                            </div>
                            <div class="col-7 my-auto">
                                <div class="card-body">
                                    <h4>
                                        <a
                                            href="/profile/{{ $application->guide->user->username }}">{{ $application->guide->user->name }}</a>
                                    </h4>
                                    <p class="mb-1">
                                        <i class="fa fa-map-marker-alt" title="Location" aria-hidden="true"></i><span
                                            class="sr-only">Location</span>
                                        {{ $application->guide->user->location }}
                                    </p>
                                    <p class="mb-0">
                                        <i class="fa fa-bookmark" title="Points" aria-hidden="true"></i><span
                                            class="sr-only">Points</span>
                                        {{ $application->guide->user->points }}
                                    </p>
                                    <p class="mb-0">
                                        <i class="fa fa-phone" title="Contact" aria-hidden="true"></i><span
                                            class="sr-only">Contact</span>
                                        {{ $application->guide->contact }}
                                    </p>
                                </div>
                            </div>
                            <div class="m-auto col-2">
                                <div class="float-md-right text-center mb-1">
                                    @if ($data->guide_id == null && $data->date > now())
                                        <form action="{{ route('hires.hire', $data->id) }}" method="POST">
                                            @csrf
                                            <input type="hidden" value="{{ $application->guide->id }}" name="guide">
                                            <input type="submit" value="Hire" class="btn btn-success">
                                        </form>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        @else
            <div class="card mb-3 package col-md-8 mx-auto">
                <div class="row no-gutters">
                    <div class="col-3 my-auto">
                        <img src="/resources/profile/{{ $data->guide->user->dp }}" width="100%">
                    </div>
                    <div class="col-7 my-auto">
                        <div class="card-body">
                            <h4>
                                <a
                                    href="/profile/{{ $data->guide->user->username }}">{{ $data->guide->user->name }}</a>
                                is hired
                            </h4>
                            <p class="mb-0">
                                <i class="fa fa-clock" title="Time" aria-hidden="true"></i><span class="sr-only">Time</span>
                                {{ $data->date }}
                            </p>
                            <p class="mb-0">
                                <i class="fa fa-phone" title="Contact" aria-hidden="true"></i><span
                                    class="sr-only">Contact</span>
                                {{ $data->guide->contact }}
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        @endif

    </div>

    @include('partials.footer')
@endsection
