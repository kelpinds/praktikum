<?php

use App\Http\Controllers\Siswacontroller;
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
    return view('welcome');
});

Route::get('siswa',[Siswacontroller::class,'utama']);

Route::get('siswa/tambah',[Siswacontroller::class,'tambah']);

Route::post('siswa/tambah',[Siswacontroller::class,'simpan']);

Route::get('siswa/edit/{nisn}',[Siswacontroller::class,'edit']);

Route::post('siswa/edit/{nisn}',[Siswacontroller::class,'update']);

Route::get('siswa/hapus/{nisn}',[Siswacontroller::class,'hapus']);
