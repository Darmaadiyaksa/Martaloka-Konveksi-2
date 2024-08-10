<?php

use App\Http\Controllers\BerandaController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProdukController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\TransaksiController;

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

Route::get('/', [BerandaController::class, 'index'])->name('beranda');

Route::get('/detail-produk/{produk}', [BerandaController::class, 'detailProduk'])->name('home.detail-produk');




Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::get('/add-to-cart/{produk}', [BerandaController::class, 'addToCart'])->name('home.addToCart');
    Route::get('keranjang', [BerandaController::class, 'keranjang'])->name('home.keranjang');
    Route::post('/checkout', [BerandaController::class, 'checkout'])->name('home.checkout');
    Route::get('transaksi', [BerandaController::class, 'transaksi'])->name('home.transaksi');
    Route::get('/lengkapi-transaksi/{transaksi}', [BerandaController::class, 'formLengkapiTransaksi'])->name('home.formLengkapiTransaksi');
    Route::post('/upload-bukti-transaksi/{transaksi}', [BerandaController::class, 'uploadBuktiTransaksi'])->name('home.uploadBuktiTransaksi');
    // Dashboard Admin
    Route::prefix('dashboard')->group(function () {
        Route::view('/', 'admin.layout')->name('dashboard');

        // Kategori
        Route::get('kategori', [KategoriController::class, 'index'])->name('kategori.index');
        Route::get('kategori/create', [KategoriController::class, 'create'])->name('kategori.create');
        Route::post('kategori/store', [KategoriController::class, 'store'])->name('kategori.store');
        Route::get('kategori/edit/{kategori}', [KategoriController::class, 'edit'])->name('kategori.edit');
        Route::post('kategori/update/{kategori}', [KategoriController::class, 'update'])->name('kategori.update');
        Route::get('kategori/destroy/{kategori}', [KategoriController::class, 'destroy'])->name('kategori.destroy');
        // Produk
        Route::get('produk', [ProdukController::class, 'index'])->name('produk.index');
        Route::get('produk/create', [ProdukController::class, 'create'])->name('produk.create');
        Route::post('produk/store', [ProdukController::class, 'store'])->name('produk.store');
        Route::get('produk/edit/{id}', [ProdukController::class, 'edit'])->name('produk.edit');
        Route::post('produk/update/{id}', [ProdukController::class, 'update'])->name('produk.update');
        Route::get('produk/destroy/{id}', [ProdukController::class, 'destroy'])->name('produk.destroy');

        // Transaksi
        Route::get('transaksi', [TransaksiController::class, 'index'])->name('transaksi.index');
        Route::get('tansaksi/create', [TransaksiController::class, 'create'])->name('transaksi.create');
        Route::post('transaksi/store', [TransaksiController::class, 'store'])->name('transaksi.store');
        Route::get('transaksi/show/{transaksi}', [TransaksiController::class, 'show'])->name('transaksi.show');
        Route::post('transaksi/terima/{transaksi}', [TransaksiController::class, 'dibayar'])->name('transaksi.dibayar');
        Route::post('transaksi/batal/{batal}', [TransaksiController::class, 'batal'])->name('transaksi.batal');
    });
});




require __DIR__ . '/auth.php';
