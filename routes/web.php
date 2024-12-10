<?php

use App\Http\Controllers\ProfileController; # truc de laravel

use App\Http\Controllers\CompanyController;
use App\Http\Controllers\CvController;
use App\Http\Controllers\ExhibitorController;
use App\Http\Controllers\FaqController;
use App\Http\Controllers\ForumEditionController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\OfferController;
use App\Http\Controllers\QuoteController;
use App\Http\Controllers\AdminController;

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

# Page d'inscription pour les étudiants
Route::get('/inscription', function () {
    return view('signin');
});

# Page de demande de devis
Route::get('/devis', [QuoteController::class, 'goToQuote']);

# Récupérer la demande de devis dans un Excel
Route::get('/quote-validation', [QuoteController::class, 'goToQuoteValidation']);

################### ADMIN ####################

# Page pour administrer le site
Route::get('/admin', function () {
    return view('admin');
});

# Récupérer les entreprises dans un Excel
Route::get('/get-all-companies', [AdminController::class, 'getAllCompanies']);

# Récupérer les étudiants dans un Excel
Route::get('/get-all-students', [AdminController::class, 'getAllStudents']);


// Groupe avec toutes les routes student
Route::middleware(['auth'])->group(function () {
    Route::get('/student', [StudentHomeController::class, 'index'])->name('student.home');
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
