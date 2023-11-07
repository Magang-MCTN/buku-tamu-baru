@extends('layouts.app')

@section('content')
<div class="container">
    <div class="text-center my-5">
        <h2 class="fw-bold" style="color: #097B96;">Formulir Buku Tamu</h2>
        <h1 class="fw-bold" style="font-size: 200%">PT Mandau Cipta Tenaga Nusantara</h1>
    </div>

    <div class="card m-5">
        <div class="card-body">
            <div class="container">
                <div class="row px-5">
                    <div class="col d-flex justify-content-center">
                        <div class="d-flex rounded-circle justify-content-center mx-3" style="border-radius: 50%; width: 30px; height: 30px; background-color: #000; opacity: 0.32">
                            <i class="mdi mdi-clipboard-outline d-flex" style="color:white; align-items: center;"></i>
                        </div>
                        <h2 class="fw-bold d-flex" style="opacity: 0.32;">1. Data Diri Tamu</h2>
                    </div>
                    <div class="col d-flex justify-content-center">
                        <div class="d-flex rounded-circle justify-content-center mx-3" style="border-radius: 50%; width: 30px; height: 30px; background-color: #097B96">
                            <i class="mdi mdi-clipboard-outline d-flex" style="color:white; align-items: center;"></i>
                        </div>
                        <h2 class="fw-bold d-flex" style="color: #097B96;">2. Data Kendaraan</h2>
                    </div>
                </div>
                <hr>
                <div class="form-group px-5" id="kendaraan-options">
                    <label for="kendaraan">Bawa Kendaraan Sendiri</label>
                    <select class="form-select form-control" name="kendaraan" id="kendaraan" required>
                        <option value="" selected disabled>Pilih</option>
                        <option value="kendaraan">Ya</option>
                        <option value="surat2">Tidak</option>
                    </select>
                </div>
                <form class="form-group px-5" id="form-pilihan-kendaraan" action="{{ route('pengawalan') }}" method="post">
                    @csrf
                    <div style="display: none;">
                        <label for="surat1_id">ID SURAT:</label>
                        <input class="form-select" type="text" name="surat1_id" id="surat1_id" required value="{{ $surat1_id }}">
                    </div>

                    <label for="pengawalan">Apakah anda membutuhkan pengawalan?</label>
                    <div class="form-check px-5">
                        <input class="form-check-input" type="radio" name="pengawalan" id="pengawalanYa" value="Ya">
                        <label class="form-check-label" for="pengawalanYa">Ya</label>
                    </div>
                    <div class="form-check px-5">
                        <input class="form-check-input" type="radio" name="pengawalan" id="pengawalanTidak" value="Tidak" checked>
                        <label class="form-check-label" for="pengawalanTidak">Tidak</label>
                    </div>
                    {{-- <select class="form-select form-control" name="pengawalan" id="pengawalan" style="width: 10%">
                        <option value="Ya">Ya</option>
                        <option value="Tidak">Tidak</option>
                    </select> --}}

                    <div class="d-flex justify-content-end px-5">
                        <button type="submit" class="btn btn-primary my-2" id="submitButton">Lanjutkan</button>
                    </div>
                </form>

                <div class="d-flex justify-content-end px-5">
                    <button id="lanjutkanButton" class="btn btn-primary">Submit</button>
                </div>
            </div>
        </div>
    </div>

</div>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
$(document).ready(function () {
    // Sembunyikan tombol "Lanjutkan" awalnya
    $('#lanjutkanButton').hide();

    // Event handler untuk opsi kendaraan di luar form
    $('#kendaraan-options select').change(function () {
        var selectedOption = $(this).val();

        if (selectedOption === 'kendaraan') {
            // Jika "Ya" dipilih, tampilkan form pengawalan
            $('#form-pilihan-kendaraan').show();
            $('#lanjutkanButton').hide(); // Sembunyikan tombol "Lanjutkan"
        } else if (selectedOption === 'surat2') {
            // Jika "Tidak" dipilih, sembunyikan form pengawalan
            $('#form-pilihan-kendaraan').hide();
            $('#lanjutkanButton').show(); // Tampilkan tombol "Lanjutkan"
        }
    });

    // Event handler untuk tombol "Lanjutkan"
    $('#lanjutkanButton').click(function (e) {
        e.preventDefault();
        $.ajax({
            url: '/dijemput',
            type: 'POST',
            data: { surat1_id: {{ $surat1_id }}, _token: '{{ csrf_token() }}' },
            success: function (response) {
                window.location.href = '/kode-unik/{{ $surat1_id }}';
            },
            error: function (xhr, status, error) {
                console.error(xhr.responseText); // Menampilkan respon kesalahan dari server di console
                alert('Terjadi kesalahan saat mengirimkan permintaan.');
            }
        });
    });

    // Sembunyikan form pengawalan awalnya
    $('#form-pilihan-kendaraan').hide();

    // Event handler untuk mengirim data pengawalan
    // $('#submitButton').click(function (e) {
    //     var selectedOption = $('#kendaraan').val();

    //     if (selectedOption === 'kendaraan') {
    //         // Jika "Ya" dipilih, kirim data pengawalan
    //         $.post('/pengawalan', { surat1_id: {{ $surat1_id }}, pengawalan: $('#pengawalan').val() }, function(response) {
    //             window.location.href = response.redirect;
    //         });
    //     }
    // });
});

</script>

@endsection
