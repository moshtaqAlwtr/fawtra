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
        .treeview ul {
            list-style: none;
            padding-left: 20px;
        }
        .treeview li {
            margin-bottom: 5px;
        }
        .treeview a {
            text-decoration: none;
            color: #007bff;
        }
        .treeview li ul {
    display: none;
    padding-left: 20px;
}

.treeview li.open > ul {
    display: block;
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
    <div class="treeview">
        <ul>
            <li>
                <i class="fa-solid fa-folder"></i> الأصول
                @if (!empty($assetsTree))
                    {!! $assetsTree !!}
                @else
                    <ul><li>لا توجد بيانات</li></ul>
                @endif
            </li>
            <li>
                <i class="fa-solid fa-folder"></i> الخصوم
                @if (!empty($liabilitiesTree))
                    {!! $liabilitiesTree !!}
                @else
                    <ul><li>لا توجد بيانات</li></ul>
                @endif
            </li>
            <li>
                <i class="fa-solid fa-folder"></i> المصروفات
                @if (!empty($expensesTree))
                    {!! $expensesTree !!}
                @else
                    <ul><li>لا توجد بيانات</li></ul>
                @endif
            </li>
            <li>
                <i class="fa-solid fa-folder"></i> الإيرادات
                @if (!empty($revenuesTree))
                    {!! $revenuesTree !!}
                @else
                    <ul><li>لا توجد بيانات</li></ul>
                @endif
            </li>
        </ul>
    </div>
</div>




        <!-- Content -->
        <div class="col-md-9 content p-4">
            <!-- Success Message -->
            @if (session('success'))
                <div class="alert alert-success text-center fw-bold">{{ session('success') }}</div>
            @endif

            <!-- Sections -->
            <div id="assets" class="section">
                <h4 class="text-primary fw-bold mb-3">الأصول</h4>
                <ul class="list-group">
                    @foreach ($assets as $asset)
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                            {{ $asset->name }}
                            <span class="badge bg-primary">{{ $asset->normal_balance }}</span>
                        </li>
                    @endforeach
                </ul>
                <button class="btn btn-primary mt-4" data-bs-toggle="modal" data-bs-target="#addAccountModal" onclick="setAccountType('asset')">
                    <i class="fa-solid fa-plus"></i> إضافة حساب
                </button>
            </div>

            <div id="liabilities" class="section" style="display: none;">
                <h4 class="text-danger fw-bold mb-3">الخصوم</h4>
                <ul class="list-group">
                    @foreach ($liabilities as $liability)
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                            {{ $liability->name }}
                            <span class="badge bg-danger">{{ $liability->normal_balance }}</span>
                        </li>
                    @endforeach
                </ul>
                <button class="btn btn-primary mt-4" data-bs-toggle="modal" data-bs-target="#addAccountModal" onclick="setAccountType('liability')">
                    <i class="fa-solid fa-plus"></i> إضافة حساب
                </button>
            </div>

            <div id="expenses" class="section" style="display: none;">
                <h4 class="text-warning fw-bold mb-3">المصروفات</h4>
                <ul class="list-group">
                    @foreach ($expenses as $expense)
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                            {{ $expense->name }}
                            <span class="badge bg-warning">{{ $expense->normal_balance }}</span>
                        </li>
                    @endforeach
                </ul>
                <button class="btn btn-primary mt-4" data-bs-toggle="modal" data-bs-target="#addAccountModal" onclick="setAccountType('expense')">
                    <i class="fa-solid fa-plus"></i> إضافة حساب
                </button>
            </div>

            <div id="revenues" class="section" style="display: none;">
                <h4 class="text-success fw-bold mb-3">الإيرادات</h4>
                <ul class="list-group">
                    @foreach ($revenues as $revenue)
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                            {{ $revenue->name }}
                            <span class="badge bg-success">{{ $revenue->normal_balance }}</span>
                        </li>
                    @endforeach
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
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="{{ route('accounts.add') }}" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label for="type" class="form-label">نوع الحساب</label>
                        <select name="type" id="type" class="form-select" required>
                            <option value="asset">الأصول</option>
                            <option value="liability">الخصوم</option>
                            <option value="expense">المصروفات</option>
                            <option value="revenue">الإيرادات</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="code" class="form-label">كود الحساب</label>
                        <input type="text" class="form-control" id="code" name="code" required>
                    </div>
                    <div class="mb-3">
                        <label for="name" class="form-label">اسم الحساب</label>
                        <input type="text" class="form-control" id="name" name="name" required>
                    </div>
                    <div class="mb-3">
                        <label for="normal_balance" class="form-label">الطبيعة</label>
                        <select name="normal_balance" id="normal_balance" class="form-select" required>
                            <option value="debit">مدين</option>
                            <option value="credit">دائن</option>
                        </select>
                    </div>
                    <button type="submit" class="btn btn-primary w-100">حفظ</button>
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

    function buildTree(accounts, parentId = null) {
        let html = '<ul>';
        accounts.forEach(account => {
            if (account.parent_account_id === parentId) {
                html += `<li><strong>${account.name}</strong>`;
                html += buildTree(accounts, account.id);
                html += '</li>';
            }
        });
        html += '</ul>';
        return html;
    }
    document.querySelectorAll('.treeview li').forEach(function (item) {
    item.addEventListener('click', function (e) {
        e.stopPropagation();
        this.classList.toggle('open');
    });
});

</script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
