
    <title>إضافة سند قيض</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">


    <!-- الهيدر -->
    <div class="bg-primary text-white text-center py-3">
        <h1>إضافة سند قبض</h1>
    </div>

    <!-- النموذج -->

        <div class="card shadow-sm">
            <div class="card-body">
                <form method="POST" action="{{ route('receipts.store') }}" enctype="multipart/form-data">
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
                            <label for="code-number" class="font-weight-bold">رقم الكود</label>
                            <input type="text" class="form-control" id="code-number" name="code" value="{{ old('code') }}" required>
                        </div>
                        <div class="form-group col-md-4">
                            <label for="date" class="font-weight-bold">التاريخ</label>
                            <input type="date" class="form-control" id="date" name="date" value="{{ old('date') }}">
                        </div>
                        <div class="form-group col-md-4">
                            <label for="unit" class="font-weight-bold">الوحدة</label>
                            <select id="unit" class="form-control" name="unit">
                                <option selected>حدد الوحدة</option>
                                <option>وحدة 1</option>
                                <option>وحدة 2</option>
                            </select>
                        </div>
                    </div>

                    <!-- الصف الثالث -->
                    <div class="row">
                        <div class="form-group col-md-4">
                            <label for="category" class="font-weight-bold">التصنيف</label>
                            <select id="category" class="form-control" name="category">
                                <option selected>إضافة تصنيف</option>
                                <option>تصنيف 1</option>
                                <option>تصنيف 2</option>
                            </select>
                        </div>
                        <div class="form-group col-md-4">
                            <label for="seller" class="font-weight-bold">البائع</label>
                            <select id="seller" class="form-control" name="seller">
                                <option selected>اختر بائع</option>
                                @foreach($employees as $employee)
                                    <option value="{{ $employee->employee_id }}">{{ $employee->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group col-md-4">
                            <label for="warehouse" class="font-weight-bold">الخزينة</label>
                            <select id="warehouse" class="form-control" name="warehouse">
                                <option selected>رئيسي</option>
                                <option>فرعي</option>
                            </select>
                        </div>
                    </div>

                    <!-- الصف الرابع (اختياري) -->
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
                        <button type="button" class="btn btn-danger">إلغاء</button>
                    </div>
                </form>

            </div>
        </div>
    </div>

    <!-- مكتبات JavaScript -->
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

    <script>
        function toggleTaxFields() {
            $("#tax-fields").toggleClass("d-none");
        }

        function removeTaxFields() {
            $("#tax-fields").addClass("d-none");
        }
    </script>

