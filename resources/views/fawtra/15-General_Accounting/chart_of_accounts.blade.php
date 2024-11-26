
    <title>دليل الحسابات</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>

    <!-- العنوان -->
    <div class="text-center mb-4">
        <h1 class="display-6 text-primary">دليل الحسابات</h1>
    </div>

    <div class="row">
        <!-- Sidebar -->
        <div class="col-md-3 bg-white rounded shadow-sm p-3">
            <h4 class="mb-4">الأقسام</h4>
            <div class="treeview">
                <ul class="list-unstyled">
                    <li class="mb-2" data-target="assets" >
                        <i class="fa-solid fa-folder text-primary toggle-folder"></i> الأصول
                        {!! $assetsTree !!}
                    </li>
                    <li class="mb-2"data-target="liabilities">
                        <i class="fa-solid fa-folder text-danger toggle-folder"></i> الخصوم
                        {!! $liabilitiesTree !!}
                    </li>
                    <li class="mb-2" data-target="expenses">
                        <i class="fa-solid fa-folder text-warning toggle-folder"></i> المصروفات
                        {!! $expensesTree !!}
                    </li>
                    <li class="mb-2" data-target="revenues">
                        <i class="fa-solid fa-folder text-success toggle-folder"></i> الإيرادات
                        {!! $revenuesTree !!}
                    </li>
                </ul>
            </div>
        </div>

        <!-- Content -->
        <div class="col-md-9">
            <div class="bg-white rounded shadow-sm p-4">
                <div id="loading" style="display: none; text-align: center; margin-top: 10px;">
                    <i class="fa fa-spinner fa-spin fa-2x text-primary"></i>
                </div>
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
                                <div class="dropdown">
                                            <button class="btn btn-light btn-sm" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                                <i class="fa-solid fa-ellipsis-vertical"></i>
                                            </button>
                                            <ul class="dropdown-menu dropdown-menu-end">
                                                <li><a class="dropdown-item" href="#">تعديل</a></li>
                                                <li><a class="dropdown-item" href="#">حذف</a></li>
                                                <li><a class="dropdown-item" href="#">تفاصيل</a></li>
                                            </ul>
                                        </div>
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
                                <div class="dropdown">
                                            <button class="btn btn-light btn-sm" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                                <i class="fa-solid fa-ellipsis-vertical"></i>
                                            </button>
                                            <ul class="dropdown-menu dropdown-menu-end">
                                                <li><a class="dropdown-item" href="#">تعديل</a></li>
                                                <li><a class="dropdown-item" href="#">حذف</a></li>
                                                <li><a class="dropdown-item" href="#">تفاصيل</a></li>
                                            </ul>
                                        </div>
                            </li>
                        @endforeach
                    </ul>
                    <button class="btn btn-primary mt-4" data-bs-toggle="modal" data-bs-target="#addAccountModal" onclick="setAccountType('asset')">
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
                                <div class="dropdown">
                                            <button class="btn btn-light btn-sm" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                                <i class="fa-solid fa-ellipsis-vertical"></i>
                                            </button>
                                            <ul class="dropdown-menu dropdown-menu-end">
                                                <li><a class="dropdown-item" href="#">تعديل</a></li>
                                                <li><a class="dropdown-item" href="#">حذف</a></li>
                                                <li><a class="dropdown-item" href="#">تفاصيل</a></li>
                                            </ul>
                                        </div>
                            </li>
                        @endforeach
                    </ul>
                    <button class="btn btn-primary mt-4" data-bs-toggle="modal" data-bs-target="#addAccountModal" onclick="setAccountType('asset')">
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
                                <div class="dropdown">
                                            <button class="btn btn-light btn-sm" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                                <i class="fa-solid fa-ellipsis-vertical"></i>
                                            </button>
                                            <ul class="dropdown-menu dropdown-menu-end">
                                                <li><a class="dropdown-item" href="#">تعديل</a></li>
                                                <li><a class="dropdown-item" href="#">حذف</a></li>
                                                <li><a class="dropdown-item" href="#">تفاصيل</a></li>
                                            </ul>
                                        </div>
                            </li>
                        @endforeach
                    </ul>
                    <button class="btn btn-primary mt-4" data-bs-toggle="modal" data-bs-target="#addAccountModal" onclick="setAccountType('asset')">
                        <i class="fa-solid fa-plus"></i> إضافة حساب
                    </button>
                </div>

            </div>
        </div>
    </div>
</div>

<!-- Modal for Adding Account -->
<div class="modal fade" id="addAccountModal" tabindex="-1" aria-labelledby="addAccountModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header bg-primary text-white">
                <h5 class="modal-title" id="addAccountModalLabel">إضافة حساب جديد</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="{{ route('accounts.store') }}" method="get">
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
                        <label for="parent_account_id" class="form-label">الحساب الأب</label>
                        <select name="parent_account_id" id="parent_account_id" class="form-select">
                            <option value="">-- اختر الحساب الأب --</option>
                            @foreach($accounts as $account)
                                <option value="{{ $account->id }}">{{ $account->name }}</option>
                            @endforeach
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
    document.addEventListener("DOMContentLoaded", function () {
        // إضافة خاصية النقر على أيقونة المجلد
        document.querySelectorAll('.toggle-folder').forEach(function (icon) {
            icon.addEventListener('click', function (e) {
                e.stopPropagation(); // منع تأثير النقر على العنصر الأب
                const sublist = this.nextElementSibling;
                if (sublist) {
                    sublist.classList.toggle('collapse');
                    this.classList.toggle('fa-folder');
                    this.classList.toggle('fa-folder-open');
                }
            });
        });

        // التعامل مع الأقسام الجانبية لعرض المحتوى الخاص بها
        const sections = document.querySelectorAll('.section');
        document.querySelectorAll('.treeview li').forEach(function (item) {
            item.addEventListener('click', function (e) {
                e.stopPropagation(); // منع تأثير النقر على العناصر الداخلية
                const target = this.getAttribute('data-target'); // جلب القسم المستهدف
                if (target) {
                    // إخفاء جميع الأقسام
                    sections.forEach(function (section) {
                        section.style.display = 'none';
                    });

                    // عرض القسم المستهدف
                    const targetSection = document.getElementById(target);
                    if (targetSection) {
                        targetSection.style.display = 'block';
                    }
                }
            });
        });
    });
</script>


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

