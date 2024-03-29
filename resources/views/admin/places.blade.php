@extends('admin.app')

@section('content')

    <div class="album bg-light">
        <div class="container">
            <h3 class="py-2 mb-3 rounded text-light text-center bg-success">Places</h3>
            <div class="row d-flex justify-content-start">
                @foreach ($places as $place)
                    <div class="col-lg-4">
                        <div class="card mb-4 shadow-sm">
                            <div class="placeholder-img overflow-hidden">
                                <img src="{{ $place->placePics->first()->path }}">
                            </div>
                            <div class="card-body">
                                <h4 class="card-title">{{ $place->name }}</h4>
                                <p class="card-text">{{ $place->location }}</p>
                                <p class="card-text">
                                    {{ mb_substr(strip_tags($place->description), 0, 250) }}</p>
                                <div class="d-flex justify-content-between align-items-center">
                                    <div class="btn-group">
                                        <a href="/places/{{ $place->id }}"
                                            class="btn btn-sm btn-outline-secondary">View</a>
                                        <a href="{{ route('admin.edit', $place->id) }}"
                                            class="btn btn-sm btn-outline-secondary">Edit</a>
                                    </div>
                                    <small class="text-muted">{{ $place->type }}</small>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection
