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
Route::get('/exhibitors', function () {
    return view('exhibitors');
});

# Page d'une entreprise
Route::get('/company/{id}', function ($id) {
    return view('company', ['id' => $id]);
});

############### ÉDITIONS FORUM ###############

# Page d'une édition de forum
Route::get('/forum_edition/{id}', function ($id) {
    return view('forum_edition', ['id' => $id]);
});

################### OFFRES ###################

# Page listant toutes les offres de stage
Route::get('/offers', function () {
    return view('offers');
});

##################### CV #####################

# Page listant toutes les CV des étudiants
Route::get('/cvs', function () {
    return view('cvs');
});

##################### FAQ #####################

# Page de foire aux questions
Route::get('/faq}', function () {
    return view('faq');
});

################## CONNEXION ##################

# Page de profil
Route::get('/profile/{id}', function ($id) {
    return view('profile', ['id' => $id]);
});

# Page de connexion
Route::get('/login', function () {
    return view('login');
});

# Page d'inscription pour les étudiants
Route::get('/signin', function () {
    return view('signin');
});

# Page de demande de devis
Route::get('/quote', function () {
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
