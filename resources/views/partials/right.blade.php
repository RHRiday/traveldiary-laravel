<div class="col-3 right">
    <div class="search-diary">
        <form action="/search" method="get">
            <input name="key" class="search" type="text" placeholder="Search your diary">
        </form>
        
    </div>
    <div class="follow-people">
        <h3>Who to follow</h3>
        @forelse ($notFollowed as $toFollow)
            <div class="all-follower">
                <div class="col-2">
                    <div class="circular-img">
                        <a href="/profile/{{ $toFollow->username }}"><img src="{{ $toFollow->dp }}"></a>
                    </div>
                    
                </div>
                <a href="/profile/{{ $toFollow->username }}">
                    <div class="col-6">
                        <p class="who-to-follow-name">{{ $toFollow->name }}</p>
                        <p class="who-to-follow-username">@ {{ $toFollow->username }}</p>
                    </div>
                </a>
                <div class="col-4">
                    <a href="/follow/{{ $toFollow->id }}"><button class="btn-follow">Follow</button></a>
                </div>
            </div>
        @empty
            <h6>Nothing more to show here</h6>
        @endforelse

    </div>
    <div class="footer">
        <div class="copyright">
            <p>&copy; Copyright 2021 - Travel-Diary</p>
        </div>
    </div>
</div>
