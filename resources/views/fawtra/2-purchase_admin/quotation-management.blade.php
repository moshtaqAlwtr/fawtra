<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>إدارة عروض الأسعار</title>

    
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link rel="stylesheet" href="../Design/css/data.css">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">

   
    <style>
        body {
            font-family: 'Tahoma', sans-serif;
            background-color: #f4f6f9;
            direction: rtl;
            text-align: right;
        }
        .container {
            margin-top: 30px;
        }
        .advanced-search {
            display: none;
            padding: 15px;
            background-color: #f8f9fa;
            border: 1px solid #ddd;
            border-radius: 8px;
        }
        .advanced-search.active {
            display: block;
            animation: fadeIn 0.5s ease-in-out;
        }
        @keyframes fadeIn {
            from { opacity: 0; }
            to { opacity: 1; }
        }
        .table td, .table th {
            text-align: center;
            vertical-align: middle;
        }
        .btn-group-actions {
            margin-top: 20px;
            gap: 15px;
        }
        .dropdown-menu {
            min-width: 160px;
        }
        .search-icon {
            color: #17a2b8;
        }
        .card-header {
            background-color: #007bff;
            color: #fff;
            font-size: 1.2rem;
            font-weight: bold;
        }
    </style>
</head>
<body>

<div class="container">
    <!-- عنوان الصفحة وزر إضافة -->

        <h2>إدارة عروض الأسعار</h2>
        <div class="d-flex align-items-center">
            <a href="quotation.html" class="btn btn-success ml-2"><i class="fas fa-plus-circle"></i> إضافة عرض سعر جديد</a>
            <button class="btn btn-secondary ml-2" onclick="location.href='../9-sales_management/schedule_appointment.html'"><i class="fas fa-calendar-alt"></i> المواعيد</button>
            <div class="dropdown ml-2">
                <button class="btn btn-primary dropdown-toggle" type="button" id="actionsDropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <i class="fas fa-cogs"></i> الإجراءات
                </button>
                <div class="dropdown-menu" aria-labelledby="actionsDropdown" dir="rtl">
                    <a class="dropdown-item" href="#"><i class="fas fa-trash-alt text-danger"></i> حذف</a>
                    <a class="dropdown-item" href="#"><i class="fas fa-file-export text-secondary"></i> تصدير</a>
                </div>
            </div>
        </div>
    </div>

    <!-- نموذج البحث -->
    <div class="card mb-4">
        <div class="card-header"><i class="fas fa-search search-icon"></i> نموذج البحث</div>
        <div class="card-body">
            <form>
                <div class="form-row">
                    
                    <div class="form-group col-md-4">
                        <label for="client">العميل</label>
                        <select class="form-control" id="client">
                            <option>أي عميل</option>
                            <option>عميل 1</option>
                            <option>عميل 2</option>
                        </select>
                    </div>
                    <div class="form-group col-md-4">
                        <label for="quotationNumber">رقم عرض السعر</label>
                        <input type="text" class="form-control" id="quotationNumber" placeholder="رقم عرض السعر">
                    </div>                    <div class="form-group col-md-4">
                        <label for="status">الحالة</label>
                        <select class="form-control" id="status">
                            <option>أي حالة</option>
                            <option>مفتوح</option>
                            <option>مغلق</option>
                        </select>
                    </div>
                </div>

                <!-- البحث المتقدم -->
                <div class="advanced-search" id="advanced-search">
                    <div class="form-row">
                        <div class="form-group col-md-4">
                            <label for="currency">العملة</label>
                            <select class="form-control" id="currency">
                                <option>أي</option>
                                <option>ريال سعودي</option>
                                <option>دولار أمريكي</option>
                            </select>
                        </div>
                        <div class="form-group col-md-2">
                            <label for="totalMore">الإجمالي أكبر من</label>
                            <input type="text" class="form-control" id="totalMore" placeholder="0.00">
                        </div>
                        <div class="form-group col-md-2">
                            <label for="totalLess">الإجمالي أقل من</label>
                            <input type="text" class="form-control" id="totalLess" placeholder="0.00">
                        </div>
                        <div class="form-group col-md-4">
                            <label for="status">الحالة</label>
                            <select class="form-control" id="status">
                                <option>أي حالة</option>
                                <option>مفتوح</option>
                                <option>مغلق</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-row align-items-center">
                        
                        <div class="form-row align-items-center">
                            <!-- حقل التاريخ -->
                            <div class="form-group col-md-2">
                                <label class="form-label">التاريخ</label>
                                <select class="form-control" onchange="toggleCustomDate(this)">
                                    <option value="custom">تخصيص</option>
                                    <option value="last_month">الشهر الأخير</option>
                                    <option value="last_year">السنة الماضية</option>
                                </select>
                            </div>
                        
                            <!-- حقل نطاق التاريخ (من - إلى) -->
                            <div class="form-group col-md-3">
                                <label class="form-label">. </label>
                                <div class="input-group">
                                    <input type="text" id="deliveryStartDate" class="form-control" placeholder="من" style="width: 50%;">
                                    <input type="text" id="deliveryEndDate" class="form-control" placeholder="إلى" style="width: 50%;">
                                </div>
                            </div>
                        
                            <!-- حقل تاريخ الإنشاء -->
                            <div class="form-group col-md-2">
                                <label class="form-label">تاريخ الإنشاء</label>
                                <select class="form-control" onchange="toggleCustomDate(this)">
                                    <option value="custom">تخصيص</option>
                                    <option value="last_month">الشهر الأخير</option>
                                    <option value="last_year">السنة الماضية</option>
                                </select>
                            </div>
                        
                            <!-- حقل نطاق تاريخ الإنشاء (من - إلى) -->
                            <div class="form-group col-md-3">
                                <label class="form-label">     .</label>
                                <div class="input-group">
                                    <input type="text" id="deliveryStartDate" class="form-control" placeholder="من" style="width: 50%;">
                                    <input type="text" id="deliveryEndDate" class="form-control" placeholder="إلى" style="width: 50%;">
                                </div>
                            </div>
                        
                            <!-- حقل البند -->
                            <div class="form-group col-md-2">
                                <label for="trackingType">البند</label>
                                <input type="text" class="form-control" id="trackingType">
                            </div>
                        </div>
                        
                        
                        </div>
                        <div class="form-row">
                            
                            <div class="form-group col-md-4">
                                <label for="source">مصدر الطلب</label>
                                <select class="form-control" id="source">
                                    <option>من فضلك اختر</option>
                                    <option>مفتوح</option>
                                    <option>مغلق</option>
                                </select>
                            </div>
                            <div class="form-group col-md-4">
                                <label for="source">
                                    اضيفت بواسطة </label>
                                <select class="form-control" id="source">
                                    <option>أي موظف  </option>
                                
                                </select>
                            </div>
                            <div class="form-group col-md-4">
                                <label for="source">
                                    مسؤول مبيعات  </label>
                                <select class="form-control" id="source">
                                    <option>أي مسؤول مبيعات  </option>
                                
                                </select>
                            </div>
                                        </div>
                </div>

                <!-- أزرار البحث -->
                <div class="form-row btn-group-actions">
                    <button type="button" class="btn btn-primary mt-2"><i class="fas fa-search"></i> بحث</button>
                    <button type="reset" class="btn btn-secondary mt-2"><i class="fas fa-times"></i> إلغاء الفلتر</button>
                    <button type="button" class="btn btn-outline-info mt-2" onclick="toggleAdvancedSearch()"><i class="fas fa-filter"></i> بحث متقدم</button>
                </div>
            </form>
        </div>
    </div>

    <!-- عرض النتائج -->
    <div class="card-body">
        <table class="table table-bordered table-hover">
            <thead class="thead-light">
                <tr>
                    <th>رقم العرض</th>
                    <th>العميل</th>
                    <th>الحالة</th>
                    <th>الإجمالي</th>
                    <th>التاريخ</th>
                    <th>الإجراءات</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>00123</td>
                    <td>عميل 1</td>
                    <td><span class="badge badge-success">مفتوح</span></td>
                    <td>150.00 ريال</td>
                    <td>2024-10-28</td>
                    <td>
                        <div class="dropdown">
                            <button class="btn btn-secondary" type="button" id="actionsDropdown2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-ellipsis-v"></i>
                            </button>
                            <div class="dropdown-menu" aria-labelledby="actionsDropdown2" dir="rtl">
                                <a class="dropdown-item" href="#"><i class="fas fa-eye text-primary"></i> عرض</a>
                                <a class="dropdown-item" href="#"><i class="fas fa-edit text-warning"></i> تعديل</a>
                                <a class="dropdown-item" href="#"><i class="fas fa-paper-plane text-info"></i> إرسال إلى العميل</a>
                                <a class="dropdown-item" href="#"><i class="fas fa-file-pdf text-danger"></i> PDF</a>
                                <a class="dropdown-item" href="#"><i class="fas fa-image text-success"></i> الصورة</a>
                                <a class="dropdown-item" href="#"><i class="fas fa-copy text-secondary"></i> نسخ</a>
                                <a class="dropdown-item" href="#"><i class="fas fa-trash-alt text-danger"></i> حذف</a>
                            </div>
                        </div>
                        
                        <!-- تضمين مكتبة Font Awesome -->

                        
                    </td>
                </tr>
                <tr>
                    <td>00124</td>
                    <td>عميل 2</td>
                    <td><span class="badge badge-secondary">مغلق</span></td>
                    <td>200.00 ريال</td>
                    <td>2024-10-27</td>
                    <td>
                        <div class="dropdown">
                            <button class="btn btn-secondary" type="button" id="actionsDropdown2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-ellipsis-v"></i>
                            </button>
                            <div class="dropdown-menu" aria-labelledby="actionsDropdown2" dir="rtl">
                                <a class="dropdown-item" href="#"><i class="fas fa-eye text-primary"></i> عرض</a>
                                <a class="dropdown-item" href="#"><i class="fas fa-edit text-warning"></i> تعديل</a>
                                <a class="dropdown-item" href="#"><i class="fas fa-paper-plane text-info"></i> إرسال إلى العميل</a>
                                <a class="dropdown-item" href="#"><i class="fas fa-file-pdf text-danger"></i> PDF</a>
                                <a class="dropdown-item" href="#"><i class="fas fa-image text-success"></i> الصورة</a>
                                <a class="dropdown-item" href="#"><i class="fas fa-copy text-secondary"></i> نسخ</a>
                                <a class="dropdown-item" href="#"><i class="fas fa-trash-alt text-danger"></i> حذف</a>
                            </div>
                        </div>
                        
                        <!-- تضمين مكتبة Font Awesome -->
                      
                        
                        </div>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
    
</div>

<script>
    function toggleAdvancedSearch() {
        const advancedSearch = document.getElementById('advanced-search');
        advancedSearch.classList.toggle('active');
    }
</script>

<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.1/umd/popper.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.2/dist/js/bootstrap.bundle.min.js"></script>


<script src="../js/date.js"></script>

</body>
</html>
