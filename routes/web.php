<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\InvoiceController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\QuoteController;
use App\Http\Controllers\CreditNotificationController; // إضافة الاستيراد الجديد

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
        Route::get('/welcome', function () {
            return view('welcome');
        })->middleware(['auth'])->name('welcome');

        // تعريف المورد products
        Route::resource('products', ProductController::class);

        Route::get('/human-resources', function () {
            return view('layouts.nav-slider-route', ['page' => 'human_resources']);
        })->name('human_resources');

        Route::get('/invoice-management', function () {
            return view('layouts.nav-slider-route', ['page' => 'invoice-management']);
        })->name('invoice-management');

        Route::get('/add_customer', function () {
            return view('layouts.nav-slider-route', ['page' => 'add_customer']);
        })->name('add_customer');

        Route::get('/customer-management', function () {
            return view('layouts.nav-slider-route', ['page' => 'customer-management']);
        })->name('customer-management');

        Route::get('/salas_invoice', function () {
            return view('layouts.nav-slider-route', ['page' => 'salas_invoice']);
        })->name('cussalas_invoice');

        Route::get('/quotation', function () {
            return view('layouts.nav-slider-route', ['page' => 'quotation']);
        })->name('quotation');

        Route::get('/products', function () {
            return view('layouts.nav-slider-route', ['page' => 'products']);
        })->name('products');

        Route::get('/mang_products', function () {
            return view('layouts.nav-slider-route', ['page' => 'mang_products']);
        })->name('mang_products');

        Route::get('/quotation-management', function () {
            return view('layouts.nav-slider-route', ['page' => 'quotation-management']);
        })->name('quotation-management');

        Route::get('/debit-notices', function () {
            return view('layouts.nav-slider-route', ['page' => 'debit-notices']);
        })->name('debit-notices');
        
        Route::get('/credit-note', function () {
            return view('layouts.nav-slider-route', ['page' => 'credit-note']);
        })->name('credit-note');


        // إضافة المسارات لإنشاء إشعارات دائنة
        Route::get('/create-credit-notification', [CreditNotificationController::class, 'create'])->name('create-credit-notification');
        Route::post('/store-credit-notification', [CreditNotificationController::class, 'store'])->name('store-credit-notification');

        Route::get('/sales-invoice', [InvoiceController::class, 'index'])->name('sales_invoice');
        Route::post('sales_invoice/store', [InvoiceController::class, 'store'])->name('invoices.store');
        Route::post('/clients/store', [ClientController::class, 'storeClient'])->name('storeClient');
        Route::get('/products', [ProductController::class, 'create'])->name('products.index');
        Route::post('/products', [ProductController::class, 'store'])->name('products.store');
        Route::get('/quotation', [QuoteController::class, 'index'])->name('quotation');
        Route::post('/quotes', [QuoteController::class, 'store'])->name('quotes.store');
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
