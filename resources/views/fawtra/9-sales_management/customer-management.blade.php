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
    <div class="container my-4">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <button class="btn btn-gradient" onclick="window.location.href='add_customer.html'">+ أضف العميل</button>
            <div class="header-actions">
                <button class="btn btn-outline-secondary"><i class="fas fa-upload"></i></button>
                <button class="btn btn-outline-secondary"><i class="fas fa-cog"></i></button>
            </div>
        </div>

        <!-- شريط الأدوات العلوي -->
        <div class="toolbar">
            <h5>بحث وتصفيه</h5>
            <div class="toolbar-actions">
                <span class="action" id="toggleVisibilityButton" onclick="toggleVisibility()"><i class="fas fa-eye-slash"></i> إخفاء</span>
                <span class="action" id="toggleButton" onclick="toggleForm()">متقدم</span>
                <i class="fas fa-sliders-h action"></i>
            </div>
        </div>

        <!-- نموذج البحث والتصفية -->
        <form class="table-card mb-4" id="fieldSection">
            <div class="d-flex flex-wrap justify-content-between align-items-center mb-4">
                <div class="col-md-3 p-0">
                    <label>إختر التصنيف</label>
                    <select class="form-control">
                        <option>إختر التصنيف</option>
                    </select>
                </div>
                <div class="col-md-3 p-0">
                    <label>إختر الحالة</label>
                    <select class="form-control">
                        <option>إختر الحالة</option>
                    </select>
                </div>
                <div class="col-md-3 p-0">
                    <label>الاسم</label>
                    <input type="text" class="form-control" placeholder="الاسم">
                </div>
                <div class="col-md-3 p-0">
                    <label>إختر العميل</label>
                    <select class="form-control">
                        <option>إختر العميل</option>
                    </select>
                </div>
            </div>

            <!-- قسم الحقول المتقدمة -->
            <div id="advancedFields" class="hidden">
                <div class="row">
                    <div class="col-md-3 mt-3">
                        <label>إختر البلد</label>
                        <select class="form-control">
                            <option>إختر البلد</option>
                        </select>
                    </div>
                    <div class="col-md-3 mt-3">
                        <label>العنوان</label>
                        <input type="text" class="form-control" placeholder="العنوان">
                    </div>
                    <div class="col-md-3 mt-3">
                        <label>تاريخ الإنشاء (من)</label>
                        <input type="date" class="form-control" id="deliveryStartDate">
                    </div>
                    <div class="col-md-3 mt-3">
                        <label>تاريخ الإنشاء (إلى)</label>
                        <input type="date" class="form-control" id="deliveryStartDate">
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-3 mt-3">
                        <label>اختر الموظفين المعينين</label>
                        <select class="form-control">
                            <option>اختر الموظفين</option>
                        </select>
                    </div>
                    <div class="col-md-3 mt-3">
                        <label>اختر الموظفين المعينين</label>
                        <select class="form-control">
                            <option>اختر الموظفين</option>
                        </select>
                    </div>
                    <div class="col-md-3 mt-3">
                        <label>إختر أضيفت بواسطة</label>
                        <select class="form-control">
                            <option>إختر أضيفت بواسطة</option>
                        </select>
                    </div>
                    <div class="col-md-3 mt-3">
                        <label>إختر وسم</label>
                        <select class="form-control">
                            <option>إختر وسم</option>
                        </select>
                    </div>
                </div>
            </div>

            <!-- زر البحث -->
            <div class="col-md-3 mt-3 d-flex align-items-end">
                <button type="submit" class="btn btn-gradient w-100">بحث</button>
            </div>
        </form>

        <!-- قسم الجدول -->
        <div class="table-responsive table-card">
            <table class="table table-hover">
                <thead>
                    <tr>

                        <th>الإجراء</th>
                        <th>ترتيب</th>
                        <th>الحالة</th>
                        <th>العنوان</th>
                        <th>البريد الإلكتروني</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>

                        <td style="position: relative;">
                            <div class="dropdown">
                                <button class="btn btn-sm btn-outline-primary " type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                    <i class="fas fa-ellipsis-v"></i>
                                </button>
                                <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                                    <li><a class="dropdown-item" href="#"><i class="fas fa-eye"></i> عرض</a></li>
                                    <li><a class="dropdown-item" href="#"><i class="fas fa-pencil-alt"></i> تعديل</a></li>
                                    <li><a class="dropdown-item" href="#"><i class="fas fa-copy"></i> نسخ</a></li>
                                    <li><a class="dropdown-item" href="#"><i class="fas fa-trash"></i> حذف</a></li>
                                    <li><a class="dropdown-item" href="#"><i class="fas fa-sign-in-alt"></i> الدخول به</a></li>
                                    <li><a class="dropdown-item" href="#"><i class="fas fa-calculator"></i> كشف حساب</a></li>
                                </ul>
                            </div>

                        </td>
                        <td>#101</td>
                        <td><span class="badge badge-status status-inactive">موقوف</span></td>
                        <td>أسواق محمد غيثان العامري</td>
                        <td>kj@yahyjoyo.com</td>
                    </tr>
                    <tr>

                        <td style="position: relative;">
                            <div class="dropdown">
                                <button class="btn btn-sm btn-outline-primary " type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                    <i class="fas fa-ellipsis-v"></i>
                                </button>
                                <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                                    <li><a class="dropdown-item" href="#"><i class="fas fa-eye"></i> عرض</a></li>
                                    <li><a class="dropdown-item" href="#"><i class="fas fa-pencil-alt"></i> تعديل</a></li>
                                    <li><a class="dropdown-item" href="#"><i class="fas fa-copy"></i> نسخ</a></li>
                                    <li><a class="dropdown-item" href="#"><i class="fas fa-trash"></i> حذف</a></li>
                                    <li><a class="dropdown-item" href="#"><i class="fas fa-sign-in-alt"></i> الدخول به</a></li>
                                    <li><a class="dropdown-item" href="#"><i class="fas fa-calculator"></i> كشف حساب</a></li>
                                </ul>
                            </div>

                        </td>
                        <td>#101</td>
                        <td><span class="badge badge-status status-inactive">موقوف</span></td>
                        <td>أسواق محمد غيثان العامري</td>
                        <td>kj@yahyjoyo.com</td>
                    </tr>
                    <tr>

                        <td style="position: relative;">
                            <div class="dropdown">
                                <button class="btn btn-sm btn-outline-primary " type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                    <i class="fas fa-ellipsis-v"></i>
                                </button>
                                <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                                    <li><a class="dropdown-item" href="#"><i class="fas fa-eye"></i> عرض</a></li>
                                    <li><a class="dropdown-item" href="#"><i class="fas fa-pencil-alt"></i> تعديل</a></li>
                                    <li><a class="dropdown-item" href="#"><i class="fas fa-copy"></i> نسخ</a></li>
                                    <li><a class="dropdown-item" href="#"><i class="fas fa-trash"></i> حذف</a></li>
                                    <li><a class="dropdown-item" href="#"><i class="fas fa-sign-in-alt"></i> الدخول به</a></li>
                                    <li><a class="dropdown-item" href="#"><i class="fas fa-calculator"></i> كشف حساب</a></li>
                                </ul>
                            </div>

                        </td>
                        <td>#101</td>
                        <td><span class="badge badge-status status-inactive">موقوف</span></td>
                        <td>أسواق محمد غيثان العامري</td>
                        <td>kj@yahyjoyo.com</td>
                    </tr>
                    <!-- المزيد من الصفوف هنا حسب الحاجة -->
                </tbody>
            </table>
        </div>
    </div>


    <script src="{{ asset('assets/js/vendor.min.js') }}"></script>
    <script src="{{ asset('assets/js/app.min.js') }}"></script>
    <script src="{{ asset('assets/js/scriptt.js') }}"></script>
    <script src="{{ asset('assets/js/vendor/chart.min.js') }}"></script>
    <script src="{{ asset('assets/js/pages/demo.dashboard-projects.js') }}"></script>
    <script src="{{ asset('Design/js/date.js') }}"></script>


