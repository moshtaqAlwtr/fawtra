
<div class="container-fluid mt-4">
    <!-- Header -->
    <div class="header p-4 mb-4">
        <h2>دليل الحسابات</h2>
    </div>

    <div class="row">
        <!-- Sidebar -->
        <div class="col-md-3 sidebar bg-light p-3">
            <div class="treeview">
                <ul>
                    <li>
                        <i class="fa-solid fa-folder text-primary" onclick="showSectionData('asset')"></i> الأصول
                        {!! $assetsTree !!}
                    </li>
                    <li>
                        <i class="fa-solid fa-folder text-danger" onclick="showSectionData('liability')"></i> الخصوم
                        {!! $liabilitiesTree !!}
                    </li>
                    <li>
                        <i class="fa-solid fa-folder text-warning" onclick="showSectionData('expense')"></i> المصروفات
                        {!! $expensesTree !!}
                    </li>
                    <li>
                        <i class="fa-solid fa-folder text-success" onclick="showSectionData('revenue')"></i> الإيرادات
                        {!! $revenuesTree !!}
                    </li>
                </ul>
            </div>

        </div>




        <!-- Content -->
        <div class="col-md-9 content p-4" id="section-content">
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



                <div class="container mt-5">
                    <div class="row justify-content-center">
                        <div class="col-md-6">
                            <form action="{{ route('accounts.store') }}" method="get"
                                  class="p-4 rounded shadow-lg"
                                  style="background: rgba(255, 255, 255, 0.5); border: 2px solid rgba(0, 123, 255, 0.7);">
                                @csrf

                                <h3 class="text-center mb-4 fw-bold"
                                    style="color: #007bff; border-bottom: 2px solid rgba(0, 123, 255, 0.7); padding-bottom: 10px;">
                                    إنشاء حساب جديد
                                </h3>

                                <div class="mb-3">
                                    <label for="type" class="form-label fw-bold">نوع الحساب</label>
                                    <select name="type" id="type" class="form-select" required
                                            style="background: rgba(255, 255, 255, 0.8); color: #333; border: 1px solid #ccc;">
                                        <option value="asset">الأصول</option>
                                        <option value="liability">الخصوم</option>
                                        <option value="expense">المصروفات</option>
                                        <option value="revenue">الإيرادات</option>
                                    </select>
                                </div>

                                <div class="mb-3">
                                    <label for="parent_account_id" class="form-label fw-bold">الحساب الأب</label>
                                    <select name="parent_account_id" id="parent_account_id" class="form-select"
                                            style="background: rgba(255, 255, 255, 0.8); color: #333; border: 1px solid #ccc;">
                                        <option value="">-- اختر الحساب الأب --</option>
                                        @foreach($accounts as $account)
                                            <option value="{{ $account->id }}">{{ $account->name }}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="mb-3">
                                    <label for="code" class="form-label fw-bold">كود الحساب</label>
                                    <input type="text" class="form-control" id="code" name="code" required
                                           style="background: rgba(255, 255, 255, 0.8); color: #333; border: 1px solid #ccc;">
                                </div>

                                <div class="mb-3">
                                    <label for="name" class="form-label fw-bold">اسم الحساب</label>
                                    <input type="text" class="form-control" id="name" name="name" required
                                           style="background: rgba(255, 255, 255, 0.8); color: #333; border: 1px solid #ccc;">
                                </div>

                                <div class="mb-3">
                                    <label for="normal_balance" class="form-label fw-bold">الطبيعة</label>
                                    <select name="normal_balance" id="normal_balance" class="form-select" required
                                            style="background: rgba(255, 255, 255, 0.8); color: #333; border: 1px solid #ccc;">
                                        <option value="debit">مدين</option>
                                        <option value="credit">دائن</option>
                                    </select>
                                </div>

                                <button type="submit" class="btn w-100 fw-bold"
                                        style="color: #fff; background: rgba(0, 123, 255, 0.9); border: none; padding: 10px;">
                                    حفظ
                                </button>
                            </form>

                        </div>
                    </div>
                </div>



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
<script>
    document.addEventListener('DOMContentLoaded', function () {
        // عند الضغط على عنصر في الشجرة
        document.querySelectorAll('.treeview li').forEach(function (item) {
            item.addEventListener('click', function () {
                const sectionId = this.getAttribute('data-section-id'); // الحصول على ID القسم
                if (sectionId) {
                    // إخفاء جميع الأقسام
                    document.querySelectorAll('.section').forEach(section => section.style.display = 'none');
                    // عرض القسم المطلوب
                    const section = document.getElementById(sectionId);
                    if (section) {
                        section.style.display = 'block';
                    }
                }
            });
        });
    });

    document.addEventListener('DOMContentLoaded', function () {
        // عند الضغط على عنصر في الشجرة
        document.querySelectorAll('.treeview li').forEach(function (item) {
            item.addEventListener('click', function () {
                const sectionId = this.getAttribute('data-section-id'); // الحصول على ID القسم
                if (sectionId) {
                    // إخفاء جميع الأقسام
                    document.querySelectorAll('.section').forEach(section => section.style.display = 'none');
                    // عرض القسم المطلوب
                    const section = document.getElementById(sectionId);
                    if (section) {
                        section.style.display = 'block';
                    }
                }
            });
        });
    });

    // دالة لعرض القسم المطلوب
    function showSection(sectionId) {
        // إخفاء جميع الأقسام
        document.querySelectorAll('.section').forEach(section => section.style.display = 'none');
        // عرض القسم المطلوب
        const section = document.getElementById(sectionId);
        if (section) {
            section.style.display = 'block';
        }
    }
    function showSectionData(sectionType) {
    // إجراء طلب إلى السيرفر لجلب البيانات
    fetch(`/section-data/${sectionType}`)
        .then(response => {
            if (!response.ok) {
                throw new Error(`HTTP error! status: ${response.status}`);
            }
            return response.json();
        })
        .then(section => {
            if (section) {
                // تحديث المحتوى بناءً على البيانات المستردة
                const contentDiv = document.getElementById("section-content");
                contentDiv.innerHTML = `
                    <h4 class="fw-bold mb-3">${section.title}</h4>
                    <ul class="list-group">
                        ${section.data
                            .map(
                                (item) =>
                                    `<li class="list-group-item d-flex justify-content-between align-items-center">
                                        ${item.name}
                                        <span class="badge bg-primary">${item.normal_balance}</span>
                                    </li>`
                            )
                            .join("")}
                    </ul>
                `;
            }
        })
        .catch(error => {
            console.error("Error fetching section data:", error);
        });
}

</script>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
