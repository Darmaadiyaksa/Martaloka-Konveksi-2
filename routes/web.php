<?php

use App\Http\Controllers\Admin\DashboardController;

// Admin
use App\Http\Controllers\Admin\KategoriController;
use App\Http\Controllers\Admin\ProdukController;
use App\Http\Controllers\Admin\ProgressCustomController;
use App\Http\Controllers\Admin\ProgressPembelianController;
use App\Http\Controllers\Admin\TransaksiCustomDashboardController;
use App\Http\Controllers\Admin\TransaksiDashboardController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\KontakController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Admin\NotificationController;

// Frontend
use App\Http\Controllers\Frontend\BerandaController;
use App\Http\Controllers\Frontend\TransaksiCustomDesignController;
use App\Http\Controllers\Frontend\TransaksiProdukController;
use App\Http\Controllers\ProfileuserController;
use App\Http\Controllers\ResponseController;
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

Route::get('/', [BerandaController::class, 'index'])->name('beranda');
Route::get('/kategori/{kategori:nama_kategori}', [BerandaController::class, 'kategori'])->name('home.kategori');
Route::get('/detail-produk/{produk}', [BerandaController::class, 'detailProduk'])->name('home.detail-produk');
Route::view('kontak', 'home.kontak')->name('home.kontak');
Route::post('kontak/store', [KontakController::class, 'store'])->name('kontak.store');
Route::view('tentang-kami', 'home.tentang-kami')->name('home.tentang-kami');



Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // Transaksi pembelian
    Route::post('add-to-cart/{produk}', [TransaksiProdukController::class, 'addToCart'])->name('home.addToCart');
    Route::get('keranjang', [TransaksiProdukController::class, 'keranjang'])->name('home.keranjang');
    Route::post('checkout', [TransaksiProdukController::class, 'checkout'])->name('home.checkout');
    Route::get('daftar-transaksi-pembelian', [TransaksiProdukController::class, 'daftarTransaksiPembelian'])->name('home.daftarTransaksiPembelian');
    Route::get('lengkapi-transaksi-pembelian/{transaksi}', [TransaksiProdukController::class, 'formLengkapiPembelian'])->name('home.formTransaksiPembelian');
    Route::post('pembayaran-transaksi-pembelian/{transaksi}/store', [TransaksiProdukController::class, 'storeDataTransaksi'])->name('home.storeDataTransaksi');
    Route::get('form-upload-transaksi-pembelian/{transaksi}', [TransaksiProdukController::class, 'formUploadBuktiTransaksiPembelian'])->name('home.formUploadBuktiTransaksiPembelian');
    Route::post('upload-bukti-transaksi/{transaksi}/upload-bukti', [TransaksiProdukController::class, 'uploadBuktiTransaksi'])->name('home.uploadBuktiTransaksi');
    Route::post('transaksi/progress/{progress}', [TransaksiProdukController::class, 'getProgress'])->name('home.detailProgressTransaksi');

    // Route::post('detail-progress/{progress}',[TransaksiProdukController::class,'getProgress'])->name('home.getProgress');


    // Custom Design
    Route::get('daftar-custom', [TransaksiCustomDesignController::class, 'daftarCustom'])->name('home.daftarCustom');
    Route::get('custom-design', [TransaksiCustomDesignController::class, 'createDesign'])->name('home.createDesign');
    Route::post('kirim-design', [TransaksiCustomDesignController::class, 'storeDesign'])->name('home.storeDesign');
    Route::get('pembayaran-custom-design/{transaksiCustomDesign}', [TransaksiCustomDesignController::class, 'formPembayaranTransaksiCustom'])->name('home.formPembayaranTransaksiCustom');
    Route::post('pembayaran-custom-design/{transaksiCustomDesign}/upload-bukti', [TransaksiCustomDesignController::class, 'uploadBuktiCustomDesign'])->name('home.uploadBuktiCustomDesign');
    Route::post('custom-design/progress/{progress}', [TransaksiCustomDesignController::class, 'getProgress'])->name('home.detailProgressCustom');
    // Route::get('custom-design', [TransaksiCustomDesignController::class, 'createDesign'])->name('home.createDesign');

    // Halaman Update Profile
    Route::get('profileuser', [ProfileuserController::class, 'edit'])->name('profileuser.edit');
    Route::patch('profileuser', [ProfileuserController::class, 'update'])->name('profileuser.update');
    Route::delete('profileuser', [ProfileuserController::class, 'destroy'])->name('profileuser.destroy');


    // Dashboard Admin
    Route::group(['middleware' => 'isAdmin', 'prefix' => 'dashboard'], function () {
        Route::get('/', [DashboardController::class, 'index'])->name('dashboard');
        Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
        Route::get('/export/pdf', [DashboardController::class, 'exportPDF'])->name('export.pdf');
        Route::get('/export/excel', [DashboardController::class, 'exportExcel'])->name('export.excel');

        // Kontak Admin
        Route::get('kontak', [KontakController::class, 'index'])->name('kontak.index');
        Route::get('kontak/edit/{kontak}', [KontakController::class, 'edit'])->name('kontak.edit');
        Route::put('kontak/update/{kontak}', [KontakController::class, 'update'])->name('kontak.update');
        Route::get('kontak/destroy/{kontak}', [KontakController::class, 'destroy'])->name('kontak.destroy');

        // Kategori
        Route::get('kategori', [KategoriController::class, 'index'])->name('kategori.index');
        Route::get('kategori/create', [KategoriController::class, 'create'])->name('kategori.create');
        Route::post('kategori/store', [KategoriController::class, 'store'])->name('kategori.store');
        Route::get('kategori/edit/{kategori}', [KategoriController::class, 'edit'])->name('kategori.edit');
        Route::post('kategori/update/{kategori}', [KategoriController::class, 'update'])->name('kategori.update');
        Route::delete('kategori/destroy/{kategori}', [KategoriController::class, 'destroy'])->name('kategori.destroy');
        // Produk
        Route::get('produk', [ProdukController::class, 'index'])->name('produk.index');
        Route::get('produk/create', [ProdukController::class, 'create'])->name('produk.create');
        Route::post('produk/store', [ProdukController::class, 'store'])->name('produk.store');
        Route::get('produk/edit/{id}', [ProdukController::class, 'edit'])->name('produk.edit');
        Route::post('produk/update/{id}', [ProdukController::class, 'update'])->name('produk.update');
        Route::delete('admin/produk/{id}', [ProdukController::class, 'destroy'])->name('produk.destroy');


        // Transaksi
        Route::get('transaksi', [TransaksiDashboardController::class, 'index'])->name('transaksi.index');
        Route::get('tansaksi/create', [TransaksiDashboardController::class, 'create'])->name('transaksi.create');
        Route::post('transaksi/store', [TransaksiDashboardController::class, 'store'])->name('transaksi.store');
        Route::get('transaksi/show/{transaksi}', [TransaksiDashboardController::class, 'show'])->name('transaksi.show');
        Route::post('transaksi/terima', [TransaksiDashboardController::class, 'terima'])->name('transaksi.terima');
        Route::post('transaksi/tolak', [TransaksiDashboardController::class, 'tolak'])->name('transaksi.tolak');
        Route::get('transaksi/selesaikan/{transaksi}', [TransaksiDashboardController::class, 'selesaikan'])->name('transaksi.selesaikan');
        Route::get('transaksi-produk/riwayat-transaksi', [TransaksiDashboardController::class, 'riwayatTransaksi'])->name('transaksi.riwayatTransaksi');
        Route::delete('/transaksi/{transaksi}', [TransaksiDashboardController::class, 'destroy'])->name('transaksi.destroy');

        Route::get('admin/transaksi/export-pdf', [TransaksiDashboardController::class, 'exportPdf'])->name('transaksi.exportPdf');
        Route::get('admin/transaksi/export-excel', [TransaksiDashboardController::class, 'exportExcel'])->name('transaksi.exportExcel');



        // Custom
        Route::get('transaksi-custom', [TransaksiCustomDashboardController::class, 'index'])->name('transaksiCustom.index');
        Route::get('transaksi-custom/create', [TransaksiCustomDashboardController::class, 'create'])->name('transaksiCustom.create');
        Route::post('transaksi-custom/store', [TransaksiCustomDashboardController::class, 'store'])->name('transaksiCustom.store');
        Route::get('transaksi-custom/show/{transaksi}', [TransaksiCustomDashboardController::class, 'show'])->name('transaksiCustom.show');
        Route::post('transaksi-custom/terima', [TransaksiCustomDashboardController::class, 'terima'])->name('transaksiCustom.terima');
        Route::post('transaksi-custom/tolak', [TransaksiCustomDashboardController::class, 'tolak'])->name('transaksiCustom.tolak');
        Route::get('transaksi-custom/selesaikan/{transaksi}', [TransaksiCustomDashboardController::class, 'selesaikan'])->name('transaksiCustom.selesaikan');
        Route::get('transaksi-custom-produk/riwayat-transaksi', [TransaksiCustomDashboardController::class, 'riwayatTransaksi'])->name('transaksiCustom.riwayatTransaksi');
        Route::get('admin/transaksi-custom/export-pdf', [TransaksiCustomDashboardController::class, 'exportPdf'])->name('transaksiCustum.exportPdf');
        Route::get('admin/transaksi-custom/export-excel', [TransaksiCustomDashboardController::class, 'exportExcel'])->name('transaksiCustom.exportExcel');


        // Kategori
        Route::prefix('progress-pembelian')->controller(ProgressPembelianController::class)->group(function () {
            Route::get('/', 'index')->name('progress-pembelian.index');
            Route::get('/create/{transaksi}', 'create')->name('progress-pembelian.create');
            Route::post('/store/{transaksi}', 'store')->name('progress-pembelian.store');
            Route::get('/show/{transaksi}/{progress}', 'show')->name('progress-pembelian.show');
            Route::get('/edit/{transaksi}/{progress}', 'edit')->name('progress-pembelian.edit');
            Route::post('/update/{transaksi}/{progress}', 'update')->name('progress-pembelian.update');
            Route::get('/destroy/{transaksi}/{progress}', 'destroy')->name('progress-pembelian.destroy');
        });


        Route::prefix('progress-custom')->controller(ProgressCustomController::class)->group(function () {
            Route::get('/', 'index')->name('progress-custom.index');
            Route::get('/create/{transaksi}', 'create')->name('progress-custom.create');
            Route::post('/store/{transaksi}', 'store')->name('progress-custom.store');
            Route::get('/show/{transaksi}/{progress}', 'show')->name('progress-custom.show');
            Route::get('/edit/{transaksi}/{progress}', 'edit')->name('progress-custom.edit');
            Route::post('/update/{transaksi}/{progress}', 'update')->name('progress-custom.update');
            Route::get('/destroy/{transaksi}/{progress}', 'destroy')->name('progress-custom.destroy');
        });

        Route::resource('users', UserController::class);


        Route::get('detail-produk/{id}', [ResponseController::class, 'detailTransaksi'])->name('response.detailTransaksi');
        Route::get('detail-custom/{id}', [ResponseController::class, 'detailCustom'])->name('response.detailCustom');

        //Notifikasi Transaksi
        Route::get('/notifications', [NotificationController::class, 'index']);
        Route::post('/notifications/read/{id}', [NotificationController::class, 'markAsRead']);
        Route::post('/notifications/read-all', [NotificationController::class, 'markAllAsRead']);


    });
});






require __DIR__ . '/auth.php';
