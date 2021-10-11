<li class="nav-item">
    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#{{ $id }}" aria-expanded="true"
        aria-controls="collapseTwo">
        <span>{{ $title }}</span>
    </a>
    <div id="{{ $id }}" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
        <div class="bg-success py-2 collapse-inner rounded">
            {{ $slot }}
        </div>
    </div>
</li>
