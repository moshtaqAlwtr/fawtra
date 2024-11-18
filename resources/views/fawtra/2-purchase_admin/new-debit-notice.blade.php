<!DOCTYPE html>
<html lang="ar">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>فاتورة إشعار مدين جديد</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            direction: rtl;
            background-color: #f4f4f9;
        }
        .top-bar {
            background-color: #007bff;
            padding: 10px;
            display: flex;
            justify-content: space-between;
        }
        .btn {
            background-color: #fff;
            border: none;
            padding: 10px 20px;
            margin: 5px;
            cursor: pointer;
            border-radius: 5px;
            transition: background-color 0.3s;
        }
        .btn.green {
            background-color: #28a745;
            color: #fff;
        }
        .btn.green:hover {
            background-color: #218838;
        }
        .content {
            padding: 20px;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }
        th, td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: center;
        }
        th {
            background-color: #f2f2f2;
        }
    </style>
</head>
<body>
  <!-- عرض رسالة الأخطاء إن وجدت -->
  @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <!-- عرض رسالة النجاح إن وجدت -->
    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif
    <div class="top-bar">
        <button class="btn">الذهاب إلى الموقع</button>
        <button class="btn">المساعدة</button>
    </div>
    <div class="content">
        <button class="btn">👁️ معاينة</button>
        <button class="btn">حفظ كمسودة</button>

        <!-- نموذج حفظ البيانات -->
        <form action="{{ route('store-credit-notification') }}" method="POST">
            @csrf <!-- إضافة رمز الحماية من Laravel -->
            <div>
                <label>المورد:</label>
                <input type="text" name="client" placeholder="البحث عن الموردين">
                <button type="button" class="btn btn-blue">جديد</button>
            </div>
            <div>
                <label>رقم الأشعار المدين:</label>
                <input type="text" name="notification_number">
                <label>تاريخ الأشعار المدين:</label>
                <input type="date" name="notification_date">
            </div>
            <!-- يمكنك توسيع هذا الجدول ليشمل البيانات الأخرى التي تحتاجها -->
            <table>
                <tr>
                    <th>البند</th>
                    <th>الوصف</th>
                    <th>سعر الوحدة</th>
                    <th>الكمية</th>
                    <th>الخصم</th>
                    <th>الضريبة 1</th>
                    <th>الضريبة 2</th>
                    <th>المجموع</th>
                </tr>
                <!-- يمكن إضافة المزيد من الصفوف عبر زر "أضف" -->
            </table>
            <button type="button" class="btn">أضف</button>
            <!-- زر الحفظ -->
            <button type="submit" class="btn green">حفظ</button>
        </form>
    </div>
</body>
</html>
