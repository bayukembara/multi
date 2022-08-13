<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\StaffController;
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
    return view('auth/login');
});

Auth::routes();
// ->middleware('is_admin');
Route::middleware('auth')->group(function () {
    Route::get('admin/home', [AdminController::class, 'index'])->name('admin.home');
    Route::get('admin/create', [StaffController::class, 'create'])->name('admin.create');
    Route::post('admin/home', [StaffController::class, 'store'])->name('admin.store');
    Route::get('admin/home/{file}', [StaffController::class, 'download'])->name('admin.download');
    Route::get('admin/edit/{staff}', [StaffController::class, 'edit'])->name('admin.edit');
    Route::put('admin/edit/{staff}', [StaffController::class, 'update'])->name('admin.update');
    Route::delete('admin/delete/{id}', [StaffController::class, 'destroy'])->name('admin.delete');

});

Route::get('/home', [HomeController::class, 'index'])->name('home');
Route::get('/home', [HomeCOntroller::class, 'index'])->name('home');