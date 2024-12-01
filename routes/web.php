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
    Finance\ReceiptController,
    Accounts\ChartOfAccountController,
    Accounts\AccountsClientPaymentController,
    JournalEntryController,
    AppointmentController,
    Finance\PaymentVoucherController,
    Auth\RegisteredUserController,
    Auth\LoginController,
    Auth\VerifyEmailController,
    Auth\EmailVerificationPromptController,
    Auth\EmailVerificationNotificationController,
    NotificationController
};
use App\Models\Client;

// Authentication Routes
Route::middleware('guest')->group(function () {
    // Login Routes
    Route::get('login', [LoginController::class, 'showLoginForm'])->name('login');
    Route::post('login', [LoginController::class, 'login']);

    // Registration Routes
    Route::get('register', [RegisteredUserController::class, 'create'])->name('register');
    Route::post('register', [RegisteredUserController::class, 'store']);
});

// Email Verification Routes
Route::middleware(['auth'])->group(function () {
    Route::get('verify-email', [EmailVerificationPromptController::class, '__invoke'])
                ->name('verification.notice');

    Route::get('verify-email/{id}/{hash}', [VerifyEmailController::class, '__invoke'])
                ->middleware(['signed', 'throttle:6,1'])
                ->name('verification.verify');

    Route::post('email/verification-notification', [EmailVerificationNotificationController::class, 'store'])
                ->middleware('throttle:6,1')
                ->name('verification.send');
});

// Logout Route
Route::post('logout', [LoginController::class, 'logout'])->name('logout')->middleware('auth');

// Guest Landing Page Route
Route::get('/', function () {
    return Auth::check() ? redirect()->route('welcome') : redirect()->route('login');
})->middleware('guest');

