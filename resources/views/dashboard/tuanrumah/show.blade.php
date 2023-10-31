@extends('dashboard/app')

@section('content')
<div class="container">
    <h1>Detail Surat 1 Buku Tamu</h1>
    <p>ID: {{ $surat1->id_surat_1 }}</p>
    <p>Nama Tamu: {{ $surat1->nama_tamu}}</p>
    <p>Email Tamu: {{ $surat1->email_tamu }}</p>
    <p>No HP Tamu: {{ $surat1->no_hp_tamu }}</p>
    <p>Asal Perusahaan: {{ $surat1->asal_perusahaan }}</p>
    <p>Periode: {{ $surat1->periode->tanggal_masuk->format('d-m-Y') }} - {{ $surat1->periode->tanggal_keluar->format('d-m-Y') }}</p>
    <p>Jam Kedatangan: {{ $surat1->periode->jam_kedatangan }} </p>
    <p>Keperluan: {{ $surat1->tujuan_keperluan }}</p>
    <p>Daerah Kunjungan: {{ $surat1->lokasi->nama_lokasi }}</p>
    <p>Alasan {{ $surat1->alasan_surat1}}</p>
    <!-- Tampilkan detail lainnya sesuai kebutuhan -->




<div class="d-flex">
    @if($surat1->id_status_surat === 1)
    <form action="{{ route('tuanrumah.approve', $surat1->id_surat_1) }}" method="POST">
        @csrf
        <button type="submit" class="btn btn-success me-2" id="btn-approve">Setuju</button>
    </form>
    @endif

    @if($surat1->id_status_surat === 1)
    <form action="{{ route('tuanrumah.reject', $surat1->id_surat_1) }}" method="POST">
        @csrf
        <button type="submit" class="btn btn-danger" id="btn-reject">Tolak</button>
    </form>
    @endif
</div>
<div class="d-flex">
    <div id="alasan-form" style="display: none;">
        <form action="{{ route('tuanrumah.approve', $surat1->id_surat_1) }}" method="POST">
            @csrf
            <div class="form-group my-3 me-3">
                <label for="alasan">Alasan Setuju:</label><br>
                <textarea name="alasan" id="alasan" cols="40" rows="5" style="border-radius: 5px" required></textarea>
            </div>
            <button type="submit" class="btn btn-success">Setuju</button>
        </form>
    </div>

    <div id="alasan-tolak-form" style="display: none;">
        <form action="{{ route('tuanrumah.reject', $surat1->id_surat_1) }}" method="POST">
            @csrf
            <div class="form-group my-3 me-3">
                <label for="alasan">Alasan Tolak:</label><br>
                <textarea name="alasan" id="alasan" cols="40" rows="5" style="border-radius: 5px" required></textarea>
            </div>
            <button type="submit" class="btn btn-danger">Tolak</button>
        </form>
    </div>
</div>
<a href="#" class="btn btn-primary my-4">Kembali</a>
<!-- Tampilkan tombol setuju dan tolak jika status pengajuan adalah diajukan -->
</div>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const btnApprove = document.getElementById('btn-approve');
        const btnReject = document.getElementById('btn-reject');
        const alasanForm = document.getElementById('alasan-form');
        const alasanTolakForm = document.getElementById('alasan-tolak-form');

        btnApprove.addEventListener('click', function(e) {
            e.preventDefault();
            if (alasanForm.style.display === 'block') {
                alasanForm.style.display = 'none'; // Sembunyikan tampilan alasan setuju jika sudah terbuka
            } else {
                alasanForm.style.display = 'block'; // Tampilkan tampilan alasan setuju jika belum terbuka
                alasanTolakForm.style.display = 'none'; // Sembunyikan tampilan alasan tolak jika terbuka
            }
        });

        btnReject.addEventListener('click', function(e) {
            e.preventDefault();
            if (alasanTolakForm.style.display === 'block') {
                alasanTolakForm.style.display = 'none'; // Sembunyikan tampilan alasan tolak jika sudah terbuka
            } else {
                alasanTolakForm.style.display = 'block'; // Tampilkan tampilan alasan tolak jika belum terbuka
                alasanForm.style.display = 'none'; // Sembunyikan tampilan alasan setuju jika terbuka
            }
        });
    });
    </script>
@endsection
