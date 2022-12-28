<?php

use App\Http\Controllers\AkunController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\KategoriArtikelController;
use App\Http\Controllers\KontakController;
use App\Http\Controllers\LayananController;
use App\Http\Controllers\PartnerController;
use App\Http\Controllers\PortofolioController;
use App\Http\Controllers\TeknologiController;
use App\Http\Controllers\TentangController;
use App\Models\Tentang;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// login
// Auth::routes();
Auth::routes(['verify' => true]);

Route::get('/login', function () {
    $_portal_data = Tentang::all()->first();
    return view('auth/login', compact('_portal_data'));
})->name('login');

Route::get('/', function () {
    return view('welcome');
});


// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

/*------------------------------------------
--------------------------------------------
All Normal Users Routes List
--------------------------------------------
--------------------------------------------*/
// Route::middleware(['auth', 'user-access:operator'])->group(function () {

//     Route::get('/home', [HomeController::class, 'index'])->name('home');
// });

/*------------------------------------------
--------------------------------------------
All Admin Routes List
--------------------------------------------
--------------------------------------------*/
Route::middleware(['auth', 'user-access:admin'])->group(function () {
    Route::get('/admin/home', [HomeController::class, 'adminHome'])->name('admin.home');

    // Akun
    Route::get('/master/akun', [AkunController::class, 'index'])->name('master.akun');
    Route::get('/master/akun/add', [AkunController::class, 'add'])->name('master.akun.add');
    Route::post('/master/akun/add', [AkunController::class, 'store'])->name('master.akun.add');
    Route::get('/master/akun/edit/{id}', [AkunController::class, 'edit'])->name('master.akun.edit');
    Route::post('/master/akun/update', [AkunController::class, 'update'])->name('master.akun.update');
    Route::get('/master/akun/delete/{id}', [AkunController::class, 'delete'])->name('master.akun.delete');

    // teknologi
    Route::get('/master/teknologi', [TeknologiController::class, 'index'])->name('master.teknologi');
    Route::get('/master/teknologi/add', [TeknologiController::class, 'add'])->name('master.teknologi.add');
    Route::post('/master/teknologi/add', [TeknologiController::class, 'store'])->name('master.teknologi.add');
    Route::get('/master/teknologi/delete/{id}', [TeknologiController::class, 'delete'])->name('master.teknologi.delete');

    // Tentang
    Route::get('/admin/tentang', [TentangController::class, 'index'])->name('admin.tentang');
    Route::post('/admin/tentang/store', [TentangController::class, 'store'])->name('admin.tentang.store');

    // layanan
    Route::get('/master/layanan', [LayananController::class, 'index'])->name('master.layanan');
    Route::get('/master/layanan/add', [LayananController::class, 'add'])->name('master.layanan.add');
    Route::post('/master/layanan/add', [LayananController::class, 'store'])->name('master.layanan.add');
    Route::get('/master/layanan/delete/{id}', [LayananController::class, 'delete'])->name('master.layanan.delete');

    // partner
    Route::get('/master/partner', [PartnerController::class, 'index'])->name('master.partner');
    Route::get('/master/partner/add', [PartnerController::class, 'add'])->name('master.partner.add');
    Route::post('/master/partner/add', [PartnerController::class, 'store'])->name('master.partner.add');
    Route::get('/master/partner/delete/{id}', [PartnerController::class, 'delete'])->name('master.partner.delete');

    // kategori artikel
    Route::get('/master/kategori-artikel', [KategoriArtikelController::class, 'index'])->name('master.kategori-artikel');
    Route::get('/master/kategori-artikel/add', [KategoriArtikelController::class, 'add'])->name('master.kategori-artikel.add');
    Route::post('/master/kategori-artikel/add', [KategoriArtikelController::class, 'store'])->name('master.kategori-artikel.add');
    Route::get('/master/kategori-artikel/delete/{id}', [KategoriArtikelController::class, 'delete'])->name('master.kategori-artikel.delete');

    // Portofolio
    Route::get('/master/portofolio', [PortofolioController::class, 'index'])->name('master.portofolio');
    Route::get('/master/portofolio/add', [PortofolioController::class, 'add'])->name('master.portofolio.add');
    Route::post('/master/portofolio/add', [PortofolioController::class, 'store'])->name('master.portofolio.add');
    Route::get('/master/portofolio/edit/{id}', [PortofolioController::class, 'edit'])->name('master.portofolio.edit');
    Route::post('/master/portofolio/update', [PortofolioController::class, 'update'])->name('master.portofolio.update');
    Route::get('/master/portofolio/delete/{id}', [PortofolioController::class, 'delete'])->name('master.portofolio.delete');


    // Kontak
    Route::get('/admin/kontak', [KontakController::class, 'index'])->name('admin.kontak');
    Route::post('/admin/kontak/store', [KontakController::class, 'store'])->name('admin.kontak.store');
});

/*------------------------------------------
--------------------------------------------
All Admin Routes List
--------------------------------------------
--------------------------------------------*/
Route::middleware(['auth', 'user-access:operator'])->group(function () {

    Route::get('/operator/home', [HomeController::class, 'operatorHome'])->name('operator.home');
});
