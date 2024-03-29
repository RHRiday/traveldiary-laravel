<div class="container">
    <nav class="navbar navbar-expand-lg navbar-dark bg-success">
        <a class="navbar-brand" href="/">
            <img class="mx-auto" src="{{ asset('logo.ico') }}" width="32" height="32">
            <span class="d-md-none"> TravelDiary</span>
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item">
                    <a class="nav-link text-light" href="/home">Stories</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-light" href="/places">Explore</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-light" href="/packages">Packages</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-light" href="/guides">Career</a>
                </li>
                <li class="nav-item">
                    <form class="phone-search form-inline" action="/search" method="GET">
                        <div class="input-group">
                            <input class="form-control" type="search" name="key" placeholder="Search Your Destination">
                            <div class="input-group-prepend">
                                <button class="btn btn-danger" type="submit"><i
                                        class="fas fa-search-location"></i></button>
                            </div>
                        </div>
                    </form>
                </li>
            </ul>
            <form action="/search" method="GET" class="form-inline my-2 my-lg-0 d-none d-lg-block">
                <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search" name="key" value="{{request()->get('key')}}"/>
                <button class="btn btn-success my-2 my-sm-0" type="submit">
                    Search
                </button>
            </form>
        </div>
    </nav>
</div>
