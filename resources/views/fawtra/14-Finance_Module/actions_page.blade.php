    <!-- الهيدر -->

    <div class="bg-gradient-primary text-white p-4 rounded-3 shadow-sm mb-4">
        <div class="d-flex justify-content-between align-items-center">
            <h1 class="mb-0">
                <i class="fas fa-receipt me-2"></i>
                سند قبض
            </h1>
            <div class="d-flex gap-2">
                <a href="{{ route('add_receipt') }}" class="btn btn-light btn-lg rounded-pill">
                    <i class="fas fa-plus-circle"></i>
                    <span class="ms-2">إضافة سند</span>
                </a>
                <button class="btn btn-outline-light btn-lg rounded-pill">
                    <i class="fas fa-file-import"></i>
                    <span class="ms-2">استيراد</span>
                </button>
            </div>
        </div>
    </div>

    <!-- إحصائيات سريعة -->
    @if(session('error'))
        <div class="alert alert-danger mb-4">
            {{ session('error') }}
        </div>
    @endif

    <div class="row g-4 mb-4">
        <!-- إجمالي السندات -->
        <div class="col-md-3">
            <div class="card border-0 shadow-sm h-100 bg-gradient-warning text-white">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center mb-3">
                        <h5 class="card-title mb-0">إجمالي السندات</h5>
                        <i class="fas fa-chart-line fa-2x opacity-50"></i>
                    </div>
                    <h3 class="display-6 mb-3">

                    </h3>
                    <p class="mb-0">
                        <i class="fas fa-file-invoice me-2"></i>
                        إجمالي المبلغ
                    </p>
                </div>
            </div>
        </div>

        <!-- آخر 7 أيام -->
        <div class="col-md-3">
            <div class="card border-0 shadow-sm h-100 bg-gradient-primary text-white">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center mb-3">
                        <h5 class="card-title mb-0">آخر 7 أيام</h5>
                        <i class="fas fa-calendar-week fa-2x opacity-50"></i>
                    </div>
                    <h3 class="display-6 mb-3">
                        <h2>{{ isset($stats['last_7_days']) ? number_format($stats['last_7_days'], 2) : '0.00' }} ر.س</h2>
                    </h3>
                    <p class="mb-0">
                        <i class="fas fa-file-invoice me-2"></i>
                        إجمالي المبلغ
                    </p>
                </div>
            </div>
        </div>

        <!-- آخر 30 يوم -->
        <div class="col-md-3">
            <div class="card border-0 shadow-sm h-100 bg-gradient-info text-white">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center mb-3">
                        <h5 class="card-title mb-0">آخر 30 يوم</h5>
                        <i class="fas fa-calendar-alt fa-2x opacity-50"></i>
                    </div>
                    <h3 class="display-6 mb-3">
                        <h2>{{ isset($stats['last_30_days']) ? number_format($stats['last_30_days'], 2) : '0.00' }} ر.س</h2>
                    </h3>
                    <p class="mb-0">
                        <i class="fas fa-file-invoice me-2"></i>
                        إجمالي المبلغ
                    </p>
                </div>
            </div>
        </div>

        <!-- آخر 365 يوم -->
        <div class="col-md-3">
            <div class="card border-0 shadow-sm h-100 bg-gradient-success text-white">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center mb-3">
                        <h5 class="card-title mb-0">آخر 365 يوم</h5>
                        <i class="fas fa-calendar fa-2x opacity-50"></i>
                    </div>
                    <h2>{{ isset($stats['total_receipts']) ? number_format($stats['total_receipts'], 2) : '0.00' }} ر.س</h2>
                    <p class="mb-0">
                        <i class="fas fa-file-invoice me-2"></i>
                        إجمالي المبلغ
                    </p>
                </div>
            </div>
        </div>
    </div>

    @if(isset($recentReceipts) && $recentReceipts->count() > 0)
    <!-- آخر السندات -->
    <div class="card border-0 shadow-sm mb-4">
        <div class="card-header bg-white border-0">
            <h5 class="mb-0">آخر السندات</h5>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th>الرقم</th>
                            <th>التاريخ</th>
                            <th>المبلغ</th>
                            <th>العملة</th>
                            <th>العميل</th>
                            <th>الموظف</th>
                            <th>الحالة</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($recentReceipts as $receipt)
                        <tr>
                            <td>{{ $receipt->code }}</td>
                            <td>{{ $receipt->date->format('Y-m-d') }}</td>
                            <td>{{ number_format($receipt->amount, 2) }}</td>
                            <td>{{ $receipt->currency }}</td>
                            <td>{{ optional($receipt->client)->name }}</td>
                            <td>{{ optional($receipt->employee)->name }}</td>
                            <td>
                                <span class="badge bg-{{ $receipt->status == 'approved' ? 'success' : 'warning' }}">
                                    {{ $receipt->status == 'approved' ? 'معتمد' : 'مسودة' }}
                                </span>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    @else
    <div class="alert alert-info">
        لا توجد سندات حتى الآن
    </div>
    @endif

    <!-- البحث -->
    <div class="card border-0 shadow-sm mb-4">
        <div class="card-body">
            <h5 class="mb-4">بحث</h5>
            <form>
                <div class="row mb-3">
                    <div class="col-md-3">
                        <label for="code" class="form-label">الكود</label>
                        <input type="text" id="code" class="form-control">
                    </div>
                    <div class="col-md-3">
                        <label for="category" class="form-label">التصنيف</label>
                        <select id="category" class="form-select">
                            <option>أي تصنيف</option>
                        </select>
                    </div>
                    <div class="col-md-3">
                        <label for="status" class="form-label">الحالة</label>
                        <select id="status" class="form-select">
                            <option>الكل</option>
                        </select>
                    </div>
                    <div class="col-md-3">
                        <label for="date" class="form-label">التاريخ</label>
                        <input type="date" id="date" class="form-control">
                    </div>
                </div>

                <div class="text-end">
                    <button type="button" class="btn btn-outline-secondary" onclick="resetFilters()">إلغاء الفلتر</button>
                    <button type="button" class="btn btn-primary" onclick="search()">بحث</button>
                    <button type="button" class="btn btn-warning" onclick="toggleAdvancedSearch()">بحث متقدم</button>
                </div>
            </form>

            <!-- البحث المتقدم -->
            <div class="advanced-search mt-4" id="advanced-search" style="display:none;">
                <div class="row mb-3">
                    <div class="col-md-3">
                        <label for="description" class="form-label">الوصف</label>
                        <input type="text" id="description" class="form-control">
                    </div>
                    <div class="col-md-3">
                        <label for="amount-more" class="form-label">المبلغ أكثر من</label>
                        <input type="number" id="amount-more" class="form-control">
                    </div>
                    <div class="col-md-3">
                        <label for="amount-less" class="form-label">المبلغ أقل من</label>
                        <input type="number" id="amount-less" class="form-control">
                    </div>
                    <div class="col-md-3">
                        <label for="added-by" class="form-label">أضيفت بواسطة</label>
                        <select id="added-by" class="form-select">
                            <option>أي موظف</option>
                        </select>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-3">
                        <label for="account" class="form-label">الحساب الفرعي</label>
                        <select id="account" class="form-select">
                            <option>أي حساب</option>
                        </select>
                    </div>
                    <div class="col-md-3">
                        <label for="salesman" class="form-label">البائع</label>
                        <select id="salesman" class="form-select">
                            <option>أي بائع</option>
                        </select>
                    </div>
                    <div class="col-md-3">
                        <label for="date-range-from" class="form-label">تاريخ الإنشاء من</label>
                        <input type="date" id="date-range-from" class="form-control">
                    </div>
                    <div class="col-md-3">
                        <label for="date-range-to" class="form-label">إلى</label>
                        <input type="date" id="date-range-to" class="form-control">
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- عرض السندات -->
    <div class="row">
        @if(isset($recentReceipts) && $recentReceipts->count() > 0)
            @foreach($recentReceipts as $receipt)
                <div class="col-md-6 col-lg-4 mb-4">
                    <div class="card h-100 border-0 shadow-hover">
                        <div class="card-header bg-white border-0 d-flex justify-content-between align-items-center">
                            <div>
                                <h6 class="mb-1">
                                    @if(isset($receipt->client))
                                        {{ $receipt->client->name ?? 'عميل غير معروف' }}
                                    @else
                                        عميل غير معروف
                                    @endif
                                </h6>
                                <small class="text-muted">{{ optional($receipt->date)->format('Y/m/d') ?? 'تاريخ غير محدد' }}</small>
                            </div>
                            <div class="dropdown">
                                <button class="btn btn-link text-dark p-0" type="button" data-bs-toggle="dropdown">
                                    <i class="fas fa-ellipsis-v"></i>
                                </button>
                                <ul class="dropdown-menu">
                                    <li><a class="dropdown-item" href="/receipt/{{ $receipt->id }}"><i class="fas fa-eye text-primary me-2"></i>عرض</a></li>
                                    <li><a class="dropdown-item" href="/receipt/{{ $receipt->id }}/edit"><i class="fas fa-edit text-info me-2"></i>تعديل</a></li>
                                    <li><a class="dropdown-item" href="#" onclick="window.open('/receipt/print/{{ $receipt->id }}', '_blank')"><i class="fas fa-print text-success me-2"></i>طباعة</a></li>
                                    <li><hr class="dropdown-divider"></li>
                                    <li>
                                        <form action="/receipt/{{ $receipt->id }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="dropdown-item text-danger" onclick="return confirm('هل أنت متأكد من حذف هذا السند؟')">
                                                <i class="fas fa-trash-alt me-2"></i>حذف
                                            </button>
                                        </form>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="mb-3">
                                <h5 class="text-success mb-1">
                                    {{ number_format($receipt->amount ?? 0, 2) }}
                                    <small>{{ $receipt->currency ?? 'SAR' }}</small>
                                </h5>
                                <p class="text-muted mb-0">{{ $receipt->description ?? 'لا يوجد وصف' }}</p>
                            </div>
                            <div class="d-flex align-items-center">
                                <div class="flex-grow-1">
                                    <small class="text-muted">
                                        <i class="fas fa-user me-1"></i>
                                        @if(isset($receipt->employee))
                                            {{ $receipt->employee->first_name . ' ' . $receipt->employee->last_name }}
                                        @else
                                            موظف غير معروف
                                        @endif
                                    </small>
                                </div>
                                <div>
                                    <span class="badge bg-{{ $receipt->status == 'paid' ? 'success' : 'warning' }}">
                                        {{ $receipt->status == 'paid' ? 'مدفوع' : 'معلق' }}
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        @else
            <div class="text-center py-5">
                <div class="text-muted">
                    <i class="fas fa-receipt fa-3x mb-3"></i>
                    <h4>لا توجد سندات</h4>
                    <p>لم يتم العثور على أي سندات قبض في النظام</p>
                </div>
            </div>
        @endif
    </div>

    <!-- الأنماط -->
    <style>
