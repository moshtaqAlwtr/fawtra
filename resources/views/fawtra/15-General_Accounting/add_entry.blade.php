<!DOCTYPE html>
<html lang="ar">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>إضافة قيد</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
    
</head>
<body>

    <!-- شريط أزرق متدرج في الأعلى -->
    <div class="top-bar">
        <h2>إضافة قيد</h2>
    </div>

    
        <div class="d-flex justify-content-between mb-3">
            <button class="btn btn-save"><i class="fas fa-save"></i> حفظ</button>
            <button class="btn btn-draft"><i class="fas fa-file-alt"></i> حفظ كمسودة</button>
            <button class="btn btn-cancel"><i class="fas fa-times"></i> إلغاء</button>
        </div>

        <!-- القسم الأساسي لإدخال البيانات -->
        <div class="row mb-4">
            <div class="col-md-4">
                <div class="card p-3">
                    <div class="mb-3">
                        <label for="date" class="form-label">التاريخ</label>
                        <input type="text" id="date" class="form-control">
                    </div>
                    <div class="mb-3">
                        <label for="currency" class="form-label">العملة</label>
                        <select id="currency" class="form-select">
                            <option>ريال سعودي</option>
                            <option>دولار أمريكي</option>
                            <option>يورو</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="number" class="form-label">رقم</label>
                        <input type="text" id="number" class="form-control" placeholder="47849">
                    </div>
                </div>
            </div>
            <div class="col-md-8">
                <div class="card p-3">
                    <label for="description" class="form-label">الوصف</label>
                    <textarea id="description" class="form-control" rows="4" placeholder="أدخل الوصف هنا"></textarea>
                    <div class="upload-section mt-3">
                        <i class="fas fa-cloud-upload-alt"></i>
                        <p>أسقط الملف هنا أو اختر من جهازك</p>
                        <input type="file" class="form-control-file d-none">
                    </div>
                </div>
            </div>
        </div>

        <!-- جدول الإدخالات -->
        <div class="card p-3">
            <table class="table table-bordered">
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
                            <select class="form-select">
                                <option>اختر حساب</option>
                                <option>الحساب 1</option>
                                <option>الحساب 2</option>
                            </select>
                        </td>
                        <td><input type="text" class="form-control" placeholder="الوصف"></td>
                        <td><select class="form-select"><option>لا شيء</option><option>مركز 1</option></select></td>
                        <td><input type="number" class="form-control" value="0"></td>
                        <td><input type="number" class="form-control" value="0"></td>
                        <td>
                            <button class="btn btn-outline-danger btn-sm" onclick="removeRow(this)"><i class="fas fa-trash-alt"></i></button>
                        </td>
                    </tr>
                    <!-- إجمالي المدين والدائن -->
                    <tr>
                        <td colspan="3" class="text-end"><strong>الإجمالي</strong></td>
                        <td>0</td>
                        <td>0</td>
                        <td></td>
                    </tr>
                </tbody>
            </table>
            <button class="btn btn-primary btn-add-row mt-2" onclick="addRow()"><i class="fas fa-plus-circle"></i> إضافة</button>
        </div>
    </div>

           // تهيئة Flatpickr لحقل التاريخ
    

        // دالة لإضافة صف جديد
      