<?php

use App\Http\Controllers\ProfileController;
use App\Models\User;
use Illuminate\Support\Facades\Route;

$roleItems = [
    [
        'role' => User::ROLE_SUPER_ADMIN,
        'prefix' => 'app'
    ],
    [
        'role' => User::ROLE_ADMIN,
        'prefix' => 'admin'
    ],
    [
        'role' => User::ROLE_USER,
        'prefix' => 'user'
    ]
];
$profileRoute = '/profile';

foreach ($roleItems as $roleItem) {
    $role = 'role:' . data_get($roleItem, 'role');
    $prefix = data_get($roleItem, 'prefix');

    Route::middleware(['auth', $role])
        ->prefix($prefix)
        ->name($prefix . '.')
        ->group(function () use ($profileRoute) {
            Route::get($profileRoute, [ProfileController::class, 'edit'])
                ->name('profile.edit');
            Route::patch($profileRoute, [ProfileController::class, 'update'])
                ->name('profile.update');
            Route::delete($profileRoute, [ProfileController::class, 'destroy'])
                ->name('profile.destroy');
        });
}
