<?php

use App\Http\Controllers\ProfileController; # truc de laravel

use App\Http\Controllers\CompanyController;
use App\Http\Controllers\ExhibitorController;
use App\Http\Controllers\FaqController;
use App\Http\Controllers\ForumEditionController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\OfferController;
use App\Http\Controllers\QuoteController;
use App\Http\Controllers\TotoController;
use App\Http\Controllers\CvController;
use App\Http\Controllers\Admin\AdminHomeController;
use App\Http\Controllers\Student\StudentHomeController;
use App\Http\Controllers\Company\CompanyHomeController;
use App\Http\Controllers\Student\StudentProfileController;
use Illuminate\Support\Facades\Route;

################## ACCUEIL ##################

# Page d'accueil
Route::get('/', [HomeController::class, 'getHomeInformations']);

################# EXPOSANTS #################

# Page listant les entreprises présentes
Route::get('/exposants', [ExhibitorController::class, 'getAllCompanies']);

# Page d'une entreprise
Route::get('/exposants/{id}', [CompanyController::class, 'getCompanyById']);

############### ÉDITIONS FORUM ###############

# Page d'une édition de forum
Route::get('/editions-precedentes/{annee}', [ForumEditionController::class, 'getForumEditionByYear']);

################### OFFRES ###################

# Page listant toutes les offres de stage
Route::get('/offres', [OfferController::class, 'getAllInternshipOffers']);

##################### CV #####################

# Page listant toutes les CV des étudiants
Route::get('/cvs', [CvController::class, 'getAllCvs']);

# Télécharger tous les CVs étudiants
Route::post('/download-all-cvs', [CvController::class, 'downloadAllCvs'])->name('download-all-cvs');

##################### FAQ #####################

# Page de foire aux questions
Route::get('/faq', [FaqController::class, 'getAllFaqs']);

################## CONNEXION ##################

# Page de profil
Route::get('/profil', function () {
    return view('profile');
});

# Page de connexion
Route::get('/connexion', function () {
    return view('login');
});

# Page de demande de devis
Route::get('/devis', [QuoteController::class, 'goToQuote']);

# Récupérer la demande de devis dans un Excel
Route::get('/quote-validation', [QuoteController::class, 'goToQuoteValidation']);

################### ADMIN ####################

# Page pour administrer le site
Route::get('/toto', function () {
    return view('toto');
});

# Récupérer les entreprises dans un Excel
Route::get('/get-all-companies', [TotoController::class, 'getAllCompanies']);

# Récupérer les étudiants dans un Excel
Route::get('/get-all-students', [TotoController::class, 'getAllStudents']);

# Enregistre un logo pour une entreprise
Route::post('/upload-logo', [TotoController::class, 'uploadLogo']);

# Enregistre un CV pour un étudiant
Route::post('/upload-cv', [TotoController::class, 'uploadCv']);


// Groupe avec toutes les routes student
Route::middleware(['auth'])->group(function () {
    Route::get('/student', [StudentHomeController::class, 'index'])->name('student.home');
    Route::get('/student/profile', [StudentProfileController::class, 'show'])->name('student.profile');
    Route::put('/student/profile', [StudentProfileController::class, 'update'])->name('student.profile.update');
});


// Groupe avec toutes les routes admin.
Route::middleware(['auth'])->group(function () {
    Route::get('/admin', [AdminHomeController::class, 'index'])->name('admin.home');
});

// Groupe avec toutes les routes admin.
Route::middleware(['auth'])->group(function () {
    Route::get('/company', [CompanyHomeController::class, 'index'])->name('company.home');
});



############## TRUCS DE LARAVEL ##############

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

##############################################
