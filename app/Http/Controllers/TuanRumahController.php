<?php

namespace App\Http\Controllers;

use App\Mail\Send;
use App\Models\LokasiTujuan;
use App\Models\PeriodeTamu;
use App\Models\StatusSurat;
use App\Models\Surat1BukuTamu;
use App\Notifications\Approve;
use App\Notifications\MyNotification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

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
    public function show($id)
    {
        // Ambil data Surat1BukuTamu berdasarkan $id
        $surat1 = Surat1BukuTamu::findOrFail($id);

        // Kembalikan view untuk menampilkan detail Surat1BukuTamu
        return view('dashboard.tuanrumah.show', compact('surat1'));
    }

    public function delete($id)
    {
        // Hapus data Surat1BukuTamu berdasarkan $id
        $surat1 = Surat1BukuTamu::findOrFail($id);
        $surat1->delete();

        // Redirect ke halaman sebelumnya atau ke halaman lain
        return redirect()->back()->with('success', 'Data Surat 1 telah dihapus');
    }
    public function test()
    {

        Mail::to('rifqiakmal2001@gmail.com')->send(new Send);
        return 'Berhasil';
        // $user = Surat1BukuTamu::where('email_tamu', 'rifqiakmal2001@gmail.com')->first();

        // if ($user) {
        //     $user->notify(new MyNotification());
        //     return 'Test email notification sent.';
        // }

        // return 'User not found.';
    }
    public function approve(Request $request, $id)
    {
        // Set status surat menjadi "approved" (sesuaikan dengan kode status yang sesuai)
        $surat1 = Surat1BukuTamu::findOrFail($id);
        $surat1->id_status_surat = 2; // Misalnya, id_status_surat yang sesuai untuk status "approved"
        $surat1->alasan_surat1 = $request->input('alasan');
        $surat1->save();
        // Ambil alamat email tamu dari Surat 1
        $emailTamu = $surat1->email_tamu;
        $surat1_id = $id;
        // Kirim notifikasi ke alamat email tamu

        Mail::to($emailTamu)->send(new Send($surat1_id));

        // Redirect ke halaman sebelumnya atau ke halaman lain
        return redirect()->back()->with('success', 'Surat 1 telah disetujui');
    }
    public function reject(Request $request, $id)
    {
        // Set status surat menjadi "rejected" (sesuaikan dengan kode status yang sesuai)
        $surat1 = Surat1BukuTamu::findOrFail($id);
        $surat1->id_status_surat = 3; // Misalnya, id_status_surat yang sesuai untuk status "rejected"
        $surat1->alasan_surat1 = $request->input('alasan');
        $surat1->save();
        $emailTamu = $surat1->email_tamu;

        // Kirim notifikasi ke alamat email tamu
        Mail::to($emailTamu)->send(new Send);

        // Redirect ke halaman sebelumnya atau ke halaman lain
        return redirect()->back()->with('success', 'Surat 1 telah ditolak');
    }
}
