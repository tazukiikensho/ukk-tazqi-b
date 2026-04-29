<?php

namespace App\Http\Controllers;

use App\Models\Transaksi;
use App\Models\DetailTransaksi;
use App\Models\Menu;
use App\Models\Log;
use Illuminate\Http\Request;

class TransaksiController extends Controller
{
    public function index()
    {
        $menu = Menu::all();
        return view('transaksi.index', compact('menu'));
    }

public function store(Request $request)
{
    $total = 0;

    // generate trx id
    $trx_id = 'TRX' . date('YmdHis');

  $transaksi = Transaksi::create([
    'trx_id' => $trx_id,
    'tanggal' => now(),
    'total' => 0,
    'kasir' => session('user')->name ?? 'Kasir',
    'customer' => $request->customer ?? '-',
    'tipe' => $request->tipe ?? 'takeaway',
    'meja' => $request->meja ?? '-',
    'metode_pembayaran' => $request->metode ?? 'cash',
    'bayar' => $request->bayar ?? 0,
    'kembali' => 0
]);

    foreach ($request->menu as $item) {
        $subtotal = $item['qty'] * $item['harga'];

        DetailTransaksi::create([
            'transaksi_id' => $transaksi->id,
            'menu_id' => $item['id'],
            'qty' => $item['qty'],
            'subtotal' => $subtotal
        ]);

        $total += $subtotal;
    }

    $transaksi->update([
        'total' => $total,
        'kembali' => ($request->bayar ?? 0) - $total
    ]);

    return redirect('/struk/' . $transaksi->id);
}
}