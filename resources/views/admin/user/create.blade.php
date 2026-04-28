@extends('layouts.app')

@section('content')

<div class="bg-white p-5 rounded shadow">

<h2 class="text-xl font-bold mb-4">Tambah User</h2>

<form method="POST" action="/admin/user/store">
@csrf

<input type="text" name="name" placeholder="Nama" class="border w-full p-2 mb-2">
<input type="email" name="email" placeholder="Email" class="border w-full p-2 mb-2">
<input type="password" name="password" placeholder="Password" class="border w-full p-2 mb-2">

<select name="role" class="border w-full p-2 mb-3">
    <option value="kasir">Kasir</option>
    <option value="manajer">Manajer</option>
    <option value="admin">Admin</option>
</select>

<button class="bg-green-500 text-white px-4 py-2 rounded">Simpan</button>

</form>

</div>

@endsection