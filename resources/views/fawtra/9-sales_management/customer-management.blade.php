
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
        background: #ffffff;
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
</style>
@endsection

@section('content')

<title>أدارة العملاء</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">

<div class="container-fluid">
    <div class="row">
        <!-- العنوان وأزرار الإضافة -->
        <div class="col-12 d-flex justify-content-between align-items-center my-4">
            <button class="btn btn-success" onclick="window.location.href='{{ route('add_customer') }}'">
                <i class="fas fa-user-plus me-2"></i> أضف العميل
            </button>
            <div>
                <button class="btn btn-outline-secondary"><i class="fas fa-upload me-2"></i> رفع</button>
                <button class="btn btn-outline-secondary"><i class="fas fa-cog me-2"></i> إعدادات</button>
            </div>
        </div>

        <!-- قسم البحث -->
        <div class="col-12 mb-4">
            <form id="searchForm" class="card p-4">
                <h5 class="card-title"><i class="fas fa-search me-2"></i> بحث وتصفيه</h5>
                <div class="row">
                    <div class="col-md-3 mb-3">
                        <label for="category">إختر التصنيف</label>
                        <select id="category" class="form-control">
                            <option>إختر التصنيف</option>
                        </select>
                    </div>
                    <div class="col-md-3 mb-3">
                        <label for="status">إختر الحالة</label>
                        <select id="status" class="form-control">
                            <option>إختر الحالة</option>
                        </select>
                    </div>
                    <div class="col-md-3 mb-3">
                        <label for="name">الاسم</label>
                        <input id="name" type="text" class="form-control" placeholder="الاسم">
                    </div>
                    <div class="col-md-3 mb-3">
                        <label for="client">إختر العميل</label>
                        <select id="client" class="form-control">
                            <option>إختر العميل</option>
                        </select>
                    </div>
                </div>

                <!-- الحقول المتقدمة -->
                <div id="advancedFields" class="collapse">
                    <h6 class="mt-4"><i class="fas fa-filter me-2"></i> بحث متقدم</h6>
                    <div class="row">
                        <div class="col-md-3 mb-3">
                            <label for="country">إختر البلد</label>
                            <select id="country" class="form-control">
                                <option>إختر البلد</option>
                            </select>
                        </div>
                        <div class="col-md-3 mb-3">
                            <label for="address">العنوان</label>
                            <input id="address" type="text" class="form-control" placeholder="العنوان">
                        </div>
                        <div class="col-md-3 mb-3">
                            <label for="startDate">تاريخ الإنشاء (من)</label>
                            <input id="startDate" type="date" class="form-control">
                        </div>
                        <div class="col-md-3 mb-3">
                            <label for="endDate">تاريخ الإنشاء (إلى)</label>
                            <input id="endDate" type="date" class="form-control">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-3 mb-3">
                            <label for="employee">اختر الموظفين</label>
                            <select id="employee" class="form-control">
                                <option>اختر الموظفين</option>
                            </select>
                        </div>
                        <div class="col-md-3 mb-3">
                            <label for="addedBy">أضيفت بواسطة</label>
                            <select id="addedBy" class="form-control">
                                <option>إختر المستخدم</option>
                            </select>
                        </div>
                        <div class="col-md-3 mb-3">
                            <label for="referenceNumber">الرقم المرجعي</label>
                            <input id="referenceNumber" type="text" class="form-control" placeholder="الرقم المرجعي">
                        </div>
                        <div class="col-md-3 mb-3">
                            <label for="tag">إختر وسم</label>
                            <select id="tag" class="form-control">
                                <option>إختر وسم</option>
                            </select>
                        </div>
                    </div>
                </div>

                <!-- أزرار البحث -->
                <div class="row">
                    <div class="col-md-3 mb-3">
                        <button type="button" class="btn btn-primary" data-toggle="collapse" data-target="#advancedFields">
                            <i class="fas fa-chevron-down me-2"></i> إظهار الحقول المتقدمة
                        </button>
                    </div>
                    <div class="col-md-3 mb-3">
                        <button type="submit" class="btn btn-success">
                            <i class="fas fa-search me-2"></i> بحث
                        </button>
                    </div>
                </div>
            </form>
        </div>

        <!-- عرض العملاء -->
        @foreach($clients as $client)
        <div class="col-12 mb-4">
            <div class="card shadow-lg border-0 rounded-4">
                <div class="card-body d-flex flex-column flex-md-row align-items-center">
                    <!-- الحرف الأول -->
                    <div class="badge bg-primary text-white fs-3 p-4 rounded-circle d-flex align-items-center justify-content-center me-3">
                        {{ mb_substr($client->trade_name, 0, 1) }}
                    </div>
                    <!-- التفاصيل -->
                    <div class="flex-grow-1">
                        <h4 class="card-title text-dark mb-2">{{ $client->trade_name }}</h4>
                        <p class="card-text text-secondary mb-1">
                            <i class="fas fa-envelope text-primary me-2"></i>{{ $client->email }}
                        </p>
                        <p class="card-text text-secondary mb-1">
                            <i class="fas fa-map-marker-alt text-danger me-2"></i>{{ $client->address ?? 'العنوان غير متوفر' }}
                        </p>
                    </div>
                    <!-- الحالة -->
                    <div class="text-center me-4">
                        <span class="badge {{ $client->status == 'active' ? 'bg-success' : 'bg-danger' }} fs-6 px-4 py-2 rounded-pill">
                            {{ $client->status == 'active' ? 'نشط' : 'موقوف' }}
                        </span>
                    </div>
                    <!-- الإجراءات -->
                    <div class="dropdown">
                        <button class="btn btn-outline-secondary btn-sm rounded-circle" type="button" data-toggle="dropdown" aria-expanded="false">
                            <i class="fas fa-ellipsis-v"></i>
                        </button>
                        <ul class="dropdown-menu dropdown-menu-end shadow-sm">
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
                                    <i class="fas fa-copy text-info me-2"></i> نسخ
                                </a>
                            </li>
                            <li>
                                <a class="dropdown-item text-danger" href="#">
                                    <i class="fas fa-trash me-2"></i> حذف
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    @endforeach
        </div>
</div>

<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.2/dist/js/bootstrap.bundle.min.js"></script>


@section('js')
<script>
    $(document).ready(function() {
        // تهيئة collapse للبحث المتقدم
        $('#advancedSearch').on('show.bs.collapse', function () {
            $('#advancedSearchBtn i').removeClass('fa-chevron-down').addClass('fa-chevron-up');
        }).on('hide.bs.collapse', function () {
            $('#advancedSearchBtn i').removeClass('fa-chevron-up').addClass('fa-chevron-down');
        });

        // معالجة نموذج البحث
        $('#searchForm').on('submit', function(e) {
            e.preventDefault();
            // هنا يمكنك إضافة منطق البحث
        });
    });
</script>
@endsection
