
    <div class="main-container">
        <div class="content-box">

<div class="top-bar">
    <h5 class="mb-0"> الفواتير</h5>
</div>
<div class="container my-4">
    <!-- Header Buttons -->
    <div class="d-flex justify-content-between align-items-center mb-3">
        <button class="btn btn-success" onclick="location.href='sales_invoice.html'"><i class="fas fa-plus-circle"></i> فاتورة جديدة</button>

        <!-- Settings and Actions Buttons -->
        <div class="d-flex align-items-center">
            <button class="btn btn-secondary mr-2" onclick="location.href='../9-sales_management/schedule_appointment.html'">المواعيد</button>
            <div class="dropdown">
                <button class="btn btn-primary dropdown-toggle" type="button" id="actionsDropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    الإجراءات
                </button>
                <div class="dropdown-menu" aria-labelledby="actionsDropdown" dir="rtl">
                    <a class="dropdown-item" href="#"><i class="fas fa-trash-alt text-danger"></i> حذف</a>
                    <a class="dropdown-item" href="#"><i class="fas fa-paper-plane text-info"></i> إرسال إلى العميل</a>
                    <a class="dropdown-item" href="#"><i class="fas fa-check-circle text-success"></i> تحويل إلى مدفوع</a>
                    <a class="dropdown-item" href="#"><i class="fas fa-file-pdf text-danger"></i> طباعة PDF</a>hjkkksjkjksddh
                    <a class="dropdown-item" href="#"><i class="fas fa-file-export text-secondary"></i> تصدير</a>
                </div>
            </div>
        </div>
    </div>
</div>


    <!-- Filter Section -->
    <div class="filter-section">
        <div class="form-row">
            <div class="form-group col-md-3">
                <label for="client">العميل</label>
                <select id="client" class="form-control">
                    <option>أي عميل</option>
                </select>
            </div>
            <div class="form-group col-md-3">
                <label for="invoiceNumber">رقم الفاتورة</label>
                <input type="text" id="invoiceNumber" class="form-control">
            </div>
            <div class="form-group col-md-3">
                <label for="status">الحالة</label>
                <select id="status" class="form-control">
                    <option>أي حالة</option>
                </select>
            </div>
        </div>
      <div class="container my-4">
    <!-- Main Action Buttons -->


    <!-- Advanced Search Form Section -->
   <div class="container my-4">
    <!-- Main Action Buttons -->


    <!-- Advanced Search Form Section -->
    <div class="collapse" id="advancedSearchForm">
        <form>
            <div class="filter-section mt-3">
                <div class="form-row">
                    <div class="form-group col-md-3">
                        <label>البند</label>
                        <input type="text" class="form-control">
                    </div>
                    <div class="form-group col-md-3">
                        <label>العملة</label>
                        <select class="form-control">
                            <option>أي</option>
                        </select>
                    </div>
                    <div class="form-group col-md-3">
                        <label>الإجمالي أكبر من</label>
                        <input type="text" class="form-control">
                    </div>
                    <div class="form-group col-md-3">
                        <label>الإجمالي أقل من</label>
                        <input type="text" class="form-control">
                    </div>
                </div>

                <div class="form-row">
                    <div class="form-group col-md-2">
                        <label>حالة الدفع</label>
                        <select class="form-control">
                            <option>أي</option>
                        </select>
                    </div>
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
                        <label>خيارات الشحن</label>
                        <select class="form-control">
                            <option>الكل</option>
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

    <!-- Action Buttons Always Visible -->
    <div class="d-flex mb-3 mt-3">
        <button class="btn btn-primary ml-2 mr-2">بحث</button>
        <button class="btn btn-secondary ml-2 mr-2">إلغاء الفلاتر</button>
        <button class="btn btn-outline-secondary ml-2 mr-2" data-toggle="collapse" data-target="#advancedSearchForm" aria-expanded="false" aria-controls="advancedSearchForm">
            <i class="bi bi-sliders"></i> بحث متقدم
        </button>
    </div>
</div>

