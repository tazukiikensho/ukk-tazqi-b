<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DetailTransaksi extends Model
{
    protected $table = 'detail_transaksis';

    protected $fillable = [
        'transaksi_id',
        'menu_id',
        'qty',
        'subtotal'
    ];

    public function transaksi() {
        return $this->belongsTo(Transaksi::class);
    }

    public function menu() {
        return $this->belongsTo(Menu::class);
    }
}