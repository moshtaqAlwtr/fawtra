<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Title -->
    <title>@yield("title")</title>

    <!-- Favicon -->
    <link rel="shortcut icon" href="{{ asset('assets/images/favicon.ico') }}" type="image/x-icon" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <!-- Font -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins:200,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900">

    <!-- Bootstrap CSS و Font Awesome و Flatpickr -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">

<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
    <link href="https://unicons.iconscout.com/release/v4.0.0/css/line.css" rel="stylesheet">
    <!-- ملفات CSS الخاصة -->
    <link href="{{ asset('assets/css/style.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('assets/css/app.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/icons.min.css') }}">
    <link rel="stylesheet" href="{{ asset('Design/css/data.css') }}">
    @yield('css')

    <!-- CSS بناءً على اللغة -->
 <!-- CSS بناءً على اللغة -->
@if (App::getLocale() == 'ar')
<link href="{{ asset('assets/css/rtl.css') }}" rel="stylesheet">
@elseif (App::getLocale() == 'en')
<link href="{{ asset('assets/css/ltr.css') }}" rel="stylesheet">
@elseif (App::getLocale() == 'ur')
<link href="{{ asset('assets/css/ltr.css') }}" rel="stylesheet">
@else
<link href="{{ asset('assets/css/ltr.css') }}" rel="stylesheet">
@endif

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

                        @default
                    @endswitch
                @endif
            </div>
        </div>
    </div>

    <!-- إضافة مكتبات JavaScript -->
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.2/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>

    <script src="https://maps.googleapis.com/maps/api/js?key=YOUR_API_KEY&callback=initMap" async defer></script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>




    <!-- ملفات JavaScript الخاصة -->
    <script src="{{ asset('assets/js/vendor.min.js') }}"></script>
    <script src="{{ asset('assets/js/app.min.js') }}"></script>
    <script src="{{ asset('assets/js/scriptt.js') }}"></script>
    <script src="{{ asset('assets/js/vendor/chart.min.js') }}"></script>
    <script src="{{ asset('assets/js/pages/demo.dashboard-projects.js') }}"></script>
    <script src="{{ asset('js/date.js') }}"></script>


</body>
</html>
