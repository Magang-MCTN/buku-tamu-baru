<?php

namespace App\Http\Controllers;

use App\Models\LokasiTujuan;
use App\Models\PeriodeTamu;
use App\Models\StatusSurat;
use App\Models\Surat1BukuTamu;
use Illuminate\Http\Request;

class TuanRumahController extends Controller
{
    public function index()
    {
        $surat1 = Surat1BukuTamu::with(['lokasi', 'periode', 'statusSurat'])
            ->select('id_surat_1', 'id_lokasi', 'id_periode', 'id_status_surat', 'nama_tamu', 'asal_perusahaan', 'email_tamu', 'no_hp_tamu', 'tujuan_keperluan')
            ->get();

        return view('dashboard.home', ['surat1' => $surat1]);
    }
    public function persetujuan()
    {
        $surat1 = Surat1BukuTamu::with(['lokasi', 'periode', 'statusSurat'])
            ->select('id_surat_1', 'id_lokasi', 'id_periode', 'id_status_surat', 'nama_tamu', 'asal_perusahaan', 'email_tamu', 'no_hp_tamu', 'tujuan_keperluan')
            ->get();

        return view('dashboard.persetujuan', ['surat1' => $surat1]);
    }
}
