<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\InvoiceController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\QuoteController;

use App\Http\Controllers\CreditNotificationController ;  // إضافة الاستيراد الجديد
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\Invoices\InvoiceItemController;
use App\Http\Controllers\Accounts\ChartOfAccountController;




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
        // مسار صفحة المواعيد
        Route::get('/appointments', function () {
            return view('layouts.nav-slider-route', ['page' => 'appointments']);
        })->name('appointments');

        Route::get('/schedule-appointment', [AppointmentController::class, 'index'])->name('schedule.appointment');
        Route::get('/schedule-appointment/create', [AppointmentController::class, 'create'])->name('schedule.create');
        Route::post('/schedule-appointment', [AppointmentController::class, 'store'])->name('schedule.store');
        Route::get('/schedule-appointment/{id}', [AppointmentController::class, 'show'])->name('schedule.show');
        Route::get('/schedule-appointment/{id}/edit', [AppointmentController::class, 'edit'])->name('schedule.edit');
        Route::put('/schedule-appointment/{id}', [AppointmentController::class, 'update'])->name('schedule.update');
        Route::delete('/schedule-appointment/{id}', [AppointmentController::class, 'destroy'])->name('schedule.destroy');

        // إضافة المسارات لإنشاء إشعارات دائنة
        Route::get('/create-credit-notification', [CreditNotificationController::class, 'create'])->name('create-credit-notification');
        Route::post('/store-credit-notification', [CreditNotificationController::class, 'store'])->name('store-credit-notification');


        Route::get('/employee_management', function () {
            return view('layouts.nav-slider-route', ['page' => 'employee_management']);
        })->name('employee_management');

        Route::get('/add_employee', function () {
            return view('layouts.nav-slider-route', ['page' => 'add_employee']);
        })->name('add_employee');
        Route::get('/schedule_appointment', function () {
            return view('layouts.nav-slider-route', ['page' => 'schedule_appointment']);
        })->name('schedule_appointment');

        Route::get('/sales-invoice', [InvoiceController::class, 'index'])->name('sales_invoice');
        Route::post('sales_invoice/store', [InvoiceController::class, 'store'])->name('invoices.store');
        Route::post('/clients/store', [ClientController::class, 'storeClient'])->name('storeClient');
        Route::get('/products', [ProductController::class, 'create'])->name('products.index');

        Route::post('/products', [ProductController::class, 'store'])->name('products.store');
        Route::get('/quotation', [QuoteController::class, 'index'])->name('quotation');
        Route::post('/quotes', [QuoteController::class, 'store'])->name('quotes.store');

Route::post('/products', [ProductController::class, 'store'])->name('products.store');
Route::get('/quotation', [QuoteController::class, 'index'])->name('quotation');
Route::get('/employees', [EmployeeController::class, 'index'])->name('employees');
Route::get('/credit-note', [CreditNotificationController::class, 'index'])->name('credit-note');

Route::post('/quotes', [QuoteController::class, 'store'])->name('quotes.store');
Route::get('/notifications', [CreditNotificationController::class, 'index'])->name('notifications');


Route::get('/notifications/create', [CreditNotificationController::class, 'create'])->name('notifications.create');

Route::post('/notifications/store', [CreditNotificationController::class, 'store'])->name('notifications.store');

Route::post('/employees/store', [EmployeeController::class, 'store'])->name('employees.store');
Route::post('sales_invoice/store', [InvoiceController::class, 'store'])->name('invoices.store');
Route::post('/invoice-items/store', [InvoiceItemController::class, 'store'])->name('invoice-items.store');

Route::get('/invoice-items/create', [InvoiceItemController::class, 'create'])->name('invoice-items.create');

// Route::prefix('invoices/{invoice}/items')->group(function () {
//     Route::get('/', [InvoiceItemController::class, 'index'])->name('invoice-items.index');
//     Route::post('/', [InvoiceItemController::class, 'store'])->name('invoice-items.store');
//     Route::get('/{item}', [InvoiceItemController::class, 'show'])->name('invoice-items.show');
//     Route::put('/{item}', [InvoiceItemController::class, 'update'])->name('invoice-items.update');
//     Route::delete('/{item}', [InvoiceItemController::class, 'destroy'])->name('invoice-items.destroy');
// });

// Route::get('/employee_management', [EmployeeController::class, 'index'])->name('employee_management');




Route::prefix('accounts')->group(function () {
    Route::get('/', [ChartOfAccountController::class, 'index'])->name('accounts.index'); // عرض قائمة الحسابات
    Route::get('/create', [ChartOfAccountController::class, 'create'])->name('accounts.create'); // نموذج إضافة حساب جديد
    Route::post('/', [ChartOfAccountController::class, 'store'])->name('accounts.store'); // حفظ حساب جديد
    Route::get('/{id}/edit', [ChartOfAccountController::class, 'edit'])->name('accounts.edit'); // تعديل حساب
    Route::put('/{id}', [ChartOfAccountController::class, 'update'])->name('accounts.update'); // تحديث حساب
    Route::delete('/{id}', [ChartOfAccountController::class, 'destroy'])->name('accounts.destroy'); // حذف حساب
});


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
