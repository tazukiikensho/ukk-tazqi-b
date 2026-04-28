@extends('layouts.app')

@section('content')

<div class="bg-white p-5 rounded shadow">

<div class="flex justify-between mb-4">
    <h2 class="text-xl font-bold">Kelola User</h2>
    <a href="/admin/user/create" class="bg-blue-500 text-white px-4 py-2 rounded">+ Tambah</a>
</div>

@if(session('success'))
<p class="text-green-500">{{ session('success') }}</p>
@endif

<table class="w-full border">
<tr class="bg-gray-200">
    <th class="p-2">Nama</th>
    <th>Email</th>
    <th>Role</th>
    <th>Aksi</th>
</tr>

@foreach($user as $u)
<tr class="text-center border-t">
    <td>{{ $u->name }}</td>
    <td>{{ $u->email }}</td>
    <td>{{ $u->role }}</td>
    <td>
        <a href="/admin/user/edit/{{ $u->id }}" class="text-blue-500">Edit</a> |
        <a href="/admin/user/delete/{{ $u->id }}" class="text-red-500">Hapus</a>
    </td>
</tr>
@endforeach

</table>

</div>

@endsection