@extends('dashboard/app')

@section('content')

<div class="container">
    <h1 class="my-4">FORM IZIN MASUK PT MCTN</h1>
    <p class="my-2"><strong>Asal Perusahaan:</strong> {{ $surat2->surat1->asal_perusahaan }}</p>
    <p class="my-2"><strong>Tujuan:</strong> {{ $surat2->surat1->tujuan_keperluan }}</p>
    <p class="my-2"><strong>Periode:</strong> {{ $surat2->surat1->periode->tanggal_masuk }} - {{ $surat2->surat1->periode->tanggal_keluar }}</p>
    <p class="my-2"><strong>Jam Kedatangan:</strong> {{ $surat2->surat1->periode->jam_kedatangan }}</p>
    <p class="my-2"><strong>Lokasi Tujuan:</strong>Ladang Minyak Duri - MCTN</p>

    <h2 class="my-4">Data Diri Tamu</h2>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>No</th>
                <th>Nama</th>
                <th>NIK</th>
                <th>Tanggal Masa Berlaku</th>
                <th>Jabatan</th>
                <th>Foto KTP</th>
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
                <td>
                    <a href="{{ asset('uploads/' . $tamu->foto_ktp) }}" target="_blank">Lihat Foto KTP</a>

                </td>
            </tr>
            @endforeach
        </tbody>
    </table>

    <h2 class="my-4">Kendaraan</h2>
    {{-- <p><strong>Membawa Kendaraan:</strong> {{ $surat2->surat1->kendaraan->membawa_kendaraan }}</p> --}}
    <p><strong>Butuh Pengawalan:</strong> {{ $surat2->surat1->pengawalan }}</p>

    <h3 class="my-4">Data Kendaraan</h3>
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
                <th>Foto Kendaraan</th>
                <th>Foto STNK</th>
                <th>Foto SIM</th>
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
                <td>
                    <a href="{{ asset('uploads/' . $kendaraan->foto_kendaraan) }}" target="_blank">Lihat Foto Kendaraan</a>

                </td>
                <td>
                    <a href="{{ asset('uploads/' . $kendaraan->foto_stnk) }}" target="_blank">Lihat Foto STNK</a>

                </td>
                <td>
                    <a href="{{ asset('uploads/' . $kendaraan->foto_sim) }}" target="_blank">Lihat Foto SIM</a>

                </td>
            </tr>
            @endforeach
        </tbody>
    </table>



@endsection
