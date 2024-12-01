{{-- resources/views/invoices/invoice_print.blade.php --}}
<!DOCTYPE html>
<html lang="ar">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>فاتورة رقم: {{ $invoice->id }}</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" />
    <style>
        body {
            font-family: 'Arial', sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f7fc;
        }

        .invoice-container {
            background: linear-gradient(135deg, #7f7fd5 0%, #86a8e7 50%, #91eae4 100%);
            padding: 30px;
            border-radius: 10px;
            max-width: 900px;
            margin: 20px auto;
        }

        .invoice-header {
            text-align: center;
            margin-bottom: 30px;
        }

        .invoice-header h1 {
            color: #fff;
            font-size: 2.5rem;
            margin-bottom: 10px;
        }

        .invoice-header p {
            color: #fff;
            font-size: 1.1rem;
        }

        .invoice-details, .invoice-items {
            margin-bottom: 30px;
        }

        .invoice-details h3, .invoice-items h3 {
            background-color: #f8f9fa;
            padding: 10px;
            border-radius: 5px;
            color: #495057;
            margin-bottom: 20px;
        }

        table {
            width: 100%;
            margin-bottom: 20px;
            border-collapse: collapse;
        }

        table th, table td {
            padding: 10px;
            text-align: center;
            border: 1px solid #ddd;
        }

        .total {
            font-size: 1.3rem;
            font-weight: bold;
            color: #495057;
        }

        .footer {
            text-align: center;
            font-size: 0.9rem;
            color: #495057;
            margin-top: 30px;
        }

        /* Print-specific styles */
        @media print {
            body, html {
                width: 100%;
                height: 100%;
                margin: 0;
                padding: 0;
            }
            .invoice-container {
                max-width: 100%;
                padding: 10px;
                margin: 0;
            }
        }
    </style>
</head>
<body>
    <div class="invoice-container">
        <div class="invoice-header">
            <h1>فاتورة رقم: {{ $invoice->id }}</h1>
            <p>تاريخ الفاتورة: {{ $invoice->created_at->format('d-m-Y') }}</p>
        </div>

        <div class="invoice-details">
            <h3>تفاصيل العميل</h3>
            <p><strong>الاسم:</strong> {{ $invoice->client->name }}</p>
            <p><strong>العنوان:</strong> {{ $invoice->client->address }}</p>
            <p><strong>الهاتف:</strong> {{ $invoice->client->phone }}</p>
        </div>

        <div class="invoice-items">
            <h3>تفاصيل الفاتورة</h3>
            <table>
                <thead>
                    <tr>
                        <th>الوصف</th>
                        <th>الكمية</th>
                        <th>السعر</th>
                        <th>الإجمالي</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($invoice->invoice_items as $item)
                    <tr>
                        <td>{{ $item->description }}</td>
                        <td>{{ $item->quantity }}</td>
                        <td>{{ number_format($item->price, 2) }}</td>
                        <td>{{ number_format($item->total, 2) }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            <div class="total">
                <p><strong>الإجمالي: {{ number_format($invoice->total, 2) }}</strong></p>
            </div>
        </div>

        <div class="footer">
            <p>شكراً لك على تعاملاتك معنا!</p>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
