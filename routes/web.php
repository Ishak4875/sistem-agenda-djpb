<?php

use App\Http\Controllers\AgendaController;
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

Route::get('/',[AgendaController::class,'getAllData']);
Route::get('/jadwal',[AgendaController::class,'getAllDataJadwal'])->name('jadwal');
Route::get('/jadwal/detail/{id_agenda}',[AgendaController::class,'getDetailAgenda']);
Route::get('/jadwal/edit/{id_agenda}',[AgendaController::class,'editDetailAgenda']);
Route::post('/jadwal/update/{id_agenda}',[AgendaController::class,'updateAgenda']);
Route::get('/jadwal/add',[AgendaController::class,'addAgenda']);
Route::post('/jadwal/insert',[AgendaController::class,'insertAgenda']);
Route::get('/jadwal/delete/{id_agenda}',[AgendaController::class,'deleteAgenda']);