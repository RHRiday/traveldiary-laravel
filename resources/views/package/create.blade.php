@extends('layouts.app')

@section('title')
    <title>Packages</title>
@endsection

@section('css')
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
@endsection

@section('content')
    @include('partials.nav')
    <div class="container">
        <div class="mt-3 text-center">
            <h2 class="bg-dark py-2 mx-5 rounded text-light">Sell your package</h2>
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
                            <input name="price" type="number" class="form-control" id="price" placeholder="(in BDT)"
                                pattern="[0-9]*" value="{{ old('price') }}" required>
                        </div>
                        <div class="col-12 mb-3">
                            <label for="description">Description</label>
                            <textarea name="description" rows="3" class="form-control" id="description"
                                placeholder="An attracting detail of the package"
                                required>{{ old('description') }}</textarea>

                        </div>
                        <div class="col-12 mb-3">
                            <label for="benefit">Benefit</label>
                            <textarea name="benefit" rows="3" class="form-control" id="description"
                                placeholder="What will the travellers benefit from this package"
                                required>{{ old('benefit') }}</textarea>

                        </div>
                        <div class="col-12 mb-3">
                            <label for="rule">Rule</label>
                            <textarea name="rule" rows="3" class="form-control" id="rule" placeholder="Rules and alertness"
                                required>{{ old('rule') }}</textarea>
                        </div>
                        <div class="col-md-4 mb-3">
                            <label for="phone">Contact no. <small>+88</small></label>
                            <input name="phone" type="tel" class="form-control" id="phone" placeholder="ex: 01234567890"
                                value="" pattern="[0-9]*" required>
                        </div>

                        <div class="col-md-4 mb-3">
                            <label for="bkash">bKash no. <small>+88</small></label>
                            <input name="bkash" type="tel" class="form-control" id="bkash" placeholder="ex: 01234567890"
                                pattern="[0-9]*" value="" required>
                        </div>

                        <div class="col-md-4 mb-3">
                            <label for="deadline">Registration deadline </label>
                            <input type="date" name="deadline" class="form-control" required>
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
