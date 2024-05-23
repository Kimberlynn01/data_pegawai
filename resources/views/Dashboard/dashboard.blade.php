@extends('Dashboard.layouts.main')

@section('title', 'Dashboard Admin')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <h1>Welcome to Admin Dashboard, {{ Auth::user()->name }}!</h1>
                <p>Simple Laravel Pegawai Data</p>
            </div>
            <div class="col-md-6">
                <div id="pegawaiChart"></div>
            </div>
            <div class="col-md-6">
                <!-- Tambahkan div untuk menampilkan chart Status -->
                <div id="statusChart"></div>
            </div>
        </div>
    </div>

    <!-- Tambahkan script untuk memuat ApexCharts dari CDN -->
    <script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Chart Pegawai
            var pegawaiChart = new ApexCharts(document.querySelector('#pegawaiChart'), {
                chart: {
                    type: 'bar'
                },
                series: [{
                    name: 'Pegawai',
                    data: [{{ $pegawaiCount }}]
                }],
                xaxis: {
                    categories: ['Total Pegawai']
                }
            });

            pegawaiChart.render();

            // Chart Status
            var statusChart = new ApexCharts(document.querySelector('#statusChart'), {
                chart: {
                    type: 'bar'
                },
                series: [{
                    name: 'Aktif',
                    data: [{{ $statusCount1 }}]
                }, {
                    name: 'Tidak Aktif',
                    data: [{{ $statusCount2 }}]
                }, {
                    name: 'Pensiun',
                    data: [{{ $statusCount3 }}]
                }],
                xaxis: {
                    categories: ['Aktif', 'Tidak Aktif', 'Pensiun']
                }
            });

            statusChart.render();
        });
    </script>
@endsection
