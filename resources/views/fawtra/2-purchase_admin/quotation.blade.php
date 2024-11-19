


    <div class="invoice-header">
        <h2> اضافة عرض سعر</h2>
    </div>
    <div class="container mt-3">
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label for="invoice-template" class="form-label">قالب الفاتورة</label>
                    <select id="invoice-template" class="form-control">
                        <option selected>التصميم الافتراضي للفاتورة</option>
                        <option>التصميم 1 للفاتورة</option>
                        <option>التصميم 2 للفاتورة</option>
                        <option>التصميم 3 للفاتورة</option>
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
<div class = "alert alert-success">

        <form method="POST" action="{{ route('quotes.store') }}">
            @csrf <!-- الحماية من CSRF -->
            <div class="row">
                <div class="col-md-6 p-4 mb-4 bg-light border rounded shadow-sm">
                    <h5 class="mb-4 text-primary"><i class="bi bi-person"></i> معلومات العميل والطريقة</h5>
                    <div class="form-group row mb-3">
                        <label class="col-sm-4 col-form-label">الطريقة</label>
                        <div class="col-sm-8">
                            <select name="method" class="form-control">
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
                <!-- القسم الأيسر: معلومات الفاتورة -->
                <div class="col-md-6 p-4 mb-4 bg-light border rounded shadow-sm">
                    <h5 class="mb-4 text-primary"><i class="bi bi-receipt"></i> معلومات الفاتورة</h5>
                    <!-- الحقول الأساسية -->
                    <div class="form-group row mb-3">
                        <label class="col-sm-4 col-form-label">رقم عرض السعر</label>
                        <div class="col-sm-8">
                            <input type="text" name="quote_number" class="form-control" value="{{ $nextQuoteId ?? '' }}" readonly>
                        </div>
                    </div>
                    <div class="form-group row mb-3">
                        <label class="col-sm-4 col-form-label">تاريخ عرض السعر</label>
                        <div class="col-sm-8">
                            <input type="date" id="deliveryStartDate" name="quote_date" class="form-control" required>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="created_by">مسؤول المبيعات</label>
                        <select name="created_by" id="created_by" class="form-control" required>
                            <option value="">اختر مسؤول المبيعات</option>
                            @foreach ($employees as $employee)
                                <option value="{{ $employee->employee_id }}">
                                    {{ $employee->first_name }} {{ $employee->last_name }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="status">حالة العرض</label>
                        <select name="status" id="stat" class="form-control" required>
                            <option value="">اختر الحالة</option>
                            <option value="مبدئي">مبدئي</option>
                            <option value="مقبول">مقبول</option>
                            <option value="مرفوض">مرفوض</option>
                        </select>
                    </div>


                    <!-- المنطقة التي سيتم فيها إضافة الحقول الجديدة -->
                    <div id="additional-fields-container"></div>
                    <!-- زر الإضافة في الأسفل -->
                    <div class="d-flex justify-content-end mt-3">
                        <button type="button" class="btn btn-primary" onclick="addAdditionalFields()"><i class="bi bi-plus-circle"></i> إضافة</button>
                    </div>

                </div>
            </div>





            <!-- تضمين أيقونات Bootstrap -->



            <!-- القسم الأيمن: الطريقة والعميل -->

        </div>
    </div>

    <!-- تضمين أيقونات Bootstrap -->



    <!-- جدول الفاتورة -->
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
                <th>المجموع</th>
            </tr>
        </thead>
        <tbody id="invoice-body">
            <tr>
                <td>1</td>
                <td><input type="text" class="form-control" placeholder="الوصف"></td>
                <td><input type="number" class="form-control" placeholder="سعر الوحدة" value="0" oninput="calculateTotal(this)"></td>
                <td><input type="number" class="form-control" placeholder="الكمية" value="1" oninput="calculateTotal(this)"></td>
                <td><input type="number" class="form-control" placeholder="الخصم" value="0" oninput="calculateTotal(this)"></td>
                <td><input type="number" class="form-control" placeholder="الضريبة 1" value="0" oninput="calculateTotal(this)"></td>
                <td><input type="number" class="form-control" placeholder="الضريبة 2" value="0" oninput="calculateTotal(this)"></td>
                <td><span class="total">0.00</span></td>
            </tr>
        </tbody>
        <tfoot>
            <tr>
                <td colspan="7" class="text-right"><strong>الإجمالي الكلي:</strong></td>
                <td><span id="grand-total">0.00</span></td>
            </tr>
        </tfoot>
    </table>

    <!-- زر إضافة بند جديد -->
    <div class="add-item">
        <button onclick="addItem()">إضافة بند</button>
    </div>

    <!-- Tabs for Different Sections -->
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

    <!-- Tab Content -->
    <div class="tab-content" id="myTabContent">
        <!-- Discount and Settlement Tab -->
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

        <!-- Deposit Tab -->
        <div class="tab-pane fade" id="deposet" role="tabpanel" aria-labelledby="deposet-tab">
            <div class="form-group row mt-3 align-items-center">
                <label class="col-sm-2 col-form-label">القيمة المقدمة</label>
                <div class="col-sm-4">
                    <input type="text" class="form-control" placeholder="0">
                </div>
                <label class="col-sm-2 col-form-label">مدفوع  ب الفعل </label>
                <div class="col-sm-4">
                    <select class="form-control">
                        <option>المبلغ</option>
                        <option>النسبة المئوية (%)</option>
                    </select>
                </div>
            </div>
        </div>


  <!-- Shipping Details Tab -->
  <div class="tab-pane fade" id="shipping" role="tabpanel" aria-labelledby="shipping-tab">
    <div class="form-row mt-3 align-items-center">
        <div class="form-group col-md-4">
            <label for="shippingCost">مصاريف الشحن</label>
            <input type="text" class="form-control" id="shippingCost" placeholder="أدخل قيمة">
        </div>

        <div class="form-group col-md-4">
            <label for="shippingInfo">بيانات الشحن</label>
            <select class="form-control" id="shippingInfo">
                <option>ألي</option>
            </select>
        </div>

        <div class="form-group col-md-4">
            <label for="warehouse">المستودع</label>
            <select class="form-control" id="warehouse">
                <option>المستودع الرئيسي</option>
                <option>مستودع 1</option>
            </select>
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


    <h5>الملاحظات/الشروط</h5>
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

            <div class="d-flex justify-content-end mt-3">

                <button type="submit" class="btn btn-success"><i class="bi bi-check-circle"></i> حفظ</button>


            </div>

            <div class="dropdown-menu">
                <a class="dropdown-item" href="#" onclick="saveAndPrint()">حفظ وطباعة</a>
            </div>
        </div>
    </div>
</form>
    <div class="footer">
        <p>شكراً لتعاملكم معنا!</p>
        <p>شركتنا - جميع الحقوق محفوظة © 2024</p>
    </div>
</div>
</div>

