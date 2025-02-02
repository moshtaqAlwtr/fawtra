

    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">



    @if($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

    <!-- زر الإجراءات في أعلى الصفحة -->
    <div class="d-flex justify-content-between mb-3">
        <div class="dropdown">
            <button class="btn btn-primary dropdown-toggle" type="button" id="actionsDropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">الإجراءات</button>
            <div class="dropdown-menu" aria-labelledby="actionsDropdown">
                <a class="dropdown-item" href="#"><i class="fas fa-trash-alt text-danger"></i> حذف</a>
                <a class="dropdown-item" href="#"><i class="fas fa-paper-plane text-info"></i> إرسال الفواتير الى هيئة الزكاة والدخل</a>
            </div>
        </div>

        <!-- الترقيم -->
        <nav aria-label="pagination">
            <ul class="pagination mb-0">
                <li class="page-item disabled"><a class="page-link" href="#">السابق</a></li>
                <li class="page-item active"><a class="page-link" href="#">1</a></li>
                <li class="page-item"><a class="page-link" href="#">2</a></li>
                <li class="page-item"><a class="page-link" href="#">3</a></li>
                <li class="page-item"><a class="page-link" href="#">التالي</a></li>
            </ul>
        </nav>
    </div>

    <!-- البحث -->
    <div class="card mb-3">
        <div class="card-body">
            <form>
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="invoiceNumber">رقم الفاتورة</label>
                        <input type="text" class="form-control" id="invoiceNumber" placeholder="أدخل رقم الفاتورة">
                    </div>
                    <div class="form-group col-md-6">
                        <label for="client">العميل</label>
                        <select class="form-control" id="client">
                            <option>أي عميل</option>
                            <option>عميل 1</option>
                            <option>عميل 2</option>
                        </select>
                    </div>
                </div>
            </form>
        </div>

        <!-- البحث المتقدم -->
        <div class="collapse" id="advancedSearchForm">
            <form>
                <div class="filter-section mt-3">
                    <div class="form-row">
                        <div class="form-group col-md-3">
                            <label> تحتوي على البند</label>
                            <input type="text" class="form-control">
                        </div>
                        <div class="form-group col-md-3">
                            <label>العملة</label>
                            <select class="form-control">
                                <option>أي</option>
                            </select>
                        </div>
                        <div class="form-group col-md-3">
                            <label>الإجمالي أكبر </label>
                            <input type="text" class="form-control">
                        </div>
                        <div class="form-group col-md-3">
                            <label>الإجمالي أقل من</label>
                            <input type="text" class="form-control">
                        </div>
                    </div>

                    <div class="form-row">

                        <div class="form-group col-md-2">
                            <label class="form-label">التاريخ</label>
                            <div class="input-group">
                                <select class="form-control" onchange="toggleCustomDate(this)">
                                    <option value="custom">تخصيص</option>
                                    <option value="last_month">الشهر الأخير</option>
                                    <option value="last_year">السنة الماضية</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group col-md-3">
                            <label class="form-label">التسليم من وإلى</label>
                            <div class="input-group">
                                <input type="text" id="deliveryStartDate" class="form-control" placeholder="من">
                                <input type="text" id="deliveryEndDate" class="form-control" placeholder="إلى">
                            </div>
                        </div>
                        <div class="form-group col-md-2">
                            <label class="form-label">تاريخ الاستحقاق</label>
                            <div class="input-group">
                                <select class="form-control" onchange="toggleCustomDate(this)">
                                    <option value="custom">تخصيص</option>
                                    <option value="last_month">الشهر الأخير</option>
                                    <option value="last_year">السنة الماضية</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group col-md-3">
                            <label class="form-label">الاستحقاق من وإلى</label>
                            <div class="input-group">
                                <input type="text" id="deliveryStartDate" class="form-control" placeholder="من">
                                <input type="text" id="deliveryEndDate" class="form-control" placeholder="إلى">
                            </div>
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="form-group col-md-3">
                            <label>المصدر</label>
                            <select class="form-control">
                                <option>الكل</option>
                                <option>تطبيق سطح المكتب</option>
                                <option>تطبيق الهاتف المحمول</option>
                                <option>salla</option>
                                <option>API</option>
                                <option>اشعار مدين</option>
                            </select>
                        </div>
                        <div class="form-group col-md-3">
                            <label>حقل مخصص</label>
                            <input type="text" class="form-control">
                        </div>
                        <div class="form-group col-md-3">
                            <label>تاريخ الإنشاء</label>
                            <select class="form-control" onchange="toggleCustomDate(this)">
                                <option value="custom">تخصيص</option>
                                <option value="last_month">الشهر الأخير</option>
                                <option value="last_year">السنة الماضية</option>
                            </select>
                        </div>
                        <div class="form-group col-md-3">
                            <label>التسليم من وإلى</label>
                            <div class="input-group">
                                <input type="text" id="deliveryStartDate" class="form-control" placeholder="من">
                                <input type="text" id="deliveryEndDate" class="form-control" placeholder="إلى">
                            </div>
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="form-group col-md-3">
                            <label>حالة التسليم</label>
                            <select class="form-control">
                                <option>الكل</option>
                                <option>مسلم جزئي</option>
                                <option>مرفوض جزئي</option>
                                <option>التسليم</option>
                                <option>مسلم</option>
                                <option>مرفوض</option>
                            </select>
                        </div>
                        <div class="form-group col-md-3">
                            <label>مسؤول مبيعات</label>
                            <select class="form-control">
                                <option>أي مسؤول مبيعات</option>
                            </select>
                        </div>
                        <div class="form-group col-md-3">
                            <label>أضيفت بواسطة</label>
                            <select class="form-control">
                                <option>أي موظف</option>
                            </select>
                        </div>
                        <div class="form-group col-md-3">
                            <label>مصدر الطلب</label>
                            <select class="form-control">
                                <option>اختر</option>
                            </select>
                        </div>

                        <div class="form-group col-md-3">
                            <label>Pos Shift</label>
                            <input type="text" class="form-control">
                        </div>
                    </div>
                </div>
            </form>
        </div>


        <!-- Main Action Buttons -->
        <div class="d-flex justify-content-between mt-3">
            <button class="btn btn-primary">بحث</button>
            <button class="btn btn-secondary">إلغاء الفلاتر</button>
            <button class="btn btn-outline-secondary" data-toggle="collapse" data-target="#advancedSearchForm" aria-expanded="false" aria-controls="advancedSearchForm">
                <i class="fas fa-sliders-h"></i> بحث متقدم
            </button>
        </div>
    </div>

    <!-- النتائج -->
    <div class="row">
        <!-- Repeat this card for each item -->
        <div class="col-12 mb-3">
            <div class="card">
                <div class="card-body d-flex justify-content-between align-items-center">
                    <div>
                        <h6 class="mb-1">لمسات الاحتراف للتموين الغذائي</h6>
                        <small class="text-muted">الرياض</small><br>
                        <small class="text-muted">رقم الضريبي: 311196745400003</small>
                    </div>
                    <div>
                        <p class="mb-1 fw-bold">216.00 ر.س</p>
                        <small class="text-muted">#0053</small>
                    </div>
                    <!-- Dropdown button -->
                    <div class="dropdown">
                        <button class="btn btn-secondary" type="button" id="actionsDropdown2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="fas fa-ellipsis-v"></i>
                        </button>
                        <div class="dropdown-menu" aria-labelledby="actionsDropdown2">
                            <a class="dropdown-item" href="#"><i class="fas fa-eye text-primary"></i> عرض</a>
                            <a class="dropdown-item" href="#"><i class="fas fa-edit text-warning"></i> تعديل</a>
                            <a class="dropdown-item" href="#"><i class="fas fa-paper-plane text-info"></i> إرسال إلى العميل</a>
                            <a class="dropdown-item" href="#"><i class="fas fa-file-pdf text-danger"></i> PDF</a>
                            <a class="dropdown-item" href="#"><i class="fas fa-image text-success"></i> الصورة</a>
                            <a class="dropdown-item" href="#"><i class="fas fa-copy text-secondary"></i> نسخ</a>
                            <a class="dropdown-item" href="#"><i class="fas fa-trash-alt text-danger"></i> حذف</a>
                        </div>
                    </div>
                </div>
                <div class="card-footer d-flex justify-content-between align-items-center bg-light">
                    <small>بواسطة: محمد الادريسي</small>
                    <small>18:25:31 24/02/2024</small>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- مكتبات الجافاسكريبت الخاصة بـ Bootstrap -->
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.2/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
<
