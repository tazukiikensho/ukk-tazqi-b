@extends('layouts.app')

@section('content')

<div class="card">
    <h2>Tambah Menu</h2>

    <form method="POST" action="/manajer/menu/store">
        @csrf

        <input type="text" name="nama" placeholder="Nama Menu"><br><br>

        <input type="number" name="harga" placeholder="Harga"><br><br>

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