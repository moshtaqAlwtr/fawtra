<!DOCTYPE html>
<html lang="ar">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>إضافة قيد</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
    <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
</head>
<body>

    <!-- شريط أزرق متدرج في الأعلى -->
    <div class="bg-primary text-white p-3 mb-4">
        <h2 class="m-0">إضافة قيد</h2>
    </div>


    <form action="{{ route('journal_entries.store') }}" method="POST" enctype="multipart/form-data">
        @csrf <!-- حماية من هجمات CSRF -->

        <!-- القسم الأساسي لإدخال البيانات -->
        <div class="row mb-4">
            <div class="col-md-4">
                <div class="card p-3">
                    <div class="mb-3">
                        <label for="date" class="form-label">التاريخ</label>
                        <input type="text" id="date" name="date" class="form-control" placeholder="اختر التاريخ" required>
                    </div>
                    <div class="mb-3">
                        <label for="currency" class="form-label">العملة</label>
                        <select id="currency" name="currency" class="form-select" required>
                            <option value="SAR">ريال سعودي</option>
                            <option value="USD">دولار أمريكي</option>
                            <option value="EUR">يورو</option>
                        </select>
                    </div>
                    @if(isset($nextId))
                    <div class="mb-3">
                        <label for="entry_id" class="form-label">رقم القيد</label>
                        <input type="text" id="entry_id" class="form-control" value="{{ $nextId }}" readonly>
                    </div>
                @endif



                </div>
            </div>

            <div class="col-md-8">
                <div class="card p-3">
                    <label for="description" class="form-label">الوصف</label>
                    <textarea id="description" name="description" class="form-control" rows="4" placeholder="أدخل الوصف هنا"></textarea>
                    <div class="upload-section mt-3">
                        <i class="fas fa-cloud-upload-alt"></i>
                        <label for="attachment" class="form-label d-block">أسقط الملف هنا أو اختر من جهازك</label>
                        <input type="file" id="attachment" name="attachment" class="form-control" accept=".jpg,.jpeg,.png,.pdf">
                    </div>
                </div>
            </div>
        </div>

        <div class="row mb-4">
            <div class="col-md-4">
                <div class="card p-3">
                    <label for="client_id" class="form-label">العميل</label>

                    <select id="client_id" name="client_id" class="form-select">
                        <option value="">اختر العميل</option>
                        @foreach($clients as $client)
                            <option value="{{ $client->id }}">{{ $client->trade_name }}</option>
                        @endforeach
                    </select>
                </div>
            </div>

            <div class="col-md-4">
                <div class="card p-3">
                    <label for="invoice_id" class="form-label">الفاتورة</label>
                        <select id="invoice_id" name="invoice_id" class="form-select">
                        <option value="">اختر الفاتورة</option>
                        @foreach($invoices as $invoice)
                            <option value="{{ $invoice->invoice_id }}">{{ $invoice->invoice_id }}</option>
                        @endforeach
                    </select>
                </div>
            </div>

            <div class="col-md-4">
                <div class="card p-3">
                    <label for="employee_id" class="form-label">الموظف</label>

                        <select id="employee_id" name="employee_id" class="form-select">
                        <option value="">اختر الموظف</option>
                        @foreach($employees as $employee)
                            <option value="{{ $employee->id }}">{{ $employee->first_name }} {{ $employee->last_name }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
        </div>

        <!-- جدول الإدخالات -->
        <div class="card p-3">
            <table class="table table-bordered text-center">
                <thead>
                    <tr>
                        <th>اسم الحساب <span class="text-danger">*</span></th>
                        <th>الوصف</th>
                        <th>مركز التكلفة</th>
                        <th>مدين</th>
                        <th>دائن</th>
                        <th>إجراء</th>
                    </tr>
                </thead>
                <tbody id="entryTable">
                    <tr>
                        <td>
                            <select name="accounts[]" class="form-select" required>
                                <option value="">اختر حساب</option>
                                @foreach($accounts as $account)
                                    <option value="{{ $account->id }}">{{ $account->name }}</option>
                                @endforeach
                            </select>

                        </td>
                         <td><input type="text" name="descriptions[]" class="form-control" placeholder="الوصف"></td>
                        <td>
                            <select name="cost_centers[]" class="form-select">
                                <option value="">لا شيء</option>
                                <option value="1">مركز 1</option>
                            </select>
                        </td>
                        <td><input type="number" name="debits[]" class="form-control" value="0"></td>
                        <td><input type="number" name="credits[]" class="form-control" value="0"></td>
                        <td>
                            <button type="button" class="btn btn-outline-danger btn-sm" onclick="removeRow(this)"><i class="fas fa-trash-alt"></i></button>
                        </td>
                    </tr>
                </tbody>
            </table>
            <button type="button" class="btn btn-primary btn-add-row mt-2" onclick="addRow()"><i class="fas fa-plus-circle"></i> إضافة صف</button>
        </div>

        <!-- زر الحفظ -->
        <div class="d-flex justify-content-between mt-3">
            <button type="submit" class="btn btn-success"><i class="fas fa-save"></i> حفظ</button>
        </div>
    </form>
     </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
    <script>
        // تهيئة Flatpickr لحقل التاريخ
        flatpickr("#date", {
            dateFormat: "Y-m-d",
            locale: "ar",
        });

        // دالة لإضافة صف جديد
        function addRow() {
            const table = document.getElementById('entryTable');
            const newRow = table.rows[0].cloneNode(true);
            newRow.querySelectorAll('input').forEach(input => input.value = '');
            newRow.querySelectorAll('select').forEach(select => select.selectedIndex = 0);
            table.appendChild(newRow);
        }

        // دالة لحذف صف
        function removeRow(button) {
            const row = button.parentElement.parentElement;
            const table = document.getElementById('entryTable');
            if (table.rows.length > 1) {
                row.remove();
            } else {
                alert("لا يمكن حذف جميع الصفوف");
            }
        }
    </script>
</body>
</html>
