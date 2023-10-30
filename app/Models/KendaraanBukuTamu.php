<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KendaraanBukuTamu extends Model
{
    use HasFactory;
    protected $table = 'kendaraan_buku_tamu';

    protected $primaryKey = 'id_kendaraan';

    protected $fillable = [

        'id_mobil',
        'pengawalan',
        'nama_supir',
        'masa_berlaku_kir',
        'masa_berlaku_sim',
        'foto_sim',
        'foto_kendaraan',
    ];

    // Definisi relasi dengan Surat2BukuTamuDuri jika diperlukan


    // Definisi relasi dengan Mobil
    public function mobil()
    {
        return $this->belongsTo(Mobil::class, 'id_mobil', 'id_mobil');
    }
}
