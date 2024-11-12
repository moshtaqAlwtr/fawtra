<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">

<nav class="admin-header navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
    <div class="container-fluid">
        <!-- شعار الشركة -->
        <a class="navbar-brand d-flex align-items-center" href="index.html">
            <img src="{{ asset('assets/image/logo-dark.png') }}" alt="" class="brand-logo">
            <img src="{{ asset('assets/image/logo-icon-dark.png') }}" alt="" class="brand-logo-mini ml-2">
        </a>

        <!-- شريط البحث وزر توسيع الشريط -->
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ml-auto">
                <!-- البحث -->
                <li class="nav-item">
                    <div class="search-box">
                        <input type="text" class="form-control" placeholder="Search">
                        <button class="btn btn-search" type="button">
                            <i class="fas fa-search"></i>
                        </button>
                    </div>
                </li>

                <!-- اختيار اللغة -->
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="languageDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="fas fa-globe"></i> Language
                    </a>
                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="languageDropdown">
                        @foreach(LaravelLocalization::getSupportedLocales() as $localeCode => $properties)
                            <a class="dropdown-item" rel="alternate" hreflang="{{ $localeCode }}" href="{{ LaravelLocalization::getLocalizedURL($localeCode, null, [], true) }}">
                                {{ $properties['native'] }}
                            </a>
                        @endforeach
                    </div>
                </li>

                <!-- إشعارات -->
                <li class="nav-item dropdown">
                    <a class="nav-link" href="#" role="button" data-toggle="dropdown">
                        <i class="fas fa-bell"></i>
                        <span class="badge badge-danger">5</span>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right dropdown-notifications">
                        <a class="dropdown-item" href="#">New registered user</a>
                        <a class="dropdown-item" href="#">New invoice received</a>
                        <a class="dropdown-item" href="#">Server error report</a>
                        <a class="dropdown-item" href="#">Database report</a>
                        <a class="dropdown-item" href="#">Order confirmation</a>
                    </div>
                </li>

                <!-- الملف الشخصي -->
                <li class="nav-item dropdown">
                    <a class="nav-link" href="#" role="button" data-toggle="dropdown">
                        <img src="{{ asset('assets/image/profile-avatar.jpg') }}" alt="avatar" class="rounded-circle" width="30">
                    </a>
                    <div class="dropdown-menu dropdown-menu-right">
                        <a class="dropdown-item" href="#"><i class="fas fa-user"></i> Profile</a>
                        <a class="dropdown-item" href="#"><i class="fas fa-envelope"></i> Messages</a>
                        <a class="dropdown-item" href="#"><i class="fas fa-cog"></i> Settings</a>
                        <a class="dropdown-item" href="#"><i class="fas fa-sign-out-alt"></i> Logout</a>
                    </div>
                </li>
            </ul>
        </div>
    </div>
</nav>

</nav>
<style>
.navbar {
    background-color: #333333 !important; /* الخلفية السوداء */
    padding: 1rem;
    box-shadow: 0 2px 5px rgba(0, 0, 0, 0.2);
}

.navbar-brand img {
    max-height: 40px; /* حجم شعار العلامة */
}

.search-box {
    position: relative;
}

.search-box .form-control {
    background-color: #333;
    color: #ffffff;
    border: none;
    padding-right: 35px;
}

.search-box .btn-search {
    position: absolute;
    right: 5px;
    top: 50%;
    transform: translateY(-50%);
    background: none;
    border: none;
    color: #ffffff;
}

.navbar-nav .nav-link {
    color: #ffffff !important; /* لون النص */
    font-weight: 500;
    transition: color 0.3s;
}

.navbar-nav .nav-link:hover {
    color: #007bff !important; /* لون عند التمرير */
}

.navbar-nav .dropdown-menu {
    background-color: #333333; /* خلفية القوائم المنسدلة */
    border: none;
}

.dropdown-menu .dropdown-item {
    color: #ffffff;
}

.dropdown-menu .dropdown-item:hover {
    background-color: #007bff; /* لون عند التمرير */
    color: #ffffff;
}

.badge-danger {
    background-color: #ff4d4d;
    font-size: 10px;
}
</style>
