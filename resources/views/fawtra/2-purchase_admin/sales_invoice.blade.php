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
      <link href="https://fonts.googleapis.com/css2?family=Tajawal:wght@400;500;700&display=swap" rel="stylesheet">
      <link rel="stylesheet" href="{{ asset('Design/css/data.css') }}">

            <!-- تضمين مكتبة Font Awesome لأيقونة البحث -->



    <style>
        body {
            font-family: 'Tajawal', sans-serif;
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

    <form action="{{ route('invoices.store') }}" method="POST">
        @csrf
        <div class="container mt-5">
            <div class="row">
                <!-- القسم الأيسر: معلومات العميل والطريقة -->
                <div class="col-md-6 p-4 mb-4 bg-light border rounded shadow-sm">
                    <h5 class="mb-4 text-primary"><i class="bi bi-person"></i> معلومات العميل والطريقة</h5>
                    <div class="form-group row mb-3">
                        <label class="col-sm-4 col-form-label">الطريقة</label>
                        <div class="col-sm-8">
                            <select name="payment_method" class="form-control">
                                <option value="print" selected>الطباعة</option>
                                <option value="email">ارسل عبر البريد</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group row mb-3">
                        <label class="col-sm-4 col-form-label">العميل <span class="text-danger">*</span></label>
                        <div class="col-sm-8">
                            <select name="client_id" class="form-control" required>
                                <option value="" selected>(اختر عميل)</option>
                                @foreach ($clients as $client)
                                    <option value="{{ $client->client_id }}">{{ $client->trade_name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>

                <!-- القسم الأيمن: معلومات الفاتورة -->
                <div class="col-md-6 p-4 mb-4 bg-light border rounded shadow-sm">
                    <h5 class="mb-4 text-primary"><i class="bi bi-receipt"></i> معلومات الفاتورة</h5>
                    <div class="form-group row mb-3">
                        <label class="col-sm-4 col-form-label">رقم الفاتورة</label>
                        <div class="col-sm-8">
                            <input type="text" name="invoice_number" class="form-control" required>
                        </div>
                    </div>
                    <div class="form-group row mb-3">
                        <label class="col-sm-4 col-form-label">تاريخ الفاتورة</label>
                        <div class="col-sm-8">
                            <input type="date" name="invoice_date" id="diliveryStartDate" class="form-control">
                        </div>
                    </div>
                    <div class="form-group row mb-3">
                        <label class="col-sm-4 col-form-label">مسؤول مبيعات</label>
                        <div class="col-sm-8">
                            <select name="sales_manager" class="form-control">
                                <option value="none" selected>لا شيء</option>
                                <option value="manager1">مسؤول 1</option>
                                <option value="manager2">مسؤول 2</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group row mb-3">
                        <label class="col-sm-4 col-form-label">تاريخ الإصدار</label>
                        <div class="col-sm-8">
                            <input type="date" name="issue_date" class="form-control">
                        </div>
                    </div>
                    <div class="form-group row mb-3">
                        <label class="col-sm-4 col-form-label">شروط الدفع</label>
                        <div class="col-sm-8">
                            <input type="text" name="payment_terms" class="form-control">
                        </div>
                    </div>
                    <div class="form-group row mb-3">
                        <label class="col-sm-4 col-form-label">الإجمالي</label>
                        <div class="col-sm-8">
                            <input type="number" name="total" class="form-control" step="0.01" required>
                        </div>
                    </div>
                    <div class="form-group row mb-3">
                        <label class="col-sm-4 col-form-label">الإجمالي الكلي</label>
                        <div class="col-sm-8">
                            <input type="number" name="grand_total" class="form-control" step="0.01" required>
                        </div>
                    </div>
                    <div class="form-group row mb-3">
                        <label class="col-sm-4 col-form-label">حالة الدفع <span class="text-danger">*</span></label>
                        <div class="col-sm-8">
                            <select name="payment_status" class="form-control" required>
                                <option value="Paid">مدفوعة</option>
                                <option value="Unpaid">غير مدفوعة</option>
                                <option value="Partially Paid">مدفوعة جزئياً</option>
                            </select>
                        </div>
                    </div>
                </div>

                <div class="text-center">
                    <button type="submit" class="btn btn-success">حفظ</button>
                </div>
            </div>

            </div>
            <!-- زر الحفظ -->


    </form>
<!-- جدول الفواتير -->
<table class="table table-bordered mt-4">
    <thead>
        <tr>
            <th>#</th>
            <th>اسم العميل</th>
            <th>رقم الفاتورة</th>
            <th>تاريخ الفاتورة</th>
            <th>الإجمالي</th>
            <th>الإجمالي الكلي</th>
            <th>حالة الدفع</th>
            <th>إجراءات</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($invoices as $invoice)
            <tr>
                <td>{{ $invoice->invoice_id }}</td>
                <td>{{ $invoice->client ? $invoice->client->trade_name : 'العميل غير موجود' }}</td>

                <td>{{ $invoice->invoice_number }}</td>
                <td>{{ $invoice->invoice_date }}</td>
                <td>{{ $invoice->total }}</td>
                <td>{{ $invoice->grand_total }}</td>
                <td>{{ $invoice->payment_status }}</td>
                <td>
                    <a href="#" class="btn btn-primary btn-sm">عرض</a>
                    <a href="#" class="btn btn-warning btn-sm">تعديل</a>
                    <form action="#" method="POST" style="display: inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm">حذف</button>
                    </form>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>
    <!-- زر إضافة بند جديد -->
    <div class="add-item">
        <button onclick="addItem()">إضافة بند</button>
    </div>



    <!-- Tab Content -->
   <!-- شريط التبويبات -->
<ul class="nav nav-tabs" id="myTab" role="tablist">
    <li class="nav-item">
        <a class="nav-link active" id="discount-tab" data-toggle="tab" href="#discount" role="tab" aria-controls="discount" aria-selected="true">الخصم والتسوية</a>
    </li>
    <li class="nav-item">
        <a class="nav-link" id="deposet-tab" data-toggle="tab" href="#deposet" role="tab" aria-controls="deposet" aria-selected="false">إيداع</a>
    </li>
    <li class="nav-item">
        <a class="nav-link" id="shipping-tab" data-toggle="tab" href="#shipping" role="tab" aria-controls="shipping" aria-selected="false">بيانات الشحن</a>
    </li>
    <li class="nav-item">
        <a class="nav-link" id="documents-tab" data-toggle="tab" href="#documents" role="tab" aria-controls="documents" aria-selected="false">إرفاق المستندات</a>
    </li>
</ul>

<!-- محتوى التبويبات -->
<div class="tab-content" id="myTabContent">

    <!-- تبويب الخصم والتسوية -->
    <div class="tab-pane fade show active" id="discount" role="tabpanel" aria-labelledby="discount-tab">
        <div class="form-group row mt-3">
            <label class="col-sm-2 col-form-label">الخصم</label>
            <div class="col-sm-3">
                <input type="text" class="form-control" placeholder="0.00">
            </div>
            <label class="col-sm-2 col-form-label">التسوية</label>
            <div class="col-sm-3">
                <select class="form-control">
                    <option>نسبة مئوية (%)</option>
                    <option>قيمة ثابتة</option>
                </select>
            </div>
        </div>
    </div>

    <!-- تبويب الإيداع -->
    <div class="tab-pane fade" id="deposet" role="tabpanel" aria-labelledby="deposet-tab">
        <div class="form-group row mt-3 align-items-center">
            <label class="col-sm-2 col-form-label">القيمة المقدمة</label>
            <div class="col-sm-4">
                <input type="text" class="form-control" placeholder="0">
            </div>
            <label class="col-sm-2 col-form-label">مدفوع بالفعل</label>
            <div class="col-sm-4">
                <select class="form-control">
                    <option>المبلغ</option>
                    <option>النسبة المئوية (%)</option>
                </select>
            </div>
        </div>
    </div>

    <div class="tab-pane fade" id="shipping" role="tabpanel" aria-labelledby="shipping-tab">
        <div class="form-group row mt-3 d-flex align-items-center">

            <!-- بيانات الشحن -->
            <label class="col-form-label me-2">بيانات الشحن</label>
            <div class="flex-grow-1 me-3">
                <input type="text" class="form-control" placeholder="أدخل قيمة">
            </div>

            <!-- المستودع والقائمة المنسدلة -->
            <label for="warehouseSelect" class="col-form-label me-2 mb-0">المستودع</label>
            <div class="flex-grow-1 me-3">
                <select class="form-control" id="warehouseSelect">
                    <option>المستودع الرئيسي</option>
                    <option>مستودع 1</option>
                </select>
            </div>

            <!-- مربع الاختيار وتسمية اختيار المستودع لكل بند -->
            <div class="form-check d-flex align-items-center">
                <input type="checkbox" class="form-check-input me-2" id="mandatoryCheck">
                <label class="form-check-label mb-0" for="mandatoryCheck" style="margin-right: 20px;">اختيار المستودع لكل بند</label>
            </div>
        </div>
    </div>


    <!-- تبويب إرفاق المستندات -->
    <div class="tab-pane fade" id="documents" role="tabpanel" aria-labelledby="documents-tab">
        <!-- تبويبات فرعية داخل إرفاق المستندات -->
        <ul class="nav nav-tabs mt-3" id="documentTabs" role="tablist">
            <li class="nav-item">
                <a class="nav-link active" id="new-document-tab" data-toggle="tab" href="#new-document" role="tab" aria-controls="new-document" aria-selected="true">مستند جديد</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" id="uploaded-documents-tab" data-toggle="tab" href="#uploaded-documents" role="tab" aria-controls="uploaded-documents" aria-selected="false">الملفات التي تم رفعها مسبقًا</a>
            </li>
        </ul>

        <!-- محتوى التبويبات الفرعية داخل تبويب إرفاق المستندات -->
        <div class="tab-content" id="documentTabsContent">
            <div class="tab-pane fade show active" id="new-document" role="tabpanel" aria-labelledby="new-document-tab">
                <div class="card mt-3">
                    <div class="card-body">
                        <div class="upload-area p-4 border border-dashed text-center">
                            <i class="fas fa-cloud-upload-alt fa-2x text-primary mb-2"></i>
                            <p>أسقط الملف هنا أو اختر من جهازك</p>
                            <input type="file" class="form-control-file" style="display: none;" id="fileUploadInput">
                            <button class="btn btn-primary" onclick="document.getElementById('fileUploadInput').click();">اختر ملف</button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="tab-pane fade" id="uploaded-documents" role="tabpanel" aria-labelledby="uploaded-documents-tab">
                <div class="card mt-3">
                    <div class="card-body">
                        <!-- الحقل الرئيسي -->
<div class="form-group">
    <label for="documentSelect">المستند</label>
    <div class="d-flex align-items-center">
        <!-- القائمة المنسدلة لاختيار المستند -->
        <select class="form-control w-50" id="documentSelect">
            <option>Select Document</option>
            <option>Document 1</option>
            <option>Document 2</option>
        </select>

        <!-- زر "أرفق" -->
        <button class="btn btn-success me-2" style="margin-left: 10px;">
            أرفق
        </button>

        <!-- زر "بحث متقدم" لفتح المودال -->
        <button class="btn btn-success me-2" data-toggle="modal" data-target="#advancedSearchModal" style="margin-left: 10px;">
            <i class="fas fa-search"></i> بحث متقدم
        </button>
    </div>
</div>

<!-- المودال الخاص بالبحث المتقدم -->
<div class="modal fade" id="advancedSearchModal" tabindex="-1" aria-labelledby="advancedSearchModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="advancedSearchModalLabel">البحث المتقدم</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <!-- محتوى البحث المتقدم -->
                <div class="alert alert-warning" role="alert">
                    <strong>No Documents found:</strong> click here to clear search
                </div>
                <!-- يمكنك إضافة حقول البحث المتقدم هنا -->
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">إغلاق</button>
            </div>
        </div>
    </div>
</div>

<!-- تضمين مكتبة Font Awesome و Bootstrap JS -->

                    </div>



            </div>
        </div>
    </div>
</div>

        <!-- Attach Documents Tab -->
        <div class="tab-pane fade" id="documents" role="tabpanel" aria-labelledby="documents-tab">
            <div class="form-group row mt-3">
                <label class="col-sm-2 col-form-label">مستند جديد</label>
                <div class="col-sm-10">
                    <input type="file" class="form-control-file">
                </div>
            </div>
        </div>

    </div>

<div class="mb-3">
        <label for="notes" class="form-label">الملاحظات</label>
        <textarea id="notes" class="form-control" rows="4"></textarea>
    </div>
    <div class="gifts-section d-flex align-items-center">
        <!-- مربع الاختيار بحجم صغير -->
        <div class="form-check me-2">
            <input type="checkbox" class="form-check-input" id="paidCheckbox" style="width: 1.5em; height: 1.5em; ">
            <label for="paidCheckbox" class="form-check-label" style="margin-right: 40px;">مدفوع بالفعل</label>
        </div>
        <!-- التسمية -->

    </div>



<div class="gifts-section p-3 border rounded">
    <div class="d-flex justify-content-between align-items-center">
        <!-- العنوان الرئيسي -->
        <h5 class="mb-0">هدايا مجانية</h5>

        <!-- رابط إعدادات الحقول المخصصة مع أيقونة الترس بجانبه لفتح المودال -->
        <div class="d-flex align-items-center">
            <a href="#" class="text-primary d-flex align-items-center" data-toggle="modal" data-target="#customFieldsModal" style="text-decoration: none;">
                <i class="fas fa-cog text-muted me-1"></i>
                إعدادات الحقول المخصصة
            </a>
        </div>
    </div>

    <!-- حقل الوقت -->
    <div class="mt-3">
        <label for="timeInput">الوقت:</label>
        <input type="time" id="timeInput" class="form-control w-25">
    </div>
</div>

<!-- نافذة المودال -->
<div class="modal fade" id="customFieldsModal" tabindex="-1" aria-labelledby="customFieldsModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="customFieldsModalLabel">إعدادات الحقول المخصصة</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <!-- المحتوى داخل المودال -->
                <div class="alert alert-info">
                    You will be redirected to edit the custom fields page
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">إلغاء</button>
                <button type="button" class="btn btn-danger">عدم الحفظ</button>
                <button type="button" class="btn btn-success">حفظ</button>
            </div>
        </div>
    </div>
</div>
    <!-- إعدادات الحقول المخصصة -->
    <div class="custom-field-settings">
        <h6>إعدادات الحقول المخصصة</h6>
        <p>هنا يمكنك تعديل الحقول المخصصة وإعداداتها.</p>
    </div>

    <!-- الأزرار الأساسية -->
    <div class="button-group">
        <!-- زر المعاينة -->
        <div class="btn-group">
            <button class="btn btn-info dropdown-toggle" data-toggle="dropdown">معاينة</button>
            <div class="dropdown-menu">
                <a class="dropdown-item" href="#" onclick="previewBrowser()">معاينة على المتصفح</a>
                <a class="dropdown-item" href="#" onclick="previewPDF()">معاينة كـ PDF</a>
            </div>
        </div>

        <!-- زر حفظ كمسودة -->
        <button class="btn btn-warning" onclick="saveAsDraft()">حفظ كمسودة</button>

        <!-- زر حفظ دون طباعة -->
        <div class="btn-group">
            <button class="btn btn-success dropdown-toggle" data-toggle="dropdown">حفظ دون طباعة</button>
            <div class="dropdown-menu">
                <a class="dropdown-item" href="#" onclick="saveAndPrint()">حفظ وطباعة</a>
            </div>
        </div>
    </div>


    <!-- عرض رسائل الأخطاء -->
    @if ($errors->any())
        <div class="alert alert-danger mt-3">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif


<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.1/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<script src=" {{asset('assets/js/date.js')}}"></script>
<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">


<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

<script src="https://cdn.ckeditor.com/4.16.2/standard/ckeditor.js"></script>

<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>



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
