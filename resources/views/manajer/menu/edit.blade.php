@extends('layouts.app')

@section('content')

<div class="card">
    <h1>Edit Menu</h1>

<form method="POST" action="/manajer/menu/update/{{ $menu->id }}" enctype="multipart/form-data">
    @csrf

    <!-- NAMA -->
    <input type="text" name="nama" value="{{ $menu->nama }}" class="border w-full p-2 mb-2">

    <!-- HARGA -->
    <input type="number" name="harga" value="{{ $menu->harga }}" class="border w-full p-2 mb-2">

    <!-- KATEGORI -->
    <select name="kategori_id" class="border w-full p-2 mb-2">
        @foreach($kategori as $k)
            <option value="{{ $k->id }}" 
                {{ $menu->kategori_id == $k->id ? 'selected' : '' }}>
                {{ $k->nama }}
            </option>
        @endforeach
    </select>

    <!-- 🖼️ GAMBAR LAMA -->
    @if($menu->gambar)
        <img src="{{ asset('storage/' . $menu->gambar) }}" 
             class="w-32 h-32 object-cover mb-2 rounded">
    @endif

    <!-- 📤 UPLOAD BARU -->
    <input type="file" name="gambar" class="border w-full p-2 mb-2">

    <button class="bg-blue-500 text-white px-4 py-2 rounded">
        Update
    </button>
</form>
</div>

@endsection