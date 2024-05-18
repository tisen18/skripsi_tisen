<?php

use App\Http\Controllers\BencanaController;
use App\Http\Controllers\KategoriController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\KecamatanController;
use App\Http\Controllers\KelurahanController;
use App\Http\Controllers\ParameterController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\DataClusterController;
use App\Http\Controllers\AuthController;


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

// Route::middleware(['auth'])->group(function () {



// Route::get('/', function () {
//     return view('dashboard');
// });
Route::get('/', [DashboardController::class, 'index']);


Route::get('/peta', function () {
    return view('peta');
});

//Bencana 
Route::get('/bencana', [BencanaController::class, 'index']);
Route::get('/input-bencana', [BencanaController::class, 'create']);
Route::post('/home/bencana/simpan', [BencanaController::class, 'store'])->name('bencana-simpan');
Route::get('/home/bencana/edit/{id}', [BencanaController::class, 'edit']);
Route::put('/home/bencana/update/{id}', [BencanaController::class, 'update'])->name('bencana-update');
Route::get('/home/bencana/delete/{id}', [BencanaController::class, 'destroy'])->name('bencana-delete');


//Kelurahan

Route::get('/lurah', [KelurahanController::class, 'index']);
Route::get('/input-lurah', [KelurahanController::class, 'create']);
Route::post('/home/lurah/simpan', [KelurahanController::class, 'store'])->name('lurah-simpan');
Route::get('/home/lurah/edit/{id}', [KelurahanController::class, 'edit']);
Route::put('/home/lurah/update/{id}', [KelurahanController::class, 'update'])->name('lurah-update');
Route::get('/home/lurah/delete/{id}', [KelurahanController::class, 'destroy'])->name('lurah-delete');


//Kecamatan

Route::get('/camat', [KecamatanController::class, 'index']);
Route::get('/input-camat', [KecamatanController::class, 'create']);
Route::post('/home/camat/simpan', [KecamatanController::class, 'store'])->name('camat-simpan');
Route::get('/home/camat/edit/{id}', [KecamatanController::class, 'edit']);
Route::put('/home/camat/update/{id}', [KecamatanController::class, 'update'])->name('camat-update');
Route::get('/home/camat/delete/{id}', [KecamatanController::class, 'destroy'])->name('camat-delete');


//Kategori
Route::get('/kategori', [KategoriController::class, 'index']);
Route::get('/input-kategori', [KategoriController::class, 'create']);
Route::post('/home/kategori/simpan', [KategoriController::class, 'store'])->name('kategori-simpan');
Route::get('/home/kategori/edit/{id}', [KategoriController::class, 'edit']);
Route::put('/home/kategori/update/{id}', [KategoriController::class, 'update'])->name('kategori-update');
Route::get('/home/kategori/delete/{id}', [KategoriController::class, 'destroy'])->name('kategori-delete');


//Parameter
Route::get('/parameter', [ParameterController::class, 'index']);
Route::get('/input-parameter', [ParameterController::class, 'create']);
Route::post('/home/parameter/simpan', [ParameterController::class, 'store'])->name('parameter-simpan');
Route::get('/home/parameter/edit/{id}', [ParameterController::class, 'edit']);
Route::put('/home/parameter/update/{id}', [ParameterController::class, 'update'])->name('parameter-update');
Route::get('/home/parameter/delete/{id}', [ParameterController::class, 'destroy'])->name('parameter-delete');

// User
Route::get('/user', [UserController::class, 'index']);
Route::get('/input-user', [UserController::class, 'create']);
Route::post('home/user/simpan', [UserController::class, 'store'])->name('user-simpan');
Route::get('home/user/edit/{id}', [UserController::class, 'edit']);
Route::put('home/user/update/{id}', [UserController::class, 'update'])->name('user-update');
Route::get('home/user/delete/{id}', [UserController::class, 'destroy'])->name('user-delete');

//Cluster
Route::get('/datacluster', [DataClusterController::class, 'DataClusterPage']);
Route::get('/datacluster/perhitungan', [DataClusterController::class, 'DataClusterHitung']);
Route::post('/datacluster', [DataClusterController::class, 'DataClusterCentroid']);
Route::get('/mapcluster', [DataClusterController::class, 'mapcluster']);

Route::get('/login', function () {
    return view('login');
});


// Route::middleware(['guest'])->group(function () {
//     Route::get('/register', [AuthController::class, 'registerPage']);
//     Route::post('/validate-register', [AuthController::class, 'register']);
//     Route::get('/login', [AuthController::class, 'loginPage'])->name('login');
//     Route::post('/validate-login', [AuthController::class, 'login']);
// });