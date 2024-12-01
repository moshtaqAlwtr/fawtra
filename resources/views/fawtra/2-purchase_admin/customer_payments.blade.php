<!DOCTYPE html>
<html lang="ar">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>مدفوعات العملاء</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
    <link rel="stylesheet" href="../Design/css/data.css">
    <style>
        body {
            direction: rtl;
            background-color: #f1f5f9;
        }
        .navbar {
            background-color: #0078d7;
            color: white;
            padding: 10px;
        }
        .navbar a {
            color: white;
            text-decoration: none;
        }
        .header {
            padding: 15px;
            background-color: #f8f9fa;
            border-bottom: 1px solid #ddd;
            text-align: center;
        }
        .content {
            padding: 20px;
        }
        .btn-actions {
            background-color: #28a745;
            color: white;
            margin-bottom: 20px;
            border-radius: 50px;
            padding: 10px 20px;
        }
        .advanced-search {
            display: none;
            background-color: #ffffff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
        }
        .toggle-advanced-search {
            color: #007bff;
            cursor: pointer;
        }
        .results {
            margin-top: 20px;
            background-color: white;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
        }
        .results table {
            width: 100%;
            text-align: center;
        }
        .results table th, .results table td {
            padding: 15px;
            border: 1px solid #ddd;
        }
        .actions-btn {
            color: #0078d7;
            background-color: #f1f5f9;
            border-radius: 50px;
        }
        .form-section {
            padding: 20px;
            background-color: #ffffff;
            border-radius: 8px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
        }
    </style>
</head>
<body>

<!-- الشريط العلوي -->
<nav class="navbar d-flex justify-content-between align-items-center">
</nav>

<!-- المحتوى -->

<div class="header d-flex justify-content-between align-items-center">
    <h4 class="mb-0">{{ __('mohammed.customer_payments') }}</h4>
    
    <div class="d-flex align-items-center">
        <!-- الإجراءات -->
        <div class="dropdown mr-3">
            <button class="btn btn-primary dropdown-toggle" type="button" id="actionsDropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                {{ __('mohammed.actions') }}
            </button>
            <div class="dropdown-menu" aria-labelledby="actionsDropdown" dir="rtl">
                <a class="dropdown-item" href="#"><i class="fas fa-trash-alt text-danger"></i> {{ __('mohammed.delete') }}</a>
                <a class="dropdown-item" href="#"><i class="fas fa-file-pdf text-danger"></i> {{ __('mohammed.print_pdf') }}</a>
            </div>
        </div>

        <!-- الترقيم -->
        <nav aria-label="pagination">
            <ul class="pagination mb-0">
                <li class="page-item disabled"><a class="page-link" href="#">{{ __('mohammed.previous') }}</a></li>
                <li class="page-item active"><a class="page-link" href="#">1</a></li>
                <li class="page-item"><a class="page-link" href="#">2</a></li>
                <li class="page-item"><a class="page-link" href="#">3</a></li>
                <li class="page-item"><a class="page-link" href="#">{{ __('mohammed.next') }}</a></li>
            </ul>
        </nav>
    </div>
</div>

<div class="d-flex justify-content-between mt-4">
    <div class="dropdown-menu text-right" aria-labelledby="actionsMenu">
        <a class="dropdown-item" href="#">{{ __('mohammed.page_current') }}</a>
        <a class="dropdown-item" href="#">{{ __('mohammed.all_pages') }}</a>
    </div>
</div>

