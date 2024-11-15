<div class="main-container">
    <div class="content-box">

        <div class="top-bar">
            <h5 class="mb-0">{{ trans('purchase_admin.invoice_management') }}</h5>
        </div>
        <div class="container my-4">
            <!-- Header Buttons -->
            <div class="d-flex justify-content-between align-items-center mb-3">
                <button class="btn btn-success" onclick="location.href='sales_invoice.html'">
                    <i class="fas fa-plus-circle"></i> {{ trans('purchase_admin.new_invoice') }}
                </button>

                <!-- Settings and Actions Buttons -->
                <div class="d-flex align-items-center">
                    <button class="btn btn-secondary mr-2" onclick="location.href='../9-sales_management/schedule_appointment.html'">
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
        <div class="collapse" id="advancedSearchForm">
            <form>
                <div class="filter-section mt-3">
                    <div class="form-row">
                        <div class="form-group col-md-3">
                            <label>{{ trans('purchase_admin.item') }}</label>
                            <input type="text" class="form-control">
                        </div>
                        <div class="form-group col-md-3">
                            <label>{{ trans('purchase_admin.currency') }}</label>
                            <select class="form-control">
                                <option>{{ trans('purchase_admin.all') }}</option>
                            </select>
                        </div>
                        <div class="form-group col-md-3">
                            <label>{{ trans('purchase_admin.greater_than_total') }}</label>
                            <input type="text" class="form-control">
                        </div>
                        <div class="form-group col-md-3">
                            <label>{{ trans('purchase_admin.less_than_total') }}</label>
                            <input type="text" class="form-control">
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="form-group col-md-2">
                            <label>{{ trans('purchase_admin.payment_status') }}</label>
                            <select class="form-control">
                                <option>{{ trans('purchase_admin.all') }}</option>
                            </select>
                        </div>
                        <div class="form-group col-md-2">
                            <label class="form-label">{{ trans('purchase_admin.custom_date') }}</label>
                            <div class="input-group">
                                <select class="form-control" onchange="toggleCustomDate(this)">
                                    <option value="custom">{{ trans('purchase_admin.custom_date') }}</option>
                                    <option value="last_month">{{ trans('purchase_admin.last_month') }}</option>
                                    <option value="last_year">{{ trans('purchase_admin.last_year') }}</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group col-md-3">
                            <label class="form-label">{{ trans('purchase_admin.delivery_from_to') }}</label>
                            <div class="input-group">
                                <input type="text" id="deliveryStartDate" class="form-control" placeholder="{{ trans('purchase_admin.delivery_from_to') }}">
                                <input type="text" id="deliveryEndDate" class="form-control" placeholder="{{ trans('purchase_admin.delivery_from_to') }}">
                            </div>
                        </div>
                        <div class="form-group col-md-2">
                            <label class="form-label">{{ trans('purchase_admin.due_date') }}</label>
                            <div class="input-group">
                                <select class="form-control" onchange="toggleCustomDate(this)">
                                    <option value="custom">{{ trans('purchase_admin.custom_date') }}</option>
                                    <option value="last_month">{{ trans('purchase_admin.last_month') }}</option>
                                    <option value="last_year">{{ trans('purchase_admin.last_year') }}</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group col-md-3">
                            <label class="form-label">{{ trans('purchase_admin.delivery_from_to') }}</label>
                            <div class="input-group">
                                <input type="text" id="deliveryStartDate" class="form-control" placeholder="{{ trans('purchase_admin.delivery_from_to') }}">
                                <input type="text" id="deliveryEndDate" class="form-control" placeholder="{{ trans('purchase_admin.delivery_from_to') }}">
                            </div>
                        </div>
                    </div>

                    <!-- More form fields as per original code structure -->

                </div>
            </form>
        </div>

        <!-- Action Buttons Always Visible -->
        <div class="d-flex mb-3 mt-3">
            <button class="btn btn-primary ml-2 mr-2">{{ trans('purchase_admin.search') }}</button>
            <button class="btn btn-secondary ml-2 mr-2">{{ trans('purchase_admin.reset_filters') }}</button>
            <button class="btn btn-outline-secondary ml-2 mr-2" data-toggle="collapse" data-target="#advancedSearchForm" aria-expanded="false" aria-controls="advancedSearchForm">
                <i class="bi bi-sliders"></i> {{ trans('purchase_admin.advanced_search') }}
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
        <div class="invoice-card mb-3" style="direction: rtl;">
            <div class="d-flex justify-content-between align-items-start">
                <div>
                    <h5 class="mb-1">432.00 ر.س</h5>
                    <span class="badge badge-status unpaid">{{ trans('purchase_admin.unpaid') }}</span>
                    <span class="badge badge-status pending">{{ trans('purchase_admin.due') }}</span>
                </div>
                <div class="text-right">
                    <p class="mb-1">28/10/2024 - #08732</p>
                    <p class="mb-0">بقالة الراجحي للمواد الغذائية</p>
                    <small class="text-muted">, </small><br>
                    <small class="text-muted">{{ trans('purchase_admin.by') }}:  </small>
                </div>
                <!-- Dropdown Button -->
                <div class="dropdown">
                    <button class="btn btn-light dropdown-toggle" type="button" data-toggle="dropdown" aria-expanded="false">
                        <i class="fas fa-ellipsis-h"></i>
                    </button>
                    <div class="dropdown-menu">
                        <a class="dropdown-item" href="#"><i class="fas fa-eye text-success"></i> {{ trans('purchase_admin.view') }}</a>
                        <a class="dropdown-item" href="#"><i class="fas fa-edit text-primary"></i> {{ trans('purchase_admin.edit') }}</a>
                        <a class="dropdown-item" href="#"><i class="fas fa-file-pdf text-danger"></i> PDF</a>
                        <a class="dropdown-item" href="#"><i class="fas fa-print text-secondary"></i> {{ trans('purchase_admin.print_pdf') }}</a>
                        <a class="dropdown-item" href="#"><i class="fas fa-envelope text-info"></i> {{ trans('purchase_admin.send_to_client') }}</a>
                        <a class="dropdown-item" href="#"><i class="fas fa-credit-card text-warning"></i> {{ trans('purchase_admin.add_payment') }}</a>
                        <a class="dropdown-item" href="#"><i class="fas fa-trash-alt text-danger"></i> {{ trans('purchase_admin.delete') }}</a>
                        <a class="dropdown-item" href="#"><i class="fas fa-copy text-secondary"></i> {{ trans('purchase_admin.copy') }}</a>
                    </div>
                </div>
            </div>
        </div>

        <!-- Pagination -->
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
</div>
