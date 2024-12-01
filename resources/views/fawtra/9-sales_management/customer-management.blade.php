  
@section('css')
<style>
    .search-card {
        transition: all 0.3s ease;
        border: none;
        box-shadow: 0 2px 4px rgba(0,0,0,0.1);
    }
    .search-card:hover {
        box-shadow: 0 4px 8px rgba(0,0,0,0.15);
    }
    .client-card {
        transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
        border: none !important;
        background: #ffffff;
        position: relative;
        overflow: hidden;
    }
    .client-card::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background: linear-gradient(135deg, rgba(130, 89, 219, 0.1) 0%, rgba(54, 220, 255, 0.1) 100%);
        opacity: 0;
        transition: all 0.4s ease;
    }
    .client-card:hover::before {
        opacity: 1;
    }
    .client-card:hover {
        transform: translateY(-10px);
        box-shadow: 0 20px 40px rgba(0,0,0,0.12) !important;
    }
    .client-header {
        position: relative;
        background: linear-gradient(135deg, #8259DB 0%, #36DCFF 100%);
        border-radius: 20px;
        padding: 20px;
        margin: -20px -20px 20px -20px;
    }
    .client-avatar {
        width: 80px;
        height: 80px;
        background: #ffffff;
        border: 4px solid rgba(255, 255, 255, 0.2);
        box-shadow: 0 10px 20px rgba(0,0,0,0.1);
        transition: all 0.4s ease;
    }
    .client-card:hover .client-avatar {
        transform: scale(1.1) rotate(5deg);
    }
    .client-name {
        color: #ffffff;
        font-size: 1.4rem;
        text-shadow: 0 2px 4px rgba(0,0,0,0.1);
    }
    .client-info {
        background: rgba(248, 249, 250, 0.8);
        backdrop-filter: blur(10px);
        border: 1px solid rgba(255, 255, 255, 0.5);
    }
    .info-item {
        padding: 12px 15px;
        border-radius: 12px;
        transition: all 0.3s ease;
        position: relative;
        overflow: hidden;
    }
    .info-item:hover {
        background: rgba(255, 255, 255, 0.9);
        transform: translateX(-5px);
    }
    .info-item i {
        font-size: 1.2rem;
        width: 35px;
        height: 35px;
        display: flex;
        align-items: center;
        justify-content: center;
        border-radius: 10px;
        background: rgba(255, 255, 255, 0.9);
        box-shadow: 0 4px 8px rgba(0,0,0,0.05);
    }
    .status-badge {
        padding: 8px 20px;
        font-weight: 600;
        letter-spacing: 0.5px;
        border: 2px solid rgba(255, 255, 255, 0.2);
    }
    .action-btn {
        width: 40px;
        height: 40px;
        border-radius: 12px;
        background: rgba(255, 255, 255, 0.2);
        backdrop-filter: blur(5px);
        border: 1px solid rgba(255, 255, 255, 0.3);
        color: #ffffff;
        transition: all 0.3s ease;
    }
    .action-btn:hover {
        background: rgba(255, 255, 255, 0.3);
        transform: rotate(90deg);
    }
    .dropdown-menu {
        border: none;
        background: rgba(255, 255, 255, 0.95);
        backdrop-filter: blur(10px);
        box-shadow: 0 10px 30px rgba(0,0,0,0.1);
        border-radius: 15px;
        padding: 10px;
    }
    .dropdown-item {
        padding: 12px 20px;
        border-radius: 10px;
        transition: all 0.3s ease;
        margin: 2px 0;
    }
    .dropdown-item:hover {
        background: rgba(130, 89, 219, 0.1);
        transform: translateX(-5px);
    }
    .footer-stats {
        border-top: 1px solid rgba(0,0,0,0.05);
        margin-top: 20px;
        padding-top: 20px;
    }
    .stat-item {
        text-align: center;
        padding: 10px;
        border-radius: 12px;
        background: rgba(248, 249, 250, 0.8);
        transition: all 0.3s ease;
    }
    .stat-item:hover {
        background: rgba(255, 255, 255, 0.9);
        transform: translateY(-3px);
    }
    .form-control {
        border-radius: 8px;
    }
    .btn {
        border-radius: 8px;
    }
    .btn-toggle-search {
        transition: all 0.3s ease;
    }
    .btn-toggle-search.active i {
        transform: rotate(180deg);
    }
</style>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
@endsection

@section('content')
<div class="container-fluid py-4">
    <!-- العنوان وأزرار الإضافة -->
    <div class="row mb-4">
        <div class="col-12">
            <div class="d-flex justify-content-between align-items-center">
                <h2 class="mb-0">
                    <i class="fas fa-users text-primary me-2"></i>
                    إدارة العملاء
                </h2>
                <div class="d-flex gap-2">
                    <button class="btn btn-success" onclick="window.location.href='{{ route('add_customer') }}'">
                        <i class="fas fa-user-plus me-2"></i> إضافة عميل جديد
                    </button>
                    <button class="btn btn-outline-primary">
                        <i class="fas fa-upload me-2"></i> استيراد
                    </button>
                    <button class="btn btn-outline-secondary">
                        <i class="fas fa-download me-2"></i> تصدير
                    </button>
                </div>
            </div>
        </div>
    </div>

    <!-- قسم البحث -->
    <div class="row mb-4">
        <div class="col-12">
            <div class="card search-card">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center mb-3">
                        <h5 class="card-title mb-0">
                            <i class="fas fa-search text-primary me-2"></i>
                            بحث وتصفية
                        </h5>
                        <button class="btn btn-link btn-toggle-search" type="button" data-bs-toggle="collapse" data-bs-target="#advancedSearch" aria-expanded="false">
                            بحث متقدم <i class="fas fa-chevron-down ms-1"></i>
                        </button>
                    </div>

                    <form id="searchForm">
                        <!-- حقول البحث الأساسية -->
                        <div class="row">
                            <div class="col-md-3 mb-3">
                                <label class="form-label">العميل</label>
                                <select class="form-control" name="client_id">
                                    <option value="">اختر العميل</option>
                                    @foreach($clients as $client)
                                        <option value="{{ $client->id }}">{{ $client->trade_name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-md-3 mb-3">
                                <label class="form-label">الاسم</label>
                                <input type="text" class="form-control" name="name" placeholder="ادخل اسم العميل">
                            </div>
                            <div class="col-md-3 mb-3">
                                <label class="form-label">الحالة</label>
                                <select class="form-control" name="status">
                                    <option value="">اختر الحالة</option>
                                    <option value="active">نشط</option>
                                    <option value="inactive">غير نشط</option>
                                    <option value="blocked">محظور</option>
                                </select>
                            </div>
                            <div class="col-md-3 mb-3">
                                <label class="form-label">نوع العميل</label>
                                <select class="form-control" name="client_type">
                                    <option value="">اختر النوع</option>
                                    <option value="cash">نقدي</option>
                                    <option value="credit">آجل</option>
                                </select>
                            </div>
                        </div>

                        <!-- حقول البحث المتقدمة -->
                        <div class="collapse" id="advancedSearch">
                            <hr>
                            <div class="row">
                                <div class="col-md-3 mb-3">
                                    <label class="form-label">تاريخ الإنشاء من</label>
                                    <input type="date" class="form-control" name="date_from">
                                </div>
                                <div class="col-md-3 mb-3">
                                    <label class="form-label">تاريخ الإنشاء إلى</label>
                                    <input type="date" class="form-control" name="date_to">
                                </div>
                                <div class="col-md-3 mb-3">
                                    <label class="form-label">العنوان</label>
                                    <input type="text" class="form-control" name="address" placeholder="ادخل العنوان">
                                </div>
                                <div class="col-md-3 mb-3">
                                    <label class="form-label">الرمز البريدي</label>
                                    <input type="text" class="form-control" name="postal_code" placeholder="ادخل الرمز البريدي">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-3 mb-3">
                                    <label class="form-label">البلد</label>
                                    <select class="form-control" name="country">
                                        <option value="">اختر البلد</option>
                                        <option value="SA">السعودية</option>
                                        <option value="AE">الإمارات</option>
                                        <option value="KW">الكويت</option>
                                        <option value="BH">البحرين</option>
                                        <option value="OM">عمان</option>
                                        <option value="QA">قطر</option>
                                    </select>
                                </div>
                                <div class="col-md-3 mb-3">
                                    <label class="form-label">الوسم</label>
                                    <select class="form-control" name="tag">
                                        <option value="">اختر الوسم</option>
                                        <option value="vip">VIP</option>
                                        <option value="regular">عادي</option>
                                        <option value="special">مميز</option>
                                    </select>
                                </div>
                                <div class="col-md-3 mb-3">
                                    <label class="form-label">أضيفت بواسطة</label>
                                    <select class="form-control" name="created_by">
                                        <option value="">اختر المستخدم</option>
                                        @foreach($employees as $employee)
                                            <option value="{{ $employee->employee_id }}">{{ $employee->frist_name  }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-md-3 mb-3">
                                    <label class="form-label">الموظفين المعينين</label>
                                    <select class="form-control" name="assigned_employee">
                                        <option value="">اختر الموظف</option>
                                        @foreach($employees as $employee)
                                            <option value="{{ $employee->id }}">{{ $employee->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>

                        <div class="row mt-3">
                            <div class="col-12 text-start">
                                <button type="submit" class="btn btn-primary px-4">
                                    <i class="fas fa-search me-2"></i> بحث
                                </button>
                                <button type="reset" class="btn btn-secondary px-4 ms-2">
                                    <i class="fas fa-redo me-2"></i> إعادة تعيين
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- عرض العملاء -->
    <div class="row g-4">
        @foreach($clients as $client)
        <div class="col-md-4">
            <div class="card client-card shadow-lg rounded-4">
                <div class="card-body p-4">
                    <!-- رأس البطاقة -->
                    <div class="client-header mb-4">
                        <div class="d-flex justify-content-between align-items-start">
                            <div class="d-flex align-items-center">
                                <div class="client-avatar rounded-circle d-flex align-items-center justify-content-center me-3">
                                    <span class="text-primary fs-2 fw-bold">
                                        {{ mb_substr($client->trade_name, 0, 1) }}
                                    </span>
                                </div>
                                <div>
                                    <h4 class="client-name mb-2">{{ $client->trade_name }}</h4>
                                    <span class="status-badge badge {{ $client->status == 'active' ? 'bg-success' : 'bg-danger' }} rounded-pill">
                                        <i class="fas {{ $client->status == 'active' ? 'fa-check-circle' : 'fa-times-circle' }} me-1"></i>
                                        {{ $client->status == 'active' ? 'نشط' : 'موقوف' }}
                                    </span>
                                </div>
                            </div>
                            <div class="dropdown">
                                <button class="action-btn btn" type="button" data-bs-toggle="dropdown">
                                    <i class="fas fa-ellipsis-v"></i>
                                </button>
                                <ul class="dropdown-menu dropdown-menu-end">
                                    <li>
                                        <a class="dropdown-item" href="{{route('add_payment_process')}}">
                                            <i class="fas fa-eye text-primary me-2"></i> عرض
                                        </a>
                                    </li>
                                    <li>
                                        <a class="dropdown-item" href="#">
                                            <i class="fas fa-pencil-alt text-warning me-2"></i> تعديل
                                        </a>
                                    </li>
                                    <li>
                                        <a class="dropdown-item" href="#">
                                            <i class="fas fa-file-invoice text-info me-2"></i> إنشاء فاتورة
                                        </a>
                                    </li>
                                    <li><hr class="dropdown-divider opacity-25 mx-2"></li>
                                    <li>
                                        <a class="dropdown-item text-danger" href="#">
                                            <i class="fas fa-trash me-2"></i> حذف
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>

                    <!-- معلومات العميل -->
                    <div class="client-info rounded-4 p-3">
                        <div class="info-item mb-3">
                            <div class="d-flex align-items-center">
                                <i class="fas fa-envelope text-primary"></i>
                                <div class="ms-3">
                                    <small class="text-muted d-block">البريد الإلكتروني</small>
                                    <span>{{ $client->email ?? 'لا يوجد بريد إلكتروني' }}</span>
                                </div>
                            </div>
                        </div>
                        <div class="info-item mb-3">
                            <div class="d-flex align-items-center">
                                <i class="fas fa-phone text-success"></i>
                                <div class="ms-3">
                                    <small class="text-muted d-block">رقم الهاتف</small>
                                    <span>{{ $client->phone ?? 'لا يوجد رقم هاتف' }}</span>
                                </div>
                            </div>
                        </div>
                        <div class="info-item">
                            <div class="d-flex align-items-center">
                                <i class="fas fa-map-marker-alt text-danger"></i>
                                <div class="ms-3">
                                    <small class="text-muted d-block">العنوان</small>
                                    <span>{{ $client->address ?? 'العنوان غير متوفر' }}</span>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- إحصائيات العميل -->
                    <div class="footer-stats">
                        <div class="row g-2">
                            <div class="col-4">
                                <div class="stat-item">
                                    <small class="text-muted d-block mb-1">نوع العميل</small>
                                    <span class="fw-bold text-primary">{{ $client->client_type ?? 'غير محدد' }}</span>
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="stat-item">
                                    <small class="text-muted d-block mb-1">تاريخ التسجيل</small>
                                    <span class="fw-bold text-primary">{{ $client->created_at ? $client->created_at->format('Y-m-d') : 'غير محدد' }}</span>
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="stat-item">
                                    <small class="text-muted d-block mb-1">عدد الفواتير</small>
                                    <span class="fw-bold text-primary">{{ $client->invoices_count ?? '0' }}</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>

@section('js')
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
<script>
$(document).ready(function() {
    // تهيئة البحث المتقدم
    var advancedSearch = new bootstrap.Collapse(document.getElementById('advancedSearch'), {
        toggle: false
    });

    // تبديل أيقونة وحالة البحث المتقدم
    $('.btn-toggle-search').click(function(e) {
        e.preventDefault();
        e.stopPropagation();
        $(this).toggleClass('active');
    });

    // إغلاق البحث المتقدم عند النقر خارجه
    $(document).click(function(event) {
        if (!$(event.target).closest('#advancedSearch, .btn-toggle-search').length) {
            advancedSearch.hide();
            $('.btn-toggle-search').removeClass('active');
        }
    });

    // منع إغلاق البحث المتقدم عند النقر داخله
    $('#advancedSearch').click(function(event) {
        event.stopPropagation();
    });
});
</script>
