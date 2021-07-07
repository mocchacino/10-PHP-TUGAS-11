<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Karyawan;

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
    return view('welcome');
});

// // Route::get('/getData','Karyawan@getData');
// Route::get('/getData',[Karyawan::class, 'getData']);
// Route::get('/detDetail/{id}',[Karyawan::class, 'detDetail']);
// // Route::post('/pushData',[Karyawan::class, 'store']);
// Route::post('/pushData',[Karyawan::class,'store']);
// Route::post('/setData',[Karyawan::class,'update']);
// Route::get('/delete/{id}',[Karyawan::class,'hapus']);