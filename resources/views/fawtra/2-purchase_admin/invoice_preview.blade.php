<!DOCTYPE html>
<html lang="ar" dir="rtl">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>عرض الفاتورة</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
    <style>
        /* شريط علوي */
        .top-bar {
            background: linear-gradient(90deg, #0048BA, #0073E6);
            color: white;
            padding: 10px 0;
            text-align: center;
            font-size: 18px;
            font-weight: bold;
        }

        /* تبويبات علوية */
        .top-tabs .btn {
            background-color: transparent;
            border: none;
            color: black;
            margin-right: 20px;
            font-size: 14px;
        }

        .top-tabs .btn:hover {
            background-color: #dcdcdc;
            color: black;
        }

        .nav-tabs .nav-link {
            color: black;
        }

        .nav-tabs .nav-link:hover {
            color: black;
            background-color: #f1f1f1;
        }

        .nav-tabs .nav-link.active {
            background-color: #007bff;
            color: white;
        }
    </style>
</head>

<body>
    <!-- الشريط العلوي -->
    <div class="top-bar">عرض الفاتورة</div>
    <div class="container mt-3">
    <div class="row bg-light py-2 px-3 rounded shadow-sm">
        <div class="col-md-6">
            <div class="d-flex align-items-center">
                <h5 class="mb-0 me-2">الفاتورة #08938</h5>
                <span class="badge bg-danger">غير مدفوعة</span>
                <span class="badge bg-warning ms-2 text-dark">تحت المراجعة</span>
            </div>
            <p class="text-muted mb-0 mt-1">المستلم: شركة ناشي التجارية</p>
        </div>
        <div class="col-md-6 d-flex justify-content-end align-items-center">
            <p class="text-muted mb-0 me-auto">48209# عدد: غير</p>
            <!-- إضافة الزرين -->
            <div class="mt-2 d-flex justify-content-end">
    <button class="btn btn-success me-2" onclick="window.location.href='{{route('add_payment_process')}}'"><i class="fas fa-plus"  ></i> أضف عملية دفع</button>
    <button class="btn btn-primary" ><i class="fas fa-print"></i> طباعة الفاتورة</button>
</div>

        </div>
    </div>
</div>

    
        
    </div>
    
    

    <!-- محتوى الصفحة داخل كونتينر -->
   
        <!-- Top Tabs -->
        <div class="top-tabs d-flex justify-content-between align-items-center mb-3">
            <!-- القوائم المنسدلة -->
            <div class="d-flex align-items-center gap-2">
                <button class="btn"><i class="fas fa-edit"></i> تعديل</button>
                <button class="btn"><i class="fas fa-print"></i> طباعة</button>
                <button class="btn"><i class="fas fa-file-pdf"></i> PDF</button>
                <button class="btn"><i class="fas fa-plus"></i> إضافة عملية دفع</button>

                <!-- قسائم -->
                <div class="dropdown">
                    <button class="btn btn-light dropdown-toggle" type="button" id="vouchersDropdown" data-bs-toggle="dropdown" aria-expanded="false">
                        قسائم
                    </button>
                    <ul class="dropdown-menu" aria-labelledby="vouchersDropdown">
                        <li><a class="dropdown-item" href="#">ملصق الطرد</a></li>
                        <li><a class="dropdown-item" href="#">قائمة الاستلام</a></li>
                        <li><a class="dropdown-item" href="#">ملصق الشحن</a></li>
                        <li><a class="dropdown-item" href="#">فاتورة حرارية</a></li>
                    </ul>
                </div>

                <!-- مرتجع -->
                <div class="dropdown">
                    <button class="btn btn-light dropdown-toggle" type="button" id="returnsDropdown" data-bs-toggle="dropdown" aria-expanded="false">
                        مرتجع
                    </button>
                    <ul class="dropdown-menu" aria-labelledby="returnsDropdown">
                        <li><a class="dropdown-item" href="#"><i class="fa-solid fa-file-invoice"></i> إنشاء فاتورة مرتجعة</a></li>
                        <li><a class="dropdown-item" href="#"><i class="fa-solid fa-receipt"></i> إنشاء إشعار دائن</a></li>
                    </ul>
                </div>

                <button class="btn"><i class="fa-solid fa-sms"></i> أرسل SMS</button>
                <button class="btn"><i class="fab fa-whatsapp"></i> أرسل عن طريق WhatsApp</button>
            </div>

            <!-- خيارات أخرى -->
            <div class="dropdown">
                <button class="btn btn-light dropdown-toggle" type="button" id="otherOptionsDropdown" data-bs-toggle="dropdown" aria-expanded="false">
                    خيارات أخرى
                </button>
                <ul class="dropdown-menu" aria-labelledby="otherOptionsDropdown">
                    <li><a class="dropdown-item" href="#"><i class="fa-solid fa-book"></i> Assign Work Order</a></li>
                    <li><a class="dropdown-item" href="#"><i class="fa-solid fa-paperclip"></i> إضافة ملاحظة/مرفق</a></li>
                    <li><a class="dropdown-item" href="#"><i class="fa-solid fa-calendar"></i> ترتيب موعد</a></li>
                    <li><a class="dropdown-item" href="#"><i class="fa-solid fa-copy"></i> نسخ</a></li>
                    <li><a class="dropdown-item" href="#"><i class="fa-solid fa-trash"></i> حذف</a></li>
                </ul>
            </div>
        </div>

        <!-- Tabs -->
        <ul class="nav nav-tabs mb-3">
            <li class="nav-item">
                <button class="nav-link active" data-bs-toggle="tab" data-bs-target="#invoice">فاتورة</button>
            </li>
            <li class="nav-item">
                <button class="nav-link" data-bs-toggle="tab" data-bs-target="#details">التفاصيل</button>
            </li>
            <li class="nav-item">
                <button class="nav-link" data-bs-toggle="tab" data-bs-target="#warehouse">الأذون المخزنية</button>
            </li>
            <li class="nav-item">
                <button class="nav-link" data-bs-toggle="tab" data-bs-target="#activities">سجل النشاطات</button>
            </li>
            <li class="nav-item">
                <button class="nav-link" data-bs-toggle="tab" data-bs-target="#profits">ربح الفاتورة</button>
            </li>
        </ul>

        <!-- Tab Content -->
        <div class="tab-content">
            <!-- Invoice Tab -->
            <div class="tab-pane fade show active" id="invoice">
                <div class="card p-4">
                    <h5 class="text-center">فاتورة ضريبية مسجلة</h5>
                    <div class="row mb-3">
                        <div class="col-6">
                            <p><strong>رقم الفاتورة:</strong> 08938</p>
                            <p><strong>تاريخ الفاتورة:</strong> 21/11/2024</p>
                        </div>
                        <div class="col-6 text-end">
                            <p><strong>اسم العميل:</strong> مؤسسة أعمال خاصة للتجارة</p>
                            <p><strong>رقم السجل التجاري:</strong> 312135536000003</p>
                        </div>
                    </div>
                    <table class="table table-bordered text-center">
                        <thead>
                            <tr>
                                <th>البند</th>
                                <th>سعر الوحدة</th>
                                <th>الكمية</th>
                                <th>المجموع</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>عطر 50 ملي</td>
                                <td>18.00</td>
                                <td>15</td>
                                <td>270.00</td>
                            </tr>
                            <tr>
                                <td colspan="3" class="text-end">الإجمالي:</td>
                                <td>270.00</td>
                            </tr>
                            <tr>
                                <td colspan="3" class="text-end">الضريبة:</td>
                                <td>0.00</td>
                            </tr>
                            <tr>
                                <td colspan="3" class="text-end">المجموع المستحق:</td>
                                <td>270.00</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>

            <!-- Other Tabs -->
            <div class="tab-pane fade" id="details">
                <div class="card p-4">التفاصيل هنا.</div>
            </div>
            <div class="tab-pane fade" id="warehouse">
                <div class="card p-4">الأذون المخزنية هنا.</div>
            </div>
            <div class="tab-pane fade" id="activities">
                <div class="card p-4">سجل النشاطات هنا.</div>
            </div>
            <div class="tab-pane fade" id="profits">
                <div class="card p-4">ربح الفاتورة هنا.</div>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
