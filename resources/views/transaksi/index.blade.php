@extends('layouts.app')

@section('content')

<div class="bg-white p-5 rounded shadow">

<h2 class="text-xl font-bold mb-4">Transaksi</h2>

<form method="POST" action="/transaksi">
@csrf

@foreach($menu as $m)
<div class="flex justify-between border-b py-2">
    <span>{{ $m->nama }} (Rp {{ $m->harga }})</span>
    <input type="number" name="menu[{{ $m->id }}][qty]" class="border p-1 w-20">
    <input type="hidden" name="menu[{{ $m->id }}][id]" value="{{ $m->id }}">
    <input type="hidden" name="menu[{{ $m->id }}][harga]" value="{{ $m->harga }}">
</div>
@endforeach

<button class="mt-4 bg-green-500 text-white px-4 py-2 rounded">Simpan</button>

</form>

</div>

@endsection