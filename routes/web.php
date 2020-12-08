<?php

use App\Http\Controllers\Dashboard\Dispatch\Create as DashboardDispatchCreate;
use App\Http\Controllers\Dashboard\Dispatch\View as DashboardDispatchView;
use App\Http\Controllers\Dashboard\Index as DashboardIndex;
use App\Http\Controllers\User\Account as UserAccount;
use App\Http\Controllers\User\Notifications as UserNotifications;
use App\Http\Controllers\User\Password as UserPassword;
use Illuminate\Support\Facades\Artisan;
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

// Index
Route::get('/', function () {
    return view('web.index.frontpage');
});

Route::get('/test', function () {
    return view('test');
});

Route::middleware(['auth'])->group(function () {
    // Dashboard
    Route::prefix('dashboard')->name('dashboard.')->group(function () {
        Route::get('/', DashboardIndex::class)->name('index');

        // Dispatch
        Route::prefix('dispatch')->name('dispatch.')->group(function () {
            Route::get('/', DashboardDispatchCreate::class)->name('create');
            Route::get('/{id}', DashboardDispatchView::class)->name('view');
            // Route::get('/{id}', ViewDispatch::class)->name('view');

            // Route::get('/{ref}/edit', [DispatchPagesController::class, 'edit']);
            // Route::get('/{ref}/{stop}', [DispatchPagesController::class, 'viewStop']);
        });
    });

    // User Account
    Route::prefix('/user')->name('user.')->group(function () {
        Route::get('/account', UserAccount::class)->name('account');
        Route::get('/password', UserPassword::class)->name('password');
        Route::get('/notifications', UserNotifications::class)->name('notifications');
    });

    Route::middleware('admin')->name('admin.')->group(function () {
        Route::get('/admin', function () {
            return 'success';
        });
    });

});

///////////////////////////////////////////////////////////////////////////////////////////////////////

// Route::get('/logout', function () {
//     Auth::logout();
//     return redirect('/login');
// });

Route::get('/reset', function () {
    Artisan::call('route:clear');
    Artisan::call('config:cache');
    Artisan::call('cache:clear');
    Artisan::call('view:clear');
    Artisan::call('optimize:clear');
    return redirect('/dashboard');
});
