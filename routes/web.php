<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;
use App\Http\Controllers\{
    ProfileController,
    ClientController,
    InvoiceController,
    ProductController,
    QuoteController,
    CreditNotificationController,
    EmployeeController,
    Invoices\InvoiceItemController,
    Accounts\ChartOfAccountController,
    Accounts\AccountsClientPaymentController,
    JournalEntryController,
    AppointmentController,
    Finance\PaymentVoucherController
};
use App\Models\Client;

// تفعيل مسارات المصادقة بدون التحقق من البريد الإلكتروني
Auth::routes(['verify' => false]);

// عرض تسجيل الدخول كصفحة رئيسية للزوار
Route::get('/', fn() => redirect()->route('login'))->middleware('guest');

// مجموعة المسارات باستخدام تعدد اللغات
Route::group([
    'prefix' => LaravelLocalization::setLocale(),
    'middleware' => ['localeSessionRedirect', 'localizationRedirect', 'localeViewPath']
], function () {

    // الصفحة الرئيسية للمستخدمين المصادق عليهم
    Route::get('/welcome', fn() => view('welcome'))->middleware(['auth'])->name('welcome');

    // الموارد
    Route::resource('products', ProductController::class);
    Route::resource('clients', ClientController::class)->names(['index' => 'clients.index']);
    Route::resource('accounts', ChartOfAccountController::class)->names([
        'index' => 'accounts.index',
        'create' => 'accounts.create',
        'store' => 'accounts.store',
        'edit' => 'accounts.edit',
        'update' => 'accounts.update',
        'destroy' => 'accounts.destroy',
    ]);

    // صفحات ثابتة مع محتوى ديناميكي
    $navSliderRoutes = [
        'human_resources' => 'human_resources',
        'invoice-management' => 'invoice-management',
        'add_customer' => 'add_customer',
        'customer-management' => 'customer-management',
        'salas_invoice' => 'salas_invoice',
        'quotation' => 'quotation',
        'customer_payments' => 'customer_payments',
        'invoice_preview' => 'invoice_preview',
        'add_payment_process' => 'add_payment_process',
        'products' => 'products',
        'mang_products' => 'mang_products',
        'quotation-management' => 'quotation-management',
        'debit-notices' => 'debit-notices',
        'show_credit_notice' => 'show_credit_notice',
        'client-view' => 'client-view',
        'credit-note' => 'credit-note',
        'appointments' => 'appointments',
        'chart_of_accounts' => 'chart_of_accounts',
        'journal_entries_day' => 'journal_entries_day',
        'import_expense_receipts' => 'import_expense_receipts',
        'expense_voucher' => 'expense_voucher',
        'employee_management' => 'employee_management',
        'add_employee' => 'add_employee',
        'schedule_appointment' => 'schedule_appointment',
    ];
    foreach ($navSliderRoutes as $route => $page) {
        Route::get("/$route", fn() => view('layouts.nav-slider-route', ['page' => $page]))->name($route);
    }

    // مسارات الحسابات
    Route::prefix('accounts')->group(function () {
        Route::get('/create', [ChartOfAccountController::class, 'create'])->name('accounts.create');
        Route::post('/', [ChartOfAccountController::class, 'store'])->name('accounts.store');
        Route::get('/{id}/edit', [ChartOfAccountController::class, 'edit'])->name('accounts.edit');
        Route::put('/{id}', [ChartOfAccountController::class, 'update'])->name('accounts.update');
        Route::delete('/{id}', [ChartOfAccountController::class, 'destroy'])->name('accounts.destroy');
    });

    // مسارات القيود اليومية
    Route::get('/add_entry', [JournalEntryController::class, 'create'])->name('add_entry');
    Route::get('/journal-entries/create', [JournalEntryController::class, 'create'])->name('journal_entries.create');
    Route::get('/journal_entries_day', [JournalEntryController::class, 'displayEntries'])->name('journal_entries_day');
    Route::get('/journal-entries/search', [JournalEntryController::class, 'search'])->name('journal_entries.search');
    Route::post('/journal-entries', [JournalEntryController::class, 'store'])->name('journal_entries.store');
    Route::get('/journal-entries/{id}', [JournalEntryController::class, 'show'])->name('journal_entries.show');
    Route::delete('/journal-entries/{id}', [JournalEntryController::class, 'destroy'])->name('journal_entries.destroy');

    // مسارات المواعيد
    Route::post('/appointments', [AppointmentController::class, 'store'])->name('appointments.store');

    // مسارات الإشعارات الدائنة
    Route::get('/create-credit-notification', [CreditNotificationController::class, 'create'])->name('create-credit-notification');
    Route::post('/store-credit-notification', [CreditNotificationController::class, 'store'])->name('store-credit-notification');
    Route::get('/notifications', [CreditNotificationController::class, 'index'])->name('notifications');
    Route::get('/notifications/create', [CreditNotificationController::class, 'create'])->name('notifications.create');
    Route::post('/notifications/store', [CreditNotificationController::class, 'store'])->name('notifications.store');

    // مسارات الفواتير
    Route::get('/sales-invoice', [InvoiceController::class, 'index'])->name('sales_invoice');
    Route::post('/sales_invoice/store', [InvoiceController::class, 'store'])->name('invoices.store');
    Route::post('/invoice-items/store', [InvoiceItemController::class, 'store'])->name('invoice-items.store');
    Route::get('/invoice-items/create', [InvoiceItemController::class, 'create'])->name('invoice-items.create');

    // مسارات الملف الشخصي
    Route::middleware(['auth'])->group(function () {
        Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
        Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
        Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    });
});

// مسارات سندات الصرف
Route::prefix('expense_voucher')->group(function () {
    Route::get('/expense_voucher', [PaymentVoucherController::class, 'index'])->name('payment_vouchers.index');
    Route::get('/create', [PaymentVoucherController::class, 'create'])->name('payment_vouchers.create');
    Route::post('/', [PaymentVoucherController::class, 'store'])->name('payment_vouchers.store');
});

    Route::get('/clients', [ClientController::class, 'index'])->name('clients.index');
        Route::resource('clients', ClientController::class);
         Route::post('/clients/store', [ClientController::class, 'storeClient'])->name('storeClient');
// مسارات مدفوعات العملاء
Route::get('/payments', [AccountsClientPaymentController::class, 'create'])->name('payments.create');
Route::post('/payments', [AccountsClientPaymentController::class, 'store'])->name('payments.store');

// واجهة API
Route::get('/api/clients/{client}/invoices', fn(Client $client) => $client->invoices);

// تضمين ملف المسارات الافتراضية للمصادقة
require __DIR__ . '/auth.php';
