<?php

use App\Models\Pegawai;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PegawaiController;

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
    $pegawais = Pegawai::where("isActive",1)->get();
    return view('landing', compact('pegawais'));
});


Auth::routes();
Route::middleware(['auth'])->group(function(){
    Route::resource('/pegawai',PegawaiController::class)->names('pegawai');
    Route::get('/get-data',[HomeController::class,'getData'])->name('getData');
    Route::get('/home', [HomeController::class, 'index'])->name('home');
    Route::get('/isActive/{pegawai}', [PegawaiController::class,"isActive"])->name("isActive");
});
