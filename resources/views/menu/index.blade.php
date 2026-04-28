<h1>Data Menu</h1>

<a href="/manajer/menu/create">+ Tambah Menu</a>

<hr>

@foreach($menu as $m)
    <p>
        {{ $m->nama }} - Rp {{ $m->harga }}
        | <a href="/manajer/menu/edit/{{ $m->id }}">Edit</a>
        | <a href="/manajer/menu/delete/{{ $m->id }}">Hapus</a>
    </p>
@endforeach