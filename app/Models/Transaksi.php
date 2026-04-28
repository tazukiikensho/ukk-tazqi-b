<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Transaksi extends Model
{
    protected $table = 'transaksis';

    protected $fillable = ['tanggal', 'total'];

    public function detail() {
        return $this->hasMany(DetailTransaksi::class);
    }
}