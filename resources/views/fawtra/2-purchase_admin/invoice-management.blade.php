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
        <div class="filter-section">
            <form action="{{ route('invoices.filter') }}" method="POST">
                @csrf
                <div class="form-row">
                    <div class="form-group col-md-3">
                        <label>Invoice Number</label>
                        <input type="text" class="form-control" name="invoice_number" id="invoice_number">
                    </div>

                    <div class="form-group col-md-3">
                        <label>Client</label>
                        <select class="form-control" name="client" id="client">
                            <option value="">Any Client</option>
                            @if(isset($clients) && $clients->count() > 0)
                                @foreach($clients as $client)
                                    <option value="{{ $client->id }}">{{ $client->trade_name }}</option>
                                @endforeach
                            @endif
                        </select>
                    </div>

                    <div class="form-group col-md-3">
                        <label>Status</label>
                        <select class="form-control" name="status" id="status">
                            <option value="">Any Status</option>
                            <option value="paid">Paid</option>
                            <option value="unpaid">Unpaid</option>
                            <option value="partial">Partial</option>
                        </select>
                    </div>

                    <div class="form-group col-md-3">
                        <label>Currency</label>
                        <select class="form-control" name="currency" id="currency">
                            <option value="">Any</option>
                            <option value="SAR">SAR</option>
                            <option value="USD">USD</option>
                            <option value="EUR">EUR</option>
                        </select>
                    </div>

                    <div class="form-group col-md-3">
                        <label>Date</label>
                        <div class="input-group">
                            <input type="date" class="form-control" name="date_from" id="date_from" placeholder="From">
                            <div class="input-group-prepend">
                                <span class="input-group-text">-</span>
                            </div>
                            <input type="date" class="form-control" name="date_to" id="date_to" placeholder="To">
                        </div>
                    </div>

                    <div class="form-group col-md-3">
                        <label>Due Date</label>
                        <div class="input-group">
                            <input type="date" class="form-control" name="due_date_from" id="due_date_from" placeholder="From">
                            <div class="input-group-prepend">
                                <span class="input-group-text">-</span>
                            </div>
                            <input type="date" class="form-control" name="due_date_to" id="due_date_to" placeholder="To">
                        </div>
                    </div>

                    <div class="form-group col-md-3">
                        <label>Creation Date</label>
                        <div class="input-group">
                            <input type="date" class="form-control" name="creation_date_from" id="creation_date_from" placeholder="From">
                            <div class="input-group-prepend">
                                <span class="input-group-text">-</span>
                            </div>
                            <input type="date" class="form-control" name="creation_date_to" id="creation_date_to" placeholder="To">
                        </div>
                    </div>

                    <div class="form-group col-md-3">
                        <label>Sales Manager</label>
                        <select class="form-control" name="sales_manager" id="sales_manager">
                            <option value="">Any Sales Manager</option>
                            @if(isset($employees) && $employees->count() > 0)
                                @foreach($employees as $employee)
                                    <option value="{{ $employee->employee_id }}">{{ $employee->first_name }}</option>
                                @endforeach
                            @endif
                        </select>
                    </div>

                    <div class="form-group col-md-3">
                        <label>Created By</label>
                        <select class="form-control" name="created_by" id="created_by">
                            <option value="">Any Employee</option>
                            @if(isset($employees) && $employees->count() > 0)
                                @foreach($employees as $employee)
                                    <option value="{{ $employee->employee_id }}">{{ $employee->first_name }}</option>
                                @endforeach
                            @endif
                        </select>
                    </div>

                    <div class="form-group col-md-3">
                        <label>Delivery Status</label>
                        <select class="form-control" name="delivery_status" id="delivery_status">
                            <option value="">All</option>
                        </select>
                    </div>

                    <div class="form-group col-md-3">
                        <label>Source</label>
                        <select class="form-control" name="source" id="source">
                            <option value="">Please Select</option>
                        </select>
                    </div>

                    <div class="form-group col-md-3">
                        <label>Shipping Options</label>
                        <select class="form-control" name="shipping_options" id="shipping_options">
                            <option value="">All</option>
                        </select>
                    </div>

                    <div class="form-group col-md-3">
                        <label>Pos Shift</label>
                        <input type="text" class="form-control" name="pos_shift" id="pos_shift">
                    </div>

                    <div class="form-group col-md-3">
                        <label>Contains Item</label>
                        <input type="text" class="form-control" name="contains_item" id="contains_item">
                    </div>

                    <div class="form-group col-md-3">
                        <label>Total Amount From</label>
                        <input type="number" step="0.01" class="form-control" name="total_amount_from" id="total_amount_from">
                    </div>

                    <div class="form-group col-md-3">
                        <label>Total Amount To</label>
                        <input type="number" step="0.01" class="form-control" name="total_amount_to" id="total_amount_to">
                    </div>
                </div>

                <div class="form-row mt-3">
                    <div class="form-group col-12">
                        <button type="submit" class="btn btn-primary">
                            <i class="fas fa-search"></i> Search
                        </button>
                        <button type="button" class="btn btn-secondary" onclick="clearForm()">
                            <i class="fas fa-undo"></i> Clear
                        </button>
                    </div>
                </div>
            </form>
        </div>

        <!-- Advanced Search Form Section -->
        <div id="advancedSearchForm" style="display: none;" class="advanced-search-section">
            <h5 class="advanced-search-title">{{ trans('purchase_admin.advanced_search') }}</h5>
            <form id="advancedSearchFormElement" class="advanced-search-form">
                <div class="search-row">
                    <div class="search-col">
                        <div class="form-group">
                            <label>Invoice Number</label>
                            <input type="text" class="form-control" name="invoice_number" id="invoice_number">
                        </div>
                    </div>
                    <div class="search-col">
                        <div class="form-group">
                            <label>Client</label>
                            <select class="form-control" name="client" id="client">
                                <option value="">Any Client</option>
                                @if(isset($clients) && $clients->count() > 0)
                                    @foreach($clients as $client)
                                        <option value="{{ $client->id }}">{{ $client->trade_name }}</option>
                                    @endforeach
                                @endif
                            </select>
                        </div>
                    </div>
                </div>

                <div class="search-row">
                    <div class="search-col">
                        <div class="form-group">
                            <label>Date</label>
                            <input type="date" class="form-control" name="date_from" id="date_from" placeholder="From">
                            <div class="input-group-prepend">
                                <span class="input-group-text">-</span>
                            </div>
                            <input type="date" class="form-control" name="date_to" id="date_to" placeholder="To">
                        </div>
                    </div>
                    <div class="search-col">
                        <div class="form-group">
                            <label>Status</label>
                            <select class="form-control" name="status" id="status">
                                <option value="">Any Status</option>
                                <option value="paid">Paid</option>
                                <option value="unpaid">Unpaid</option>
                                <option value="partial">Partial</option>
                            </select>
                        </div>
                    </div>
                </div>

                <div class="search-row">
                    <div class="search-col">
                        <div class="form-group">
                            <label>Total Amount</label>
                            <input type="number" step="0.01" class="form-control" name="total_amount" id="total_amount">
                        </div>
                    </div>
                    <div class="search-col">
                        <div class="form-group">
                            <label>Sales Manager</label>
                            <select class="form-control" name="sales_manager" id="sales_manager">
                                <option value="">Any Sales Manager</option>
                                @if(isset($employees) && $employees->count() > 0)
                                    @foreach($employees as $employee)
                                        <option value="{{ $employee->employee_id }}">{{ $employee->first_name }}</option>
                                    @endforeach
                                @endif
                            </select>
                        </div>
                    </div>
                </div>

                <div class="search-buttons-container">
                    <button type="submit" class="search-btn primary">
                        <i class="fas fa-search"></i>
                        Search
                    </button>
                    <button type="reset" class="search-btn outline">
                        <i class="fas fa-redo"></i>
                        Reset
                    </button>
                </div>
            </form>
        </div>
        <div class="search-buttons-container">
            <button type="button" class="search-btn primary" id="basicSearchBtn">
                <i class="fas fa-search"></i>
                Search
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