<!-- البحث -->
<div class="form-section mt-4">
    <h5 class="mb-4">{{ __('mohammed.search') }}</h5>

    <form class="form-row align-items-center">
        <div class="form-group col-md-4 mb-2">
            <input type="text" class="form-control" id="invoiceNumber" placeholder="{{ __('mohammed.invoice_number') }}">
        </div>
        <div class="form-group col-md-4 mb-2">
            <input type="text" class="form-control" id="invoiceNumber" placeholder="{{ __('mohammed.payment_number') }}">
        </div>
        
        <div class="form-group col-md-4 d-flex">
            <select class="form-control">
                <option>{{ __('mohammed.any_customer') }}</option>
            </select>
        </div>
    </form>

    <!-- زر بحث متقدم -->
    
    <!-- البحث المتقدم -->
    <div class="collapse" id="advancedSearchForm">
        <form>
            <div class="filter-section mt-3">
                <!-- First Row -->
                <div class="form-row">
                    <div class="form-group col-md-4">
                        <label>{{ __('mohammed.payment_method') }}</label>
                        <select class="form-control">
                            <option>{{ __('mohammed.any_payment_method') }}</option>
                            <option>{{ __('mohammed.cash') }}</option>
                            <option>{{ __('mohammed.check') }}</option>
                            <option>{{ __('mohammed.bank_transfer') }}</option>
                            <option>{{ __('mohammed.paytabs') }}</option>
                            <option>{{ __('mohammed.cod') }}</option>
                            <option>{{ __('mohammed.credit_balance') }}</option>
                        </select>
                    </div>
                    
                    <div class="form-group col-md-4">
                        <label>{{ __('mohammed.date') }}</label>
                        <select class="form-control">
                            <option value="custom">{{ __('mohammed.custom') }}</option>
                            <option value="last_month">{{ __('mohammed.last_month') }}</option>
                            <option value="last_year">{{ __('mohammed.last_year') }}</option>
                        </select>
                    </div>
                    
                    <div class="form-group col-md-4">
                        <label>{{ __('mohammed.delivery_from_to') }}</label>
                        <div class="input-group">
                            <input type="text" class="form-control" id="deliveryStartDate" placeholder="{{ __('mohammed.from') }}">
                            <input type="text" class="form-control" id="deliveryEndDate" placeholder="{{ __('mohammed.to') }}">
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>

                    
                    <!-- Second Row -->
                    <div class="form-row">
                        <div class="form-group col-md-4">
                            <label>{{ __('mohammed.identifier-namber') }} </label>
                            <input type="text" class="form-control" placeholder="رقم التعريفي">
                        </div>
                        
                        <div class="form-group col-md-4">
                            <label>{{ __('mohammed.Amount_Greater_Than') }}</label>
                            <input type="text" class="form-control" placeholder="المبلغ أكبر من">
                        </div>
                        
                        <div class="form-group col-md-4">
                            <label>{{ __('mohammed.Amount_Less_Than') }}</label>
                            <input type="text" class="form-control" placeholder="المبلغ أقل من">
                        </div>
                    </div>
                    
                    <!-- Third Row -->
                    <div class="form-row">
                        <div class="form-group col-md-4">
                            <label>{{ __('mohammed.status') }}</label>
                            <select class="form-control">
                                <option>{{ __('mohammed.any_status') }}</option>
                                <option> {{ __('mohammed.completed') }}</option>
                                <option>{{ __('mohammed.completed') }}</option>
                                <option> {{ __('mohammed.Under_Review') }}</option>
                                <option>{{ __('mohammed. Failed') }}</option>
                                <option> {{ __('mohammed.Overpaid') }}</option>
                            </select>
                        </div>
                        
                        <div class="form-group col-md-4">
                            <label>{{ __('mohammed.Creation_Date') }}</label>
                            <select class="form-control">
                                <option value="custom">{{ __('mohammed.Allocation') }}</option>
                                <option value="last_month"> {{ __('mohammed.last_month') }}</option>
                                <option value="last_year">{{ __('mohammed.last_year') }}</option>
                            </select>
                        </div>
                        <div class="form-group col-md-4">
                            <label>{{ __('mohammed.Delivery_From_To') }} </label>
                            <div class="input-group">
                                <input type="text" class="form-control" id="deliveryStartDate" placeholder="من">
                                <input type="text" class="form-control" id="deliveryEndDate" placeholder="إلى">
                            </div>
                        </div>
                        
                       
                    </div>
                    
                    <!-- Fourth Row -->
                    <div class="form-row">
                        <div class="form-group col-md-3">
                            <label>Pos Shift</label>
                            <input type="text" class="form-control" placeholder="Pos Shift">
                        </div>
                        
                        <div class="form-group col-md-3">
                            <label> {{ __('mohammed.Invoice_Creator') }}</label>
                            <select class="form-control">
                                <option>{{ __('mohammed.Any_Representative') }} </option>
                            </select>
                        </div>
                        
                        <div class="form-group col-md-3">
                            <label>{{ __('mohammed.Collected_By') }}</label>
                            <select class="form-control">
                                <option>{{ __('mohammed.any_employee') }}</option>
                            </select>
                        </div>
                        
                        <div class="form-group col-md-3">
                            <label> {{ __('mohammed.Added_By') }}</label>
                            <select class="form-control">
                                <option> {{ __('mohammed.any_employee') }}</option>
                            </select>
                        </div>
                    </div>
                    
                </div>
            </form>
        </div>
        
        
    
        <!-- Action Buttons Always Visible -->
        <div class="d-flex mb-3 mt-3">
            <button class="btn btn-primary ml-2 mr-2">{{ __('mohammed.search') }}</button>
            <button class="btn btn-secondary ml-2 mr-2"> {{ __('mohammed.reset') }}</button>
            <button class="btn btn-outline-secondary ml-2 mr-2" data-toggle="collapse" data-target="#advancedSearchForm" aria-expanded="false" aria-controls="advancedSearchForm">
                <i class="bi bi-sliders"></i> {{ __('mohammed.advanced_search') }}
            </button>
        </div>
    </div>
