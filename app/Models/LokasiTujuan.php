<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LokasiTujuan extends Model
{
    use HasFactory;
    protected $table = 'lokasi_tujuan'; // Nama tabel "lokasi_tujuan"
    protected $primaryKey = 'id_lokasi'; // Kolom kunci utama
    protected $fillable = ['nama_lokasi']; // Kolom-kolom yang dapat diisi
    protected $dates = ['created_at', 'updated_at']; // Kolom-kolom tanggal jika diperlukan
}
