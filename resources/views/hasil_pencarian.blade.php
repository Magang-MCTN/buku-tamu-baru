@extends('layouts.app')

@section('content')
<div class="container">
    <div class="text-center my-5">
        <h2 class="fw-bold" style="color: #097B96;">Formulir Pengajuan Kunjungan</h2>
        <h1 class="fw-bold" style="font-size: 200%">PT Mandau Cipta Tenaga Nusantara</h1>
    </div>

    @if ($status || $statuss)
    <div class="container">
        <div class="card mb-3 px-5">
            <div class="card-body">
                <table class="table text-center">
                    <thead>
                        <tr>
                            <th>Kode Surat</th>
                            <th>Tujuan</th>
                            <th>Nama Status Surat</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>{{ $status ? $status->kode_unik : $statuss->kode_unik }}</td>
                            <td>{{ $status ? $status->surat1->lokasi->nama_lokasi : $statuss->surat1->lokasi->nama_lokasi }}</td>
                            @if ($status)
                                @if ($status->surat1->lokasi->nama_lokasi == 'Kantor MCTN Jakarta')
                                    <!-- Isi untuk Jakarta -->
                                    @if ($statuss && ($statuss->surat1->lokasi->nama_lokasi != 'Kantor MCTN Pekanbaru') && ($statuss->surat1->lokasi->nama_lokasi != 'Ladang Minyak Duri'))
                                        <!-- Cek jika statuss valid dan bukan dari Pekanbaru atau Ladang Minyak Duri -->
                                        @if ($statuss->id_status_surat == 1 || $statuss->id_status_surat == 4 || $statuss->id_status_surat == 6)
                                            <td><p class="badge badge-warning">{{ $statuss->statusSurat->nama_status_surat }}</p></td>
                                            <td>
                                                <a href="{{ route('surat2.showjkt', $statuss->id_surat_2)}}" class="btn btn-secondary">Lihat</a>
                                            </td>
                                        @elseif ($statuss->id_status_surat == 2)
                                            <td><p class="badge badge-success">{{ $statuss->statusSurat->nama_status_surat }}</p></td>
                                            <td>
                                                <a href="{{ route('surat2.showjkt', $statuss->id_surat_2)}}" class="btn btn-primary">Lihat</a>
                                            </td>
                                        @else
                                            <td><p class="badge badge-danger">{{ $statuss->statusSurat->nama_status_surat }}</p></td>
                                            <td>
                                                <a href="{{ route('surat2.showjkt', $statuss->id_surat_2)}}" class="btn btn-primary">Ajukan Kembali</a>
                                            </td>
                                        @endif
                                    @endif
                                @elseif ($status->surat1->lokasi->nama_lokasi == 'Kantor MCTN Pekanbaru')
                                    <!-- Isi untuk Pekanbaru -->
                                    @if ($statuss && ($statuss->surat1->lokasi->nama_lokasi == 'Kantor MCTN Pekanbaru') && ($statuss->surat1->lokasi->nama_lokasi != 'Ladang Minyak Duri'))
                                        <!-- Cek jika statuss valid dan dari Pekanbaru dan bukan dari Ladang Minyak Duri -->
                                        @if ($statuss->id_status_surat == 1 || $statuss->id_status_surat == 4 || $statuss->id_status_surat == 6)
                                            <td><p class="badge badge-warning">{{ $statuss->statusSurat->nama_status_surat }}</p></td>
                                            <td>
                                                <a href="{{ route('surat2.showpku', $statuss->id_surat_2)}}" class="btn btn-secondary">Lihat</a>
                                            </td>
                                        @elseif ($statuss->id_status_surat == 2)
                                            <td><p class="badge badge-success">{{ $statuss->statusSurat->nama_status_surat }}</p></td>
                                            <td>
                                                <a href="{{ route('surat2.showpku', $statuss->id_surat_2)}}" class="btn btn-primary">Lihat</a>
                                            </td>
                                        @else
                                            <td><p class="badge badge-danger">{{ $statuss->statusSurat->nama_status_surat }}</p></td>
                                            <td>
                                                <a href="{{ route('surat2.showpku', $statuss->id_surat_2)}}" class="btn btn-primary">Ajukan Kembali</a>
                                            </td>
                                        @endif
                                    @endif
                                @elseif ($status->surat1->lokasi->nama_lokasi == 'Ladang Minyak Duri')
                                    <!-- Isi untuk Ladang Minyak Duri -->
                                    @if ($statuss && ($statuss->surat1->lokasi->nama_lokasi == 'Ladang Minyak Duri'))
                                        <!-- Cek jika statuss valid dan dari Ladang Minyak Duri -->
                                        @if ($statuss->id_status_surat == 1 || $statuss->id_status_surat == 4 || $statuss->id_status_surat == 6)
                                            <td><p class="badge badge-warning">{{ $statuss->statusSurat->nama_status_surat }}</p></td>
                                            <td>
                                                <a href="{{ route('surat2.show', $statuss->id_surat_2_duri)}}" class="btn btn-secondary">Lihat</a>
                                            </td>
                                        @elseif ($statuss->id_status_surat == 2)
                                            <td><p class="badge badge-success">{{ $statuss->statusSurat->nama_status_surat }}</p></td>
                                            <td>
                                                <a href="{{ route('surat2.show', $statuss->id_surat_2_duri)}}" class="btn btn-primary">Lihat</a>
                                            </td>
                                        @else
                                            <td><p class="badge badge-danger">{{ $statuss->statusSurat->nama_status_surat }}</p></td>
                                            <td>
                                                <a href="{{ route('surat2.show', $statuss->id_surat_2_duri)}}" class="btn btn-primary">Ajukan Kembali</a>
                                            </td>
                                        @endif
                                    @endif
                                <!-- Isi untuk lokasi lain -->
                                @else
                                    <!-- Isi untuk lokasi lain -->
                                    @if ($status->id_status_surat == 1 || $status->id_status_surat == 4 || $status->id_status_surat == 6)
                                        <td><p class="badge badge-warning">{{ $status->statusSurat->nama_status_surat }}</p></td>
                                        <td>
                                            <a href="{{ route('surat2.show', $status->id_surat_2_duri)}}" class="btn btn-secondary">Lihat</a>
                                        </td>
                                    @elseif ($status->id_status_surat == 2)
                                        <td><p class="badge badge-success">{{ $status->statusSurat->nama_status_surat }}</p></td>
                                        <td>
                                            <a href="{{ route('surat2.show', $status->id_surat_2_duri)}}" class="btn btn-primary">Lihat</a>
                                        </td>
                                    @else
                                        <td><p class="badge badge-danger">{{ $status->statusSurat->nama_status_surat }}</p></td>
                                        <td>
                                            <a href="{{ route('surat2.show', $status->id_surat_2_duri)}}" class="btn btn-primary">Ajukan Kembali</a>
                                        </td>
                                    @endif
                                @endif
                            @endif
                        </tr>
                    </tbody>
                </table>
                @else
                <p>Data dengan kode unik Tersebut tidak ditemukan.</p>
                @endif
            </div>
        </div>
    </div>
</div>
@endsection
