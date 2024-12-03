<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

################## ACCUEIL ##################

# Page d'accueil
Route::get('/', function () {
    return view('home');
});

################# EXPOSANTS #################

# Page listant les entreprises présentes
Route::get('/exposants', function () {
    return view('exhibitors');
});

# Page d'une entreprise
Route::get('/entreprise/{id}', function ($id) {
    return view('company', ['id' => $id]);
});

############### ÉDITIONS FORUM ###############

# Page d'une édition de forum
Route::get('/editionsprecedentes/{id}', function ($id) {
    return view('forum_edition', ['id' => $id]);
});

################### OFFRES ###################

# Page listant toutes les offres de stage
Route::get('/offres', function () {
    return view('offers');
});

##################### CV #####################

# Page listant toutes les CV des étudiants
Route::get('/cvs', function () {
    return view('cvs');
});

##################### FAQ #####################

# Page de foire aux questions
Route::get('/faq', function () {
    return view('faq');
});

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
Route::get('/devis', function () {
    return view('quote');
});

################### ADMIN ####################

# Page pour administrer le site
Route::get('/admin', function () {
    return view('admin');
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
