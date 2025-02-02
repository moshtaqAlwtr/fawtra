  <!-- عرض رسالة الأخطاء إن وجدت -->
  @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <!-- عرض رسالة النجاح إن وجدت -->
    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif
<div class="invoice-container">
    <div class="invoice-header">
        <h2>اضافة اشعارات دائنة </h2>
    </div>

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
    <div class = "alert alert-success">
    <form action="{{ route('notifications.store') }}" method="POST" class="needs-validation">
        @csrf <!-- حماية من CSRF -->
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
                                <option value="{{ $client->id }}">{{ $client->trade_name }}</option>
                            @endforeach
                        </select>
                          @if ($errors->has('client_id'))
                            <div class="text-danger">
                                {{ $errors->first('client_id') }}
                            </div>
                        @endif
                    </div>
                </div>

            </div>
            <!-- القسم الأيسر: معلومات الفاتورة -->
            <div class="col-md-6 p-4 mb-4 bg-light border rounded shadow-sm">
                <h5 class="mb-4 text-primary"><i class="bi bi-receipt"></i> معلومات الفاتورة</h5>
                <div class="form-group row mb-3">
                    <label class="col-sm-4 col-form-label">رقم اشعار دائن</label>
                    <div class="col-sm-8">
                        <input type="text" name="notification_number" class="form-control" value="08755" readonly>
                    </div>
                </div>
                <div class="form-group row mb-3">
                    <label class="col-sm-4 col-form-label">مسؤول المبيعات</label>
                    <div class="col-sm-8">
                        <select name="created_by" id="created_by" class="form-control" required>
                            <option value="">اختر مسؤول المبيعات</option>
                            @foreach ($employees as $employee)
                                <option value="{{ $employee->employee_id }}">
                                    {{ $employee->first_name }} {{ $employee->last_name }}
                                </option>
                            @endforeach
                        </select>
                             @if ($errors->has('employee_id'))
                            <div class="text-danger">
                                {{ $errors->first('employee_id') }}
                            </div>
                        @endif
                    </div>
                </div>
            <div class="form-group row mb-3">
                <label for="notification_date" class="col-sm-4 col-form-label">تاريخ الإشعار</label>
                <div class="col-sm-8">
                    <input type="date" name="notification_date" id="notification_date" class="form-control" required>
                    @if ($errors->has('notification_date'))
                        <div class="text-danger">
                            {{ $errors->first('notification_date') }}
                        </div>
                    @endif
                </div>
            </div>

            <div class="form-group row mb-3">
                <label for="issue_date" class="col-sm-4 col-form-label">تاريخ الإصدار</label>
                <div class="col-sm-8">
                    <input type="date" name="issue_date" id="issue_date" class="form-control" required>
                    @if ($errors->has('issue_date'))
                        <div class="text-danger">
                            {{ $errors->first('issue_date') }}
                        </div>
                    @endif
                </div>
            </div>

                <div class="d-flex justify-content-end mt-3">
                    <button type="submit" class="btn btn-success"><i class="bi bi-check-circle"></i> حفظ</button>
                </div>
            </div>
        </div>
    </form>


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
     <!-- شريط التبويبات -->
<ul class="nav nav-tabs" id="myTab" role="tablist">
    <li class="nav-item">
        <a class="nav-link active" id="discount-tab" data-toggle="tab" href="#discount" role="tab" aria-controls="discount" aria-selected="true">الخصم والتسوية</a>
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
        <div class="section-card mb-4">
                    <ul class="nav nav-tabs custom-tabs" id="myTab" role="tablist">
                        <li class="nav-item" role="presentation">
                            <button class="nav-link active" id="discount-tab" data-bs-toggle="tab" data-bs-target="#discount" type="button" role="tab">
                                <i class="fas fa-percentage"></i> الخصم والتسوية
                            </button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="settings-tab" data-bs-toggle="tab" data-bs-target="#settings" type="button" role="tab">
                                <i class="fas fa-cog"></i> الإعدادات
                            </button>
                        </li>
                    </ul>

                    <div class="tab-content p-3" id="myTabContent">
                        <!-- تبويب الخصم والتسوية -->
                        <div class="tab-pane fade show active" id="discount" role="tabpanel">
                            <div class="row g-3">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="form-label">نوع الخصم</label>
                                        <select class="form-select" name="discount_type">
                                            <option value="percentage">نسبة مئوية (%)</option>
                                            <option value="fixed">مبلغ ثابت</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="form-label">قيمة الخصم</label>
                                        <input type="number" class="form-control" name="discount_value">
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- تبويب الإعدادات -->
                        <div class="tab-pane fade" id="settings" role="tabpanel">
                            <div class="row g-3">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="form-label">المستند</label>
                                        <select class="form-select" name="document_type">
                                            <option value="1">مستند 1</option>
                                            <option value="2">مستند 2</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
    </div>

    <!-- تبويب الإيداع -->

    <!-- تبويب بيانات الشحن -->
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


    <!-- الأزرار الأساسية -->
    <form action="{{ route('store-credit-notification') }}" method="POST">
    @csrf <!-- حماية النموذج بـ CSRF token -->

    <!-- هنا يمكن وضع الحقول والنماذج -->

    <div class="button-group">
        <!-- زر المعاينة -->
        <div class="btn-group">
            <button type="button" class="btn btn-info dropdown-toggle" data-toggle="dropdown">معاينة</button>
            <div class="dropdown-menu">
                <a class="dropdown-item" href="#" onclick="previewBrowser()">معاينة على المتصفح</a>
                <a class="dropdown-item" href="#" onclick="previewPDF()">معاينة كـ PDF</a>
            </div>
        </div>

        <!-- زر حفظ كمسودة -->
        <button type="submit" class="btn btn-warning">حفظ كمسودة</button>

        <!-- زر حفظ دون طباعة -->
        <div class="btn-group">
            <button type="submit" class="btn btn-success dropdown-toggle" data-toggle="dropdown">حفظ دون طباعة</button>
            <div class="dropdown-menu">
            <button type="submit" class="btn btn-success">حفظ</button>

            </div>
        </div>
    </div>
</form>


    <div class="footer">
        <p>شكراً لتعاملكم معنا!</p>
        <p>شركتنا - جميع الحقوق محفوظة 2024</p>
    </div>
</div>
</div>

<!-- Scripts -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
