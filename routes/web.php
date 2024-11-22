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
use App\Http\Controllers\JournalEntryController; // اضف قيد
use App\Http\Controllers\AppointmentController;  // أضف موعد



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
//مسار ادارة الفواتير
        Route::get('/invoice-management', function () {
            return view('layouts.nav-slider-route', ['page' => 'invoice-management']);
        })->name('invoice-management');
// مسار اضافة عميل
        Route::get('/add_customer', function () {
            return view('layouts.nav-slider-route', ['page' => 'add_customer']);
        })->name('add_customer');
// أدارة العملاء
        Route::get('/customer-management', function () {
            return view('layouts.nav-slider-route', ['page' => 'customer-management']);
        })->name('customer-management');
// مسار اضافة فاتورة
        Route::get('/salas_invoice', function () {
            return view('layouts.nav-slider-route', ['page' => 'salas_invoice']);
        })->name('cussalas_invoice');
// مسار عرض سعر
        Route::get('/quotation', function () {
            return view('layouts.nav-slider-route', ['page' => 'quotation']);
        })->name('quotation');
        // توجيه لصفحة مدفوعات العملاء
Route::get('/customer_payments', function () {
    return view('layouts.nav-slider-route', ['page' => 'customer_payments']);
})->name('customer_payments');
Route::get('/invoice_preview', function () {
    return view('layouts.nav-slider-route', ['page' => 'invoice_preview']);
})->name('invoice_preview');
Route::get('/add_payment_process', function () {
    return view('layouts.nav-slider-route', ['page' => 'add_payment_process']);
})->name('add_payment_process');

// مسار صفحة المنتجات
        Route::get('/products', function () {
            return view('layouts.nav-slider-route', ['page' => 'products']);
        })->name('products');
// مسار أدارة المنتجات
        Route::get('/mang_products', function () {
            return view('layouts.nav-slider-route', ['page' => 'mang_products']);
        })->name('mang_products');
// مسار أدارة  المنتجات
        Route::get('/quotation-management', function () {
            return view('layouts.nav-slider-route', ['page' => 'quotation-management']);
        })->name('quotation-management');
//مسار الاشعارات المدينية
        Route::get('/debit-notices', function () {
            return view('layouts.nav-slider-route', ['page' => 'debit-notices']);
        })->name('debit-notices');
//مسار الاشعارات الدائنة

        Route::get('/credit-note', function () {
            return view('layouts.nav-slider-route', ['page' => 'credit-note']);
        })->name('credit-note');
        // مسار صفحة المواعيد
        Route::get('/appointments', function () {
            return view('layouts.nav-slider-route', ['page' => 'appointments']);
        })->name('appointments');
//مسار دليل الحسابات
        Route::get('/chart_of_accounts', function () {
            return view('layouts.nav-slider-route', ['page' => 'chart_of_accounts']);
        })->name('chart_of_accounts');

//مسار القيد
        Route::get('/journal_entries_day', function () {
            return view('layouts.nav-slider-route', ['page' => 'journal_entries_day']);
        })->name('journal_entries_day');
//مسار دليل الحسابات
        Route::get('/chart_of_accounts', ChartOfAccountController::class.'@index')->name('chart_of_accounts');

// مجموعة المسارات للحسابات
Route::prefix('accounts')->group(function () {

Route::get('/create', [ChartOfAccountController::class, 'create'])->name('accounts.create'); // نموذج إضافة حساب جديد
Route::post('/', [ChartOfAccountController::class, 'store'])->name('accounts.store'); // حفظ حساب جديد
Route::get('/{id}/edit', [ChartOfAccountController::class, 'edit'])->name('accounts.edit'); // تعديل حساب
Route::put('/{id}', [ChartOfAccountController::class, 'update'])->name('accounts.update'); // تحديث حساب
Route::delete('/{id}', [ChartOfAccountController::class, 'destroy'])->name('accounts.destroy'); // حذف حساب
});
//مسار اضافة القيد
        Route::get('/add_entry', [JournalEntryController::class, 'create'])->name('add_entry');
// مجموعة المسارات للقيود
        Route::get('/journal-entries/create', [JournalEntryController::class, 'create'])->name('journal_entries.create');
        Route::get('/journal_entries_day', [JournalEntryController::class, 'displayEntries'])->name('journal_entries_day');

Route::get('/journal-entries/search', [JournalEntryController::class, 'search'])->name('journal_entries.search');

        Route::post('/journal-entries', [JournalEntryController::class, 'store'])->name('journal_entries.store');
        Route::get('/journal-entries/{id}', [JournalEntryController::class, 'show'])->name('journal_entries.show');
        Route::delete('/journal-entries/{id}', [JournalEntryController::class, 'destroy'])->name('journal_entries.destroy');

        // إضافة المسارات لإنشاء إشعارات دائنة
        Route::get('/create-credit-notification', [CreditNotificationController::class, 'create'])->name('create-credit-notification');        Route::post('/store-credit-notification', [CreditNotificationController::class, 'store'])->name('store-credit-notification');
//مسار أدارة الموظفين
        Route::get('/employee_management', function () {
            return view('layouts.nav-slider-route', ['page' => 'employee_management']);
        })->name('employee_management');
//مسار اضافة موظف
        Route::get('/add_employee', function () {
            return view('layouts.nav-slider-route', ['page' => 'add_employee']);
        })->name('add_employee');
        Route::get('/schedule_appointment', function () {
            return view('layouts.nav-slider-route', ['page' => 'schedule_appointment']);
        })->name('schedule_appointment');
// مسار دليل الحسابات
        Route::resource('accounts', ChartOfAccountController::class)->names([
            'index' => 'accounts.index',  // عرض جميع الحسابات
            'create' => 'accounts.create',  // عرض نموذج إضافة حساب جديد
            'store' => 'accounts.store',  // حفظ الحساب الجديد
            'edit' => 'accounts.edit',  // تعديل الحساب
            'update' => 'accounts.update',  // تحديث الحساب
            'destroy' => 'accounts.destroy',  // حذف الحساب
        ]);


        Route::post('/appointments', [AppointmentController::class, 'store'])->name('appointments.store');
        Route::get('/customer-management', [ClientController::class, 'index'])->name('customer-management');

        Route::get('/clients', [ClientController::class, 'index'])->name('clients.index');
        Route::resource('clients', ClientController::class);
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
Route::get('/section-data/{type}', [ChartOfAccountController::class, 'getSectionData']);


Route::get('/notifications/create', [CreditNotificationController::class, 'create'])->name('notifications.create');

Route::post('/notifications/store', [CreditNotificationController::class, 'store'])->name('notifications.store');

Route::post('/employees/store', [EmployeeController::class, 'store'])->name('employees.store');
Route::post('sales_invoice/store', [InvoiceController::class, 'store'])->name('invoices.store');
Route::post('/invoice-items/store', [InvoiceItemController::class, 'store'])->name('invoice-items.store');

Route::get('/invoice-items/create', [InvoiceItemController::class, 'create'])->name('invoice-items.create');
Route::post('/accounts/add', [ChartOfAccountController::class, 'store'])->name('accounts.add');
    }
);
Route::get('/chart_of_accounts', [ChartOfAccountController::class, 'index'])->name('accounts.index ');

// مسارات الملف الشخصي
Route::middleware(['auth'])->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// تضمين ملف auth.php لتهيئة المسارات الافتراضية للمصادقة
require __DIR__.'/auth.php';
