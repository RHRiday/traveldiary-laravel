@extends('layouts.app')

@section('css')
    <link rel="stylesheet" href="{{ asset('css/package.css') }}">
@endsection

@section('content')

<div class="packages">
        <div class="container">

            <div class="package-bottom">
                <h3>Package List</h3>

                <div class="pkg-btm">
                    <div class="col-md-3 package-left ">
                        <img src="images/mohamaya.jpg" class="img-responsive" alt="">
                    </div>
                    <div class="col-md-6 package-midle">
                        <h4>Package Name:Mohamaya</h4>
                        </h4>
                        <h6>Package Type : Adventure </h6>
                        <p><b>Package Location : Mirsharai</b></p>
                        <p><b>Features : Lorem ipsum dolor, sit amet consectetur adipisicing elit. Consequatur porro
                                voluptate numquam quae ratione placeat culpa necessitatibus? Vero pariatur ad, veniam
                                odio obcaecati ipsum repellendus dolorum rem atque, sunt hic?.</b></p>
                    </div>
                    <div class="col-md-3 package-right ">
                        <h5>USD: 100 </h5>
                        <button class="btn btn-success"> Details </button>

                    </div>
                    <div class="clearfix"></div>
                </div>


                <div class="pkg-btm">
                    <div class="col-md-3 package-left ">
                        <img src="images/rupshi jhorna.jpg" class="img-responsive" alt="">
                    </div>
                    <div class="col-md-6 package-midle">
                        <h4>Package Name:Rupshi Jhorna </h4>
                        <h6>Package Type : General </h6>
                        <p><b>Package Location : Ctg</b></p>
                        <p><b>Features: Demo Demo Demo Demo Demo Demo test
                                Features Demo Demo test</b></p>
                    </div>
                    <div class="col-md-3 package-right">
                        <h5>USD: 100 </h5>
                        <button class="btn btn-success"> Details </button>

                    </div>
                    <div class="clearfix"></div>
                </div>

            </div>
        </div>
    </div>


@endsection