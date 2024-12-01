<!-- عرض الرسائل -->
@if(session('error'))
    <div class="notification-popup error" id="errorAlert" dir="rtl">
        <div class="notification-content">
            <div class="icon-box">
                <i class="fas fa-exclamation-triangle"></i>
            </div>
            <div class="notification-text">
                <h3>تنبيه!</h3>
                <p>{{ __('purchase_admin.'.session('error')) }}</p>
            </div>
        </div>
        <button class="close-notification" onclick="this.parentElement.remove()">
            <i class="fas fa-times"></i>
        </button>
        <div class="notification-progress"></div>
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
        <div class="filter-section">
            <div class="form-row">
                <div class="form-group col-md-3">
                    <label for="client">{{ trans('purchase_admin.client') }}</label>
                    <select id="client" class="form-control">
                        <option>{{ trans('purchase_admin.any_client') }}</option>
                    </select>
                </div>
                <div class="form-group col-md-3">
                    <label for="invoiceNumber">{{ trans('purchase_admin.invoice_number') }}</label>
                    <input type="text" id="invoiceNumber" class="form-control">
                </div>
                <div class="form-group col-md-3">
                    <label for="status">{{ trans('purchase_admin.status') }}</label>
                    <select id="status" class="form-control">
                        <option>{{ trans('purchase_admin.any_status') }}</option>
                    </select>
                </div>
            </div>
        </div>

        <!-- Advanced Search Form Section -->
        <div id="advancedSearchForm" style="display: none;">
            <div class="card mt-3">
                <div class="card-body">
                    <h5 class="card-title">{{ trans('purchase_admin.advanced_search') }}</h5>
                    <div class="row">
                        <div class="col-md-4 mb-3">
                            <label>{{ trans('purchase_admin.item') }}</label>
                            <input type="text" class="form-control">
                        </div>
                        <div class="col-md-4 mb-3">
                            <label>{{ trans('purchase_admin.currency') }}</label>
                            <select class="form-control">
                                <option>{{ trans('purchase_admin.all') }}</option>
                            </select>
                        </div>
                        <div class="col-md-4 mb-3">
                            <label>{{ trans('purchase_admin.total_amount') }}</label>
                            <input type="number" class="form-control">
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Action Buttons Always Visible -->
        <div class="d-flex mb-3 mt-3">
            <button class="btn btn-primary ml-2">{{ trans('purchase_admin.search') }}</button>
            <button class="btn btn-secondary ml-2" id="resetFiltersBtn">{{ trans('purchase_admin.reset_filters') }}</button>
            <button class="btn btn-outline-secondary ml-2" id="toggleAdvancedSearch">
                <i class="fas fa-search-plus"></i> {{ trans('purchase_admin.advanced_search') }}
            </button>
        </div>

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
                                <button class="action-btn view-btn" onclick="window.location.href='{{ route('invoice_preview', ['id' => $invoice->invoice_id]) }}'">
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

@section('scripts')
<script type="text/javascript">
document.addEventListener('DOMContentLoaded', function() {
    // تفعيل البحث المتقدم
    document.getElementById('toggleAdvancedSearch').addEventListener('click', function() {
        var advancedForm = document.getElementById('advancedSearchForm');
        if (advancedForm.style.display === 'none' || advancedForm.style.display === '') {
            advancedForm.style.display = 'block';
        } else {
            advancedForm.style.display = 'none';
        }
    });

    // إعادة تعيين النموذج
    document.getElementById('resetFiltersBtn').addEventListener('click', function(e) {
        e.preventDefault();
        document.querySelectorAll('form').forEach(form => form.reset());
    });
});

function showUnauthorizedMessage(action) {
    const messages = {
        'edit': '{{ trans('purchase_admin.unauthorized_edit') }}',
        'delete': '{{ trans('purchase_admin.unauthorized_delete') }}'
    };
    alert(messages[action]);
}
</script>
