<!DOCTYPE html>
<html lang="ar">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>لوحة التحكم</title>
    <!-- روابط التنسيقات -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="{{ asset('assets/css/icons.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/css/app.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/css/style.css') }}" rel="stylesheet">
</head>
<body>

    @include('layouts.navbar')
    <div class="container-fluid">
        @include('layouts.main-sider')
        <div class="row">
            <div class="col-md-2">

            </div>
            <div class="col-md-10">
                @yield('content')
            </div>
        </div>
    </div>

    <!-- سكربتات الجافا سكربت -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="{{ asset('assets/js/vendor.min.js') }}"></script>
    <script src="{{ asset('assets/js/app.min.js') }}"></script>
    <script src="{{ asset('assets/js/vendor/chart.min.js') }}"></script>
    <script src="{{ asset('assets/js/pages/demo.dashboard-projects.js') }}"></script>
</body>
</html>
