<?php

namespace App\Http\Controllers\Manajer;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Menu;
use App\Models\Kategori;
use App\Models\Log;

class MenuController extends Controller
{
    // 📋 LIST MENU
    public function index()
    {
        $menu = Menu::with('kategori')->get();
        return view('manajer.menu.index', compact('menu'));
    }

    // ➕ FORM TAMBAH
    public function create()
    {
        $kategori = Kategori::all();
        return view('manajer.menu.create', compact('kategori'));
    }

    // 💾 SIMPAN MENU
    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required',
            'harga' => 'required|numeric',
            'kategori_id' => 'required',
            'gambar' => 'image|mimes:jpg,png,jpeg|max:2048'
        ]);

        $gambarPath = null;

        if ($request->hasFile('gambar')) {
            $gambarPath = $request->file('gambar')->store('menu', 'public');
        }

        Menu::create([
            'nama' => $request->nama,
            'harga' => str_replace('.', '', $request->harga),
            'kategori_id' => $request->kategori_id,
            'gambar' => $gambarPath
        ]);

        return redirect('/manajer/menu')->with('success', 'Menu berhasil ditambahkan');
    }

    // ✏️ FORM EDIT
    public function edit($id)
    {
        $menu = Menu::find($id);
        $kategori = Kategori::all();

        return view('manajer.menu.edit', compact('menu', 'kategori'));
    }

    // 🔄 UPDATE MENU
    public function update(Request $request, $id)
    {
        $menu = Menu::find($id);

        $request->validate([
            'nama' => 'required',
            'harga' => 'required|numeric',
            'kategori_id' => 'required',
            'gambar' => 'image|mimes:jpg,png,jpeg|max:2048'
        ]);

        $gambarPath = $menu->gambar;

        if ($request->hasFile('gambar')) {
            $gambarPath = $request->file('gambar')->store('menu', 'public');
        }

        $menu->update([
            'nama' => $request->nama,
            'harga' => str_replace('.', '', $request->harga),
            'kategori_id' => $request->kategori_id,
            'gambar' => $gambarPath
        ]);

        return redirect('/manajer/menu')->with('success', 'Menu berhasil diupdate');
    }

    // 🗑️ HAPUS MENU
    public function destroy($id)
    {
        $menu = Menu::find($id);

        if (!$menu) {
            return redirect('/manajer/menu')->with('error', 'Menu tidak ditemukan');
        }

        try {
            $nama = $menu->nama;
            $menu->delete();

            // 📜 LOG
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