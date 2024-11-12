
<div class="container" dir="rtl">

    <div class="box">
        <div class="filter-box">
            <h2>ملخص العقود</h2>
            <select>
                <option>آخر 30 يوم</option>
            </select>
            <select>
                <option>24/10/2024 - 25/09/2024</option>
            </select>
        </div>
        <div class="contract-summary">
            <div class="contract-summary-box">
                <p>إجمالي العقود</p>
                <p>0</p>
                <button class="btn-add">إضافة عقد جديد</button>
            </div>
        </div>
    </div>

    <!-- العقود التي ستنتهي صلاحيتها -->
    <div class="box">
        <h2>العقود التي ستنتهي صلاحيتها</h2>
        <div class="contract-summary">
            <div class="contract-summary-box">
                <p>لا توجد عقود ستنتهي قريباً</p>
                <button class="btn-add">إضافة عقد</button>
            </div>
        </div>
    </div>

    <!-- ملخص الرواتب -->
    <div class="box">
        <div class="filter-box">
            <h2>ملخص الرواتب</h2>
            <select>
                <option>SAR</option>
            </select>
            <select>
                <option>آخر 30 يوم</option>
            </select>
            <select>
                <option>24/10/2024 - 25/09/2024</option>
            </select>
        </div>
        <div class="salary-summary">
            <div class="salary-summary-box">
                <p>إجمالي الأجر المدفوع</p>
                <p>0</p>
            </div>
            <div class="salary-summary-box">
                <p>إجمالي صافي الأجر</p>
                <p>0</p>
            </div>
            <div class="salary-summary-box">
                <p>إجمالي الخصومات</p>
                <p>0</p>
            </div>
            <div class="salary-summary-box">
                <p>أقسام الرواتب</p>
                <p>0</p>
                <a href="#" class="link">إنشاء مصدر رواتب جديدة</a>
            </div>
        </div>
    </div>

    <!-- ملخص الحضور -->
    <div class="box">
        <div class="filter-box">
            <h2>ملخص الحضور</h2>
            <select>
                <option>آخر 30 يوم</option>
            </select>
            <select>
                <option>24/10/2024 - 25/09/2024</option>
            </select>
        </div>
        <div class="attendance-summary">
            <div class="circle circle-1">
                0
                <span>حاضر</span>
            </div>
            <div class="circle circle-2">
                0
                <span>غائب</span>
            </div>
            <div class="circle circle-3">
                0
                <span>إجازة</span>
            </div>
            <div class="circle circle-4">
                0
                <span>عطلة</span>
            </div>
        </div>
        <p>0 ساعات عمل من 0 بسبب الحضور</p>
    </div>

    <!-- ملخص قواعد الحضور -->
    <div class="box">
        <div class="filter-box">
            <h2>ملخص قواعد الحضور</h2>
            <select>
                <option>آخر 30 يوم</option>
            </select>
            <select>
                <option>24/10/2024 - 25/09/2024</option>
            </select>
        </div>
        <div class="rules-summary">
            <div>
                <p>إجمالي التأخير</p>
                <p>0 دقائق</p>
                <p>0 أيام</p>
            </div>
            <div>
                <p>إجمالي الانصراف المبكر</p>
                <p>0 دقائق</p>
                <p>0 أيام</p>
            </div>
        </div>
    </div>

    <!-- الطلبات المعلقة -->
    <div class="box">
        <h2>الطلبات المعلقة</h2>
        <div class="pending-requests">
            <p>لا توجد طلبات معلقة حالياً</p>
        </div>
    </div>
</div>
<script src="{{ asset('assets/js/vendor.min.js') }}"></script>
<script src="{{ asset('assets/js/app.min.js') }}"></script>

<!-- third party js -->
<script src="{{ asset('assets/js/vendor/chart.min.js') }}"></script>
<!-- third party js ends -->

<!-- demo app -->
<script src="{{ asset('assets/js/pages/demo.dashboard-projects.js') }}"></script>
