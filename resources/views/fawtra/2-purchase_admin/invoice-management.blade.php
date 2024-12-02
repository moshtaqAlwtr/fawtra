<!-- عرض الرسائل -->


@if(session('error'))
    <div class="alert error" id="errorAlert">
        <div class="alert-content">
            <div class="alert-icon">
                <i class="fas fa-exclamation-circle"></i>
            </div>
            <div class="alert-text">
                <h3>تنبيه!</h3>
                <p>{{ __('purchase_admin.'.session('error')) }}</p>
            </div>
        </div>
        <button class="close-btn" onclick="this.closest('.alert').remove();">
            <i class="fas fa-times"></i>
        </button>
        <div class="progress-bar"></div>
    </div>
@endif

@if(session('success'))
    <div class="alert success" id="successAlert">
        <div class="alert-content">
            <div class="alert-icon">
                <i class="fas fa-check-circle"></i>
            </div>
            <div class="alert-text">
                <h3>تم بنجاح!</h3>
                <p>{{ __('purchase_admin.'.session('success')) }}</p>
            </div>
        </div>
        <button class="close-btn" onclick="this.closest('.alert').remove();">
            <i class="fas fa-times"></i>
        </button>
        <div class="progress-bar"></div>
    </div>
@endif

<div class="main-container">
    <div class="content-box">
        <div class="top-bar">
            <h5 class="mb-0">{{ trans('purchase_admin.invoice_management') }}</h5>
        </div>

        <div class="container my-4">
            <!-- Header Buttons -->
            <div class="d-flex justify-content-between align-items-center mb-3">
                <button class="btn btn-success" onclick="location.href='{{ route('sales_invoice') }}?page=create'">
                    <i class="fas fa-plus-circle"></i> {{ trans('purchase_admin.new_invoice') }}
                </button>

                <!-- أزرار البحث الأساسية -->

                <!-- Settings and Actions Buttons -->
                <div class="d-flex align-items-center">
                    <button class="btn btn-secondary mr-2" onclick="location.href='{{route('appointments')}}'">
                        {{ trans('purchase_admin.appointments') }}
                    </button>
                    <div class="dropdown">
                        <button class="btn btn-primary dropdown-toggle" type="button" id="actionsDropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            {{ trans('purchase_admin.actions') }}
                        </button>
                        <div class="dropdown-menu" aria-labelledby="actionsDropdown" dir="rtl">
                            <a class="dropdown-item" href="#"><i class="fas fa-trash-alt text-danger"></i> {{ trans('purchase_admin.delete') }}</a>
                            <a class="dropdown-item" href="#"><i class="fas fa-paper-plane text-info"></i> {{ trans('purchase_admin.send_to_client') }}</a>
                            <a class="dropdown-item" href="#"><i class="fas fa-check-circle text-success"></i> {{ trans('purchase_admin.mark_as_paid') }}</a>
                            <a class="dropdown-item" href="#"><i class="fas fa-file-pdf text-danger"></i> {{ trans('purchase_admin.print_pdf') }}</a>
                            <a class="dropdown-item" href="#"><i class="fas fa-file-export text-secondary"></i> {{ trans('purchase_admin.export') }}</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Filter Section -->
        <div class="filter-section mb-4">
            <form action="{{ route('sales_invoice') }}" method="GET" id="searchForm">
                <div class="row">
                    <!-- رقم الفاتورة -->
                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="invoice_id">{{ trans('purchase_admin.invoice_number') }}</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fas fa-hashtag"></i></span>
                                </div>
                                <input type="text" class="form-control" id="invoice_id" name="invoice_id"
                                       value="{{ request('invoice_id') }}" placeholder="{{ trans('purchase_admin.enter_invoice_number') }}">
                            </div>
                        </div>
                    </div>

                    <!-- العميل -->
                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="client">{{ trans('purchase_admin.client') }}</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fas fa-user"></i></span>
                                </div>
                                <select class="form-control" name="client" id="client">
                                    <option value="">{{ trans('purchase_admin.all_clients') }}</option>
                                    @foreach($clients as $client)
                                        <option value="{{ $client->id }}" {{ request('client') == $client->id ? 'selected' : '' }}>
                                            {{ $client->trade_name }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>

                    <!-- حالة الدفع -->
                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="status">{{ trans('purchase_admin.payment_status') }}</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fas fa-money-check-alt"></i></span>
                                </div>
                                <select class="form-control" name="status" id="status">
                                    <option value="">{{ trans('purchase_admin.all_statuses') }}</option>
                                    <option value="paid" {{ request('status') == 'paid' ? 'selected' : '' }}>{{ trans('purchase_admin.paid') }}</option>
                                    <option value="unpaid" {{ request('status') == 'unpaid' ? 'selected' : '' }}>{{ trans('purchase_admin.unpaid') }}</option>
                                    <option value="partial" {{ request('status') == 'partial' ? 'selected' : '' }}>{{ trans('purchase_admin.partial') }}</option>
                                </select>
                            </div>
                        </div>
                    </div>

                    <!-- الموظف -->

                </div>

                <div class="row mt-3">
                    <!-- التاريخ من -->

                    <!-- أزرار البحث -->

                </div>

        </div>

        <!-- Advanced Search Form Section -->
        <div id="advancedSearchForm" class="filter-section mb-4">
            <div class="row">
                <!-- يحتوي على البند -->
                <div class="col-md-3">
                    <div class="form-group">
                        <label>{{ trans('purchase_admin.contains_item') }}</label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-box"></i></span>
                            </div>
                            <input type="text" class="form-control" name="items" value="{{ request('items') }}">
                        </div>
                    </div>
                </div>

                <!-- العملة -->
                <div class="col-md-3">
                    <div class="form-group">
                        <label>{{ trans('purchase_admin.currency') }}</label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-money-bill"></i></span>
                            </div>
                            <select class="form-control" name="currency">
                                <option value="">{{ trans('purchase_admin.all_currencies') }}</option>
                                <option value="أي" {{ request('currency') == 'أي' ? 'selected' : '' }}>أي</option>
                            </select>
                        </div>
                    </div>
                </div>

                <!-- الإجمالي أقل من -->
                <div class="col-md-3">
                    <div class="form-group">
                        <label>{{ trans('purchase_admin.total_less_than') }}</label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-dollar-sign"></i></span>
                            </div>
                            <input type="number" class="form-control" name="total_less" value="{{ request('total_less') }}">
                        </div>
                    </div>
                </div>

                <!-- الإجمالي أكبر من -->
                <div class="col-md-3">
                    <div class="form-group">
                        <label>{{ trans('purchase_admin.total_more_than') }}</label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-dollar-sign"></i></span>
                            </div>
                            <input type="number" class="form-control" name="total_more" value="{{ request('total_more') }}">
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <!-- تاريخ الاستحقاق -->
                <div class="col-md-6">
                    <div class="form-group">
                        <label>{{ trans('purchase_admin.due_date') }}</label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-calendar"></i></span>
                            </div>
                            <select class="form-control" name="due_date_type">
                                <option value="">{{ trans('purchase_admin.select_period') }}</option>
                                <option value="last_month" {{ request('due_date_type') == 'last_month' ? 'selected' : '' }}>الشهر الأخير</option>
                                <option value="last_year" {{ request('due_date_type') == 'last_year' ? 'selected' : '' }}>السنة الماضية</option>
                            </select>
                            <input type="date" class="form-control" name="due_date_from" value="{{ request('due_date_from') }}">
                            <div class="input-group-prepend">
                                <span class="input-group-text">-</span>
                            </div>
                            <input type="date" class="form-control" name="due_date_to" value="{{ request('due_date_to') }}">
                        </div>
                    </div>
                </div>

                <!-- تاريخ الإنشاء -->
                <div class="col-md-6">
                    <div class="form-group">
                        <label>{{ trans('purchase_admin.creation_date') }}</label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-calendar"></i></span>
                            </div>
                            <select class="form-control" name="creation_date_type">
                                <option value="">{{ trans('purchase_admin.select_period') }}</option>
                                <option value="last_month" {{ request('creation_date_type') == 'last_month' ? 'selected' : '' }}>الشهر الأخير</option>
                                <option value="last_year" {{ request('creation_date_type') == 'last_year' ? 'selected' : '' }}>السنة الماضية</option>
                            </select>
                            <input type="date" class="form-control" name="creation_date_from" value="{{ request('creation_date_from') }}">
                            <div class="input-group-prepend">
                                <span class="input-group-text">-</span>
                            </div>
                            <input type="date" class="form-control" name="creation_date_to" value="{{ request('creation_date_to') }}">
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <!-- حقل مخصص -->
                <div class="col-md-3">
                    <div class="form-group">
                        <label>{{ trans('purchase_admin.custom_field') }}</label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-tag"></i></span>
                            </div>
                            <input type="text" class="form-control" name="custom_field" value="{{ request('custom_field') }}">
                        </div>
                    </div>
                </div>

                <!-- المصدر -->
                <div class="col-md-3">
                    <div class="form-group">
                        <label>{{ trans('purchase_admin.source') }}</label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-database"></i></span>
                            </div>
                            <select class="form-control" name="source">
                                <option value="">{{ trans('purchase_admin.all') }}</option>
                                <option value="الكل" {{ request('source') == 'الكل' ? 'selected' : '' }}>الكل</option>
                            </select>
                        </div>
                    </div>
                </div>

                <!-- حالة التسليم -->
                <div class="col-md-3">
                    <div class="form-group">
                        <label>{{ trans('purchase_admin.delivery_status') }}</label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-truck"></i></span>
                            </div>
                            <select class="form-control" name="delivery_status">
                                <option value="">{{ trans('purchase_admin.all') }}</option>
                                <option value="الكل" {{ request('delivery_status') == 'الكل' ? 'selected' : '' }}>الكل</option>
                            </select>
                        </div>
                    </div>
                </div>

                <!-- مسؤول مبيعات -->
                <div class="col-md-3">
                    <div class="form-group">
                        <label>{{ trans('purchase_admin.sales_manager') }}</label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-user"></i></span>
                            </div>
                            <select class="form-control" name="sales_manager">
                                <option value="">{{ trans('purchase_admin.all') }}</option>
                                <option value="أي مسؤول مبيعات" {{ request('sales_manager') == 'أي مسؤول مبيعات' ? 'selected' : '' }}>أي مسؤول مبيعات</option>
                            </select>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <!-- مصدر الطلب -->
                <div class="col-md-4">
                    <div class="form-group">
                        <label>{{ trans('purchase_admin.order_source') }}</label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-shopping-cart"></i></span>
                            </div>
                            <select class="form-control" name="order_source">
                                <option value="">{{ trans('purchase_admin.select_source') }}</option>
                                <option value="من فضلك اختر" {{ request('order_source') == 'من فضلك اختر' ? 'selected' : '' }}>من فضلك اختر</option>
                            </select>
                        </div>
                    </div>
                </div>

                <!-- خيارات الشحن -->
                <div class="col-md-4">
                    <div class="form-group">
                        <label>{{ trans('purchase_admin.shipping_options') }}</label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-shipping-fast"></i></span>
                            </div>
                            <select class="form-control" name="shipping_options">
                                <option value="">{{ trans('purchase_admin.all') }}</option>
                                <option value="الكل" {{ request('shipping_options') == 'الكل' ? 'selected' : '' }}>الكل</option>
                            </select>
                        </div>
                    </div>
                </div>

                <!-- Pos Shift -->
                <div class="col-md-4">
                    <div class="form-group">
                        <label>Pos Shift</label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-cash-register"></i></span>
                            </div>
                            <input type="text" class="form-control" name="pos_shift" value="{{ request('pos_shift') }}">
                        </div>
                    </div>
                </div>
            </div>


        </div>
        <div class="search-buttons-container">

                <button type="submit" class="btn btn-primary mr-2">
                    <i class="fas fa-search"></i> {{ trans('purchase_admin.search') }}
                </button>
                <button type="reset" class="btn btn-secondary" onclick="window.location='{{ route('sales_invoice') }}'">
                    <i class="fas fa-redo"></i> {{ trans('purchase_admin.reset') }}
                </button>

            <button type="button" class="search-btn outline" id="toggleAdvancedSearch">
                <i class="fas fa-search-plus"></i>
                Advanced Search
            </button>
            <button type="button" class="search-btn secondary" id="cancelSearchBtn">
                <i class="fas fa-times"></i>
                Cancel
            </button>
        </div>
    </form>
        <!-- Tab Section -->
        <div class="tab-section d-flex justify-content-between align-items-center">
            <div>
                <button class="btn btn-outline-secondary">{{ trans('purchase_admin.all_invoices') }}</button>
                <button class="btn btn-outline-secondary">{{ trans('purchase_admin.unpaid') }}</button>
                <button class="btn btn-outline-secondary">{{ trans('purchase_admin.draft') }}</button>
                <button class="btn btn-outline-secondary">{{ trans('purchase_admin.due') }}</button>
                <button class="btn btn-outline-secondary">{{ trans('purchase_admin.paid') }}</button>
                <button class="btn btn-outline-secondary">{{ trans('purchase_admin.late') }}</button>
            </div>
            <div class="dropdown">
                <button class="btn btn-light dropdown-toggle" type="button" id="sortDropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    {{ trans('purchase_admin.sort_by_client') }}
                </button>
                <div class="dropdown-menu" aria-labelledby="sortDropdown">
                    <a class="dropdown-item" href="#">{{ trans('purchase_admin.client') }}</a>
                    <a class="dropdown-item" href="#">{{ trans('purchase_admin.creation_date') }}</a>
                    <a class="dropdown-item" href="#">{{ trans('purchase_admin.invoice_number') }}</a>
                    <a class="dropdown-item" href="#">{{ trans('purchase_admin.payment_status') }}</a>
                    <a class="dropdown-item" href="#">{{ trans('purchase_admin.due_date') }}</a>
                </div>
            </div>
        </div>

        <!-- Invoice Cards -->
        <div class="row">
            @foreach($invoices as $invoice)
                <div class="col-md-4 mb-4">
                    <div class="invoice-card">
                        <div class="invoice-card-header">
                            <div class="d-flex justify-content-between align-items-center">
                                <div class="invoice-number">
                                    <div class="number-badge">
                                        <span class="number">#{{ $invoice->invoice_number }}</span>
                                    </div>
                                </div>
                                <div class="invoice-date">
                                    <span class="date-badge">
                                        <i class="fas fa-calendar-alt"></i>
                                        {{ \Carbon\Carbon::parse($invoice->invoice_date)->format('Y/m/d') }}
                                    </span>
                                </div>
                            </div>
                        </div>

                        <div class="invoice-card-body">
                            <div class="client-info">
                                <div class="client-header">
                                    <div class="client-avatar">
                                        <div class="avatar-circle">
                                            <i class="fas fa-user-circle"></i>
                                        </div>
                                    </div>
                                    <div class="client-details">
                                        <h6 class="client-name">{{ optional($invoice->client)->trade_name }}</h6>
                                        <span class="client-email">
                                            <i class="fas fa-envelope"></i>
                                            {{ optional($invoice->client)->email }}
                                        </span>
                                    </div>
                                </div>
                            </div>

                            <div class="invoice-amount">
                                <div class="amount-circle">
                                    <div class="amount-value">
                                        <span class="currency">ر.س</span>
                                        <span class="value">{{ number_format($invoice->grand_total, 2) }}</span>
                                    </div>
                                </div>
                            </div>

                            <div class="status-section">
                                @if($invoice->payment_status == 'paid')
                                    <div class="status-indicator paid">
                                        <i class="fas fa-check-circle"></i>
                                        <span>{{ trans('purchase_admin.paid') }}</span>
                                    </div>
                                @elseif($invoice->payment_status == 'unpaid')
                                    <div class="status-indicator unpaid">
                                        <i class="fas fa-times-circle"></i>
                                        <span>{{ trans('purchase_admin.unpaid') }}</span>
                                    </div>
                                @else
                                    <div class="status-indicator partial">
                                        <i class="fas fa-clock"></i>
                                        <span>{{ trans('purchase_admin.partial') }}</span>
                                    </div>
                                @endif
                            </div>
                        </div>

                        <div class="invoice-card-footer">
                            <div class="action-buttons">
                                <button class="action-btn view-btn" onclick="window.location.href='{{ route('invoice.preview', ['id' => $invoice->invoice_id]) }}'">
                                    <i class="fas fa-eye"></i>
                                    <span class="tooltip">{{ trans('purchase_admin.view') }}</span>
                                </button>
                                <button class="action-btn print-btn">
                                    <i class="fas fa-print"></i>
                                    <span class="tooltip">{{ trans('purchase_admin.print') }}</span>
                                </button>
                                <a href="{{ route('invoice_edit', $invoice->invoice_id) }}" class="action-btn edit-btn">
                                    <i class="fas fa-edit"></i>
                                    <span class="tooltip">{{ trans('purchase_admin.edit') }}</span>
                                </a>
                                <form action="{{ route('invoice_delete', $invoice->invoice_id) }}" method="POST" style="display: inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="action-btn delete-btn">
                                        <i class="fas fa-trash-alt"></i>
                                        <span class="tooltip">{{ trans('purchase_admin.delete') }}</span>
                                    </button>
                                </form>
                            </div>
                            <div class="employee-info">
                                <div class="employee-badge">
                                    <i class="fas fa-user-tie"></i>
                                    <span>{{ optional($invoice->employee)->name }}</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>

        <!-- Loading Spinner -->
        <div class="spinner-overlay" id="searchSpinner">
            <div class="spinner"></div>
        </div>

        <!-- Pagination -->

    </div>
    <nav>
            <ul class="pagination pagination-custom">
                <li class="page-item"><a class="page-link" href="#">{{ trans('purchase_admin.previous') }}</a></li>
                <li class="page-item"><a class="page-link" href="#">1</a></li>
                <li class="page-item"><a class="page-link" href="#">2</a></li>
                <li class="page-item"><a class="page-link" href="#">3</a></li>
                <li class="page-item"><a class="page-link" href="#">{{ trans('purchase_admin.next') }}</a></li>
            </ul>
        </nav>
</div>

@push('scripts')
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const advancedSearchForm = document.getElementById('advancedSearchForm');
        const toggleButton = document.getElementById('toggleAdvancedSearch');

        // تخزين حالة البحث المتقدم في localStorage
        const isAdvancedSearchVisible = localStorage.getItem('advancedSearchVisible') === 'true';

        // تطبيق الحالة المحفوظة عند تحميل الصفحة
        if (isAdvancedSearchVisible) {
            advancedSearchForm.style.display = 'block';
            toggleButton.innerHTML = '<i class="fas fa-times"></i> {{ trans("purchase_admin.hide_advanced") }}';
            toggleButton.classList.remove('btn-info');
            toggleButton.classList.add('btn-danger');
        }

        toggleButton.addEventListener('click', function() {
            const isVisible = advancedSearchForm.style.display !== 'none';

            // تحريك سلس للنموذج
            advancedSearchForm.style.transition = 'all 0.3s ease-in-out';

            if (!isVisible) {
                advancedSearchForm.style.display = 'block';
                // إضافة تأخير صغير للسماح بالتحريك
                setTimeout(() => {
                    advancedSearchForm.style.maxHeight = '2000px';
                    advancedSearchForm.style.opacity = '1';
                }, 10);

                toggleButton.innerHTML = '<i class="fas fa-times"></i> {{ trans("purchase_admin.hide_advanced") }}';
                toggleButton.classList.remove('btn-info');
                toggleButton.classList.add('btn-danger');

                localStorage.setItem('advancedSearchVisible', 'true');
            } else {
                advancedSearchForm.style.maxHeight = '0';
                advancedSearchForm.style.opacity = '0';

                // إخفاء النموذج بعد انتهاء التحريك
                setTimeout(() => {
                    advancedSearchForm.style.display = 'none';
                }, 300);

                toggleButton.innerHTML = '<i class="fas fa-filter"></i> {{ trans("purchase_admin.advanced_search") }}';
                toggleButton.classList.remove('btn-danger');
                toggleButton.classList.add('btn-info');

                localStorage.setItem('advancedSearchVisible', 'false');
            }
        });

        // إضافة تأثير عند تمرير الماوس فوق الزر
        toggleButton.addEventListener('mouseenter', function() {
            this.style.transform = 'translateY(-2px)';
        });

        toggleButton.addEventListener('mouseleave', function() {
            this.style.transform = 'translateY(0)';
        });
    });
</script>
@endpush
