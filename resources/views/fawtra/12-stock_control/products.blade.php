
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>منتج جديد</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            font-family: 'Tahoma', sans-serif;
            margin: 0;
            padding: 0;
            background: linear-gradient(to right, #f0f4f7, #c9d6df);
            direction: rtl;
            text-align: right;
        }


    </style>
</head>

<body>

    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

    <form method="POST" action="{{ route('products.store') }}" enctype="multipart/form-data">
        @csrf
        <div class="controls">
            <button class="btn btn-danger">إلغاء</button>
            <button class="btn btn-success">حفظ</button>
        </div>

        <div class="container form-container">

            <!-- تفاصيل البند -->
            <div class="form-section">
                <h3>تفاصيل البند</h3>

                <div class="row">
                    <div class="col-md-6 form-group">
                        <label for="product_name">اسم المنتج <span class="text-danger">*</span></label>
                        <input type="text" id="product_name" name="product_name" class="form-control" placeholder="أدخل اسم المنتج" required>
                    </div>
                    <div class="col-md-6 form-group">
                        <label for="serial_number">الرقم التسلسلي SKU</label>
                        <input type="text" id="serial_number" name="serial_number" class="form-control" placeholder="أدخل الرقم التسلسلي">
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-12 form-group">
                        <label for="description">الوصف</label>
                        <textarea id="description" name="description" class="form-control" rows="3" placeholder="اكتب الوصف هنا..."></textarea>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6 form-group">
                        <label for="category">التصنيف</label>
                        <select id="category" name="category" class="form-control">
                            <option value="category1">تصنيف 1</option>
                            <option value="category2">تصنيف 2</option>
                        </select>
                    </div>
                    <div class="col-md-6 form-group">
                        <label for="brand">الماركة</label>
                        <select id="brand" name="brand" class="form-control">
                            <option value="brand1">ماركة 1</option>
                            <option value="brand2">ماركة 2</option>
                        </select>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6 form-group">
                        <label for="supplier">المورد</label>
                        <select id="supplier" name="supplier" class="form-control">
                            <option value="supplier1">مورد 1</option>
                            <option value="supplier2">مورد 2</option>
                        </select>
                    </div>
                    <div class="col-md-6 form-group">
                        <label for="barcode">باركود</label>
                        <input type="text" id="barcode" name="barcode" class="form-control" placeholder="أدخل الباركود">
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6 form-group">
                        <input type="checkbox" id="available_online" name="available_online" class="form-check-input">
                        <label for="available_online" class="form-check-label">متاح أونلاين</label>
                    </div>
                    <div class="col-md-6 form-group">
                        <input type="checkbox" id="featured_product" name="featured_product" class="form-check-input">
                        <label for="featured_product" class="form-check-label">منتج مميز</label>
                    </div>
                </div>
            </div>

            <!-- تفاصيل التسعير -->
            <div class="form-section">
                <h3>تفاصيل التسعير</h3>

                <div class="row">
                    <div class="col-md-6 form-group">
                        <label for="purchase_price">سعر الشراء</label>
                        <input type="number" id="purchase_price" name="purchase_price" class="form-control" placeholder="أدخل سعر الشراء">
                    </div>
                    <div class="col-md-6 form-group">
                        <label for="sale_price">سعر البيع</label>
                        <input type="number" id="sale_price" name="sale_price" class="form-control" placeholder="أدخل سعر البيع">
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6 form-group">
                        <label for="tax1">الضريبة الأولى</label>
                        <input type="number" id="tax1" name="tax1" class="form-control" placeholder="أدخل الضريبة الأولى">
                    </div>
                    <div class="col-md-6 form-group">
                        <label for="tax2">الضريبة الثانية</label>
                        <input type="number" id="tax2" name="tax2" class="form-control" placeholder="أدخل الضريبة الثانية">
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6 form-group">
                        <label for="min_sale_price">أقل سعر بيع</label>
                        <input type="number" id="min_sale_price" name="min_sale_price" class="form-control" placeholder="أدخل أقل سعر بيع">
                    </div>
                    <div class="col-md-6 form-group">
                        <label for="discount">الخصم</label>
                        <input type="number" id="discount" name="discount" class="form-control" placeholder="أدخل قيمة الخصم">
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6 form-group">
                        <label for="discount_type">نوع الخصم</label>
                        <select id="discount_type" name="discount_type" class="form-control">
                            <option value="percentage">نسبة مئوية</option>
                            <option value="currency">بالعملة</option>
                        </select>
                    </div>
                    <div class="col-md-6 form-group">
                        <label for="profit_margin">هامش الربح</label>
                        <input type="number" id="profit_margin" name="profit_margin" class="form-control" placeholder="أدخل هامش الربح">
                    </div>
                </div>
            </div>
        </div>

        <!-- إدارة المخزون -->
        <div class="container bottom-section">
            <h3>إدارة المخزون</h3>

            <div class="form-group">
                <input type="checkbox" id="track_inventory" name="track_inventory" class="form-check-input">
                <label for="track_inventory" class="form-check-label">تتبع المخزون</label>
            </div>
            <div class="form-group">
                <input type="number" id="low_stock_alert" name="low_stock_alert" class="form-control" placeholder="نبهني عند وصول الكمية لأقل من">
            </div>
        </div>

        <!-- خيارات إضافية -->
        <div class="container bottom-section">
            <h3>خيارات إضافية</h3>
            <div class="row">
                <div class="col-md-6 form-group">
                    <label for="notes">ملاحظات</label>
                    <textarea id="notes" name="notes" rows="3" class="form-control" placeholder="أضف ملاحظات"></textarea>
                </div>
                <div class="col-md-6 form-group">
                    <label for="tags">وسوم</label>
                    <input type="text" id="tags" name="tags" class="form-control" placeholder="أدخل الوسوم">
                </div>
            </div>
            <div class="form-group">
                <label for="status">الحالة</label>
                <select id="status" name="status" class="form-control">
                    <option value="active">نشط</option>
                    <option value="inactive">غير نشط</option>
                    <option value="suspended">موقوف</option>
                </select>
            </div>
        </div>
    </form>
      </div>


    <!-- Bootstrap JS and dependencies -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>
