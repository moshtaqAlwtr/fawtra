<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>بحث المنتجات</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        /* إعدادات عامة للصفحة */
        body {
            font-family: 'Tahoma', sans-serif;
            background-color: #f4f6f9;
            direction: rtl;
            margin: 0;
        }

        /* تنسيقات العنوان */
        .header {
            background-color: #007bff;
            color: white;
            padding: 15px;
            display: flex;
            justify-content: flex-start;
            align-items: center;
            gap: 10px;
        }

        /* تنسيقات عناصر التحكم */
        .controls {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 20px;
        }

        .left-buttons {
            display: flex;
            gap: 10px;
        }

        .controls button {
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            color: white;
        }

        /* ألوان الأزرار */
        .controls .import-button {
            background-color: #6c757d;
        }

        .controls .groups-button {
            background-color: #007bff;
        }

        .controls .new-product-button {
            background-color: #28a745;
        }

        /* تنسيق قائمة الخيارات */
        .dropdown-menu {
            text-align: right;
        }

        /* تنسيقات حاوية البحث */
        .search-container {
            padding: 20px;
            background-color: #e9ecef;
            border-radius: 5px;
            margin-bottom: 20px;
        }

        .search-fields {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 10px;
            margin-bottom: 10px;
        }

        .advanced-search {
            display: none;
            padding: 10px;
            background-color: #f1f1f1;
            border-radius: 8px;
            margin-top: 10px;
        }

        .advanced-search.active {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 10px;
        }

        /* تنسيقات الأزرار في البحث */
        .action-buttons {
            display: flex;
            gap: 10px;
            margin-top: 10px;
        }

        .action-buttons button {
            padding: 8px 15px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            color: white;
        }

        .btn-search {
            background-color: #007bff;
        }

        .btn-reset {
            background-color: #6c757d;
        }

        .btn-advanced {
            background-color: #ffc107;
        }

        /* تنسيقات حاوية الجدول */
        .table-container {
            background-color: #ffffff;
            border-radius: 8px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
            padding: 20px;
            margin-top: 20px;
            width: 80%;
            margin-left: auto;
            margin-right: auto;
        }

        /* تنسيقات الجدول داخل الكونتينر */
        .table-products {
            width: 100%;
            background-color: #fff;
            border-radius: 8px;
            overflow: hidden;
        }

        .table-products thead {
            background-color: #007bff;
            color: white;
        }

        .table-products th, .table-products td {
            text-align: center;
            vertical-align: middle;
            padding: 12px;
        }

        .table-products th {
            font-weight: bold;
        }

        /* تأثير عند تمرير الماوس على الصفوف */
        .table-products tbody tr {
            transition: background-color 0.3s;
        }

        .table-products tbody tr:hover {
            background-color: #f4f6f9;
        }

        /* تسميات الحالة */
        .table-products .status-label {
            padding: 5px 10px;
            border-radius: 15px;
            color: white;
            font-size: 0.9em;
        }

        .table-products .status-out-of-stock {
            background-color: #dc3545;
        }

        .table-products .status-in-stock {
            background-color: #28a745;
        }
    </style>
</head>
<body>

    <!-- بداية الكونتينر -->

        <!-- الهيدر -->
        <div class="header">
            <h1>المنتجات</h1>
        </div>

        <!-- عناصر التحكم في الصفحة -->
        <div class="controls">
            <!-- الأزرار في اليسار -->
            <div class="left-buttons">
                <button class="import-button" onclick="window.location.href='import_products.html';">استيراد</button>
                <button class="groups-button" onclick="window.location.href='items-list.html';">مجموعات البنود</button>
                <button class="new-product-button" onclick="window.location.href='{{ route('products.index') }}';">منتج جديد</button>
            </div>
            <!-- زر الإجراءات في اليمين -->
            <div class="btn-group">
                <button type="button" class="btn btn-secondary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    الإجراءات
                </button>
                <div class="dropdown-menu">
                    <a class="dropdown-item" href="#">حذف</a>
                    <a class="dropdown-item" href="#">طباعة PDF</a>
                </div>
            </div>
        </div>

        <!-- كونتر البحث -->
        <div class="search-container">
            <!-- الحقول الأساسية للبحث -->
            <div class="search-fields">
                <div class="form-group">
                    <label for="keyword">البحث بكلمة مفتاحية</label>
                    <input type="text" id="keyword" class="form-control" placeholder="أدخل الاسم أو الكود">
                </div>
                <div class="form-group">
                    <label for="category">التصنيف</label>
                    <select id="category" class="form-control">
                        <option>جميع التصنيفات</option>
                        <option>تصنيف 1</option>
                        <option>تصنيف 2</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="brand">الماركة</label>
                    <select id="brand" class="form-control">
                        <option>جميع الماركات</option>
                        <option>ماركة 1</option>
                        <option>ماركة 2</option>
                    </select>
                </div>
            </div>

            <!-- البحث المتقدم -->
            <div class="advanced-search" id="advanced-search">
                <div class="form-group">
                    <label for="product-code">كود المنتج</label>
                    <input type="text" id="product-code" class="form-control" placeholder="أدخل كود المنتج">
                </div>
                <div class="form-group">
                    <label for="tracking-type">نوع التتبع</label>
                    <select id="tracking-type" class="form-control">
                        <option>جميع أنواع التتبع</option>
                        <option>رقم التسلسل</option>
                        <option>رقم الشحنة</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="status">الحالة</label>
                    <select id="status" class="form-control">
                        <option>الكل</option>
                        <option>نشط</option>
                        <option>غير نشط</option>
                    </select>
                </div>
            </div>

            <!-- أزرار الإجراء -->
            <div class="action-buttons">
                <button class="btn-search" onclick="search()">بحث</button>
                <button class="btn-reset" onclick="resetFilters()">إلغاء الفلتر</button>
                <button class="btn-advanced" onclick="toggleAdvancedSearch()">بحث متقدم</button>
            </div>
        </div>

    </div>

    <!-- جدول المنتجات -->
    <div class="table-container" style="width: 82%; margin: 0 auto;">
        <div class="table-responsive">
            <table class="table table-hover table-products">
                <thead>
                    <tr>
                        <th>التحكم</th>
                        <th>المنتج</th>
                        <th>السعر</th>
                        <th>الحالة</th>
                        <th>المتاح</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>
                            <div class="dropdown">
                                <button class="btn btn-light btn-sm dropdown-toggle" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <i class="fas fa-ellipsis-v"></i>
                                </button>
                                <div class="dropdown-menu">
                                    <a class="dropdown-item" href="#">
                                        <i class="fas fa-eye text-primary"></i> عرض
                                    </a>
                                    <a class="dropdown-item" href="#">
                                        <i class="fas fa-edit text-warning"></i> تعديل
                                    </a>
                                    <a class="dropdown-item" href="#">
                                        <i class="fas fa-trash-alt text-danger"></i> حذف
                                    </a>
                                </div>

                        </td>
                        <td>هدية</td>
                        <td>0.00 ر.س</td>
                        <td><span class="status-label status-out-of-stock">مخزون نفذ</span></td>
                        <td>0 متاح</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>

    <!-- مكتبات JavaScript الخاصة بـ Bootstrap -->
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.1/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script>
        function toggleAdvancedSearch() {
            const advancedSearch = document.getElementById('advanced-search');
            advancedSearch.classList.toggle('active');
        }

        function search() {
            alert('تنفيذ عملية البحث...');
        }

        function resetFilters() {
            alert('إعادة تعيين الفلاتر...');
        }
    </script>
</body>
</html>
