<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use App\Http\Controllers\TransaksiController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\Manajer\MenuController;
use App\Http\Controllers\Admin\UserController;
use App\Models\Log;


/*
|--------------------------------------------------------------------------
| AUTH
|--------------------------------------------------------------------------
*/
Route::get('/login', [AuthController::class, 'loginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::get('/logout', [AuthController::class, 'logout']);

/*
|--------------------------------------------------------------------------
| HOME
|--------------------------------------------------------------------------
*/
Route::get('/', function () {
    return redirect('/login');
});

/*
|--------------------------------------------------------------------------
| TRANSAKSI (KASIR)
|--------------------------------------------------------------------------
*/
Route::get('/transaksi', [TransaksiController::class, 'index']);
Route::post('/transaksi', [TransaksiController::class, 'store']);

/*
|--------------------------------------------------------------------------
| DASHBOARD ROLE
|--------------------------------------------------------------------------
*/

/* MANAGER DASHBOARD */
Route::get('/manajer', function () {
    if (!session('user') || session('user')->role != 'manajer') {
        abort(403);
    }
    return view('manajer.dashboard');
});

/* ADMIN */
Route::get('/admin', function () {
    if (!session('user') || session('user')->role != 'admin') {
        abort(403);
    }

    return view('admin.dashboard');
});


Route::prefix('admin')->group(function () {

    Route::get('/user', [UserController::class, 'index']);
    Route::get('/user/create', [UserController::class, 'create']);
    Route::post('/user/store', [UserController::class, 'store']);
    Route::get('/user/edit/{id}', [UserController::class, 'edit']);
    Route::post('/user/update/{id}', [UserController::class, 'update']);
    Route::get('/user/delete/{id}', [UserController::class, 'destroy']);

});


/*
|--------------------------------------------------------------------------
| MENU MANAGER (CRUD)
|--------------------------------------------------------------------------
*/
Route::prefix('manajer')->group(function () {

    Route::get('/menu', [MenuController::class, 'index']);
    Route::get('/menu/create', [MenuController::class, 'create']);
    Route::post('/menu/store', [MenuController::class, 'store']);
    Route::get('/menu/edit/{id}', [MenuController::class, 'edit']);
    Route::post('/menu/update/{id}', [MenuController::class, 'update']);
    Route::get('/menu/delete/{id}', [MenuController::class, 'destroy']);

});

/*
|--------------------------------------------------------------------------
| LOG MANAGER
|--------------------------------------------------------------------------
*/

Route::get('/manajer/log', function () {
    if (!session('user') || session('user')->role != 'manajer') {
        abort(403);
    }

    $log = Log::latest()->get();
    return view('manajer.log', compact('log'));
});


/*
|--------------------------------------------------------------------------
| LAPORAN MANAGER
|--------------------------------------------------------------------------
*/

Route::get('/manajer/laporan', function (Request $request) {

    if (!session('user') || session('user')->role != 'manajer') {
        abort(403);
    }

    $query = \App\Models\Transaksi::query();

    // filter tanggal tunggal
    if ($request->tanggal) {
        $query->whereDate('tanggal', $request->tanggal);
    }

    // filter range tanggal
    if ($request->dari && $request->sampai) {
        $query->whereBetween('tanggal', [$request->dari, $request->sampai]);
    }

    $transaksi = $query->latest()->get();

    return view('manajer.laporan', compact('transaksi'));
});