<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">

<!-- Header -->
<div class="header-bar">
    <h4>{{ __('debit-notices.credit_note_management') }}</h4>
</div>

<!-- Header Buttons -->
<div class="d-flex justify-content-between align-items-center mt-3">
    <!-- زر إنشاء إشعار دائنة -->
    <button class="btn btn-success" onclick="window.location.href='{{ route('credit-note') }}'">
        <i class="fas fa-plus-circle"></i> {{ __('debit-notices.create_credit_note') }}
    </button>

    @if ($errors->has('issue_date'))
        <div class="text-danger">
            {{ $errors->first('issue_date') }}
        </div>
    @endif

    <!-- القائمة المنسدلة للإجراءات -->
    <div class="action-buttons d-flex align-items-center">
        <div class="dropdown me-3">
            <button class="btn btn-primary dropdown-toggle" type="button" id="actionsDropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                {{ __('debit-notices.actions') }}
            </button>
            <div class="dropdown-menu" aria-labelledby="actionsDropdown">
                <a class="dropdown-item" href="#"><i class="fas fa-trash-alt text-danger"></i> {{ __('debit-notices.delete') }}</a>
                <a class="dropdown-item" href="#"><i class="fas fa-paper-plane text-info"></i> {{ __('debit-notices.send_invoices') }}</a>
            </div>
        </div>

        <!-- عنصر التنقل للصفحات -->
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
</div>

<!-- Search Fields -->
<div class="form-section mt-4">
    <form>
        <div class="form-row">
            <div class="form-group col-md-6">
                <label for="client">{{ __('debit-notices.client') }}</label>
                <select id="client" class="form-control">
                    <option>{{ __('debit-notices.select_client') }}</option>
                    <option>عميل 1</option>
                    <option>عميل 2</option>
                </select>
            </div>
            <div class="form-group col-md-6">
                <label for="invoiceNumber">{{ __('debit-notices.invoice_number') }}</label>
                <input type="text" id="invoiceNumber" class="form-control" placeholder="{{ __('debit-notices.enter_invoice_number') }}">
            </div>
        </div>
    </form>
</div>

<!-- Advanced Search Section -->
<div class="collapse" id="advancedSearchForm">
    <form>
        <div class="filter-section mt-4 p-3 border rounded bg-light">
            <!-- الصف الأول -->
            <div class="form-row mb-3">
                <div class="form-group col-md-3">
                    <label>{{ __('debit-notices.contains_item') }}</label>
                    <input type="text" class="form-control" placeholder="{{ __('debit-notices.enter_item') }}">
                </div>
                <div class="form-group col-md-3">
                    <label>{{ __('debit-notices.currency') }}</label>
                    <select class="form-control">
                        <option>{{ __('debit-notices.any') }}</option>
                    </select>
                </div>
                <div class="form-group col-md-3">
                    <label>{{ __('debit-notices.total_greater_than') }}</label>
                    <input type="text" class="form-control" placeholder="{{ __('debit-notices.enter_value') }}">
                </div>
                <div class="form-group col-md-3">
                    <label>{{ __('debit-notices.total_less_than') }}</label>
                    <input type="text" class="form-control" placeholder="{{ __('debit-notices.enter_value') }}">
                </div>
            </div>
        </div>
    </form>
</div>

<!-- الصف الثاني -->
<div class="form-row mb-3">
    <div class="form-group col-md-3">
        <label class="form-label">{{ __('debit-notices.date') }}</label>
        <select class="form-control">
            <option value="custom">{{ __('debit-notices.custom') }}</option>
            <option value="last_month">{{ __('debit-notices.last_month') }}</option>
            <option value="last_year">{{ __('debit-notices.last_year') }}</option>
        </select>
    </div>
    <div class="form-group col-md-3">
        <label class="form-label">{{ __('debit-notices.delivery_from_to') }}</label>
        <div class="input-group">
            <input type="text" id="deliveryStartDate" class="form-control" placeholder="{{ __('debit-notices.from') }}">
            <input type="text" id="deliveryEndDate" class="form-control" placeholder="{{ __('debit-notices.to') }}">
        </div>
    </div>
    <div class="form-group col-md-3">
        <label class="form-label">{{ __('debit-notices.due_date') }}</label>
        <select class="form-control">
            <option value="custom">{{ __('debit-notices.custom') }}</option>
            <option value="last_month">{{ __('debit-notices.last_month') }}</option>
            <option value="last_year">{{ __('debit-notices.last_year') }}</option>
        </select>
    </div>
    <div class="form-group col-md-3">
        <label class="form-label">{{ __('debit-notices.due_from_to') }}</label>
        <div class="input-group">
            <input type="text" id="dueStartDate" class="form-control" placeholder="{{ __('debit-notices.from') }}">
            <input type="text" id="dueEndDate" class="form-control" placeholder="{{ __('debit-notices.to') }}">
        </div>
    </div>
</div>

