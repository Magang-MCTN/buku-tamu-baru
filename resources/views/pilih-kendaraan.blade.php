@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Pilihan Kendaraan dan Pengawalan</h2>
    <p> ID SURAT ANDA ADALAH {{ $surat1_id }} </p>

    <form id="form-pilihan-kendaraan" action="{{ route('pengawalan') }}" method="POST">>
        @csrf

        <label for="kendaraan">Bawa Kendaraan Sendiri:</label>
        <select name="kendaraan" id="kendaraan">
            <option value="kendaraan">Ya</option>
            <option value="surat2">Tidak</option>
        </select>

        <label for="pengawalan">Apakah tamu membutuhkan pengawalan?</label>
        <select name="pengawalan" id="pengawalan">
            <option value="Ya">Ya</option>
            <option value="Tidak">Tidak</option>
        </select>

        <button type="submit" class="btn btn-primary" id="submitButton">Simpan</button>
    </form>
</div>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function () {
        $('#submitButton').click(function (e) {
            e.preventDefault(); // Menghentikan pengiriman form

            var selectedOption = $('#kendaraan').val();

            if (selectedOption === 'kendaraan') {
                window.location.href = "/kendaraan?surat1_id={{ $surat1_id }}";
            } else if (selectedOption === 'surat2') {
                window.location.href = "/"; // Atur rute yang sesuai
            }
        });
    });
</script>
</html>
@endsection
