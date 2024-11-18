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

        <div class="card shadow-lg">
            <div class="gradient-bg">
                <h3>معلومات عامة</h3>
            </div>
            <div class="card-body">
                @if($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

                <form action="{{ route('employees.store') }}" method="POST" enctype="multipart/form-data" class="needs-validation p-4 rounded shadow-lg bg-white" style="max-width: 900px; margin: auto;">
                    @csrf
                    <h3 class="text-center mb-4 text-primary">معلومات الموظف</h3>

                    <!-- الاسم الأول والاسم الأوسط واللقب -->
                    <div class="form-row">
                        <div class="form-group col-md-4">
                            <label for="first_name">الاسم الأول <span class="text-danger">*</span></label>
                            <input type="text" name="first_name" class="form-control" id="first_name" placeholder="أدخل الاسم الأول" required>
                        </div>
                        <div class="form-group col-md-4">
                            <label for="middle_name">الاسم الأوسط</label>
                            <input type="text" name="middle_name" class="form-control" id="middle_name" placeholder="أدخل الاسم الأوسط">
                        </div>
                        <div class="form-group col-md-4">
                            <label for="last_name">اللقب</label>
                            <input type="text" name="last_name" class="form-control" id="last_name" placeholder="أدخل اللقب">
                        </div>
                    </div>

                    <!-- رقم الهوية والجنسية والجنس -->
                    <div class="form-row">
                        <div class="form-group col-md-4">
                            <label for="id_number">رقم الهوية</label>
                            <input type="text" name="id_number" class="form-control" id="id_number" placeholder="أدخل رقم الهوية">
                        </div>
                        <div class="form-group col-md-4">
                            <label for="nationality">الجنسية</label>
                            <input type="text" name="nationality" class="form-control" id="nationality" placeholder="أدخل الجنسية">
                        </div>
                        <div class="form-group col-md-4">
                            <label for="gender">الجنس</label>
                            <select name="gender" class="form-control" id="gender">
                                <option selected disabled>اختر الجنس</option>
                                <option value="Male">ذكر</option>
                                <option value="Female">أنثى</option>
                            </select>
                        </div>
                    </div>

                    <!-- تاريخ التعيين والراتب -->
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="hire_date">تاريخ التعيين <span class="text-danger">*</span></label>
                            <input type="date" name="hire_date" class="form-control" id="hire_date" required>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="salary">الراتب</label>
                            <input type="number" name="salary" step="0.01" class="form-control" id="salary" placeholder="أدخل الراتب">
                        </div>
                    </div>

                    <!-- البريد الإلكتروني ورقم الهاتف -->
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="email">البريد الإلكتروني</label>
                            <input type="email" name="email" class="form-control" id="email" placeholder="example@email.com">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="phone">رقم الهاتف</label>
                            <input type="text" name="phone" class="form-control" id="phone" placeholder="أدخل رقم الهاتف">
                        </div>
                    </div>

                    <!-- العنوان والملاحظات -->
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="address">العنوان</label>
                            <input type="text" name="address" class="form-control" id="address" placeholder="أدخل العنوان">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="notes">الملاحظات</label>
                            <textarea name="notes" class="form-control" id="notes" rows="4" placeholder="أدخل ملاحظات"></textarea>
                        </div>
                    </div>

                    <!-- صورة الموظف -->
                    <div class="form-group">
                        <label for="employee_photo">صورة الموظف</label>
                        <div class="custom-file">
                            <input type="file" name="employee_photo" class="custom-file-input" id="employee_photo">
                            <label class="custom-file-label" for="employee_photo">اختر صورة الموظف</label>
                        </div>
                    </div>

                    <!-- الحالة ونوع الموظف -->
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="status">الحالة <span class="text-danger">*</span></label>
                            <select name="status" class="form-control" id="status" required>
                                <option selected disabled>اختر الحالة</option>
                                <option value="Active">نشط</option>
                                <option value="Inactive">غير نشط</option>
                            </select>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="employee_type">نوع الموظف</label>
                            <input type="text" name="employee_type" class="form-control" id="employee_type" placeholder="أدخل نوع الموظف">
                        </div>
                    </div>

                    <!-- الإعدادات -->
                    <div class="form-row align-items-center">
                        <div class="form-check form-check-inline">
                            <input name="allow_access" class="form-check-input" type="checkbox" id="allow_access">
                            <label class="form-check-label" for="allow_access">السماح بالدخول الى النظام</label>
                        </div>
                        <div class="form-check form-check-inline ml-4">
                            <input name="send_data" class="form-check-input" type="checkbox" id="send_data">
                            <label class="form-check-label" for="send_data">إرسال بيانات الدخول عبر البريد الإلكتروني</label>
                        </div>
                    </div>

                    <!-- زر الإرسال -->
                    <button type="submit" class="btn btn-primary btn-block mt-4">حفظ البيانات</button>
                </form>

                <div id="response-message" class="alert mt-3 d-none"></div>


            </div>
        </div>
        <div class="card shadow-lg rounded mt-4">
            <div class="card-header bg-primary text-white font-weight-bold">
                معلومات شخصية
            </div>
            <div class="card-body">
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="dob">تاريخ الميلاد <span class="text-danger">*</span></label>
                        <input type="date" class="form-control" id="dob" required>
                    </div>
                    <div class="form-group col-md-6">
                        <label for="type">النوع</label>
                        <select class="form-control" id="type">
                            <option selected disabled>اختر النوع</option>
                            <option>ذكر</option>
                            <option>أنثى</option>
                        </select>
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="nationalityStatus">حالة المواطنة</label>
                        <select class="form-control" id="nationalityStatus">
                            <option selected disabled>من فضلك اختر</option>
                            <option>مواطن</option>
                            <option>مقيم</option>
                            <option>زائر</option>
                        </select>
                    </div>
                    <div class="form-group col-md-6">
                        <label for="country">البلد <span class="text-danger">*</span></label>
                        <select class="form-control" id="country">
                            <option>المملكة العربية السعودية</option>
                            <option>الإمارات العربية المتحدة</option>
                            <option>مصر</option>
                            <option>الأردن</option>
                        </select>
                    </div>
                </div>
                <button type="submit" class="btn btn-primary btn-block mt-3">حفظ البيانات</button>
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

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function () {
        $('#employee-form').on('submit', function (e) {
            e.preventDefault(); // منع إعادة تحميل الصفحة
            let formData = $(this).serialize(); // جمع البيانات من النموذج

            $.ajax({
                url: "{{ route('employees.store') }}", // رابط دالة الإضافة
                type: "POST",
                data: formData,
                success: function (response) {
                    // عرض رسالة النجاح
                    $('#response-message')
                        .removeClass('d-none alert-danger')
                        .addClass('alert-success')
                        .text(response.message);

                    // إعادة تعيين النموذج
                    $('#employee-form')[0].reset();
                },
                error: function () {
                    // عرض رسالة الخطأ
                    $('#response-message')
                        .removeClass('d-none alert-success')
                        .addClass('alert-danger')
                        .text('حدث خطأ أثناء الإضافة. حاول مرة أخرى.');
                }
            });
        });
    });
</script>
</body>
</html>
