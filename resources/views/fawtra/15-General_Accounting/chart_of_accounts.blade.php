<div class="container-fluid">
    <!-- Header -->
    <div class="header bg-primary text-white p-3 mb-4">
        <h3>دليل الحسابات</h3>
    </div>
    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

    <div class="row">
        <!-- Sidebar -->
        <div class="col-md-3 sidebar bg-light p-3">
            <h5>أقسام الحسابات</h5>
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
                <div class="alert alert-success">{{ session('success') }}</div>
            @endif

            <!-- Assets Section -->
            <div id="assets" class="section">
                <h4>الأصول</h4>
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

            </div>

            <table>
                <thead>
                    <tr>
                        <th>اسم الحساب</th>
                        <th>نوع الحساب</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($assets as $asset)
                        <tr>
                            <td>{{ $asset->name }}</td>
                            <td>{{ $asset->type }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>


            <!-- Liabilities Section -->
            <div id="liabilities" class="section" style="display: none;">
                <h4>الخصوم</h4>
                <ul class="list-group">
                    @foreach ($liabilities as $liability)
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                            {{ $liability->name }}
                            <span class="badge bg-danger">{{ $liability->balance }} SAR</span>
                        </li>
                    @endforeach
                </ul>

            <table>
                <thead>
                    <tr>
                        <th>اسم الحساب</th>
                        <th>نوع الحساب</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($liabilities as $liability)
                        <tr>
                            <td>{{ $liability->name }}</td>
                            <td>{{ $liability->type }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>

                <button class="btn btn-success mt-4" data-bs-toggle="modal" data-bs-target="#addAccountModal">
                    <i class="fa-solid fa-plus"></i> إضافة حساب
                </button>
            </div>

            <!-- Expenses Section -->
            <div id="expenses" class="section" style="display: none;">
                <h4>المصروفات</h4>
                <ul class="list-group">
                    @foreach ($expenses as $expense)
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                            {{ $expense->name }}
                            <span class="badge bg-warning">{{ $expense->balance }} SAR</span>
                        </li>
                    @endforeach
                </ul>
                <button class="btn btn-success mt-4" data-bs-toggle="modal" data-bs-target="#addAccountModal">
                    <i class="fa-solid fa-plus"></i> إضافة حساب
                </button>
            </div>

            <!-- Revenues Section -->
            <div id="revenues" class="section" style="display: none;">
                <h4>الإيرادات</h4>
                <ul class="list-group">
                    @foreach ($revenues as $revenue)
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                            {{ $revenue->name }}
                            <span class="badge bg-success">{{ $revenue->balance }} SAR</span>
                        </li>
                    @endforeach
                </ul>
                <button class="btn btn-success mt-4" data-bs-toggle="modal" data-bs-target="#addAccountModal">
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
                <form action="{{ route('accounts.add') }}" method="POST" class="p-4 bg-light shadow rounded">
                    @csrf
                    <div class="mb-3">
                        <label for="type" class="form-label">نوع الحساب</label>
                        <select name="type" id="type" class="form-select" required>
                            <option value="asset">أصول</option>
                            <option value="liability">خصوم</option>
                            <option value="equity">حقوق ملكية</option>
                            <option value="revenue">إيرادات</option>
                            <option value="expense">مصروفات</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="code" class="form-label text-primary fw-bold">الكود</label>
                        <input type="text" class="form-control border-primary rounded-pill" id="code"
                            name="code" placeholder="أدخل كود الحساب" required>
                    </div>
                    <div class="mb-3">
                        <label for="accountName" class="form-label text-primary fw-bold">اسم الحساب</label>
                        <input type="text" class="form-control border-primary rounded-pill" id="accountName"
                            name="name" placeholder="أدخل اسم الحساب" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label text-primary fw-bold">الطبيعة</label>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="normal_balance" id="debit"
                                value="debit" checked>
                            <label class="form-check-label" for="debit">مدين</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="normal_balance" id="credit"
                                value="credit">
                            <label class="form-check-label" for="credit">دائن</label>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary w-100 mt-3 rounded-pill">
                        <i class="fa-solid fa-save me-2"></i> حفظ
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>

<script>
    function showSection(section) {
        document.querySelectorAll('.section').forEach(sec => sec.style.display = 'none');
        document.getElementById(section).style.display = 'block';
    }
</script>
