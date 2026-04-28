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
        $transaksi = Transaksi::create([
            'tanggal' => now(),
            'total' => 0
        ]);

        $total = 0;

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

        // update total transaksi
        $transaksi->update(['total' => $total]);

        // ✅ CATAT LOG TRANSAKSI
        Log::create([
            'user' => session('user')->email,
            'aktivitas' => 'Melakukan transaksi dengan total Rp ' . $total
        ]);

        return redirect('/transaksi')->with('success', 'Transaksi berhasil');
    }
}