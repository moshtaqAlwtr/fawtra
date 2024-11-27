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
                        <select name="payment_status" id="payment_method" class="form-select">
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
               </div>
            </div>
        </div>
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
                        <label for="employee_id" class="form-label fs-5">{{ __('sales_invoice.employee') }}</label>
                        <select name="employee_id" id="employee_id" class="form-select" required>
                            <option value="" selected>{{ __('sales_invoice.select_employee') }}</option>
                            @foreach ($employees as $employee)
                                <option value="{{ $employee->employee_id }}">{{ $employee->first_name }}</option>
                            @endforeach
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

    <!-- قسم بيانات الفاتورة -->

</div>

<!-- قسم إضافة العناصر -->
<div class="card bg-primary bg-gradient text-white shadow rounded-4 mb-4">
    <div class="card-header fs-4 text-center">{{ __('sales_invoice.add_items') }}</div>
    <div class="card-body bg-white text-dark rounded-bottom-4">
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
                    <td><input type="text" name="items[0][item]" class="form-control rounded-3" placeholder="{{ __('sales_invoice.item') }}" required></td>
                    <td><input type="text" name="items[0][description]" class="form-control rounded-3" placeholder="{{ __('sales_invoice.description') }}"></td>
                    <td><input type="number" name="items[0][unit_price]" class="form-control rounded-3" step="0.01" required oninput="updateTotal(this)"></td>
                    <td><input type="number" name="items[0][quantity]" class="form-control rounded-3" min="1" value="1" required oninput="updateTotal(this)"></td>
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
    </div>
</div>

</form>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>

<script>
    function addRow() {
        const tableBody = document.getElementById('invoice-body');
        const newRow = tableBody.rows[0].cloneNode(true);
        const rowIndex = tableBody.rows.length;

        // تحديث العناصر في الصف الجديد
        Array.from(newRow.querySelectorAll('input')).forEach(input => {
            // تحديث name بحيث يضم الفهرسة الصحيحة
            input.name = input.name.replace('[0]', `[${rowIndex}]`);
            input.value = ''; // تأكد من أن القيم تبدأ فارغة
        });

        tableBody.appendChild(newRow);
    }

    function removeRow(button) {
        const row = button.closest('tr');
        row.remove();
        updateGrandTotal();
    }

    function updateTotal(input) {
        const row = input.closest('tr');
        const unitPrice = parseFloat(row.querySelector('[name$="[unit_price]"]').value) || 0;
        const quantity = parseFloat(row.querySelector('[name$="[quantity]"]').value) || 1;
        const discount = parseFloat(row.querySelector('[name$="[discount]"]').value) || 0;
        const discountType = row.querySelector('[name$="[discount_type]"]').value;
        const tax1 = parseFloat(row.querySelector('[name$="[tax1]"]').value) || 0;
        const tax2 = parseFloat(row.querySelector('[name$="[tax2]"]').value) || 0;

        let total = unitPrice * quantity;

        // حساب الخصم
        if (discountType === 'percentage') {
            total -= total * (discount / 100);
        } else {
            total -= discount;
        }

        // حساب الضرائب
        total += total * (tax1 / 100);
        total += total * (tax2 / 100);

        row.querySelector('[name$="[total]"]').value = total.toFixed(2);

        updateGrandTotal();
    }

    function updateGrandTotal() {
        let grandTotal = 0;
        document.querySelectorAll('[name$="[total]"]').forEach(input => {
            grandTotal += parseFloat(input.value) || 0;
        });

        document.getElementById('grand-total').value = grandTotal.toFixed(2);
    }
</script>
