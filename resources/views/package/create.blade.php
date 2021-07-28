@extends('layouts.app')

@section('title')
    <title>Admin Panel</title>
@endsection

@section('css')
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
@endsection

@section('content')
    <!-- <div class="navbar navbar-dark bg-dark shadow-sm">
        <div class="container d-flex justify-content-between">
            <a href="" class="navbar-brand d-flex align-items-center">
                <img src="" alt="logo" width="30x">
                <strong>&nbsp;TravelDiary</strong>
            </a>
            <form id="logout-form" action="" method="POST" hidden>
            </form>
            <a title="Logout" href="" ><i class="fas fa-sign-out-alt"></i>
                Logout
            </a>
        </div>
    </div> -->
    <div class="container">
        <div class="mt-3 text-center">
            <!-- <img class="d-block mx-auto mb-4" src="" alt="" width="72" height="72"> -->
            <h2 class="bg-dark py-2 mx-5 rounded text-light">Add Package</h2>
        </div>

        <div class="row">
            <div class="col-md-10 mx-auto">

                <!-- <div class="alert alert-danger">
                    <strong>Sorry!</strong> There were some problems with your input.
                    <ul>

                        <li>error </li>
                    </ul>
                </div> -->
                <form class="needs-validation" action="" method="POST" enctype="multipart/form-data">
                    <div class="row">
                        <div class="col-12 mb-3">
                            <label for="name">Title</label>
                            <input name="name" type="text" class="form-control" id="name"
                                placeholder="Write a title here" value="" required>
                        </div>
                        <div class="col-md-5 mb-3">
                            <label for="location">Location (Upazila)</label>
                            <select name="location" type="text" class="form-control" id="location"
                                placeholder="ex: Sitakunda" required>

                                <option value=""></option>

                            </select>
                        </div>
                        <div class="col-md-4 mb-3">
                            <label for="Type">Type</label>
                            <input name="type" class="form-control" list="types" placeholder="" value="" required>
                            <datalist id="types">

                                <option value="">

                            </datalist>
                        </div>
                        <div class="col-md-3 mb-3">
                            <label for="budget">Price</label>
                            <input name="budget" type="number" class="form-control" id="budget" placeholder="(in BDT)"
                                pattern="[0-9]*" value="" required>
                        </div>
                        <div class="col-12 mb-3">
                            <label for="location type">Location Type</label>
                            <input name="location type" type="text" class="form-control" id="location_type"
                            placeholder="" value="" required>
                        </div>
                        <div class="col-12 mb-3">
                            <label for="description">Description</label>
                            <textarea name="description" rows="3" class="form-control" id="description"
                                placeholder="An attracting detail of the package" required></textarea>
                           
                        </div>
                        <div class="col-12 mb-3">
                            <label for="benefit">Benefit</label>
                            <input name="benefit" type="text" class="form-control" id="benefit"
                            placeholder="" value="" required>
                        </div>
                        <div class="col-12 mb-3">
                            <label for="rule">Rule</label>
                            <textarea name="rule" rows="3" class="form-control" id="rule"
                                placeholder=""></textarea>
                        </div>

                        <div class="col-md-12 mb-3">
                            <label for="phone">Phone</label>
                            <input name="phone" type="tel" class="form-control" id="phone"
                            placeholder="ex: +880123456789" value=""  pattern="[0-9]*" required >
                        </div>
                       
                        <div class="col-md-12 mb-3">
                            <label for="bkash">bkash</label>
                            <input name="bkash" type="tel" class="form-control" id="bkash" placeholder="Enter Your bkash number"
                                pattern="[0-9]*" value="" required>
                        </div>

                        <div class="col-md-12 mb-3">
                            <label for="deadline">Deadline : </label>
                            <input type="date" name="begin" placeholder="dd-mm-yyyy" value="" required>
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

        <footer class="my-5 pt-5 text-muted text-center text-small">
            <p class="mb-1">© 2020-2021 TravelDiary</p>
        </footer>
    </div>
@endsection