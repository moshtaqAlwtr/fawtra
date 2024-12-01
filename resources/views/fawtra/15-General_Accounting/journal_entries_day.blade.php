<div class="d-flex justify-content-between mb-3">
    <a href="{{route('add_entry')}}" class="btn btn-success px-4 py-2">
        إضافة قيد
    </a>
    <a href="modifications_log.html" class="btn btn-outline-primary">
        سجل التعديلات
    </a>
</div>

<!-- قسم البحث -->
<div class="card p-3 mb-4">
    <form method="GET" action="{{ route('journal_entries.search') }}">
        <div class="row mb-3">
            <div class="col-md-3 row-md-3">
                <label for="account" class="form-label">الحساب</label>
                <select name="account" id="account" class="form-select">
                    <option>أي حساب</option>
                    @if(isset($accounts) && $accounts->count())
                        @foreach($accounts as $account)
                            <option value="{{ $account->id }}">{{ $account->name }}</option>
                        @endforeach
                    @else
                        <option disabled>لا توجد حسابات</option>
                    @endif
                </select>
            </div>

            <div class="col-md-3">
                <label for="description" class="form-label">الوصف</label>
                <input type="text" name="description" id="description" class="form-control" placeholder="أدخل وصف">
            </div>
            <div class="col-md-3">
                <label for="fromDate" class="form-label">من</label>
                <input type="date" name="fromDate" id="fromDate" class="form-control">
            </div>
            <div class="col-md-3">
                <label for="toDate" class="form-label">إلى</label>
                <input type="date" name="toDate" id="toDate" class="form-control">
            </div>
        </div>

        <!-- قسم البحث المتقدم -->
        <div id="advancedSearch" style="display: none;">
            <div class="row mb-3">
                <div class="col-md-3">
                    <label for="source" class="form-label">المصدر</label>
                    <select name="source" id="source" class="form-select">
                        <option>أي</option>
                        <option value="مصدر 1">مصدر 1</option>
                        <option value="مصدر 2">مصدر 2</option>
                    </select>
                </div>
                <div class="col-md-3">
                    <label for="entryNumber" class="form-label">رقم القيد</label>
                    <input type="text" name="entryNumber" id="entryNumber" class="form-control" placeholder="أدخل الرقم">
                </div>
                <div class="col-md-3">
                    <label for="entryStatus" class="form-label">حالة القيد</label>
                    <select name="entryStatus" id="entryStatus" class="form-select">
                        <option>الكل</option>
                        <option value="حالة 1">حالة 1</option>
                        <option value="حالة 2">حالة 2</option>
                    </select>
                </div>
            </div>
            <div class="row mb-3">
                <div class="col-md-3">
                    <label for="minAmount" class="form-label">المبلغ أكبر من</label>
                    <input type="number" name="minAmount" id="minAmount" class="form-control" placeholder="أدخل المبلغ">
                </div>
                <div class="col-md-3">
                    <label for="maxAmount" class="form-label">المبلغ أقل من</label>
                    <input type="number" name="maxAmount" id="maxAmount" class="form-control" placeholder="أدخل المبلغ">
                </div>
            </div>
        </div>


    </form>
    <div class="d-flex justify-content-between align-items-center mb-3">

        <button type="button" class="btn btn-primary me-2" onclick="toggleAdvancedSearch()">بحث متقدم</button>
        <button type="submit" class="btn btn-success me-2">بحث</button>
        <button type="reset" class="btn btn-outline-danger">إلغاء</button>
    </div>

</div>
<!-- تصميم النتائج -->
<div class="card p-3">
    <h5 class="card-title">نتائج القيود اليومية</h5>
    @foreach($journalEntries as $entry)
    <div class="d-flex justify-content-between align-items-center border-bottom pb-2 mb-2">
        <div>
            <h6>فاتورة #{{ $entry->invoice->id ?? 'غير متوفرة' }}</h6>
            <small class="text-muted">تاريخ: {{ $entry->date }}</small>
            <p class="mb-0">العميل: {{ $entry->client->trade_name ?? 'غير متوفر' }}</p>
            <p class="mb-0">الموظف: {{ $entry->employee->first_name ?? 'غير متوفر' }} {{ $entry->employee->last_name ?? '' }}</p>
        </div>
        <div>
            <span class="badge bg-secondary">الفرع: {{ $entry->branch ?? 'غير متوفر' }}</span>
        </div>
        <div class="dropdown">
            <button class="btn btn-light" type="button" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-expanded="false">
                <i class="fas fa-ellipsis-v"></i>
            </button>
            <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                <li><a class="dropdown-item" href="#"><i class="fas fa-eye text-primary"></i> عرض</a></li>
                <li><a class="dropdown-item" href="#"><i class="fas fa-edit text-warning"></i> تعديل</a></li>
                <li><a class="dropdown-item" href="#"><i class="fas fa-trash text-danger"></i> حذف</a></li>
            </ul>
        </div>
    </div>
@endforeach
</div>

<script>

function toggleAdvancedSearch() {
    const advancedSearch = document.getElementById('advancedSearch');
    advancedSearch.style.display = advancedSearch.style.display === 'none' || advancedSearch.style.display === '' ? 'block' : 'none';
}


    // إعداد Flatpickr للتواريخ مع زري "اليوم" و"مسح"
    flatpickr("#fromDate, #toDate, #creationFromDate, #creationToDate", {
        locale: "ar",
        dateFormat: "Y-m-d",
        onReady: (selectedDates, dateStr, instance) => {
            const footerButtons = document.createElement("div");
            footerButtons.className = "d-flex justify-content-center mt-2";
            footerButtons.innerHTML = `
                <button type="button" class="flatpickr-today" onclick="instance.setDate(new Date()); instance.close()">اليوم</button>
                <button type="button" class="flatpickr-clear" onclick="instance.clear(); instance.close()">مسح</button>
            `;
            instance.calendarContainer.appendChild(footerButtons);
        }
    });
    </script>

  <!-- يمكنك تكرار هذا التصميم لبقية النتائج -->
</div>

