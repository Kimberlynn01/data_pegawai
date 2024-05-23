@extends('Dashboard.layouts.main')

@section('title', 'Dashboard Admin')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-6">
                <h1>Welcome to Admin Dashboard, {{ Auth::user()->name }}!</h1>
                <p>Simple Laravel Pegawai Data</p>
            </div>
        </div>
    </div>
@endsection
