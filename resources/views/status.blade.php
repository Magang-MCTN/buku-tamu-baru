@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Cari Status Surat</h2>
    <form action="{{ route('cari-status') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="kode_unik">Kode Unik:</label>
            <input type="text" name="kode_unik" class="form-control" required>
        </div>
        <button type="submit" class="btn btn-primary">Cari Status</button>
    </form>
</div>
@endsection

