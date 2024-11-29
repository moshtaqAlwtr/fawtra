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

// توجيه المستخدمين الذين لم يقوموا بتسجيل الدخول إلى صفحة تسجيل الدخول
Route::get('/', function () {
    // التحقق من حالة المصادقة للمستخدم
    if (Auth::check()) {
        return redirect()->route('welcome'); // توجيه إلى صفحة الترحيب إذا كان المستخدم مسجل الدخول
    } else {
        return redirect()->route('login'); // التوجيه إلى صفحة تسجيل الدخول إذا لم يكن المستخدم مسجل الدخول
    }
})->middleware('guest');

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

        'mang_products' => 'mang_products',
        'quotation-management' => 'quotation-management',
        'debit-notices' => 'debit-notices',
        'show_credit_notice' => 'show_credit_notice',
        'client-view' => 'client-view',
        'credit-note' => 'credit-note',
        'returned_invoices' => 'returned_invoices',
        'appointments' => 'appointments',
        // 'chart_of_accounts' => 'chart_of_accounts',
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
    Route::get('/chart_of_accounts', ChartOfAccountController::class.'@index')->name('chart_of_accounts');
    Route::prefix('accounts')->group(function () {

        Route::get('/index', ChartOfAccountController::class.'@index')->name('accounts.index');

      Route::get('/store', [ChartOfAccountController::class, 'store'])->name('accounts.store');

      Route::post('/index', [ChartOfAccountController::class, 'index'])->name('accounts.index');
    Route::post('/create', [ChartOfAccountController::class, 'create'])->name('accounts.create');});

    Route::resource('invoices', InvoiceController::class);

    // مسارات الحسابات

    // مسارات القيود اليومية
    Route::get('/add_entry', [JournalEntryController::class, 'create'])->name('add_entry');
    Route::get('/journal-entries/create', [JournalEntryController::class, 'create'])->name('journal_entries.create');
    Route::get('/journal_entries_day', [JournalEntryController::class, 'displayEntries'])->name('journal_entries_day');
    Route::get('/journal-entries/search', [JournalEntryController::class, 'search'])->name('journal_entries.search');
    Route::post('/journal-entries', [JournalEntryController::class, 'store'])->name('journal_entries.store');
    Route::get('/journal-entries/{id}', [JournalEntryController::class, 'show'])->name('journal_entries.show');
    Route::delete('/journal-entries/{id}', [JournalEntryController::class, 'destroy'])->name('journal_entries.destroy');

    // مسارات المواعيد
    Route::get('/customer-management', [ClientController::class, 'index'])->name('customer-management');
    Route::get('/quotation', [QuoteController::class, 'index'])->name('quotation');
    Route::post('/quotes', [QuoteController::class, 'store'])->name('quotes.store');

    // مسارات الإشعارات الدائنة
    Route::get('/create-credit-notification', [CreditNotificationController::class, 'create'])->name('create-credit-notification');
    Route::post('/store-credit-notification', [CreditNotificationController::class, 'store'])->name('store-credit-notification');
    Route::get('/notifications', [CreditNotificationController::class, 'index'])->name('notifications');
    Route::get('/notifications/create', [CreditNotificationController::class, 'create'])->name('notifications.create');
    Route::post('/notifications/store', [CreditNotificationController::class, 'store'])->name('notifications.store');

    // مسارات الفواتير

// عرض الفواتير
// عرض صفحة إدارة الفواتير
Route::get('/invoice-management', [InvoiceController::class, 'index'])->name('invoice-management');

// عرض صفحة فواتير المبيعات
Route::get('/sales-invoice', [InvoiceController::class, 'index'])->name('sales_invoice');

// عرض صفحة إضافة فاتورة جديدة
Route::get('/invoice', [InvoiceController::class, 'create'])->name('sales_invoice.create');

// حفظ الفاتورة
Route::post('/sales_invoice/store', [InvoiceController::class, 'store'])->name('invoices.store');

// عرض وتفاصيل الفاتورة
Route::get('invoice-management/{id}', [InvoiceController::class, 'show'])->name('invoice-management.show');

// عرض الفاتورة للمعاينة (preview)
Route::get('/invoice/{id}/preview', [InvoiceController::class, 'preview'])->name('invoice_preview');

// عرض صفحة تعديل الفاتورة
// مسار حذف الفاتورة
// بدل من ذلك، اجعلها تأخذ معرف الفاتورة مباشرة:
Route::delete('/invoice/delete/{invoice}', [InvoiceController::class, 'destroy'])->name('invoice.delete');

// عرض الفاتورة وتعديلها
Route::get('/invoices/{invoice}/edit', [InvoiceController::class, 'edit'])->name('invoices.edit');

// تحديث الفاتورة بعد التعديل
Route::put('/invoices/{invoice}', [InvoiceController::class, 'update'])->name('invoices.update');


// طباعة الفاتورة
Route::get('invoice/{id}/print', [InvoiceController::class, 'print'])->name('invoice_print');

// إرسال الفاتورة إلى العميل
Route::get('/invoice/{id}/send-to-client', [InvoiceController::class, 'sendToClient'])->name('invoice_send');

// حذف الفاتورة (detele)

// Route::get('/invoice/{id}/copy', [InvoiceController::class, 'copy'])->name('invoice_copy');

    // مسارات الملف الشخصي
    Route::middleware(['auth'])->group(function () {
        Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
        Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
        Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    });

    Route::get('/credit-note', [CreditNotificationController::class, 'index'])->name('credit-note');

    // مسارات مدفوعات العملاء
    Route::get('/add_payment_process', [AccountsClientPaymentController::class, 'index'])->name('add_payment_process');



    Route::get('/payments/create', [AccountsClientPaymentController::class, 'create'])->name('payments.create');
    Route::post('/payments', [AccountsClientPaymentController::class, 'store'])->name('payments.store');
        // مسارات سندات الصرف
        Route::get('/import_expense_receipts', [PaymentVoucherController::class, 'index'])->name('import_expense_receipts');
        Route::prefix('expense_voucher')->group(function () {
            Route::get('/paymentVouchers', [PaymentVoucherController::class, 'index'])->name('payment_vouchers.index');
            Route::get('/payment_vouchers', [PaymentVoucherController::class, 'create'])->name('payment_vouchers.create');
            Route::post('', [PaymentVoucherController::class, 'store'])->name('payment_vouchers.store');

            Route::delete('/payment-voucher/{payment_id}', [PaymentVoucherController::class, 'destroy'])->name('payment_vouchers.destroy');

        });

//الموظفين
Route::post('/employees/store', [EmployeeController::class, 'store'])->name('employees.store');

    // مسارات العملاء
    Route::get('/clients', [ClientController::class, 'index'])->name('clients.index');
    Route::resource('clients', ClientController::class);
    Route::post('/clients/store', [ClientController::class, 'storeClient'])->name('storeClient');


    // واجهة API
    Route::get('/api/clients/{client}/invoices', fn(Client $client) => $client->invoices);

    // تضمين ملف المسارات الافتراضية للمصادقة
    require __DIR__ . '/auth.php';
});
