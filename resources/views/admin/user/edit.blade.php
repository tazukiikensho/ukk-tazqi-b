@extends('layouts.app')

@section('content')

<div class="bg-white p-5 rounded shadow">

<h2 class="text-xl font-bold mb-4">Edit User</h2>

<form method="POST" action="/admin/user/update/{{ $user->id }}">
@csrf

<input type="text" name="name" value="{{ $user->name }}" class="border w-full p-2 mb-2">
<input type="email" name="email" value="{{ $user->email }}" class="border w-full p-2 mb-2">
<input type="password" name="password" value="{{ $user->password }}" class="border w-full p-2 mb-2">

<select name="role" class="border w-full p-2 mb-3">
    <option value="kasir" {{ $user->role == 'kasir' ? 'selected' : '' }}>Kasir</option>
    <option value="manajer" {{ $user->role == 'manajer' ? 'selected' : '' }}>Manajer</option>
    <option value="admin" {{ $user->role == 'admin' ? 'selected' : '' }}>Admin</option>
</select>

<button class="bg-blue-500 text-white px-4 py-2 rounded">Update</button>

</form>

</div>

@endsection