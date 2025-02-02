<!DOCTYPE html>
<html lang="ar">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>واجهة إدارة الموظفين</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Tajawal:wght@400;500;700&display=swap" rel="stylesheet">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../Design/css/data.css">
    <style>

        /* تصميم الأزرار بألوان متدرجة أنيقة */
        .btn-gradient {
            background: linear-gradient(to bottom right, #e0f7fa, #e6eeff);
            font-family: 'Tajawal', sans-serif;
            color: #fff;
            border: none;
            padding: 0.5em 1.5em;
            transition: background 0.3s, transform 0.2s;
            font-weight: bold;
        }
        .btn-gradient:hover {
            background: linear-gradient(to right, #42a5f5, #64b5f6);
            transform: scale(1.05);
        }

        /* تصميم بطاقة الجدول */
        .table-card {
            background-color: #f5f5f5;
            border-radius: 8px;
            padding: 1.5em;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
            margin-bottom: 2em;
        }

        /* تصميم الشارات */
        .badge-status {
            padding: 0.4em 1.2em;
            font-size: 0.9em;
            border-radius: 15px;
            color: #fff;
            font-weight: bold;
        }
        .status-active {
            background-color: #43a047; /* أخضر */
        }
        .status-inactive {
            background-color: #e53935; /* أحمر */
        }

        /* تنسيقات شريط الأدوات */
        .toolbar {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 0.7em 1em;
            background-color: #e3f2fd;
            border-radius: 8px;
            margin-bottom: 1.5em;
            box-shadow: 0 3px 6px rgba(0, 0, 0, 0.08);
        }
        .toolbar h5 {
            margin: 0;
            color: #1e88e5;
        }
        .toolbar .toolbar-actions {
            display: flex;
            align-items: center;
            gap: 15px;
        }
        .toolbar .toolbar-actions .action {
            color: #1e88e5;
            font-size: 1rem;
            cursor: pointer;
            transition: color 0.2s;
        }
        .toolbar .toolbar-actions .action:hover {
            color: #1565c0;
        }

        /* تنسيقات عامة */
        body {
            text-align: right;
            direction: rtl;
            font-family: 'Arial', sans-serif;
            background-color: #fafafa;
        }

        /* تصميم حقول الإدخال */
        .form-control {
            border-radius: 4px;
            border: 1px solid #ddd;
            padding: 0.6em 1em;
            transition: box-shadow 0.3s;
        }
        .form-control:focus {
            box-shadow: 0 0 8px rgba(66, 165, 245, 0.5);
            border-color: #42a5f5;
        }

        /* تنسيق زر البحث */
        .btn-gradient {
            background: linear-gradient(to right, #42a5f5, #64b5f6);
            color: #fff;
            border: none;
            transition: background 0.3s;
        }
        .btn-gradient:hover {
            background: linear-gradient(to right, #64b5f6, #42a5f5);
        }

        /* إخفاء العناصر المتقدمة */
        .hidden {
            display: none !important;
        }
        .dropdown-menu {
    position: absolute;
    top: 100%; /* لتظهر تحت الزر */
    left: 0;
    z-index: 1050;
}

        .dropdown-item i {
            margin-left: 8px;
        }
        .dropdown-item .fa-eye {
            color: #4CAF50; /* لون أخضر للعرض */
        }
        .dropdown-item .fa-pencil-alt {
            color: #2196F3; /* لون أزرق للتعديل */
        }
        .dropdown-item .fa-copy {
            color: #00BCD4; /* لون سماوي للنسخ */
        }
        .dropdown-item .fa-trash {
            color: #f44336; /* لون أحمر للحذف */
        }
        .dropdown-item .fa-sign-in-alt {
            color: #FF9800; /* لون برتقالي للدخول */
        }
        .dropdown-item .fa-calculator {
            color: #3F51B5; /* لون أزرق داكن لكشف الحساب */
        }
    </style>
</head>
<body class="bg-light text-right">

        <div class="d-flex justify-content-between align-items-center mb-4">
            <div class="dropdown">
                <button class="btn btn-success dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                    <i class="fas fa-plus me-1"></i> إضافة جديدة
                </button>
                <ul class="dropdown-menu">
                    <li><a class="dropdown-item" href="add_user_employ.html">مستخدم</a></li>
                    <li><a class="dropdown-item" href="{{ route('add_employee') }}">موظف</a></li>
                </ul>
            </div>
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


        <!-- نموذج البحث والتصفية -->
        <form class="card p-4 shadow-sm border-0 mb-4" id="fieldSection">


            <!-- حقول البحث الأساسية -->
            <div class="row mb-4">
                <div class="col-md-3">
                    <select class="form-select bg-light border-0 shadow-sm">
                        <option>البحث ب اسم الموظف أو الرقم الوظيفي</option>
                    </select>
                </div>
                <div class="col-md-3">
                    <select class="form-select bg-light border-0 shadow-sm">
                        <option>اختر الحالة</option>
                    </select>
                </div>
                <div class="col-md-3">
                    <select class="form-select bg-light border-0 shadow-sm">
                        <option>اختر النوع</option>
                    </select>
                </div>
                <div class="col-md-3">
                    <select class="form-select bg-light border-0 shadow-sm">
                        <option>اختر الدور الوظيفي</option>
                    </select>
                </div>
            </div>

            <!-- قسم الحقول المتقدمة -->
            <div id="advancedFields" class="hidden">
                <h6 class="text-muted mb-3">الحقول المتقدمة</h6>
                <div class="row mb-3">
                    <div class="col-md-3">
                        <select class="form-select bg-light border-0 shadow-sm">
                            <option>اختر نوع الوظيفة</option>
                        </select>
                    </div>
                    <div class="col-md-3">
                        <select class="form-select bg-light border-0 shadow-sm">
                            <option>اختر المستوى الوظيفي</option>
                        </select>
                    </div>
                    <div class="col-md-3">
                        <select class="form-select bg-light border-0 shadow-sm">
                            <option>اختر القسم</option>
                        </select>
                    </div>
                    <div class="col-md-3">
                        <select class="form-select bg-light border-0 shadow-sm">
                            <option>البحث ب اسم المدير أو الرقم الوظيفي</option>
                        </select>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-3">
                        <select class="form-select bg-light border-0 shadow-sm">
                            <option>اختر المسمى الوظيفي</option>
                        </select>
                    </div>
                    <div class="col-md-3">
                        <select class="form-select bg-light border-0 shadow-sm">
                            <option>اختر قيد الحضور</option>
                        </select>
                    </div>
                    <div class="col-md-3">
                        <select class="form-select bg-light border-0 shadow-sm">
                            <option>اختر حالة المواطنة</option>
                        </select>
                    </div>
                    <div class="col-md-3">
                        <select class="form-select bg-light border-0 shadow-sm">
                            <option>اختر الجنسية</option>
                        </select>
                    </div>
                    <div class="col-md-3 mt-3">
                        <input type="date" class="form-control bg-light border-0 shadow-sm" id="deliveryEndDate" placeholder="تاريخ انتهاء الإقامة (من)">
                    </div>
                    <div class="col-md-3 mt-3">
                        <input type="date" class="form-control bg-light border-0 shadow-sm" id="deliveryEndDate" placeholder="تاريخ انتهاء الإقامة (إلى)">
                    </div>
                </div>
            </div>

            <!-- زر البحث -->
            <div class="row mt-4">
                <div class="col-md-3 mx-auto">
                    <button type="submit" class="btn btn-primary btn-md w-100 shadow-sm rounded-pill bg-gradient text-white">بحث</button>
                </div>
            </div>

        </form>



        <!-- قسم الجدول -->



        <div class="table-responsive">
            <table class="table table-hover align-middle shadow-lg rounded">
                <thead class="bg-primary text-white bg-gradient">
                    <tr>
                        <th>الاسم</th>
                        <th>الدور الوظيفي</th>
                        <th>المسمى الوظيفي</th>
                        <th>قسم</th>
                        <th>فرع</th>
                        <th>الحالة</th>
                        <th>ترتيب</th>
                    </tr>
                </thead>
                <tbody>
                    <tr class="bg-light">
                        <td>محمد المنصوب</td>
                        <td>Manager</td>
                        <td>-</td>
                        <td>-</td>
                        <td>Main Branch</td>
                        <td><span class="badge bg-success bg-gradient rounded-pill">نشط</span></td>
                        <td>
                            <div class="dropdown position-static">
                                <button class="btn btn-sm btn-outline-primary shadow-sm" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                    <i class="fas fa-ellipsis-v"></i>
                                </button>
                                <ul class="dropdown-menu dropdown-menu-end shadow" style="position: absolute;">
                                    <li><a class="dropdown-item" href="#"><i class="fas fa-eye me-2"></i>عرض</a></li>
                                    <li><a class="dropdown-item" href="#"><i class="fas fa-pencil-alt me-2"></i>تعديل</a></li>
                                    <li><a class="dropdown-item" href="#"><i class="fas fa-copy me-2"></i>نسخ</a></li>
                                    <li><a class="dropdown-item" href="#"><i class="fas fa-trash me-2"></i>حذف</a></li>
                                    <li><a class="dropdown-item" href="#"><i class="fas fa-sign-in-alt me-2"></i>الدخول به</a></li>
                                    <li><a class="dropdown-item" href="#"><i class="fas fa-calculator me-2"></i>كشف حساب</a></li>
                                </ul>
                            </div>
                        </td>
                    </tr>
                    <tr class="bg-light">
                        <td>محمد الدريس</td>
                        <td>Staff</td>
                        <td>-</td>
                        <td>-</td>
                        <td>Main Branch</td>
                        <td><span class="badge bg-secondary bg-gradient rounded-pill">غير نشط</span></td>
                        <td>
                            <div class="dropdown position-static">
                                <button class="btn btn-sm btn-outline-primary shadow-sm" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                    <i class="fas fa-ellipsis-v"></i>
                                </button>
                                <ul class="dropdown-menu dropdown-menu-end shadow" style="position: absolute;">
                                    <li><a class="dropdown-item" href="#"><i class="fas fa-eye me-2"></i>عرض</a></li>
                                    <li><a class="dropdown-item" href="#"><i class="fas fa-pencil-alt me-2"></i>تعديل</a></li>
                                    <li><a class="dropdown-item" href="#"><i class="fas fa-copy me-2"></i>نسخ</a></li>
                                    <li><a class="dropdown-item" href="#"><i class="fas fa-trash me-2"></i>حذف</a></li>
                                    <li><a class="dropdown-item" href="#"><i class="fas fa-sign-in-alt me-2"></i>الدخول به</a></li>
                                    <li><a class="dropdown-item" href="#"><i class="fas fa-calculator me-2"></i>كشف حساب</a></li>
                                </ul>
                            </div>
                        </td>
                    </tr>
                    <!-- يمكنك تكرار المزيد من الصفوف حسب الحاجة -->
                </tbody>
            </table>
        </div>





    </div>


    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js"></script>

<script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
    <script src="../js/date.js" ></script>
    <script>
        function toggleForm() {
            const advancedFields = document.getElementById("advancedFields");
            const toggleButton = document.getElementById("toggleButton");

            advancedFields.classList.toggle("hidden");

            if (advancedFields.classList.contains("hidden")) {
                toggleButton.textContent = "متقدم";
            } else {
                toggleButton.textContent = "بحث بسيط";
            }
        }
        function toggleVisibility() {
            const fieldSection = document.getElementById("fieldSection");
            const toggleVisibilityButton = document.getElementById("toggleVisibilityButton");

            fieldSection.classList.toggle("hidden");

            if (fieldSection.classList.contains("hidden")) {
                toggleVisibilityButton.innerHTML = '<i class="fas fa-eye"></i> عرض';
            } else {
                toggleVisibilityButton.innerHTML = '<i class="fas fa-eye-slash"></i> إخفاء';
            }
        }

    </script>
</body>
</html>
