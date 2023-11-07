@extends('layouts.app')

@section('content')

<div class="text-center my-5">
    <h2 class="fw-bold" style="color: #097B96;">Status Pengajuan Kunjungan</h2>
    <h1 class="fw-bold" style="font-size: 200%">PT Mandau Cipta Tenaga Nusantara</h1>
</div>
<div class="container">
    <div class="card m-5 p-3">
        <div class="card-body">
            <div class="container">
                <h2 class="text-center" style="color: #097B96;">Cek Status Pengajuan Kunjungan Anda</h2><hr>
                <form action="{{ route('cari-status') }}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label class="fw-bold" for="kode_unik">Masukkan Kode Surat</label>
                        <input type="text" name="kode_unik" class="form-control" placeholder="Kode Surat" required>
                    </div>
                    <div class="d-flex justify-content-end">
                        <button type="submit" class="btn" style="background-color: #097B96; color: white">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection

