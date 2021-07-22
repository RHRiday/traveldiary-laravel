<div class="middleContent active-page">
    <div class="nav-list">
        <ul class="nav-var-menu">
            <li>
                <div class="nav-var-link-hover-2">
                    <a href="/home">
                        <div><img src="{{ asset('logo.ico') }}" alt="Home"></i></div>
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
                    @if (isset($posts))
                        <a href="/profile/{{ Auth::user()->username }}">
                            <div class="icon-link"><i class="fas fa-user"></i></div>
                        </a>
                    @else
                        <a title="Logout" href="http://localhost:8080/logout"
                            onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                            <div class="icon-link"><i class="fas fa-sign-out-alt"></i></div>
                        </a>
                    @endif
                </div>
            </li>
        </ul>
    </div>
</div>
