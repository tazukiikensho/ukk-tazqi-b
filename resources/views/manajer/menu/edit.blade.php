@extends('layouts.app')

@section('content')

<div class="card">
    <h2>Edit Menu</h2>

    <form method="POST" action="/manajer/menu/update/{{ $menu->id }}">
        @csrf

        <input type="text" name="nama" value="{{ $menu->nama }}"><br><br>

        <input type="number" name="harga" value="{{ $menu->harga }}"><br><br>

        <select name="kategori_id">
            @foreach($kategori as $k)
                <option value="{{ $k->id }}" {{ $menu->kategori_id == $k->id ? 'selected' : '' }}>
                    {{ $k->nama }}
                </option>
            @endforeach
        </select>

        <br><br>

        <button class="btn btn-success">Update</button>
    </form>
</div>

@endsection