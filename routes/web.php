<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\HomeAdminControllers;
use App\Http\Controllers\ProfileController;
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

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

Route::prefix('/administration')->name('Admin.')->group( function () {
    //Route de l'accceuil de l'admin
    Route::get('/',[AdminController::class, 'index'])->name('index');
    //Route Home ici
    Route::get('/Home-bossy', [HomeAdminControllers::class, 'index'])->name('home.bossy');
    Route::get('/Home-bossy/creation', [HomeAdminControllers::class, 'create'])->name('home.create');
    Route::post('/Home-bossy/creation', [HomeAdminControllers::class, 'store'])->name('home.store');
    Route::delete('/Home-bossy/{id}/Supression', [HomeAdminControllers::class, 'delete'])->name('home.delete');
    Route::get('/Home-bossy/{id}/edition', [HomeAdminControllers::class, 'edit'])->name('home.edit');
    Route::put('/Home-bossy/{id}/edition', [HomeAdminControllers::class, 'update'])->name('home.update');

    
});