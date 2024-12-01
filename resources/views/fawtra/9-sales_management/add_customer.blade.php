<!DOCTYPE html>
<html lang="ar">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.1.3/css/bootstrap.min.css" rel="stylesheet">
    <title>{{ trans('addclient.billing_program') }}</title>
</head>
<body>
    <div class="container my-4">
        <!-- عرض رسالة نجاح إن وجدت -->
        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <!-- عرض الأخطاء إن وجدت -->
        @if($errors->any())
            <div class="alert alert-danger">
                @foreach($errors->all() as $error)
                    <p>{{ $error }}</p>
                @endforeach
            </div>
        @endif

        <form id="clientForm" action="{{ route('clients.store') }}" method="POST" enctype="multipart/form-data">
            @csrf <!-- إضافة CSRF Token لحماية الطلب -->

            <div class="header-buttons mb-3">
                <button class="btn btn-primary" type="submit"><i class="fas fa-save"></i> {{ trans('addclient.save') }}</button>
                <button class="btn btn-secondary" type="reset"><i class="fas fa-times-circle"></i> {{ trans('addclient.cancel') }}</button>
            </div>

            <div class="row">
                <!-- بيانات العميل في الجهة اليمنى -->
                <div class="col-md-6 form-section">
                    <h6>{{ trans('addclient.client_information') }}</h6>

                    <!-- الاسم التجاري -->
                    <div class="mb-3">
                        <label class="form-label">{{ trans('addclient.trade_name') }} <span class="text-danger">*</span></label>
                        <input type="text" name="trade_name" class="form-control" required>
                    </div>

                    <!-- الاسم الأول والاسم الأخير -->
                    <div class="row mb-3">
                        <div class="col">
                            <label class="form-label">{{ trans('addclient.first_name') }} <span class="text-danger">*</span></label>
                            <input type="text" name="first_name" class="form-control" required>
                        </div>
                        <div class="col">
                            <label class="form-label">{{ trans('addclient.last_name') }} <span class="text-danger">*</span></label>
                            <input type="text" name="last_name" class="form-control" required>
                        </div>
                    </div>

                    <!-- الهاتف والجوال -->
                    <div class="row mb-3">
                        <div class="col">
                            <label class="form-label">{{ trans('addclient.phone') }}</label>
                            <input type="text" name="phone" class="form-control">
                        </div>
                        <div class="col">
                            <label class="form-label">{{ trans('addclient.mobile') }} <span class="text-danger">*</span></label>
                            <input type="text" name="mobile" class="form-control" required>
                        </div>
                    </div>

                    <!-- عنوان الشارع 1 وعنوان الشارع 2 -->
                    <div class="row mb-3">
                        <div class="col">
                            <label class="form-label">{{ trans('addclient.street_address_1') }}</label>
                            <input type="text" name="street_address_1" class="form-control">
                        </div>
                        <div class="col">
                            <label class="form-label">{{ trans('addclient.street_address_2') }}</label>
                            <input type="text" name="street_address_2" class="form-control">
                        </div>
                    </div>

                    <!-- المدينة والمنطقة والرمز البريدي -->
                    <div class="row mb-3">
                        <div class="col">
                            <label class="form-label">{{ trans('addclient.city') }}</label>
                            <input type="text" name="city" class="form-control">
                        </div>
                        <div class="col">
                            <label class="form-label">{{ trans('addclient.region') }}</label>
                            <input type="text" name="region" class="form-control">
                        </div>
                        <div class="col">
                            <label class="form-label">{{ trans('addclient.postal_code') }}</label>
                            <input type="text" name="postal_code" class="form-control">
                        </div>
                    </div>

                    <!-- البلد -->
                    <div class="mb-3">
                        <label class="form-label">{{ trans('addclient.country') }}</label>
                        <select name="country" class="form-select">
                            <option value="SA">{{ trans('addclient.saudi_riyal') }}</option>
                            <!-- إضافة بلدان أخرى هنا -->
                        </select>
                    </div>

                    <!-- الرقم الضريبي والسجل التجاري -->
                    <div class="row mb-3">
                        <div class="col">
                            <label class="form-label">{{ trans('addclient.tax_number') }}</label>
                            <input type="text" name="tax_number" class="form-control">
                        </div>
                        <div class="col">
                            <label class="form-label">{{ trans('addclient.commercial_registration') }}</label>
                            <input type="text" name="commercial_registration" class="form-control">
                        </div>
                    </div>
                </div>

                <!-- بيانات الحساب في الجهة اليسرى -->
                <div class="col-md-6 form-section">
                    <h6>{{ trans('addclient.account_information') }}</h6>

                    <!-- الكود وطريقة الطباعة -->
                    <div class="row mb-3">
                        <div class="col">
                            <label class="form-label">{{ trans('addclient.account_code') }} <span class="text-danger">*</span></label>
                            <input type="number" name="account_code" class="form-control" value="0" required>
                        </div>
                        <div class="col">
                            <label class="form-label">{{ trans('addclient.printing_method') }}</label>
                            <select name="printing_method" class="form-select">
                                <option value="" selected>{{ trans('addclient.choose_printing_method') }}</option>
                                <option value="email">{{ trans('addclient.send_via_email') }}</option>
                                <option value="print">{{ trans('addclient.print') }}</option>
                            </select>
                        </div>
                    </div>
                    @if ($errors->has('printing_method'))
                    <div class="text-danger">
                        {{ $errors->first('printing_method') }}
                    </div>
                @endif

                    <!-- الرصيد الافتتاحي وتاريخ الرصيد الافتتاحي -->
                    <div class="row mb-3">
                        <div class="col">
                            <label class="form-label">{{ trans('addclient.opening_balance') }}</label>
                            <input type="text" name="opening_balance" class="form-control" placeholder="SAR">
                        </div>
                        <div class="col">
                            <label class="form-label">{{ trans('addclient.opening_balance_date') }}</label>
                            <input type="date" name="opening_balance_date" class="form-control" value="2024-10-28">
                        </div>
                    </div>

                    <!-- العملة -->
                    <div class="mb-3">
                        <label class="form-label">{{ trans('addclient.currency') }}</label>
                        <select name="currency" class="form-select">
                            <option value="SAR">{{ trans('addclient.saudi_riyal') }}</option>
                            <!-- إضافة عملات أخرى هنا -->
                        </select>
                    </div>

                    <!-- البريد الإلكتروني -->
                    <div class="mb-3">
                        <label class="form-label">{{ trans('addclient.email') }}</label>
                        <input type="email" name="email" class="form-control">
                    </div>

                    <!-- التصنيف -->
                    <div class="mb-3">
                        <label class="form-label">{{ trans('addclient.client_type') }}</label>
                        <select name="client_type" class="form-select">
                            <option value="عميل نقدي">{{ trans('addclient.cash_client') }}</option>
                            <option value="عميل آجل">{{ trans('addclient.credit_client') }}</option>
                        </select>
                    </div>

                    <!-- الملاحظات -->
                    <div class="mb-3">
                        <label class="form-label">{{ trans('addclient.notes') }}</label>
                        <textarea name="notes" class="form-control" rows="3"></textarea>
                    </div>

                    <!-- المرفقات -->
                    <div class="mb-3">
                        <label class="form-label">{{ trans('addclient.attachments') }}</label>
                        <div class="upload-area text-center p-4">
                            <i class="fas fa-cloud-upload-alt" style="font-size: 2rem; color: #007bff;"></i>
                            <p class="mt-2">{{ trans('addclient.drop_file_here') }}</p>
                            <button type="button" class="btn btn-primary" onclick="document.getElementById('fileInput').click()">{{ trans('addclient.choose_file') }}</button>
                            <input type="file" id="fileInput" name="attachments" class="d-none">
                        </div>
                    </div>
                </div>
            </div>
            <div id="map" style="height: 400px; width: 100%;"></div>

            <!-- ملاحظة في الأسفل -->
            <div class="footer-info mt-3">
                <p>{{ trans('addclient.footer_note') }}</p>
            </div>
        </form>
    </div>

