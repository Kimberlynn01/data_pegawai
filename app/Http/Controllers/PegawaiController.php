<?php

namespace App\Http\Controllers;

use App\Models\Jabatan;
use App\Models\Pegawai;
use App\Models\Status;
use Illuminate\Http\Request;

class PegawaiController extends Controller
{
    public function index()
    {
        $pegawais = Pegawai::where('userId', auth()->id())->get();
        $jabatan = Jabatan::all();
        $status = Status::all();

        return view('Dashboard.pegawai.datapegawai', compact('pegawais', 'jabatan', 'status'));
    }
}
