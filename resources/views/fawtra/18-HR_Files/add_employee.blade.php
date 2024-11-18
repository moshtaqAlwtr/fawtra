<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>أضافة موظف  </title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="styles.css">
</head>
<style>
    /* إعدادات الجسم */
    body {
        font-family: 'Tajawal', sans-serif;
        background: linear-gradient(135deg, #e0f7fa, #ffffff);
        color: #333;
        direction: rtl;
    }

    /* إعدادات الكارت */
    .card {
        border-radius: 12px;
        box-shadow: 0 8px 16px rgba(0, 0, 0, 0.15);
        overflow: hidden;
        background-color: #fff;
    }

    /* رأس البطاقة بتدرج لوني جديد */
    .gradient-bg {
        background: linear-gradient(135deg, #00c6ff, #0072ff); /* من الأزرق السماوي إلى الأزرق الداكن */
        color: #fff;
        padding: 20px;
        text-align: center;
    }

    .gradient-bg h3 {
        margin: 0;
        font-weight: 600;
    }
    
                            .gradient-background {
                                background: linear-gradient(45deg, #e0f7fa, #ddd);
                                padding: 10px;
                                border-radius: 8px;
                                color: white;
                            }
                        
                            .form-check-label {
                                font-weight: bold;
                                margin-right: 10px;
                            }
                        
                            .form-check-input {
                                accent-color: white;
                                transform: scale(1.2);
                            }
    /* إعدادات الأزرار */
    .gradient-btn {
        background: linear-gradient(135deg, #00c6ff, #0072ff); /* نفس تدرج رأس البطاقة */
        border: none;
        color: #fff;
        font-weight: 600;
        transition: background 0.3s;
    }

    .gradient-btn:hover {
        background: linear-gradient(135deg, #0072ff, #00c6ff); /* عكس التدرج */
        color: #fff;
    }

    /* تنسيق الحقول */
    .form-control, .custom-file-label {
        border-radius: 6px;
        padding: 12px;
        background-color: #f4f6fa;
        border: 1px solid #ddd;
        transition: all 0.3s ease-in-out;
    }

    .form-control:focus {
        border-color: #00c6ff;
        box-shadow: 0 0 5px rgba(0, 198, 255, 0.3);
        background-color: #fff;
    }

    /* حقل رفع الملفات */
    .custom-file-label::after {
        content: "اختر";
        background-color: #00c6ff;
        color: #fff;
        border-radius: 0 6px 6px 0;
    }

    .card {
        border-radius: 12px;
        box-shadow: 0 8px 16px rgba(0, 0, 0, 0.1);
        overflow: hidden;
        background-color: #fff;
        margin-bottom: 20px;
    }

    .card-header {
        background: linear-gradient(135deg, #00c6ff, #0072ff);
        color: #fff;
        text-align: center;
        font-weight: 600;
        padding: 15px;
    }

    .form-control, .custom-file-label {
        border-radius: 6px;
        padding: 10px;
        background-color: #f4f6fa;
        border: 1px solid #ddd;
    }

    .form-control:focus {
        border-color: #00c6ff;
        box-shadow: 0 0 5px rgba(0, 198, 255, 0.3);
        background-color: #fff;
    }

    .custom-file-label::after {
        content: "اختر";
        background-color: #00c6ff;
        color: #fff;
        border-radius: 0 6px 6px 0;
    }

    .btn-primary {
        background: linear-gradient(135deg, #00c6ff, #0072ff);
        border: none;
        font-weight: bold;
        color: #fff;
        width: 100%;
    }

    .btn-primary:hover {
        background: linear-gradient(135deg, #0072ff, #00c6ff);
    }
    /* تنسيق النصوص */
    label {
        font-weight: 600;
        color: #555;
    }

    .text-danger {
        font-weight: bold;
    }

    /* تحسينات للمسافات والتباعد */
    .form-row, .form-group {
        margin-bottom: 15px;
    }

    /* إعدادات الزر الرئيسي */
    .btn-block {
        padding: 12px;
        font-size: 1.1rem;
        font-weight: 600;
    }
</style>
<body>
    <div class="container mt-5">
        <div class="card shadow-lg">
            <div class="gradient-bg">
                <h3>معلومات عامة</h3>
            </div>
            <div class="card-body">
             
                
                <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

                <form class="container mt-4 p-4 border rounded bg-light">
                    <div class="form-row">
                        <div class="form-group col-md-4">
                            <label for="firstName">الاسم الأول <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" id="firstName" required>
                        </div>
                        <div class="form-group col-md-4">
                            <label for="lastName">اللقب</label>
                            <input type="text" class="form-control" id="lastName">
                        </div>
                        <div class="form-group col-md-4">
                            <label for="middleName">الاسم الأوسط</label>
                            <input type="text" class="form-control" id="middleName">
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-8">
                            <label for="notes">الملاحظات</label>
                            <textarea class="form-control" id="notes" rows="4"></textarea>
                        </div>
                        <div class="form-group col-md-4">
                            <label for="employeePhoto">صورة الموظف</label>
                            <div class="custom-file">
                                <input type="file" class="custom-file-input" id="employeePhoto">
                                <label class="custom-file-label" for="employeePhoto">أسقط الصورة هنا أو اختر صورة من جهازك</label>
                            </div>
                        </div>
                    </div>
                    <div class="form-row">
                        
                    <div class="form-group col-md-4">
                        <label for="email">البريد الإلكتروني</label>
                        <input type="email" class="form-control" id="email">
                    </div>
                    <div class="form-group col-md-4">
                        <label for="employeeType">نوع الموظف</label>
                        <select class="form-control" id="employeeType">
                            <option>مستخدم</option>
                        </select>
                    </div>
                        <div class="form-group col-md-4">
                            <label for="status">الحالة <span class="text-danger">*</span></label>
                            <select class="form-control" id="status">
                                <option>نشط</option>
                            </select>
                        </div>
                     
                
                        
                        <div class="form-group col-md-12 gradient-background d-flex justify-content-start align-items-center">
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="checkbox" id="allowAccess">
                                <label class="form-check-label" for="allowAccess">السماح بالدخول الى النظام</label>
                            </div>
                            <div class="form-check form-check-inline ml-4">
                                <input class="form-check-input" type="checkbox" id="sendData">
                                <label class="form-check-label" for="sendData">ارسال بيانات الدخول الى بريد الموظف</label>
                            </div>
                        </div>
                        
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="language">لغة العرض <span class="text-danger">*</span></label>
                            <select class="form-control" id="language">
                                <option>العربية</option>
                            </select>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="role">الدور الوظيفي <span class="text-danger">*</span></label>
                            <select class="form-control" id="role">
                                <option>إختر الدور الوظيفي</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="branches">الفروع المسموح الدخول بها <span class="text-danger">*</span></label>
                            <select class="form-control" id="branches">
                                <option>إختر الفروع المسموح الدخول بها</option>
                            </select>
                        </div>
                    </div>
                
                </form>
                
                
            </div>
        </div>
        <div class="card">
            <div class="card-header">معلومات شخصية</div>
            <div class="card-body">
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="dob">تاريخ الميلاد <span class="text-danger">*</span></label>
                        <input type="date" class="form-control" id="dob" required>
                    </div>
                    <div class="form-group col-md-6">
                        <label for="type">النوع</label>
                        <select class="form-control" id="type">
                            <option>اختر النوع</option>
                        </select>
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="nationalityStatus">حالة المواطنة</label>
                        <select class="form-control" id="nationalityStatus">
                            <option>من فضلك اختر</option>
                        </select>
                    </div>
                    <div class="form-group col-md-6">
                        <label for="country">البلد <span class="text-danger">*</span></label>
                        <select class="form-control" id="country">
                            <option>المملكة العربية السعودية</option>
                        </select>
                    </div>
                </div>
            </div>
        </div>

        <!-- قسم معلومات تواصل -->
        <div class="card">
            <div class="card-header">معلومات تواصل</div>
            <div class="card-body">
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="phone">رقم الجوال</label>
                        <input type="text" class="form-control" id="phone">
                    </div>
                    <div class="form-group col-md-6">
                        <label for="phone">رقم الهاتف</label>
                        <input type="text" class="form-control" id="phone">
                    </div>
                </div>
                <div class="form-group col-md-6">
                    <label for="personalEmail">البريد الإلكتروني الشخصي</label>
                    <input type="email" class="form-control" id="personalEmail">
                </div>
                
            </div>
        </div>

        <!-- قسم العنوان الحالي -->
        <div class="card" >
            <div class="card-header">العنوان الحالي</div>
            <div class="card-body">
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="address1">عنوان 1</label>
                        <input type="text" class="form-control" id="address1">
                    </div>
                    <div class="form-group col-md-6">
                        <label for="address2">عنوان 2</label>
                        <input type="text" class="form-control" id="address2">
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-4">
                        <label for="city">المدينة</label>
                        <input type="text" class="form-control" id="city">
                    </div>
                    <div class="form-group col-md-4">
                        <label for="region">المنطقة</label>
                        <input type="text" class="form-control" id="region">
                    </div>
                    <div class="form-group col-md-4">
                        <label for="postalCode">الرمز البريدي</label>
                        <input type="text" class="form-control" id="postalCode">
                    </div>
                </div>
            </div>
        </div>
        <div class="card">
            <div class="card-header">العنوان الحالي</div>
            <div class="card-body">
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="address1">عنوان 1</label>
                        <input type="text" class="form-control" id="address1">
                    </div>
                    <div class="form-group col-md-6">
                        <label for="address2">عنوان 2</label>
                        <input type="text" class="form-control" id="address2">
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-4">
                        <label for="city">المدينة</label>
                        <input type="text" class="form-control" id="city">
                    </div>
                    <div class="form-group col-md-4">
                        <label for="region">المنطقة</label>
                        <input type="text" class="form-control" id="region">
                    </div>
                    <div class="form-group col-md-4">
                        <label for="postalCode">الرمز البريدي</label>
                        <input type="text" class="form-control" id="postalCode">
                    </div>
                </div>
            </div>
        </div>

        <!-- قسم معلومات وظيفية -->
        <div class="card">
            <div class="card-header">معلومات وظيفية</div>
            <div class="card-body">
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="jobTitle">المسمى الوظيفي</label>
                        <select class="form-control" id="jobTitle">
                            <option>اختر المسمى الوظيفي</option>
                        </select>
                    </div>
                    <div class="form-group col-md-6">
                        <label for="department">قسم</label>
                        <select class="form-control" id="department">
                            <option>اختر قسم</option>
                        </select>
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="jobLevel">المستوى الوظيفي</label>
                        <select class="form-control" id="jobLevel">
                            <option>اختر المستوى الوظيفي</option>
                        </select>
                    </div>
                    <div class="form-group col-md-6">
                        <label for="jobType">نوع وظيفة</label>
                        <select class="form-control" id="jobType">
                            <option>اختر نوع وظيفة</option>
                        </select>
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="branch">فرع <span class="text-danger">*</span></label>
                        <select class="form-control" id="branch">
                            <option>اختر فرع</option>
                        </select>
                    </div>
                    <div class="form-group col-md-6">
                        <label for="manager">المدير المباشر</label>
                        <select class="form-control" id="manager">
                            <option>اختر موظف</option>
                        </select>
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="joinDate">تاريخ الالتحاق</label>
                        <input type="date" class="form-control" id="joinDate">
                    </div>
                    <div class="form-group col-md-6">
                        <label for="workShift">ورديــة</label>
                        <select class="form-control" id="workShift">
                            <option>اختر وردية</option>
                        </select>
                    </div>
                </div>
                

                
            </div>
        </div>
        <div class="card shadow-lg">
          
       
                <div class="card-header text-center bg-primary text-white">
                    الخيارات المالية
                </div>
                <div class="card-body">
                    <form>
                        <!-- الخيارات المالية -->
                        <div class="form-group col-md-12 gradient-background d-flex justify-content-start align-items-center">
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" id="defaultDate" name="financialDate" checked>
                                <label class="form-check-label" for="defaultDate">استخدام التاريخ المالي الافتراضي</label>
                            </div>
                            <div class="form-check form-check-inline ml-4">
                                <input class="form-check-input" type="radio" id="customDate" name="financialDate">
                                <label class="form-check-label" for="customDate">تاريخ مالي مخصص</label>
                            </div>
                        </div>
    
                        <!-- حقل الشهر واليوم -->
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="month">الشهر</label>
                                <select class="custom-select" id="month" disabled>
                                    <option selected>اختر الشهر</option>
                                    <option value="1">يناير</option>
                                    <option value="2">فبراير</option>
                                    <option value="3">مارس</option>
                                    <!-- استمر بإضافة بقية الأشهر -->
                                </select>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="day">يوم</label>
                                <select class="custom-select" id="day" disabled>
                                    <option selected>اختر اليوم</option>
                                    <option value="1">1</option>
                                    <option value="2">2</option>
                                    <option value="3">3</option>
                                    <!-- استمر بإضافة بقية الأيام -->
                                </select>
                            </div>
                        </div>
    
                        <!-- معلومات الحضور -->
                        <div class="section-header mt-4 mb-3">
                            <h5>معلومات الحضور</h5>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="attendancePolicy">سياسة الإجازات</label>
                                <select class="custom-select" id="attendancePolicy">
                                    <option selected>اختر سياسة الإجازات</option>
                                    <!-- إضافة الخيارات الأخرى -->
                                </select>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="attendanceSettings">معدلات الحضور</label>
                                <select class="custom-select" id="attendanceSettings">
                                    <option selected>اختر قيد الحضور</option>
                                    <!-- إضافة الخيارات الأخرى -->
                                </select>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="attendanceRoster">ورديات الحضور</label>
                                <select class="custom-select" id="attendanceRoster">
                                    <option selected>اختر وردية الحضور</option>
                                    <!-- إضافة الخيارات الأخرى -->
                                </select>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="holidayList">قوائم العطلات</label>
                                <select class="custom-select" id="holidayList">
                                    <option selected>اختر قائمة العطلات</option>
                                    <!-- إضافة الخيارات الأخرى -->
                                </select>
                            </div>
                    
    
                  
                    </form>
                </div>
            </div>
        </div>

        <!-- زر الإرسال -->
        <button type="submit" class="btn btn-primary mt-4">إرسال</button>
    </div>
    </div>
    <script>
        document.getElementById("defaultDate").addEventListener("change", function() {
            if (this.checked) {
                document.getElementById("month").setAttribute("disabled", "disabled");
                document.getElementById("day").setAttribute("disabled", "disabled");
            }
        });

        document.getElementById("customDate").addEventListener("change", function() {
            if (this.checked) {
                document.getElementById("month").removeAttribute("disabled");
                document.getElementById("day").removeAttribute("disabled");
            }
        });
    </script>
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.bundle.min.js"></script>
</body>
</html>
