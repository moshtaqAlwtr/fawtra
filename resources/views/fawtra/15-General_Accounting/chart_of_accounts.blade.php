<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>دليل الحسابات</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <style>
        body {
            background-color: #f8f9fa;
        }
        .header {
            background: linear-gradient(90deg, #007bff, #0056b3);
            color: #fff;
            text-align: center;
            border-radius: 10px;
        }
        .sidebar {
            border-radius: 10px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }
        .content {
            background-color: #fff;
            border-radius: 10px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }
        .list-group-item a {
            text-decoration: none;
            color: #007bff;
        }
        .list-group-item a:hover {
            text-decoration: underline;
            color: #0056b3;
        }
    </style>
</head>
<body>
<div class="container-fluid mt-4">
    <!-- Header -->
    <div class="header p-4 mb-4">
        <h2>دليل الحسابات</h2>
    </div>

    <div class="row">
        <!-- Sidebar -->
        <div class="col-md-3 sidebar bg-light p-3">
            <h5 class="fw-bold mb-3">أقسام الحسابات</h5>
            <ul class="list-group">
                <li class="list-group-item">
                    <a href="#" onclick="showSection('assets')">
                        <i class="fa-solid fa-folder"></i> الأصول
                    </a>
                </li>
                <li class="list-group-item">
                    <a href="#" onclick="showSection('liabilities')">
                        <i class="fa-solid fa-folder"></i> الخصوم
                    </a>
                </li>
                <li class="list-group-item">
                    <a href="#" onclick="showSection('expenses')">
                        <i class="fa-solid fa-folder"></i> المصروفات
                    </a>
                </li>
                <li class="list-group-item">
                    <a href="#" onclick="showSection('revenues')">
                        <i class="fa-solid fa-folder"></i> الإيرادات
                    </a>
                </li>
            </ul>
        </div>

        <!-- Content -->
        <div class="col-md-9 content p-4">
            <!-- Success Message -->
            @if (session('success'))
                <div class="alert alert-success text-center fw-bold">{{ session('success') }}</div>
            @endif

            <!-- Assets Section -->
            <div id="assets" class="section">
                <h4 class="text-primary fw-bold mb-3">الأصول</h4>
                <ul class="list-group">
                    @if ($assets && count($assets) > 0)
                        @foreach ($assets as $asset)
                            <li class="list-group-item d-flex justify-content-between align-items-center">
                                {{ $asset->name }}
                                <span class="badge bg-primary">{{ $asset->normal_balance }}</span>
                            </li>
                        @endforeach
                    @else
                        <li class="list-group-item">لا توجد أصول حاليًا.</li>
                    @endif
                </ul>
                <button class="btn btn-primary mt-4" data-bs-toggle="modal" data-bs-target="#addAccountModal" onclick="setAccountType('asset')">
                    <i class="fa-solid fa-plus"></i> إضافة حساب
                </button>
            </div>

            <!-- Liabilities Section -->
            <div id="liabilities" class="section" style="display: none;">
                <h4 class="text-danger fw-bold mb-3">الخصوم</h4>
                <ul class="list-group">
                    @if ($liabilities && count($liabilities) > 0)
                        @foreach ($liabilities as $liability)
                            <li class="list-group-item d-flex justify-content-between align-items-center">
                                {{ $liability->name }}
                                <span class="badge bg-danger">{{ $liability->balance }} SAR</span>
                            </li>
                        @endforeach
                    @else
                        <li class="list-group-item">لا توجد خصوم حاليًا.</li>
                    @endif
                </ul>
                <button class="btn btn-primary mt-4" data-bs-toggle="modal" data-bs-target="#addAccountModal" onclick="setAccountType('liability')">
                    <i class="fa-solid fa-plus"></i> إضافة حساب
                </button>
            </div>

            <!-- Expenses Section -->
            <div id="expenses" class="section" style="display: none;">
                <h4 class="text-warning fw-bold mb-3">المصروفات</h4>
                <ul class="list-group">
                    @if ($expenses && count($expenses) > 0)
                        @foreach ($expenses as $expense)
                            <li class="list-group-item d-flex justify-content-between align-items-center">
                                {{ $expense->name }}
                                <span class="badge bg-warning">{{ $expense->balance }} SAR</span>
                            </li>
                        @endforeach
                    @else
                        <li class="list-group-item">لا توجد مصروفات حاليًا.</li>
                    @endif
                </ul>
                <button class="btn btn-primary mt-4" data-bs-toggle="modal" data-bs-target="#addAccountModal" onclick="setAccountType('expense')">
                    <i class="fa-solid fa-plus"></i> إضافة حساب
                </button>
            </div>

            <!-- Revenues Section -->
            <div id="revenues" class="section" style="display: none;">
                <h4 class="text-success fw-bold mb-3">الإيرادات</h4>
                <ul class="list-group">
                    @if ($revenues && count($revenues) > 0)
                        @foreach ($revenues as $revenue)
                            <li class="list-group-item d-flex justify-content-between align-items-center">
                                {{ $revenue->name }}
                                <span class="badge bg-success">{{ $revenue->balance }} SAR</span>
                            </li>
                        @endforeach
                    @else
                        <li class="list-group-item">لا توجد إيرادات حاليًا.</li>
                    @endif
                </ul>
                <button class="btn btn-primary mt-4" data-bs-toggle="modal" data-bs-target="#addAccountModal" onclick="setAccountType('revenue')">
                    <i class="fa-solid fa-plus"></i> إضافة حساب
                </button>
            </div>
        </div>
    </div>
</div>

<!-- Modal for Adding Account -->
<div class="modal fade" id="addAccountModal" tabindex="-1" aria-labelledby="addAccountModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addAccountModalLabel">إضافة حساب جديد</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" style="margin-left: 1%" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="{{ route('accounts.add') }}" method="POST">
                    @csrf
                    <!-- نوع الحساب -->
                    <div class="mb-3">
                        <label for="type" class="form-label">نوع الحساب</label>
                        <select name="type" id="type" class="form-select" required>
                            <option value="asset">الأصول</option>
                            <option value="liability">الخصوم</option>
                            <option value="equity">حقوق الملكية</option>
                            <option value="revenue">الإيرادات</option>
                            <option value="expense">المصروفات</option>
                        </select>
                    </div>

                    <!-- كود الحساب -->
                    <div class="mb-3">
                        <label for="code" class="form-label">كود الحساب</label>
                        <input type="text" class="form-control" id="code" name="code" placeholder="أدخل كود الحساب" required>
                    </div>

                    <!-- اسم الحساب -->
                    <div class="mb-3">
                        <label for="accountName" class="form-label">اسم الحساب</label>
                        <input type="text" class="form-control" id="accountName" name="name" placeholder="أدخل اسم الحساب" required>
                    </div>

                    <!-- طبيعة الحساب -->
                    <div class="mb-3">
                        <label class="form-label">الطبيعة</label>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="normal_balance" id="debit" value="debit" checked>
                            <label class="form-check-label" for="debit">مدين</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="normal_balance" id="credit" value="credit">
                            <label class="form-check-label" for="credit">دائن</label>
                        </div>
                    </div>

                    <!-- زر الحفظ -->
                    <button type="submit" class="btn btn-primary w-100 mt-3">حفظ</button>
                </form>
            </div>
        </div>
    </div>
</div>

<script>
    function showSection(sectionId) {
        document.querySelectorAll('.section').forEach(section => section.style.display = 'none');
        document.getElementById(sectionId).style.display = 'block';
    }

    function setAccountType(type) {
        document.getElementById('accountType').value = type;
    }
</script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
