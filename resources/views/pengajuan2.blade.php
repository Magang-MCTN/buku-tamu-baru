@extends('dashboard/app')

@section('content')
    <div class="container">
        <h2>Formulir Data Diri Tamu</h2>
        <form method="POST" action="{{ route('simpan.data.tamu') }}" enctype="multipart/form-data">
            @csrf

            {{-- Input Form --}}
            <label for="nama">Nama:</label>
            <input type="text" name="nama" id="nama" >

            <label for="no_ktp">Nomor KTP:</label>
            <input type="text" name="no_ktp" id="no_ktp" >

            <label for="masa_berlaku_ktp">Masa Berlaku KTP:</label>
            <input type="date" name="masa_berlaku_ktp" id="masa_berlaku_ktp" >

            <label for="jabatan">Jabatan:</label>
            <input type="text" name="jabatan" id="jabatan" >

            <label for="foto_ktp">Foto KTP:</label>
            <input type="file" name="foto_ktp" id="foto_ktp" accept="image/*" >

            <button type="button" id="tambahData">Tambah Data Tamu</button>

            {{-- Tabel Sementara --}}
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

            <button type="submit">Simpan Data Diri Tamu</button>
        </form>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function () {
        let dataTamu = []; // Array untuk menyimpan data tamu sementara

        $('#tambahData').click(function () {
            // Ambil data dari input
            let nama = $('#nama').val();
            let noKTP = $('#no_ktp').val();
            let masaBerlakuKTP = $('#masa_berlaku_ktp').val();
            let jabatan = $('#jabatan').val();
            let fotoKTP = $('#foto_ktp')[0].files[0]; // Foto KTP

            // Tambahkan data ke array
            dataTamu.push({
                nama: nama,
                no_ktp: noKTP,
                masa_berlaku_ktp: masaBerlakuKTP,
                jabatan: jabatan,
                foto_ktp: fotoKTP
            });

            // Tambahkan data tamu ke tabel sementara
            let newRow = '<tr>';
            newRow += `<td>${nama}</td>`;
            newRow += `<td>${noKTP}</td>`;
            newRow += `<td>${masaBerlakuKTP}</td>`;
            newRow += `<td>${jabatan}</td>`;
            newRow += '<td>Foto KTP</td>';
            newRow += '<td><button class="edit">Edit</button> | <button class="hapus">Hapus</button></td>';
            newRow += '</tr>';
            $('#tabelSementara').append(newRow);

            // Bersihkan input
            $('#nama').val('');
            $('#no_ktp').val('');
            $('#masa_berlaku_ktp').val('');
            $('#jabatan').val('');
            $('#foto_ktp').val('');
        });

        // Aksi edit dan hapus data tamu
        $('#tabelSementara').on('click', 'button.edit', function () {
            let index = $(this).closest('tr').index();
            let tamu = dataTamu[index];
            // Isi kembali input dengan data tamu yang akan diubah
            $('#nama').val(tamu.nama);
            $('#no_ktp').val(tamu.no_ktp);
            $('#masa_berlaku_ktp').val(tamu.masa_berlaku_ktp);
            $('#jabatan').val(tamu.jabatan);
            // Hapus data tamu dari array
            dataTamu.splice(index, 1);
            // Hapus baris dari tabel
            $(this).closest('tr').remove();
        });

        $('#tabelSementara').on('click', 'button.hapus', function () {
            let index = $(this).closest('tr').index();
            // Hapus data tamu dari array dan baris dari tabel
            dataTamu.splice(index, 1);
            $(this).closest('tr').remove();
        });
    });
</script>

@endsection
