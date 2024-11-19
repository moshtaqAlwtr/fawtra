
@if($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
<div class = "alert alert-success">
    <form action="{{ route('invoices.store') }}" method="POST">
        @csrf

            <div class="row">
                <!-- معلومات العميل والطريقة -->
                <div class="col-md-6 p-4 mb-4 bg-light border rounded shadow-sm">
                    <h5 class="mb-4 text-primary"><i class="bi bi-person"></i> {{ __('sales_invoice.client_info') }}</h5>
                    <div class="form-group row mb-3">
                        <label class="col-sm-4 col-form-label">{{ __('sales_invoice.method') }}</label>
                        <div class="col-sm-8">
                            <select name="payment_method" class="form-control">
                                <option value="print">{{ __('sales_invoice.print') }}</option>
                                <option value="email">{{ __('sales_invoice.email') }}</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group row mb-3">
                        <label class="col-sm-4 col-form-label">{{ __('sales_invoice.client') }} <span class="text-danger">*</span></label>
                        <div class="col-sm-8">
                            <select name="client_id" class="form-control" required>
                                <option value="" selected>{{ __('sales_invoice.select_client') }}</option>
                                @foreach ($clients as $client)
                                    <option value="{{ $client->client_id }}">{{ $client->trade_name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>

                <!-- معلومات الفاتورة -->
                <div class="col-md-6 p-4 mb-4 bg-light border rounded shadow-sm">
                    <h5 class="mb-4 text-primary"><i class="bi bi-receipt"></i> {{ __('sales_invoice.invoice_info') }}</h5>
                    <div class="form-group row mb-3">
                        <label class="col-sm-4 col-form-label">{{ __('sales_invoice.invoice_id') }}</label>
                        <div class="col-sm-8">
                            <input type="text" name="invoice_id" class="form-control" value="{{ $nextInvoiceId ?? '' }}" readonly>
                        </div>
                    </div>
                    <div class="form-group row mb-3">
                        <label class="col-sm-4 col-form-label">{{ __('sales_invoice.invoice_date') }}</label>
                        <div class="col-sm-8">
                            <input type="date" name="invoice_date" class="form-control">
                        </div>
                    </div>
                    <div class="form-group row mb-3">
                        <label class="col-sm-4 col-form-label">{{ __('sales_invoice.sales_manager') }}</label>
                        <div class="col-sm-8">
                            <select name="sales_manager" class="form-control">
                                <option value="none" selected>{{ __('sales_invoice.none') }}</option>
                                <option value="manager1">{{ __('sales_invoice.manager1') }}</option>
                                <option value="manager2">{{ __('sales_invoice.manager2') }}</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group row mb-3">
                        <label class="col-sm-4 col-form-label">{{ __('sales_invoice.issue_date') }}</label>
                        <div class="col-sm-8">
                            <input type="date" name="issue_date" class="form-control">
                        </div>
                    </div>
                    <div class="form-group row mb-3">
                        <label class="col-sm-4 col-form-label">{{ __('sales_invoice.payment_terms') }}</label>
                        <div class="col-sm-8">
                            <input type="text" name="payment_terms" class="form-control">
                        </div>
                    </div>
                </div>

            </div>

            <!-- زر الحفظ -->
            <div class="text-center">
                <button type="submit" class="btn btn-success">{{ __('sales_invoice.save') }}</button>
            </div>
        </div>
    </form>

    <!-- عرض الجدول -->
    <form action="{{ route('invoice-items.store') }}" method="POST">
    @csrf
    {{-- <input type="hidden" name="invoice_id" value="{{ $invoice_id }}"> <!-- تمرير معرف الفاتورة --> --}}

        <h4>إضافة البنود للفاتورة</h4>
        <table class="table table-bordered mt-4">
            <thead>
                <tr>
                    <th>البند</th>
                    <th>الوصف</th>
                    <th>سعر الوحدة</th>
                    <th>الكمية</th>
                    <th>الخصم</th>
                    <th>الضريبة 1</th>
                    <th>الضريبة 2</th>
                    <th>الإجمالي</th>
                    <th>إجراء</th>
                </tr>
            </thead>
            <tbody id="invoice-body">
                <tr>
                    <td><input type="text" name="items[0][item]" class="form-control" placeholder="البند"></td>
                    <td><input type="text" name="items[0][description]" class="form-control" placeholder="الوصف"></td>
                    <td><input type="number" name="items[0][unit_price]" class="form-control" placeholder="0.00" step="0.01" oninput="updateTotal(this)"></td>
                    <td><input type="number" name="items[0][quantity]" class="form-control" placeholder="1" min="1" value="1" oninput="updateTotal(this)"></td>
                    <td><input type="number" name="items[0][discount]" class="form-control" placeholder="0.00" step="0.01" oninput="updateTotal(this)"></td>
                    <td><input type="number" name="items[0][tax1]" class="form-control" placeholder="0.00" step="0.01" oninput="updateTotal(this)"></td>
                    <td><input type="number" name="items[0][tax2]" class="form-control" placeholder="0.00" step="0.01" oninput="updateTotal(this)"></td>
                    <td><input type="number" name="items[0][total]" class="form-control" placeholder="0.00" readonly></td>
                    <td><button type="button" class="btn btn-danger" onclick="removeRow(this)">حذف</button></td>
                </tr>
            </tbody>
            <tfoot>
                <tr>
                    <td colspan="7" class="text-right">المجموع الكلي</td>
                    <td><input type="number" id="grand-total" class="form-control" readonly></td>
                </tr>
            </tfoot>
        </table>
        <button type="button" class="btn btn-primary" onclick="addRow()">إضافة بند جديد</button>

        {{-- <a href="{{ route('invoice-items.create', ['invoice_id' => $invoice->id]) }}" class="btn btn-primary">إضافة بنود</a> --}}

        <button type="submit" class="btn btn-success">حفظ البنود</button>
    </form>


