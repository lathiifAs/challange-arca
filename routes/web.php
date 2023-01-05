<?php

use App\Http\Controllers\AkunController;
use App\Http\Controllers\ArtikelController;
use App\Http\Controllers\BuruhController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\KategoriArtikelController;
use App\Http\Controllers\KontakController;
use App\Http\Controllers\LandingPageController;
use App\Http\Controllers\LayananController;
use App\Http\Controllers\PartnerController;
use App\Http\Controllers\PortofolioController;
use App\Http\Controllers\TeknologiController;
use App\Http\Controllers\TentangController;
use App\Http\Controllers\UserController;
use App\Models\Tentang;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
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

// Route::get('/login', function () {
//     return view('auth/login', compact('_portal_data'));
// })->name('login');

// Route::get(
//     '/',
//     [LandingPageController::class, 'Home']
// )->name('/');

Route::get('/', function () {
    return Redirect::to('login');
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
    Route::get('/admin/home/add', [HomeController::class, 'add'])->name('admin.home.add');
    Route::get('/admin/home/detail/{id}', [HomeController::class, 'detail'])->name('admin.home.detail');
    Route::post('/admin/home/add', [HomeController::class, 'store'])->name('admin.home.add');
    Route::get('/admin/home/edit/{id}', [HomeController::class, 'edit'])->name('admin.home.edit');
    Route::post('/admin/home/update', [HomeController::class, 'update'])->name('admin.home.update');
    Route::get('/admin/home/delete/{id}', [HomeController::class, 'delete'])->name('admin.home.delete');

    // Akun
    Route::get('/master/akun', [AkunController::class, 'index'])->name('master.akun');
    Route::get('/master/akun/add', [AkunController::class, 'add'])->name('master.akun.add');
    Route::post('/master/akun/add', [AkunController::class, 'store'])->name('master.akun.add');
    Route::get('/master/akun/edit/{id}', [AkunController::class, 'edit'])->name('master.akun.edit');
    Route::post('/master/akun/update', [AkunController::class, 'update'])->name('master.akun.update');
    Route::get('/master/akun/delete/{id}', [AkunController::class, 'delete'])->name('master.akun.delete');

    // Regular User
    Route::get('/master/user', [UserController::class, 'index'])->name('master.user');
    Route::get('/master/user/add', [UserController::class, 'add'])->name('master.user.add');
    Route::post('/master/user/add', [UserController::class, 'store'])->name('master.user.add');
    Route::get('/master/user/edit/{id}', [UserController::class, 'edit'])->name('master.user.edit');
    Route::post('/master/user/update', [UserController::class, 'update'])->name('master.user.update');
    Route::get('/master/user/delete/{id}', [UserController::class, 'delete'])->name('master.user.delete');

    // Buruh
    Route::get('/master/buruh', [BuruhController::class, 'index'])->name('master.buruh');
    Route::get('/master/buruh/add', [BuruhController::class, 'add'])->name('master.buruh.add');
    Route::post('/master/buruh/add', [BuruhController::class, 'store'])->name('master.buruh.add');
    Route::get('/master/buruh/edit/{id}', [BuruhController::class, 'edit'])->name('master.buruh.edit');
    Route::post('/master/buruh/update', [BuruhController::class, 'update'])->name('master.buruh.update');
    Route::get('/master/buruh/delete/{id}', [BuruhController::class, 'delete'])->name('master.buruh.delete');
});

/*------------------------------------------
--------------------------------------------
All Admin Routes List
--------------------------------------------
--------------------------------------------*/
Route::middleware(['auth', 'user-access:operator'])->group(function () {

    // Buruh
    Route::get('/operator/home', [HomeController::class, 'adminHome'])->name('operator.home');
    // Route::get('/admin/home/add', [HomeController::class, 'add'])->name('admin.home.add');
    // Route::post('/admin/home/add', [HomeController::class, 'store'])->name('admin.home.add');
    // Route::get('/admin/home/detail/{id}', [HomeController::class, 'detail'])->name('admin.home.detail');
    // Route::get('/admin/home/edit/{id}', [HomeController::class, 'edit'])->name('admin.home.edit');
    // Route::post('/admin/home/update', [HomeController::class, 'update'])->name('admin.home.update');

    //  // Buruh
    //  Route::get('/master/buruh', [BuruhController::class, 'index'])->name('master.buruh');
    //  Route::get('/master/buruh/add', [BuruhController::class, 'add'])->name('master.buruh.add');
    //  Route::post('/master/buruh/add', [BuruhController::class, 'store'])->name('master.buruh.add');
    //  Route::get('/master/buruh/edit/{id}', [BuruhController::class, 'edit'])->name('master.buruh.edit');
    //  Route::post('/master/buruh/update', [BuruhController::class, 'update'])->name('master.buruh.update');
    //  Route::get('/master/buruh/delete/{id}', [BuruhController::class, 'delete'])->name('master.buruh.delete');
});
