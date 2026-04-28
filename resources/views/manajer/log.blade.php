@extends('layouts.app')

@section('content')

<div class="bg-white p-5 rounded shadow">
    <h2 class="text-xl font-bold mb-4">Log Aktivitas</h2>

    <table class="w-full border">
        <tr class="bg-gray-200">
            <th class="p-2">User</th>
            <th>Aktivitas</th>
            <th>Waktu</th>
        </tr>

        @foreach($log as $l)
        <tr class="text-center border-t">
            <td>{{ $l->user }}</td>
            <td>{{ $l->aktivitas }}</td>
            <td>{{ $l->created_at }}</td>
        </tr>
        @endforeach

    </table>
</div>

@endsection