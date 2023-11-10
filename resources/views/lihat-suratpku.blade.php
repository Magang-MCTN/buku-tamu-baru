@extends('layouts.app')

@section('content')
<div class="container">
    <div class="card">
        <div class="card-body p-5">
            <div class="container table-responsive" style="overflow-x:auto;" >
                <div class="row">
                    <div class="col">
                        <h3 class="fw-bold">FORM IZIN MASUK PT MCTN </h3>
                        <h4 class="btn border"> {{ $surat2->surat1->lokasi->nama_lokasi }}</h4>
                        <p><strong>Kode Surat &nbsp;:</strong> {{ $surat2->kode_unik }}</p>
                        <p><strong>Asal Perusahaan:</strong> {{ $surat2->surat1->asal_perusahaan }}</p>
                        <p><strong>Tujuan Keperluan:</strong> {{ $surat2->surat1->tujuan_keperluan }}</p>
                        <p><strong>Periode:</strong> {{ $surat2->surat1->periode->tanggal_masuk->format('d-m-Y') }} s.d. {{ $surat2->surat1->periode->tanggal_keluar->format('d-m-Y') }}</p>
                        <p><strong>Jam Kedatangan:</strong> {{ explode(' ', $surat2->surat1->periode->jam_kedatangan)[1] }}</p>

                        {{-- <p><strong>Jam Kedatangan:</strong> {{ $surat2->surat1->periode->jam_kedatangan }}</p> --}}
                        {{-- <p><strong>From Izin Masuk Duri Field PHR - MCTN</strong></p> --}}
                    </div>
                    <div class="col">
                        <div class="d-flex justify-content-end">
                            <h4 class="border" style="padding: 10px; border-radius: 6px"> {{ $surat2->surat1->lokasi->nama_lokasi }}</h4>
                        </div>
                    </div>
                </div>
                <div class="d-flex justify-content-end">
                    @if ($surat2->statusSurat->id_status_surat == 2)
                        <a href="/cetak-suratjkt/{{$surat2->id_surat_2}}" class="btn btn-primary">Cetak Dokumen</a>
                    @endif
                </div>

                <h4 class="fw-bold">Data Tamu</h4>
                <table class="table table-bordered text-center">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama</th>
                            <th>No KTP</th>
                            <th>Tanggal Masa Berlaku</th>
                            <th>Jabatan</th>
                            <th>Foto Kartu Identitas</th>
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
                                <td><a href="" class="badge" style="background-color: #097B96; color: white; text-decoration: none;">Lihat Foto</a></td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>

                <h4 class="fw-bold mt-4">Data Kendaraan</h4 >
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            {{-- <th>No</th> --}}
                            <th>Tipe Mobil</th>
                            <th>Warna</th>
                            <th>No Polisi</th>
                            <th>Nama Supir</th>
                            <th>Masa Berlaku STNK</th>
                            <th>Masa Berlaku KIR</th>
                            <th>Masa Berlaku SIM</th>
                            <th>Foto</th>
                        </tr>
                    </thead>
                    <tbody>
                            @if ($surat2->surat1->kendaraan->isEmpty())
                                <tr>
                                    <td colspan="8">TIDAK MEMBAWA KENDARAAN</td>
                                </tr>
                            @else
                                @foreach ($surat2->surat1->kendaraan as $kendaraan)
                            <tr>
                                {{-- <td>{{ $loop->iteration }}</td> --}}
                                <td>{{ $kendaraan->tipe_mobil }}</td>
                                <td>{{ $kendaraan->warna }}</td>
                                <td>{{ $kendaraan->nomor_polisi }}</td>
                                <td>{{ $kendaraan->nama_supir }}</td>
                                <td>{{ $kendaraan->masa_berlaku_stnk }}</td>
                                <td>{{ $kendaraan->masa_berlaku_kir }}</td>
                                <td>{{ $kendaraan->masa_berlaku_sim }}</td>
                                <td>
                                    <a href="" class="badge my-1" style="background-color: #097B96; color: white; text-decoration: none;">Foto SIM</a><br>
                                    <a href="" class="badge my-1" style="background-color: #097B96; color: white; text-decoration: none;">Foto STNK</a><br>
                                    <a href="" class="badge my-1" style="background-color: #097B96; color: white; text-decoration: none;">Foto Kendaraan</a><br>
                                    <div class="">
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                        @endif
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

                <h2>Kendaraan M</h2>
                <p><strong>
                        @if ($surat2->surat1->kendaraan->isNotEmpty())
                            Membawa Kendaraan Pribadi
                        @else
                            Di Jemput MCTN.
                        @endif

                        @if ($surat2->surat1->pengawalan == 'ya')
                            Butuh Pengawalan
                        @elseif ($surat2->surat1->pengawalan == 'tidak')
                            Tidak Butuh Pengawalan
                        @else
                        Tidak Butuh Pengawalan
                        @endif</strong>
                    </p>
            </div>
        </div>
    </div>
</div>
@endsection
