<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| MODELS
|--------------------------------------------------------------------------
*/

use App\Models\ImagePlacement;

/*
|--------------------------------------------------------------------------
| PUBLIC CONTROLLERS
|--------------------------------------------------------------------------
*/

use App\Http\Controllers\Public\ArtworkController as PublicArtworkController;
use App\Http\Controllers\Public\PageController;

/*
|--------------------------------------------------------------------------
| ADMIN CONTROLLERS
|--------------------------------------------------------------------------
*/

use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\ArtworkController;
use App\Http\Controllers\Admin\CommissionPriceController;
use App\Http\Controllers\Admin\ProfileController;
use App\Http\Controllers\Admin\ImagePlacementController;
use App\Http\Controllers\ChatbotController;


/*
|--------------------------------------------------------------------------
| PUBLIC WEBSITE 🌐
|--------------------------------------------------------------------------
*/

// Homepage
Route::get('/', [PageController::class, 'home'])->name('home');

// Static Pages (NOW DYNAMIC WITH CMS)
Route::get('/about', [PageController::class, 'about'])->name('about');
Route::get('/service', [PageController::class, 'service'])->name('service');
Route::get('/portfolio', [PageController::class, 'portfolio'])->name('portfolio');
Route::get('/how-it-works', [PageController::class, 'how'])->name('how');

// Public Artworks
Route::get('/artworks', [PublicArtworkController::class, 'index'])
    ->name('artworks.public');

Route::get('/artworks/{artwork}', [PublicArtworkController::class, 'show'])
    ->name('artworks.show');

Route::post('/chat', [ChatbotController::class, 'handle']);
Route::get('/test-chat', function () {
    return app(ChatbotController::class)->handle(
        request()->merge([
            'message' => 'cara order'
        ])
    );
});
/*
|--------------------------------------------------------------------------
| REDIRECT DASHBOARD
|--------------------------------------------------------------------------
*/

Route::get('/dashboard', function () {
    return redirect()->route('admin.dashboard');
})->name('dashboard');


/*
|--------------------------------------------------------------------------
| ADMIN PANEL 🔐
|--------------------------------------------------------------------------
*/

Route::middleware(['auth','admin'])
    ->prefix('admin')
    ->name('admin.')
    ->group(function () {

        // Dashboard
        Route::get('/', [DashboardController::class,'index'])
            ->name('dashboard');

        /*
        |--------------------------------------------------------------------------
        | IMAGE PLACEMENT CMS ⭐
        |--------------------------------------------------------------------------
        */

        Route::get('/settings', [ImagePlacementController::class, 'index'])
            ->name('settings.index');

        Route::post('/settings/update-all', [ImagePlacementController::class, 'updateAll'])
            ->name('settings.updateAll');

        Route::get('/settings/create', [ImagePlacementController::class, 'create'])
            ->name('settings.create');

        Route::post('/settings/store', [ImagePlacementController::class, 'store'])
            ->name('settings.store');

        /*
        |--------------------------------------------------------------------------
        | OTHER ADMIN FEATURES
        |--------------------------------------------------------------------------
        */

        Route::post('/commission-toggle',[DashboardController::class,'toggleCommission'])
            ->name('commission.toggle');

        Route::get('/profile',[ProfileController::class,'edit'])
            ->name('profile.edit');

        Route::post('/profile',[ProfileController::class,'update'])
            ->name('profile.update');

        Route::resource('artworks', ArtworkController::class);
        Route::resource('prices', CommissionPriceController::class);
    });


/*
|--------------------------------------------------------------------------
| AUTH ROUTES
|--------------------------------------------------------------------------
*/

require __DIR__.'/auth.php';