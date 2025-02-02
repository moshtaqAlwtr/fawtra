<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>المصروفات</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/js/all.min.js"></script>
    <style>
        body {
            font-family: 'Tahoma', sans-serif;
            background-color: #f4f6f9;
            direction: rtl;
        }
        .header {
            background-color: #007bff;
            color: white;
            padding: 15px;
            text-align: center;
        }
        .stats-container {
            display: flex;
            gap: 20px;
            margin-bottom: 20px;
        }
        .stat-box {
            flex: 1;
            background: linear-gradient(to right, #007bff, #00c6ff);
            color: white;
            padding: 20px;
            text-align: center;
            border-radius: 8px;
        }
        .search-container, .table-container {
            background-color: #ffffff;
            border-radius: 8px;
            padding: 20px;
            margin-bottom: 20px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
        }
        .action-buttons button {
            margin-top: 10px;
        }
        .btn-primary, .btn-primary:hover {
            background-color: #28a745;
            border: none;
        }
        .advanced-search {
            display: none;
            margin-top: 15px;
            padding: 15px;
            background-color: #f9f9f9;
            border-radius: 5px;
        }
        .btn-import, .btn-settings {
            background-color: #e9ecef;
            border: none;
            color: #6c757d;
            margin-left: 5px;
            padding: 10px;
            border-radius: 5px;
        }
        .btn-import:hover, .btn-settings:hover {
            background-color: #d3d9df;
        }
        .dropdown-menu-right {
            text-align: right;
        }
    </style>
</head>
<body>

    <!-- الهيدر -->
    <div class="header">
        <h1>المصروفات</h1>
    </div>

    <!-- أزرار التحكم -->
 <div class="container my-4 d-flex align-items-center gap-2">
        <!-- زر سند صرف -->
        <button class="btn btn-primary d-flex align-items-center" onclick="window.location.href='{{route('payment_vouchers.create')}}'">
            <i class="fas fa-plus-circle me-2"></i> سند صرف
        </button>

        <!-- زر استيراد -->
        <button class="btn btn-success d-flex align-items-center" onclick="window.location.href='import.html'">
            <i class="fas fa-upload me-2"></i> استيراد
        </button>

        <!-- زر الإعدادات -->
        <button class="btn btn-secondary d-flex align-items-center">
            <i class="fas fa-cog"></i>
        </button>
    </div>

    <!-- إحصائيات سريعة -->
    <div class="container stats-container">
        <div class="stat-box">
            <h4>آخر 7 أيام</h4>
            <h2>{{ isset($stats['last_7_days']) ? number_format($stats['last_7_days'], 2) : '0.00' }} ر.س</h2>
        </div>
        <div class="stat-box">
            <h4>آخر 30 يوم</h4>
            <h2>{{ isset($stats['last_30_days']) ? number_format($stats['last_30_days'], 2) : '0.00' }} ر.س</h2>
        </div>
        <div class="stat-box">
            <h4>آخر سنة</h4>
            <h2>{{ isset($stats['last_365_days']) ? number_format($stats['last_365_days'], 2) : '0.00' }} ر.س</h2>
        </div>
    </div>



    <!-- البحث -->
    <form>
        <div class="row">
            <div class="col-md-3">
                <label for="code">الكود</label>
                <input type="text" id="code" class="form-control">
            </div>
            <div class="col-md-3">
                <label for="category">التصنيف</label>
                <select id="category" class="form-control">
                    <option>أي تصنيف</option>
                </select>
            </div>
            <div class="col-md-3">
                <label for="status">الحالة</label>
                <select id="status" class="form-control">
                    <option>الكل</option>
                </select>
            </div>
            <div class="col-md-3">
                <label for="date">التاريخ</label>
                <input type="date" id="date" class="form-control">
            </div>
        </div>



    <!-- البحث المتقدم -->
    <div class="advanced-search" id="advanced-search">
        <div class="row">
            <div class="col-md-3">
                <label for="description">الوصف</label>
                <input type="text" id="description" class="form-control">
            </div>
            <div class="col-md-3">
                <label for="amount-more">المبلغ أكثر من</label>
                <input type="text" id="amount-more" class="form-control">
            </div>
            <div class="col-md-3">
                <label for="amount-less">المبلغ أقل من</label>
                <input type="text" id="amount-less" class="form-control">
            </div>
            <div class="col-md-3">
                <label for="added-by">أضيفت بواسطة</label>
                <select id="added-by" class="form-control">
                    <option>أي موظف</option>
                </select>
            </div>
        </div>
        <div class="row mt-3">
            <div class="col-md-3">
                <label for="account">الحساب الفرعي</label>
                <select id="account" class="form-control">
                    <option>أي حساب</option>
                </select>
            </div>
            <div class="col-md-3">
                <label for="salesman">البائع</label>
                <select id="salesman" class="form-control">
                    <option>أي بائع</option>
                </select>
            </div>
            <div class="col-md-3">
                <label for="date-range-from">تاريخ الإنشاء من</label>
                <input type="date" id="date-range-from" class="form-control">
            </div>
            <div class="col-md-3">
                <label for="date-range-to">إلى</label>
                <input type="date" id="date-range-to" class="form-control">
            </div>
        </div>

    </div>
    <div class="row mt-3">
        <div class="col-md-12 text-right">
            <button type="button" class="btn btn-secondary" onclick="resetFilters()">إلغاء الفلتر</button>
            <button type="button" class="btn btn-primary" onclick="search()">بحث</button>
            <button type="button" class="btn btn-warning" onclick="toggleAdvancedSearch()">بحث متقدم</button>
        </div>
    </div>
</form>

    <!-- جدول المصروفات -->
    <div class="list-group">
        @if(isset($paymentVouchers) && count($paymentVouchers) > 0)
            @foreach($paymentVouchers as $voucher)
                <div class="list-group-item bg-white shadow-lg rounded mb-3 p-4" style="background-color: rgba(255, 255, 255, 0.85); border-radius: 15px;">
                    <div class="d-flex justify-content-between align-items-center">
                        <!-- معلومات سند الصرف -->
                        <div>
                            <h5 class="mb-1 text-dark">{{ $voucher->payee_name }}</h5>
                            <small class="text-muted">{{ $voucher->voucher_date }}</small> <!-- استخدام التاريخ المدخل -->
                        </div>
                        <div class="text-end">
                            <h4 class="text-success mb-0">{{ number_format($voucher->amount, 2) }} ر.س</h4>
                            <small class="text-muted">{{ $voucher->treasury->name ?? 'غير محدد' }}</small>
                        </div>

                        <!-- قائمة الخيارات -->
                        <div class="dropdown ms-3">
                            <button class="btn btn-sm btn-light" type="button" id="dropdownMenu{{ $voucher->payment_id }}" data-bs-toggle="dropdown" aria-expanded="false">
                                <i class="fas fa-ellipsis-v"></i>
                            </button>
                            <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="dropdownMenu{{ $voucher->payment_id }}">
                                <li>
                                    <a class="dropdown-item d-flex align-items-center" href="#">
                                        <i class="fas fa-eye text-primary me-2"></i> عرض
                                    </a>
                                </li>
                                <li>
                                    <a class="dropdown-item d-flex align-items-center" href="#">
                                        <i class="fas fa-edit text-info me-2"></i> تعديل
                                    </a>
                                </li>
                                <li>
                                    <form method="POST" action="{{ route('payment_vouchers.destroy', $voucher->payment_id) }}">
                                        @csrf
                                        @method('DELETE')
                                        <button class="dropdown-item d-flex align-items-center" type="submit" onclick="return confirm('هل أنت متأكد من الحذف؟')">
                                            <i class="fas fa-trash text-danger me-2"></i> حذف
                                        </button>
                                    </form>
                                </li>
                                <li>
                                    <a class="dropdown-item d-flex align-items-center" href="#">
                                        <i class="fas fa-print text-primary me-2"></i> طباعة
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>

                    <!-- عرض تفاصيل السند -->
                    <div class="mt-4">
                        <p><strong class="text-dark">الوصف:</strong> {{ $voucher->description }}</p>
                        <p><strong class="text-dark">رقم الكود:</strong> {{ $voucher->details->first()->code_number ?? 'غير محدد' }}</p>
                        <p><strong class="text-dark">الوحدة:</strong> {{ $voucher->unit }}</p>
                        <p><strong class="text-dark">الخزينة:</strong> {{ $voucher->treasury->name ?? 'غير محدد' }}</p>
                        <p><strong class="text-dark">الضريبة:</strong> {{ $voucher->tax->name ??  'غير محدد' }}</p>
                        <p><strong class="text-dark">الحساب:</strong> {{ $voucher->account->name ?? 'غير محدد' }}</p>
                        <p><strong class="text-dark">المرفقات:</strong>
                            @if($voucher->attachment)
                                <img src="{{ asset('storage/attachments/' . $voucher->attachment) }}" class="img-fluid" target="_blank" alt="Attachment"> عرض المرفق
                            @else
                                لا يوجد مرفقات
                            @endif
                        </p>
                    </div>
                </div>
            @endforeach
        @else
            <div class="alert alert-info">
                لا توجد سندات صرف متاحة حالياً
            </div>
        @endif
    </div>




        </div>

    </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>


    <!-- JavaScript -->
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

    <script>
        function toggleAdvancedSearch() {
            $("#advanced-search").slideToggle();
        }

        function search() {
            alert('تنفيذ عملية البحث...');
        }

        function resetFilters() {
            alert('إعادة تعيين الفلتر...');
        }
    </script>


</body>
</html>
