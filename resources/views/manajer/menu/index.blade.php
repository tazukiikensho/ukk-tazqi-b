@extends('layouts.app')

@section('content')

<div class="bg-white p-5 rounded shadow">

    <div class="flex justify-between mb-4">
        <h2 class="text-xl font-bold">Kelola Menu</h2>
        <a href="/manajer/menu/create" class="bg-blue-500 text-white px-4 py-2 rounded">+ Tambah</a>
    </div>

    <table class="w-full border">
        <tr class="bg-gray-200">
            <th class="p-2">Nama</th>
            <th>Harga</th>
            <th>Kategori</th>
            <th>Aksi</th>
        </tr>

        @foreach($menu as $m)
        <tr class="text-center border-t">
            <td>{{ $m->nama }}</td>
            <td>Rp {{ number_format($m->harga) }}</td>
            <td>{{ $m->kategori->nama }}</td>
            <td>
                <a href="/manajer/menu/edit/{{ $m->id }}" class="text-blue-500">Edit</a> |
                <a href="/manajer/menu/delete/{{ $m->id }}" class="text-red-500">Hapus</a>
            </td>
        </tr>
        @endforeach

    </table>

</div>

@endsection