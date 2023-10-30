<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Feedback extends Model
{
    use HasFactory;
    protected $table = 'feedback';
    protected $fillable = ['nilai_feedback', 'feedback']; // Kolom-kolom yang dapat diisi

    public function periodeTamu()
    {
        return $this->belongsTo(PeriodeTamu::class, 'id_periode', 'id_periode');
    }
}
