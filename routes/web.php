<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Session;
use App\Http\Controllers\HomepageSelectionController;
use App\Http\Controllers\Home\HomeController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\Controller;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\ProjectTypeController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\TagController;

//Language Change
Route::get('/lang/{locale}', function ($locale) {
    if (!in_array($locale, ['en', 'de', 'es', 'fr', 'pt', 'cn', 'ae'])) {
        abort(400);
    }
    Session()->put('locale', $locale);
    Session::get('locale');
    return back();
    // return redirect()->route('home',Session::get('locale'));
})->name('lang');

// Route::get('/set_language/{lang}', [App\Http\Controllers\Controller::class, 'set_language'])->name('set_language');

Route::post('/session/store', [HomeController::class, 'setSession'])->name('setSession');
Route::get('/', [HomeController::class, 'index'])->name('index');
Route::get('/login', [HomeController::class, 'index'])->name('login');
// Route::get('/home', [HomeController::class, 'index'])->name('home');
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

    Route::get('/welcome', [App\Http\Controllers\HomeController::class, 'index'])->name('welcome');
    Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('/');
    Route::get('weeks/filter', [App\Http\Controllers\OrderController::class,'filtering'])->name('filter.orders.view');


Route::middleware('auth')->group(function () {

    

    Route::middleware('visit')->group(function () {
        Route::prefix('dashboard')->group(function () {
            Route::post('import/excel/suppliers', [App\Http\Controllers\OrderController::class,'importExcelSuppliers'])->name('importExcelSuppliers');
            Route::post('import/excel/orders', [App\Http\Controllers\OrderController::class,'importExcelOrders'])->name('importExcelOrders');
            Route::view('index', 'panel.dashboard.index')->name('index');
            Route::resource('/users', App\Http\Controllers\UserController::class);
            Route::resource('/orders', App\Http\Controllers\OrderController::class);
            Route::resource('/supplier', App\Http\Controllers\SupplierController::class);
            Route::post('/orders/exportOrders/{id?}', [App\Http\Controllers\OrderController::class, 'exportOrders'])->name('orders.exportOrders');

        });

        Route::prefix('users')->group(function () {
            Route::view('user-profile', 'panel.apps.user-profile')->name('user-profile');
            Route::view('edit-profile', 'panel.apps.edit-profile')->name('edit-profile');
            Route::view('user-cards', 'panel.apps.user-cards')->name('user-cards');
        });
    });
});






Route::get('layout-{light}', function ($light) {
    session()->put('layout', $light);
    session()->get('layout');
    if ($light == 'vertical-layout') {
        return redirect()->route('panel.pages-vertical-layout');
    }
    return redirect()->route('index');
    return 1;
});
Route::get('/clear-cache', function () {
    Artisan::call('config:cache');
    Artisan::call('cache:clear');
    Artisan::call('config:clear');
    Artisan::call('view:clear');
    Artisan::call('route:clear');
    return "Cache is cleared";
})->name('clear.cache');

Auth::routes();

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
