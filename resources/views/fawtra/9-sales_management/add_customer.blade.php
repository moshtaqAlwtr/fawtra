<div class="container my-4">
    @if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif

@if($errors->any())
    <div class="alert alert-danger">
        @foreach($errors->all() as $error)
            <p>{{ $error }}</p>
        @endforeach
    </div>
@endif

<form action="{{ route('storeClient') }}" method="POST" enctype="multipart/form-data">
    @csrf <!-- إضافة CSRF Token لحماية الطلب -->
    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    @if($errors->any())
        <div class="alert alert-danger">
            @foreach($errors->all() as $error)
                <p>{{ $error }}</p>
            @endforeach
        </div>
    @endif

    <form action="{{ route('storeClient') }}" method="POST" enctype="multipart/form-data">
        @csrf <!-- إضافة CSRF Token لحماية الطلب -->

        <div class="header-buttons">
            <button class="btn btn-custom" type="submit"><i class="fas fa-save"></i> حفظ</button>
            <button class="btn btn-secondary" type="reset"><i class="fas fa-times-circle"></i> إلغاء</button>
        </div>

        <div class="row">
            <!-- بيانات العميل في الجهة اليمنى -->
            <div class="col-md-6 form-section">
                <h6>بيانات العميل</h6>

                <!-- السطر الأول: الاسم التجاري -->
                <div class="mb-3">
                    <label class="form-label">الاسم التجاري</label>
                    <input type="text" name="trade_name" class="form-control" required>
                </div>

                <!-- السطر الثاني: الاسم الأول والاسم الأخير -->
                <div class="row mb-3">
                    <div class="col">
                        <label class="form-label">الاسم الأول</label>
                        <input type="text" name="first_name" class="form-control">
                    </div>
                    <div class="col">
                        <label class="form-label">الاسم الأخير</label>
                        <input type="text" name="last_name" class="form-control">
                    </div>
                </div>

                <!-- السطر الثالث: الهاتف والجوال -->
                <div class="row mb-3">
                    <div class="col">
                        <label class="form-label">الهاتف</label>
                        <input type="text" name="phone" class="form-control">
                    </div>
                    <div class="col">
                        <label class="form-label">الجوال</label>
                        <input type="text" name="mobile" class="form-control">
                    </div>
                </div>

                <!-- السطر الرابع: عنوان الشارع 1 وعنوان الشارع 2 -->
                <div class="row mb-3">
                    <div class="col">
                        <label class="form-label">عنوان الشارع 1</label>
                        <input type="text" name="street_address_1" class="form-control">
                    </div>
                    <div class="col">
                        <label class="form-label">عنوان الشارع 2</label>
                        <input type="text" name="street_address_2" class="form-control">
                    </div>
                </div>

                <!-- السطر الخامس: المدينة والمنطقة والرمز البريدي -->
                <div class="row mb-3">
                    <div class="col">
                        <label class="form-label">المدينة</label>
                        <input type="text" name="city" class="form-control">
                    </div>
                    <div class="col">
                        <label class="form-label">المنطقة</label>
                        <input type="text" name="region" class="form-control">
                    </div>
                    <div class="col">
                        <label class="form-label">الرمز البريدي</label>
                        <input type="text" name="postal_code" class="form-control">
                    </div>
                </div>

                <!-- السطر السادس: البلد -->
                <div class="mb-3">
                    <label class="form-label">البلد</label>
                    <select name="country" class="form-select">
                        <option value="SA">المملكة العربية السعودية (SA)</option>
                        <!-- إضافة بلدان أخرى هنا -->
                    </select>
                </div>

                <!-- السطر السابع: الرقم الضريبي والسجل التجاري -->
                <div class="row mb-3">
                    <div class="col">
                        <label class="form-label">الرقم الضريبي</label>
                        <input type="text" name="tax_number" class="form-control">
                    </div>
                    <div class="col">
                        <label class="form-label">السجل التجاري</label>
                        <input type="text" name="commercial_registration" class="form-control">
                    </div>
                </div>

                <!-- السطر الثامن: الحد الائتماني والمدة الائتمانية -->
                <div class="row mb-3">
                    <div class="col">
                        <label class="form-label">الحد الائتماني</label>
                        <input type="text" name="credit_limit" class="form-control">
                    </div>
                    <div class="col">
                        <label class="form-label">المدة الائتمانية</label>
                        <div class="input-group">
                            <input type="text" name="credit_period" class="form-control">
                            <span class="input-group-text">أيام</span>
                        </div>
                    </div>
                </div>

            </div>

            <!-- بيانات الحساب في الجهة اليسرى -->
            <div class="col-md-6 form-section">
                <h6>بيانات الحساب</h6>

                <!-- الكود وطريقة الطباعة -->
                <div class="row mb-3">
                    <div class="col">
                        <label class="form-label">الكود</label>
                        <input type="text" name="account_code" class="form-control" value="1174">
                    </div>
                    <div class="col">
                        <label class="form-label">طريقة الطباعة</label>
                        <select name="printing_method" class="form-select">
                            <option value="card">بطاقة</option>
                            <option value="cash">نقدًا</option>
                        </select>
                    </div>
                </div>

                <!-- الرصيد الافتتاحي وتاريخ الرصيد الافتتاحي -->
                <div class="row mb-3">
                    <div class="col">
                        <label class="form-label">الرصيد الافتتاحي</label>
                        <input type="text" name="opening_balance" class="form-control" placeholder="SAR">
                    </div>
                    <div class="col">
                        <label class="form-label">تاريخ الرصيد الافتتاحي</label>
                        <input type="date" name="opening_balance_date" class="form-control" value="2024-10-28">
                    </div>
                </div>

                <!-- العملة -->
                <div class="mb-3">
                    <label class="form-label">العملة</label>
                    <select name="currency" class="form-select">
                        <option value="SAR">ريال سعودي</option>
                        <!-- إضافة عملات أخرى هنا -->
                    </select>
                </div>

                <!-- البريد الإلكتروني -->
                <div class="mb-3">
                    <label class="form-label">البريد الإلكتروني</label>
                    <input type="email" name="email" class="form-control">
                </div>

                <!-- التصنيف -->
                <div class="mb-3">
                    <label class="form-label">التصنيف</label>
                    <select name="client_type" class="form-select">
                        <option value="عميل نقدي">عميل نقدي</option>
                        <option value="عميل آجل">عميل آجل</option>
                    </select>
                </div>

                <!-- الملاحظات -->
                <div class="mb-3">
                    <label class="form-label">الملاحظات</label>
                    <textarea name="notes" class="form-control" rows="3"></textarea>
                </div>

                <!-- المرفقات -->
                <div class="mb-3">
                    <label class="form-label">المرفقات</label>
                    <div class="upload-area text-center p-4">
                        <i class="fas fa-cloud-upload-alt" style="font-size: 2rem; color: #007bff;"></i>
                        <p class="mt-2">أسقط الملف هنا أو اختر من جهازك</p>
                        <button type="button" class="btn btn-primary" onclick="document.getElementById('fileInput').click()">اختر ملف</button>
                        <input type="file" id="fileInput" name="attachments" class="d-none">
                    </div>
                </div>

                {{-- <!-- لغة العرض -->
                <div class="mb-3">
                    <label class="form-label">لغة العرض</label>
                    <select name="display_language" class="form-select">
                        <option value="العربية">العربية</option>
                        <option value="الإنجليزية">الإنجليزية</option>
                    </select>
                </div> --}}
            </div>
        </div>

        <!-- ملاحظة في الأسفل -->
        <div class="footer-info">
            <p>لديك سؤال؟ اتصل بنا للمساعدة!</p>
        </div>
    </form>
