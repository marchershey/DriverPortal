<?php

use App\Http\Controllers\Dashboard\Dispatch\CreateDispatch;
use App\Http\Controllers\Dashboard\Pages\Index as DashboardIndex;
use App\Http\Controllers\Dispatch\PagesController as DispatchPagesController;
use App\Http\Controllers\Setup\PagesController as SetupPagesController;
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
    return view('welcome');
});

Route::prefix('/setup')->middleware('auth')->group(function () {
    Route::redirect('/', '/setup/profile');
    Route::get('/profile', [SetupPagesController::class, 'profile'])->name('setup');
});

// Middleware: Auth & Verified
Route::middleware(['auth', 'verified', 'setup'])->group(function () {
    // Dashboard
    Route::prefix('dashboard')->name('dashboard.')->group(function () {
        Route::get('/', DashboardIndex::class)->name('index');
    });

    // Dispatch
    Route::prefix('dispatch')->name('dispatch.')->group(function () {
        Route::get('/create', CreateDispatch::class)->name('create');

        Route::get('/{ref}', [DispatchPagesController::class, 'view']);
        Route::get('/{ref}/edit', [DispatchPagesController::class, 'edit']);
        Route::get('/{ref}/{stop}', [DispatchPagesController::class, 'viewStop']);
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
