<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

Route::redirect('/', '/dashboard', 302);

Route::middleware(['auth'])->group(function () {
    // Rotes for Super Admin
    Route::middleware('role:Super Admin')
        ->prefix('app')
        ->name('app.')
        ->group(function () {
            Route::get('/dashboard', function () {
                return Inertia::render('Dashboard');
            })->name('dashboard');
        });
});

require_once __DIR__.'/auth.php';
require_once __DIR__.'/partials/profile.php';
