@extends('layouts.app')

@section('content')

<div class="bg-white p-5 rounded shadow mb-4">
    <form method="GET" class="flex gap-2">
        <input type="date" name="tanggal" class="border p-2">
        <input type="date" name="dari" class="border p-2">
        <input type="date" name="sampai" class="border p-2">
        <button class="bg-blue-500 text-white px-4 rounded">Filter</button>
    </form>
</div>

<div class="bg-white p-5 rounded shadow mb-4">
    <h3>Total: Rp {{ number_format($transaksi->sum('total')) }}</h3>
    <h4>Jumlah: {{ $transaksi->count() }}</h4>
</div>

<div class="bg-white p-5 rounded shadow">
    <table class="w-full">
        <tr class="bg-gray-200">
            <th class="p-2">Tanggal</th>
            <th>Total</th>
        </tr>

        @foreach($transaksi as $t)
        <tr class="border-t text-center">
            <td>{{ $t->tanggal }}</td>
            <td>Rp {{ number_format($t->total) }}</td>
        </tr>
        @endforeach
    </table>
</div>

@endsection