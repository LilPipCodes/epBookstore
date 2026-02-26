@extends('layouts.admin')
@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-12 mb-4">
            <h1 class="dashboard-header">Admin Dashboard</h1>
        </div>
        <!-- KPI Cards -->
        <div class="col-md-4 mb-3">
            <div class="card kpi-card">
                <div class="card-body">
                    <h5>Total Books</h5>
                    <h2>1,234</h2>
                </div>
            </div>
        </div>
        <div class="col-md-4 mb-3">
            <div class="card kpi-card">
                <div class="card-body">
                    <h5>Downloads</h5>
                    <h2>12,345</h2>
                </div>
            </div>
        </div>
        <div class="col-md-4 mb-3">
            <div class="card kpi-card">
                <div class="card-body">
                    <h5>Active Users</h5>
                    <h2>567</h2>
                </div>
            </div>
        </div>
    </div>
    <!-- Analytics Charts Placeholder -->
    <div class="row">
        <div class="col-md-6 mb-4">
            <div class="card">
                <div class="card-body">
                    <h5>Monthly Downloads</h5>
                    <div style="height:200px;background:#232323;border-radius:8px;"></div>
                </div>
            </div>
        </div>
        <div class="col-md-6 mb-4">
            <div class="card">
                <div class="card-body">
                    <h5>User Growth</h5>
                    <div style="height:200px;background:#232323;border-radius:8px;"></div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
