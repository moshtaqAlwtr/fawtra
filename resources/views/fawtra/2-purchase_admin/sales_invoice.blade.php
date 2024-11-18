<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>فاتورة مبيعات</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">

        <!-- تضمين أيقونات Bootstrap -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
            <!-- تضمين مكتبة Font Awesome لأيقونة البحث -->



    <style>
        body {
            font-family: 'Tahoma', sans-serif;
            direction: rtl;
            background-color: #f8f9fa;
            padding: 20px;
            text-align: right;
        }
        .invoice-container {
            max-width: 1200px;
            margin: auto;
            background: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        .invoice-header {
            border-bottom: 2px solid #007bff;
            margin-bottom: 20px;
            padding-bottom: 10px;
            text-align: right;
        }
        .footer {
            text-align: center;
            margin-top: 20px;
            font-size: 14px;
            color: #555;
        }
        .editor-toolbar {

            background-color: #f8f9fa;
            padding: 5px;
            border: 1px solid #ced4da;
            border-radius: 5px;
        }
        .editor-toolbar .btn {
            padding: 5px 10px;
        }
        .editor-content {
            border: 1px solid #ced4da;
            padding: 10px;
            min-height: 100px;
            border-radius: 5px;
            margin-top: 10px;
        }

        th {
            background-color: #007bff;
            color: white;
            text-align: right;
        }
        td {
            text-align: right;
        }
        .button-group {
            margin: 20px 0;
            text-align: center;
        }
        .add-item {
            margin: 10px 0;
            text-align: right;
        }
        .add-item button {
            background-color: #007bff;
            color: #fff;
            border: none;
            padding: 10px 20px;
            border-radius: 4px;
            cursor: pointer;
        }
        .add-item button:hover {
            background-color: #0056b3;
        }
        .gifts-section {
            background: #f1f1f1;
            padding: 15px;
            border: 1px solid #ccc;
            border-radius: 5px;
            margin-top: 20px;
        }
    </style>
</head>
<body>
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
    <table class="table table-bordered mt-4">
        <thead>
            <tr>
                <th>{{ __('sales_invoice.item') }}</th>
                <th>{{ __('sales_invoice.description') }}</th>
                <th>{{ __('sales_invoice.unit_price') }}</th>
                <th>{{ __('sales_invoice.quantity') }}</th>
                <th>{{ __('sales_invoice.discount') }}</th>
                <th>{{ __('sales_invoice.tax1') }}</th>
                <th>{{ __('sales_invoice.tax2') }}</th>
                <th>{{ __('sales_invoice.total') }}</th>
            </tr>
        </thead>
        <tbody id="invoice-body">
            <tr>
                <td><input type="text" name="items[0][description]" class="form-control" placeholder="الوصف"></td>
                <td><input type="number" name="items[0][unit_price]" class="form-control" placeholder="سعر الوحدة" value="0"></td>
                <td><input type="number" name="items[0][quantity]" class="form-control" placeholder="الكمية" value="1"></td>
                <td><input type="number" name="items[0][discount]" class="form-control" placeholder="الخصم" value="0"></td>
                <td><input type="number" name="items[0][tax1]" class="form-control" placeholder="الضريبة 1" value="0"></td>
                <td><input type="number" name="items[0][tax2]" class="form-control" placeholder="الضريبة 2" value="0"></td>
                <td><input type="number" name="items[0][total]" class="form-control" placeholder="الإجمالي" value="0"></td>
            </tr>
        </tbody>
        <tfoot>
            <tr>
                <td colspan="7" class="text-right"><strong>{{ __('sales_invoice.total') }}:</strong></td>
                <td><span id="grand-total">0.00</span></td>
            </tr>
        </tfoot>
    </table>

    <!-- زر إضافة بند جديد -->
    <div class="add-item">
        <button onclick="addItem()">{{ trans('sales_invoice.add_item') }}</button>
    </div>
</div>


<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.1/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<script src="../js/date.js"></script>
<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">


<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

<script src="https://cdn.ckeditor.com/4.16.2/standard/ckeditor.js"></script>

<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>

<script src="{{ asset('assets/js/date.js') }}"></script>c

</body>
<script>
    // دالة لإضافة بند جديد
    function addItem() {
        const tableBody = document.getElementById('invoice-body');
        const rowCount = tableBody.rows.length;
        const row = tableBody.insertRow(rowCount);

        row.innerHTML = `
            <td>${rowCount + 1}</td>
            <td><input type="text" class="form-control" placeholder="الوصف"></td>
            <td><input type="number" class="form-control" placeholder="سعر الوحدة" value="0" oninput="calculateTotal(this)"></td>
            <td><input type="number" class="form-control" placeholder="الكمية" value="1" oninput="calculateTotal(this)"></td>
            <td><input type="number" class="form-control" placeholder="الخصم" value="0" oninput="calculateTotal(this)"></td>
            <td><input type="number" class="form-control" placeholder="الضريبة 1" value="0" oninput="calculateTotal(this)"></td>
            <td><input type="number" class="form-control" placeholder="الضريبة 2" value="0" oninput="calculateTotal(this)"></td>
            <td><span class="total">0.00</span></td>
        `;
    }

    // دالة لحساب المجموع
    function calculateTotal(input) {
        const row = input.closest('tr');
        const unitPrice = parseFloat(row.cells[2].querySelector('input').value) || 0;
        const quantity = parseFloat(row.cells[3].querySelector('input').value) || 0;
        const discount = parseFloat(row.cells[4].querySelector('input').value) || 0;
        const tax1 = parseFloat(row.cells[5].querySelector('input').value) || 0;
        const tax2 = parseFloat(row.cells[6].querySelector('input').value) || 0;

        const total = (unitPrice * quantity) - discount;
        const totalWithTax = total + (total * tax1 / 100) + (total * tax2 / 100);

        row.cells[7].querySelector('.total').textContent = totalWithTax.toFixed(2);
        updateGrandTotal();
    }

    // دالة لحساب الإجمالي الكلي
    function updateGrandTotal() {
        let grandTotal = 0;
        document.querySelectorAll('.total').forEach(total => {
            grandTotal += parseFloat(total.textContent) || 0;
        });
        document.getElementById('grand-total').textContent = grandTotal.toFixed(2);
    }

</script>

<script>
    function addAdditionalFields() {
        const container = document.getElementById('additional-fields-container');

        // إنشاء الحقول الجديدة
        const newFields = document.createElement('div');
        newFields.classList.add('d-flex', 'align-items-center', 'mt-3');

        newFields.innerHTML = `
            <button class="btn btn-danger me-2" onclick="removeField(this)"><i class="bi bi-x"></i></button>
            <input type="text" class="form-control me-2" placeholder="بيانات إضافية">
            <input type="text" class="form-control" placeholder="عنوان إضافي">
        `;

        // إضافة الحقول الجديدة إلى الحاوية
        container.appendChild(newFields);
    }

    // دالة لحذف الحقول عند الضغط على زر الحذف
    function removeField(button) {
        button.parentElement.remove();
    }
</script>
<script>
    // تطبيق CKEditor على عنصر textarea
    CKEDITOR.replace('notes', {
        language: 'ar',  // تعيين اللغة إلى العربية
        toolbar: [
            { name: 'basicstyles', items: ['Bold', 'Italic', 'Underline', 'Strike'] },
            { name: 'paragraph', items: ['NumberedList', 'BulletedList', '-', 'Outdent', 'Indent'] },
            { name: 'links', items: ['Link', 'Unlink'] },
            { name: 'styles', items: ['Font', 'FontSize', 'TextColor', 'BGColor'] },
            { name: 'insert', items: ['HorizontalRule'] }
        ],
        height: 200  // ارتفاع الصندوق
    });
</script>
</body>
</html>
