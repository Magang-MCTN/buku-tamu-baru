<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Surat2BukuTamu extends Model
{
    use HasFactory;
    protected $table = 'surat_2_buku_tamu';
    protected $primaryKey = 'id_surat_2';
    protected $fillable = [
        'id_surat_1',
        'id_kendaraan',
        'id_tamu',

        'id_ga',
        'id_status_surat',
        'id_lokasi',
        'id_periode',
        'kode_unik',
        'alasan_sura2'
    ];
    public function surat1()
    {
        return $this->belongsTo(Surat1BukuTamu::class, 'id_surat_1', 'id_surat_1');
    }

    public function tamu()
    {
        return $this->belongsTo(DataDiriBukuTamu::class, 'id_tamu', 'id_tamu');
    }

    public function ga()
    {
        return $this->belongsTo(User::class, 'id_ga', 'id_user');
    }

    public function statusSurat()
    {
        return $this->belongsTo(StatusSurat::class, 'id_status_surat', 'id_status_surat');
    }

    public function lokasi()
    {
        return $this->belongsTo(LokasiTujuan::class, 'id_lokasi', 'id_lokasi');
    }

    public function periode()
    {
        return $this->belongsTo(PeriodeTamu::class, 'id_periode', 'id_periode');
    }
}
