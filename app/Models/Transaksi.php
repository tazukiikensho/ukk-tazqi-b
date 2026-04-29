<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Transaksi extends Model
{
    protected $table = 'transaksis';

    protected $fillable = [
    'trx_id',
    'tanggal',
    'total',
    'kasir',
    'customer',
    'tipe',
    'meja',
    'metode_pembayaran',
    'bayar',
    'kembali'
];

   public function detail()
{
    return $this->hasMany(DetailTransaksi::class);
}
}