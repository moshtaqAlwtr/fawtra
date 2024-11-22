<div class="d-flex justify-content-between align-items-center mb-3">
    <div class="d-inline-flex gap-2">
        <button type="submit" form="appointmentForm" class="btn btn-success gradient-btn d-flex align-items-center">
            <i class="fas fa-save me-1"></i> حفظ
        </button>
        <button type="button" class="btn btn-secondary d-flex align-items-center">
            <i class="fas fa-times me-1"></i> إلغاء
        </button>
    </div>

    <button class="btn btn-light"><i class="fas fa-times-circle me-1"></i> </button>
</div>

<div class="card p-4">
    <!-- عرض رسائل الخطأ -->
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <!-- نموذج الحفظ -->
    <form id="appointmentForm" action="{{ route('appointments.store') }}" method="POST">
        @csrf <!-- حماية من CSRF -->
        <div class="row mb-3">
            <div class="col-md-3">
                <label for="client" class="form-label">العميل</label>
                <select id="client" name="client" class="form-select" required>
                    <option value="">اختر عميل</option>
                    <option value="1">عميل 1</option>
                    <option value="2">عميل 2</option>
                </select>
            </div>
            <div class="col-md-3">
                <label for="date" class="form-label">Date</label>
                <input type="date" id="deliveryStartDate" name="date" class="form-control" required>
            </div>
            <div class="col-md-3">
                <label for="time" class="form-label">الوقت</label>
                <input type="time" id="time" name="time" class="form-control" required>
            </div>
            <div class="col-md-3">
                <label for="duration" class="form-label">مدة</label>
                <input type="text" id="duration" name="duration" class="form-control" placeholder="00:00" required>
            </div>
        </div>

        <div class="mb-3">
            <label for="actions" class="form-label">الإجراءات</label>
            <select id="actions" name="actions" class="form-select" required>
                <option value="">-</option>
                <option value="action1">إجراء 1</option>
                <option value="action2">إجراء 2</option>
            </select>
        </div>

        <div class="mb-3">
            <label for="notes" class="form-label">الملاحظات</label>
            <textarea id="notes" name="notes" class="form-control" rows="4"></textarea>
        </div>

        <div class="form-check mb-2">
            <input type="checkbox" id="shareWithClient" name="shareWithClient" class="form-check-input">
            <label for="shareWithClient" class="form-check-label">مشاركة مع العميل</label>
        </div>
        <div class="form-check mb-2">
            <input type="checkbox" id="recurring" name="recurring" class="form-check-input">
            <label for="recurring" class="form-check-label">متكرر</label>
        </div>
        <div class="form-check mb-2">
            <input type="checkbox" id="assignToEmployees" name="assignToEmployees" class="form-check-input">
            <label for="assignToEmployees" class="form-check-label">تعيين إلى موظفين</label>
        </div>
    </form>
</div>

<div class="fixed-bottom m-3">
    <button class="btn btn-info gradient-btn d-flex align-items-center">
        <i class="fas fa-question-circle me-2"></i> لديك سؤال؟
    </button>
</div>
