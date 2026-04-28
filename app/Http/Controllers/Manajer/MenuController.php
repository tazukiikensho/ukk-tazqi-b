<?php

namespace App\Http\Controllers\Manajer;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Menu;
use App\Models\Log;

class MenuController extends Controller
{
    public function index()
    {
        $menu = Menu::all();
        return view('manajer.menu.index', compact('menu'));
    }

    public function create()
    {
        $kategori = \App\Models\Kategori::all();
        return view('manajer.menu.create', compact('kategori'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required',
            'harga' => 'required|numeric',
            'kategori_id' => 'required'
        ]);

        $harga = str_replace('.', '', $request->harga);

        Menu::create([
            'nama' => $request->nama,
            'harga' => $harga,
            'kategori_id' => $request->kategori_id
        ]);

        // ✅ LOG TAMBAH
        Log::create([
            'user' => session('user')->email,
            'aktivitas' => 'Menambahkan menu: ' . $request->nama
        ]);

        return redirect('/manajer/menu')->with('success', 'Menu berhasil ditambahkan');
    }

    public function edit($id)
    {
        $menu = Menu::find($id);
        $kategori = \App\Models\Kategori::all();
        return view('manajer.menu.edit', compact('menu', 'kategori'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nama' => 'required',
            'harga' => 'required|numeric',
            'kategori_id' => 'required'
        ]);

        $menu = Menu::find($id);

        $harga = str_replace('.', '', $request->harga);

        $menu->update([
            'nama' => $request->nama,
            'harga' => $harga,
            'kategori_id' => $request->kategori_id
        ]);

        // ✅ LOG EDIT
        Log::create([
            'user' => session('user')->email,
            'aktivitas' => 'Mengedit menu: ' . $request->nama
        ]);

        return redirect('/manajer/menu')->with('success', 'Menu berhasil diupdate');
    }

    public function destroy($id)
    {
        $menu = Menu::find($id);

        if (!$menu) {
            return redirect('/manajer/menu')->with('error', 'Menu tidak ditemukan');
        }

        try {
            $nama = $menu->nama;
            $menu->delete();

            // ✅ LOG DELETE
            Log::create([
                'user' => session('user')->email,
                'aktivitas' => 'Menghapus menu: ' . $nama
            ]);

            return redirect('/manajer/menu')->with('success', 'Menu berhasil dihapus');

        } catch (\Exception $e) {
            return redirect('/manajer/menu')->with('error', 'Menu tidak bisa dihapus karena sudah digunakan');
        }
    }
}