<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    protected $table = 'role';

    // Sisipkan atribut-atribut lainnya sesuai kebutuhan
    protected $fillable = [
        'nama_role',
        'keterangan_role',
    ];

    public function users()
    {
        return $this->belongsToMany(User::class);
    }
}
