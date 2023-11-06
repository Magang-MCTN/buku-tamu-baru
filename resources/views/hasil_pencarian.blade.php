@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Hasil Pencarian Status Surat</h2>

    @if ($status)
    <p>Status Surat dengan Kode Unik <strong>{{ $status->kode_unik }}</strong>:</p>
    <table class="table">
        <thead>
            <tr>
                <th>ID Surat</th>
                <th>ID Surat 2</th>
                <th>Nama Status Surat</th>
                <th>Lokasi</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>{{ $status->id_surat_1 }}</td>
                <td>{{ $status->id_surat_2_duri }}</td>
                <td>{{ $status->statusSurat->nama_status_surat }}</td>
                <td>{{ $status->surat1->lokasi->nama_lokasi }}</td>
                <td>
                    <a href="{{ route('surat2.show', $status->id_surat_2_duri)}}" class="btn btn-primary">Lihat</a>
                </td>
            </tr>
        </tbody>
    </table>
    @else
    <p>Data dengan kode unik '{{ $kodeUnik }}' tidak ditemukan.</p>
    @endif
</div>
@endsection
