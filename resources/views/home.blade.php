@extends('layouts.app')

@section('css')
    <link rel="stylesheet" href="{{ asset('css/home.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-modal/0.9.1/jquery.modal.min.css" />
    <!-- FONT links -->
    <link href="https://fonts.googleapis.com/css2?family=Source+Sans+Pro:wght@300;400;600;700;900&display=swap"
        rel="stylesheet" />
    <!-- FONT-ICON LINK  -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" />

    <link rel="preconnect" href="https://fonts.gstatic.com" />
@endsection

@section('content')

    <!-- modals  -->
    <div id="post-option" class="modal">
        <p>casd</p>
    </div>

    <div class="container">
        <div class="row">
            <!-------- LEFT CONTENT-------->
            <div class="col-3 left">

                <div class="brand">
                    <img src="/resources/travel-diary.png">
                </div>
                <div class="profile">
                    <div class="row">
                        <div class="profile-row">
                            <a href="" title="">
                                <div class="col-2 circular-img">
                                    <img src="{{ asset('resources/profile/default.png') }}">
                                </div>
                                <div class="col-6">
                                    <p>@ {{ $username }} </p>
                                </div>
                            </a>
                            <div class="col-4">
                                <form id="logout-form" action="http://localhost:8080/logout" method="POST" hidden>
                                    @csrf
                                </form>
                                <a title="Logout" href="http://localhost:8080/logout" onclick="event.preventDefault();
                                                    document.getElementById('logout-form').submit();"><i
                                        class="fas fa-sign-out-alt"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- SIDE BAR -->
                <div class="sidebar">
                    <ul class="allpages">
                        <li>
                            <div class="sidemenu-link-hover">
                                <a href="index.php">
                                    <div class="icon-link"><i class="fas fa-home"></i></div>
                                    <div class="icon-link for-display">Home</div>
                                </a>
                            </div>
                        </li>
                        <li>
                            <div class="sidemenu-link-hover">
                                <a href="packages">
                                    <div class="icon-link"><i class="fas fa-box-open"></i></div>
                                    <div class="icon-link for-display">Packages</div>
                                </a>
                            </div>
                        </li>
                        <li>
                            <div class="sidemenu-link-hover">
                                <a href="explore">
                                    <div class="icon-link"><i class="fas fa-hashtag"></i></div>
                                    <div class="icon-link for-display">Explore</div>
                                </a>
                            </div>
                        </li>
                        <li>
                            <div class="sidemenu-link-hover">
                                <a href="bookmarks">
                                    <div class="icon-link"><i class="fas fa-bookmark"></i></div>
                                    <div class="icon-link for-display">Bookmarks</div>
                                </a>
                            </div>
                        </li>
                        <li class="only-mbl">
                            <div class="sidemenu-link-hover search">
                                <a href="search">
                                    <div class="icon-link"><i class="fas fa-search"></i></div>
                                    <div class="icon-link for-display">Search</div>
                                </a>
                            </div>
                        </li>
                    </ul>
                </div>

            </div>


            <!-------- MIDDLE CONTENT-------->
            <!-- phone view -->

            <div class="col-6 middle">
                <div class="middleContent page-head">
                    <a class="title" href=""><i class="fas fa-home"></i> Home</a>
                    <a class="btn-post">Post</a>
                </div>
                <div class="middleContent active-page">
                    <div class="nav-list">
                        <ul class="nav-var-menu">
                            <li>
                                <div class="nav-var-link-hover-2">
                                    <a href="index.php">
                                        <div><img src="logo.ico" alt="Home"></i></div>
                                    </a>
                                </div>
                            </li>
                            <li>
                                <div class="sidemenu-link-hover-2">
                                    <a href="#">
                                        <div class="icon-link"><i class="fas fa-box-open"></i></div>
                                    </a>
                                </div>
                            </li>
                            <li>
                                <div class="sidemenu-link-hover-2">
                                    <a href="#">
                                        <div class="icon-link"><i class="fas fa-bookmark"></i></div>
                                    </a>
                                </div>
                            </li>
                            <li>
                                <div class="sidemenu-link-hover-2">
                                    <a href="#">
                                        <div class="icon-link"><i class="fas fa-hashtag"></i></div>
                                    </a>
                                </div>
                            </li>

                            <li>
                                <div class="sidemenu-link-hover-2">
                                    <a href="#">
                                        <div class="icon-link"><i class="fas fa-search"></i></div>
                                    </a>
                                </div>
                            </li>

                            <li>
                                <div class="sidemenu-link-hover-2">
                                    <a href="">
                                        <div class="icon-link"><i class="fas fa-user"></i></div>
                                    </a>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
                <!-- //posts of users followed by the logged user// -->
                <div class="middleContent">
                    <div class="row">
                        <div class="col-2 DP-circular-img">
                            <a href="">
                                <img src="resources/profile/default.png">
                            </a>
                        </div>
                        <div class="col-10">
                            <div>
                                <div>
                                    <a class="name" href="">User name</a>
                                    &nbsp;<span>.</span>&nbsp;
                                    <a href="" style="font-size: 60%;" class="name">3 h</a>
                                    <a href="#post-option" rel="modal:open"><i class="fas fa-ellipsis-h"></i></a>
                                </div>
                                <h2 class="title">Post title</h2>
                                <p class="caption">
                                    Caption Lorem ipsum dolor sit amet consectetur adipisicing elit. Vel,
                                    alias. Nesciunt voluptas ex dignissimos delectus optio beatae, dolore quis, pariatur
                                    ipsum ipsam iste. Earum adipisci, obcaecati ratione ex fuga consectetur!
                                </p>
                            </div>
                            <div class="pic-post">
                                <div class="pic-post-img">
                                    <img class="zoom" src="resources/nafakhum.jpg">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- end of posts -->
                <div class="middleContent">
                    <div class="row end-of-post">
                        <p>Your diary ends here!!</p>
                        <p>Follow more travellers to get more stories!</p>
                    </div>
                </div>
            </div>

            <!-------- RIGHT CONTENT-------->

            <div class="col-3 right">
                <div class="search-diary">
                    <input class="search" type="text" placeholder="Search your diary">
                </div>
                <div class="follow-people">
                    <h3>Who to follow</h3>
                    <div class="all-follower">
                        <div class="col-2 circular-img">
                            <a href=""><img src="resources/profile/default.png"></a>
                        </div>
                        <a href="">
                            <div class="col-6">
                                <p class="who-to-follow-name">Some name</p>
                                <p class="who-to-follow-username">@ username</p>
                            </div>
                        </a>
                        <div class="col-4">
                            <button class="btn-follow" data-ref="home" data-self="username" value="username">Follow</button>
                        </div>
                    </div>

                </div>
                <div class="footer">
                    <div class="copyright">
                        <p>&copy; Copyright 2021 - Travel-Diary</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
