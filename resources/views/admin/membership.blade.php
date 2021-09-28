@extends('admin.app')

@section('content')

    <div class="card mt-3 mb-2">
        <h3 class="card-header text-center text-primary mb-3 font-weight-bold">
            Membership Requests
        </h3>
        @if ($requests->count() < 1)
            <div class="alert bg-white">
                <p class="text-center mb-0">
                    No request left
                </p>
            </div>
        @else
            <div class="card-body">
                @foreach ($requests as $request)
                    <div class="card mb-3 package">

                        <div class="row no-gutters">
                            <div class="col-md-4 placeholder-img overflow-hidden my-auto">
                                <img src="/resources/profile/{{ $request->user->dp }}">
                            </div>
                            <div class="col-md-7 my-auto">
                                <div class="card-body">
                                    <h4><a href="/profile/{{ $request->user->username }}">{{ $request->user->name }}</a>
                                    </h4>
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
                                        <input type="submit" class="btn btn-sm btn-success m-1" name="status"
                                            value="Accept">
                                        <input type="submit" class="btn btn-sm btn-danger m-1" name="status"
                                            value="Decline">
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        @endif
    </div>
@endsection
