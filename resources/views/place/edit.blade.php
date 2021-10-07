@extends('admin.app')

@section('content')
    <div class="container">
        <div class="mt-3 text-center">
            <h2 class="bg-success py-2 mx-5 rounded text-light">Edit Tour Spots</h2>
        </div>

        <div class="row">
            <div class="col-md-10 mx-auto">
                @if (count($errors) > 0)
                    <div class="alert alert-danger">
                        <strong>Sorry!</strong> There were some problems with your input.
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <form class="needs-validation" action="{{ route('admin.update', $place->id) }}" method="POST"
                    enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="row">
                        <div class="col-12 mb-3">
                            <label for="name">Name</label>
                            <input name="name" type="text" class="form-control" id="name" placeholder="Write a title here"
                                value="{{ $place->name }}" required>
                        </div>
                        <div class="col-md-5 mb-3">
                            <label for="location">Location (Upazila)</label>
                            <select name="location" type="text" class="form-control" id="location"
                                placeholder="ex: Sitakunda" required>
                                @foreach ($upazilas as $upazila)
                                    <option value="{{ $upazila }}"
                                        {{ $place->location == $upazila ? 'selected' : '' }}>
                                        {{ $upazila }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-md-4 mb-3">
                            <label for="Type">Type</label>
                            <input name="type" class="form-control" list="types" placeholder="ex: Beach"
                                value="{{ $place->type }}" required>
                            <datalist id="types">
                                @foreach ($types as $type)
                                    <option value="{{ $type }}">
                                @endforeach
                            </datalist>
                        </div>
                        <div class="col-md-3 mb-3">
                            <label for="budget">Budget</label>
                            <input name="budget" type="text" class="form-control" id="budget"
                                placeholder="From checkpoint (in BDT)" pattern="[0-9]*" value="{{ $place->budget }}"
                                required>
                        </div>
                        <div class="col-12 mb-3">
                            <label for="checkpoint">Checkpoint</label>
                            <input name="checkpoint" type="text" class="form-control" id="checkpoint"
                                placeholder="Where to begin" value="{{ $place->checkpoint }}" required>
                        </div>
                        <div class="col-12 mb-3">
                            <label for="description">Short description</label>
                            <p>
                                <input id="description" type="hidden" name="description" value="{{ $place->description }}"
                                    required />
                                <trix-editor input="description" placeholder="A good detail attracts more visitors">
                                </trix-editor>
                            </p>
                        </div>
                        <div class="col-12 mb-3">
                            <label for="direction">Direction</label>
                            <p>
                                <input id="direction" type="hidden" name="direction" value="{{ $place->direction }}"
                                    required />
                                <trix-editor input="direction" placeholder="Direction from the checkpoint">
                                </trix-editor>
                            </p>
                        </div>
                        <div class="col-12 mb-3">
                            <label for="info">Additional info (Optional)</label>
                            <p>
                                <input id="info" type="hidden" name="info" value="{{ $place->additional_info }}"
                                    required />
                                <trix-editor input="info" placeholder="Cautions and regulations to take in account">
                                </trix-editor>
                            </p>
                        </div>
                        @foreach ($place->placePics as $pic)
                            <div class="col-4 mb-3">
                                <img src="{{ $pic->path }}" class="zoom" width="100%">
                            </div>
                        @endforeach
                        <div class="col-12 mb-3">
                            <label for="image">Image(s) <small>(Reverts previous)</small> </label>
                            <input name="image[]" type="file" accept="image/*" class="form-control" id="image" multiple>
                        </div>
                    </div>
                    <hr class="mb-4">
                    <button class="btn btn-info btn-lg btn-block mb-3" type="submit">Update the site</button>
                </form>
                <form action="{{route('admin.destroy', $place->id)}}" method="POST">
                    @csrf
                    @method('delete')
                    <button class="btn btn-danger btn-lg btn-block" type="submit">Delete</button>
                </form>
            </div>
        </div>

        <footer class="my-5 pt-5 text-muted text-center text-small">
            <p class="mb-1">© 2020-2021 TravelDiary</p>
        </footer>
    </div>
@endsection
