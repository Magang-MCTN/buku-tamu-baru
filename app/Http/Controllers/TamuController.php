<?php

namespace App\Http\Controllers;

use App\Mail\Send;
use App\Models\DataDiriBukuTamu;
use App\Models\KendaraanBukuTamu;
use App\Models\LokasiTujuan;
use App\Models\Mobil;
use App\Models\PeriodeTamu;
use App\Models\Surat1BukuTamu;
use App\Models\Surat2BukuTamu;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

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
        $emailTamu = $surat1->email_pic;

        // Kirim notifikasi ke alamat email tamu
        Mail::to($emailTamu)->send(new Send($surat1));






        // Redirect atau berikan pesan sukses
    }
    public function surat2(Request $request)
    {
        $surat1_id = $request->input('surat1_id');
        return view('pengajuan2', compact('surat1_id'));
    }
    public function datatamu(Request $request)
    {
        $this->validate($request, [
            'nama_tamu' => 'required',
            'nik_tamu' => 'required',
            'masa_berlaku_ktp' => 'required',
            'jabatan' => 'required',
            'foto_ktp' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        if ($request->hasFile('foto_ktp')) {
            $fotoKtp = $request->file('foto_ktp');
            $namaFotoKtp = time() . '.' . $fotoKtp->getClientOriginalExtension();
            $fotoKtp->move(public_path('uploads'), $namaFotoKtp);
        }

        // Menggunakan $surat1_id sebagai id_surat_1
        $surat1_id = $request->input('surat1_id'); // Ambil dari permintaan HTTP

        $tamu = new DataDiriBukuTamu([
            'nama_tamu' => $request->nama_tamu,
            'nik_tamu' => $request->nik_tamu,
            'masa_berlaku_ktp' => $request->masa_berlaku_ktp,
            'jabatan' => $request->jabatan,
            'foto_ktp' => $namaFotoKtp, // Gunakan nama foto yang Anda simpan
            'id_surat_1' => $surat1_id, // Gunakan $surat1_id sebagai id_surat_1
        ]);

        $tamu->save();
    }


    public function upsurat2(Request $request, $id)
    {

        $surat2 = Surat2BukuTamu::all();
        $id->id_surat_1;
        // Validasi data Surat 2
        $this->validate($request, [

            'nama_tamu' => 'required',
            'nik_tamu' => 'required',
            'masa_berlaku_ktp' => 'required',
            'jabatan' => 'required',

            'foto_ktp' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048', // Validasi untuk foto KTP
            'bawa_kendaraan' => 'required|boolean',
            'tipe_mobil' => 'required_if:bawa_kendaraan,true', // Hanya validasi jika membawa kendaraan
            'warna' => 'required_if:bawa_kendaraan,true', // Hanya validasi jika membawa kendaraan
            'nomor_polisi' => 'required_if:bawa_kendaraan,true', // Hanya validasi jika membawa kendaraan
            'masa_berlaku_stnk' => 'required_if:bawa_kendaraan,true', // Hanya validasi jika membawa kendaraan
            'foto_stnk' => 'required_if:bawa_kendaraan,true', // Hanya validasi jika membawa kendaraan
            'pengawalan' => 'required_if:bawa_kendaraan,true|boolean', // Hanya validasi jika membawa kendaraan
            'nama_sopir' => 'required_if:bawa_kendaraan,true', // Hanya validasi jika membawa kendaraan
            'foto_sim' => 'required_if:bawa_kendaraan,true',
            'foto_kendaraan' => 'required_if:bawa_kendaraan,true',
            'masa_berlaku_kir' => '', // Hanya validasi jika membawa kendaraan
        ]);
        if ($request->hasFile('foto_ktp')) {
            $fotoKtp = $request->file('foto_ktp');
            $namaFotoKtp = time() . '.' . $fotoKtp->getClientOriginalExtension();
            $fotoKtp->move(public_path('uploads'), $namaFotoKtp);
        }
        if ($request->hasFile('foto_stnk')) {
            $fotostnk = $request->file('foto_stnk');
            $namaFotostnk = time() . '.' . $fotostnk->getClientOriginalExtension();
            $fotoKtp->move(public_path('uploads'), $namaFotostnk);
        }
        if ($request->hasFile('foto_sim')) {
            $fotosim = $request->file('foto_sim');
            $namaFotosim = time() . '.' . $fotosim->getClientOriginalExtension();
            $fotosim->move(public_path('uploads'), $namaFotosim);
        }
        if ($request->hasFile('foto_kendaraan')) {
            $fotokendaraan = $request->file('foto_kendaraan');
            $namaFotokendaraan = time() . '.' . $fotokendaraan->getClientOriginalExtension();
            $fotokendaraan->move(public_path('uploads'), $namaFotokendaraan);
        }

        $tamu = new DataDiriBukuTamu([

            'nama_tamu' => $request->nama_tamu,
            'nik_tamu' => $request->nik_tamu,
            'masa_berlaku_ktp' => $request->masa_berlaku_ktp,
            'jabatan' => $request->jabatan,
            'foto_ktp' => $request->namaFotoKtp,
            'id_surat_1' => $id,
        ]);
        $tamu->save();

        // Jika tamu membawa kendaraan, simpan data kendaraan
        if ($request->input('bawa_kendaraan')) {
            $mobil = new Mobil([
                'tipe_mobil' => $request->tipe_mobil,
                'warna' => $request->warna,
                'nomor_polisi' => $request->nomor_polisi,
                'masa_berlaku_stnk' => $request->masa_berlaku_stnk,
                'foto_stnk' => $request->namaFotostnk,
                'id_surat_1' => $id,
            ]);
            $mobil->save();
            $id_mobil = $mobil->id_mobil;
            $kendaraan = new KendaraanBukuTamu([
                'pengawalan' => $request->pengawalan,
                'id_mobil' => $id_mobil,
                'nama_sopir' => $request->nama_sopir,
                'masa_berlaku_kir' => $request->masa_berlaku_kir,
                'masa_berlaku_sim' => $request->masa_berlaku_sim,
                'foto_sim' => $request->namaFotosim,
                'foto_kendaraan' => $request->namaFotokendaraan,
                'id_tamu' => $tamu->id, // Gunakan ID tamu yang sudah disimpan
            ]);
            $kendaraan->save();
        }


        // Simpan Surat 2
        $surat2 = new Surat2BukuTamu;
        $surat2->id_surat_1 = $id;
        $surat2->id_kendaraan = $id;
        $surat2->id_tamu = $id;
        $surat2->id_ga_duri = null;
        $surat2->id_phr = null;
        $surat2->id_status_surat = 6;

        $randomNumber = mt_rand(1, 1000);
        $kodeUnik = "MCTN-$surat2->id_surat_2-$randomNumber";
        $surat2->kode_unik = $kodeUnik;
        $surat2->save();

        return redirect()->route('surat2.index')->with('success', 'Surat 2 berhasil disimpan.');
    }
}
