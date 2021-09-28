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
            <x-info-card mark="success" title="Total places" :value="$places->count()"
                icon="calendar" />

            <!-- Earnings (Monthly) -->
            <x-info-card mark="success" title="Total packages (active)" value="$215,000"
                icon="clipboard-list" />

            <!-- Pending Requests -->
            <x-info-card mark="warning" title="Pending Requests" :value="$guides->count() + $contributions->count()"
                icon="pause" />

            <!-- Pending Reports -->
            <x-info-card mark="danger" title="Pending Reports" :value="$reports->count()"
                icon="exclamation-circle" />

            <!-- Total User -->
            <x-info-card mark="info" title="Total users" value="3"
                icon="users" />

            <!-- Total stories -->
            <x-info-card mark="info" title="Total stories" value="4"
                icon="car-side" />

            <!-- Total stories -->
            <x-info-card mark="info" title="Total guides" value="2"
                icon="address-card" />
        </div>
    </main>
@endsection
