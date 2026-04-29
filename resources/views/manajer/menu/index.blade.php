@extends('layouts.app')

@section('content')

<div class="bg-white p-5 rounded shadow">

    <!-- HEADER -->
    <div class="flex justify-between items-center mb-6">
        <h2 class="text-xl font-bold">Kelola Menu</h2>

        <a href="/manajer/menu/create" 
           class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">
           + Tambah
        </a>
    </div>

    <!-- GRID MENU -->
    <div class="grid grid-cols-4 gap-4">

        @forelse($menu as $m)
        <div class="border p-4 rounded-xl hover:shadow-lg transition bg-gray-50">

            <!-- NAMA -->
            @if($m->gambar)
    <img src="{{ asset('storage/' . $m->gambar) }}" 
         class="w-full h-32 object-cover rounded mb-2">
@else
    <div class="w-full h-32 bg-gray-200 rounded mb-2 flex items-center justify-center text-sm text-gray-500">
        No Image
    </div>
@endif
            <h3 class="font-bold text-lg">{{ $m->nama }}</h3>

            <!-- KATEGORI -->
            <span class="text-xs bg-gray-200 px-2 py-1 rounded">
                {{ $m->kategori->nama ?? '-' }}
            </span>

            <!-- HARGA -->
            <p class="text-green-600 font-semibold mt-2">
                Rp {{ number_format($m->harga) }}
            </p>

            <!-- ACTION -->
            <div class="flex gap-2 mt-4">

                <a href="/manajer/menu/edit/{{ $m->id }}" 
                   class="flex-1 text-center bg-yellow-400 text-white py-1 rounded hover:bg-yellow-500">
                    Edit
                </a>

                <a href="/manajer/menu/delete/{{ $m->id }}" 
                   onclick="return confirm('Yakin hapus?')"
                   class="flex-1 text-center bg-red-500 text-white py-1 rounded hover:bg-red-600">
                    Hapus
                </a>

            </div>

        </div>
        @empty
        <p class="text-gray-500">Belum ada menu</p>
        @endforelse

    </div>

</div>

@endsection