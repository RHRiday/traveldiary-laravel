<div class="card shadow-sm my-3">
    <!-- Card Header -->
    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
        <h2 class="m-0 font-weight-bold text-dark">{{ $header }}</h2>
    </div>
    <!-- Card Body -->
    <div class="card-body">
        <p>
            {{ $slot }}
        </p>
    </div>
</div>