<script>
    function initMap() {
        // تحديد إحداثيات الموقع (يمكنك تغييره إلى إحداثياتك)
        const location = { lat: 24.7136, lng: 46.6753 }; // مثال: الرياض، السعودية
        // إنشاء الخريطة
        const map = new google.maps.Map(document.getElementById("map"), {
            zoom: 10,
            center: location,
        });
        // وضع علامة (مؤشر) على الموقع
        const marker = new google.maps.Marker({
            position: location,
            map: map,
        });
    }
</script>
<!-- تضمين مكتبة خرائط جوجل API -->
<script async defer
    src="https://maps.googleapis.com/maps/api/js?key=YOUR_API_KEY&callback=initMap">
</script>
    <style>
        .is-invalid {
            border: 1px solid red !important; /* إطار أحمر */
        }
    </style>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const form = document.getElementById('clientForm');
            form.addEventListener('submit', function (event) {
                let isValid = true;
                const requiredFields = form.querySelectorAll('[name="trade_name"], [name="first_name"], [name="last_name"], [name="mobile"], [name="account_code"]');

                requiredFields.forEach(function (input) {
                    input.classList.remove('is-invalid');
                    if (!input.value.trim()) {
                        input.classList.add('is-invalid');
                        isValid = false;
                    }
                });

                if (!isValid) {
                    event.preventDefault();
                    alert('{{ trans('addclient.fill_required_fields') }}');
                }
            });
        });
    </script>
</body>
</html>
