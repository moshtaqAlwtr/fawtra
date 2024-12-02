@extends('layouts.app')

@section('content')
@if(isset($invoice) && $invoice)
<!-- Top Bar -->
<div class="top-bar no-print">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-md-6">
                <h4 class="mb-0">
                    <i class="fas fa-file-invoice me-2"></i>
                    الفاتورة #{{ $invoice->invoice_id }}
                    <span class="status-badge {{ $invoice->payment_status === 'paid' ? 'paid' : ($invoice->payment_status === 'pending' ? 'pending' : 'unpaid') }}">
                        {{ $invoice->payment_status === 'paid' ? 'مدفوعة' : ($invoice->payment_status === 'pending' ? 'معلقة' : 'غير مدفوعة') }}
                    </span>
                </h4>
            </div>
            <div class="col-md-6 text-md-end">
                <div class="action-buttons">
                    <button class="btn btn-light" onclick="printInvoice()">
                        <i class="fas fa-print"></i> طباعة
                    </button>
                    <button class="btn btn-success" onclick="addPayment()">
                        <i class="fas fa-plus"></i> إضافة دفع
                    </button>
                    <button class="btn btn-info text-white" onclick="exportPDF()">
                        <i class="fas fa-file-pdf"></i> PDF
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="container">
    <!-- Invoice Details -->
    <div class="invoice-card">
        <div class="row mb-4">
            <div class="col-md-6">
                <div class="invoice-details">
                    <h5 class="text-primary mb-3">معلومات الشركة</h5>
                    <h6>{{ $invoice->client->company_name ?? 'مؤسسة أعمال خاصة للتجارة' }}</h6>
                    <p class="text-muted mb-1">{{ $invoice->client->address ?? 'الرياض، المملكة العربية السعودية' }}</p>
                    <p class="text-muted mb-1">الرقم الضريبي: {{ $invoice->client->tax_number ?? '300051635200005' }}</p>
                    <p class="text-muted">تاريخ الفاتورة: {{ $invoice->invoice_date->format('Y/m/d') }}</p>
                </div>
            </div>
            <div class="col-md-6 text-md-end">
                <div class="qr-code" id="qrcode"></div>
            </div>
        </div>

        <!-- Tabs Navigation -->
        <ul class="nav nav-tabs mb-4" role="tablist">
            <li class="nav-item">
                <button class="nav-link active" data-bs-toggle="tab" data-bs-target="#invoice">
                    <i class="fas fa-file-invoice me-2"></i>فاتورة
                </button>
            </li>
            <li class="nav-item">
                <button class="nav-link" data-bs-toggle="tab" data-bs-target="#details">
                    <i class="fas fa-info-circle me-2"></i>التفاصيل
                </button>
            </li>
            <li class="nav-item">
                <button class="nav-link" data-bs-toggle="tab" data-bs-target="#warehouse">
                    <i class="fas fa-warehouse me-2"></i>الأذون المخزنية
                </button>
            </li>
            <li class="nav-item">
                <button class="nav-link" data-bs-toggle="tab" data-bs-target="#activities">
                    <i class="fas fa-history me-2"></i>سجل النشاطات
                </button>
            </li>
            <li class="nav-item">
                <button class="nav-link" data-bs-toggle="tab" data-bs-target="#profits">
                    <i class="fas fa-chart-line me-2"></i>ربح الفاتورة
                </button>
            </li>
        </ul>

        <!-- Tab Content -->
        <div class="tab-content">
            <!-- Invoice Tab -->
            <div class="tab-pane fade show active" id="invoice">
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>البند</th>
                                <th>سعر الوحدة</th>
                                <th>الكمية</th>
                                <th>المجموع</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($invoice->items as $item)
                            <tr>
                                <td>{{ $item->name }}</td>
                                <td>{{ number_format($item->unit_price, 2) }}</td>
                                <td>{{ $item->quantity }}</td>
                                <td>{{ number_format($item->unit_price * $item->quantity, 2) }}</td>
                            </tr>
                            @endforeach
                        </tbody>
                        <tfoot class="table-light">
                            <tr>
                                <td colspan="3" class="text-end">الإجمالي:</td>
                                <td>{{ number_format($invoice->total, 2) }} ر.س</td>
                            </tr>
                            <tr>
                                <td colspan="3" class="text-end">المدفوع:</td>
                                <td>{{ number_format($invoice->payments->sum('amount'), 2) }} ر.س</td>
                            </tr>
                            <tr>
                                <td colspan="3" class="text-end fw-bold">المبلغ المستحق:</td>
                                <td class="fw-bold">{{ number_format($invoice->total - $invoice->payments->sum('amount'), 2) }} ر.س</td>
                            </tr>
                        </tfoot>
                    </table>
                </div>
            </div>

            <!-- Details Tab -->
            <div class="tab-pane fade" id="details">
                <div class="row">
                    <div class="col-md-6">
                        <div class="invoice-details">
                            <h6>معلومات العميل</h6>
                            <p>الاسم: {{ $invoice->client->name }}</p>
                            <p>الهاتف: {{ $invoice->client->phone }}</p>
                            <p>البريد: {{ $invoice->client->email }}</p>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="invoice-details">
                            <h6>معلومات إضافية</h6>
                            @foreach($invoice->customFields as $field)
                            <p>{{ $field->field_name }}: {{ $field->field_value }}</p>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>

            <!-- Warehouse Tab -->
            <div class="tab-pane fade" id="warehouse">
                <div class="alert alert-info">
                    <i class="fas fa-info-circle me-2"></i>
                    قريباً - سيتم إضافة معلومات الأذون المخزنية
                </div>
            </div>

            <!-- Activities Tab -->
            <div class="tab-pane fade" id="activities">
                <div class="timeline">
                    @foreach($invoice->payments as $payment)
                    <div class="timeline-item">
                        <div class="timeline-marker bg-success">
                            <i class="fas fa-check"></i>
                        </div>
                        <div class="timeline-content">
                            <h6 class="mb-0">دفعة جديدة</h6>
                            <p class="text-muted mb-0">
                                تم استلام مبلغ {{ number_format($payment->amount, 2) }} ر.س
                                <small class="text-muted">{{ $payment->created_at->format('Y/m/d H:i') }}</small>
                            </p>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>

            <!-- Profits Tab -->
            <div class="tab-pane fade" id="profits">
                <div class="alert alert-warning">
                    <i class="fas fa-lock me-2"></i>
                    هذا القسم متاح فقط للمدراء
                </div>
            </div>
        </div>
    </div>
</div>
@else
<div class="alert alert-warning">
    <i class="fas fa-exclamation-triangle me-2"></i>
    عذراً، لم يتم العثور على الفاتورة المطلوبة
</div>
@endif

@if(isset($invoice) && $invoice)
<script src="https://cdnjs.cloudflare.com/ajax/libs/qrcodejs/1.0.0/qrcode.min.js"></script>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Generate QR Code
        new QRCode(document.getElementById("qrcode"), {
            text: JSON.stringify({
                company: '{{ $invoice->client->company_name }}',
                vat: '{{ $invoice->client->tax_number }}',
                invoice: '{{ $invoice->invoice_id }}',
                date: '{{ $invoice->invoice_date->format("Y-m-d") }}',
                total: '{{ $invoice->total }}'
            }),
            width: 128,
            height: 128
        });
    });

    function printInvoice() {
        window.print();
    }

    function addPayment() {
        window.location.href = '{{ route("add_payment_process", ["invoice_id" => $invoice->id]) }}';
    }

    function exportPDF() {
        window.location.href = '{{ route("export_invoice_pdf", ["id" => $invoice->id]) }}';
    }
</script>
@endif
@endsection
