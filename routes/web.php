<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\HomeController;
use App\Http\Controllers\WebController;
use Illuminate\Support\Facades\DB;
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

Route::get('/', function () {
    $images = DB::table('images')->get();
    return view('auth.login', ['images' => $images]);
});

Route::get('/lobener', function () {
    $images = DB::table('images')->get();
    $homes = DB::table('homes')->get();
    return view('tampilan.home', ['images' => $images, 'homes' => $homes]);
});

Route::get('/lobener/informasi', function () {
    $images = DB::table('images')->get();
    $informasis = DB::table('informasis')->get();
    $homes = DB::table('homes')->get();
    return view('tampilan.informasi', ['images' => $images, 'homes' => $homes, 'informasis' => $informasis]);
});

Route::get('/lobener/pengaduan', function () {
    $images = DB::table('images')->get();
    $homes = DB::table('homes')->get();

    return view('tampilan.pengaduan', ['images' => $images, 'homes' => $homes]);
});

Route::resource('/pengaduans', \App\Http\Controllers\PengaduanController::class);

// profile
Route::get('/profile', [App\Http\Controllers\ProfileController::class, 'index'])->name('profile.index');
Route::patch('/profile/{id}', [App\Http\Controllers\ProfileController::class, 'update'])->name('profile.update');

Auth::routes();

/*------------------------------------------
--------------------------------------------
All Normal Users Routes List
--------------------------------------------
--------------------------------------------*/
Route::middleware(['auth', 'user-access:user'])->group(function () {

    Route::get('/home', [HomeController::class, 'index'])->name('home');
});

/*------------------------------------------
--------------------------------------------
All Admin Routes List
--------------------------------------------
--------------------------------------------*/
Route::middleware(['auth', 'user-access:admin'])->group(function () {

    Route::get('/admin/home', [HomeController::class, 'adminHome'])->name('admin.home');
    Route::resource('/admin/foto/images', \App\Http\Controllers\KepdesController::class);
    Route::resource('/admin/homes', \App\Http\Controllers\TampilanhomeController::class);
    Route::resource('/admin/informasis', \App\Http\Controllers\InformasiController::class);

});

/*------------------------------------------
--------------------------------------------
All Admin Routes List
--------------------------------------------
--------------------------------------------*/
Route::middleware(['auth', 'user-access:super admin'])->group(function () {

    Route::get('/sadmin/home', [HomeController::class, 'managerHome'])->name('manager.home');
    Route::resource('/sadmin/users', \App\Http\Controllers\AdminController::class);
});