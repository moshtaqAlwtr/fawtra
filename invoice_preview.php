<?php
require_once 'includes/header.php';
?>

<div class="container-fluid mt-3">
    <div class="card">
        <div class="card-header bg-white">
            <div class="row align-items-center">
                <div class="col">
                    <h5 class="mb-0" id="invoiceNumber">الفاتورة #<span id="invoice-id"></span></h5>
                </div>
                <div class="col-auto">
                    <div class="btn-group" role="group">
                        <button type="button" class="btn btn-primary" onclick="printInvoice()">
                            <i class="fas fa-print"></i> طباعة الفاتورة
                        </button>
                        <button type="button" class="btn btn-success" onclick="addPayment()">
                            <i class="fas fa-plus"></i> إضافة عملية دفع
                        </button>
                        <button type="button" class="btn btn-info" onclick="exportToPDF()">
                            <i class="fas fa-file-pdf"></i> PDF
                        </button>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="card-body">
            <ul class="nav nav-tabs" id="invoiceTabs" role="tablist">
                <li class="nav-item">
                    <a class="nav-link active" id="invoice-tab" data-toggle="tab" href="#invoice" role="tab">فاتورة</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="details-tab" data-toggle="tab" href="#details" role="tab">التفاصيل</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="medicines-tab" data-toggle="tab" href="#medicines" role="tab">الأدوية المخزنة</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="activities-tab" data-toggle="tab" href="#activities" role="tab">سجل النشاطات</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="profit-tab" data-toggle="tab" href="#profit" role="tab">ربح الفاتورة</a>
                </li>
            </ul>
            
            <div class="tab-content mt-3" id="invoiceTabContent">
                <div class="tab-pane fade show active" id="invoice" role="tabpanel">
                    <div class="invoice-preview bg-white p-4">
                        <div class="row">
                            <div class="col-6">
                                <h4>مؤسسة أعمال خاصة للتجارة</h4>
                                <p>الرياض، المملكة العربية السعودية</p>
                            </div>
                            <div class="col-6 text-left">
                                <div class="qr-code">
                                    <!-- QR Code will be generated here -->
                                </div>
                            </div>
                        </div>
                        
                        <div class="row mt-4">
                            <div class="col-12">
                                <table class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th>البند</th>
                                            <th>سعر الوحدة</th>
                                            <th>الكمية</th>
                                            <th>المجموع</th>
                                        </tr>
                                    </thead>
                                    <tbody id="invoice-items">
                                        <!-- Invoice items will be populated here -->
                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            <td colspan="3" class="text-left">الإجمالي:</td>
                                            <td id="total-amount"></td>
                                        </tr>
                                        <tr>
                                            <td colspan="3" class="text-left">المدفوع:</td>
                                            <td id="paid-amount"></td>
                                        </tr>
                                        <tr>
                                            <td colspan="3" class="text-left">المبلغ المستحق:</td>
                                            <td id="due-amount"></td>
                                        </tr>
                                    </tfoot>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                
                <div class="tab-pane fade" id="details" role="tabpanel">
                    <!-- Details content -->
                </div>
                
                <div class="tab-pane fade" id="medicines" role="tabpanel">
                    <!-- Medicines content -->
                </div>
                
                <div class="tab-pane fade" id="activities" role="tabpanel">
                    <!-- Activities content -->
                </div>
                
                <div class="tab-pane fade" id="profit" role="tabpanel">
                    <!-- Profit content -->
                </div>
            </div>
        </div>
    </div>
</div>

<?php
require_once 'includes/footer.php';
?>
