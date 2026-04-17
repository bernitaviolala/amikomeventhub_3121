<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\CategoryController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/', function () {
    return view('home');
});

Route::get('/tentang', function () {
    return '<h1>Ini adalah Halaman Tentang Aplikasi Event Hub</h1>';
});

Route::get('/kontak', function () {
    return view('contact');
});

Route::get('/profil', function () {
    return view('profil');
});

Route::get('/katalog', function () {
    return view('katalog');
});

Route::get('/bantuan', function () {
    return view('bantuan');
});

Route::get('/dashboard', function () {
    return view('admin.dashboard');
})->name('admin.dashboard');

Route::get('/event', function () {
    return view('admin.event');
})->name('admin.event');

Route::get('/', [HomeController::class, 'index']);

Route::get('/', [HomeController::class, 'index'])->name('home');

Route::get('/event', [EventController::class, 'show'])
    ->name('events.show');

Route::get('/checkout', [EventController::class, 'checkout'])
    ->name('checkout');

Route::get('/my-ticket', [EventController::class, 'ticket'])
    ->name('ticket');

Route::group([
    'prefix' => 'admin',
    'as' => 'admin.'
], function () {


    Route::get('/', [DashboardController::class, 'index'])
        ->name('dashboard');

    Route::get('/events', [EventController::class, 'indexAdmin'])
        ->name('events.index');

});Route::get('/admin/categories', [CategoryController::class, 'index']);

Route::get('/admin/events', function () {
    return "Halaman Events";
})->name('admin.event');
