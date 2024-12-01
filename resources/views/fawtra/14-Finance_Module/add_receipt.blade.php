@if(session('error'))
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
        <strong><i class="fas fa-exclamation-triangle me-2"></i>خطأ!</strong>
        <div class="mt-2">{{ session('error') }}</div>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
@endif

@if(session('success'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong><i class="fas fa-check-circle me-2"></i>تم بنجاح!</strong>
        <div class="mt-2">{{ session('success') }}</div>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
@endif

    <div class="alert alert-danger alert-dismissible fade show" role="alert">
        <strong><i class="fas fa-exclamation-triangle me-2"></i>يرجى تصحيح الأخطاء التالية:</strong>
        <ul class="list-unstyled mt-2 mb-0">
            @foreach ($errors->all() as $error)
                <li><i class="fas fa-times-circle me-2"></i>{{ $error }}</li>
            @endforeach
        </ul>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>

<div class="container-fluid py-4">
    <div class="row">
        <div class="col-12">
            <div class="card border-0 shadow-sm">
                <div class="card-header bg-gradient-primary p-4">
                    <h3 class="text-white mb-0">
                        <i class="fas fa-receipt me-2"></i>
                        إنشاء سند قبض جديد
                    </h3>
                </div>
                <div class="card-body p-4">
                    <form method="POST" action="{{ route('receipts.store') }}" enctype="multipart/form-data" class="needs-validation" novalidate>
                        @csrf

                        <!-- القسم العلوي -->
                        <div class="row g-4">
                            <!-- المرفقات -->
                            <div class="col-md-3">
                                <div class="upload-box border rounded-3 p-4 text-center position-relative"
                                     style="min-height: 200px; background: #f8f9fa; border-style: dashed !important;">
                                    <i class="fas fa-cloud-upload-alt fa-3x text-primary mb-3"></i>
                                    <h5 class="mb-3">المرفقات</h5>
                                    <p class="text-muted mb-0">اسحب وأفلت الملفات هنا<br>أو</p>
                                    <label for="attachments" class="btn btn-outline-primary mt-3">
                                        <i class="fas fa-folder-open me-2"></i>اختر من جهازك
                                    </label>
                                    <input type="file" class="d-none" id="attachments" name="attachments[]" multiple>
                                    <div id="selected-files" class="mt-3 text-start"></div>
                                </div>
                            </div>

                            <!-- الوصف -->
                            <div class="col-md-9">
                                <div class="form-floating h-100">
                                    <textarea class="form-control h-100 @error('description') is-invalid @enderror"
                                              id="description"
                                              name="description"
                                              style="min-height: 200px; resize: none;"
                                              placeholder="أدخل وصف السند">{{ old('description') }}</textarea>
                                    <label for="description">
                                        <i class="fas fa-align-right me-2"></i>
                                        الوصف
                                    </label>
                                    @error('description')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <!-- المبلغ والعملة -->
                            <div class="col-md-6">
                                <div class="input-group">
                                    <span class="input-group-text bg-light">
                                        <i class="fas fa-money-bill-wave text-primary"></i>
                                    </span>
                                    <div class="form-floating flex-grow-1">
                                        <input type="number"
                                               step="0.01"
                                               class="form-control @error('amount') is-invalid @enderror"
                                               id="amount"
                                               name="amount"
                                               value="{{ old('amount', '0.00') }}"
                                               required>
                                        <label for="amount">المبلغ</label>
                                        @error('amount')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <select class="form-select w-auto @error('currency') is-invalid @enderror"
                                            id="currency"
                                            name="currency"
                                            required>
                                        <option value="SAR" {{ old('currency') == 'SAR' ? 'selected' : '' }}>ر.س</option>
                                        <option value="USD" {{ old('currency') == 'USD' ? 'selected' : '' }}>$</option>
                                        <option value="EUR" {{ old('currency') == 'EUR' ? 'selected' : '' }}>€</option>
                                    </select>
                                    @error('currency')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <!-- رقم الكود -->
                            <div class="col-md-6">
                                <div class="input-group">
                                    <span class="input-group-text bg-light">
                                        <i class="fas fa-hashtag text-primary"></i>
                                    </span>
                                    <div class="form-floating">
                                        <input type="text"
                                               class="form-control @error('code') is-invalid @enderror"
                                               id="code"
                                               name="code"
                                               value="{{ old('code', '2572') }}"
                                               required>
                                        <label for="code">رقم الكود</label>
                                        @error('code')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                            <!-- التاريخ -->
                            <div class="col-md-4">
                                <div class="input-group">
                                    <span class="input-group-text bg-light">
                                        <i class="fas fa-calendar text-primary"></i>
                                    </span>
                                    <div class="form-floating">
                                        <input type="date"
                                               class="form-control @error('date') is-invalid @enderror"
                                               id="date"
                                               name="date"
                                               value="{{ old('date', date('Y-m-d')) }}"
                                               required>
                                        <label for="date">التاريخ</label>
                                        @error('date')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                            <!-- الخزينة -->
                            <div class="col-md-4">
                                <div class="input-group">
                                    <span class="input-group-text bg-light">
                                        <i class="fas fa-cash-register text-primary"></i>
                                    </span>
                                    <div class="form-floating">
                                        <select class="form-select @error('treasury_id') is-invalid @enderror" id="treasury_id" name="treasury_id" required>
                                            <option value="">اختر الخزينة</option>
                                            @foreach($treasuries as $treasury)
                                                <option value="{{ $treasury->id }}"
                                                        {{ old('treasury_id') == $treasury->id ? 'selected' : '' }}>
                                                    {{ $treasury->name }}
                                                </option>
                                            @endforeach
                                        </select>
                                        <label for="treasury_id">الخزينة</label>
                                        @error('treasury_id')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                            <!-- الحساب -->
                            <div class="col-md-4">
                                <div class="input-group">
                                    <span class="input-group-text bg-light">
                                        <i class="fas fa-file-invoice-dollar text-primary"></i>
                                    </span>
                                    <div class="form-floating">
                                        <select class="form-select @error('account_id') is-invalid @enderror" id="account_id" name="account_id" required>
                                            <option value="">اختر الحساب</option>
                                            @foreach($accounts as $account)
                                                <option value="{{ $account->id }}"
                                                        {{ old('account_id') == $account->id ? 'selected' : '' }}>
                                                    {{ $account->name }}
                                                </option>
                                            @endforeach
                                        </select>
                                        <label for="account_id">الحساب</label>
                                        @error('account_id')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                            <!-- العميل -->
                            <div class="col-md-4">
                                <div class="input-group">
                                    <span class="input-group-text bg-light">
                                        <i class="fas fa-user text-primary"></i>
                                    </span>
                                    <div class="form-floating">
                                        <select class="form-select @error('client_id') is-invalid @enderror" id="client_id" name="client_id">
                                            <option value="">اختر العميل</option>
                                            @foreach($clients as $client)
                                                <option value="{{ $client->id }}"
                                                        {{ old('client_id') == $client->id ? 'selected' : '' }}>
                                                    {{ $client->first_name }}
                                                </option>
                                            @endforeach
                                        </select>
                                        <label for="client_id">البائع </label>
                                        @error('client_id')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="form-floating">
                                        <select class="form-select @error('employee_id') is-invalid @enderror" id="employee_id" name="employee_id">
                                            <option value="">اختر البائع </option>
                                            @foreach($employees as $employee)
                                                <option value="{{ $employee->employee_id }}"
                                                        {{ old('employee_id') == $employee->employee_id ? 'selected' : '' }}>
                                                    {{ $employee->first_name }}
                                                </option>
                                            @endforeach
                                        </select>
                                        <label for="employee_id">العميل</label>
                                        @error('employee_id')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- أزرار التحكم -->
                        <div class="d-flex justify-content-between mt-5">
                            <button type="button" class="btn btn-outline-secondary" onclick="window.history.back()">
                                <i class="fas fa-arrow-right me-2"></i>
                                رجوع
                            </button>
                            <button type="submit" class="btn btn-primary">
                                <i class="fas fa-save me-2"></i>
                                حفظ السند
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@push('scripts')
<script>
$(document).ready(function() {
    // تحديث عرض الملفات المختارة
    $('#attachments').change(function() {
        const fileList = $('#selected-files');
        fileList.empty();

        Array.from(this.files).forEach(file => {
            const fileSize = (file.size / 1024).toFixed(2) + ' KB';
            const fileItem = `
                <div class="alert alert-light border d-flex align-items-center mb-2">
                    <i class="fas fa-file me-2 text-primary"></i>
                    <span class="flex-grow-1">${file.name}</span>
                    <small class="text-muted">${fileSize}</small>
                </div>
            `;
            fileList.append(fileItem);
        });
    });

    // تفعيل السحب والإفلات
    const dropZone = $('.upload-box');

    dropZone.on('dragover', function(e) {
        e.preventDefault();
        $(this).addClass('border-primary');
    });

    dropZone.on('dragleave', function(e) {
        e.preventDefault();
        $(this).removeClass('border-primary');
    });

    dropZone.on('drop', function(e) {
        e.preventDefault();
        $(this).removeClass('border-primary');
        const files = e.originalEvent.dataTransfer.files;
        $('#attachments')[0].files = files;
        $('#attachments').trigger('change');
    });

    // تفعيل Select2 للقوائم المنسدلة
    $('#treasury_id, #account_id, #client_id').select2({
        theme: 'bootstrap-5',
        width: '100%',
        dir: 'rtl'
    });
});
</script>
@endpush

@push('styles')
<style>
.upload-box {
    transition: all 0.3s ease;
}
.upload-box:hover {
    border-color: var(--bs-primary) !important;
}
.form-floating > .form-control:focus ~ label,
.form-floating > .form-control:not(:placeholder-shown) ~ label {
    color: var(--bs-primary);
}
.select2-container--bootstrap-5 .select2-selection {
    min-height: 58px;
    padding-top: 16px;
}
.input-group > .select2-container--bootstrap-5 {
    flex: 1 1 auto;
    width: 1% !important;
}
</style>
@endpush
