<p>تم تضمين الملف بنجاح</p>

 
        <div class="d-flex justify-content-between align-items-center mb-4">
            <button class="btn btn-gradient" onclick="window.location.href='add_customer.html'">+ أضف العميل</button>
            <div class="header-actions">
                <button class="btn btn-outline-secondary"><i class="fas fa-upload"></i></button>
                <button class="btn btn-outline-secondary"><i class="fas fa-cog"></i></button>
            </div>
        </div>

        <!-- شريط الأدوات العلوي -->
        <div class="toolbar">
            <h5>بحث وتصفيه</h5>
            <div class="toolbar-actions">
                <span class="action" id="toggleVisibilityButton" onclick="toggleVisibility()"><i class="fas fa-eye-slash"></i> إخفاء</span>
                <span class="action" id="toggleButton" onclick="toggleForm()">متقدم</span>
                <i class="fas fa-sliders-h action"></i>
            </div>
        </div>

        <!-- نموذج البحث والتصفية -->
        <form class="table-card mb-4" id="fieldSection">
            <div class="d-flex flex-wrap justify-content-between align-items-center mb-4">
                <div class="col-md-3 p-0">
                    <label>إختر التصنيف</label>
                    <select class="form-control">
                        <option>إختر التصنيف</option>
                    </select>
                </div>
                <div class="col-md-3 p-0">
                    <label>إختر الحالة</label>
                    <select class="form-control">
                        <option>إختر الحالة</option>
                    </select>
                </div>
                <div class="col-md-3 p-0">
                    <label>الاسم</label>
                    <input type="text" class="form-control" placeholder="الاسم">
                </div>
                <div class="col-md-3 p-0">
                    <label>إختر العميل</label>
                    <select class="form-control">
                        <option>إختر العميل</option>
                    </select>
                </div>
            </div>

            <!-- قسم الحقول المتقدمة -->
            <div id="advancedFields" class="hidden">
                <div class="row">
                    <div class="col-md-3 mt-3">
                        <label>إختر البلد</label>
                        <select class="form-control">
                            <option>إختر البلد</option>
                        </select>
                    </div>
                    <div class="col-md-3 mt-3">
                        <label>العنوان</label>
                        <input type="text" class="form-control" placeholder="العنوان">
                    </div>
                    <div class="col-md-3 mt-3">
                        <label>تاريخ الإنشاء (من)</label>
                        <input type="date" class="form-control" id="deliveryStartDate">
                    </div>
                    <div class="col-md-3 mt-3">
                        <label>تاريخ الإنشاء (إلى)</label>
                        <input type="date" class="form-control" id="deliveryStartDate">
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-3 mt-3">
                        <label>اختر الموظفين المعينين</label>
                        <select class="form-control">
                            <option>اختر الموظفين</option>
                        </select>
                    </div>
                    <div class="col-md-3 mt-3">
                        <label>اختر الموظفين المعينين</label>
                        <select class="form-control">
                            <option>اختر الموظفين</option>
                        </select>
                    </div>
                    <div class="col-md-3 mt-3">
                        <label>إختر أضيفت بواسطة</label>
                        <select class="form-control">
                            <option>إختر أضيفت بواسطة</option>
                        </select>
                    </div>
                    <div class="col-md-3 mt-3">
                        <label>إختر وسم</label>
                        <select class="form-control">
                            <option>إختر وسم</option>
                        </select>
                    </div>
                </div>
            </div>

            <!-- زر البحث -->
            <div class="col-md-3 mt-3 d-flex align-items-end">
                <button type="submit" class="btn btn-gradient w-100">بحث</button>
            </div>
        </form>

        <!-- قسم الجدول -->
               <!-- قسم الجدول -->
               <div class="table-responsive table-card">
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th>الإجراء</th>
                        <th>ترتيب</th>
                        <th>الحالة</th>
                        <th>العنوان</th>
                        <th>البريد الإلكتروني</th>
                    </tr>
                </thead>
                <tbody>
    @foreach($clients as $client)
        <tr>
            <td style="position: relative;">
                <div class="dropdown">
                    <button class="btn btn-sm btn-outline-primary" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                        <i class="fas fa-ellipsis-v"></i>
                    </button>
                    <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                        <li><a class="dropdown-item" href="#"><i class="fas fa-eye"></i> عرض</a></li>
                        <li><a class="dropdown-item" href="#"><i class="fas fa-pencil-alt"></i> تعديل</a></li>
                        <li><a class="dropdown-item" href="#"><i class="fas fa-copy"></i> نسخ</a></li>
                        <li><a class="dropdown-item" href="#"><i class="fas fa-trash"></i> حذف</a></li>
                        <li><a class="dropdown-item" href="#"><i class="fas fa-sign-in-alt"></i> الدخول به</a></li>
                        <li><a class="dropdown-item" href="#"><i class="fas fa-calculator"></i> كشف حساب</a></li>
                    </ul>
                </div>
            </td>
            <td>#{{ $client->id }}</td>
            <td>
                <span class="badge badge-status {{ $client->status == 'active' ? 'status-active' : 'status-inactive' }}">
                    {{ $client->status == 'active' ? 'نشط' : 'موقوف' }}
                </span>
            </td>
            <td>{{ $client->trade_name }}</td>
            <td>{{ $client->email }}</td>
        </tr>
    @endforeach
</tbody>

            </table>
        </div>

    </div>


