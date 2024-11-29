<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>سند قبض</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/js/all.min.js"></script>
    <script>
        // تفعيل/إخفاء البحث المتقدم
        function toggleAdvancedSearch() {
            const advancedSearch = document.getElementById('advanced-search');
            if (advancedSearch.style.display === 'none' || advancedSearch.style.display === '') {
                advancedSearch.style.display = 'block';
            } else {
                advancedSearch.style.display = 'none';
            }
        }

        // إعادة تعيين الفلاتر
        function resetFilters() {
            document.getElementById('code').value = '';
            document.getElementById('category').value = '';
            document.getElementById('status').value = '';
            document.getElementById('date').value = '';
            document.getElementById('description').value = '';
            document.getElementById('amount-more').value = '';
            document.getElementById('amount-less').value = '';
            document.getElementById('added-by').value = '';
            document.getElementById('account').value = '';
            document.getElementById('salesman').value = '';
            document.getElementById('date-range-from').value = '';
            document.getElementById('date-range-to').value = '';
        }

        // دالة البحث
        function search() {
            const filters = {
                code: document.getElementById('code').value,
                category: document.getElementById('category').value,
                status: document.getElementById('status').value,
                date: document.getElementById('date').value,
                description: document.getElementById('description').value,
                amountMore: document.getElementById('amount-more').value,
                amountLess: document.getElementById('amount-less').value,
                addedBy: document.getElementById('added-by').value,
                account: document.getElementById('account').value,
                salesman: document.getElementById('salesman').value,
                dateRangeFrom: document.getElementById('date-range-from').value,
                dateRangeTo: document.getElementById('date-range-to').value
            };

            // هنا يمكن تنفيذ البحث باستخدام البيانات من الفلاتر
            console.log(filters); // يمكنك استبدال هذا بالبحث الفعلي في قاعدة البيانات أو أي عملية أخرى.
        }
    </script>
</head>
<body class="bg-light">

    <!-- الهيدر -->
    <div class="bg-primary text-white p-3 text-center">
        <h1>سند قبض</h1>
    </div>

    <!-- أزرار التحكم -->
    <div class="container my-3 d-flex justify-content-start">
        <!-- زر "سند قبض" -->
        <button class="btn btn-success btn-lg rounded-pill mr-3" onclick="window.location.href='{{route('add_receipt')}}'">
            <i class="fas fa-plus-circle"></i> <span class="ml-2">سند قبض</span>
        </button>

        <!-- زر "استيراد" -->
        <button class="btn btn-secondary btn-lg rounded-pill mr-3" onclick="window.location.href='import.html'">
            <i class="fas fa-upload"></i> <span class="ml-2">استيراد</span>
        </button>

        <!-- زر "إعدادات" -->
        <button class="btn btn-light btn-lg rounded-pill" >
            <i class="fas fa-cog"></i> <span class="ml-2">إعدادات</span>
        </button>
    </div>


    <!-- إحصائيات سريعة -->

    <div class="row">
        <div class="col-sm-4">
            <div class="card text-white bg-primary mb-3">
                <div class="card-body">
                    <h5 class="card-title">آخر 7 أيام</h5>
                    <h3>ر.س 0.00</h3>
                </div>
            </div>
        </div>
        <div class="col-sm-4">
            <div class="card text-white bg-info mb-3">
                <div class="card-body">
                    <h5 class="card-title">آخر 30 يوم</h5>
                    <h3>ر.س 0.00</h3>
                </div>
            </div>
        </div>
        <div class="col-sm-4">
            <div class="card text-white bg-success mb-3">
                <div class="card-body">
                    <h5 class="card-title">آخر 365 يوم</h5>
                    <h3>ر.س 0.00</h3>
                </div>
            </div>
        </div>
    </div>

    <!-- البحث -->

        <h5>بحث</h5>
        <form>
            <div class="form-row">
                <div class="col-md-3">
                    <label for="code">الكود</label>
                    <input type="text" id="code" class="form-control">
                </div>
                <div class="col-md-3">
                    <label for="category">التصنيف</label>
                    <select id="category" class="form-control">
                        <option>أي تصنيف</option>
                    </select>
                </div>
                <div class="col-md-3">
                    <label for="status">الحالة</label>
                    <select id="status" class="form-control">
                        <option>الكل</option>
                    </select>
                </div>
                <div class="col-md-3">
                    <label for="date">التاريخ</label>
                    <input type="date" id="date" class="form-control">
                </div>
            </div>
            <div class="form-row mt-3">
                <div class="col-md-12 text-right">
                    <button type="button" class="btn btn-outline-secondary" onclick="resetFilters()">إلغاء الفلتر</button>
                    <button type="button" class="btn btn-primary" onclick="search()">بحث</button>
                    <button type="button" class="btn btn-warning" onclick="toggleAdvancedSearch()">بحث متقدم</button>
                </div>
            </div>
        </form>

        <!-- البحث المتقدم -->
        <div class="advanced-search" id="advanced-search" style="display:none;">
            <div class="form-row">
                <div class="col-md-3">
                    <label for="description">الوصف</label>
                    <input type="text" id="description" class="form-control">
                </div>
                <div class="col-md-3">
                    <label for="amount-more">المبلغ أكثر من</label>
                    <input type="text" id="amount-more" class="form-control">
                </div>
                <div class="col-md-3">
                    <label for="amount-less">المبلغ أقل من</label>
                    <input type="text" id="amount-less" class="form-control">
                </div>
                <div class="col-md-3">
                    <label for="added-by">أضيفت بواسطة</label>
                    <select id="added-by" class="form-control">
                        <option>أي موظف</option>
                    </select>
                </div>
            </div>
            <div class="form-row mt-3">
                <div class="col-md-3">
                    <label for="account">الحساب الفرعي</label>
                    <select id="account" class="form-control">
                        <option>أي حساب</option>
                    </select>
                </div>
                <div class="col-md-3">
                    <label for="salesman">البائع</label>
                    <select id="salesman" class="form-control">
                        <option>أي بائع</option>
                    </select>
                </div>
                <div class="col-md-3">
                    <label for="date-range-from">تاريخ الإنشاء من</label>
                    <input type="date" id="date-range-from" class="form-control">
                </div>
                <div class="col-md-3">
                    <label for="date-range-to">إلى</label>
                    <input type="date" id="date-range-to" class="form-control">
                </div>
            </div>
        </div>
    </div>

    <!-- جدول المصروفات -->
    <div class="container bg-white p-3 rounded shadow-sm mb-4">
        <h5>النتائج</h5>
        <div class="table-responsive">
            <table class="table table-hover">
                <thead class="thead-light">
                    <tr>
                        <th>التحكم</th>
                        <th>الوصف</th>
                        <th>المبلغ</th>
                        <th>التاريخ</th>
                        <th>الحالة</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>
                            <button class="btn btn-warning btn-sm"><i class="fas fa-edit"></i></button>
                            <button class="btn btn-danger btn-sm"><i class="fas fa-trash"></i></button>
                        </td>
                        <td>نموذج سند قبض</td>
                        <td>ر.س 500.00</td>
                        <td>2024-11-25</td>
                        <td>تم الدفع</td>
                    </tr>
                    <tr>
                        <td>
                            <button class="btn btn-warning btn-sm"><i class="fas fa-edit"></i></button>
                            <button class="btn btn-danger btn-sm"><i class="fas fa-trash"></i></button>
                        </td>
                        <td>نموذج سند قبض</td>
                        <td>ر.س 1000.00</td>
                        <td>2024-11-20</td>
                        <td>معلق</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
