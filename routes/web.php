<?php

use App\Http\Controllers\BankPembayaranController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\KaryawanController;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\MasterStokController;
use App\Http\Controllers\OutletController;
use App\Http\Controllers\ProdukController;
use App\Http\Controllers\SatuanController;
use App\Http\Controllers\SupplierController;
use App\Http\Controllers\TransaksiPembelianController;
use App\Http\Controllers\UserController;
use App\Models\MasterStok;
use App\Models\TransaksiPembelian;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return redirect()->route('login');
});

Auth::routes();

Route::middleware('auth')->group(function(){
    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

    Route::resource('/users', UserController::class);
    Route::resource('/supplier', SupplierController::class);
    Route::resource('/karyawan', KaryawanController::class);
    Route::resource('/customer', CustomerController::class);
    Route::resource('/bank-pembayaran', BankPembayaranController::class);
    Route::resource('/outlet', OutletController::class);
    Route::resource('/kategori', KategoriController::class);
    Route::resource('/satuan', SatuanController::class);
    
    Route::resource('/produk', ProdukController::class);

    Route::resource('/master-stok', MasterStokController::class);

    Route::get('/transaksi-pembelian/cari-produk', [TransaksiPembelianController::class, 'cari_produk'])->name('transaksi-pembelian.cari-produk');
    Route::get('/transaksi-pembelian/export-pdf', [TransaksiPembelianController::class, 'export_pdf'])->name('transaksi-pembelian.export-pdf');
    Route::get('/transaksi-pembelian/{transaksi_pembelian}/approval', [TransaksiPembelianController::class, 'approval'])->name('transaksi-pembelian.approval');
    Route::put('/transaksi-pembelian/{transaksi_pembelian}/approve', [TransaksiPembelianController::class, 'approve'])->name('transaksi-pembelian.approve');
    Route::resource('/transaksi-pembelian', TransaksiPembelianController::class);
});
