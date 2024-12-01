<div class="invoice-header">
    <h2>{{ __('quotations.add_quotation') }}</h2>
</div>

<div class="container mt-3">
    <div class="row">
        <div class="col-md-6">
            <div class="form-group">
                <label for="invoice-template" class="form-label">{{ __('quotations.invoice_template') }}</label>
                <select id="invoice-template" class="form-control">
                    <option selected>{{ __('quotations.default_template') }}</option>
                    <option>{{ __('quotations.template_1') }}</option>
                    <option>{{ __('quotations.template_2') }}</option>
                    <option>{{ __('quotations.template_3') }}</option>
                </select>
            </div>
        </div>
    </div>
</div>

@if($errors->any())
<div class="alert alert-danger">
    <ul>
        @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif

<div class="alert alert-success">
    <form method="POST" action="{{ route('quotes.store') }}">
        @csrf <!-- الحماية من CSRF -->
        <div class="row">
            <!-- القسم الأيمن: معلومات العميل والطريقة -->
            <div class="col-md-6 p-4 mb-4 bg-light border rounded shadow-sm">
                <h5 class="mb-4 text-primary"><i class="bi bi-person"></i> {{ __('quotations.client_information') }}</h5>
                <div class="form-group row mb-3">
                    <label class="col-sm-4 col-form-label">{{ __('quotations.method') }}</label>
                    <div class="col-sm-8">
                        <select name="method" class="form-control">
                            <option value="print" selected>{{ __('quotations.print') }}</option>
                            <option value="email">{{ __('quotations.email') }}</option>
                        </select>
                    </div>
                </div>
                <div class="form-group row mb-3">
                    <label class="col-sm-4 col-form-label">{{ __('quotations.client') }} <span class="text-danger">*</span></label>
                    <div class="col-sm-8">
                        <select name="id" class="form-control" required>
                            <option value="" selected>{{ __('quotations.select_client') }}</option>
                            @if(isset($clients) && $clients->count() > 0)
                                @foreach ($clients as $client)
                                    <option value="{{ $client->id }}">{{ $client->trade_name }} - {{ $client->first_name }} {{ $client->last_name }}</option>
                                @endforeach
                            @endif
                        </select>
                    </div>
                </div>
            </div>

            <!-- القسم الأيسر: معلومات الفاتورة -->
            <div class="col-md-6 p-4 mb-4 bg-light border rounded shadow-sm">
                <h5 class="mb-4 text-primary"><i class="bi bi-receipt"></i> {{ __('quotations.invoice_information') }}</h5>
                <div class="form-group row mb-3">
                    <label class="col-sm-4 col-form-label">{{ __('quotations.quote_number') }}</label>
                    <div class="col-sm-8">
                        <input type="text" name="quote_number" class="form-control" value="{{ $nextQuoteId ?? '' }}" readonly>
                    </div>
                </div>
                <div class="form-group row mb-3">
                    <label class="col-sm-4 col-form-label">{{ __('quotations.quote_date') }}</label>
                    <div class="col-sm-8">
                        <input type="date" id="deliveryStartDate" name="quote_date" class="form-control" required>
                    </div>
                </div>

                <div class="form-group">
                    <label for="created_by">{{ __('quotations.sales_manager') }}</label>
                    <select name="employee_id" id="created_by" class="form-control" required>
                        <option value="">{{ __('quotations.select_sales_manager') }}</option>
                        @if(isset($employees) && $employees->count() > 0)
                            @foreach ($employees as $employee)
                                <option value="{{ $employee->employee_id }}">
                                    {{ $employee->first_name }} {{ $employee->last_name }}
                                </option>
                            @endforeach
                        @endif
                    </select>
                </div>

                <div class="form-group">
                    <label for="status">{{ __('quotations.status') }}</label>
                    <select name="status" id="stat" class="form-control" required>
                        <option value="">{{ __('quotations.select_status') }}</option>
                        <option value="initial">{{ __('quotations.initial') }}</option>
                        <option value="accepted">{{ __('quotations.accepted') }}</option>
                        <option value="rejected">{{ __('quotations.rejected') }}</option>
                    </select>
                </div>

                <!-- إضافة حقول إضافية -->
                <div id="additional-fields-container"></div>
                <div class="d-flex justify-content-end mt-3">
                    <button type="button" class="btn btn-primary" onclick="addAdditionalFields()">
                        <i class="bi bi-plus-circle"></i> {{ __('quotations.add_field') }}
                    </button>
                </div>
            </div>
        </div>
    </form>
