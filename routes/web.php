<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\EcolageController;
use App\Http\Controllers\EmployeController;
use App\Http\Controllers\EtudiantController;
use App\Http\Controllers\HomeAdminControllers;
use App\Http\Controllers\InformationController;
use App\Http\Controllers\JobController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PromotionController;
use App\Http\Controllers\SubjectController;
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
    Route::post('/Etudiant/nos-etudiant-cette-annee', [EtudiantController::class, 'now'])->name('etudiant.now');
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
    
    //employer
    Route::get('/Employer',[EmployeController::class, 'index'])->name('employee');
    Route::get('/Employer/ajouter-un-employer',[EmployeController::class, 'create'])->name('employee.create');
    Route::post('/Employer/ajouter-un-employer',[EmployeController::class, 'store'])->name('employee.store');
    Route::get('/Employer/{id}/edition', [EmployeController::class, 'edit'])->name('employee.edit');
    Route::put('/Employer/{id}/edition', [EmployeController::class, 'update'])->name('employee.update');
    Route::get('/Employer/{id}/voir', [EmployeController::class, 'see'])->name('employee.see');
    
    //Job 
    Route::get('/Travaille', [JobController::class, 'index'])->name('job');
    Route::get('/Travaille/creation', [JobController::class, 'create'])->name('job.create');
    Route::post('/Travaille/creation', [JobController::class, 'store'])->name('job.store');
    Route::get('/Travaille/{id}/edition', [JobController::class, 'edit'])->name('job.edit');
    Route::put('/Travaille/{id}/edition', [JobController::class, 'update'])->name('job.update');

        //Subject
    Route::get('/Matiere', [SubjectController::class, 'index'])->name('subject');
    Route::get('/Matiere/creation', [SubjectController::class, 'create'])->name('subject.create');
    Route::post('/Matiere/creation', [SubjectController::class, 'store'])->name('subject.store');
    Route::get('/Matiere/{id}/edition', [SubjectController::class, 'edit'])->name('subject.edit');
    Route::put('/Matiere/{id}/edition', [SubjectController::class, 'update'])->name('subject.update');

    //information
    Route::get('/Information', [InformationController::class, 'index'])->name('information');
    Route::get('/Information/creation-d-un-information', [InformationController::class, 'create'])->name('information.create');
    Route::post('/Information/creation-d-un-information', [InformationController::class, 'store'])->name('information.store');
    Route::get('/Information/{id}/edition', [InformationController::class, 'modify'])->name('information.modify');
    Route::put('/Information/{id}/edition', [InformationController::class, 'update'])->name('information.update');
    Route::delete('/Information/{id}/supression', [InformationController::class, 'delete'])->name('information.delete');
});