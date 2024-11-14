<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth; // تأكد من إضافة هذا السطر
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;
use App\Http\Controllers\ProfileController;

// تفعيل مسارات المصادقة مع خاصية التحقق من البريد الإلكتروني
Auth::routes(['verify' => true]);

// عرض تسجيل الدخول كصفحة رئيسية للزوار
Route::get('/', function () {
    return redirect()->route('login');
})->middleware('guest');

// مجموعة المسارات باستخدام تعدد اللغات
Route::group(
    [
        'prefix' => LaravelLocalization::setLocale(),
        'middleware' => ['localeSessionRedirect', 'localizationRedirect', 'localeViewPath']
    ],
    function () {
        Route::get('/welcome', function () {
            return view('welcome');
        })->name('home');

        Route::get('/human-resources', function () {
            return view('layouts.nav-slider-route', ['page' => 'human_resources']);
        })->name('human_resources');

        Route::get('/invoice-management', function () {
            return view('layouts.nav-slider-route', ['page' => 'invoice-management']);
        })->name('invoice-management');
    }
);

// مسارات المصادقة
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
