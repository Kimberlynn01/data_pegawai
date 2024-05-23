<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pegawai extends Model
{
    use HasFactory;
    protected $table = 'data_pegawai';
    protected $primaryKey = 'id';
    protected $fillable = [
        'nama',
        'nomorhp',
        'alamat',
        'jenis_kelamin',
        'tanggal_lahir',
        'gaji',
        'foto',
        'statusId',
        'userId',
        'jabatanId',
    ];

    public function users()
    {
        return $this->belongsTo(User::class, 'userId', 'id');
    }

    public function jabatan()
    {
        return $this->belongsTo(Jabatan::class, 'jabatanId', 'id');
    }

    public function status()
    {
        return $this->belongsTo(Status::class, 'statusId', 'id');
    }
}
