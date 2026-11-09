<?php

use App\Http\Controllers\PageController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/', [PageController::class, 'main']);
Route::get('/feature', [PageController::class, 'feature'])->name('feature');
Route::get('/about', [PageController::class, 'about'])->name('about');
Route::get('/menu', [PageController::class, 'menu'])->name('menu');
Route::get('/team', [PageController::class, 'team'])->name('team');
Route::get('/gallery', [PageController::class, 'gallery'])->name('gallery');
Route::get('/contact', [PageController::class, 'contact'])->name('contact');

Route::get('/lang/{locale}', function (string $locale) {
    if (in_array($locale, ['uz', 'en'])) {
        session(['locale' => $locale]);
    }
    return redirect()->back();
})->name('lang.switch');