<!-- الصف الثالث -->
<div class="form-row mb-3">
    <div class="form-group col-md-3">
        <label>{{ __('debit-notices.source') }}</label>
        <select class="form-control">
            <option>{{ __('debit-notices.all') }}</option>
            <option>{{ __('debit-notices.desktop_app') }}</option>
            <option>{{ __('debit-notices.mobile_app') }}</option>
            <option>salla</option>
            <option>API</option>
            <option>{{ __('debit-notices.debit_notice') }}</option>
        </select>
    </div>
    <div class="form-group col-md-3">
        <label>{{ __('debit-notices.custom_field') }}</label>
        <input type="text" class="form-control" placeholder="{{ __('debit-notices.enter_field') }}">
    </div>
    <div class="form-group col-md-3">
        <label>{{ __('debit-notices.creation_date') }}</label>
        <select class="form-control">
            <option value="custom">{{ __('debit-notices.custom') }}</option>
            <option value="last_month">{{ __('debit-notices.last_month') }}</option>
            <option value="last_year">{{ __('debit-notices.last_year') }}</option>
        </select>
    </div>
    <div class="form-group col-md-3">
        <label>{{ __('debit-notices.delivery_from_to') }}</label>
        <div class="input-group">
            <input type="text" id="deliveryStartDate" class="form-control" placeholder="{{ __('debit-notices.from') }}">
            <input type="text" id="deliveryEndDate" class="form-control" placeholder="{{ __('debit-notices.to') }}">
        </div>
    </div>
</div>

<!-- الصف الرابع -->
<div class="form-row mb-3">
    <div class="form-group col-md-3">
        <label>{{ __('debit-notices.delivery_status') }}</label>
        <select class="form-control">
            <option>{{ __('debit-notices.all') }}</option>
            <option>{{ __('debit-notices.partial_delivered') }}</option>
            <option>{{ __('debit-notices.partial_rejected') }}</option>
            <option>{{ __('debit-notices.delivered') }}</option>
            <option>{{ __('debit-notices.delivered') }}</option>
            <option>{{ __('debit-notices.rejected') }}</option>
        </select>
    </div>
    <div class="form-group col-md-3">
        <label>{{ __('debit-notices.sales_representative') }}</label>
        <select class="form-control">
            <option>{{ __('debit-notices.any_sales_rep') }}</option>
        </select>
    </div>
    <div class="form-group col-md-3">
        <label>{{ __('debit-notices.added_by') }}</label>
        <select class="form-control">
            <option>{{ __('debit-notices.any_employee') }}</option>
        </select>
    </div>
    <div class="form-group col-md-3">
        <label>{{ __('debit-notices.order_source') }}</label>
        <select class="form-control">
            <option>{{ __('debit-notices.select') }}</option>
        </select>
    </div>
</div>


                <!-- الصف الأخير -->
                <div class="form-row">
                    <div class="form-group col-md-3">
                        <label>Pos Shift</label>
                        <input type="text" class="form-control" placeholder="أدخل Pos Shift">
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


    <div class="row">
    <!-- Repeat this card for each item -->
    <div class="col-12 mb-3">
        <div class="card">
            <div class="card-body d-flex justify-content-between align-items-center">
                <div class="d-flex align-items-center">
                    <div>
                        <h6 class="mb-1">لمسات الاحتراف للتموين الغذائي</h6>
                        <small class="text-muted">{{ __('debit-notices.riyadh') }}</small><br>
                        <small class="text-muted">{{ __('debit-notices.tax_number') }}: 311196745400003</small>
                    </div>
                </div>
                <div>
                    <p class="mb-1 fw-bold">216.00 ر.س</p>
                    <small class="text-muted">#0053</small>
                </div>
                <!-- Dropdown button -->
                <div class="dropdown">
                    <button class="btn btn-secondary" type="button" id="actionsDropdown2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="fas fa-ellipsis-v"></i>
                    </button>
                    <div class="dropdown-menu" aria-labelledby="actionsDropdown2" dir="rtl">
                        <a class="dropdown-item" href="#"><i class="fas fa-eye text-primary"></i> {{ __('debit-notices.view') }}</a>
                        <a class="dropdown-item" href="#"><i class="fas fa-edit text-warning"></i> {{ __('debit-notices.edit') }}</a>
                        <a class="dropdown-item" href="#"><i class="fas fa-paper-plane text-info"></i> {{ __('debit-notices.send_to_client') }}</a>
                        <a class="dropdown-item" href="#"><i class="fas fa-file-pdf text-danger"></i> {{ __('debit-notices.pdf') }}</a>
                        <a class="dropdown-item" href="#"><i class="fas fa-image text-success"></i> {{ __('debit-notices.image') }}</a>
                        <a class="dropdown-item" href="#"><i class="fas fa-copy text-secondary"></i> {{ __('debit-notices.copy') }}</a>
                        <a class="dropdown-item" href="#"><i class="fas fa-trash-alt text-danger"></i> {{ __('debit-notices.delete') }}</a>
                    </div>
                </div>
            </div>
            <div class="card-footer d-flex justify-content-between align-items-center bg-light">
                <small>{{ __('debit-notices.by') }}: محمد الادريسي</small>
                <small>18:25:31 24/02/2024</small>
            </div>
        </div>
    </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>