</div>


    <!-- تضمين أيقونات Bootstrap -->
    <!-- جدول الفاتورة -->
    <table class="table table-bordered mt-4">
    <thead>
        <tr>
            <th>{{ __('quotations.item') }}</th>
            <th>{{ __('quotations.description') }}</th>
            <th>{{ __('quotations.unit_price') }}</th>
            <th>{{ __('quotations.quantity') }}</th>
            <th>{{ __('quotations.discount') }}</th>
            <th>{{ __('quotations.tax_1') }}</th>
            <th>{{ __('quotations.tax_2') }}</th>
            <th>{{ __('quotations.total') }}</th>
        </tr>
    </thead>
    <tbody id="invoice-body">
        <tr>
            <td>1</td>
            <td><input type="text" class="form-control" placeholder="{{ __('quotations.description') }}"></td>
            <td><input type="number" class="form-control" placeholder="{{ __('quotations.unit_price') }}" value="0" oninput="calculateTotal(this)"></td>
            <td><input type="number" class="form-control" placeholder="{{ __('quotations.quantity') }}" value="1" oninput="calculateTotal(this)"></td>
            <td><input type="number" class="form-control" placeholder="{{ __('quotations.discount') }}" value="0" oninput="calculateTotal(this)"></td>
            <td><input type="number" class="form-control" placeholder="{{ __('quotations.tax_1') }}" value="0" oninput="calculateTotal(this)"></td>
            <td><input type="number" class="form-control" placeholder="{{ __('quotations.tax_2') }}" value="0" oninput="calculateTotal(this)"></td>
            <td><span class="total">0.00</span></td>
        </tr>
    </tbody>
    <tfoot>
        <tr>
            <td colspan="7" class="text-right"><strong>{{ __('quotations.grand_total') }}:</strong></td>
            <td><span id="grand-total">0.00</span></td>
        </tr>
    </tfoot>
</table>

<!-- زر إضافة بند جديد -->
<div class="add-item">
    <button onclick="addItem()" class="btn btn-primary">
        <i class="bi bi-plus-circle"></i> {{ __('quotations.add_row') }}
    </button>
</div>

<!-- Tabs for Different Sections -->
<ul class="nav nav-tabs" id="myTab" role="tablist">
    <li class="nav-item">
        <a class="nav-link active" id="discount-tab" data-toggle="tab" href="#discount" role="tab" aria-controls="discount" aria-selected="true">{{ __('quotations.discount_and_settlement') }}</a>
    </li>
    <li class="nav-item">
        <a class="nav-link" id="deposit-tab" data-toggle="tab" href="#deposit" role="tab" aria-controls="deposit" aria-selected="false">{{ __('quotations.deposit') }}</a>
    </li>
    <li class="nav-item">
        <a class="nav-link" id="shipping-tab" data-toggle="tab" href="#shipping" role="tab" aria-controls="shipping" aria-selected="false">{{ __('quotations.shipping_information') }}</a>
    </li>
    <li class="nav-item">
        <a class="nav-link" id="documents-tab" data-toggle="tab" href="#documents" role="tab" aria-controls="documents" aria-selected="false">{{ __('quotations.attach_documents') }}</a>
    </li>
</ul>

<!-- Tab Content -->
<div class="tab-content" id="myTabContent">
    <!-- Discount and Settlement Tab -->
    <div class="tab-pane fade show active" id="discount" role="tabpanel" aria-labelledby="discount-tab">
        <div class="form-group row mt-3">
            <label class="col-sm-2 col-form-label">{{ __('quotations.discount') }}</label>
            <div class="col-sm-3">
                <input type="text" class="form-control" placeholder="0.00">
            </div>
            <label class="col-sm-2 col-form-label">{{ __('quotations.settlement') }}</label>
            <div class="col-sm-3">
                <select class="form-control">
                    <option>{{ __('quotations.percentage') }}</option>
                    <option>{{ __('quotations.fixed_value') }}</option>
                </select>
            </div>
        </div>
    </div>

    <!-- Deposit Tab -->
    <div class="tab-pane fade" id="deposit" role="tabpanel" aria-labelledby="deposit-tab">
        <div class="form-group row mt-3 align-items-center">
            <label class="col-sm-2 col-form-label">{{ __('quotations.deposit_value') }}</label>
            <div class="col-sm-4">
                <input type="text" class="form-control" placeholder="0">
            </div>
            <label class="col-sm-2 col-form-label">{{ __('quotations.amount_paid') }}</label>
            <div class="col-sm-4">
                <select class="form-control">
                    <option>{{ __('quotations.amount') }}</option>
                    <option>{{ __('quotations.percentage') }}</option>
                </select>
            </div>
        </div>
    </div>
