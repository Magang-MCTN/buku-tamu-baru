@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Detail Surat 2 Buku Tamu Duri</h1>
    <p><strong>Kode Unik:</strong> {{ $surat2->kode_unik }}</p>
    <p><strong>From Izin Masuk Duri Field PHR - MCTN</strong></p>
    <p><strong>Asal Perusahaan:</strong> {{ $surat2->surat1->asal_perusahaan }}</p>
    <p><strong>Tujuan Keperluan:</strong> {{ $surat2->surat1->tujuan_keperluan }}</p>
    <p><strong>Periode:</strong> {{ $surat2->surat1->periode->tanggal_masuk }} - {{ $surat2->surat1->periode->tanggal_keluar }}</p>
    <p><strong>Jam Kedatangan:</strong> {{ $surat2->surat1->periode->jam_kedatangan }}</p>

    <h2>Data Tamu</h2>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>No</th>
                <th>Nama</th>
                <th>No KTP</th>
                <th>Tanggal Masa Berlaku</th>
                <th>Jabatan</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($surat2->surat1->tamu as $tamu)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $tamu->nama_tamu }}</td>
                    <td>{{ $tamu->nik_tamu }}</td>
                    <td>{{ $tamu->masa_berlaku_ktp }}</td>
                    <td>{{ $tamu->jabatan }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <h2>Data Kendaraan</h2>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>No</th>
                <th>Tipe Mobil</th>
                <th>Warna</th>
                <th>No Polisi</th>
                <th>Nama Supir</th>
                <th>Masa Berlaku STNK</th>
                <th>Masa Berlaku KIR</th>
                <th>Masa Berlaku SIM</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($surat2->surat1->kendaraan as $kendaraan)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $kendaraan->tipe_mobil }}</td>
                    <td>{{ $kendaraan->warna }}</td>
                    <td>{{ $kendaraan->no_polisi }}</td>
                    <td>{{ $kendaraan->nama_supir }}</td>
                    <td>{{ $kendaraan->masa_berlaku_stnk }}</td>
                    <td>{{ $kendaraan->masa_berlaku_kir }}</td>
                    <td>{{ $kendaraan->masa_berlaku_sim }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>


    {{-- <table class="table table-bordered">
        <thead>
            <tr>
                <th>No</th>
                <th>Foto KTP</th>
                <th>Foto Kendaraan</th>
                <th>Foto SIM</th>
                <th>Foto STNK</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($surat2->surat1->files as $file)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $file->foto_ktp }}</td>
                    <td>{{ $file->kendaraan->foto_kendaraan }}</td>
                    <td>{{ $file->kendaraan->foto_sim }}</td>
                    <td>{{ $file->kendaraan->foto_stnk }}</td>
                </tr>
            @endforeach
        </tbody>
    </table> --}}

    <h2>Kendaraan Membawa</h2>
    <p>
        @if ($surat2->surat1->kendaraan->isEmpty())
            Tidak ada data kendaraan.
        @else
            @if ($surat2->surat1->kendaraan_bawa)
                Kendaraan membawa.
            @else
                Kendaraan tidak membawa.
            @endif
        @endif
    </p>
</div>
@endsection
