<!DOCTYPE html>
<html lang="ar">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>منتج جديد</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
    <style>
        body {
            font-family: 'Tahoma', sans-serif;
            margin: 0;
            padding: 0;
            background: linear-gradient(to right, #e3f2fd, #bbdefb);
            direction: rtl;
        }

        .header {
            background: linear-gradient(to right, #007bff, #0056b3);
            color: #fff;
            padding: 15px;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .header h1 {
            margin: 0;
        }

        .form-container {
            margin: 30px auto;
            max-width: 900px;
            background-color: #fff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        .form-section {
            margin-bottom: 20px;
        }

        .form-section h3 {
            background: linear-gradient(to right, #007bff, #0056b3);
            color: #fff;
            padding: 10px;
            border-radius: 5px;
        }

        .form-group label {
            font-weight: bold;
        }

        .save-button {
            background: linear-gradient(to right, #28a745, #218838);
            color: #fff;
            border: none;
        }

        .save-button:hover {
            background: linear-gradient(to right, #218838, #1e7e34);
        }

        .cancel-button {
            background: linear-gradient(to right, #dc3545, #c82333);
            color: #fff;
            border: none;
        }

        .cancel-button:hover {
            background: linear-gradient(to right, #c82333, #bd2130);
        }
    </style>
</head>

<body>

    <div class="header">
        <h1>منتج جديد</h1>
    </div>

    <div class="form-container">
        <form method="POST" action="{{ route('products.store') }}" enctype="multipart/form-data">
            @csrf

            <div class="form-section">
                <h3>تفاصيل المنتج</h3>
                <div class="form-group mb-3">
                    <label for="product_name">اسم المنتج</label>
                    <input type="text" id="product_name" name="product_name" class="form-control" placeholder="أدخل اسم المنتج" required>
                </div>
                <div class="form-group mb-3">
                    <label for="description">الوصف</label>
                    <textarea id="description" name="description" class="form-control" rows="3" placeholder="اكتب الوصف هنا..."></textarea>
                </div>
                <div class="form-group mb-3">
                    <label for="category">التصنيف</label>
                    <input type="text" id="category" name="category" class="form-control" placeholder="أدخل التصنيف">
                </div>
                <div class="form-group mb-3">
                    <label for="price">السعر</label>
                    <input type="number" id="price" name="price" class="form-control" placeholder="أدخل السعر" step="0.01" required>
                </div>
                <div class="form-group mb-3">
                    <label for="stock_quantity">الكمية</label>
                    <input type="number" id="stock_quantity" name="stock_quantity" class="form-control" placeholder="أدخل الكمية">
                </div>
                <div class="form-group mb-3">
                    <label for="reorder_level">مستوى إعادة الطلب</label>
                    <input type="number" id="reorder_level" name="reorder_level" class="form-control" placeholder="أدخل مستوى إعادة الطلب">
                </div>
                <div class="form-group mb-3">
                    <label for="serial_number">الرقم التسلسلي</label>
                    <input type="text" id="serial_number" name="serial_number" class="form-control" placeholder="أدخل الرقم التسلسلي">
                </div>
                <div class="form-group mb-3">
                    <label for="brand">الماركة</label>
                    <input type="text" id="brand" name="brand" class="form-control" placeholder="أدخل اسم الماركة">
                </div>
                <div class="form-group mb-3">
                    <label for="supplier">المورد</label>
                    <input type="text" id="supplier" name="supplier" class="form-control" placeholder="أدخل اسم المورد">
                </div>
                <div class="form-group mb-3">
                    <label for="barcode">الباركود</label>
                    <input type="text" id="barcode" name="barcode" class="form-control" placeholder="أدخل الباركود">
                </div>
            </div>

            <div class="form-section">
                <h3>تفاصيل التسعير</h3>
                <div class="form-group mb-3">
                    <label for="purchase_price">سعر الشراء</label>
                    <input type="number" id="purchase_price" name="purchase_price" class="form-control" placeholder="أدخل سعر الشراء" step="0.01">
                </div>
                <div class="form-group mb-3">
                    <label for="sale_price">سعر البيع</label>
                    <input type="number" id="sale_price" name="sale_price" class="form-control" placeholder="أدخل سعر البيع" step="0.01">
                </div>
                <div class="form-group mb-3">
                    <label for="tax1">الضريبة الأولى</label>
                    <input type="number" id="tax1" name="tax1" class="form-control" placeholder="أدخل الضريبة الأولى" step="0.01">
                </div>
                <div class="form-group mb-3">
                    <label for="tax2">الضريبة الثانية</label>
                    <input type="number" id="tax2" name="tax2" class="form-control" placeholder="أدخل الضريبة الثانية" step="0.01">
                </div>
                <div class="form-group mb-3">
                    <label for="min_sale_price">أقل سعر بيع</label>
                    <input type="number" id="min_sale_price" name="min_sale_price" class="form-control" placeholder="أدخل أقل سعر بيع" step="0.01">
                </div>
                <div class="form-group mb-3">
                    <label for="discount">الخصم</label>
                    <input type="number" id="discount" name="discount" class="form-control" placeholder="أدخل قيمة الخصم" step="0.01">
                </div>
                <div class="form-group mb-3">
                    <label for="discount_type">نوع الخصم</label>
                    <select id="discount_type" name="discount_type" class="form-select">
                        <option value="percentage">نسبة مئوية</option>
                        <option value="currency">بالعملة</option>
                    </select>
                </div>
            </div>

            <div class="form-section">
                <h3>خيارات إضافية</h3>
                <div class="form-check mb-3">
                    <input class="form-check-input" type="checkbox" id="available_online" name="available_online">
                    <label class="form-check-label" for="available_online">متاح أون لاين</label>
                </div>
                <div class="form-check mb-3">
                    <input class="form-check-input" type="checkbox" id="featured_product" name="featured_product">
                    <label class="form-check-label" for="featured_product">منتج مميز</label>
                </div>
                <div class="form-group mb-3">
                    <label for="notes">ملاحظات</label>
                    <textarea id="notes" name="notes" class="form-control" rows="3" placeholder="أدخل الملاحظات"></textarea>
                </div>
            </div>

            <div class="d-flex justify-content-between">
                <button type="reset" class="cancel-button btn">إلغاء</button>
                <button type="submit" class="save-button btn">حفظ</button>
            </div>
        </form>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
