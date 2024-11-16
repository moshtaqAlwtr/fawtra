<!DOCTYPE html>
<html lang="ar">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>منتج جديد</title>
    <link rel="icon" href="k.jpg">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <style>
        body {
            font-family: 'Tahoma', sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f6f9;
            direction: rtl;
        }

        .header {
            background-color: #007bff;
            color: #fff;
            padding: 15px;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .header .buttons {
            display: flex;
            gap: 10px;
        }

        .header button {
            background-color: #0056b3;
            border: none;
            color: #fff;
            padding: 10px 15px;
            border-radius: 5px;
            cursor: pointer;
        }

        .header button:hover {
            background-color: #004494;
        }

        .controls {
            display: flex;
            justify-content: flex-end;
            gap: 10px;
            padding: 20px;
        }

        .controls button {
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        .controls .cancel-button {
            background-color: #dc3545;
            color: #fff;
        }

        .controls .save-button {
            background-color: #28a745;
            color: #fff;
        }

        .form-container {
            display: flex;
            gap: 20px;
            padding: 0 20px;
        }

        .form-section {
            flex: 1;
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        }

        .form-group {
            margin-bottom: 15px;
        }

        .form-group label {
            display: block;
            margin-bottom: 5px;
            font-weight: bold;
        }

        .form-group input,
        .form-group select,
        .form-group textarea {
            width: 100%;
            padding: 8px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }

        .checkbox-container {
            display: flex;
            align-items: center;
            gap: 5px;
            margin-bottom: 10px;
        }

        .more-options {
            display: flex;
            flex-direction: column;
            gap: 10px;
        }

        .upload-button {
            padding: 8px 12px;
            background-color: #007bff;
            color: #fff;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }

        .upload-button:hover {
            background-color: #0056b3;
        }
    </style>
</head>

<body>


    <div class="header">
        <div class="buttons">
            <button onclick="window.location.href='#';">الذهاب للموقع</button>
            <button onclick="window.location.href='#';">المساعدة</button>
        </div>
        <h1>منتج جديد</h1>
    </div>

    <div class="controls">
        <button class="cancel-button">إلغاء</button>
        <button class="save-button">حفظ</button>
    </div>
    <div class="form-container">
        <!-- الجزء الأيمن -->

        <form method="POST" action="{{ route('products.store') }}" enctype="multipart/form-data">
            @csrf
            <div class="form-section">
                <div class="form-group">
                    <label for="product-name">الاسم</label>
                    <input type="text" id="product-name" name="product_name" placeholder="أدخل اسم المنتج" required>
                </div>
                <div class="form-group">
                    <label for="description">الوصف</label>
                    <textarea id="description" name="description" rows="3" placeholder="اكتب الوصف هنا..."></textarea>
                </div>
                <div class="form-group">
                    <label for="category">التصنيف</label>
                    <input type="text" id="category" name="category" placeholder="أدخل التصنيف">
                </div>
                <div class="form-group">
                    <label for="price">السعر</label>
                    <input type="number" id="price" name="price" placeholder="أدخل السعر" step="0.01" required>
                </div>
                <div class="form-group">
                    <label for="stock_quantity">الكمية</label>
                    <input type="number" id="stock_quantity" name="stock_quantity" placeholder="أدخل الكمية">
                </div>
                <div class="form-group">
                    <label for="reorder_level">مستوى إعادة الطلب</label>
                    <input type="number" id="reorder_level" name="reorder_level" placeholder="أدخل مستوى إعادة الطلب">
                </div>
                <div class="controls">
                    <button type="submit" class="save-button">حفظ</button>
                    <button type="reset" class="cancel-button">إلغاء</button>
                </div>
            </div>
        </form>
    </div>
    @if(session('success'))
    <div style="color: green; margin: 10px 0;">
        {{ session('success') }}
    </div>
@endif

</body>
</html>
