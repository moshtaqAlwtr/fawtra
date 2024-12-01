
    <title>إضافة عملية دفع</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>


    <!-- العنوان -->
    <div class="text-center mb-4">
        <h1 class="display-6 text-primary fw-bold" style="background: linear-gradient(135deg, #1e90ff, #00bcd4); -webkit-background-clip: text; color: transparent;">إضافة عملية دفع</h1>
    </div>

    <!-- أزرار التحكم -->

    <!-- الكارد -->
    <div class="card shadow border-0 mb-4">
        <div class="card-body">
            <form action="{{ route('payments.create') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="row mb-3">
                    <div class="col-12 text-end">
                        <button type="submit" class="btn btn-success me-2" style="background: linear-gradient(135deg, #28a745, #20c997); border: none;"><i class="fas fa-plus"></i> إضافة عملية دفع</button>
                        <button type="button" class="btn btn-secondary"><i class="fas fa-times"></i> إلغاء</button>
                    </div>
                </div>

                <!-- الحقول: العميل والفاتورة -->
                <div class="row mb-3">
                    <div class="col-md-6">
                        <label for="client" class="form-label">العميل</label>
                        <select id="client" name="client_id" class="form-select">
                            <option value="">اختر العميل</option>
                            @foreach($clients as $client)
                                <option value="{{ $client->id }}">{{ $client->trade_name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-md-6">
                        <label for="invoice" class="form-label">الفاتورة</label>
                        <select id="invoice" name="invoice_id" class="form-select" required>
                            <option value="">اختر الفاتورة</option>
                            @if(!empty($invoices))
                                @foreach($invoices as $invoice)
                                    <option value="{{ $invoice->invoice_id }}">فاتورة #{{ $invoice->invoice_id }}</option>
                                @endforeach
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
                            @foreach($treasuries as $treasury)
                                <option value="{{ $treasury->treasury_id }}">{{ $treasury->name }} - الرصيد: {{ $treasury->balance }}</option>
                            @endforeach
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
                                <option value="" disabled>لا توجد بيانات للموظفين</option>
                            @endif
                        </select>
                    </div>
                </div>

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
                        <input type="file" id="attachment" name="attachment" class="form-control">
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
</div>

