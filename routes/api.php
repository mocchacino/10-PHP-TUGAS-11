<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Karyawan;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/getData',[Karyawan::class, 'getData']);
Route::get('/getDetail/{id}',[Karyawan::class, 'getDetail']);
Route::post('/pushData',[Karyawan::class,'store']);
Route::post('/setData/{id}',[Karyawan::class,'update']);
Route::get('/delete/{id}',[Karyawan::class,'hapus']);