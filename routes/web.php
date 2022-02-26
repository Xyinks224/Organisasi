<?php

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

Route::get('/', function () {
    return view('home');
});

Auth::routes();

Route::get('/upload/avatar', [App\Http\Controllers\UserController::class, 'upload'])->name('upload/profile');
Route::post('/upload/avatar', [App\Http\Controllers\UserController::class, 'uploadprocess'])->name('upload/profile');

Route::get('/upload/angkatan', [App\Http\Controllers\AngkatanController::class, 'upload'])->name('upload/angkatan');
Route::post('/upload/angkatan/{id}', [App\Http\Controllers\AngkatanController::class, 'uploadprocess'])->name('upload/angkatan');

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/angkatan', [App\Http\Controllers\AngkatanController::class, 'index'])->name('angkatan');

//CRUD Anggota
Route::get('/anggota', [App\Http\Controllers\UserController::class, 'index'])->name('anggota');

Route::group(['middleware' => 'user'], function ()
{
    Route::get('/anggota/edit', [App\Http\Controllers\UserController::class, 'edit'])->name('anggota/edit');
    Route::post('/anggota/edit', [App\Http\Controllers\UserController::class, 'editprocess'])->name('anggota/edit');
});


Route::group(['middleware' => 'admin'], function ()
{

    //CRUD Angkatan
    Route::get('/angkatan/info/{id}', [App\Http\Controllers\AngkatanController::class, 'info'])->name('angkatan');

    Route::get('/angkatan/add', [App\Http\Controllers\AngkatanController::class, 'add'])->name('add');
    Route::post('/angkatan/add', [App\Http\Controllers\AngkatanController::class, 'addprocess'])->name('add');


    Route::get('/angkatan/edit/{id}', [App\Http\Controllers\AngkatanController::class, 'edit'])->name('angkatan/edit');
    Route::post('/angkatan/edit/{id}', [App\Http\Controllers\AngkatanController::class, 'editprocess'])->name('angkatan/edit');

    Route::delete('/angkatan/delete/{id}', [App\Http\Controllers\AngkatanController::class, 'destroy'])->name('angkatan/delete');

    //Delete Anggota
    Route::post('/anggota/remove/{id}', [App\Http\Controllers\UserController::class, 'remove'])->name('anggota/remove');
    Route::delete('/anggota/delete/{id}', [App\Http\Controllers\UserController::class, 'destroy'])->name('anggota/delete');

});
