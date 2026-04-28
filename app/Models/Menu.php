<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    protected $table = 'menus'; // opsional kalau nama tabel beda

    protected $fillable = ['nama', 'harga', 'kategori_id'];

    public function kategori() {
        return $this->belongsTo(Kategori::class);
    }
}