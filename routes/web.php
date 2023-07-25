<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\EcolageController;
use App\Http\Controllers\EtudiantController;
use App\Http\Controllers\HomeAdminControllers;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PromotionController;
use App\Http\Controllers\TotaleEcolageController;
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
    Route::get('/Home-St joseph', [HomeAdminControllers::class, 'index'])->name('home.St joseph');
    Route::get('/Home-St joseph/creation', [HomeAdminControllers::class, 'create'])->name('home.create');
    Route::post('/Home-St joseph/creation', [HomeAdminControllers::class, 'store'])->name('home.store');
    Route::delete('/Home-St joseph/{id}/Supression', [HomeAdminControllers::class, 'delete'])->name('home.delete');
    Route::get('/Home-St joseph/{id}/edition', [HomeAdminControllers::class, 'edit'])->name('home.edit');
    Route::put('/Home-St joseph/{id}/edition', [HomeAdminControllers::class, 'update'])->name('home.update');

    //gerer la liste des étudiants
    Route::get('/Etudiant', [EtudiantController::class, 'index'])->name('etudiant');
    Route::get('/Etudiant/nos-etudiant-cette-annee', [EtudiantController::class, 'cette'])->name('etudiant.cette');
    Route::get('/Etudiant/Ajouter-un-etudiants', [EtudiantController::class, 'create'])->name('etudiant.create');
    Route::post('/Etudiant/Ajouter-un-etudiants', [EtudiantController::class, 'store'])->name('etudiant.store');
    Route::get('/Etudiant/{id}/voir-un-etudiant', [EtudiantController::class, 'show'])->name('etudiant.show');
    Route::get('/Etudiant/{id}/editer', [EtudiantController::class, 'edit'])->name('etudiant.edit');
    Route::put('/Etudiant/{id}/editer', [EtudiantController::class, 'update'])->name('etudiant.update');
    Route::delete('/Etudiant/{id}/suprimer', [EtudiantController::class, 'delete'])->name('etudiant.delete');

    //promotion
    Route::get('/Etudiant/Promotion', [PromotionController::class, 'index'])->name('etudiant.promotion');
    Route::get('/Etudiant/Promotion/ajouter-une-promotion', [PromotionController::class, 'create'])->name('etudiant.promotion.create');
    Route::post('/Etudiant/Promotion/ajouter-une-promotion', [PromotionController::class, 'store'])->name('etudiant.promotion.store');
    Route::get('/Etudiant/Promotion/{id}/editer-une-promotion', [PromotionController::class, 'edit'])->name('etudiant.promotion.edit');
    Route::put('/Etudiant/Promotion/{id}/editer-une-promotion', [PromotionController::class, 'update'])->name('etudiant.promotion.update');

    //totale ecolage par année d'étude
    Route::get('/Scolarite/totale-ecolage-cette-anne', [TotaleEcolageController::class, 'index'])->name('ecolage.totale');
    Route::get('/Scolarite/totale-ecolage-cette-anne/ajouter', [TotaleEcolageController::class, 'ajouter'])->name('ecolage.totale.ajouter');
    Route::post('/Scolarite/totale-ecolage-cette-anne/ajouter', [TotaleEcolageController::class, 'store'])->name('ecolage.totale.store');
    Route::delete('/Scolarite/totale-ecolage-cette-anne/{id}/suprimer', [TotaleEcolageController::class, 'delete'])->name('ecolage.totale.delete');

    //ecolage par moi
    Route::get('/Scolarite/totale-ecolage-cette-anne/{id}/mois', [TotaleEcolageController::class, 'month'])->name('ecolage.totale.mois');

    //payer un ecolage
    Route::get('/Scolarite/paye-ecolage', [EcolageController::class, 'index'])->name('ecolage.paye');
    Route::post('/Scolarite/paye-ecolage', [EcolageController::class, 'store'])->name('ecolage.paye.store');

    //ecolage impayer
    Route::get('/Scolarite/ecolage-impayer', [EcolageController::class, 'recupere'])->name('ecolage.impaye');
    Route::post('/Scolarite/ecolage-impayer', [EcolageController::class, 'search'])->name('ecolage.impaye.liste');
    


});