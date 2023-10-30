<?php

namespace App\Http\Controllers;

use App\Models\LokasiTujuan;
use App\Models\PeriodeTamu;
use App\Models\Surat1BukuTamu;
use App\Models\User;
use Illuminate\Http\Request;

class TamuController extends Controller
{
    public function create()
    {
        $lokasiOptions = LokasiTujuan::all();
        return view('pengajuan', compact('lokasiOptions'));
    }

    public function store(Request $request)
    {
        // Validasi data yang diterima dari formulir
        $validatedData = $request->validate([
            'nama_tamu' => 'required',
            'asal_perusahaan' => 'required',
            'email_tamu' => 'required|email',
            'no_hp_tamu' => 'required',
            'nama_pic' => 'required',
            'email_pic' => 'required',
            'tujuan_keperluan' => 'required',
            // Tambahkan validasi dan kolom lain sesuai kebutuhan
        ]);

        // Simpan data ke tabel "lokasi_tujuan" jika belum ada
        // $lokasi = new LokasiTujuan(['nama_lokasi' => $request->id]);

        $id_lokasi = $request->lokasi;
        // Simpan data ke tabel "periode_tamu" untuk tanggal masuk dan keluar
        // $periode = new PeriodeTamu([
        //     'tanggal_masuk' => $request->tanggal_masuk,
        //     'tanggal_keluar' => $request->tanggal_keluar,
        //     'jam_kedatangan' => $request->jam_kedatangan,
        // ]);
        // $periode->save();

        // Simpan data ke tabel "user" untuk tuan rumah jika belum ada
        // $user = User::firstOrNew(['email' => $request->email_tuan_rumah]);
        // $user->name = $request->nama_tuan_rumah;
        // $user->save();

        // Simpan data ke tabel "surat_1_buku_tamu" dengan mengaitkannya ke lokasi, periode, dan user yang sudah tersimpan

        // Simpan objek PeriodeTamu terlebih dahulu
        $periode = new PeriodeTamu([
            'tanggal_masuk' => $request->tanggal_masuk,
            'tanggal_keluar' => $request->tanggal_keluar,
            'jam_kedatangan' => $request->jam_kedatangan,
        ]);
        $periode->save();

        // Setelah objek PeriodeTamu disimpan, dapatkan ID periode yang baru saja dibuat
        $id_periode = $periode->id_periode;

        // Kemudian, setel ID periode pada objek Surat1BukuTamu
        $surat1 = new Surat1BukuTamu([
            'id_lokasi' => 1, // ID lokasi yang sesuai
            'id_periode' => $id_periode, // ID periode yang sesuai
            'id_status_surat' => 1,
            'nama_pic' => $request->nama_pic,
            'email_pic' => $request->email_pic,
            'tujuan_keperluan' => $request->tujuan_keperluan,
            'nama_tamu' => $request->nama_tamu,
            'asal_perusahaan' => $request->asal_perusahaan,
            'email_tamu' => $request->email_tamu,
            'no_hp_tamu' => $request->no_hp_tamu,
            'tujuan_keperluan' => $request->tujuan_keperluan,
        ]);
        $surat1->save();






        // Redirect atau berikan pesan sukses
    }
}