</div>

    <!-- Tab Section -->
    <div class="tab-section d-flex justify-content-between align-items-center">
        <div>
            <button class="btn btn-outline-secondary">الكل</button>
            <button class="btn btn-outline-secondary">غير مدفوعة</button>
            <button class="btn btn-outline-secondary">مسودة</button>
            <button class="btn btn-outline-secondary">مستحقة الدفع</button>
            <button class="btn btn-outline-secondary">مدفوعة</button>
            <button class="btn btn-outline-secondary">متأخر</button>
        </div>
            <div class="dropdown">
                <button class="btn btn-light dropdown-toggle" type="button" id="sortDropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    حسب العميل
                </button>
                <div class="dropdown-menu" aria-labelledby="sortDropdown">
                    <a class="dropdown-item" href="#">العميل</a>
                    <a class="dropdown-item" href="#">تاريخ الإنشاء</a>
                    <a class="dropdown-item" href="#">رقم الفاتورة</a>
                    <a class="dropdown-item" href="#">حالة الدفع</a>
                    <a class="dropdown-item" href="#">التاريخ</a>
                </div>
        </div>
    </div>

    <!-- Invoice Cards -->
    <div class="invoice-card mb-3" style="direction: rtl;" >
        <div class="d-flex justify-content-between align-items-start">
            <div>
                <h5 class="mb-1">432.00 ر.س</h5>
                <span class="badge badge-status unpaid">غير مدفوعة</span>
                <span class="badge badge-status pending">تحت التسليم</span>
            </div>
            <div class="text-right">
                <p class="mb-1">28/10/2024 - #08732</p>
                <p class="mb-0">بقالة الراجحي للمواد الغذائية</p>
                <small class="text-muted">الدمام, حي المنصورة</small><br>
                <small class="text-muted">بواسطة: عدنان العوقلي</small>
            </div>
            <!-- Dropdown Button -->
            <div class="dropdown">
                <button class="btn btn-light dropdown-toggle" type="button" data-toggle="dropdown" aria-expanded="false">
                    <i class="fas fa-ellipsis-h"></i>
                </button>
                <div class="dropdown-menu">
                    <a class="dropdown-item" href="#"><i class="fas fa-eye text-success"></i> عرض</a>
                    <a class="dropdown-item" href="#"><i class="fas fa-edit text-primary"></i> تعديل</a>
                    <a class="dropdown-item" href="#"><i class="fas fa-file-pdf text-danger"></i> PDF</a>
                    <a class="dropdown-item" href="#"><i class="fas fa-print text-secondary"></i> طباعة</a>
                    <a class="dropdown-item" href="#"><i class="fas fa-envelope text-info"></i> إرسال إلى العميل</a>
                    <a class="dropdown-item" href="#"><i class="fas fa-credit-card text-warning"></i> إضافة عملية دفع</a>
                    <a class="dropdown-item" href="#"><i class="fas fa-trash-alt text-danger"></i> حذف</a>
                    <a class="dropdown-item" href="#"><i class="fas fa-copy text-secondary"></i> نسخ</a>
                </div>
            </div>
        </div>
    </div>
    <!-- Additional Cards as needed -->
    <div class="invoice-card mb-3" style="direction: rtl;" >
        <div class="d-flex justify-content-between align-items-start">
            <div>
                <h5 class="mb-1">432.00 ر.س</h5>
                <span class="badge badge-status unpaid">غير مدفوعة</span>
                <span class="badge badge-status pending">تحت التسليم</span>
            </div>
            <div class="text-right">
                <p class="mb-1">28/10/2024 - #08732</p>
                <p class="mb-0">بقالة الراجحي للمواد الغذائية</p>
                <small class="text-muted">الدمام, حي المنصورة</small><br>
                <small class="text-muted">بواسطة: عدنان العوقلي</small>
            </div>
            <!-- Dropdown Button -->
            <div class="dropdown">
                <button class="btn btn-light dropdown-toggle" type="button" data-toggle="dropdown" aria-expanded="false">
                    <i class="fas fa-ellipsis-h"></i>
                </button>
                <div class="dropdown-menu">
                    <a class="dropdown-item" href="#"><i class="fas fa-eye text-success"></i> عرض</a>
                    <a class="dropdown-item" href="#"><i class="fas fa-edit text-primary"></i> تعديل</a>
                    <a class="dropdown-item" href="#"><i class="fas fa-file-pdf text-danger"></i> PDF</a>
                    <a class="dropdown-item" href="#"><i class="fas fa-print text-secondary"></i> طباعة</a>
                    <a class="dropdown-item" href="#"><i class="fas fa-envelope text-info"></i> إرسال إلى العميل</a>
                    <a class="dropdown-item" href="#"><i class="fas fa-credit-card text-warning"></i> إضافة عملية دفع</a>
                    <a class="dropdown-item" href="#"><i class="fas fa-trash-alt text-danger"></i> حذف</a>
                    <a class="dropdown-item" href="#"><i class="fas fa-copy text-secondary"></i> نسخ</a>
                </div>
            </div>
        </div>
    </div>


    <!-- Pagination -->
    <nav>
        <ul class="pagination pagination-custom">
            <li class="page-item"><a class="page-link" href="#">السابق</a></li>
            <li class="page-item"><a class="page-link" href="#">1</a></li>
            <li class="page-item"><a class="page-link" href="#">2</a></li>
            <li class="page-item"><a class="page-link" href="#">3</a></li>
            <li class="page-item"><a class="page-link" href="#">التالي</a></li>
        </ul>
    </nav>


</div>
