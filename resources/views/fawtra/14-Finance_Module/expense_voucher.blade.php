    <!-- الهيدر -->
    <div class="header">
        <h1>إضافة سند صرف</h1>
    </div>

    <!-- نموذج إضافة سند صرف -->
    <div class="card-body">
        <form>
            <!-- الصف الأول -->
            <div class="row g-3">
                <div class="col-md-4">
                    <label for="amount" class="form-label">المبلغ</label>
                    <input type="text" class="form-control" id="amount" placeholder="ر.س 0.00">
                </div>
                <div class="col-md-4">
                    <label for="description" class="form-label">الوصف</label>
                    <textarea class="form-control" id="description" rows="1" placeholder="أدخل وصفًا"></textarea>
                </div>
                <div class="col-md-4">
                    <label for="attachment" class="form-label">المرفقات</label>
                    <input type="file" class="form-control" id="attachment">
                </div>
            </div>

            <!-- الصف الثاني -->
            <div class="row g-3 mt-3">
                <div class="col-md-4">
                    <label for="code-number" class="form-label">رقم الكود</label>
                    <input type="text" class="form-control" id="code-number" required>
                </div>
                <div class="col-md-4">
                    <label for="date" class="form-label">التاريخ</label>
                    <input type="date" class="form-control" id="date">
                </div>
                <div class="col-md-4">
                    <label for="unit" class="form-label">الوحدة</label>
                    <select id="unit" class="form-select">
                        <option selected>حدد الوحدة</option>
                        <option>وحدة 1</option>
                        <option>وحدة 2</option>
                    </select>
                </div>
            </div>

            <!-- الصف الثالث -->
            <div class="row g-3 mt-3">
                <div class="col-md-4">
                    <label for="category" class="form-label">التصنيف</label>
                    <select id="category" class="form-select">
                        <option selected>إضافة تصنيف</option>
                        <option>تصنيف 1</option>
                        <option>تصنيف 2</option>
                    </select>
                </div>
                <div class="col-md-4">
                    <label for="seller" class="form-label">البائع</label>
                    <select id="seller" class="form-select">
                        <option selected>اختر بائع</option>
                        <option>بائع 1</option>
                        <option>بائع 2</option>
                    </select>
                </div>
                <div class="col-md-4">
                    <label for="warehouse" class="form-label">خزينة</label>
                    <select id="warehouse" class="form-select">
                        <option selected>رئيسي</option>
                        <option>فرعي</option>
                    </select>
                </div>
            </div>

            <!-- الصف الرابع -->
            <div class="row g-3 mt-3">
                <div class="col-md-4">
                    <label for="min-limit" class="form-label">الحد الأدنى</label>
                    <input type="text" class="form-control" id="min-limit">
                </div>
                <div class="col-md-4">
                    <label for="items" class="form-label">المورد</label>
                    <select id="items" class="form-select">
                        <option selected>اختر مورد</option>
                        <option>مورد 1</option>
                        <option>مورد 2</option>
                    </select>
                </div>
                <div class="col-md-4 d-flex align-items-end">
                    <button type="button" class="btn btn-info w-100" onclick="toggleTaxFields()">
                        <i class="fas fa-plus"></i> إضافة ضرائب
                    </button>
                </div>
            </div>

            <!-- الضرائب -->
            <div id="tax-fields" class="mt-3" style="display: none;">
                <div class="row g-3">
                    <div class="col-md-6">
                        <label for="tax1" class="form-label">الضريبة الأولى</label>
                        <select id="tax1" class="form-select">
                            <option selected>-</option>
                            <option>ضريبة 1</option>
                            <option>ضريبة 2</option>
                        </select>
                        <input type="text" class="form-control mt-2" placeholder="المبلغ">
                    </div>
                    <div class="col-md-6">
                        <label for="tax2" class="form-label">الضريبة الثانية</label>
                        <select id="tax2" class="form-select">
                            <option selected>-</option>
                            <option>ضريبة 1</option>
                            <option>ضريبة 2</option>
                        </select>
                        <input type="text" class="form-control mt-2" placeholder="المبلغ">
                    </div>
                </div>
                <button class="btn btn-danger mt-3" onclick="removeTaxFields()">إزالة الضرائب</button>
            </div>

            <!-- الأزرار -->
            <div class="row g-3 mt-4">
                <div class="col-md-12 text-end">
                    <button type="submit" class="btn btn-success"><i class="fas fa-save"></i> حفظ</button>
                    <button type="button" class="btn btn-secondary"><i class="fas fa-times"></i> إلغاء</button>
                </div>
            </div>
        </form>
    </div>
