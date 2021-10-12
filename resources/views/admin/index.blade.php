@extends('admin.app')

@section('content')
    <main role="main">

        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
        </div>

        <!-- Content Row -->
        <div class="row">

            <!-- Earnings (Monthly) -->
            <x-info-card mark="success" title="Total places" :value="$places->count()" icon="calendar" />

            <!-- Earnings (Monthly) -->
            <x-info-card mark="success" title="Total packages (active)" :value="$packages->count()" icon="clipboard-list" />

            <!-- Pending Requests -->
            <x-info-card mark="warning" title="Pending Requests"
                :value="$guides->where('approval', 0)->count() + $contributions->count()" icon="pause" />

            <!-- Pending Reports -->
            <x-info-card mark="danger" title="Pending Reports" :value="$reports->count()" icon="exclamation-circle" />

            <!-- Total User -->
            <x-info-card mark="info" title="Total users" :value="$users->count()" icon="users" />

            <!-- Total stories -->
            <x-info-card mark="info" title="Total stories" :value="$stories->count()" icon="car-side" />

            <!-- Total stories -->
            <x-info-card mark="info" title="Total guides" :value="$guides->count()" icon="address-card" />
        </div>

        <div class="row">
            <!-- Area Chart -->
            <div class="col-xl-8 col-lg-7">
                <div class="card shadow mb-4">
                    <!-- Card Header - Dropdown -->
                    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                        <h6 class="m-0 font-weight-bold text-primary">Pages</h6>
                    </div>
                    <!-- Card Body -->
                    <div class="card-body">
                        <div class="row">
                            <a href="/places" class="col-auto text-center text-info">
                                <i class="fas fa-fw fa-folder fa-5x"></i>
                                <p class="font-weight-bold">Places</p>
                            </a>
                            <a href="/packages" class="col-auto text-center text-info">
                                <i class="fas fa-fw fa-folder fa-5x"></i>
                                <p class="font-weight-bold">Packages</p>
                            </a>
                            <a href="/dev" class="col-auto text-center text-info">
                                <i class="fas fa-fw fa-folder fa-5x"></i>
                                <p class="font-weight-bold">Dev</p>
                            </a>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Pie Chart -->
            <div class="col-xl-4 col-lg-5">
                <div class="card shadow mb-4">
                    <!-- Card Header - Dropdown -->
                    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                        <h6 class="m-0 font-weight-bold text-primary">Guides list</h6>
                    </div>
                    <!-- Card Body -->
                    <div class="card-body">
                        <div class="pt-4 pb-2">
                            <div class="row">
                                @foreach ($guides as $guide)
                                    <div class="col-auto">
                                        <span class="mr-2">
                                            <i
                                                class="fas fa-circle text-{{ $guide->approval === 1 ? 'success' : 'warning' }}"></i>
                                        </span>
                                    </div>
                                    <div class="col-auto">
                                        <a href="/{{ $guide->user->username }}">{{ $guide->user->name }}</a>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                        <div class="mt-4 text-center small">
                            <span class="mr-2">
                                <i class="fas fa-circle text-primary"></i> Top
                            </span>
                            <span class="mr-2">
                                <i class="fas fa-circle text-success"></i> Approved
                            </span>
                            <span class="mr-2">
                                <i class="fas fa-circle text-warning"></i> Unapprored
                            </span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
    <!-- Content Row -->
    <div class="row">

        <!-- Content Column -->
        <div class="col-lg-6 mb-4">

            <!-- Project Card Example -->
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Disk space</h6>
                </div>
                <div class="card-body">
                    <h4 class="small font-weight-bold">Used space <span class="float-right">{{ $used }}%</span>
                    </h4>
                    <div class="progress mb-4">
                        <div class="progress-bar bg-{{ $used > 70 ? 'danger' : ($used > 50 ? 'warning' : 'success') }}"
                            role="progressbar" style="width: {{ $used }}%" aria-valuenow="{{ $used }}"
                            aria-valuemin="0" aria-valuemax="100">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
