<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StatusSurat extends Model
{
    use HasFactory;
    protected $table = 'status_surat'; // Sesuaikan dengan nama tabel Anda
    protected $fillable = ['nama_status_surat']; // Kolom-kolom yang dapat diisi
}
