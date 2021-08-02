@extends('layouts.app')

@section('title')
    <title>{{ $place->name }}</title>
@endsection

@section('css')
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link rel="stylesheet" href="{{ asset('css/place.css') }}">
@endsection

@section('content')

@include('partials.nav')


<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
            <div class="container">
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
              <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavDropdown">
              <ul class="navbar-nav">
    
                <li class="nav-item ">
                    <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="#">Features</a>
                  </li>
    
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        বাংলাদেশ ভ্রমণ
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                      <a class="dropdown-item" href="#">Dhaka</a>
                      <a class="dropdown-item" href="#">Chittagong</a>
                      <a class="dropdown-item" href="#">Barishal</a>
                      <a class="dropdown-item" href="#">Rajshahi</a>
                      <a class="dropdown-item" href="#">Sylhet</a>
                    </div>
                  </li>
    
                  <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        জনপ্রিয় স্থান
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                      <a class="dropdown-item" href="#">Cox's Bazar</a>
                      <a class="dropdown-item" href="#">Saint Martin</a>
                      <a class="dropdown-item" href="#">Tanguar Haor</a>
                    </div>
                  </li>
    
                  <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        যোগাযোগ  
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                      <a class="dropdown-item" href="#">Action</a>
                      <a class="dropdown-item" href="#">Advertisement</a>
                      
                    </div>
                  </li>
              </ul>
            </div>
        </div>
          </nav>

<div class="container">

    <div class="row align-items-center places mt-5">
        <div class="col-md-6 ">
            <h1>Cox's Bazar</h1>
        </div>
    </div>

    <div class="row g-4 rounded mt-5 mb-3">
        <div class="col-md-6 col-lg-4">
            <div class="places-bg">
                <img class="p-1 img-fluid" src="images/rupshi jhorna.jpg" class="card-img-top" alt="...">
            </div>
            <div class="d-flex justify-content-between align-items-center">
                <h5 class="mt-2"><span>jhorna</span></h5>
                <i class="fas fa-bookmark"></i>
            </div>

            <div class="my-3">
                <h3>বোয়ালিয়া ট্রেইল এবং খইয়াছড়া ঝর্ণা অভিযানে টিজিবি</h3>
                <h6 class="mt-2"><span>Mirsharai</span></h6>
            </div>
        </div>

    </div>

</div>


@include('partials.footer')

@endsection