// Localization Group
Route::group([
    'prefix' => LaravelLocalization::setLocale(),
    'middleware' => ['localeSessionRedirect', 'localizationRedirect', 'localeViewPath']
], function () {

    // Dashboard Route
    Route::get('/welcome', function() {
        return view('layouts.nav-slider-route', ['page' => 'welcome']);
    })->middleware(['auth'])->name('welcome');

    // Resource Routes
    Route::resource('products', ProductController::class);
    Route::resource('invoices', InvoiceController::class);
    Route::resource('receipts', Finance\ReceiptController::class);

    // Client Routes
    Route::get('/customer-management', [ClientController::class, 'index'])->name('customer-management.index');
    Route::prefix('clients')->group(function () {

        Route::get('/create', [ClientController::class, 'create'])->name('add_customer');
        Route::post('/', [ClientController::class, 'store'])->name('clients.store');
        Route::get('/{client}/edit', [ClientController::class, 'edit'])->name('clients.edit');
        Route::put('/{client}', [ClientController::class, 'update'])->name('clients.update');
        Route::delete('/{client}', [ClientController::class, 'destroy'])->name('clients.destroy');
    });

    // Receipt Routes
    Route::prefix('receipts')->group(function () {
        Route::get('/', [Finance\ReceiptController::class, 'index'])->name('actions_page');
        Route::get('/create', [Finance\ReceiptController::class, 'create'])->name('add_receipt');
        Route::post('/store', [Finance\ReceiptController::class, 'store'])->name('receipts.store');
    });

    // Profile Routes
    Route::middleware(['auth'])->group(function () {
        Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
        Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
        Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    });

    // Chart of Accounts Routes
    Route::prefix('accounts')->group(function () {
        Route::get('/', [ChartOfAccountController::class, 'index'])->name('chart_of_accounts');
        Route::get('/index', [ChartOfAccountController::class, 'index'])->name('accounts.index');
        Route::get('/store', [ChartOfAccountController::class, 'store'])->name('accounts.store');
        Route::post('/create', [ChartOfAccountController::class, 'create'])->name('accounts.create');
    });

    // Journal Entry Routes
    Route::prefix('journal-entries')->group(function () {
        Route::get('/add_entry', [JournalEntryController::class, 'create'])->name('add_entry');
        Route::get('/create', [JournalEntryController::class, 'create'])->name('journal_entries.create');
        Route::get('/day', [JournalEntryController::class, 'displayEntries'])->name('journal_entries_day');
        Route::get('/search', [JournalEntryController::class, 'search'])->name('journal_entries.search');
        Route::post('/', [JournalEntryController::class, 'store'])->name('journal_entries.store');
        Route::get('/{id}', [JournalEntryController::class, 'show'])->name('journal_entries.show');
        Route::delete('/{id}', [JournalEntryController::class, 'destroy'])->name('journal_entries.destroy');
    });

    // Invoice Management Routes
    Route::prefix('invoice')->group(function () {
        Route::get('/sales-invoice', [InvoiceController::class, 'index'])->name('sales_invoice');
        Route::get('/management', [InvoiceController::class, 'index'])->name('invoice-management');
        Route::get('/', [InvoiceController::class, 'create'])->name('sales_invoice.create');
        Route::post('/store', [InvoiceController::class, 'store'])->name('invoices.store');
        Route::get('/{invoice}/edit', [InvoiceController::class, 'edit'])->name('invoices.edit');
        Route::put('/{invoice}', [InvoiceController::class, 'update'])->name('invoices.update');
        Route::delete('/delete/{invoice}', [InvoiceController::class, 'destroy'])->name('invoice.delete');
        Route::get('/{id}/print', [InvoiceController::class, 'print'])->name('invoice_print');
        Route::get('/{id}/send-to-client', [InvoiceController::class, 'sendToClient'])->name('invoice_send');
    });

    // Credit Notification Routes
    Route::prefix('credit-notifications')->group(function () {
        Route::get('/create', [CreditNotificationController::class, 'create'])->name('create-credit-notification');
        Route::post('/store', [CreditNotificationController::class, 'store'])->name('store-credit-notification');
        Route::get('/', [CreditNotificationController::class, 'index'])->name('notifications');
    });

    // Payment Routes
    Route::prefix('payments')->group(function () {
        Route::get('/process', [AccountsClientPaymentController::class, 'index'])->name('add_payment_process');
        Route::get('/create', [AccountsClientPaymentController::class, 'create'])->name('payments.create');
        Route::post('/', [AccountsClientPaymentController::class, 'store'])->name('payments.store');
    });

    // Receipt Voucher Routes
    Route::get('/add_receipt', [ReceiptController::class, 'create'])->name('add_receipt');
    Route::prefix('receipt')->group(function () {
        Route::get('/', [ReceiptController::class, 'index'])->name('receipts.index');
        Route::get('/create', [ReceiptController::class, 'create'])->name('add_receipt');
        Route::post('/', [ReceiptController::class, 'store'])->name('receipts.store');
    });

    // Payment Voucher Routes
    Route::prefix('expense_voucher')->group(function () {
        Route::get('/paymentVouchers', [PaymentVoucherController::class, 'index'])->name('payment_vouchers.index');
        Route::get('/payment_vouchers', [PaymentVoucherController::class, 'create'])->name('payment_vouchers.create');
        Route::post('', [PaymentVoucherController::class, 'store'])->name('payment_vouchers.store');
        Route::delete('/payment-voucher/{payment_id}', [PaymentVoucherController::class, 'destroy'])->name('payment_vouchers.destroy');
    });

    // Employee Routes
    Route::post('/employees/store', [EmployeeController::class, 'store'])->name('employees.store');

    // Quote Routes
    Route::get('/quotation', function() {
        return view('layouts.nav-slider-route', ['page' => 'quotation']);
    })->name('quotation');

    Route::get('/quotation-management', function() {
        return view('layouts.nav-slider-route', ['page' => 'quotation-management']);
    })->name('quotation-management');

    Route::prefix('quotes')->group(function () {
        Route::get('/quotation', [QuoteController::class, 'index'])->name('quotation');
        Route::get('/management', [QuoteController::class, 'management'])->name('quotation-management');
        Route::post('/store', [QuoteController::class, 'store'])->name('quotes.store');
        Route::get('/{quote}/edit', [QuoteController::class, 'edit'])->name('quotes.edit');
        Route::put('/{quote}', [QuoteController::class, 'update'])->name('quotes.update');
        Route::delete('/{quote}', [QuoteController::class, 'destroy'])->name('quotes.destroy');
    });

    Route::middleware(['auth', 'verified'])->group(function () {
        // Quotation Routes
        Route::prefix('quotes')->group(function () {
            Route::get('/quotation', [QuoteController::class, 'index'])->name('quotation');
            Route::get('/management', [QuoteController::class, 'management'])->name('quotation-management');
            Route::post('/store', [QuoteController::class, 'store'])->name('quotes.store');
            Route::get('/{quote}/edit', [QuoteController::class, 'edit'])->name('quotes.edit');
            Route::put('/{quote}', [QuoteController::class, 'update'])->name('quotes.update');
            Route::delete('/{quote}', [QuoteController::class, 'destroy'])->name('quotes.destroy');
        });
    });

    // Notification Routes
    Route::prefix('notifications')->group(function () {
        Route::post('/store', [NotificationController::class, 'store'])->name('notifications.store');
        Route::get('/', [NotificationController::class, 'index'])->name('notifications.index');
        Route::delete('/{id}', [NotificationController::class, 'destroy'])->name('notifications.destroy');
    });

    // Static Page Routes with Dynamic Content
    $navSliderRoutes = [
        'actions_page' => 'actions_page',
        'add_receipt' => 'add_receipt',
        'add_payment_voucher' => 'add_payment_voucher',
        'human_resources' => 'human_resources',
        'invoice-management' => 'invoice-management',
        'add_customer' => 'add_customer',
        'customer-management' => 'customer-management',
        'salas_invoice' => 'salas_invoice',
        'quotation' => 'quotation',
        'customer_payments' => 'customer_payments',
        'invoice_preview' => 'invoice_preview',
        'add_payment_process' => 'add_payment_process',
        'mang_products' => 'mang_products',
        'quotation-management' => 'quotation-management',
        'debit-notices' => 'debit-notices',
        'show_credit_notice' => 'show_credit_notice',
        'client-view' => 'client-view',
        'credit-note' => 'credit-note',
        'returned_invoices' => 'returned_invoices',
        'appointments' => 'appointments',
        'journal_entries_day' => 'journal_entries_day',
        'import_expense_receipts' => 'import_expense_receipts',
        'expense_voucher' => 'expense_voucher',
        'employee_management' => 'employee_management',
        'add_employee' => 'add_employee',
        'schedule_appointment' => 'schedule_appointment',
    ];

    foreach ($navSliderRoutes as $route => $page) {
        if($route == 'add_receipt'){
            Route::get("/$route", [ReceiptController::class, 'create'])->name($route);
        } elseif($route == 'add_payment_voucher'){
            Route::get("/$route", [PaymentVoucherController::class, 'create'])->name($route);
        } else {
            Route::get("/$route", fn() => view('layouts.nav-slider-route', ['page' => $page]))->name($route);
        }
    }
});