.bg-gradient-primary {
    background: linear-gradient(45deg, #4e73df 0%, #224abe 100%);
}

.bg-gradient-info {
    background: linear-gradient(45deg, #36b9cc 0%, #1a8a9c 100%);
}

.bg-gradient-success {
    background: linear-gradient(45deg, #1cc88a 0%, #13855c 100%);
}

.bg-gradient-warning {
    background: linear-gradient(45deg, #f6c23e 0%, #dda20a 100%);
}

.card {
    transition: transform 0.2s;
}

.card:hover {
    transform: translateY(-5px);
}

.table th {
    font-weight: 600;
}

.btn-group .btn:hover {
    background-color: #f8f9fa;
}

.opacity-50 {
    opacity: 0.5;
}
</style>

    <!-- السكربتات -->
    <script>
        // تفعيل/إخفاء البحث المتقدم
        function toggleAdvancedSearch() {
            const advancedSearch = document.getElementById('advanced-search');
            if (advancedSearch.style.display === 'none' || advancedSearch.style.display === '') {
                advancedSearch.style.display = 'block';
            } else {
                advancedSearch.style.display = 'none';
            }
        }

        // إعادة تعيين الفلاتر
        function resetFilters() {
            document.getElementById('code').value = '';
            document.getElementById('category').value = '';
            document.getElementById('status').value = '';
            document.getElementById('date').value = '';
            document.getElementById('description').value = '';
            document.getElementById('amount-more').value = '';
            document.getElementById('amount-less').value = '';
            document.getElementById('added-by').value = '';
            document.getElementById('account').value = '';
            document.getElementById('salesman').value = '';
            document.getElementById('date-range-from').value = '';
            document.getElementById('date-range-to').value = '';
        }

        // دالة البحث
        function search() {
            // يمكن إضافة منطق البحث هنا
            console.log('تم تنفيذ البحث');
        }
    </script>
