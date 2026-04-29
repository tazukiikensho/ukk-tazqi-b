@extends('layouts.app')

@section('content')

<div class="card">
    <h2>Tambah Menu</h2>

    <form method="POST" action="/manajer/menu/store" enctype="multipart/form-data">
        @csrf

        <input type="text" name="nama" placeholder="Nama Menu"><br><br>
        <input type="number" name="harga" placeholder="Harga"><br><br>
        <input type="file" name="gambar" class="border w-full p-2 mt-2 rounded"><br><br>
        <select name="kategori_id">
            @foreach($kategori as $k)
                <option value="{{ $k->id }}">{{ $k->nama }}</option>
            @endforeach
        </select>

        <br><br>

        <button class="btn btn-success">Simpan</button>
    </form>
</div>

@endsection