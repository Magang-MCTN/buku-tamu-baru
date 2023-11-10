@extends('dashboard/app')

@section('content')
    <div class="main-panel">
        <div class="content-wrapper">
            <div class="row">
                <div class="col-sm-12">
                    <div class="home-tab">
                        <div class="row">
<!-- Earnings (Monthly) Card Example -->
<div class="col">
    <a href="status-pengadaan" class="text-decoration-none">
        <div class="card mb-2">
            <div class="card-body d-flex align-self-center">
                <div class="row no-gutters align-items-center">
                    <div class="col">
                        <div class="fw-bold text-black">
                            Total <br> Kunjungan
                        </div>
                        <div class="card-title" style="font-size: 24px">{{ $jumlahPengajuanBarang }}</div>
                    </div>
                    {{-- <div class="col-auto">
                        <i class="mdi mdi-archive" style="color: #097b96"></i>
                    </div> --}}
                </div>
            </div>
        </div>
    </a>
</div>

<!-- Earnings (Monthly) Card Example -->
<div class="col">
    <a href="/pengadaan?status=diajukan" class="text-decoration-none">
        <div class="card mb-2">
            <div class="card-body d-flex align-self-center">
                <div class="row no-gutters align-items-center">
                    <div class="col">
                        <div class="fw-bold text-black">
                            Pengajuan <br> Kunjungan
                        </div>
                        <div class="card-title" style="font-size: 24px">{{ $jumlahPengajuanDiajukan }}</div>
                    </div>
                    {{-- <div class="col-auto">
                        <i class="mdi mdi-file-document" style="color: #097b96"></i>
                    </div> --}}
                </div>
            </div>
        </div>
    </a>
</div>

<!-- Earnings (Monthly) Card Example -->
<div class="col">
    <a href="/pengadaan?status=disetujui_admin_general" class="text-decoration-none">
        <div class="card mb-2">
            <div class="card-body d-flex align-self-center">
                <div class="row no-gutters align-items-center">
                    <div class="col">
                        <div class="fw-bold text-black">
                            Kunjungan disetujui
                        </div>
                        <div class="card-title" style="font-size: 24px">{{ $jumlahPengajuanDisetujui }}</div>
                    </div>
                    {{-- <div class="col-auto">
                        <i class="mdi mdi-file-check" style="color: #097b96"></i>
                    </div> --}}
                </div>
            </div>
        </div>
    </a>
</div>

<!-- Earnings (Monthly) Card Example -->
<div class="col">
    <a href="/pengadaan?status=ditolak_admin_general" class="text-decoration-none">
        <div class="card mb-2">
            <div class="card-body d-flex align-self-center">
                <div class="row no-gutters align-items-center">
                    <div class="col">
                        <div class="fw-bold text-black">
                            Kunjungan ditolak
                        </div>
                        <div class="card-title" style="font-size: 24px">{{ $jumlahPengajuanDitolak }}</div>
                    </div>
                    {{-- <div class="col-auto">
                        <i class="mdi mdi-file-check" style="color: #097b96"></i>
                    </div> --}}
                </div>
            </div>
        </div>
    </a>
</div>
</div>
</div>

            <div class="container">
                {{-- <h3>Data Surat 2</h3> --}}
                <div class="card mt-2">
                    <div class="card-body">
                <table class="table">
                    <thead>
                        <tr>
                            <th>Nama Tamu</th>
                            <th>Asal Perusahaan</th>
                            <th>Periode</th>
                            <th>Status Surat</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($suratToApprove as $data)
                            <tr>
                                <td>{{ $data->surat1->nama_tamu }}</td>
                                <td>{{ $data->surat1->asal_perusahaan }}</td>
                                <td>{{ $data->surat1->periode->tanggal_masuk->format('d-m-Y') }}
                                    - {{ $data->surat1->periode->tanggal_keluar->format('d-m-Y') }}</td>
                                <td>{{ $data->statusSurat->nama_status_surat }}</td>
                                <td>
                                    <a href="{{ route('admin.surat2.show', ['id' => $data->id_surat_2]) }}"
                                       class="btn btn-info">Lihat</a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