<!-- نتائج البحث -->
<div class="row">
    <!-- Repeat this card for each item -->
    <div class="col-12 mb-3">
        <div class="card">
            <div class="card-body d-flex justify-content-between align-items-center">
                <div class="d-flex align-items-center">
                    <div>
                        <h6 class="mb-1">{{ __('mohammed.company_name') }}</h6>
                        <small class="text-muted">{{ __('mohammed.city') }}</small><br>
                        <small class="text-muted">{{ __('mohammed.tax_number') }}: 311196745400003</small>
                    </div>
                </div>
                <div>
                    <p class="mb-1 fw-bold">{{ __('mohammed.amount') }}</p>
                    <small class="text-muted">{{ __('mohammed.invoice_number') }}</small>
                </div>
                <!-- Dropdown button -->
                <div class="dropdown">
                    <button class="btn btn-secondary" type="button" id="actionsDropdown2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="fas fa-ellipsis-v"></i>
                    </button>
                    <div class="dropdown-menu" aria-labelledby="actionsDropdown2" dir="rtl">
                        <a class="dropdown-item" href="#"><i class="fas fa-eye text-primary"></i> {{ __('mohammed.view') }}</a>
                        <a class="dropdown-item" href="#"><i class="fas fa-edit text-warning"></i> {{ __('mohammed.edit') }}</a>
                        <a class="dropdown-item" href="#"><i class="fas fa-paper-plane text-info"></i> {{ __('mohammed.send_to_client') }}</a>
                        <a class="dropdown-item" href="#"><i class="fas fa-file-pdf text-danger"></i> {{ __('mohammed.pdf') }}</a>
                        <a class="dropdown-item" href="#"><i class="fas fa-image text-success"></i> {{ __('mohammed.image') }}</a>
                        <a class="dropdown-item" href="#"><i class="fas fa-copy text-secondary"></i> {{ __('mohammed.copy') }}</a>
                        <a class="dropdown-item" href="#"><i class="fas fa-trash-alt text-danger"></i> {{ __('mohammed.delete') }}</a>
                    </div>
                </div>
            </div>
            <div class="card-footer d-flex justify-content-between align-items-center bg-light">
                <small>{{ __('mohammed.by') }}: محمد الادريسي</small>
                <small>{{ __('mohammed.time') }}</small>
            </div>
        </div>
    </div>
</div>



<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.2/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

<script src="../js/date.js" ></script>
<script>
    // Toggle advanced search
    $('.toggle-advanced-search').click(function() {
        $('#advancedSearch').slideToggle();
    });
</script>

</body>
</html>
