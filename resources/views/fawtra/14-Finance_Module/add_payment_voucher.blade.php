
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <!-- الهيدر -->
    <div class="bg-primary text-white text-center py-3">
        <h1>إضافة سند صرف</h1>
    </div>

    <!-- النموذج -->

        <div class="card-body">
            <form method="POST" action="{{ route('payment_vouchers.store') }}" enctype="multipart/form-data">
                @csrf
                <!-- الصف الأول -->
                <div class="row">
                    <div class="form-group col-md-4">
                        <label for="amount" class="font-weight-bold">المبلغ</label>
                        <input type="text" class="form-control" id="amount" name="amount" placeholder="ر.س 0.00" value="{{ old('amount') }}">
                    </div>
                    <div class="form-group col-md-4">
                        <label for="description" class="font-weight-bold">الوصف</label>
                        <textarea class="form-control" id="description" name="description" rows="1" placeholder="اكتب الوصف هنا">{{ old('description') }}</textarea>
                    </div>
                    <div class="form-group col-md-4">
                        <label for="attachment" class="font-weight-bold text-primary">المرفقات</label>
                        <div class="custom-file">
                            <input type="file" class="custom-file-input" id="attachment" name="attachment">
                            <label class="custom-file-label" for="attachment">اختر ملفًا...</label>
                        </div>
                    </div>
                </div>

                <!-- الصف الثاني -->
                <div class="row">
                    <div class="form-group col-md-4">
                        <label for="voucher_number" class="font-weight-bold">رقم السند</label>
                        <input type="text" class="form-control" id="voucher_number" name="voucher_number" value="{{ old('voucher_number') }}" required>
                    </div>
                    <div class="form-group col-md-4">
                        <label for="date" class="font-weight-bold">التاريخ</label>
                        <input type="date" class="form-control" id="date" name="date" value="{{ old('date', date('Y-m-d')) }}">
                    </div>
                    <div class="form-group col-md-4">
                        <label for="payment_method" class="font-weight-bold">طريقة الدفع</label>
                        <select id="payment_method" class="form-control" name="payment_method">
                            <option value="">اختر طريقة الدفع</option>
                            <option value="cash">نقداً</option>
                            <option value="bank_transfer">تحويل بنكي</option>
                            <option value="check">شيك</option>
                        </select>
                    </div>
                </div>

                <!-- الصف الثالث -->
                <div class="row">
                    <div class="form-group col-md-4">
                        <label for="beneficiary" class="font-weight-bold">المستفيد</label>
                        <select id="beneficiary" class="form-control" name="beneficiary">
                            <option value="">اختر المستفيد</option>
                            @foreach($employees as $employee)
                                <option value="{{ $employee->employee_id }}" {{ old('beneficiary') == $employee->employee_id ? 'selected' : '' }}>
                                    {{ $employee->first_name }} {{ $employee->last_name }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group col-md-4">
                        <label for="treasury" class="font-weight-bold">الخزينة</label>
                        <select id="treasury" class="form-control" name="treasury">
                            <option value="">اختر الخزينة</option>
                            @foreach($treasuries as $treasury)
                                <option value="{{ $treasury->id }}" {{ old('treasury') == $treasury->id ? 'selected' : '' }}>
                                    {{ $treasury->name }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group col-md-4">
                        <label for="account" class="font-weight-bold">الحساب</label>
                        <select id="account" class="form-control" name="account">
                            <option value="">اختر الحساب</option>
                            @foreach($accounts as $account)
                                <option value="{{ $account->id }}" {{ old('account') == $account->id ? 'selected' : '' }}>
                                    {{ $account->name }} ({{ $account->code }})
                                </option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <!-- الصف الرابع -->
                <div class="row">
                    <div class="form-group col-md-4">
                        <label for="notes" class="font-weight-bold">ملاحظات</label>
                        <textarea class="form-control" id="notes" name="notes" rows="1" placeholder="ملاحظات إضافية (اختياري)">{{ old('notes') }}</textarea>
                    </div>
                    <div class="form-group col-md-4">
                        <label for="reference" class="font-weight-bold">رقم المرجع</label>
                        <input type="text" class="form-control" id="reference" name="reference" value="{{ old('reference') }}" placeholder="رقم المرجع (اختياري)">
                    </div>
                </div>

                <!-- أزرار الحفظ والإلغاء -->
                <div class="text-right mt-4">
                    <button type="submit" class="btn btn-success">حفظ</button>
                    <a href="{{ route('payment_vouchers.index') }}" class="btn btn-danger">إلغاء</a>
                </div>
            </form>
        </div>
    </div>


@push('scripts')
<script>
    $(document).ready(function() {
        // تحديث اسم الملف المختار
        $('.custom-file-input').on('change', function() {
            let fileName = $(this).val().split('\\').pop();
            $(this).next('.custom-file-label').addClass("selected").html(fileName);
        });
    });
</script>
@endpush
