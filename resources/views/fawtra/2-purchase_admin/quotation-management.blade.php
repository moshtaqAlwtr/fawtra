<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>إدارة عروض الأسعار</title>

   
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link rel="stylesheet" href="../Design/css/data.css">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css"> 

   
  
</head>
<body>



    <!-- عنوان الصفحة وزر إضافة -->
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2>{{ __('quotations.manage_quotations') }}</h2>
        <div class="d-flex align-items-center">
            <a href="quotation.html" class="btn btn-success ml-2">
                <i class="fas fa-plus-circle"></i> {{ __('quotations.add_new_quotation') }}
            </a>
            <button class="btn btn-secondary ml-2" onclick="location.href='../9-sales_management/schedule_appointment.html'">
                <i class="fas fa-calendar-alt"></i> {{ __('quotations.appointments') }}
            </button>
            <div class="dropdown ml-2">
                <button class="btn btn-primary dropdown-toggle" type="button" id="actionsDropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <i class="fas fa-cogs"></i> {{ __('quotations.actions') }}
                </button>
                <div class="dropdown-menu" aria-labelledby="actionsDropdown">
                    <a class="dropdown-item" href="#"><i class="fas fa-trash-alt text-danger"></i> {{ __('quotations.delete') }}</a>
                    <a class="dropdown-item" href="#"><i class="fas fa-file-export text-secondary"></i> {{ __('quotations.export') }}</a>
                </div>
            </div>
        </div>
    </div>

    <!-- نموذج البحث -->
    <div class="card mb-4">
        <div class="card-header">
            <i class="fas fa-search"></i> {{ __('quotations.search_form') }}
        </div>
        <div class="card-body">
            <form>
                <div class="form-row">
                    <div class="form-group col-md-4">
                        <label for="client">{{ __('quotations.client') }}</label>
                        <select class="form-control" id="client">
                            <option>{{ __('quotations.any_client') }}</option>
                            <option>{{ __('quotations.client1') }}</option>
                            <option>{{ __('quotations.client2') }}</option>
                        </select>
                    </div>
                    <div class="form-group col-md-4">
                        <label for="quotationNumber">{{ __('quotations.quotation_number') }}</label>
                        <input type="text" class="form-control" id="quotationNumber" placeholder="{{ __('quotations.quotation_number') }}">
                    </div>
                    <div class="form-group col-md-4">
                        <label for="status">{{ __('quotations.status') }}</label>
                        <select class="form-control" id="status">
                            <option>{{ __('quotations.any_status') }}</option>
                            <option>{{ __('quotations.open') }}</option>
                            <option>{{ __('quotations.closed') }}</option>
                        </select>
                    </div>
                </div>

                <!-- البحث المتقدم -->
                <div class="advanced-search" id="advanced-search" style="display: none;">
                    <div class="form-row">
                        <div class="form-group col-md-4">
                            <label for="currency">{{ __('quotations.currency') }}</label>
                            <select class="form-control" id="currency">
                                <option>{{ __('quotations.any_currency') }}</option>
                                <option>{{ __('quotations.sar') }}</option>
                                <option>{{ __('quotations.usd') }}</option>
                            </select>
                        </div>
                        <div class="form-group col-md-2">
                            <label for="totalMore">{{ __('quotations.total_more_than') }}</label>
                            <input type="text" class="form-control" id="totalMore" placeholder="0.00">
                        </div>
                        <div class="form-group col-md-2">
                            <label for="totalLess">{{ __('quotations.total_less_than') }}</label>
                            <input type="text" class="form-control" id="totalLess" placeholder="0.00">
                        </div>
                        <div class="form-group col-md-4">
                            <label for="createdBy">{{ __('quotations.created_by') }}</label>
                            <select class="form-control" id="createdBy">
                                <option>{{ __('quotations.any_user') }}</option>
                                <option>{{ __('quotations.user1') }}</option>
                                <option>{{ __('quotations.user2') }}</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-4">
                            <label for="salesManager">{{ __('quotations.sales_manager') }}</label>
                            <select class="form-control" id="salesManager">
                                <option>{{ __('quotations.any_sales_manager') }}</option>
                                <option>{{ __('quotations.manager1') }}</option>
                                <option>{{ __('quotations.manager2') }}</option>
                            </select>
                        </div>
                        <div class="form-group col-md-4">
                            <label for="dateRange">{{ __('quotations.date_range') }}</label>
                            <div class="input-group">
                                <input type="date" class="form-control" id="dateFrom" placeholder="{{ __('quotations.date_from') }}">
                                <input type="date" class="form-control" id="dateTo" placeholder="{{ __('quotations.date_to') }}">
                            </div>
                        </div>
                    </div>
                </div>

                <!-- أزرار البحث -->
                <div class="form-row btn-group-actions">
                    <button type="button" class="btn btn-primary mt-2">
                        <i class="fas fa-search"></i> {{ __('quotations.search') }}
                    </button>
                    <button type="reset" class="btn btn-secondary mt-2">
                        <i class="fas fa-times"></i> {{ __('quotations.cancel_filter') }}
                    </button>
                    <button type="button" class="btn btn-outline-info mt-2" onclick="toggleAdvancedSearch()">
                        <i class="fas fa-filter"></i> {{ __('quotations.advanced_search') }}
                    </button>
                </div>
            </form>
        </div>
    </div>

    <!-- عرض النتائج -->
    <div class="card">
        <div class="card-body">
            <table class="table table-bordered table-hover">
                <thead class="thead-light">
                    <tr>
                        <th>{{ __('quotations.quotation_number') }}</th>
                        <th>{{ __('quotations.client') }}</th>
                        <th>{{ __('quotations.status') }}</th>
                        <th>{{ __('quotations.total') }}</th>
                        <th>{{ __('quotations.date') }}</th>
                        <th>{{ __('quotations.actions') }}</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>00123</td>
                        <td>{{ __('quotations.client1') }}</td>
                        <td><span class="badge badge-success">{{ __('quotations.open') }}</span></td>
                        <td>150.00 {{ __('quotations.sar') }}</td>
                        <td>2024-10-28</td>
                        <td>
                            <div class="dropdown">
                                <button class="btn btn-secondary " type="button" id="actionsDropdown2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <i class="fas fa-ellipsis-v"></i>
                                </button>
                                <div class="dropdown-menu" aria-labelledby="actionsDropdown2">
                                    <a class="dropdown-item" href="#"><i class="fas fa-eye text-primary"></i> {{ __('quotations.view') }}</a>
                                    <a class="dropdown-item" href="#"><i class="fas fa-edit text-warning"></i> {{ __('quotations.edit') }}</a>
                                    <a class="dropdown-item" href="#"><i class="fas fa-paper-plane text-info"></i> {{ __('quotations.send_to_client') }}</a>
                                    <a class="dropdown-item" href="#"><i class="fas fa-file-pdf text-danger"></i> {{ __('quotations.pdf') }}</a>
                                    <a class="dropdown-item" href="#"><i class="fas fa-image text-success"></i> {{ __('quotations.image') }}</a>
                                    <a class="dropdown-item" href="#"><i class="fas fa-copy text-secondary"></i> {{ __('quotations.copy') }}</a>
                                    <a class="dropdown-item" href="#"><i class="fas fa-trash-alt text-danger"></i> {{ __('quotations.delete') }}</a>
                                </div>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td>00124</td>
                        <td>{{ __('quotations.client2') }}</td>
                        <td><span class="badge badge-secondary">{{ __('quotations.closed') }}</span></td>
                        <td>200.00 {{ __('quotations.sar') }}</td>
                        <td>2024-10-27</td>
                        <td>
                            <div class="dropdown">
                                <button class="btn btn-secondary " type="button" id="actionsDropdown3" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <i class="fas fa-ellipsis-v"></i>
                                </button>
                                <div class="dropdown-menu" aria-labelledby="actionsDropdown3">
                                    <a class="dropdown-item" href="#"><i class="fas fa-eye text-primary"></i> {{ __('quotations.view') }}</a>
                                    <a class="dropdown-item" href="#"><i class="fas fa-edit text-warning"></i> {{ __('quotations.edit') }}</a>
                                    <a class="dropdown-item" href="#"><i class="fas fa-paper-plane text-info"></i> {{ __('quotations.send_to_client') }}</a>
                                    <a class="dropdown-item" href="#"><i class="fas fa-file-pdf text-danger"></i> {{ __('quotations.pdf') }}</a>
                                    <a class="dropdown-item" href="#"><i class="fas fa-image text-success"></i> {{ __('quotations.image') }}</a>
                                    <a class="dropdown-item" href="#"><i class="fas fa-copy text-secondary"></i> {{ __('quotations.copy') }}</a>
                                    <a class="dropdown-item" href="#"><i class="fas fa-trash-alt text-danger"></i> {{ __('quotations.delete') }}</a>
                                </div>
                            </div>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>

<script>
function toggleAdvancedSearch() {
    const advancedSearch = document.getElementById('advanced-search');
    advancedSearch.style.display = advancedSearch.style.display === 'none' ? 'block' : 'none';
}
</script>




<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.1/umd/popper.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.2/dist/js/bootstrap.bundle.min.js"></script> 


<script src="../js/date.js"></script>  

</body>
</html>
