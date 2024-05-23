<?php

namespace App\Http\Controllers;

use App\Models\Jabatan;
use App\Models\Pegawai;
use App\Models\Status;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PegawaiController extends Controller
{
    public function index()
    {
        $pegawais = Pegawai::where('userId', auth()->id())->get();
        $jabatan = Jabatan::all();
        $status = Status::all();

        return view('Dashboard.pegawai.datapegawai', compact('pegawais', 'jabatan', 'status'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required',
            'nomorhp' => 'required',
            'alamat' => 'required',
            'jenis_kelamin' => 'required',
            'tanggal_lahir' => 'required|date',
            'gaji' => 'required',
            'foto' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'jabatanId' => 'required|exists:jabatan_pegawai,id',
            'statusId' => 'required|exists:status,id',
        ]);

        if ($request->hasFile('foto')) {
            $file = $request->file('foto');
            $fileName = time() . '_' . $file->getClientOriginalName();
            $file->storeAs('public/foto', $fileName);
        }

        $pegawai = new Pegawai();
        $pegawai->nama = $request->nama;
        $pegawai->nomorhp = $request->nomorhp;
        $pegawai->alamat = $request->alamat;
        $pegawai->jenis_kelamin = $request->jenis_kelamin;
        $pegawai->tanggal_lahir = $request->tanggal_lahir;
        $pegawai->gaji = $request->gaji;
        $pegawai->jabatanId = $request->jabatanId;
        $pegawai->statusId = $request->statusId;
        $pegawai->userId = auth()->id();
        $pegawai->foto = $fileName;
        $pegawai->save();

        return redirect()->back()->with('success', 'Data Pegawai berhasil ditambahkan.');
    }




    public function delete(Request $request)
    {
        $pegawai = Pegawai::find($request->id);

        if ($pegawai) {
            if ($pegawai->foto) {
                Storage::delete('public/foto/'. $pegawai->foto);
            }

            $pegawai->delete();
            return response()->json(['message' => 'Data Pegawai berhasil dihapus.']);
        } else {
            return response()->json(['error' => 'Data Pegawai tidak ditemukan.'], 404);
        }
    }
}
