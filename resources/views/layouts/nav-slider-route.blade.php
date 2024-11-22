<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}" dir="{{ app()->getLocale() == 'ar' ? 'rtl' : 'ltr' }}">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Bootstrap CSS -->
<!-- CSS -->
<link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/css/bootstrap.min.css" rel="stylesheet">
<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
<link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
<link href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css" rel="stylesheet">


    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@400;700&family=Poppins:wght@200,300,400,500,600,700&display=swap" rel="stylesheet">
    <!-- CSS الخاص بالمشروع -->
    <link href="{{ asset('assets/css/style.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/css/style2.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/css/app.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/css/icons.min.css') }}" rel="stylesheet">
    <link href="{{ asset('Design/css/data.css') }}" rel="stylesheet">
    @yield('css')

    <!-- CSS بناءً على اللغة -->
    @if (App::getLocale() == 'ar')
        <link href="{{ asset('assets/css/rtl.css') }}" rel="stylesheet">
    @else
        <link href="{{ asset('assets/css/ltr.css') }}" rel="stylesheet">
    @endif

    <title>@yield("title")</title>
</head>

<body class="loading" dir="{{ App::getLocale() == 'ar' ? 'rtl' : 'ltr' }}" data-layout-color="light" data-leftbar-theme="dark" data-layout-mode="fluid" data-rightbar-onstart="true">
    <!-- Begin page -->

    <!-- الشريط الجانبي -->
    <div class="leftside-menu">
        <a href="index.html" class="logo text-center logo-light">
            <span class="logo-lg">
                <img src="{{ asset('assets/images/logo.png') }}" alt="" height="16">
            </span>
            <span class="logo-sm">
                <img src="{{ asset('assets/images/logo_sm.png') }}" alt="" height="16">
            </span>
        </a>
        <a href="index.html" class="logo text-center logo-dark">
            <span class="logo-lg">
                <img src="{{ asset('assets/images/logo-dark.png') }}" alt="" height="16">
            </span>
            <span class="logo-sm">
                <img src="{{ asset('assets/images/logo_sm_dark.png') }}" alt="" height="16">
            </span>
        </a>

        @include('layouts.main-sider')
    </div>

    <!-- المحتوى الرئيسي -->
    <div class="content-page">
        <div class="content">
            <!-- شريط التنقل العلوي -->
            @include('layouts.navbar')
            @if (session('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    {{ session('success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif

            <!-- المحتوى الديناميكي -->
            @if (isset($page))
                @switch($page)
                    @case('human_resources')
                        @include('fawtra.1-control_panel.hr-dashboard')
                    @break

                    @case('invoice-management')
                        @include('fawtra.2-purchase_admin.invoice-management')
                    @break

                    @case('add_customer')
                        @include('fawtra.9-sales_management.add_customer')
                    @break

                    @case('customer-management')
                        @include('fawtra.9-sales_management.customer-management')
                    @break

                    @case('client-view')
                        @include('fawtra.9-sales_management.client-view')
                    @break

                    @case('sales_invoice')
                        @include('fawtra.2-purchase_admin.sales_invoice')
                    @break

                    @case('quotation')
                        @include('fawtra.2-purchase_admin.quotation')
                    @break

                    @case('products')
                        @include('fawtra.12-stock_control.products')
                    @break

                    @case('mang_products')
                        @include('fawtra.12-stock_control.mang_products')
                    @break

                    @case('quotation-management')
                        @include('fawtra.2-purchase_admin.quotation-management')
                    @break

                    @case('debit-notices')
                        @include('fawtra.2-purchase_admin.debit-notices')
                    @break

                    @case('credit-note')
                        @include('fawtra.2-purchase_admin.credit-note')
                    @break

                    @case('employee_management')
                        @include('fawtra.18-HR_Files.employee_management')
                    @break

                    @case('add_employee')
                        @include('fawtra.18-HR_Files.add_employee')
                    @break

                    @case('appointments')
                        @include('fawtra.9-sales_management.appointments')
                    @break

                    @case('schedule_appointment')
                        @include('fawtra.9-sales_management.schedule_appointment')
                    @break

                    @case('chart_of_accounts')
                        @include('fawtra.15-General_Accounting.chart_of_accounts')
                    @break

                    @case('add_entry')
                        @include('fawtra.15-General_Accounting.add_entry')
                    @break

                    @case('journal_entries_day')
                        @include('fawtra.15-General_Accounting.journal_entries_day')
                    @break

                    @case('customer_payments')
                        @include('fawtra.2-purchase_admin.customer_payments')
                    @break

                    @case('invoice_preview')
                        @include('fawtra.2-purchase_admin.invoice_preview')
                    @break

                    @case('add_payment_process')
                        @include('fawtra.2-purchase_admin.add_payment_process')
                    @break

                    @default
                @endswitch
            @endif
        </div>
    </div>

    <!-- إضافة مكتبات JavaScript -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
    <script src="{{ asset('assets/js/vendor.min.js') }}"></script>
    <script src="{{ asset('assets/js/app.min.js') }}"></script>
    <script src="{{ asset('assets/js/scriptt.js') }}"></script>
    <script src="{{ asset('assets/js/vendor/chart.min.js') }}"></script>
    <script src="{{ asset('assets/js/pages/demo.dashboard-projects.js') }}"></script>
    <script src="{{ asset('assets/js/date.js') }}"></script>
</body>
</html>
