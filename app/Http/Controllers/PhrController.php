<?php

namespace App\Http\Controllers;

use App\Models\Surat2BukuTamuDuri;
use Illuminate\Http\Request;
use App\Models\PeriodeTamu;
use App\Models\Surat2BukuTamu;
use Illuminate\Support\Facades\Auth;

class PhrController extends Controller
{
    public function index()
    {
        $surat2 = Surat2BukuTamuDuri::with(['surat1.periode', 'surat1', 'statusSurat', 'statusSurat'])

            ->get();


        return view('dashboard.phr.phr', compact('surat2'));
    }
    public function show($id_surat_duri)
    {
        $surat2 = Surat2BukuTamuDuri::with([
            'surat1.periode',
            'surat1.lokasi',
            'surat1.tamu',
            'surat1.kendaraan'
        ])->find($id_surat_duri);

        return view('dashboard.phr.show', compact('surat2'));
    }
    public function approve(Request $request, $id_surat_2_duri)
    {
        // Set status surat menjadi "approved" (sesuaikan dengan kode status yang sesuai)
        $surat2 = Surat2BukuTamuDuri::findOrFail($id_surat_2_duri);
        $surat2->id_status_surat = 6; // Misalnya, id_status_surat yang sesuai untuk status "approved"
        $surat2->alasan_surat2 = $request->input('alasan');
        $surat2->id_phr = Auth::user()->id_user;
        $surat2->save();




        // Redirect ke halaman sebelumnya atau ke halaman lain
        return redirect()->back()->with('success', 'Surat 2 telah disetujui');
    }

    public function reject(Request $request, $id_surat_2_duri)
    {
        // Set status surat menjadi "rejected" (sesuaikan dengan kode status yang sesuai)
        $surat2 = Surat2BukuTamuDuri::findOrFail($id_surat_2_duri);
        $surat2->id_status_surat = 5; // Misalnya, id_status_surat yang sesuai untuk status "rejected"
        $surat2->alasan_surat2 = $request->input('alasan');
        $surat2->id_phr = Auth::user()->id_user;
        $surat2->save();




        // Redirect ke halaman sebelumnya atau ke halaman lain
        return redirect()->back()->with('success', 'Surat 2 telah ditolak');
    }
}
