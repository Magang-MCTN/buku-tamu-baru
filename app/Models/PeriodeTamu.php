<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PeriodeTamu extends Model
{

    protected $table = 'periode_tamu'; // Nama tabel "periode_tamu"

    protected $primaryKey = 'id_periode'; // Kolom kunci utama

    protected $fillable = [
        'tanggal_masuk',
        'tanggal_keluar',
        'jam_kedatangan',
    ];

    protected $dates = ['tanggal_masuk', 'tanggal_keluar', 'jam_kedatangan', 'created_at', 'updated_at'];

    // Definisikan hubungan dengan tabel lain jika diperlukan
    // Misalnya, jika Anda memiliki hubungan dengan tabel surat_1_buku_tamu
    public function surat1()
    {
        return $this->hasOne(Surat1BukuTamu::class, 'id_periode', 'id_periode');
    }
}
