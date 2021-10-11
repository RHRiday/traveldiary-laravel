@extends('layouts.app')

@section('title')
    <title>Packages</title>
@endsection

@section('css')
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link rel="stylesheet" href="{{ asset('css/package.css') }}">
@endsection

@section('content')
    @include('partials.nav')
    <div class="container">
        <div class="mt-3 text-center">
            <h2 class="bg-dark py-2 mx-5 rounded text-light">Advertise your package</h2>
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
                <form action="{{ route('packages.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="col-12 mb-3">
                            <label for="name">Title</label>
                            <input name="name" type="text" class="form-control" id="name" placeholder="Write a title here"
                                value="{{ old('name') }}" required>
                        </div>
                        <div class="col-md-3 mb-3">
                            <label for="location">Location (Upazila)</label>
                            <select name="location" type="text" class="form-control" id="location" required>
                                @foreach ($upazilas as $upazila)
                                    <option value="{{ $upazila }}">{{ $upazila }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-md-3 mb-3">
                            <label for="type">Package type</label>
                            <input name="type" class="form-control" list="types" placeholder="Ex: এক দিনের ট্যুর"
                                value="{{ old('type') }}" required>
                            <datalist id="types">
                                <option value="">
                            </datalist>
                        </div>
                        <div class="col-md-3 mb-3">
                            <label for="exp_type">Experience type</label>
                            <input name="exp_type" class="form-control" list="exp_types" placeholder="Ex: ঝর্ণা"
                                value="{{ old('exp_type') }}" required>
                            <datalist id="exp_types">
                                <option value="">
                            </datalist>
                        </div>
                        <div class="col-md-3 mb-3">
                            <label for="price">Price</label>
                            <input name="price" type="text" class="form-control" id="price" placeholder="(in BDT)"
                                pattern="[0-9]*" value="{{ old('price') }}" required>
                        </div>
                        <div class="col-12 mb-3">
                            <label for="description">Description</label>
                            <p>
                                <input id="description" type="hidden" name="description" value="{{ old('description') }}"
                                    required />
                                <trix-editor input="description" placeholder="A good detail attracts more visitors">
                                </trix-editor>
                            </p>
                        </div>
                        <div class="col-12 mb-3">
                            <label for="benefit">Benefit <small class="text-muted"></small></label>
                            <p>
                                <input id="benefit" type="hidden" name="benefit" value="{{ old('benefit') }}" required />
                                <trix-editor input="benefit" placeholder="Benefits make people think about your package">
                                </trix-editor>
                            </p>
                        </div>
                        <div class="col-12 mb-3">
                            <label for="rule">Rule <small class="text-muted"></small></label>
                            <p>
                                <input id="rule" type="hidden" name="rule" value="{{ old('rule') }}" required />
                                <trix-editor input="rule" placeholder="Rules and regulations travelers must follow">
                                </trix-editor>
                            </p>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="phone">Contact no. <small>+88</small></label>
                            <input name="phone" type="tel" class="form-control" id="phone" placeholder="ex: 01234567890"
                                value="{{ old('phone') }}" pattern="[0-9]*" required>
                        </div>

                        <div class="col-md-6 mb-3">
                            <label for="deadline">Registration deadline </label>
                            <input type="date" name="deadline" class="form-control" value="{{ old('deadline') }}"
                                required>
                        </div>

                        <div class="col-12 mb-3">
                            <label for="image">Banner(s)</label>
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

    @include('partials.footer')
@endsection
