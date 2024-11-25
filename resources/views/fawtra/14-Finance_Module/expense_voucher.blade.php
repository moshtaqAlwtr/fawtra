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

                <!-- الحقول الرئيسية -->
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

                <!-- الحقول الإضافية -->
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

                <!-- حقل "الوحدة" مع الرابط متعدد -->
                <div class="row g-3 mt-3 p-3 border rounded shadow-sm bg-white">
                    <!-- الوحدة -->
                    <div class="col-md-3">
                        <label for="unit" class="form-label fw-bold">الوحدة
                            <a href="#" id="toggle-multi" class="text-primary ms-2 text-decoration-none">متعدد</a>
                        </label>
                        <select id="unit" name="unit" class="form-select rounded-pill shadow">
                            <option selected>حدد الوحدة</option>
                            <option>وحدة 1</option>
                            <option>وحدة 2</option>
                        </select>
                    </div>

                    <!-- الخزينة -->
                    <div class="col-md-3">
                        <label for="treasury_id" class="form-label fw-bold">الخزينة</label>
                        <select id="treasury_id" name="treasury_id" class="form-select rounded-pill shadow">
                            <option selected>اختر خزينة</option>
                            @if(isset($treasuries) && $treasuries->count() > 0)
                                @foreach($treasuries as $treasury)
                                    <option value="{{ $treasury->id }}">{{ $treasury->name }}</option>
                                @endforeach
                            @else
                                <option value="">لا توجد خزائن متاحة</option>
                            @endif
                        </select>
                    </div>

                    <!-- الضريبة -->
                    <div class="col-md-3">
                        <label for="tax_id" class="form-label fw-bold">الضريبة</label>
                        <select id="tax_id" name="tax_id" class="form-select rounded-pill shadow">
                            <option selected>اختر ضريبة</option>
                            @if(isset($taxes) && $taxes->count() > 0)
                                @foreach($taxes as $tax)
                                    <option value="{{ $tax->id }}">{{ $tax->name }}</option>
                                @endforeach
                            @else
                                <option value="">لا توجد ضرائب متاحة</option>
                            @endif
                        </select>
                    </div>

                    <!-- الحساب -->
                    <div class="col-md-3">
                        <label for="account_id" class="form-label fw-bold">الحساب</label>
                        <select id="account_id" name="account_id" class="form-select rounded-pill shadow">
                            <option selected>اختر حسابًا</option>
                            @foreach($accounts as $account)
                                <option value="{{ $account->id }}">{{ $account->name }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <!-- جدول متعدد -->
                <div id="multi-fields" class="mt-4 d-none">
                    <h5>تفاصيل السند</h5>
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>الوحدة</th>
                                <th>المبلغ</th>
                                <th>التصنيف</th>
                                <th>الضريبة</th>
                                <th>الحساب</th>
                                <th>الوصف</th>
                                <th>إجراء</th>
                            </tr>
                        </thead>
                        <tbody id="details">
                            <tr>
                                <td><input type="text" name="details[0][unit]" class="form-control" placeholder="الوحدة"></td>
                                <td><input type="number" name="details[0][amount]" class="form-control" step="0.01" placeholder="المبلغ"></td>
                                <td><input type="text" name="details[0][category]" class="form-control" placeholder="التصنيف"></td>
                                <td>
                                    <div class="col-md-4">
                                        <label for="tax_id" class="form-label">الضريبة</label>
                                        <select id="tax_id" name="tax_id" class="form-select">
                                            <option selected>اختر ضريبة</option>
                                            @if(isset($taxes) && $taxes->count() > 0)
                                                @foreach($taxes as $tax)
                                                    <option value="{{ $tax->id }}">{{ $tax->name }}</option>
                                                @endforeach
                                            @else
                                                <option value="">لا توجد ضرائب متاحة</option>
                                            @endif
                                        </select>

                                    </div>
                                </div>

                                </td>
                                <td>
                                    <select name="details[0][account_id]" class="form-select">
                                        <option value="">بدون</option>
                                        @foreach($accounts as $account)
                                        <option value="{{ $account->id }}">{{ $account->name }}</option>
                                        @endforeach
                                    </select>
                                </td>
                                <td><textarea name="details[0][description]" class="form-control" placeholder="الوصف"></textarea></td>
                                <td><button type="button" onclick="removeRow(this)" class="btn btn-danger btn-sm">حذف</button></td>
                            </tr>
                        </tbody>
                    </table>
                    <button type="button" onclick="addRow()" class="btn btn-primary btn-sm">إضافة صف</button>
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

<script>
    const toggleMulti = document.getElementById('toggle-multi');
    const multiFields = document.getElementById('multi-fields');
    const singleFields = document.querySelectorAll('.single-fields');
    let rowIndex = 1;

    // تبديل العرض بين الحقول الفردية والجدول متعدد
    toggleMulti.addEventListener('click', function (e) {
        e.preventDefault();
        multiFields.classList.toggle('d-none');
        singleFields.forEach(field => {
            field.classList.toggle('d-none');
        });
    });

    // إضافة صف جديد
    function addRow() {
        const table = document.getElementById('details');
        const newRow = `
            <tr>
                <td><input type="text" name="details[${rowIndex}][unit]" class="form-control" placeholder="الوحدة"></td>
                <td><input type="number" name="details[${rowIndex}][amount]" class="form-control" step="0.01" placeholder="المبلغ"></td>
                <td><input type="text" name="details[${rowIndex}][category]" class="form-control" placeholder="التصنيف"></td>
                <td>
                    <select name="details[${rowIndex}][tax_id]" class="form-select">
                        <option value="">بدون</option>
                        <option>ضريبة 1</option>
                        <option>ضريبة 2</option>
                    </select>
                </td>
                <td>
                    <select name="details[${rowIndex}][account_id]" class="form-select">
                        <option value="">بدون</option>
                        @foreach($accounts as $account)
                        <option value="{{ $account->id }}">{{ $account->name }}</option>
                        @endforeach
                    </select>
                </td>
                <td><textarea name="details[${rowIndex}][description]" class="form-control" placeholder="الوصف"></textarea></td>
                <td><button type="button" onclick="removeRow(this)" class="btn btn-danger btn-sm">حذف</button></td>
            </tr>
        `;
        table.insertAdjacentHTML('beforeend', newRow);
        rowIndex++;
    }

    // حذف الصف
    function removeRow(button) {
        button.parentElement.parentElement.remove();
    }
</script>
