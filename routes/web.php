<?php

use App\Http\Controllers\Admin\AuthController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\GalleryController;
use App\Http\Controllers\Admin\RoomController;
use App\Http\Controllers\Admin\SettingController;
use App\Http\Controllers\Admin\SurveyController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;

// Public Profile Kost
Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/rooms/{room}', [HomeController::class, 'roomDetail'])->name('room.detail');
Route::post('/survey', [HomeController::class, 'storeSurvey'])->name('survey.store');

// Admin Auth
Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthController::class, 'login'])->name('login.post');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// Admin Protected Area
Route::middleware('auth')->prefix('admin')->name('admin.')->group(function () {
    Route::get('/', [DashboardController::class, 'index'])->name('dashboard');

    // Rooms Management
    Route::resource('rooms', RoomController::class)->except(['show']);
    Route::patch('/rooms/{room}/toggle', [RoomController::class, 'toggleAvailability'])->name('rooms.toggle');

    // Surveys Inquiries
    Route::get('/surveys', [SurveyController::class, 'index'])->name('surveys.index');
    Route::patch('/surveys/{survey}/status', [SurveyController::class, 'updateStatus'])->name('surveys.status');
    Route::delete('/surveys/{survey}', [SurveyController::class, 'destroy'])->name('surveys.destroy');

    // Gallery Management
    Route::get('/gallery', [GalleryController::class, 'index'])->name('gallery.index');
    Route::post('/gallery', [GalleryController::class, 'store'])->name('gallery.store');
    Route::delete('/gallery/{gallery}', [GalleryController::class, 'destroy'])->name('gallery.destroy');

    // Settings
    Route::get('/settings', [SettingController::class, 'index'])->name('settings.index');
    Route::put('/settings', [SettingController::class, 'update'])->name('settings.update');
});
