<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Surat1BukuTamu extends Model
{
    protected $table = 'surat_1_buku_tamu';

    protected $primaryKey = 'id_surat_1';

    protected $fillable = [
        'id_lokasi',
        'id_periode',
        'id_status_surat',
        'id_user',
        'nama_tamu',
        'asal_perusahaan',
        'email_tamu',
        'no_hp_tamu',
        'tujuan_keperluan',
        'nama_pic',
        'email_pic',
    ];

    public function lokasi()
    {
        return $this->belongsTo(LokasiTujuan::class, 'id_lokasi', 'id_lokasi');
    }

    public function periode()
    {
        return $this->belongsTo(PeriodeTamu::class, 'id_periode', 'id_periode');
    }

    public function statusSurat()
    {
        return $this->belongsTo(StatusSurat::class, 'id_status_surat', 'id_status_surat');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'id_user', 'id_user');
    }
}
