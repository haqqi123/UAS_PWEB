@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Tambah UMKM</h1>

    <form action="{{ route('store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="form-group">
            <label for="Nama_UMKM">Nama UMKM</label>
            <input type="text" name="Nama_UMKM" class="form-control" required>
        </div>

        <div class="form-group">
            <label for="Deskripsi">Deskripsi</label>
            <textarea name="Deskripsi" class="form-control" required></textarea>
        </div>

        <div class="form-group">
            <label for="Harga_Minimum">Harga Minimum</label>
            <input type="number" name="Harga_Minimum" class="form-control" required>
        </div>

        <div class="form-group">
            <label for="Harga_Maximum">Harga Maximum</label>
            <input type="number" name="Harga_Maximum" class="form-control" required>
        </div>

        <div class="form-group">
            <label for="Gambar">Gambar</label>
            <input type="file" name="Gambar" class="form-control" required>
        </div>

        <button type="submit" class="btn btn-primary">Simpan</button>
    </form>
</div>
@endsection
