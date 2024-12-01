<!-- CSS Links -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">

<!-- Page Header -->
<div class="container-fluid">
    <div class="header-bar mb-4">
        <div class="d-flex justify-content-between align-items-center">
            <h4>{{ __('debit-notices.credit_note_management') }}</h4>
            <button class="btn btn-success" onclick="window.location.href='{{ route('credit-note') }}'">
                <i class="fas fa-plus-circle"></i> {{ __('debit-notices.create_credit_note') }}
            </button>
        </div>
    </div>

    <!-- Error Messages -->
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul class="mb-0">
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <!-- Actions Bar -->
    <div class="d-flex justify-content-between align-items-center mb-4">
        <div class="dropdown">
            <button class="btn btn-primary dropdown-toggle" type="button" id="actionsDropdown" data-bs-toggle="dropdown" aria-expanded="false">
                {{ __('debit-notices.actions') }}
            </button>
            <ul class="dropdown-menu" aria-labelledby="actionsDropdown">
                <li><a class="dropdown-item" href="#"><i class="fas fa-trash-alt text-danger me-2"></i>{{ __('debit-notices.delete') }}</a></li>
                <li><a class="dropdown-item" href="#"><i class="fas fa-paper-plane text-info me-2"></i>{{ __('debit-notices.send_invoices') }}</a></li>
            </ul>
        </div>

        <!-- Pagination -->
        <nav aria-label="pagination">
            <ul class="pagination mb-0">
                <li class="page-item disabled"><a class="page-link" href="#">{{ __('debit-notices.previous') }}</a></li>
                <li class="page-item active"><a class="page-link" href="#">1</a></li>
                <li class="page-item"><a class="page-link" href="#">2</a></li>
                <li class="page-item"><a class="page-link" href="#">3</a></li>
                <li class="page-item"><a class="page-link" href="#">{{ __('debit-notices.next') }}</a></li>
            </ul>
        </nav>
    </div>

    <!-- Search Section -->
    <div class="card mb-4">
        <div class="card-body">
            <!-- Basic Search -->
            <form id="searchForm">
                <div class="row mb-3">
                    <div class="col-md-6">
                        <label for="client" class="form-label">{{ __('debit-notices.client') }}</label>
                        <select id="client" class="form-select">
                            <option value="">{{ __('debit-notices.select_client') }}</option>
                            <option>عميل 1</option>
                            <option>عميل 2</option>
                        </select>
                    </div>
                    <div class="col-md-6">
                        <label for="invoiceNumber" class="form-label">{{ __('debit-notices.invoice_number') }}</label>
                        <input type="text" id="invoiceNumber" class="form-control" placeholder="{{ __('debit-notices.enter_invoice_number') }}">
                    </div>
                </div>

                <!-- Search Buttons -->
                <div class="d-flex justify-content-between align-items-center mb-3">
                    <div>
                        <button type="submit" class="btn btn-primary me-2">بحث</button>
                        <button type="button" class="btn btn-secondary me-2" onclick="resetFilters()">إلغاء الفلاتر</button>
                    </div>
                    <button class="btn btn-outline-secondary" type="button" data-bs-toggle="collapse" data-bs-target="#advancedSearchForm" aria-expanded="false">
                        <i class="fas fa-sliders-h"></i> بحث متقدم
                    </button>
                </div>

                <!-- Advanced Search -->
                <div class="collapse" id="advancedSearchForm">
                    <div class="row g-3">
                        <!-- المجموعة الأولى -->
                        <div class="col-md-3">
                            <label class="form-label">{{ __('debit-notices.contains_item') }}</label>
                            <input type="text" class="form-control" placeholder="{{ __('debit-notices.enter_item') }}">
                        </div>
                        <div class="col-md-3">
                            <label class="form-label">{{ __('debit-notices.currency') }}</label>
                            <select class="form-select">
                                <option>{{ __('debit-notices.any') }}</option>
                            </select>
                        </div>
                        <div class="col-md-3">
                            <label class="form-label">{{ __('debit-notices.total_greater_than') }}</label>
                            <input type="number" class="form-control" placeholder="{{ __('debit-notices.enter_value') }}">
                        </div>
                        <div class="col-md-3">
                            <label class="form-label">{{ __('debit-notices.total_less_than') }}</label>
                            <input type="number" class="form-control" placeholder="{{ __('debit-notices.enter_value') }}">
                        </div>

                        <!-- المجموعة الثانية -->
                        <div class="col-md-3">
                            <label class="form-label">{{ __('debit-notices.date') }}</label>
                            <select class="form-select">
                                <option value="custom">{{ __('debit-notices.custom') }}</option>
                                <option value="last_month">{{ __('debit-notices.last_month') }}</option>
                                <option value="last_year">{{ __('debit-notices.last_year') }}</option>
                            </select>
                        </div>
                        <div class="col-md-3">
                            <label class="form-label">{{ __('debit-notices.source') }}</label>
                            <select class="form-select">
                                <option>{{ __('debit-notices.all') }}</option>
                                <option>{{ __('debit-notices.desktop_app') }}</option>
                                <option>{{ __('debit-notices.mobile_app') }}</option>
                                <option>salla</option>
                                <option>API</option>
                            </select>
                        </div>
                        <div class="col-md-3">
                            <label class="form-label">{{ __('debit-notices.sales_representative') }}</label>
                            <select class="form-select">
                                <option>{{ __('debit-notices.any_sales_rep') }}</option>
                            </select>
                        </div>
                        <div class="col-md-3">
                            <label class="form-label">{{ __('debit-notices.added_by') }}</label>
                            <select class="form-select">
                                <option>{{ __('debit-notices.any_employee') }}</option>
                            </select>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <!-- Results Section -->
    <div class="row">
        <div class="col-12">
            <div class="card mb-3">
                <div class="card-body d-flex justify-content-between align-items-center">
                    <div>
                        <h6 class="mb-1">لمسات الاحتراف للتموين الغذائي</h6>
                        <small class="text-muted">الرياض</small><br>
                        <small class="text-muted">رقم الضريبي: 311196745400003</small>
                    </div>
                    <div class="text-end">
                        <p class="mb-1 fw-bold">216.00 ر.س</p>
                        <small class="text-muted">#0053</small>
                    </div>
                    <div class="dropdown">
                        <button class="btn btn-light btn-sm" type="button" data-bs-toggle="dropdown">
                            <i class="fas fa-ellipsis-v"></i>
                        </button>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="#"><i class="fas fa-eye text-primary me-2"></i>عرض</a></li>
                            <li><a class="dropdown-item" href="#"><i class="fas fa-edit text-warning me-2"></i>تعديل</a></li>
                            <li><a class="dropdown-item" href="#"><i class="fas fa-paper-plane text-info me-2"></i>إرسال</a></li>
                            <li><hr class="dropdown-divider"></li>
                            <li><a class="dropdown-item" href="#"><i class="fas fa-trash-alt text-danger me-2"></i>حذف</a></li>
                        </ul>
                    </div>
                </div>
                <div class="card-footer bg-light">
                    <div class="d-flex justify-content-between">
                        <small>بواسطة: محمد الادريسي</small>
                        <small>18:25:31 24/02/2024</small>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Scripts -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<script>
document.addEventListener('DOMContentLoaded', function() {
    var advancedSearch = document.getElementById('advancedSearchForm');
    
    document.addEventListener('click', function(event) {
        var isClickInside = advancedSearch.contains(event.target);
        var searchButton = event.target.closest('[data-bs-toggle="collapse"]');
        
        if (!isClickInside && !searchButton) {
            var bsCollapse = bootstrap.Collapse.getInstance(advancedSearch);
            if (bsCollapse && advancedSearch.classList.contains('show')) {
                bsCollapse.hide();
            }
        }
    });
});

function resetFilters() {
    document.getElementById('searchForm').reset();
    var advancedSearch = document.getElementById('advancedSearchForm');
    var bsCollapse = bootstrap.Collapse.getInstance(advancedSearch);
    if (bsCollapse) {
        bsCollapse.hide();
    }
}
</script>
