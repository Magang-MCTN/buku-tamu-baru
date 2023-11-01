@extends('dashboard/app')

@section('content')
<div class="container">
    <h2>Formulir Data Diri Tamu</h2>

    <!-- Formulir Data Diri -->
    <form id="form-datadiri">
        @csrf
        <!-- Input Form -->
        <label for="nama_tamu">Nama:</label>
        <input type="text" name="nama_tamu" id="nama_tamu" required>

        <label for="nik_tamu">Nomor KTP:</label>
        <input type="text" name="nik_tamu" id="nik_tamu" required>

        <label for="masa_berlaku_ktp">Masa Berlaku KTP:</label>
        <input type="text" name="masa_berlaku_ktp" id="masa_berlaku_ktp" required>

        <label for="jabatan">Jabatan:</label>
        <input type="text" name="jabatan" id="jabatan" required>

        <label for="foto_ktp">Foto KTP:</label>
        <input type="file" name="foto_ktp" id="foto_ktp" required>

        <button type="button" id="tambahData">Tambah Data Tamu</button>
    </form>

    <!-- Tabel Sementara -->
    <table>
        <thead>
            <tr>
                <th>Nama</th>
                <th>Nomor KTP</th>
                <th>Masa Berlaku KTP</th>
                <th>Jabatan</th>
                <th>Foto KTP</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody id="tabelSementara">
            <!-- Data tamu yang ditambahkan akan muncul di sini -->
        </tbody>
    </table>

    <!-- Tombol untuk menyimpan data tamu ke database -->
    <button type="button" id="submitTamu">Simpan Data Tamu ke Database</button>
</div>

<!-- jQuery -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<!-- Script AJAX untuk Mengirim Data -->
<script>
    $(document).ready(function () {
        let dataTamu = []; // Array untuk menyimpan data tamu sementara

        $('#tambahData').click(function () {
            // Ambil data dari input
            let nama_tamu = $('#nama_tamu').val();
            let nik_tamu = $('#nik_tamu').val();
            let masa_berlaku_ktp = $('#masa_berlaku_ktp').val();
            let jabatan = $('#jabatan').val();
            let foto_ktp = $('#foto_ktp')[0].files[0]; // Foto KTP

            // Tambahkan data ke array
            dataTamu.push({
                nama_tamu,
                nik_tamu,
                masa_berlaku_ktp,
                jabatan,
                foto_ktp
            });

            // Tambahkan data tamu ke tabel sementara
            let newRow = `<tr>
                <td>${nama_tamu}</td>
                <td>${nik_tamu}</td>
                <td>${masa_berlaku_ktp}</td>
                <td>${jabatan}</td>
                <td>${foto_ktp.name}</td>
                <td><button class="hapus">Hapus</button></td>
            </tr>`;
            $('#tabelSementara').append(newRow);

            // Bersihkan input
            $('#form-datadiri')[0].reset();
        });

        // Aksi hapus data tamu
        $('#tabelSementara').on('click', 'button.hapus', function () {
            let index = $(this).closest('tr').index();
            // Hapus data tamu dari array dan baris dari tabel
            dataTamu.splice(index, 1);
            $(this).closest('tr').remove();
        });

        // Tombol "Simpan Data Tamu ke Database"
        $('#submitTamu').click(function () {
            if (dataTamu.length > 0) {
                // Persiapkan data yang akan dikirim
                let formData = new FormData();
                formData.append('_token', $('input[name="_token"]').val());

                // Tambahkan data dan file ke FormData
                $.each(dataTamu, function (key, value) {
                    formData.append(`dataTamu[${key}][nama_tamu]`, value.nama_tamu);
                    formData.append(`dataTamu[${key}][nik_tamu]`, value.nik_tamu);
                    formData.append(`dataTamu[${key}][masa_berlaku_ktp]`, value.masa_berlaku_ktp);
                    formData.append(`dataTamu[${key}][jabatan]`, value.jabatan);
                    formData.append(`dataTamu[${key}][foto_ktp]`, value.foto_ktp);
                });

                // Kirim data ke server menggunakan AJAX
                $.ajax({
                    url: "/simpanTamu",
                    type: "POST",
                    data: formData,
                    contentType: false,
                    processData: false,
                    success: function (response) {
                        // Setelah data disimpan, bersihkan tabel sementara dan array data
                        dataTamu = [];
                        $('#tabelSementara').empty();
                        alert('Data tamu berhasil disimpan ke database.');
                    },
                    error: function (xhr, status, error) {
                        alert('Terjadi kesalahan saat menyimpan data.');
                    }
                });
            } else {
                alert('Tidak ada data tamu untuk disimpan.');
            }
        });
    });
</script>
@endsection
