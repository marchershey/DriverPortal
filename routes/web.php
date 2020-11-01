<?php

use App\Http\Controllers\Dashboard\Dispatch\CreateDispatch;
use App\Http\Controllers\Dashboard\Dispatch\ViewDispatch;
use App\Http\Controllers\Dashboard\Pages\Index as DashboardIndex;
use App\Http\Controllers\Dispatch\PagesController as DispatchPagesController;
use App\Http\Controllers\Setup\ProfileSetup;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
 */

Route::get('/', function () {
    return view('frontend.landing');
});

Route::prefix('/setup')->middleware('auth')->name('setup.')->group(function () {
    Route::redirect('/', '/setup/profile')->name('index');
    Route::get('/profile', ProfileSetup::class)->name('profile');
});

// Middleware: Auth & Verified
Route::middleware(['auth', 'verified', 'setup'])->group(function () {
    // Dashboard
    Route::prefix('dashboard')->name('dashboard.')->group(function () {
        Route::get('/', DashboardIndex::class)->name('index');

        // Dispatch
        Route::prefix('dispatch')->name('dispatch.')->group(function () {
            Route::get('/create', CreateDispatch::class)->name('create');
            Route::get('/{id}', ViewDispatch::class)->name('view');

            Route::get('/{ref}/edit', [DispatchPagesController::class, 'edit']);
            Route::get('/{ref}/{stop}', [DispatchPagesController::class, 'viewStop']);
        });
    });
});

///////////////////////////////////////////////////////////////////////////////////////////////////////

Route::get('/logout', function () {
    Auth::logout();
    return redirect('/login');
});

Route::get('/reset', function () {
    Artisan::call('route:clear');
    Artisan::call('config:cache');
    Artisan::call('cache:clear');
    Artisan::call('view:clear');
    return redirect('/');
});
