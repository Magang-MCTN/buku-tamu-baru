<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DataDiriBukuTamu extends Model
{
    protected $table = 'data_diri_buku_tamu';

    protected $primaryKey = 'id_tamu';

    protected $fillable = [
        'nama_tamu',
        'nik_tamu',
        'masa_berlaku_ktp',
        'jabatan',
        'foto_ktp',
        'id_surat_1',
    ];

    // Definisi relasi dengan Surat1BukuTamu jika diperlukan
    public function surat1()
    {
        return $this->belongsTo(Surat1BukuTamu::class, 'id_tamu', 'id_tamu');
    }
}
