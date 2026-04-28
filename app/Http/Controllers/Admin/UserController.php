<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Log;

class UserController extends Controller
{
    public function index()
    {
        $user = User::all();
        return view('admin.user.index', compact('user'));
    }

    public function create()
    {
        return view('admin.user.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required',
            'password' => 'required',
            'role' => 'required'
        ]);

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => $request->password,
            'role' => $request->role
        ]);

        Log::create([
            'user' => session('user')->email,
            'aktivitas' => 'Menambahkan user: ' . $request->email
        ]);

        return redirect('/admin/user')->with('success', 'User berhasil ditambahkan');
    }

    public function edit($id)
    {
        $user = User::find($id);
        return view('admin.user.edit', compact('user'));
    }

    public function update(Request $request, $id)
    {
        $user = User::find($id);

        $user->update([
            'name' => $request->name,
            'email' => $request->email,
            'password' => $request->password,
            'role' => $request->role
        ]);

        Log::create([
            'user' => session('user')->email,
            'aktivitas' => 'Mengedit user: ' . $request->email
        ]);

        return redirect('/admin/user')->with('success', 'User berhasil diupdate');
    }

    public function destroy($id)
    {
        $user = User::find($id);

        $email = $user->email;
        $user->delete();

        Log::create([
            'user' => session('user')->email,
            'aktivitas' => 'Menghapus user: ' . $email
        ]);

        return redirect('/admin/user')->with('success', 'User berhasil dihapus');
    }
}