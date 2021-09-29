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
            <x-info-card mark="warning" title="Pending Requests" :value="$guides->count() + $contributions->count()"
                icon="pause" />

            <!-- Pending Reports -->
            <x-info-card mark="danger" title="Pending Reports" :value="$reports->count()" icon="exclamation-circle" />

            <!-- Total User -->
            <x-info-card mark="info" title="Total users" value="3" icon="users" />

            <!-- Total stories -->
            <x-info-card mark="info" title="Total stories" value="4" icon="car-side" />

            <!-- Total stories -->
            <x-info-card mark="info" title="Total guides" value="2" icon="address-card" />
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
                        </div>
                    </div>
                </div>
            </div>

            <!-- Pie Chart -->
            <div class="col-xl-4 col-lg-5">
                <div class="card shadow mb-4">
                    <!-- Card Header - Dropdown -->
                    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                        <h6 class="m-0 font-weight-bold text-primary">Revenue Sources</h6>
                        <div class="dropdown no-arrow">
                            <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown"
                                aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
                            </a>
                            <div class="dropdown-menu dropdown-menu-right shadow animated--fade-in"
                                aria-labelledby="dropdownMenuLink">
                                <div class="dropdown-header">Dropdown Header:</div>
                                <a class="dropdown-item" href="#">Action</a>
                                <a class="dropdown-item" href="#">Another action</a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="#">Something else here</a>
                            </div>
                        </div>
                    </div>
                    <!-- Card Body -->
                    <div class="card-body">
                        <div class="chart-pie pt-4 pb-2">
                            <canvas id="myPieChart"></canvas>
                        </div>
                        <div class="mt-4 text-center small">
                            <span class="mr-2">
                                <i class="fas fa-circle text-primary"></i> Direct
                            </span>
                            <span class="mr-2">
                                <i class="fas fa-circle text-success"></i> Social
                            </span>
                            <span class="mr-2">
                                <i class="fas fa-circle text-info"></i> Referral
                            </span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection
