@extends('admin.app')

@section('content')
    <div class="container">
        <div class="mt-3 text-center">
            <h2 class="bg-success py-2 mx-5 rounded text-light">Add Tour Spots</h2>
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
                <form class="needs-validation" action="{{ route('admin.store') }}" method="POST"
                    enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="col-12 mb-3">
                            <label for="name">Name</label>
                            <input name="name" type="text" class="form-control" id="name" placeholder="Write a title here"
                                value="{{ old('name') }}" required>
                        </div>
                        <div class="col-md-5 mb-3">
                            <label for="location">Location (Upazila)</label>
                            <select name="location" type="text" class="form-control" id="location"
                                placeholder="ex: Sitakunda" required>
                                @foreach ($upazilas as $upazila)
                                    <option value="{{ $upazila }}">{{ $upazila }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-md-4 mb-3">
                            <label for="Type">Type</label>
                            <input name="type" class="form-control" list="types" placeholder="ex: Beach"
                                value="{{ old('type') }}" required>
                            <datalist id="types">
                                @foreach ($types as $type)
                                    <option value="{{ $type }}">
                                @endforeach
                            </datalist>
                        </div>
                        <div class="col-md-3 mb-3">
                            <label for="budget">Budget</label>
                            <input name="budget" type="text" class="form-control" id="budget"
                                placeholder="From checkpoint (in BDT)" pattern="[0-9]*" value="{{ old('budget') }}"
                                required>
                        </div>
                        <div class="col-12 mb-3">
                            <label for="checkpoint">Checkpoint</label>
                            <input name="checkpoint" type="text" class="form-control" id="checkpoint"
                                placeholder="Where to begin" value="{{ old('checkpoint') }}" required>
                        </div>
                        <div class="col-12 mb-3">
                            <label for="description">Short description</label>
                            <p>
                                <input id="description" type="hidden" name="description" value="{{ old('description') }}"
                                    required />
                                <trix-editor input="description" placeholder="A good detail attracts more visitors">
                                </trix-editor>
                            </p>
                        </div>
                        <div class="col-12 mb-3">
                            <label for="direction">Direction</label>
                            <p>
                                <input id="direction" type="hidden" name="direction" value="{{ old('direction') }}"
                                    required />
                                <trix-editor input="direction" placeholder="Direction from the checkpoint">
                                </trix-editor>
                            </p>
                        </div>
                        <div class="col-12 mb-3">
                            <label for="info">Additional info (Optional)</label>
                            <p>
                                <input id="info" type="hidden" name="info" value="{{ old('info') }}"
                                    required />
                                <trix-editor input="info" placeholder="Cautions and regulations to take in account">
                                </trix-editor>
                            </p>
                        </div>
                        <div class="col-12 mb-3">
                            <label for="image">Image(s)</label>
                            <input name="image[]" type="file" accept="image/*" class="form-control" id="image" multiple
                                required>
                        </div>
                    </div>
                    <hr class="mb-4">
                    <button class="btn btn-info btn-lg btn-block" type="submit">Add to the site</button>
                </form>
            </div>
        </div>
    </div>
@endsection
