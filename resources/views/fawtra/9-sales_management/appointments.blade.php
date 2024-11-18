

    <!-- الشريط العلوي -->
    <div class="top-bar">
        <div>
            <button class="btn btn-light"><i class="fas fa-home"></i> الذهاب إلى الموقع</button>
            <button class="btn btn-light"><i class="fas fa-question-circle"></i> المساعدة</button>
        </div>
        <div>
            <span>المواعيد</span>
        </div>
    </div>

    <!-- زر إضافة موعد جديد -->
    <div class="mt-4">
    <button class="btn btn-green mb-3" onclick="window.location.href=''"><i class="fas fa-calendar-plus"></i> موعد جديد</button>

    </div>

    <!-- قسم البحث -->
    <div class="filter-section">
        <div class="row">
            <div class="col-md-3">
                <label for="employee" class="form-label">الموظف</label>
                <select class="form-select" id="employee">
                    <option selected>أي موظف</option>
                    <option value="1">موظف 1</option>
                    <option value="2">موظف 2</option>
                </select>
            </div>
            <div class="col-md-3">
                <label for="status" class="form-label">الحالة</label>
                <select class="form-select" id="status">
                    <option selected>أي حالة</option>
                    <option value="تم جدولته">تم جدولته</option>
                    <option value="تم تأكيده">تم تأكيده</option>
                </select>
            </div>
            <div class="col-md-3">
                <label for="action" class="form-label">الإجراء</label>
                <select class="form-select" id="action">
                    <option selected>أي إجراء</option>
                    <option value="إجراء 1">إجراء 1</option>
                    <option value="إجراء 2">إجراء 2</option>
                </select>
            </div>
        </div>

        <!-- أزرار البحث -->
        <div class="mt-3">
            <button class="btn btn-primary"><i class="fas fa-search"></i> بحث</button>
            <button class="btn btn-secondary"><i class="fas fa-times"></i> إلغاء الفلتر</button>
            <button class="btn btn-secondary" id="advanced-search-toggle"><i class="fas fa-filter"></i> بحث متقدم</button>
        </div>

        <!-- قسم البحث المتقدم -->
        <div class="advanced-search">
            <div class="row">
                <div class="col-md-6">
                    <label for="client" class="form-label">العميل</label>
                    <select class="form-select" id="client">
                        <option selected>أي عميل</option>
                        <option value="1">عميل 1</option>
                        <option value="2">عميل 2</option>
                    </select>
                </div>
                <div class="col-md-6">
                    <label for="added-by" class="form-label">أضيف بواسطة</label>
                    <select class="form-select" id="added-by">
                        <option selected>أي موظف</option>
                        <option value="1">موظف 1</option>
                        <option value="2">موظف 2</option>
                    </select>
                </div>
            </div>
            <div class="row mt-2">
                <div class="col-md-6">
                    <label for="date-from" class="form-label">التاريخ من</label>
                    <input type="text" class="form-control datepicker" id="date-from" placeholder="اختر التاريخ">
                </div>
                <div class="col-md-6">
                    <label for="date-to" class="form-label">التاريخ إلى</label>
                    <input type="text" class="form-control datepicker" id="date-to" placeholder="اختر التاريخ">
                </div>
            </div>
        </div>
    </div>

    <!-- بطاقة الموعد -->
    <div class="appointment-card">
        <div class="appointment-details">
            <h5 class="mb-1">زيارة متابعة <span class="appointment-status">نشط</span></h5>
            <p class="mb-0"><i class="fas fa-building card-icon"></i> مؤسسة مثال الشمال</p>
            <p class="mb-0"><i class="fas fa-map-marker-alt card-icon"></i> الرياض، الشفاء</p>
            <p class="mb-0"><i class="fas fa-phone-alt card-icon"></i> 0536166276</p>
            <p class="appointment-meta"><i class="fas fa-calendar-alt card-icon"></i> 13/03/2023 <i class="fas fa-clock card-icon"></i> 10:54 AM - 11:54 AM</p>
            <p class="appointment-meta"><i class="fas fa-user card-icon"></i> بواسطة رشيد الرياض</p>
        </div>
        <div class="appointment-actions">
            <div class="dropdown">
                <button class="btn btn-light" type="button" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-expanded="false">
                    <i class="fas fa-ellipsis-v"></i>
                </button>
                <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                    <li><a class="dropdown-item" href="#"><i class="fas fa-edit me-2"></i>تعديل</a></li>
                    <li><a class="dropdown-item" href="#"><i class="fas fa-trash-alt me-2"></i>حذف</a></li>
                    <li><a class="dropdown-item" href="#"><i class="fas fa-info-circle me-2"></i>عرض التفاصيل</a></li>
                    <li><a class="dropdown-item" href="#"><i class="fas fa-sticky-note me-2"></i>إضافة ملاحظة</a></li>
                </ul>
            </div>
        </div>
    </div>

    <!-- قسم تصدير النتائج -->
    <div class="export-section d-flex align-items-center mb-3">
        <label for="exportBtn" class="me-2">تصدير النتائج المفلترة (8571 الموعد)</label>
        <button id="exportBtn" class="btn btn-sm text-white d-flex align-items-center export-btn">
            <i class="fas fa-file-export me-1"></i> تصدير
        </button>
    </div>
    
    <style>
      
    </style>
    
    
</div>
