
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">


        <!-- عرض الأخطاء -->
        @if($errors->any())
            <div class="alert alert-danger rounded-3 shadow-sm">
                <ul class="mb-0">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <!-- قسم بيانات العميل -->
        <div class="row mb-4">
            <div class="col-md-6">
                <div class="card bg-primary bg-gradient text-white shadow rounded-4">
                    <div class="card-header fs-4 text-center">{{ __('sales_invoice.client_info') }}</div>
                    <div class="card-body bg-white text-dark rounded-bottom-4">
                        <form action="{{ route('invoices.store') }}" method="POST">
                            @csrf
                            <div class="mb-3">
                                <label for="payment_method" class="form-label fs-5">{{ __('sales_invoice.method') }}</label>
                                <select name="payment_method" id="payment_method" class="form-select">
                                    <option value="print">{{ __('sales_invoice.print') }}</option>
                                    <option value="email">{{ __('sales_invoice.email') }}</option>
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="client_id" class="form-label fs-5">{{ __('sales_invoice.client') }} <span class="text-danger">*</span></label>
                                <select name="client_id" id="client_id" class="form-select" required>
                                    <option value="" selected>{{ __('sales_invoice.select_client') }}</option>
                                    @foreach ($clients as $client)
                                        <option value="{{ $client->id }}">{{ $client->trade_name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

            <!-- قسم بيانات الفاتورة -->
            <div class="col-md-6">
                <div class="card bg-primary bg-gradient text-white shadow rounded-4">
                    <div class="card-header fs-4 text-center">{{ __('sales_invoice.invoice_info') }}</div>
                    <div class="card-body bg-white text-dark rounded-bottom-4">
                        <div class="mb-3">
                            <label for="invoice_id" class="form-label fs-5">{{ __('sales_invoice.invoice_id') }}</label>
                            <input type="text" name="invoice_id" id="invoice_id" class="form-control rounded-3" value="{{ $nextInvoiceId ?? '' }}" readonly>
                        </div>
                        <div class="mb-3">
                            <label for="invoice_date" class="form-label fs-5">{{ __('sales_invoice.invoice_date') }}</label>
                            <input type="date" name="invoice_date" id="invoice_date" class="form-control rounded-3">
                        </div>
                        <div class="mb-3">
                            <label for="sales_manager" class="form-label fs-5">{{ __('sales_invoice.sales_manager') }}</label>
                            <select name="sales_manager" id="sales_manager" class="form-select rounded-3">
                                <option value="none" selected>{{ __('sales_invoice.none') }}</option>
                                <option value="manager1">{{ __('sales_invoice.manager1') }}</option>
                                <option value="manager2">{{ __('sales_invoice.manager2') }}</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="issue_date" class="form-label fs-5">{{ __('sales_invoice.issue_date') }}</label>
                            <input type="date" name="issue_date" id="issue_date" class="form-control rounded-3">
                        </div>
                        <div class="mb-3">
                            <label for="payment_terms" class="form-label fs-5">{{ __('sales_invoice.payment_terms') }}</label>
                            <input type="text" name="payment_terms" id="payment_terms" class="form-control rounded-3">
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- قسم إضافة العناصر -->
        <div class="card bg-primary bg-gradient text-white shadow rounded-4 mb-4">
            <div class="card-header fs-4 text-center">{{ __('sales_invoice.add_items') }}</div>
            <div class="card-body bg-white text-dark rounded-bottom-4">
                <form action="{{ route('invoice-items.store') }}" method="POST">
                    @csrf
                    <table class="table table-bordered">
                        <thead class="bg-light">
                            <tr>
                                <th>{{ __('sales_invoice.item') }}</th>
                                <th>{{ __('sales_invoice.description') }}</th>
                                <th>{{ __('sales_invoice.unit_price') }}</th>
                                <th>{{ __('sales_invoice.quantity') }}</th>
                                <th>{{ __('sales_invoice.discount') }}</th>
                                <th>{{ __('sales_invoice.tax1') }}</th>
                                <th>{{ __('sales_invoice.tax2') }}</th>
                                <th>{{ __('sales_invoice.total') }}</th>
                                <th>{{ __('sales_invoice.action') }}</th>
                            </tr>
                        </thead>
                        <tbody id="invoice-body">
                            <tr>
                                <td><input type="text" name="items[0][item]" class="form-control rounded-3" placeholder="{{ __('sales_invoice.item') }}"></td>
                                <td><input type="text" name="items[0][description]" class="form-control rounded-3" placeholder="{{ __('sales_invoice.description') }}"></td>
                                <td><input type="number" name="items[0][unit_price]" class="form-control rounded-3" step="0.01" oninput="updateTotal(this)"></td>
                                <td><input type="number" name="items[0][quantity]" class="form-control rounded-3" min="1" value="1" oninput="updateTotal(this)"></td>
                                <td>
                                    <div class="input-group">
                                        <input type="number" name="items[0][discount]" class="form-control rounded-3" step="0.01" oninput="updateTotal(this)">
                                        <select name="items[0][discount_type]" class="form-select rounded-3" onchange="updateTotal(this)">
                                            <option value="percentage">{{ __('sales_invoice.percentage') }}</option>
                                            <option value="amount">{{ __('sales_invoice.amount') }}</option>
                                        </select>
                                    </div>
                                </td>
                                <td><input type="number" name="items[0][tax1]" class="form-control rounded-3" step="0.01" oninput="updateTotal(this)"></td>
                                <td><input type="number" name="items[0][tax2]" class="form-control rounded-3" step="0.01" oninput="updateTotal(this)"></td>
                                <td><input type="number" name="items[0][total]" class="form-control rounded-3" readonly></td>
                                <td><button type="button" class="btn btn-danger btn-sm" onclick="removeRow(this)">{{ __('sales_invoice.delete') }}</button></td>
                            </tr>
                        </tbody>
                        <tfoot>
                            <tr>
                                <td colspan="7" class="text-end">{{ __('sales_invoice.grand_total') }}</td>
                                <td><input type="number" id="grand-total" class="form-control rounded-3" readonly></td>
                            </tr>
                        </tfoot>
                    </table>
                    <div class="text-center">
                        <button type="button" class="btn btn-primary btn-sm" onclick="addRow()">{{ __('sales_invoice.add_new_item') }}</button>
                        <button type="submit" class="btn btn-success btn-sm">{{ __('sales_invoice.save_items') }}</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        function addRow() {
            // كود لإضافة صف جديد
        }
        function removeRow(button) {
            button.closest('tr').remove();
        }
        function updateTotal(input) {
            // كود لتحديث المجموع
        }
    </script>
