@extends('layouts.app')

@section('css')
    <link rel="stylesheet" href="{{ asset('css/package.css') }}">
@endsection

@section('content')

<section class = "mb-5">

    <div class="container">
        <div class="title mt-5 ">
            <h3>Package List</h3>
        </div>
        
        <div class="package row">

            <div class="col-md-3 package-left">
                <img class="img-fluid w-100" src="images/mohamaya.jpg" alt="">
            </div>

            <div class="col-md-6 package-middle">
                <h4>Package Name: Mohamaya</h4>
                <h6>Package Type : General </h6>
                <p><b>Package Location : Ctg</b></p>
                <p><b>Features: Lorem ipsum dolor, sit amet consectetur adipisicing elit. Consequatur porro voluptate numquam quae ratione placeat culpa necessitatibus? Vero pariatur ad, veniam odio obcaecati ipsum repellendus</b></p>
            </div>

            <div class="col-md-3 package-right">
                <div class="float-right ">
                    <h5>USD: 100</h5>
                    <button class="btn btn-success"> Details </button>
                </div>
            </div>

        </div>
        
        <div class="package row">

            <div class="col-md-3 package-left">
                <img class="img-fluid w-100" src="images/rupshi jhorna.jpg" alt="">
            </div>

            <div class="col-md-6 package-middle">
                <h4>Package Name : Rupshi Jhorna</h4>
                <h6>Package Type : Adventure </h6>
                <p><b>Package Location : Ctg</b></p>
                <p><b>Features: Lorem ipsum dolor, sit amet consectetur adipisicing elit. Consequatur porro voluptate numquam quae ratione placeat culpa necessitatibus? Vero pariatur ad, veniam odio obcaecati ipsum repellendus</b></p>
            </div>

            <div class="col-md-3 package-right">
                <div class="float-right ">
                    <h5>USD: 200</h5>
                    <button class="btn btn-success"> Details </button>
                </div>
            </div>

        </div>
        
    </div>
</section>

@endsection