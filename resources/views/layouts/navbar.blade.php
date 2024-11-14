<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">

<nav class="admin-header navbar navbar-expand-lg navbar-light bg-light fixed-top">
    <div class="container-fluid">
        <!-- Sidebar Toggle Button -->
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarContent" aria-controls="navbarContent" aria-expanded="false" aria-label="Toggle navigation">
            <i class="fas fa-bars"></i>
        </button>

        <!-- Search Bar -->
        <div class="search-box d-flex align-items-center">
            <input type="text" class="form-control" placeholder="Search...">
            <button class="btn btn-search" type="button">Search</button>
        </div>
        <div class="d-flex flex-column align-items-start">
        </div>

        <div class="collapse navbar-collapse" id="navbarContent">
            <ul class="navbar-nav ml-auto d-flex align-items-center">
                <!-- Language Selection -->
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="languageDropdown" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="fas fa-globe"></i> Language
                    </a>
                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="languageDropdown">
                        @foreach(LaravelLocalization::getSupportedLocales() as $localeCode => $properties)
    <a class="dropdown-item" rel="alternate" hreflang="{{ $localeCode }}" href="{{ LaravelLocalization::getLocalizedURL($localeCode, null, [], true) }}">
        {{ $properties['native'] }} ({{ $localeCode }})
    </a>
@endforeach

                    </div>
                </li>

                <!-- Notifications -->
                <li class="nav-item">
                    <a class="nav-link" href="#">
                        <i class="fas fa-bell"></i>
                        <span class="badge badge-danger">5</span>
                    </a>
                </li>

                <!-- Settings & More -->
                <li class="nav-item">
                    <a class="nav-link" href="#"><i class="fas fa-th"></i></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#"><i class="fas fa-cog"></i></a>
                </li>

                <!-- User Profile -->
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle d-flex align-items-center" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <img src="{{ asset('assets/image/profile-avatar.jpg') }}" alt="avatar" class="rounded-circle" width="30">

            <span class="d-flex align-items-center fw-bold text-dark fs-5"> <!-- زيادة حجم الخط -->
                 <!-- تكبير الأيقونة -->
                {{ Auth::check() ? Auth::user()->name : 'Guest' }}
            </span>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right">
                        <a class="dropdown-item" href="#"><i class="fas fa-user"></i> Profile</a>
                        <a class="dropdown-item" href="#"><i class="fas fa-envelope"></i> Messages</a>
                        <a class="dropdown-item" href="#"><i class="fas fa-cog"></i> Settings</a>

                        <!-- زر تسجيل الخروج -->
                        <a class="dropdown-item" href="#" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                            <i class="fas fa-sign-out-alt"></i> Logout
                        </a>

                        <!-- نموذج تسجيل الخروج -->
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>
                    </div>
                </li>

            </ul>
        </div>

    </div>
</nav>

