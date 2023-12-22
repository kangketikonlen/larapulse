<?php

use App\Http\Controllers\Administration\MaintenanceController;
use App\Http\Controllers\Report\ActivityLogController;
use App\Http\Controllers\Report\CrashLogController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PortalController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\Master\UserController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Setting\InstitutionController;
use App\Http\Controllers\Setting\ModuleController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

Route::namespace('Portal')->middleware('guest')->group(function () {
    Route::get('/', [PortalController::class, 'index'])->name('portal');
    Route::post('/auth', [PortalController::class, 'auth']);
});

Route::namespace('Profile')->prefix('profile')->middleware('auth:web')->group(function () {
    Route::get('/', [ProfileController::class, 'index']);
    Route::put('/update', [ProfileController::class, 'update']);
    Route::get('/reset', [ProfileController::class, 'reset']);
});

Route::namespace('Dashboard')->prefix('dashboard')->middleware('auth:web')->group(function () {
    Route::get('/', [DashboardController::class, 'index']);
    Route::get('/administrator', [DashboardController::class, 'administrator']);
    Route::get('/general', [DashboardController::class, 'general']);
    // ========================== //
    Route::get('/{module}/switch', [DashboardController::class, 'switch']);
    Route::get('/reset-role', [DashboardController::class, 'reset_role']);
    Route::get('/logout', [PortalController::class, 'logout']);
});

Route::namespace('Master')->prefix('master')->middleware('auth:web')->group(function () {
    Route::prefix('user')->middleware('auth:web')->group(function () {
        Route::get('/', [UserController::class, 'index']);
        Route::get('/create', [UserController::class, 'create']);
        Route::post('/store', [UserController::class, 'store']);
        Route::get('/{user}/edit', [UserController::class, 'edit']);
        Route::put('/{user}/update', [UserController::class, 'update']);
        Route::patch('/{user}/reset', [UserController::class, 'reset_password']);
        Route::delete('/{user}/delete', [UserController::class, 'delete']);
        Route::get('/options', [UserController::class, 'options']);
    });
});

Route::namespace('Setting')->prefix('setting')->middleware('auth:web')->group(function () {
    Route::prefix('institution')->middleware('auth:web')->group(function () {
        Route::get('/', [InstitutionController::class, 'index']);
        Route::put('/update', [InstitutionController::class, 'update']);
    });
    Route::prefix('module')->middleware('auth:web')->group(function () {
        Route::get('/', [ModuleController::class, 'index']);
        Route::get('/{module}/edit', [ModuleController::class, 'edit']);
        Route::put('/{module}/update', [ModuleController::class, 'update']);
        Route::get('/options', [ModuleController::class, 'options']);
    });
});

Route::namespace('Administration')->prefix('administration')->middleware('auth:web')->group(function () {
    Route::prefix('maintenance')->middleware('auth:web')->group(function () {
        Route::get('/', [MaintenanceController::class, 'index']);
        Route::get('/process', [MaintenanceController::class, 'process']);
    });
});

Route::namespace('Report')->prefix('report')->middleware('auth:web')->group(function () {
    Route::prefix('crash-log')->middleware('auth:web')->group(function () {
        Route::get('/', [CrashLogController::class, 'index']);
        Route::delete('/clear', [CrashLogController::class, 'clear']);
    });
    Route::prefix('activity-log')->middleware('auth:web')->group(function () {
        Route::get('/', [ActivityLogController::class, 'index']);
        Route::delete('/clear', [ActivityLogController::class, 'clear']);
    });
});
