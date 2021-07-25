<div class="col-3 left">
    <div class="brand">
        <img src="/resources/travel-diary.png">
    </div>
    <div class="profile">
        <div class="row">
            <div class="profile-row">
                <a href="/profile/{{ Auth::user()->username }}">
                    <div class="col-2 circular-img">
                        <img src="{{ asset('resources/profile/default.png') }}">
                    </div>
                    <div class="col-6">
                        <p>@ {{ Auth::user()->username }} </p>
                    </div>
                </a>
                <div class="col-4">
                    <form id="logout-form" action="http://localhost:8080/logout" method="POST" hidden>
                        @csrf
                    </form>
                    <a title="Logout" href="http://localhost:8080/logout"
                        onclick="event.preventDefault();
                                                                            document.getElementById('logout-form').submit();"><i class="fas fa-sign-out-alt"></i>
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
                    <a href="/home">
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