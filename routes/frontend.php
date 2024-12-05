<?php

use App\Http\Controllers\Frontend\FrontendController;
use Illuminate\Support\Facades\Route;

//HomePage
Route::get('/', [FrontendController::class, 'index'])->name('frontend.index');

//Team Section
Route::get('/team', [FrontendController::class, 'allTeam'])->name('all.team');
//Contact Section
Route::get('/contact', [FrontendController::class, 'contact'])->name('contact');
Route::post('/contact-store', [FrontendController::class, 'contactStore'])->name('contact.store');


