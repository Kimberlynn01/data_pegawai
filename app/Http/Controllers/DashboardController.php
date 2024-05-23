<?php

namespace App\Http\Controllers;

use App\Models\Pegawai;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $pegawaiCount = Pegawai::all()->count();
        $statusCount1 = Pegawai::with('status')->where('statusId', 1)->count();
        $statusCount2 = Pegawai::with('status')->where('statusId', 2)->count();
        $statusCount3 = Pegawai::with('status')->where('statusId', 3)->count();

        $lakilakiCounts = Pegawai::where('jenis_kelamin', 'Laki-laki')->count();
        $perempuanCounts = Pegawai::where('jenis_kelamin', 'Perempuan')->count();
        return view('Dashboard.dashboard', compact('pegawaiCount', 'statusCount1', 'statusCount2', 'statusCount3', 'lakilakiCounts', 'perempuanCounts'));
    }
}
