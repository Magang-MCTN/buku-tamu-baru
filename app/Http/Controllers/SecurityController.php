<?php

namespace App\Http\Controllers;

use App\Models\Surat2BukuTamuDuri;
use Illuminate\Http\Request;

class SecurityController extends Controller
{
    public function index()
    {
        // Filter hanya data dengan status surat id 2 (misalnya)
        $surat2 = Surat2BukuTamuDuri::with(['surat1.periode', 'surat1', 'statusSurat', 'statusSurat'])
            ->whereHas('statusSurat', function ($query) {
                $query->where('id_status_surat', 2); // Ganti dengan ID status surat yang sesuai
            })
            ->get();

        return view('dashboard.security.index', compact('surat2'));
    }
    public function show($id_surat_2_duri)
    {
        $surat2 = Surat2BukuTamuDuri::with([
            'surat1.periode',
            'surat1.lokasi',
            'surat1.tamu',
            'surat1.kendaraan'
        ])->find($id_surat_2_duri);

        return view('dashboard.security.show', compact('surat2'));
    }
}
