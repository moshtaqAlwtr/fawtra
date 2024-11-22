<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>مشاهدة العميل</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f4f6f9;
            color: #333;
            font-family: Arial, sans-serif;
        }

        /* Navbar with gradient */
        .navbar {
            background: linear-gradient(45deg, #007bff, #0056b3);
            color: white;
            padding: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        .navbar a, .navbar .navbar-brand {
            color: white !important;
            font-weight: bold;
            font-size: 18px;
        }

        .header-info {
            background: linear-gradient(135deg, #e3eaf0, #cfd9df);
            padding: 15px;
            border-radius: 8px;
            margin-bottom: 20px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }

        .header-info h4 {
            font-weight: bold;
            color: #0056b3;
        }

        .tabs-container {
            background-color: #ffffff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        /* Tabs with gradient borders */
        .nav-tabs .nav-link.active {
            background-color: #f0f8ff;
            color: #0056b3;
            border-color: #f0f8ff #f0f8ff #ffffff;
        }

        .nav-tabs .nav-link {
            color: #555;
            font-weight: bold;
        }

        /* Info boxes with gradient background */
        .info-box {
            padding: 15px;
            border-radius: 8px;
            margin-bottom: 20px;
            background: linear-gradient(135deg, #f0f8ff, #dce9f3);
            box-shadow: 0 2px 6px rgba(0, 0, 0, 0.1);
        }

        .section-title {
            font-weight: bold;
            color: #0056b3;
            margin-bottom: 10px;
        }

        .table th, .table td {
            vertical-align: middle;
            text-align: center;
        }

        /* Gradient buttons */
        .btn-outline-secondary {
            color: #0056b3;
            border-color: #0056b3;
            transition: 0.3s;
        }

        .btn-outline-secondary:hover {
            background: linear-gradient(45deg, #0056b3, #007bff);
            color: white;
            border-color: transparent;
        }

        .dropdown-menu {
            background: linear-gradient(135deg, #f0f8ff, #dce9f3);
            border: none;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        .dropdown-item:hover {
            background: #cfe3ff;
        }
        * Gradient button styling */
        .btn-gradient {
            background: linear-gradient(45deg, #007bff, #0056b3);
            color: white;
            border: none;
            padding: 8px 15px;
            font-weight: bold;
            transition: transform 0.2s, box-shadow 0.2s;
        }
        .btn-gradient:hover {
            transform: scale(1.05);
            box-shadow: 0 4px 8px rgba(0, 123, 255, 0.4);
        }
    
        /* Secondary gradient button */
        .btn-gradient-secondary {
            background: linear-gradient(45deg, #17a2b8, #138496);
            color: white;
            border: none;
            padding: 8px 15px;
            font-weight: bold;
            transition: transform 0.2s, box-shadow 0.2s;
        }
        .btn-gradient-secondary:hover {
            transform: scale(1.05);
            box-shadow: 0 4px 8px rgba(23, 162, 184, 0.4);
        }
    
        /* Card shadow and style */
        .card {
            box-shadow: 0 6px 12px rgba(0, 0, 0, 0.15);
            border-radius: 10px;
        }
    
        /* Card body style */
        .card-body {
            background-color: #ffffff;
            border-radius: 0 0 10px 10px;
            color: #6c757d;
        }
    
        /* Icon style for the empty message */
        .text-primary {
            color: #007bff !important;
            opacity: 0.8;
        }
        .timeline-container {
            padding-left: 20px;
            border-left: 3px solid #007bff;
            margin-left: 20px;
        }
    
        .timeline-item {
            display: flex;
            align-items: flex-start;
            position: relative;
        }
    
        .icon-container {
            width: 40px;
            min-width: 40px;
            text-align: center;
            margin-top: 6px;
        }
    
        .timeline-content {
            flex: 1;
            margin-left: 15px;
        }
    
        .timeline-date {
            font-size: 14px;
            font-weight: bold;
        }
    
        .text-success { color: #28a745 !important; }
        .text-warning { color: #ffc107 !important; }
        .text-primary { color: #007bff !important; }
        .text-info { color: #17a2b8 !important; }

    </style>
</head>
<body>

<!-- Navbar -->
<nav class="navbar">
    <div class="navbar-brand">مشاهدة العميل</div>
    <div>
        <a href="#" class="me-3">الذهاب إلى الموقع</a>
        <a href="#">المساعدة</a>
    </div>
</nav>



    <!-- Client Information -->
    <div class="header-info">
        <h4>مؤسسة مها العتيبي - #123002</h4>
        <p class="mb-1"><span class="badge bg-danger">موقوف</span> <span>الرياض، أبها</span></p>
        <p><strong>الحساب المفتوح:</strong> 75.00 ريال</p>
        <p><strong>المبالغ المطلوبة:</strong> 75.00 ريال</p>
    </div>

    <!-- Navigation Tabs -->
    <div class="tabs-container">
        <div class="d-flex justify-content-between mb-3">
            <div>
                <button class="btn btn-outline-secondary">تعديل</button>
                <button class="btn btn-outline-secondary">إضافة ملاحظات/مرفق</button>
                <button class="btn btn-outline-secondary">كشف حساب</button>

                <!-- Dropdown Menu -->
                <div class="btn-group">
                    <button type="button" class="btn btn-outline-secondary dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                        خيارات أخرى
                    </button>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="#"><i class="fas fa-money-check-alt"></i> إضافة رصيد ائتماني</a></li>
                        <li><a class="dropdown-item" href="#"><i class="fas fa-sign-in-alt"></i> دخول كعميل</a></li>
                        <li><a class="dropdown-item" href="#"><i class="fas fa-ban"></i> إيقاف العميل</a></li>
                        <li><a class="dropdown-item" href="#"><i class="fas fa-user-slash"></i> حذف العميل</a></li>
                        <li><a class="dropdown-item" href="#"><i class="fas fa-user-edit"></i> تغيير إلى موظف</a></li>
                        <li><a class="dropdown-item" href="#"><i class="fas fa-copy"></i> نسخ</a></li>
                    </ul>
                </div>
            </div>
        </div>

        <!-- Tabs -->
        <!-- Tab Navigation -->
<ul class="nav nav-tabs" id="myTab" role="tablist">
    <li class="nav-item" role="presentation">
        <button class="nav-link active" id="details-tab" data-bs-toggle="tab" data-bs-target="#details" type="button" role="tab">التفاصيل</button>
    </li>
    <li class="nav-item" role="presentation">
        <button class="nav-link" id="activity-tab" data-bs-toggle="tab" data-bs-target="#activity" type="button" role="tab">الملاحضات /المرفقات  </button>
    </li>
    <li class="nav-item" role="presentation">
        <button class="nav-link" id="invoices-tab" data-bs-toggle="tab" data-bs-target="#invoices" type="button" role="tab">الفواتير (23)</button>
    </li>
    <li class="nav-item" role="presentation">
        <button class="nav-link" id="payments-tab" data-bs-toggle="tab" data-bs-target="#payments" type="button" role="tab">المدفوعات (25)</button>
    </li>
    <li class="nav-item" role="presentation">
        <button class="nav-link" id="account-tab" data-bs-toggle="tab" data-bs-target="#account" type="button" role="tab">حركة الحساب (59)</button>
    </li>
    <li class="nav-item" role="presentation">
        <button class="nav-link" id="messages-tab" data-bs-toggle="tab" data-bs-target="#messages" type="button" role="tab">الرسائل المرسلة (5)</button>
    </li>
    <li class="nav-item" role="presentation">
        <button class="nav-link" id="balance-tab" data-bs-toggle="tab" data-bs-target="#balance" type="button" role="tab">ملخص الرصيد</button>
    </li>
    <li class="nav-item" role="presentation">
        <button class="nav-link" id="membership-tab" data-bs-toggle="tab" data-bs-target="#membership" type="button" role="tab">العضوية</button>
    </li>
    <li class="nav-item" role="presentation">
        <button class="nav-link" id="timeline-tab" data-bs-toggle="tab" data-bs-target="#timeline" type="button" role="tab">الجدول الزمني</button>
    </li>
  
</ul>

<!-- Tab Content -->
<div class="tab-content mt-3" id="myTabContent">
    <!-- Details Tab Pane -->
    <div class="tab-pane fade show active" id="details" role="tabpanel" aria-labelledby="details-tab">
        
        <!-- Client Information Section -->
        <div class="info-box">
            <h5 class="section-title">معلومات العميل</h5>
            <div class="row mb-3">
                <div class="col"><p><strong>رقم الهوية الوطنية:</strong> 203456789</p></div>
                <div class="col"><p><strong>التصنيف:</strong> عميل فردي</p></div>
                <div class="col"><p><strong>رمز الدولة:</strong> SA</p></div>
                <div class="col"><p><strong>الرقم الضريبي:</strong> 301007876500003</p></div>
            </div>
        </div>

        <!-- Quick Information Section -->
        <div class="info-box">
            <h5 class="section-title">معلومات سريعة</h5>
            <div class="row mb-3">
                <div class="col"><p><strong>عدد الفواتير:</strong> 23 (عرض)</p></div>
                <div class="col"><p><strong>عدد الفواتير المسددة:</strong> 7 (عرض)</p></div>
                <div class="col"><p><strong>آخر الفواتير المنفذة:</strong> #20669 (54.00 ريال)</p></div>
                <div class="col"><p><strong>آخر عملية دفع:</strong> #003542 (75.00 ريال)</p></div>
            </div>
            <div class="row mb-3">
                <div class="col"><p><strong>آخر الإشعارات البريدية:</strong> 19/11/2023 02:50 PM</p></div>
            </div>
        </div>

        <!-- Account Summary Section -->
        <div class="info-box">
            <h5 class="section-title">ملخص الحساب</h5>
            <table class="table table-bordered mt-3">
                <thead class="table-light">
                    <tr>
                        <th>العملة</th>
                        <th>الإجمالي</th>
                        <th>مرجع</th>
                        <th>المبلغ المدفوع تحت تاريخة</th>
                        <th>أرصدة دائنة</th>
                        <th>المبلغ المستحق</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>SAR</td>
                        <td>2,617.00 ريال</td>
                        <td>844.00 ريال</td>
                        <td>-1,698.00 ريال</td>
                        <td>0.00 ريال</td>
                        <td>75.00 ريال</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
    <div class="tab-pane fade" id="activity" role="tabpanel">
        <h5 class="mt-4">سجل النشاطات</h5>
    
        <!-- Filter and Date Range -->
        <div class="d-flex justify-content-between align-items-center mb-3">
            <input type="text" class="form-control w-auto" placeholder="الفترة من / إلى">
            <button class="btn btn-outline-secondary"><i class="fas fa-sort"></i></button>
        </div>
    
        <!-- Timeline Container -->
        <div class="container">
            <!-- Timeline Item -->
            <div class="row g-0 position-relative mb-3">
                <!-- Date Label -->
                <div class="col-auto">
                    <span class="badge bg-primary text-white rounded-pill px-3 py-2">Mar 2023</span>
                </div>
                <!-- Vertical Line -->
                <div class="col-auto d-flex align-items-center">
                    <div class="vr bg-secondary mx-3" style="height: 100%;"></div>
                </div>
                <!-- Event Content -->
                <div class="col bg-light p-3 rounded">
                    <div class="d-flex justify-content-between align-items-center">
                        <span class="text-primary"><i class="fas fa-user"></i> محمد العتيبي</span>
                        <span class="text-muted"><i class="fas fa-clock"></i> 23:58 08/03/2023</span>
                    </div>
                    <p class="mt-2 mb-0 text-muted">تفاصيل النشاط ستظهر هنا...</p>
                </div>
            </div>
    
            <!-- Repeat the above structure for more timeline items -->
    
            <!-- Another Timeline Item Example -->
            <div class="row g-0 position-relative mb-3">
                <!-- Date Label -->
                <div class="col-auto">
                    <span class="badge bg-primary text-white rounded-pill px-3 py-2">Feb 2023</span>
                </div>
                <!-- Vertical Line -->
                <div class="col-auto d-flex align-items-center">
                    <div class="vr bg-secondary mx-3" style="height: 100%;"></div>
                </div>
                <!-- Event Content -->
                <div class="col bg-light p-3 rounded">
                    <div class="d-flex justify-content-between align-items-center">
                        <span class="text-primary"><i class="fas fa-user"></i> أحمد بن حبيب</span>
                        <span class="text-muted"><i class="fas fa-clock"></i> 15:10 07/02/2023</span>
                    </div>
                    <p class="mt-2 mb-0 text-muted">تم تعيين الموظف للمهمة.</p>
                </div>
            </div>
        </div>
    </div>
    

    <!-- Invoices Tab Pane -->
    <div class="tab-pane fade" id="invoices" role="tabpanel">
        <h5 class="mt-4">الفواتير</h5>
    
        <!-- فاتورة -->
        <div class="invoice-item border p-3 mb-3">
            <div class="d-flex justify-content-between align-items-center">
                <div class="d-flex align-items-center">
                    <div class="me-3">
                        <span class="fs-5 fw-bold">18.00 ر.س</span>
                        <span class="badge bg-success">مدفوعة</span>
                        <span class="badge bg-warning text-dark">تحت التسليم</span>
                    </div>
                </div>
                <div class="dropdown">
                    <button class="btn btn-light " type="button" id="invoiceOptions" data-bs-toggle="dropdown" aria-expanded="false">
                        <i class="fas fa-ellipsis-v"></i>
                    </button>
                    <ul class="dropdown-menu" aria-labelledby="invoiceOptions">
                        <li><a class="dropdown-item" href="#"><i class="fas fa-eye text-success"></i> عرض</a></li>
                        <li><a class="dropdown-item" href="#"><i class="fas fa-pen text-info"></i> تعديل</a></li>
                        <li><a class="dropdown-item" href="#"><i class="fas fa-file-pdf text-danger"></i> PDF</a></li>
                        <li><a class="dropdown-item" href="#"><i class="fas fa-print text-primary"></i> طباعة</a></li>
                        <li><a class="dropdown-item" href="#"><i class="fas fa-envelope text-info"></i> إرسال إلى العميل</a></li>
                        <li><a class="dropdown-item" href="#"><i class="fas fa-wallet text-purple"></i> إضافة عملية دفع</a></li>
                        <li><a class="dropdown-item" href="#"><i class="fas fa-trash-alt text-danger"></i> حذف</a></li>
                        <li><a class="dropdown-item" href="#"><i class="fas fa-copy text-secondary"></i> نسخ</a></li>
                    </ul>
                </div>
            </div>
            
            <!-- معلومات الفاتورة -->
            <div class="mt-3">
                <span class="d-block text-muted">01/11/2024 #08768</span>
                <span class="d-block">أعمال خاصة #1176</span>
                <span class="d-block text-muted">بواسطة: المستخدم الحالي</span>
                <span class="d-block text-muted">الرياض،</span>
                <span class="d-block text-muted">14:34:10 01/11/2024</span>
            </div>
        </div>
    
        <!-- تكرار العنصر للفاتورة الثانية -->
        <div class="invoice-item border p-3 mb-3">
            <div class="d-flex justify-content-between align-items-center">
                <div class="d-flex align-items-center">
                    <div class="me-3">
                        <span class="fs-5 fw-bold">18.00 ر.س</span>
                        <span class="badge bg-success">مدفوعة</span>
                    </div>
                </div>
                <div class="dropdown">
                    <button class="btn btn-light" type="button" id="invoiceOptions" data-bs-toggle="dropdown" aria-expanded="false">
                        <i class="fas fa-ellipsis-v"></i>
                    </button>
                    <ul class="dropdown-menu" aria-labelledby="invoiceOptions">
                        <li><a class="dropdown-item" href="#"><i class="fas fa-eye text-success"></i> عرض</a></li>
                        <li><a class="dropdown-item" href="#"><i class="fas fa-pen text-info"></i> تعديل</a></li>
                        <li><a class="dropdown-item" href="#"><i class="fas fa-file-pdf text-danger"></i> PDF</a></li>
                        <li><a class="dropdown-item" href="#"><i class="fas fa-print text-primary"></i> طباعة</a></li>
                        <li><a class="dropdown-item" href="#"><i class="fas fa-envelope text-info"></i> إرسال إلى العميل</a></li>
                        <li><a class="dropdown-item" href="#"><i class="fas fa-wallet text-purple"></i> إضافة عملية دفع</a></li>
                        <li><a class="dropdown-item" href="#"><i class="fas fa-trash-alt text-danger"></i> حذف</a></li>
                        <li><a class="dropdown-item" href="#"><i class="fas fa-copy text-secondary"></i> نسخ</a></li>
                    </ul>
                </div>
            </div>
            
            <!-- معلومات الفاتورة -->
            <div class="mt-3">
                <span class="d-block text-muted">01/11/2024 #08769</span>
                <span class="d-block">أعمال خاصة #1176</span>
                <span class="d-block text-muted">بواسطة: المستخدم الحالي</span>
                <span class="d-block text-muted">الرياض،</span>
                <span class="d-block text-muted">23:49:11 01/11/2024</span>
            </div>
        </div>
    </div>

    <div class="tab-pane fade" id="payments" role="tabpanel">
        <h5 class="mt-4">المدفوعات</h5>
    
        <!-- Example Payment Item -->
        <div class="invoice-item border p-3 mb-3 rounded shadow-sm">
            <div class="d-flex justify-content-between align-items-center">
                <!-- Payment Amount and Status -->
                <div class="d-flex align-items-center">
                    <div class="me-3">
                        <span class="fs-5 fw-bold text-dark">54.00 ر.س</span>
                        <span class="badge bg-success">مكتمل</span>
                    </div>
                </div>
                
                <!-- Options Dropdown -->
                <div class="dropdown">
                    <button class="btn btn-light" type="button" id="invoiceOptions" data-bs-toggle="dropdown" aria-expanded="false">
                        <i class="fas fa-ellipsis-v"></i>
                    </button>
                    <ul class="dropdown-menu" aria-labelledby="invoiceOptions">
                        <li><a class="dropdown-item" href="#"><i class="fas fa-eye text-success"></i> عرض</a></li>
                        <li><a class="dropdown-item" href="#"><i class="fas fa-pen text-info"></i> تعديل</a></li>
                        <li><a class="dropdown-item" href="#"><i class="fas fa-file-pdf text-danger"></i> PDF</a></li>
                        <li><a class="dropdown-item" href="#"><i class="fas fa-print text-primary"></i> طباعة</a></li>
                        <li><a class="dropdown-item" href="#"><i class="fas fa-envelope text-info"></i> إرسال إلى العميل</a></li>
                        <li><a class="dropdown-item" href="#"><i class="fas fa-wallet text-purple"></i> إضافة عملية دفع</a></li>
                        <li><a class="dropdown-item" href="#"><i class="fas fa-trash-alt text-danger"></i> حذف</a></li>
                        <li><a class="dropdown-item" href="#"><i class="fas fa-copy text-secondary"></i> نسخ</a></li>
                    </ul>
                </div>
            </div>
    
            <!-- Invoice Details -->
            <div class="mt-3">
                <span class="d-block text-muted">فاتورة #003542 - مؤسسة مها العتيبي - #123002</span>
                <span class="d-block">29/01/2023 - 02669</span>
                <span class="d-block text-muted">بواسطة: باسم القادسي</span>
            </div>
        </div>
    
        <!-- Repeat Payment Items as Needed -->
        <div class="invoice-item border p-3 mb-3 rounded shadow-sm">
            <div class="d-flex justify-content-between align-items-center">
                <div class="d-flex align-items-center">
                    <div class="me-3">
                        <span class="fs-5 fw-bold text-dark">126.00 ر.س</span>
                        <span class="badge bg-success">مكتمل</span>
                    </div>
                </div>
                <div class="dropdown">
                    <button class="btn btn-light" type="button" id="invoiceOptions" data-bs-toggle="dropdown" aria-expanded="false">
                        <i class="fas fa-ellipsis-v"></i>
                    </button>
                    <ul class="dropdown-menu" aria-labelledby="invoiceOptions">
                        <li><a class="dropdown-item" href="#"><i class="fas fa-eye text-success"></i> عرض</a></li>
                        <li><a class="dropdown-item" href="#"><i class="fas fa-pen text-info"></i> تعديل</a></li>
                        <li><a class="dropdown-item" href="#"><i class="fas fa-file-pdf text-danger"></i> PDF</a></li>
                        <li><a class="dropdown-item" href="#"><i class="fas fa-print text-primary"></i> طباعة</a></li>
                        <li><a class="dropdown-item" href="#"><i class="fas fa-envelope text-info"></i> إرسال إلى العميل</a></li>
                        <li><a class="dropdown-item" href="#"><i class="fas fa-wallet text-purple"></i> إضافة عملية دفع</a></li>
                        <li><a class="dropdown-item" href="#"><i class="fas fa-trash-alt text-danger"></i> حذف</a></li>
                        <li><a class="dropdown-item" href="#"><i class="fas fa-copy text-secondary"></i> نسخ</a></li>
                    </ul>
                </div>
            </div>
            <div class="mt-3">
                <span class="d-block text-muted">فاتورة #003326 - مؤسسة مها العتيبي - #123002</span>
                <span class="d-block">04/12/2022 - 02242</span>
                <span class="d-block text-muted">بواسطة: ياسر العولقي</span>
            </div>
        </div>
    </div>
    <div class="tab-pane fade" id="account" role="tabpanel">
        <h5 class="mt-4">حركة الحسابات</h5>
    
        <!-- Export and Print Options -->
        <div class="d-flex justify-content-between align-items-center mb-3">
            <div>
                <button class="btn btn-primary"><i class="fas fa-file-export"></i> خيارات التصدير</button>
                <button class="btn btn-primary"><i class="fas fa-print"></i> طباعة</button>
                <button class="btn btn-primary"><i class="fas fa-cog"></i> تخصيص</button>
            </div>
            <div>
                <span>الفترة من / إلى</span>
                <input type="text" class="form-control d-inline-block w-auto" placeholder="اختر التاريخ">
                <button class="btn btn-secondary ms-2"><i class="fas fa-eye"></i> عرض التفاصيل</button>
            </div>
        </div>
    
        <!-- Account Movement Table -->
        <div class="account-movement-table">
            <table class="table table-bordered table-striped text-center">
                <thead>
                    <tr>
                        <th>التاريخ</th>
                        <th>العملية</th>
                        <th>المبلغ</th>
                        <th>المبلغ المستحق</th>
                    </tr>
                </thead>
                <tbody>
                    <!-- Example Row 1 -->
                    <tr>
                        <td>02/09/2021</td>
                        <td>فاتورة #00828</td>
                        <td>SAR 156.00</td>
                        <td>ر.س 0.00</td>
                    </tr>
                    <!-- Example Row 2 -->
                    <tr>
                        <td>02/09/2021</td>
                        <td>عملية الدفع #001095 (Cash) لفاتورة #00828</td>
                        <td>SAR 156.00</td>
                        <td>ر.س 0.00</td>
                    </tr>
                    <!-- Additional Rows -->
                    <tr>
                        <td>28/12/2021</td>
                        <td>فاتورة مرتجعة #00044</td>
                        <td>SAR -15.00</td>
                        <td>ر.س 15.00</td>
                    </tr>
                    <tr>
                        <td>29/12/2021</td>
                        <td>فاتورة #00991</td>
                        <td>SAR 15.00</td>
                        <td>ر.س 15.00</td>
                    </tr>
                    <!-- Repeat rows as needed based on your data -->
                </tbody>
            </table>
        </div>
    </div>
    <div class="tab-pane fade" id="messages" role="tabpanel">
        <h5 class="mt-4">الرسائل المرسلة</h5>
    
        <!-- Card Container with Gradient Header -->
        <div class="card mt-3 shadow-lg border-0 rounded-4">
            <div class="card-header text-white" style="background: linear-gradient(45deg, #0056b3, #007bff);">
                <div class="d-flex justify-content-between align-items-center">
                    <span>آخر رسائل البريد المرسلة لـ مؤسسة مها العتيبي - #123002</span>
                    <button class="btn btn-light btn-sm shadow-sm"><i class="fas fa-sync-alt"></i> تحديث</button>
                </div>
            </div>
            <div class="card-body p-0">
                <!-- Sent Messages Table -->
                <table class="table table-hover text-center mb-0">
                    <thead>
                        <tr style="background: linear-gradient(135deg, #e9f3ff, #cfd9df); color: #0056b3;">
                            <th>العنوان</th>
                            <th>من</th>
                            <th>إلى</th>
                            <th>تاريخ الإرسال</th>
                            <th>فاتورة</th>
                            <th>الإجراءات</th>
                        </tr>
                    </thead>
                    <tbody>
                        <!-- Example Row 1 -->
                        <tr>
                            <td>بيانات دخولك</td>
                            <td>مؤسسة أعمال خاصة للتجارة</td>
                            <td>mohmmed05595@gmail.com</td>
                            <td>14:50 19/11/2023</td>
                            <td>Q4</td>
                            <td>
                                <button class="btn btn-primary btn-sm rounded-pill px-3 shadow-sm">
                                    <i class="fas fa-search"></i> عرض
                                </button>
                            </td>
                        </tr>
                        <!-- Example Row 2 -->
                        <tr>
                            <td>بيانات دخولك</td>
                            <td>مؤسسة أعمال خاصة للتجارة</td>
                            <td>yasrylaltrshy@gmail.com</td>
                            <td>07:41 22/05/2023</td>
                            <td>Q4</td>
                            <td>
                                <button class="btn btn-primary btn-sm rounded-pill px-3 shadow-sm">
                                    <i class="fas fa-search"></i> عرض
                                </button>
                            </td>
                        </tr>
                        <!-- Example Row 3 -->
                        <tr>
                            <td>بيانات دخولك</td>
                            <td>مؤسسة أعمال خاصة للتجارة</td>
                            <td>m.3med7@gmail.com</td>
                            <td>17:04 14/05/2023</td>
                            <td>Q4</td>
                            <td>
                                <button class="btn btn-primary btn-sm rounded-pill px-3 shadow-sm">
                                    <i class="fas fa-search"></i> عرض
                                </button>
                            </td>
                        </tr>
                        <!-- Example Row 4 -->
                        <tr>
                            <td>بيانات دخولك</td>
                            <td>مؤسسة أعمال خاصة للتجارة</td>
                            <td>mufiid.715176438@Gmail.com</td>
                            <td>11:54 20/10/2022</td>
                            <td>Q2</td>
                            <td>
                                <button class="btn btn-primary btn-sm rounded-pill px-3 shadow-sm">
                                    <i class="fas fa-search"></i> عرض
                                </button>
                            </td>
                        </tr>
                        <!-- Example Row 5 -->
                        <tr>
                            <td>بيانات دخولك</td>
                            <td>مؤسسة أعمال خاصة للتجارة</td>
                            <td>mufiid.715176438@gmail.com</td>
                            <td>23:21 08/08/2022</td>
                            <td>Q2</td>
                            <td>
                                <button class="btn btn-primary btn-sm rounded-pill px-3 shadow-sm">
                                    <i class="fas fa-search"></i> عرض
                                </button>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    
    <div class="tab-pane fade" id="balance" role="tabpanel">
        <h5 class="mt-4">ملخص الرصيد</h5>
    
        <!-- Balance Summary Card -->
        <div class="card mt-3 border-0 rounded-4 shadow-lg" style="background: linear-gradient(135deg, #f0f8ff, #e3eaf0);">
            <!-- Card Header with Action Buttons -->
            <div class="card-header d-flex justify-content-between align-items-center bg-transparent border-0">
                <div>
                    <button class="btn btn-gradient btn-sm me-2 shadow"><i class="fas fa-plus-circle"></i> أضف شحن الرصيد</button>
                    <button class="btn btn-gradient-secondary btn-sm shadow"><i class="fas fa-history"></i> عرض السجل</button>
                </div>
                <button class="btn btn-outline-light btn-sm shadow-sm"><i class="fas fa-sync-alt"></i></button>
            </div>
    
            <!-- Card Body with Message -->
            <div class="card-body d-flex flex-column align-items-center justify-content-center text-center bg-white" style="height: 200px; border-radius: 0 0 8px 8px;">
                <i class="fas fa-folder-open fs-1 text-primary mb-3" style="opacity: 0.7;"></i>
                <p class="text-muted fs-5">لا يوجد أنواع الرصيد أضيفت حتى الآن</p>
            </div>
        </div>
    </div>
    <div class="tab-pane fade" id="membership" role="tabpanel">
        <h5 class="mt-4"> العضوية</h5>
    
        <!-- Balance Summary Card -->
        <div class="card mt-3 border-0 rounded-4 shadow-lg" style="background: linear-gradient(135deg, #f0f8ff, #e3eaf0);">
            <!-- Card Header with Action Buttons -->
            <div class="card-header d-flex justify-content-between align-items-center bg-transparent border-0">
                <div>
                    <button class="btn btn-gradient btn-sm me-2 shadow"><i class="fas fa-plus-circle"></i> أضف عضوية جديدة</button>

                </div>
                <button class="btn btn-outline-light btn-sm shadow-sm"><i class="fas fa-sync-alt"></i></button>
            </div>
    
            <!-- Card Body with Message -->
            <div class="card-body d-flex flex-column align-items-center justify-content-center text-center bg-white" style="height: 200px; border-radius: 0 0 8px 8px;">
                <i class="fas fa-folder-open fs-1 text-primary mb-3" style="opacity: 0.7;"></i>
                <p class="text-muted fs-5">لا يوجد أنواع الرصيد أضيفت حتى الآن</p>
            </div>
        </div>
    </div>
    <div class="tab-pane fade" id="timeline" role="tabpanel">
        <h5 class="mt-4">سجل النشاطات</h5>
    
        <!-- Filter and View Options -->
        <div class="d-flex justify-content-between align-items-center mb-3">
            <div>
                <button class="btn btn-outline-secondary btn-sm"><i class="fas fa-th-large"></i></button>
                <button class="btn btn-outline-secondary btn-sm"><i class="fas fa-list"></i></button>
            </div>
            <div class="dropdown">
                <button class="btn btn-outline-secondary btn-sm dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                    كل الإدخالات
                </button>
                <ul class="dropdown-menu">
                    <li><a class="dropdown-item" href="#">الإدخالات الأخيرة</a></li>
                    <li><a class="dropdown-item" href="#">الأكثر أهمية</a></li>
                </ul>
            </div>
        </div>
    
        <!-- Timeline Container -->
        <div class="timeline-container">
            <!-- Timeline Item -->
            <div class="timeline-item d-flex align-items-start mb-4">
                <div class="icon-container">
                    <i class="fas fa-sticky-note fs-4 text-info"></i>
                </div>
                <div class="timeline-content bg-light p-3 rounded-3 shadow-sm">
                    <p>أضاف المستخدم المالي ملاحظة جديدة لحالة العميل: <strong>مؤسسة سامر محمد عبدالكريم الأسمر</strong> (4934).</p>
                    <p class="text-muted mb-0">
                        <span><i class="fas fa-map-marker-alt"></i> Main Branch</span> |
                        <span><i class="fas fa-user"></i> محمد القادسي</span> |
                        <span><i class="fas fa-clock"></i> 23:58:00</span> |
                        <span><i class="fas fa-calendar-alt"></i> 08/03/2023</span>
                    </p>
                </div>
                <div class="timeline-date ms-3 text-muted">
                    08 مارس 2023
                </div>
            </div>
    
            <!-- Repeat Timeline Items for each entry as needed -->
            <div class="timeline-item d-flex align-items-start mb-4">
                <div class="icon-container">
                    <i class="fas fa-user-slash fs-4 text-warning"></i>
                </div>
                <div class="timeline-content bg-light p-3 rounded-3 shadow-sm">
                    <p>حدث المستخدم المالي حالة العميل: <strong>مؤسسة سامر محمد عبدالكريم الأسمر</strong> إلى موقوف.</p>
                    <p class="text-muted mb-0">
                        <span><i class="fas fa-map-marker-alt"></i> Main Branch</span> |
                        <span><i class="fas fa-user"></i> محمد القادسي</span> |
                        <span><i class="fas fa-clock"></i> 16:51:21</span> |
                        <span><i class="fas fa-calendar-alt"></i> 06/03/2023</span>
                    </p>
                </div>
                <div class="timeline-date ms-3 text-muted">
                    06 مارس 2023
                </div>
            </div>
    
            <!-- Additional Example Timeline Item -->
            <div class="timeline-item d-flex align-items-start mb-4">
                <div class="icon-container">
                    <i class="fas fa-user-edit fs-4 text-primary"></i>
                </div>
                <div class="timeline-content bg-light p-3 rounded-3 shadow-sm">
                    <p>عين المستخدم المالي الموظف أحمد ابن حبيب لحالة العميل: <strong>مؤسسة سامر محمد عبدالكريم الأسمر</strong>.</p>
                    <p class="text-muted mb-0">
                        <span><i class="fas fa-map-marker-alt"></i> Main Branch</span> |
                        <span><i class="fas fa-user"></i> محمد القادسي</span> |
                        <span><i class="fas fa-clock"></i> 15:10:45</span> |
                        <span><i class="fas fa-calendar-alt"></i> 03/03/2023</span>
                    </p>
                </div>
                <div class="timeline-date ms-3 text-muted">
                    03 مارس 2023
                </div>
            </div>
    
            <!-- Repeat similar blocks for other events with appropriate icons and text -->
        </div>
    </div>
    
    <!-- Additional CSS for Timeline Styling -->

    
    <!-- Additional CSS for Improved Styling -->
    
    
    
    <!-- Other tab panes (Payments, Account Movement, Messages, etc.) should follow the same structure -->
</div>

        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>
