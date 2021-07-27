@extends('layouts.app')

@section('css')
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link rel="stylesheet" href="{{ asset('css/place.css') }}">
@endsection

@section('content')

    <!--navbar section starts-->
    <div class="container">
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <a class="navbar-brand" href="#">Navbar</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
                aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item active">
                        <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Link</a>
                    </li>
                </ul>
                <form class="form-inline my-2 my-lg-0">
                    <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search" />
                    <button class="btn btn-success my-2 my-sm-0" type="submit">
                        Search
                    </button>
                </form>
            </div>
        </nav>
    </div>

    <!--navbar section ends-->

    <!--main section starts-->
    <section id="main">
        <div class="container">
            <div class="row" id="post-content">
                <div class="col-12" style="margin-top: 20px"></div>
                <div class="col-12">
                    <div class="container">
                        <ul class="list-group list-group-horizontal">
                            <li class="list-group-item"><a href="">এক্সপেরিয়েন্স</a></li>
                            <li class="list-group-item"><a href="">এক্সপ্লোর</a></li>
                        </ul>
                    </div>
                </div>

                <div class="col-sm-12 col-md-12">
                    <div class="content">
                        <div class="post-content">
                            <div class="post-title mt-5">
                                <h1 class="title">
                                    রিক্সায় ঘুরে সারাদিন চট্টগ্রাম দেখা, সাথে খাবার বিলাস
                                </h1>
                            </div>

                            <div class="post-summary">
                                <h2>ট্রাভেল ডায়েরী ও দক্ষ ফ্যামিলির পক্ষ থেকে ব্যতিক্রমী এই সুযোগ আপনাকে দিচ্ছে ১৫০০
                                    টাকায়</h2>
                            </div>
                            <!--profile section starts-->
                            <div class="post-meta mt-3">
                                <!-- <div class="d-flex justify-content-start">
                                    <div class="row">
                                        <div class="container mt-5 ">
                                            <div class="second d-flex flex-row mt-2">
                                                <div
                                                    class="image d-flex flex-row align-items-center justify-content-between mt-3 mr-3">
                                                    <img src="image/avatar.jpg" class="rounded-circle" width="60" />
                                                </div>
                                                <div class="d-flex align-items-center">
                                                    <div class="d-flex flex-column mb-1 mt-3"> <span> <strong>Tamim
                                                            </strong></span>
                                                        <div class="time mt-3"> <strong> Created at : 26 July,2021
                                                            </strong> </div>
                                                    </div>
                                                    <div>
                                                        <button class="btn btn-outline-dark btn-md px-2 ml-5 ">+
                                                            Follow</button>
                                                    </div>
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                </div> -->


                                <div class="d-flex bd-highlight ">
                                    <div class="p-2 bd-highlight">
                                        <img src="image/avatar.jpg" class="rounded-circle" width="60" />
                                    </div>
                                    <div class="p-2 bd-highlight">
                                        <span> <strong>Tamim</strong></span> <br>
                                        <span> <strong>Created At : 26 July,2021</strong></span>
                                    </div>
                                    <div class="ml-auto p-2 bd-highlight">
                                        <button class="btn btn-outline-dark btn-md px-2 ml-5 ">+
                                            Follow</button>
                                    </div>
                                </div>

                            </div>
                            <!--profile section ends-->
                        </div>



                        <div class="post-text text-style fzaWUy mt-5">

                            <!--carousel starts-->
                            <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                                <ol class="carousel-indicators">
                                    <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                                    <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                                    <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
                                </ol>
                                <div class="carousel-inner">
                                    <div class="carousel-item active">
                                        <img src="image/sajek.jpg" class="d-block w-100" alt="...">
                                    </div>
                                    <div class="carousel-item">
                                        <img src="image/sajek.jpg" class="d-block w-100" alt="...">
                                    </div>
                                    <div class="carousel-item">
                                        <img src="image/sajek.jpg" class="d-block w-100" alt="...">
                                    </div>
                                </div>
                                <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button"
                                    data-slide="prev">
                                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                    <span class="sr-only">Previous</span>
                                </a>
                                <a class="carousel-control-next" href="#carouselExampleIndicators" role="button"
                                    data-slide="next">
                                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                    <span class="sr-only">Next</span>
                                </a>
                            </div>

                            <!--carousel ends-->


                            <!--Description parts starts-->
                            <figure class="figureClass mt-5">
                                <figcaption class="captionClass">
                                    <strong class="display-4"> বিস্তারিত :</strong>
                                </figcaption>
                            </figure>
                            <p>
                                চিরচেনা যান্ত্রিকতা আর ব্যস্ত সময়ের বেড়াজালে এই শহরটিতে দু দন্ড শান্তিতে নিঃশ্বাস ফেলাই যখন অসম্ভব প্রায় তখন শহর ঘুরে বেড়ানোর কথা বলাটাই বোকামি বলে মনে হয়। তবুও শত ব্যস্ততাকে পাশ কাটিয়ে শহরে কোথাও ঘুরতে গেলে বাস, কারের বাড়াবাড়ি আর জ্যামে জীবন অতিষ্ঠ হয়ে উঠছে দিনকে দিন। তবে কেমন হয় যদি খোলা আকাশের নিচে রিক্সায় করে ঢাকার অলি গলি ঘুরে বেড়ানো যায়? ব্যস্ততায় ভরা এই যাদুর শহরকে বুড়ো আঙুল দেখিয়ে মনের সুখে যেখানে ইচ্ছা চলে যাওয়া যায়? হুট করে রিক্সা থামিয়ে পথের ধারের কিংবা পছন্দের কোনো রেস্টুরেন্ট এর খাবারের স্বাদ নেওয়া যায় তাহলে কেমন হয়? 
                            </p>

                            <!--Description parts Ends-->

                            <!--Direction Parts Start-->
                            <p><strong class="display-4">এক্সপেরিয়েন্সটিতে থাকছে:</strong></p>
                            <p>
                                -রিক্সায় করে রাজধানী ঢাকা ঘুরে দেখার সুযোগ। এক্ষেত্রে আমরা শহরের জনপ্রিয় এবং ঐতিহ্যবাহী
                                স্থানগুলো বেছে নেবো। তবে আপনার পছন্দের জায়গাগুলোর নামও জানিয়ে দিতে পারেন আমাদেরকে। <br>
                                -দিন ব্যাপী ঢাকার বিখ্যাত খাবার গুলোর স্বাদ নেয়ার সুযোগ। <br>
                                -সাথে থাকছে যাতায়াত ও খাবার খরচ। <br>
                            </p>

                            <!--Direction parts Ends-->
                            <p><strong class="display-4">বুকিংয়ের নিয়মাবলী :</strong> </p>
                            <p>
                                * বুকিং প্রাইস পেমেন্ট করলেই আপনার বুকিংটি প্রাথমিকভাবে কনফার্ম হবে। <br>
                                * হোস্টের সাথে কমিউনিকেশন করে আপনাকে কনফার্মেশন ম্যাসেজ ও মেইল পাঠানো হবে। <br>
                                * আপনার নিজস্ব কারণে যদি আপনার পক্ষ থেকে ৭ দিন আগে ক্যানসেল করা হয় তাহলে আপনি বুকিং
                                মানির ৮০% রিফান্ড পাবেন। <br>
                                * আপনার নিজস্ব কারণে যদি আপনার পক্ষ থেকে ২-৬ দিন আগে ক্যানসেল করা হয় তাহলে আপনি বুকিং
                                মানির ৪০% রিফান্ড পাবেন। <br>
                            </p>


                            <!--additional info parts start-->
                            <p><strong class="display-4">বিশেষ দ্রষ্টব্য :</strong> </p>
                            <ul>
                                <li>
                                    ট্যুরের সময়ে সঠিক দূরত্ব বজায় রাখার চেষ্টা করতে হবে এবং
                                    সবসময় মাস্ক ব্যবহার করতে হবে।
                                </li>
                                <li>
                                    করোনার যেকোন লক্ষণ কারো মধ্যে দেখা গেলে তার ট্যুর সঙ্গে
                                    সঙ্গে ক্যানসেল করা হবে।
                                </li>
                            </ul>
                        </div>

                        <!--additional info parts ends-->

                        <!--Budget Parts starts-->
                        <div>
                            <p><strong class="display-4">বাজেট :</strong> </p>
                            <p class="package-price"><b>৳2300.00</b> / Person</p>

                        </div>
                        <div>
                            <button type="" class="btn btn-md btn-custom">Choose Package</button>
                        </div>
                        <!--Budget Parts starts-->




                        <!--related package section-->

                        <div class="related-posts mt-5">
                            <div class="d-flex justify-content-between mb-3">
                                <button type="button" class="btn btn-md btn-custom ">Add Packages <span><i
                                            class="far fa-plus-square pl-3"></i></span> </button>
                                <h3>Related Packages</h3>
                                <a href="">See All</a>
                            </div>
                            <div class="card-deck">
                                <div class="card">
                                    <img src="images/boalia trail.jpg" class="card-img-top" alt="..." />
                                    <div class="card-body">
                                        <h5 class="card-title">
                                            বোয়ালিয়া ট্রেইল - মিরসরাই রেঞ্জের অন্যতম আকর্ষণ
                                        </h5>
                                    </div>
                                </div>
                                <div class="card">
                                    <img src="images/no-kaba.jpg" class="card-img-top" alt="..." />
                                    <div class="card-body">
                                        <h5 class="card-title">
                                            ন-কাবা ছড়া এই পাহাড়ি ঝর্ণা বাংলাদেশের অন্য সকল ঝর্ণার
                                        </h5>
                                    </div>
                                </div>
                                <div class="card">
                                    <img src="images/dhuppani.jpg" class="card-img-top" alt="..." />
                                    <div class="card-body">
                                        <h5 class="card-title">জোছনাতরীর সাথে ধুপপানি ভ্রমণ</h5>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--related package section-->

                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection