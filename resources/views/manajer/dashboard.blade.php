@extends('layouts.app')

@section('content')

<div class="grid grid-cols-3 gap-4">

    <div class="bg-white p-5 rounded shadow">
        <h3 class="text-gray-500">Total Menu</h3>
        <p class="text-2xl font-bold">{{ \App\Models\Menu::count() }}</p>
    </div>

    <div class="bg-white p-5 rounded shadow">
        <h3 class="text-gray-500">Total Transaksi</h3>
        <p class="text-2xl font-bold">{{ \App\Models\Transaksi::count() }}</p>
    </div>

    <div class="bg-white p-5 rounded shadow">
        <h3 class="text-gray-500">Total User</h3>
        <p class="text-2xl font-bold">{{ \App\Models\User::count() }}</p>
    </div>

</div>

@endsection