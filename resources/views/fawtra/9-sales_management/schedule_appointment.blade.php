
    <div class="d-flex justify-content-between align-items-center mb-3">
        <div class="d-inline-flex gap-2">
            <button class="btn btn-success gradient-btn d-flex align-items-center">
                <i class="fas fa-save me-1"></i> حفظ
            </button>
            <button class="btn btn-secondary d-flex align-items-center">
                <i class="fas fa-times me-1"></i> إلغاء
            </button>
        </div>

        <button class="btn btn-light"><i class="fas fa-times-circle me-1"></i> </button>
    </div>

    <div class="card p-4">
        <form>
            <div class="row mb-3">
                <div class="col-md-3">
                    <label for="client" class="form-label">العميل</label>
                    <select id="client" class="form-select">
                        <option>اختر عميل</option>
                        <option>عميل 1</option>
                        <option>عميل 2</option>
                    </select>
                </div>
                <div class="col-md-3">
                    <label for="date" class="form-label">Date</label>
                    <input type="date" id="deliveryStartDate" class="form-control">
                </div>
                <div class="col-md-3">
                    <label for="time" class="form-label">الوقت</label>
                    <input type="time" id="time" class="form-control">
                </div>
                <div class="col-md-3">
                    <label for="duration" class="form-label">مدة</label>
                    <input type="text" id="duration" class="form-control" placeholder="00:00">
                </div>
            </div>

            <div class="mb-3">
                <label for="actions" class="form-label">الإجراءات</label>
                <select id="actions" class="form-select">
                    <option>-</option>
                    <option>إجراء 1</option>
                    <option>إجراء 2</option>
                </select>
            </div>

            <div class="mb-3">
                <label for="notes" class="form-label">الملاحظات</label>
                <textarea id="notes" class="form-control" rows="4"></textarea>
            </div>

            <div class="form-check mb-2">
                <input type="checkbox" id="shareWithClient" class="form-check-input">
                <label for="shareWithClient" class="form-check-label">مشاركة مع العميل</label>
            </div>
            <div class="form-check mb-2">
                <input type="checkbox" id="recurring" class="form-check-input">
                <label for="recurring" class="form-check-label">متكرر</label>
            </div>
            <div class="form-check mb-2">
                <input type="checkbox" id="assignToEmployees" class="form-check-input">
                <label for="assignToEmployees" class="form-check-label">تعيين إلى موظفين</label>
            </div>
        </form>
    </div>

    <div class="fixed-bottom m-3">
        <button class="btn btn-info gradient-btn d-flex align-items-center">
            <i class="fas fa-question-circle me-2"></i> لديك سؤال؟
        </button>
    </div>
</div>
