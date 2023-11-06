@extends('dashboard.app')

@section('content')
<div class="container">
    <h1>Detail Surat 2 Buku Tamu</h1>
    <p>ID: {{ $surat2->id_surat_2_duri }}</p>
    <p>ID Surat 1: {{ $surat2->id_surat1 }}</p>
    <!-- Tampilkan detail lainnya sesuai kebutuhan -->

    <div class="d-flex">
        @if($surat2->id_status_surat === 6)
            <form action="{{ route('admin_duri.approve', $surat2->id_surat_2_duri) }}" method="POST">
                @csrf
                <button type="submit" class="btn btn-success me-2" id="btn-approve">Setuju</button>
            </form>
        @endif

        @if($surat2->id_status_surat === 6)
            <form action="{{ route('admin_duri.reject', $surat2->id_surat_2_duri) }}" method="POST">
                @csrf
                <button type="submit" class="btn btn-danger" id="btn-reject">Tolak</button>
            </form>
        @endif
    </div>

    <div class="d-flex">
        <div id="alasan-form" style="display: none;">
            <form action="{{ route('admin_duri.approve', $surat2->id_surat_2_duri) }}" method="POST">
                @csrf
                <div class="form-group my-3 me-3">
                    <label for="alasan_surat_2">Alasan Setuju:</label><br>
                    <textarea name="alasan_surat2" id="alasan_surat2" cols="40" rows="5" style="border-radius: 5px" required></textarea>
                </div>
                <button type="submit" class="btn btn-success">Setuju</button>
            </form>
        </div>

        <div id="alasan-tolak-form" style="display: none;">
            <form action="{{ route('admin_duri.reject', $surat2->id_surat_2_duri) }}" method="POST">
                @csrf
                <div class="form-group my-3 me-3">
                    <label for="alasan_surat_2">Alasan Tolak:</label><br>
                    <textarea name="alasan_surat2" id="alasan_surat2" cols="40" rows="5" style="border-radius: 5px" required></textarea>
                </div>
                <button type="submit" class="btn btn-danger">Tolak</button>
            </form>
        </div>
    </div>

    <a href="{{ route('admin_duri.dashboard') }}" class="btn btn-primary my-4">Kembali</a>
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
