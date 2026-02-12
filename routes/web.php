<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\ArtworkController;
use App\Http\Controllers\Admin\CommissionPriceController;
use App\Http\Controllers\Admin\ProfileController;
use App\Http\Controllers\Public\ArtworkController as PublicArtworkController;

/*
|--------------------------------------------------------------------------
| PUBLIC WEBSITE 🌐 (PERSONAL BRANDING)
|--------------------------------------------------------------------------
*/

// Homepage
Route::get('/', function () {
    return view('public.home');
})->name('home');

// Public Artworks
Route::get('/artworks', [PublicArtworkController::class, 'index'])
    ->name('artworks.public');

Route::get('/artworks/{artwork}', [PublicArtworkController::class, 'show'])
    ->name('artworks.show');

Route::view('/about', 'public.about')->name('about');
Route::view('/service', 'public.service')->name('service');
Route::view('/portfolio', 'public.portfolio')->name('portfolio');
Route::view('/how-it-works', 'public.how')->name('how');


/*
|--------------------------------------------------------------------------
| REDIRECT DASHBOARD DEFAULT
|--------------------------------------------------------------------------
*/
Route::get('/dashboard', function () {
    return redirect('/admin');
});

/*
|--------------------------------------------------------------------------
| ADMIN PANEL 🔐
|--------------------------------------------------------------------------
*/
Route::middleware(['auth', 'admin'])
    ->prefix('admin')
    ->name('admin.')
    ->group(function () {

        // Dashboard
        Route::get('/', [DashboardController::class, 'index'])
            ->name('dashboard');

        // Commission Toggle
        Route::post('/commission-toggle', [DashboardController::class, 'toggleCommission'])
            ->name('commission.toggle');

        // Admin Profile
        Route::get('/profile', [ProfileController::class, 'edit'])
            ->name('profile.edit');

        Route::post('/profile', [ProfileController::class, 'update'])
            ->name('profile.update');

        // CRUD
        Route::resource('artworks', ArtworkController::class);
        Route::resource('prices', CommissionPriceController::class);
    });

/*
|--------------------------------------------------------------------------
| AUTH ROUTES
|--------------------------------------------------------------------------
*/
require __DIR__ . '/auth.php';
