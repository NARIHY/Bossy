<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\EtudiantController;
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

    //gerer la liste des étudiants
    Route::get('/Etudiant', [EtudiantController::class, 'index'])->name('etudiant');
    Route::get('/Etudiant/Ajouter-un-etudiants', [EtudiantController::class, 'create'])->name('etudiant.create');
    Route::post('/Etudiant/Ajouter-un-etudiants', [EtudiantController::class, 'store'])->name('etudiant.store');
    Route::get('/Etudiant/{id}/voir-un-etudiant', [EtudiantController::class, 'show'])->name('etudiant.show');
    Route::get('/Etudiant/{id}/editer', [EtudiantController::class, 'edit'])->name('etudiant.edit');
    Route::put('/Etudiant/{id}/editer', [EtudiantController::class, 'update'])->name('etudiant.update');
    Route::delete('/Etudiant/{id}/suprimer', [EtudiantController::class, 'delete'])->name('etudiant.delete');


});