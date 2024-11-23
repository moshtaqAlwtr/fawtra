<div class="container vh-100 d-flex justify-content-center align-items-center">
    <div class="w-100" style="max-width: 800px;">
        <h1 class="text-primary">إضافة سند صرف</h1>
        <p class="text-muted">يرجى تعبئة الحقول لإضافة سند صرف جديد</p>
    </div>

    <!-- نموذج إضافة سند صرف -->
    <div class="card shadow-lg border-0" style="background: rgba(255, 255, 255, 0.8); border-radius: 15px;">
        <div class="card-body">
            <form action="{{ route('payment_vouchers.store') }}" method="POST" enctype="multipart/form-data">
                @csrf <!-- الحماية من هجمات CSRF -->

                <!-- الصف الأول -->
                <div class="row g-3">
                    <div class="col-md-4">
                        <label for="payee_name" class="form-label">اسم المستفيد</label>
                        <input type="text" class="form-control rounded-pill shadow-sm" id="payee_name" name="payee_name" placeholder="اسم المستفيد" required>
                    </div>
                    <div class="col-md-4">
                        <label for="amount" class="form-label">المبلغ</label>
                        <input type="text" class="form-control rounded-pill shadow-sm" id="amount" name="amount" placeholder="ر.س 0.00" required>
                    </div>
                    <div class="col-md-4">
                        <label for="description" class="form-label">الوصف</label>
                        <textarea class="form-control rounded shadow-sm" id="description" name="description" rows="1" placeholder="أدخل وصفًا"></textarea>
                    </div>
                </div>

                <!-- الصف الثاني -->
                <div class="row g-3 mt-3">
                    <div class="col-md-4">
                        <label for="attachment" class="form-label">المرفقات</label>
                        <input type="file" class="form-control rounded-pill shadow-sm" id="attachment" name="attachment">
                    </div>
                    <div class="col-md-4">
                        <label for="code_number" class="form-label">رقم الكود</label>
                        <input type="text" class="form-control rounded-pill shadow-sm" id="code_number" name="code_number" required>
                    </div>
                    <div class="col-md-4">
                        <label for="date" class="form-label">التاريخ</label>
                        <input type="date" class="form-control rounded-pill shadow-sm" id="date" name="date" required>
                    </div>
                </div>

                <!-- الصف الثالث -->
                <div class="row g-3 mt-3">
                    <div class="col-md-4">
                        <label for="unit" class="form-label">الوحدة</label>
                        <select id="unit" name="unit" class="form-select rounded-pill shadow-sm">
                            <option selected>حدد الوحدة</option>
                            <option>وحدة 1</option>
                            <option>وحدة 2</option>
                        </select>
                    </div>
                    <div class="col-md-4">
                        <label for="category" class="form-label">التصنيف</label>
                        <select id="category" name="category" class="form-select rounded-pill shadow-sm">
                            <option selected>إضافة تصنيف</option>
                            <option>تصنيف 1</option>
                            <option>تصنيف 2</option>
                        </select>
                    </div>
                    <div class="col-md-4">
                        <label for="seller" class="form-label">البائع</label>
                        <select id="seller" name="seller" class="form-select rounded-pill shadow-sm">
                            <option selected>اختر بائع</option>
                            <option>بائع 1</option>
                            <option>بائع 2</option>
                        </select>
                    </div>
                </div>

                <!-- الصف الرابع -->
                <div class="row g-3 mt-3">
                    <div class="col-md-4">
                        <label for="warehouse" class="form-label">الخزينة</label>
                        <select id="warehouse" name="warehouse" class="form-select rounded-pill shadow-sm">
                            <option selected>رئيسي</option>
                            <option>فرعي</option>
                        </select>
                    </div>
                    <div class="col-md-4">
                        <label for="min_limit" class="form-label">الحد الأدنى</label>
                        <input type="text" class="form-control rounded-pill shadow-sm" id="min_limit" name="min_limit" placeholder="أدخل الحد الأدنى">
                    </div>
                    <div class="col-md-4">
                        <label for="vendor" class="form-label">المورد</label>
                        <select id="vendor" name="vendor" class="form-select rounded-pill shadow-sm">
                            <option selected>اختر مورد</option>
                            <option>مورد 1</option>
                            <option>مورد 2</option>
                        </select>
                    </div>
                </div>

                <!-- الصف الخامس -->
                <div class="row g-3 mt-3">
                    <div class="col-md-4">
                        <label for="account_id" class="form-label">الحساب</label>
                        <select id="account_id" name="account_id" class="form-select rounded-pill shadow-sm">
                            <option selected>اختر حسابًا</option>
                            @foreach($accounts as $account)
                            <option value="{{ $account->id }}">{{ $account->name }}</option>

                            @endforeach
                        </select>

                    </div>
                </div>

                <!-- الأزرار -->
                <div class="row g-3 mt-4">
                    <div class="col-md-12 text-center">
                        <button type="submit" class="btn btn-primary px-5 rounded-pill"><i class="fas fa-save"></i> حفظ</button>
                        <button type="reset" class="btn btn-secondary px-5 rounded-pill"><i class="fas fa-times"></i> إلغاء</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
