<?php

use App\Http\Controllers\BlogController;
use App\Http\Controllers\FacebookLoginController;
use App\Http\Controllers\GetController;
use App\Http\Controllers\GoogleLoginController;
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



Route::redirect('/', '/accueil');
Route::get('accueil', [GetController::class, 'index'])->name('index');
Route::resource('blog', BlogController::class);
Route::get('/chatbot', [GetController::class, 'chatbot'])->name('chatbot');
// Route::get('profil/{id}', [GetController::class, 'profil'])->name('profils');

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', [GetController::class, 'dashboard'])->name('dashboard');
});
// Google
Route::get('/google/redirect', [GoogleLoginController::class, 'redirectToGoogle'])->name('google.redirect');
Route::get('/google/callback', [GoogleLoginController::class, 'handleGoogleCallback'])->name('google.callback');

// facebook
Route::get('/facebook/redirect', [FacebookLoginController::class, 'redirectFacebook'])->name('facebook.redirect');
Route::get('/facebook/callback', [FacebookLoginController::class, 'facebookCallback'])->name('facebook.callback');

// commentaire
Route::post('/commentaires/{post_id}', [BlogController::class, 'commentaire'])->name('commentaires.store');
Route::delete('/commentaires_distroyed/{commentaire}', [BlogController::class, 'comdistoyed'])->name('commentaire.distroy');

// footer
Route::get('#contacte', [GetController::class])->name('contacte');