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

        <div id="advanced-search" style="display: none;">
            <div class="advanced-search-container">
                <form id="searchForm">
                    <div class="row">
                        <div class="col-md-3">
                            <div class="form-group">
                                <label class="d-block">بحث عن عنصر</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="fas fa-search"></i></span>
                                    </div>
                                    <input type="text" class="form-control" name="item_search" placeholder="ادخل اسم العنصر">
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label class="d-block">العملة</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="fas fa-money-bill-wave"></i></span>
                                    </div>
                                    <select class="form-control" name="currency">
                                        <option value="">اختر العملة</option>
                                        <option value="SAR">ريال سعودي</option>
                                        <option value="USD">دولار أمريكي</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label class="d-block">المبلغ الإجمالي</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="fas fa-dollar-sign"></i></span>
                                    </div>
                                    <input type="number" class="form-control" name="total_amount" placeholder="أدخل المبلغ">
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label class="d-block">حقل مخصص</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="fas fa-edit"></i></span>
                                    </div>
                                    <input type="text" class="form-control" name="custom_field" placeholder="أدخل قيمة">
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group date-range-container">
                                <label class="d-block">تاريخ الاستحقاق</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="fas fa-calendar-alt"></i></span>
                                    </div>
                                    <input type="date" class="form-control" name="due_date_start" placeholder="من">
                                    <input type="date" class="form-control" name="due_date_end" placeholder="إلى">
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label class="d-block">تخصيص التاريخ</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="fas fa-clock"></i></span>
                                    </div>
                                    <select class="form-control" name="date_customization">
                                        <option value="">اختر الفترة</option>
                                        <option value="today">اليوم</option>
                                        <option value="yesterday">أمس</option>
                                        <option value="last_week">الأسبوع الماضي</option>
                                        <option value="last_month">الشهر الماضي</option>
                                        <option value="last_3months">آخر 3 أشهر</option>
                                        <option value="last_6months">آخر 6 أشهر</option>
                                        <option value="last_year">السنة الماضية</option>
                                        <option value="custom">تخصيص</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group date-range-container">
                                <label class="d-block">تاريخ الإنشاء</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="fas fa-calendar-plus"></i></span>
                                    </div>
                                    <input type="date" class="form-control" name="created_date_start" placeholder="من">
                                    <input type="date" class="form-control" name="created_date_end" placeholder="إلى">
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label class="d-block">المصدر</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="fas fa-store"></i></span>
                                    </div>
                                    <select class="form-control" name="source">
                                        <option value="">اختر المصدر</option>
                                        <option value="store">متجر</option>
                                        <option value="online">أونلاين</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label class="d-block">حالة التوصيل</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="fas fa-truck"></i></span>
                                    </div>
                                    <select class="form-control" name="delivery_status">
                                        <option value="">اختر الحالة</option>
                                        <option value="delivered">تم التوصيل</option>
                                        <option value="pending">قيد الانتظار</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label class="d-block">مدير المبيعات</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="fas fa-user-tie"></i></span>
                                    </div>
                                    <select class="form-control" name="sales_manager">
                                        <option value="">اختر المدير</option>
                                        <option value="1">أحمد</option>
                                        <option value="2">محمد</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group date-range-container">
                                <label class="d-block">تاريخ الاستحقاق</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="fas fa-calendar-alt"></i></span>
                                    </div>
                                    <input type="date" class="form-control" name="due_date_start" placeholder="من">
                                    <input type="date" class="form-control" name="due_date_end" placeholder="إلى">
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group date-range-container">
                                <label class="d-block">تاريخ الإنشاء</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="fas fa-calendar-plus"></i></span>
                                    </div>
                                    <input type="date" class="form-control" name="created_date_start" placeholder="من">
                                    <input type="date" class="form-control" name="created_date_end" placeholder="إلى">
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="search-buttons-container">
                        <button type="submit" class="btn btn-primary">
                            <i class="fas fa-search"></i> بحث
                        </button>
                        <button type="reset" class="btn btn-secondary">
                            <i class="fas fa-redo"></i> إعادة تعيين
                        </button>
                    </div>
                </form>
            </div>
        </div>

        <div class="search-buttons-container">
            <button type="submit" class="btn btn-primary mr-2">
                <i class="fas fa-search"></i> {{ trans('purchase_admin.search') }}
            </button>
            <button type="reset" class="btn btn-secondary" onclick="window.location='{{ route('sales_invoice') }}'">
                <i class="fas fa-redo"></i> {{ trans('purchase_admin.reset') }}
            </button>

            <button type="button" class="btn btn-primary mb-3" onclick="showAdvanced()">
                <i class="fas fa-filter"></i> بحث متقدم
            </button>
        </div>

    </form>

        <script>
        function showAdvanced() {
            var x = document.getElementById("advanced-search");
            if (x.style.display === "none") {
                x.style.display = "block";
            } else {
                x.style.display = "none";
            }
        }
        </script>

        @push('scripts')
        <script>
        function toggleSearch() {
            var form = document.getElementById('advancedSearchForm');
            var btn = document.getElementById('toggleAdvancedSearch');

            if (!form || !btn) {
                console.error('عناصر البحث غير موجودة');
                return;
            }

            if (form.style.display === 'none' || form.style.display === '') {
                form.style.display = 'block';
                btn.innerHTML = '<i class="fas fa-times"></i> إخفاء البحث المتقدم';
            } else {
                form.style.display = 'none';
                btn.innerHTML = '<i class="fas fa-filter"></i> بحث متقدم';
            }
        }

        // تأكد من أن النموذج مخفي عند تحميل الصفحة
        document.addEventListener('DOMContentLoaded', function() {
            var form = document.getElementById('advancedSearchForm');
            if (form) {
                form.style.display = 'none';
            }
        });
        </script>
        @endpush

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
            @if($invoices->isEmpty())
                <div class="col-12 text-center mt-4">
                    <div class="alert alert-info">
                        <i class="fas fa-info-circle mr-2"></i>
                        {{ trans('purchase_admin.no_invoices_found') }}
                    </div>
                </div>
            @else
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
            @endif
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
