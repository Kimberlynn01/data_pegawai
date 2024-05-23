<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Jabatan extends Model
{
    use HasFactory;
    protected $table = 'jabatan_pegawai';
    protected $primaryKey = 'id';
    protected $guarded = [
        'id',
        'nama_jabatan'
    ];


    public function pegawai()
    {
        return $this->hasMany(Pegawai::class, 'jabatanId', 'id');
    }
}
