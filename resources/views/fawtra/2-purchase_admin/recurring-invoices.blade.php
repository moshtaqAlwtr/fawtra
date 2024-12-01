<!DOCTYPE html>
<html lang="ar">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>الفواتير الدورية</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
    <link rel="stylesheet" href="../Design/css/data.css">
    <style>
        body {
            direction: rtl;
            background-color: #e9eef3;
            text-align: right;
        }
        .navbar {
            background-color: #0078d7;
            color: white;
            padding: 10px;
        }
        .header {
            padding: 20px;
            background-color: #f8f9fa;
            border-bottom: 1px solid #ddd;
        }
        .content {
            padding: 20px;
        }
        .btn-new {
            background-color: #28a745;
            color: white;
        }
        .form-inline .form-group {
            margin-right: 15px;
        }
        .btn-advanced-search {
            margin-top: 10px;
        }
        .advanced-search {
            margin-top: 20px;
            background-color: #f8f9fa;
            padding: 15px;
            border: 1px solid #ddd;
            border-radius: 5px;
        }
        .alert-warning {
            color: #856404;
            background-color: #fff3cd;
            border-color: #ffeeba;
            text-align: center;
            padding: 10px;
            margin-top: 20px;
        }
        .container {
            margin-top: 20px;
        }
    </style>
</head>
<body>
    <div class="container">

    <!-- الشريط العلوي -->
    <div class="navbar d-flex justify-content-between">
        <div>
            <button class="btn btn-outline-light">الذهاب إلى الموقع</button>
            <button class="btn btn-outline-light">المساعدة</button>
        </div>
        <div>محمد العنزي - Main Branch</div>
    </div>

    <!-- عنوان الصفحة -->
    <div class="header d-flex justify-content-between align-items-center">
        <div>
            <h5>الفواتير الدورية</h5>
        </div>
        <div>
            <button class="btn btn-new" onclick="window.location.href='add-subscription.html';">اشتراك جديد +</button>
        </div>
    </div>

    <!-- المحتوى -->
    <div class="content">
        <form>
            <!-- الحقول الأساسية في سطر واحد -->
            <div class="form-row">
                <div class="form-group col-md-4">
                    <label for="subscriptionName">اسم الاشتراك</label>
                    <input type="text" class="form-control" id="subscriptionName" placeholder="أدخل اسم الاشتراك">
                </div>
                <div class="form-group col-md-4">
                    <label for="client">العميل</label>
                    <select id="client" class="form-control">
                        <option value="">أي عميل</option>
                        <!-- يمكن إضافة المزيد من العملاء هنا -->
                    </select>
                </div>
             
            <!-- بحث متقدم -->
           
        </form>
       

        <!-- رسالة عند عدم وجود نتائج -->
       

    </div>
    <div class="collapse" id="advancedSearchForm">
        <form>
            <div class="filter-section mt-3">
                <div class="form-row">
                    <div class="form-group col-md-2">
                        <label class="form-label">التاريخ</label>
                        <div class="input-group">
                            <select class="form-control" onchange="toggleCustomDate(this)">
                                <option value="custom">تخصيص</option>
                                <option value="last_month">الشهر الأخير</option>
                                <option value="last_year">السنة الماضية</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group col-md-3">
                        <label class="form-label">التسليم من وإلى</label>
                        <div class="input-group">
                            <input type="text" id="deliveryStartDate" class="form-control" placeholder="من">
                            <input type="text" id="deliveryEndDate" class="form-control" placeholder="إلى">
                        </div>
                    </div>
                    <div class="form-group col-md-3">
                        <label>الإجمالي أكبر من</label>
                        <input type="text" class="form-control">
                    </div>
                    <div class="form-group col-md-3">
                        <label>الإجمالي أقل من</label>
                        <input type="text" class="form-control">
                    </div>
                </div>

              
            </div>
        </form>
    </div>

    <!-- Main Action Buttons -->
    <div class="d-flex mt-3">
        <button class="btn btn-primary ml-2 mr-2">بحث</button>
        <button class="btn btn-secondary ml-2 mr-2">إلغاء الفلاتر</button>
        <button class="btn btn-outline-secondary ml-2 mr-2" data-toggle="collapse" data-target="#advancedSearchForm" aria-expanded="false" aria-controls="advancedSearchForm">
            <i class="fas fa-sliders-h"></i> بحث متقدم
        </button>
    </div>
    <div class="alert alert-warning">
        لم يتم العثور على مولد الفواتير الدورية. اضغط هنا لإنشاء فواتير دورية.
    </div>
    </div>
    <script>
        // دالة لعرض وإخفاء البحث المتقدم
        function toggleAdvancedSearch() {
            const advancedSearch = document.getElementById('advancedSearch');
            advancedSearch.style.display = (advancedSearch.style.display === 'none' || advancedSearch.style.display === '') ? 'block' : 'none';
        }
    </script>

<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.2/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
<script src="../js/date.js"></script>

</body>
</html>
