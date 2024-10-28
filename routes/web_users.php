<?php
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::middleware('auth')->group(function () {
    Route::resource('users',UserController::class);

    Route::post('/users/update-role', [UserController::class, 'updateRole'])->name('users.updateRole');
});
