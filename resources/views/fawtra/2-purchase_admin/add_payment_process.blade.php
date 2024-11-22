<!DOCTYPE html>
<html lang="ar" dir="rtl">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>إضافة عملية دفع</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f0f8ff;
        }

        .top-bar {
            background: linear-gradient(90deg, #0048BA, #0073E6);
            color: white;
            padding: 15px 0;
            text-align: center;
            font-size: 20px;
            font-weight: bold;
        }

        .form-container {
            background-color: white;
            border-radius: 10px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            padding: 20px;
            max-width: 800px;
            margin: auto;
        }

        .upload-box {
            border: 2px dashed #ccc;
            padding: 10px;
            text-align: center;
            border-radius: 5px;
            background-color: #f9f9f9;
            height: 100%;
        }

        .upload-box:hover {
            border-color: #007bff;
            background-color: #f1f1f1;
        }

        .upload-icon {
            font-size: 20px;
            color: #007bff;
        }

        .upload-box p {
            margin: 0;
            font-size: 14px;
            color: #555;
        }

        .upload-box input[type="file"] {
            display: none;
        }
    </style>
</head>

<body>
    <!-- الشريط العلوي -->
    <div class="top-bar">إضافة عملية دفع</div>

    <!-- المحتوى -->
   
        <div class="">
            <div class="row mb-3">
                <div class="col-12 d-flex justify-content-end">
                    <button type="submit" class="btn btn-success me-2"><i class="fas fa-plus"></i> إضافة عملية دفع</button>
                    <button type="button" class="btn btn-secondary"><i class="fas fa-times"></i> إلغاء</button>
                </div>
            </div>

            <!-- الكارد -->
            <div class="row">
    <div class="col-12">
        <form action="{{ route('payments.store') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <!-- الحقول: العميل والفاتورة -->
            <div class="row mb-3">
                <div class="col-md-6">
                    <label for="client" class="form-label">العميل</label>
                    <select id="client" name="client_id" class="form-select" required>
    <option value="">اختر العميل</option>
    @if(isset($clients) && count($clients) > 0)
        @foreach($clients as $client)
            <option value="{{ $client->client_id }}">{{ $client->client_name }}</option>
        @endforeach
    @else
        <option value="">لا توجد بيانات</option>
    @endif
</select>

                </div>
                <div class="col-md-6">
    <label for="invoice" class="form-label">الفاتورة</label>
    <select id="invoice" name="invoice_id" class="form-select">
        <option value="">اختر الفاتورة</option>
        @if(isset($invoices) && $invoices->count() > 0)
            @foreach($invoices as $invoice)
                <option value="{{ $invoice->invoice_id }}">فاتورة #{{ $invoice->invoice_id }} - المبلغ: {{ $invoice->total_amount }}</option>
            @endforeach
        @else
            <option value="">لا توجد فواتير</option>
        @endif
    </select>
</div>
            </div>

            <!-- الحقول: المبلغ والتاريخ -->
            <div class="row mb-3">
                <div class="col-md-6">
                    <label for="amount" class="form-label">المبلغ</label>
                    <input type="number" id="amount" name="amount" class="form-control" placeholder="أدخل المبلغ" required>
                </div>
                <div class="col-md-6">
                    <label for="date" class="form-label">التاريخ</label>
                    <input type="date" id="date" name="payment_date" class="form-control" required>
                </div>
            </div>

            <!-- الحقول: الخزينة ووسيلة الدفع -->
            <div class="row mb-3">
            <div class="col-md-6">
    <label for="treasury" class="form-label">الخزينة</label>
    <select id="treasury" name="treasury_id" class="form-select" required>
        <option value="">اختر الخزينة</option>
        @if(isset($treasuries) && $treasuries->count() > 0)
            @foreach($treasuries as $treasury)
                <option value="{{ $treasury->treasury_id }}">{{ $treasury->treasury_name }} - الرصيد: {{ $treasury->balance }}</option>
            @endforeach
        @else
            <option value="">لا توجد خزائن متوفرة</option>
        @endif
    </select>
</div>
  <div class="col-md-6">
                    <label for="paymentMethod" class="form-label">وسيلة الدفع</label>
                    <select id="paymentMethod" name="payment_method" class="form-select" required>
                        <option value="">اختر الطريقة</option>
                        <option value="Cash">نقدًا</option>
                        <option value="Bank Transfer">تحويل بنكي</option>
                        <option value="Credit Card">بطاقة ائتمان</option>
                        <option value="Other">طريقة أخرى</option>
                    </select>
                </div>
            </div>

            <!-- الحقول: حالة الدفع والدفع بواسطة -->
            <div class="row mb-3">
                <div class="col-md-6">
                    <label for="status" class="form-label">حالة الدفع</label>
                    <select id="status" name="status" class="form-select" required>
                        <option value="Paid">مكتمل</option>
                        <option value="Pending">قيد الانتظار</option>
                        <option value="Failed">فشل</option>
                    </select>
                </div>
                <div class="col-md-6">
    <label for="paidBy" class="form-label">تم الدفع بواسطة</label>
    <select id="paidBy" name="employee_id" class="form-select" required>
        <option value="">اختر الموظف</option>
        @if(isset($employees) && $employees->count() > 0)
            @foreach($employees as $employee)
                <option value="{{ $employee->employee_id }}">{{ $employee->first_name }} {{ $employee->last_name }}</option>
            @endforeach
        @else
            <option value="">لا توجد بيانات للموظفين</option>
        @endif
    </select>
</div>            </div>

            <!-- الحقول: رقم معرف وبيانات الدفع -->
            <div class="row mb-3">
                <div class="col-md-6">
                    <label for="referenceNumber" class="form-label">رقم معرف</label>
                    <input type="text" id="referenceNumber" name="reference_number" class="form-control" placeholder="أدخل رقم المعرف">
                </div>
                <div class="col-md-6">
                    <label for="paymentDetails" class="form-label">بيانات الدفع</label>
                    <input type="text" id="paymentDetails" name="payment_details" class="form-control" placeholder="أدخل بيانات الدفع">
                </div>
            </div>

            <!-- الحقول: ملاحظات والمرفقات -->
            <div class="row mb-3 align-items-start">
                <div class="col-md-8">
                    <label for="notes" class="form-label">ملاحظات إيصال الاستلام</label>
                    <textarea id="notes" name="notes" class="form-control" rows="3" placeholder="أدخل الملاحظات هنا"></textarea>
                </div>
                <div class="col-md-4">
                    <label for="attachment" class="form-label">المرفقات</label>
                    <div class="upload-box d-flex flex-column align-items-center justify-content-center border border-primary rounded py-3">
                        <i class="fas fa-cloud-upload-alt upload-icon mb-2 text-primary"></i>
                        <p class="text-muted mb-2">إلق الملف هنا أو اختر من جهازك</p>
                        <input type="file" id="attachment" name="attachment" class="form-control">
                    </div>
                </div>
            </div>

            <!-- زر الإرسال -->
            <div class="row">
                <div class="col-12 text-end">
                    <button type="submit" class="btn btn-success"><i class="fas fa-save"></i> حفظ العملية</button>
                </div>
            </div>
        </form>
    </div>
</div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
