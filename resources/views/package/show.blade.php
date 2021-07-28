@extends('layouts.app')

@section('title')
    <title>Packages</title>
@endsection

@section('css')
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link rel="stylesheet" href="{{ asset('css/place.css') }}">
@endsection

@section('content')
    @include('partials.nav')
    <!--main section starts-->
    <section id="main">
        <div class="container">
            <div class="row" id="post-content">
                <div class="col-12" style="margin-top: 20px"></div>
                <div class="col-12">
                    <div class="container">
                        <ul class="list-group list-group-horizontal">
                            <li class="list-group-item"><a href="">Sitakunda</a></li>
                            <li class="list-group-item"><a href="">ঝর্ণা</a></li>
                        </ul>
                    </div>
                </div>

                <div class="col-sm-12 col-md-12">
                    <div class="content">
                        <div class="post-content">
                            <div class="mt-5">
                                <h1 class="title">
                                    ট্রাভেল ডায়েরী ও দক্ষ ফ্যামিলির পক্ষ থেকে ব্যতিক্রমী এই সুযোগ আপনাকে দিচ্ছে ১৫০০
                                    টাকায়
                                </h1>
                            </div>
                            <div class="post-summary">
                                <h2><i class="fas fa-child"></i> একদিনের ট্যুর</h2>
                            </div>
                            
                            <!--profile section starts-->
                            <div class="mt-3">
                                <div class="d-flex bd-highlight ">
                                    <div class="p-2 bd-highlight">
                                        <img src="/resources/profile/rifathr.jpg" class="rounded-circle" width="60" />
                                    </div>
                                    <div class="p-2 bd-highlight">
                                        <h4 class="mb-1">Tamim</h4 >
                                        <p class="mb-0"><strong>Deadline :</strong> 26 July,2021</p>
                                        <p class="mb-0"><strong>Price :</strong> 500 BDT</p>
                                    </div>
                                    <div class="ml-auto p-2 bd-highlight">
                                        <button class="btn btn-outline-dark btn-md px-2 ml-5 ">Follow</button>
                                    </div>
                                </div>
                            </div>
                            <!--profile section ends-->
                        </div>



                        <div class="mt-5">
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
                                    <strong class="display-4"> বিস্তারিত:</strong>
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
                            <p><strong class="display-4">বুকিংয়ের নিয়মাবলী ও সতর্কতা:</strong> </p>
                            
                            <p>
                                * বুকিং প্রাইস পেমেন্ট করলেই আপনার বুকিংটি প্রাথমিকভাবে কনফার্ম হবে। <br>
                                * হোস্টের সাথে কমিউনিকেশন করে আপনাকে কনফার্মেশন ম্যাসেজ ও মেইল পাঠানো হবে। <br>
                                * আপনার নিজস্ব কারণে যদি আপনার পক্ষ থেকে ৭ দিন আগে ক্যানসেল করা হয় তাহলে আপনি বুকিং
                                মানির ৮০% রিফান্ড পাবেন। <br>
                                * আপনার নিজস্ব কারণে যদি আপনার পক্ষ থেকে ২-৬ দিন আগে ক্যানসেল করা হয় তাহলে আপনি বুকিং
                                মানির ৪০% রিফান্ড পাবেন। <br>
                            </p>
                            <p class="display-4">প্যাকেজ সংক্রান্ত তথ্যের জন্য যোগাযোগ করুন <span class="alert-dark">015631</span> নম্বরে</p>
                        <div>
                            <a class="btn btn-success">Buy Package</a>
                        </div>
                        <!--Budget Parts starts-->

                        <!--related package section-->

                        <div class="related-posts mt-5">
                            <div class="d-flex justify-content-between mb-3">
                                <h3>Related Packages</h3>
                                <a href="/packages">See All</a>
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

    @include('partials.footer')
@endsection