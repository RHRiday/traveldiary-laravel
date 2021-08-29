@include('admin.includes.adminTop')
{{-- @dd($requests) --}}
    <div class="container mt-3">
        <h1 class="text-center border-bottom mb-3">
            Contribution Requests
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
                        <img src="/resources/stories/{{ $request->post->postPics->first()->path }}">
                    </div>
                    <div class="col-md-7 my-auto">
                        <div class="card-body">
                            <h4><a href="/profile/{{ $request->post->user->username }}">{{ $request->post->user->name }}</a></h4>
                            <p class="mb-1">
                                <i class="fa fa-info" title="Story" aria-hidden="true"></i>
                                <a href="/story/{{$request->post->id}}"> {{ $request->post->title }}</a>
                            </p>
                        </div>
                    </div>
                    <div class="m-auto col-md-1">
                        <div class="float-md-right mr-md-2 text-center mb-1">
                            <form action="/reports/{{ $request->id }}" method="POST">
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