</div>



            <!-- السطر الأخير: لغة العرض -->
            {{-- <div class="mb-3">
                <label class="form-label">لغة العرض</label>
                <select class="form-select">
                    <option>اختر اللغة</option>
                    <!-- إضافة لغات أخرى هنا -->
                </select>
            </div> --}}
        </div>
    </div>

    <!-- ملاحظة في الأسفل -->
    {{-- <div class="footer-info">
        <p>لديك سؤال؟ اتصل بنا للمساعدة!</p>
    </div>
</form>
</div> --}}



{{--


<div class="container my-4">
    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    @if($errors->any())
        <div class="alert alert-danger">
            @foreach($errors->all() as $error)
                <p>{{ $error }}</p>
            @endforeach
        </div>
    @endif

    <form action="{{ route('storeClient') }}" method="POST" enctype="multipart/form-data">
        @csrf <!-- إضافة CSRF Token لحماية الطلب -->

        <!-- أزرار الحفظ والإلغاء -->
        <div class="header-buttons">
            <button type="submit" class="btn btn-custom"><i class="fas fa-save"></i> حفظ</button>
            <button type="reset" class="btn btn-secondary"><i class="fas fa-times-circle"></i> إلغاء</button>
        </div>

        <div class="row">
            <!-- بيانات العميل في الجهة اليمنى -->
            <div class="col-md-6 form-section">
                <h6>بيانات العميل</h6>

                <div class="mb-3">
                    <label class="form-label">الاسم التجاري</label>
                    <input type="text" name="trade_name" class="form-control" required>
                </div>

                <div class="row mb-3">
                    <div class="col">
                        <label class="form-label">الاسم الأول</label>
                        <input type="text" name="first_name" class="form-control">
                    </div>
                    <div class="col">
                        <label class="form-label">الاسم الأخير</label>
                        <input type="text" name="last_name" class="form-control">
                    </div>
                </div>

                <div class="row mb-3">
                    <div class="col">
                        <label class="form-label">الهاتف</label>
                        <input type="text" name="phone" class="form-control">
                    </div>
                    <div class="col">
                        <label class="form-label">الجوال</label>
                        <input type="text" name="mobile" class="form-control">
                    </div>
                </div>

                <div class="row mb-3">
                    <div class="col">
                        <label class="form-label">عنوان الشارع 1</label>
                        <input type="text" name="street_address_1" class="form-control">
                    </div>
                    <div class="col">
                        <label class="form-label">عنوان الشارع 2</label>
                        <input type="text" name="street_address_2" class="form-control">
                    </div>
                </div>

                <div class="row mb-3">
                    <div class="col">
                        <label class="form-label">المدينة</label>
                        <input type="text" name="city" class="form-control">
                    </div>
                    <div class="col">
                        <label class="form-label">المنطقة</label>
                        <input type="text" name="region" class="form-control">
                    </div>
                    <div class="col">
                        <label class="form-label">الرمز البريدي</label>
                        <input type="text" name="postal_code" class="form-control">
                    </div>
                </div>

                <div class="mb-3">
                    <label class="form-label">البلد</label>
                    <input type="text" name="country" class="form-control">
                </div>

                <div class="row mb-3">
                    <div class="col">
                        <label class="form-label">الرقم الضريبي</label>
                        <input type="text" name="tax_number" class="form-control">
                    </div>
                    <div class="col">
                        <label class="form-label">السجل التجاري</label>
                        <input type="text" name="commercial_registration" class="form-control">
                    </div>
                </div>

                <div class="row mb-3">
                    <div class="col">
                        <label class="form-label">الحد الائتماني</label>
                        <input type="number" name="credit_limit" class="form-control" step="0.01">
                    </div>
                    <div class="col">
                        <label class="form-label">المدة الائتمانية (أيام)</label>
                        <input type="number" name="credit_period" class="form-control">
                    </div>
                </div>
            </div>

            <!-- بيانات الحساب في الجهة اليسرى -->
            <div class="col-md-6 form-section">
                <h6>بيانات الحساب</h6>

                <div class="row mb-3">
                    <div class="col">
                        <label class="form-label">الكود</label>
                        <input type="text" name="account_code" class="form-control" required>
                    </div>
                    <div class="col">
                        <label class="form-label">طريقة الطباعة</label>
                        <select name="printing_method" class="form-select">
                            <option value="card">بطاقة</option>
                            <option value="cash">نقدًا</option>
                        </select>
                    </div>
                </div>

                <div class="row mb-3">
                    <div class="col">
                        <label class="form-label">الرصيد الافتتاحي</label>
                        <input type="number" name="opening_balance" class="form-control" step="0.01" placeholder="SAR">
                    </div>
                    <div class="col">
                        <label class="form-label">تاريخ الرصيد الافتتاحي</label>
                        <input type="date" name="opening_balance_date" class="form-control">
                    </div>
                </div>
                <div class="col">
                    <label class="form-label">العملة</label>
                    <select name="currency" class="form-select">
                        <option value="card">عميل آجل</option>
                        <option value="cash">عميل نقدي</option>
                    </select>
                </div>

                <div class="mb-3">
                    <label class="form-label">البريد الإلكتروني</label>
                    <input type="email" name="email" class="form-control">
                </div>



                <div class="mb-3">
                    <label class="form-label">الملاحظات</label>
                    <textarea name="notes" class="form-control" rows="3"></textarea>
                </div>

                <div class="mb-3">
                    <label class="form-label">المرفقات</label>
                    <input type="file" name="attachments" class="form-control">
                </div>

                {{-- <div class="mb-3">
                    <label class="form-label">لغة العرض</label>
                    <select name="display_language" class="form-select">
                        <option value="ar">العربية</option>
                        <option value="en">الإنجليزية</option>
                    </select>
                </div> --}}
            </div>
        </div>

        <div class="footer-info">
            <p>لديك سؤال؟ اتصل بنا للمساعدة!</p>
        </div>
    </form>
</div> --}}
