<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\HomeController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\TicketController;

use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\EventController as EventAdminController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\PartnerController;

Route::get('/', [HomeController::class, 'index'])
    ->name('home');

Route::get('/event/1', [EventController::class, 'show'])
    ->name('events.show');

Route::get('/checkout', [EventController::class, 'checkout'])
    ->name('checkout');

Route::get('/my-ticket', [EventController::class, 'ticket'])
    ->name('ticket');

Route::get('/tentang', function () {
    return '<h1>Ini adalah Halaman Tentang Aplikasi Event Hub</h1>';
});


Route::prefix('admin')
    ->name('admin.')
    ->group(function () {

        Route::get('/', [DashboardController::class, 'index'])
            ->name('dashboard');

        Route::resource('events', EventAdminController::class);

        Route::resource('categories', CategoryController::class);



        Route::get('/transaksi', [EventAdminController::class, 'transactions'])
            ->name('transactions.index');


        Route::resource('partners', PartnerController::class);
    });
