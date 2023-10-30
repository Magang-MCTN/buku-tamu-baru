<?php

namespace App\Http\Controllers;

use App\Models\LokasiTujuan;
use App\Models\PeriodeTamu;
use App\Models\StatusSurat;
use App\Models\Surat1BukuTamu;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $surat1 = Surat1BukuTamu::all();
        $lokasi = LokasiTujuan::all();
        $periode = PeriodeTamu::all();
        $status = StatusSurat::all();



        return view('dashboard.home', compact('surat1', 'lokasi', 'periode', 'status'));
    }
}
