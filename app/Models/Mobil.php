<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mobil extends Model
{
    protected $table = 'mobil';

    protected $primaryKey = 'id_mobil';

    protected $fillable = [
        'tipe_mobil',
        'warna',
        'nomor_polisi',
        'masa_berlaku_stnk',
        'foto_stnk',
    ];

    // Definisi relasi dengan Surat2BukuTamuDuri jika diperlukan
    public function surat2Duri()
    {
        return $this->hasMany(Surat2BukuTamuDuri::class, 'id_mobil', 'id_mobil');
    }
}
