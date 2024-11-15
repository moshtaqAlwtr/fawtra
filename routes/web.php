<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ClientController; // استيراد ClientController

// تفعيل مسارات المصادقة بدون التحقق من البريد الإلكتروني
Auth::routes(['verify' => false]);

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
        // صفحة welcome بعد تسجيل الدخول
        Route::get('/welcome', function () {
            return view('welcome');
        })->middleware(['auth'])->name('welcome');

        Route::get('/human-resources', function () {
            return view('layouts.nav-slider-route', ['page' => 'human_resources']);
        })->name('human_resources');

        Route::get('/invoice-management', function () {
            return view('layouts.nav-slider-route', ['page' => 'invoice-management']);
        })->name('invoice-management');

        // مسار عرض صفحة إضافة عميل جديد
        Route::get('/add_customer', function () {
            return view('layouts.nav-slider-route', ['page' => 'add_customer']);
        })->name('add_customer');

        // مسار تخزين بيانات العميل الجديد
        Route::post('/clients/store', [ClientController::class, 'storeClient'])->name('storeClient');
    }
);

// مسارات الملف الشخصي
Route::middleware(['auth'])->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// تضمين ملف auth.php لتهيئة المسارات الافتراضية للمصادقة
require __DIR__.'/auth.php';