</div>



  <!-- Shipping Details Tab -->
<!-- Tab Content for Shipping Details -->
<div class="tab-pane fade" id="shipping" role="tabpanel" aria-labelledby="shipping-tab">
    <div class="form-row mt-3 align-items-center">
        <div class="form-group col-md-4">
            <label for="shippingCost">{{ __('quotations.shipping_cost') }}</label>
            <input type="text" class="form-control" id="shippingCost" placeholder="{{ __('quotations.enter_value') }}">
        </div>

        <div class="form-group col-md-4">
            <label for="shippingInfo">{{ __('quotations.shipping_info') }}</label>
            <select class="form-control" id="shippingInfo">
                <option>{{ __('quotations.to') }}</option>
            </select>
        </div>

        <div class="form-group col-md-4">
            <label for="warehouse">{{ __('quotations.warehouse') }}</label>
            <select class="form-control" id="warehouse">
                <option>{{ __('quotations.main_warehouse') }}</option>
                <option>{{ __('quotations.warehouse_1') }}</option>
            </select>
        </div>
    </div>
</div>

<!-- Attach Documents Tab -->
<div class="tab-pane fade" id="documents" role="tabpanel" aria-labelledby="documents-tab">
    <div class="form-group row mt-3">
        <label class="col-sm-2 col-form-label">{{ __('quotations.new_document') }}</label>
        <div class="col-sm-10">
            <input type="file" class="form-control-file">
        </div>
    </div>
</div>

<!-- Notes/Conditions Section -->
<h5>{{ __('quotations.notes_conditions') }}</h5>
<div class="editor-toolbar d-flex align-items-center">
    <button class="btn btn-light btn-sm"><i class="fas fa-minus"></i></button>
    <button class="btn btn-light btn-sm"><i class="fas fa-link"></i></button>
    <button class="btn btn-light btn-sm"><i class="fas fa-unlink"></i></button>
    <button class="btn btn-light btn-sm"><i class="fas fa-align-left"></i></button>
    <button class="btn btn-light btn-sm"><i class="fas fa-align-center"></i></button>
    <button class="btn btn-light btn-sm"><i class="fas fa-align-right"></i></button>
    <button class="btn btn-light btn-sm"><i class="fas fa-align-justify"></i></button>
    <button class="btn btn-light btn-sm"><i class="fas fa-font"></i></button>
    <select class="form-control form-control-sm mx-2" style="width: 60px;">
        <option>13</option>
        <option>14</option>
        <option>15</option>
    </select>
    <button class="btn btn-light btn-sm"><i class="fas fa-bold"></i></button>
    <button class="btn btn-light btn-sm"><i class="fas fa-italic"></i></button>
    <button class="btn btn-light btn-sm"><i class="fas fa-underline"></i></button>
    <button class="btn btn-light btn-sm"><i class="fas fa-strikethrough"></i></button>
</div>

<div class="editor-content mt-2" contenteditable="true">
    <!-- يمكن للمستخدم الكتابة هنا -->
</div>

<!-- Custom Field Settings -->
<div class="custom-field-settings">
    <h6>{{ __('quotations.custom_field_settings') }}</h6>
    <p>{{ __('quotations.modify_custom_fields') }}</p>
</div>

<!-- Buttons Section -->
<div class="button-group">
    <!-- Preview Button -->
    <div class="btn-group">
        <button class="btn btn-info dropdown-toggle" data-toggle="dropdown">{{ __('quotations.preview') }}</button>
        <div class="dropdown-menu">
            <a class="dropdown-item" href="#" onclick="previewBrowser()">{{ __('quotations.preview_browser') }}</a>
            <a class="dropdown-item" href="#" onclick="previewPDF()">{{ __('quotations.preview_pdf') }}</a>
        </div>
    </div>

    <!-- Save as Draft Button -->
    <button class="btn btn-warning" onclick="saveAsDraft()">{{ __('quotations.save_as_draft') }}</button>

    <!-- Save Button -->
    <div class="btn-group">
        <div class="d-flex justify-content-end mt-3">
            <button type="submit" class="btn btn-success"><i class="bi bi-check-circle"></i> {{ __('quotations.save') }}</button>
        </div>
    </div>
</div>
</form>

<!-- Footer -->
<div class="footer text-center mt-4">
    <p>{{ __('quotations.thank_you') }}</p>
    <p> 2024 {{ __('quotations.company_rights') }}</p>
</div>
