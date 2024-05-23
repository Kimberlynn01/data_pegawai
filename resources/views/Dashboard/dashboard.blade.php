@extends('Dashboard.layouts.main')

@section('title', 'Dashboard Admin')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <h1>Welcome to Admin Dashboard, {{ Auth::user()->name }}!</h1>
                <p>Simple Laravel Pegawai Data</p>
            </div>
            <div class="col-md-4 mt-4">
                <div class="card">
                    <div class="card-header bg-info">
                        <div class="card-title ">
                            <h4>Total Pegawai</h4>
                        </div>
                    </div>
                    <div class="card-body">
                        <div id="pegawaiChart"></div>
                    </div>
                </div>
            </div>
            <div class="col-md-4 mt-4 ">
                <div class="card">
                    <div class="card-header bg-info">
                        <div class="card-title">
                            <h4>Status</h4>
                        </div>
                    </div>
                    <div class="card-body">
                        <div id="statusChart"></div>
                    </div>
                </div>
            </div>
            <div class="col-md-4 mt-4">
                <div class="card">
                    <div class="card-header bg-info">
                        <div class="card-title">
                            <h4>Jenis Kelamin</h4>
                        </div>
                    </div>
                    <div class="card-body">
                        <div id="genderChart"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Chart Pegawai
            var pegawaiChart = new ApexCharts(document.querySelector('#pegawaiChart'), {
                chart: {
                    type: 'bar'
                },
                plotOptions: {
                    bar: {
                        columnWidth: '10%',
                        borderRadius: 10
                    }
                },
                dataLabels: {
                    enabled: true,
                    formatter: function(val) {
                        return val;
                    },
                    offsetY: -20,
                    style: {
                        fontSize: '12px',
                        colors: ["#304758"]
                    }
                },
                series: [{
                    name: 'Pegawai',
                    data: [{{ $pegawaiCount }}]
                }],
                colors: ['#FF7F3E'],
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
                plotOptions: {
                    bar: {
                        columnWidth: '40%',
                        borderRadius: 10
                    }
                },
                dataLabels: {
                    enabled: true,
                    formatter: function(val) {
                        return val;
                    },
                    offsetY: -20,
                    style: {
                        fontSize: '12px',
                        colors: ["#304758"]
                    }
                },
                series: [{
                    name: 'Status Pegawai',
                    data: [{{ $statusCount1 }}, {{ $statusCount2 }}, {{ $statusCount3 }}]
                }],
                colors: ['#FF7F3E', '#FFA62F', '#FFA62F'],
                xaxis: {
                    categories: ['Aktif', 'Tidak Aktif', 'Pensiun']
                }
            });

            statusChart.render();

            // Gender Chart
            var genderChart = new ApexCharts(document.querySelector('#genderChart'), {
                chart: {
                    type: 'bar'
                },
                plotOptions: {
                    bar: {
                        columnWidth: '40%',
                        borderRadius: 10
                    }
                },
                dataLabels: {
                    enabled: true,
                    formatter: function(val) {
                        return val;
                    },
                    offsetY: -20,
                    style: {
                        fontSize: '12px',
                        colors: ["#304758"]
                    }
                },
                series: [{
                    name: 'Gender',
                    data: [{{ $lakilakiCounts }}, {{ $perempuanCounts }}]
                }],
                colors: ['#FF7F3E', '#FFA62F'],
                xaxis: {
                    categories: ['Laki-laki', 'Perempuan']
                }
            });

            genderChart.render();
        });
    </script>
@endsection
