<?php

use App\Http\Controllers\Frontend\FrontendController;
use Illuminate\Support\Facades\Route;

//HomePage
Route::get('/', [FrontendController::class, 'index'])->name('frontend.index');

//Team Section
Route::get('/team', [FrontendController::class, 'allTeam'])->name('all.team');
//Project Show
Route::get('/projects/{slug}', [FrontendController::class, 'projectShow'])->name('project.show');
//Contact Section
Route::get('/contact', [FrontendController::class, 'contact'])->name('contact');
Route::post('/contact-store', [FrontendController::class, 'contactStore'])->name('contact.store');
