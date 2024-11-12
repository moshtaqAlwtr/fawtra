<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>برنامج محاسبي</title>
    <link rel="icon" href="k.jpg">
  
     <link rel="stylesheet" href="Design/css/bootstrap.rtl.css" />
        <link rel="stylesheet" href="Design/css/select2.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="stylesheet" href="Design/css/datetimepicker.css" /><link rel="stylesheet" href="Design/css/datetimepicker.css" />
    <link rel="stylesheet" href="Design/css/style.rtl.css" />



    <link rel="shortcut icon" href="css/images/Daftra-favicon.ico" type="image/x-icon" />
    <link rel="stylesheet" type="text/css" href="css/oifonts.css?v=10" />
    <link rel="stylesheet" type="text/css" href="css/fonts/ff/flaticon-test.css?v=10" />
    <link rel="stylesheet" type="text/css" href="css/flaticon.css?v=10" />
    <link rel="stylesheet" type="text/css" href="css/nav-ico/simple-line-icons.css?v=9" />
    <link rel="stylesheet" type="text/css" href="css/jquery.tooltip.css?v=130" />
    <link rel="stylesheet" type="text/css" href="css/jqueryui.css?v=813" />
    <link rel="stylesheet" type="text/css" href="css/app_rtl_v813.css" />
    <link rel="stylesheet" type="text/css" href="css/common_v813.css" />
    <link rel="stylesheet" type="text/css" href="css/fonts_v813.css" />
    <link rel="stylesheet" type="text/css" href="css/dashboard.css?v=13" />
    <link rel="stylesheet" type="text/css" href="css/pages.css?v=14" />
    <link rel="stylesheet" type="text/css" href="css/listing.css?v=13" />
    <link rel="stylesheet" type="text/css" href="css/payment.css?v=16" />
    <link rel="stylesheet" type="text/css" href="css/import.css?v=13" />
    <link rel="stylesheet" type="text/css" href="css/messages.css?v=14" />
    <link rel="stylesheet" type="text/css" href="css/pos-app.css?v=1" />
    <link rel="stylesheet" type="text/css" href="css/beta.css?v=2" />
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/MaterialDesign-Webfont/4.8.95/css/materialdesignicons.min.css" />
    <link rel="stylesheet" type="text/css" href="css/buttons.css?v=13" />
    <link rel="stylesheet" type="text/css" href="css/breadcrumb_new.css?v=1" />
    <link rel="stylesheet" href="css/app-manager-dropdown.css" />
    <link rel="stylesheet" type="text/css" href="css/cal-css/jquery.calendars.picker.css?v=1" />
    <link rel="stylesheet" href="https://cdn.daftra.com/assets/s2020/css/layout/app.min.css?v=813" />
    <link rel="stylesheet" href="https://cdn.daftra.com/assets/s2020/css/layout/dark.min.css?v=813" />
    <link rel="stylesheet" type="text/css" href="css/breadcrumb_new_ar_v1.css" />
    <link rel="stylesheet" type="text/css" href="css/delete_message_v1.css" />
    <link href="https://fonts.googleapis.com/css?family=Amiri|Cairo:600|Roboto&amp;subset=arabic" rel="stylesheet">
    <link id="help-css" rel="stylesheet" type="text/css" href="dist/app/js/pages/help/help.styles.css" media="all">
    
    <style>


    .body {
    font-family: 'Tahoma', sans-serif;
    margin: 0;
    padding: 0;
    background-color: #f4f6f9;
    display: flex;
    flex-direction: row-reverse; /* القائمة على اليمين */
    height: 100vh; /* لإعطاء الجسم كامل ارتفاع الشاشة */
    overflow: hidden; /* لإخفاء أي تمرير خارج النوافذ */
}

/* الشريط العلوي */
.header {
    background-color: #3498db; /* نفس اللون المستخدم في القائمة الجانبية */
    color: #fff;
    padding: 15px;
    text-align: center;
    font-size: 24px;
    font-weight: bold;
    position: fixed;
    width: 100%;
    top: 0;
    z-index: 1000;
    display: flex;
    align-items: center;
    justify-content: space-between;
    border-bottom: 2px solid black; /* إضافة خط سفلي ليكون أكثر تميزاً */
}

/* زر تصغير/تكبير القائمة */
.toggle-sidebar-btn {
    background-color: black; /* نفس اللون المستخدم في الشريط */
    color: #fff;
    border: none;
    padding: 10px;
    font-size: 18px;
    cursor: pointer;
    margin-right: 10px;
    border-radius: 5px; /* جعل الأزرار مميزة */
}

.sidebar.collapsed {
    z-index: 9999;
    overflow: visible;
    width: 80px; /* عرض القائمة عندما تكون مغلقة */

    
}
.sidebar.collapsed ul li {
    position: relative;
}

.sidebar.collapsed ul li:hover a{
    background-color: black;
    width: 270px;
    position: relative;
}
.sidebar.collapsed ul li:hover ul li a {
    background-color: black;
    position: relative;
    width: 200px;
    display: block;
    margin-right: 50px;
}
.sidebar.collapsed ul li:hover ul {
    background-color: unset;
    position: absolute;
    display: block;
    margin-right: 20px;
}
.sidebar.collapsed ul li a:hover > .text, .sidebar.collapsed ul li:hover > ul li a .text {
    position: absolute;
    z-index: 10000;
    text-wrap: nowrap;
    width: 100%;
    top: 15px;
    right: 70px;
    display: block;
}
/* القائمة الجانبية */
.sidebar {
    width: 250px;
    background-color: #343a40; /* الحفاظ على نفس اللون */
    height: calc(100vh - 50px); /* تأخذ طول الشاشة بالكامل */
    position: fixed;
    right: 0;
    top: 50px; /* أسفل الشريط العلوي */
    overflow-y: auto; /* تمكين التمرير العمودي */
    color: #fff;
    border-left: 1px solid #444; /* الحفاظ على نفس الحدود */
    box-shadow: -2px 0 5px rgba(0, 0, 0, 0.2); /* إضافة ظل للقائمة الجانبية */
}

.sidebar.collapsed {
    width: 80px; /* عرض القائمة عندما تكون مغلقة */
}

.sidebar ul {
    list-style-type: none;
    padding: 0;
    margin: 0;
}

.sidebar li {
    border-bottom: 1px solid #444;
}

.sidebar li > a {
    display: block;
    padding: 15px 20px;
    color: #fff;
    text-decoration: none;
    font-weight: bold;
    transition: background-color 0.3s ease;
}

.sidebar li > a:hover {
    background-color: #495057;
}

.sidebar ul ul {
    display: none;
    padding-left: 15px;
    background-color: #3c3f44;
    transition: max-height 0.3s ease;
}

.sidebar ul li.active > ul {
    display: block;
    max-height: 500px;
    overflow: hidden;
}

.sidebar ul li a i {
    margin-right: 10px;
}

/* عند غلق القائمة، إخفاء النص */
.sidebar.collapsed ul li a .text {
    display: none;
}

.sidebar ul li a .icon {
    margin-right: 0;
}

/* محتوى الصفحة */
.content {
    margin-right: 260px;
    padding: 20px;
    margin-top: 70px;
    overflow-y: auto;
    width: calc(100% - 260px);
    height: calc(100vh - 70px); /* لتملأ الشاشة بالكامل مع إمكانية التمرير */
    transition: margin-right 0.3s, width 0.3s;
}

/* عند غلق القائمة، تعديل عرض المحتوى */
.content.collapsed {
    margin-right: 90px;
    width: calc(100% - 90px);
}

.content h1 {
    font-size: 22px;
    margin-bottom: 20px;
}

/* أزرار */
button {
    padding: 10px 20px;
    background-color: #007bff;
    color: #fff;
    border: none;
    border-radius: 5px;
    cursor: pointer;
    font-size: 14px;
    margin: 10px 0;
    transition: background-color 0.3s ease;
}

button:hover {
    background-color: #3498db;
}

/* تحسين العرض التفاعلي للقوائم على الشاشات الصغيرة */
@media (max-width: 768px) {
    .sidebar {
        width: 100px;
    }

    .content {
        margin-right: 110px;
        width: calc(100% - 110px);
    }

    .sidebar li > a {
        font-size: 12px;
        padding: 10px;
    }
}

/* الشبكة للمحتوى الداخلي */
.dashboard-grid {
    display: grid;
    grid-template-columns: repeat(4, 1fr);
    gap: 20px;
}

.card {
    padding: 20px;
    color: white;
    border-radius: 8px;
    text-align: center;
    height: 150px;
    display: flex;
    justify-content: center;
    align-items: center;
    font-size: 16px;
}

/* الألوان المستخدمة */
.card-red { background-color: #e74c3c; }
.card-purple { background-color: aqua; }
.card-blue { background-color: #3498db; }
.card-green { background-color: #2ecc71; }
.card-yellow { background-color: #f39c12; }
.card-gray { background-color: #7f8c8d; }
.card-light-blue { background-color: #16a085; }

.table-card {
    background-color: white;
    padding: 20px;
    border-radius: 8px;
    box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
    margin-top: 20px;
}

.table-card table {
    width: 100%;
    border-collapse: collapse;
    margin-top: 10px;
}

.table-card table th, .table-card table td {
    padding: 10px;
    text-align: center;
    border-bottom: 1px solid #ddd;
}

.table-card table th {
    background-color: #f4f6f9;
}

.btn {
    background-color: #7f8c8d;
    color: white;
    padding: 10px 20px;
    border: none;
    border-radius: 4px;
    cursor: pointer;
}

.latest-updates, .chat {
    margin-top: 20px;
}

/* إضافة تأثيرات عند التمرير على الشريط العلوي */
.header:hover {
    background-color: cadetblue; /* لون عند التمرير */
    transition: background-color 0.3s ease;
}

/* تباعد بين عناصر شريط التنقل */
.navbar-custom-menu .nav > li {
    margin-right: 20px; /* إضافة مسافة بين العناصر */
}

.navbar-custom-menu .nav > li:last-child {
    margin-right: 25; /* إزالة المسافة بعد العنصر الأخير */

}
.submenu {
    display: none; /* إخفاء القائمة الفرعية بشكل افتراضي */
    position: absolute; /* لجعلها فوق العناصر */
    background-color: #343a40; /* لون الخلفية */
    border-radius: 5px; /* زوايا مدورة */
    padding: 10px; /* إضافة حشو */
    z-index: 1000; /* تأكد من أن القائمة فوق العناصر الأخرى */
}
</style>

    <script>
        isLocalStorageSupported = function() {
            var testKey = 'test',
                storage = window.sessionStorage;
            try {
                storage.setItem(testKey, '1');
                storage.removeItem(testKey);
                return true;
            } catch (error) {
                return false;
            }
        };

        if (isLocalStorageSupported() && localStorage.getItem('dark')) {
            document.documentElement.classList.add('dark-active');
        } else {
            document.documentElement.classList.remove('dark-active');
        }

        var IS_APP = false;
        var IS_SAFARI = false;
    </script>
    <link rel="stylesheet" type="text/css" href="css/rtl-fix.css" />
    <!-- <link rel="stylesheet" type="text/css" href="/css/rtl-breadcrumb.css" /> !-->

    <link rel="stylesheet" type="text/css" href="css/screen-sidenav_v813.css?v=27" />
    <link rel="stylesheet" type="text/css" href="css/all-screen-responsive-ar.css?v=1" />
    <script>
        var __jsDateFormat = 'dd/mm/yy';
        var __countryCode = 'SA';
        var __currencyCode = 'SAR';
    </script>

</head>

<body>
 <?php include 'navbar.php'; ?> 

    <!-- القائمة الجانبية مع تمرير عمودي -->
    <div class="sidebar" id="sidebar">
        <ul>
            <li>
                <a href="javascript:void(0);" class="icon" onmouseover="showSubmenu(event)" onmouseout="hideSubmenu(event)">
                    <i class="fas fa-tachometer-alt icon"></i><span class="text">لوحة التحكم</span></a>
                <ul>   
                    <li><a href="http://localhost/my/1-control_panel/main_overview.html" class="" onclick="subSideMenuClick(event)">المبيعات</a>
                    </li>
                    <li><a href="http://localhost/my/1-control_panel/hr-dashboard.html"onclick="subSideMenuClick(event)">
                        الموارد البشرية
                    </a></li>
                </ul>
            </li>
            <li>
                <a href="javascript:void(0);" onclick="toggleMenu(event)"><i class="fas fa-shopping-cart icon"></i><span class="text">المبيعات</span></a>
                <ul>
                    <li> <a href="http://localhost/my/2-purchase_admin/invoice-management.html" 
                        class="" 
                        onclick="subSideMenuClick(event)"> 
                         إدارة الفواتير 
                     </a></li>
                    <li> <a href="http://localhost/my/2-purchase_admin/sales%20invoice.html" 
                                   class="" onclick="subSideMenuClick(event)"> 
                                   إنشاء فاتورة 
                                </a> </li>
                                <li data-app-sidebar-list-item-sublist-item-group-id="1">
                                    <a href="http://localhost/my/2-purchase_admin/quotation-management.html" 
                                    class="fas fa-tags"onclick="subSideMenuClick(event)"> 
                                        إدارة عروض الأسعار
                                    </a>
                                </li>
                                 <li><a href="http://localhost/my/2-purchase_admin/quotation.html"
                                    class="fas fa-plus-circle"onclick="subSideMenuClick(event)"> 
                                   إنشاء عرض سعر
                                  </a> </li>

                                 <li>  <a href="http://localhost/my/2-purchase_admin/debit-notices.html" 
                                    class="fas fa-tags"onclick="subSideMenuClick(event)"> 

                                </i> أشعارات دائنة  </a> </li>
                                <li>   <a href="http://localhost/my/2-purchase_admin/returned_invoices.html"
                                    class="fas fa-plus-circle"
                                    onclick="subSideMenuClick(event)">
                                    الفواتير المرتجعة
                                 </a> </li>
 
                                <li>   <a href="http://localhost/my/2-purchase_admin/recurring-invoices.html" 
                                    onclick="subSideMenuClick(event)">
                                    <i class="fas fa-tags"></i> الفواتير الدورية
                                 </a> </li>
 
                                <li>  <a href="http://localhost/my/2-purchase_admin/customer_payments.html" 
                                    class="fas fa-tags"onclick="subSideMenuClick(event)"> 

                                </i> مدفوعات العملاء  </a> </li>
                                <li>  <a href="http://localhost/my/2-purchase_admin/sales-settings.html" 
                                    class="fas fa-tags"onclick="subSideMenuClick(event)"> 

                                </i> اعدادات المبيعات </a> </li>
 
 
                </ul>
            </li> 
            <li>
                
                <a href="javascript:void(0);" onclick="toggleMenu(event)"><i class="fas fa-cash-register icon"></i><span class="text">نقاط البيع</span></a>
                <ul>
                    <li><a href="http://localhost/my/3-pos_system/start-sale.html"
                        class=""
                         onclick="subSideMenuClick(event)">  بدء البيع </a></li>
                    <li><a href="http://localhost/my/3-pos_system/sessions.html"
                        class=""
                         onclick="subSideMenuClick(event)"> الجلسات </a></li>
                    <li>      <a href="http://localhost/my/3-pos_system/pos-report.html"
                        class=""
                         onclick="subSideMenuClick(event)"> 
                          تقرير نقاط البيع 
                      </a></li>
                    <li>    <a href="http://localhost/my/3-pos_system/pos-settings.html"
                        class="" 
                        onclick="subSideMenuClick(event)">
                         إعدادات نقاط البيع 
                       </a></li>
                </ul>
            </li>
            <li>
                <a href="javascript:void(0);" onclick="toggleMenu(event)"><i class="fas fa-store icon"></i><span class="text">المتجر الإلكتروني</span></a>
                <ul>
                    <li><a href="http://localhost/my/4-webshop/content-pages.html"><i class="fas fa-tools icon"></i><span class="text">إدارة المحتوى</span></a></li>
                    <li><a href="http://localhost/my/4-webshop/store-settings.html"><i class="fas fa-wrench icon"></i><span class="text">الإعدادات</span></a></li>
                </ul>
            </li>
            <li>
                <a href="javascript:void(0);" onclick="toggleMenu(event)"><i class="fas fa-calendar-alt icon"></i><span class="text">الحجوزات</span></a>
                <ul>
                    <li><a href="http://localhost/my/5-booking_system/reservation-management.html"><i class="fas fa-calendar-check icon"></i><span class="text">إدارة الحجوزات</span></a></li>
                    <li><a href="http://localhost/my/5-booking_system/add-reservation.html"><i class="fas fa-plus-square icon"></i><span class="text">أضف حجز</span></a></li>
                    <li><a href="http://localhost/my/5-booking_system/reservation-settings.html"><i class="fas fa-sliders-h icon"></i><span class="text">إعدادات الحجز</span></a></li>
                </ul>
            </li>
            <li>
                <a href="javascript:void(0);" onclick="toggleMenu(event)"><i class="fas fa-coins icon"></i><span class="text">إدارة الأقساط</span></a>
                <ul>
                    <li><a href="http://localhost/my/6-payment_plans/installment-agreements.html"><i class="fas fa-hand-holding-usd icon"></i><span class="text">اتفاقيات التقسيط</span></a></li>
                    <li><a href="http://localhost/my/6-payment_plans/installments.html"><i class="fas fa-coins icon"></i><span class="text">الأقساط</span></a></li>
                    <li><a href="#"><i class="fas fa-exclamation-circle icon"></i><span class="text">المتأخرات</span></a></li>
                </ul>
            </li>
            <li>
                <a href="javascript:void(0);" onclick="toggleMenu(event)"><i class="fas fa-bullseye icon"></i><span class="text">المبيعات المستهدفة والعمولات</span></a>
                <ul>
                    <li><a href="http://localhost/my/7-target_sales/commission-rules.html"><i class="fas fa-percentage icon"></i><span class="text">قواعد العمولة</span></a></li>
                    <li><a href="http://localhost/my/7-target_sales/sales-commissions.html"><i class="fas fa-percentage icon"></i><span class="text">عمولات المبيعات</span></a></li>
                    <li><a href="http://localhost/my/7-target_sales/sales-periods.html"><i class="fas fa-clock icon"></i><span class="text">فترات المبيعات</span></a></li>
                </ul>
            </li>
            <li>
                <a href="javascript:void(0);" onclick="toggleMenu(event)"><i class="fas fa-users icon"></i><span class="text">العملاء</span></a>
                <ul>
                    <li><a href="http://localhost/my/9-sales_management/customer-management.html"><i class="fas fa-users-cog icon"></i><span class="text">إدارة العملاء</span></a></li>
                    <li><a href="http://localhost/my/9-sales_management/add_customer.html"><i class="fas fa-plus-circle icon"></i><span class="text">أضف عميل جديد</span></a></li>
                    <li><a href="http://localhost/my/9-sales_management/schedule_appointment.html"><i class="fas fa-plus-circle icon"></i><span class="text">المواعيد</span></a></li>
                    <li><a href="http://localhost/my/9-sales_management/customer-contacts.html"><i class="fas fa-address-book icon"></i><span class="text">قائمة الاتصال</span></a></li>
                    <li><a href="http://localhost/my/9-sales_management/crm-management.html"><i class="fas fa-handshake icon"></i><span class="text">إدارة علاقات العملاء</span></a></li>
                    <li><a href="http://localhost/my/9-sales_management/settings-clients.html"><i class="fas fa-plus-circle icon"></i><span class="text">إعدادات العميل</span></a></li>
                </ul>
            </li>
            <li>
                <a href="javascript:void(0);" onclick="toggleMenu(event)"><i class="fas fa-money-bill-wave icon"></i><span class="text">النقاط والأرصدة</span></a>
                <ul>
                    <li><a href="http://localhost/my/10-Loyalty_and_Balances/manage-credit-recharge.html"><i class="fas fa-money-check icon"></i><span class="text">إدارة شحن الأرصدة</span></a></li>
                    <li><a href="http://localhost/my/10-Loyalty_and_Balances/manage-credit-consumption.html"><i class="fas fa-hand-holding-usd icon"></i><span class="text">إدارة استهلاك الأرصدة</span></a></li>
                    <li><a href="http://localhost/my/10-Loyalty_and_Balances/manage_packages.html"><i class="fas fa-box icon"></i><span class="text">إدارة الباقات</span></a></li>
                    <li><a href="http://localhost/my/10-Loyalty_and_Balances/credit_type_settings.htm"><i class="fas fa-cogs icon"></i><span class="text">الإعدادات</span></a></li>
                </ul>
            </li>
            <li>
                <a href="javascript:void(0);" onclick="toggleMenu(event)"><i class="fas fa-user-shield icon"></i><span class="text">وكلاء التأمين</span></a>
                <ul>
                    <li><a href="http://localhost/my/11-insurance_management/insurance_agents.html"><i class="fas fa-user-shield icon"></i><span class="text">إدارة وكلاء التأمين</span></a></li>
                    <li><a href="http://localhost/my/11-insurance_management/add_insurance_agent.html"><i class="fas fa-plus-circle icon"></i><span class="text">أضف شركة تأمين</span></a></li>
                </ul>
            </li>
            <li>
                <a href="javascript:void(0);" onclick="toggleMenu(event)"><i class="fas fa-boxes icon"></i><span class="text">المخزون</span></a>
                <ul>
                    <li><a href="http://localhost/my/12-stock_control/products.htm"><i class="fas fa-plus-circle icon"></i><span class="text">إدارة المنتجات</span></a></li>
                    <li><a href="http://localhost/my/12-stock_control/store_permissions.html"><i class="fas fa-clipboard-list icon"></i><span class="text">إدارة الأذونات المخزنية</span></a></li>
                    <li><a href="http://localhost/my/12-stock_control/product_tracking.html"><i class="fas fa-barcode icon"></i><span class="text">تتبع المنتجات</span></a></li>
                    <li><a href="http://localhost/my/12-stock_control/price_lists.html"><i class="fas fa-list icon"></i><span class="text">قوائم الأسعار</span></a></li>
                    <li><a href="http://localhost/my/12-stock_control/warehouses.html"><i class="fas fa-plus-circle icon"></i><span class="text">المستودعات</span></a></li>
                    <li><a href="http://localhost/my/12-stock_control/inventory-list.html"><i class="fas fa-plus-circle icon"></i><span class="text">إدارة الجرد</span></a></li>
                    <li><a href="http://localhost/my/12-stock_control/inventory-settings.html"><i class="fas fa-plus-circle icon"></i><span class="text">إعدادات المخزون</span></a></li>
                    <li><a href="http://localhost/my/12-stock_control/stock-management-options.html"><i class="fas fa-plus-circle icon"></i><span class="text">إعدادات المنتجات</span></a></li>
                </ul>
            </li>
            <li>
                <a href="javascript:void(0);" onclick="toggleMenu(event)"><i class="fas fa-shopping-cart icon"></i><span class="text">المشتريات</span></a>
                <ul>
                    <li><a href="http://localhost/my/13-purchases/purchase-orders.html"><i class="fas fa-undo icon"></i><span class="text">فواتير الشراء</span></a></li>
                    <li><a href="http://localhost/my/13-purchases/purchase-return-list.html"><i class="fas fa-undo icon"></i><span class="text">مرتجعات المشتريات</span></a></li>
                    <li><a href="http://localhost/my/13-purchases/debit-notices.html"><i class="fas fa-sticky-note icon"></i><span class="text">إشعارات مدينة</span></a></li>
                    <li><a href="http://localhost/my/13-purchases/suppliers-list.html"><i class="fas fa-user-tie icon"></i><span class="text">إدارة الموردين</span></a></li>
                    <li><a href="http://localhost/my/13-purchases/supplier-payments-tracking.html"><i class="fas fa-money-check-alt icon"></i><span class="text">مدفوعات الموردين</span></a></li>
                    <li><a href="http://localhost/my/13-purchases/purchase_invoice_config.html"><i class="fas fa-file-alt icon"></i><span class="text">إعدادات فواتير الشراء</span></a></li>
                    <li><a href="http://localhost/my/13-purchases/suppliers_settings.html"><i class="fas fa-cogs icon"></i><span class="text">إعدادات الموردين</span></a></li>
                </ul>
            </li>
            <li>
                <a href="javascript:void(0);" onclick="toggleMenu(event)"><i class="fas fa-file-invoice-dollar icon"></i><span class="text">المالية</span></a>
                <ul>
                    <li><a href="http://localhost/my/14-finance_module/expenses_actions_page.html"><i class="fas fa-file-invoice-dollar icon"></i><span class="text">المصروفات</span></a></li>
                    <li><a href="http://localhost/my/14-finance_module/actions_page.html"><i class="fas fa-file-signature icon"></i><span class="text">سندات القبض</span></a></li>
                    <li><a href="http://localhost/my/14-finance_module/treasuries_bank_accounts.html"><i class="fas fa-university icon"></i><span class="text">خزائن وحسابات بنكية</span></a></li>
                    <li><a href="http://localhost/my/14-finance_module/financial_settings.html"><i class="fas fa-cogs icon"></i><span class="text">إعدادات المالية</span></a></li>
                </ul>
            </li>
            <li>
                <a href="javascript:void(0);" onclick="toggleMenu(event)"><i class="fas fa-book icon"></i><span class="text">الحسابات العامة</span></a>
                <ul>
                    <li><a href="http://localhost/my/15-general_accounting/journal_entries.html"><i class="fas fa-book icon"></i><span class="text">القيود اليومية</span></a></li>
                    <li><a href="http://localhost/my/15-general_accounting/add_entry.html"><i class="fas fa-plus-square icon"></i><span class="text">أضف قيد</span></a></li>
                    <li><a href="http://localhost/my/15-general_accounting/chart_of_accounts.html"><i class="fas fa-book-open icon"></i><span class="text">دليل الحسابات</span></a></li>
                    <li><a href="http://localhost/my/15-general_accounting/cost_centers.html"><i class="fas fa-project-diagram icon"></i><span class="text">مراكز التكلفة</span></a></li>
                    <li><a href="http://localhost/my/15-general_accounting/assets.html"><i class="fas fa-clipboard-list icon"></i><span class="text">الأصول</span></a></li>
                    <li><a href="http://localhost/my/15-general_accounting/general_accounts_settings.html"><i class="fas fa-cog icon"></i><span class="text">إعدادات الحسابات العامة</span></a></li>
                </ul>
            </li>
            <li>
                <a href="javascript:void(0);" onclick="toggleMenu(event)"><i class="fas fa-money-check icon"></i><span class="text">دورة الشيكات</span></a>
                <ul>
                    <li><a href="http://localhost/my/16-Check_Cycle/paid_checks.html"><i class="fas fa-money-check icon"></i><span class="text">الشيكات المدفوعة</span></a></li>
                    <li><a href="http://localhost/my/16-Check_Cycle/received_checks.html"><i class="fas fa-money-check-alt icon"></i><span class="text">الشيكات المستلمة</span></a></li>
                    <li><a href="http://localhost/my/16-Check_Cycle/paid_checks.html"><i class="fas fa-cog icon"></i><span class="text">إعدادات دورة الشيكات</span></a></li>
                </ul>
            </li>
            <li>
                <a href="javascript:void(0);" onclick="toggleMenu(event)"><i class="fas fa-box icon"></i><span class="text">الطلبات</span></a>
                <ul>
                    <li><a href="http://localhost/my/17-Orders_Management/orders_management.html"><i class="fas fa-box icon"></i><span class="text">إدارة الطلبات</span></a></li>
                    <li><a href="http://localhost/my/17-Orders_Management/order_settings.html"><i class="fas fa-cogs icon"></i><span class="text">الإعدادات</span></a></li>
                </ul>
            </li>
            <li>
                <a href="javascript:void(0);" onclick="toggleMenu(event)"><i class="fas fa-user-tie icon"></i><span class="text">الموظفين</span></a>
                <ul>
                    <li><a href="http://localhost/my/18-HR_Files/employee_management.html"><i class="fas fa-user-tie icon"></i><span class="text">إدارة الموظفين</span></a></li>
                    <li><a href="http://localhost/my/18-HR_Files/manage_roles.html"><i class="fas fa-user-shield icon"></i><span class="text">إدارة أدوار الموظفين</span></a></li>
                    <li><a href="http://localhost/my/18-HR_Files/manage_shifts.html"><i class="fas fa-business-time icon"></i><span class="text">إدارة الورديات</span></a></li>
                    <li><a href="http://localhost/my/18-HR_Files/employee_settings.html"><i class="fas fa-cogs icon"></i><span class="text">الإعدادات</span></a></li>
                </ul>
            </li>
            <li>
                <a href="javascript:void(0);" onclick="toggleMenu(event)"><i class="fas fa-sitemap icon"></i><span class="text">الهيكل التنظيمي</span></a>
                <ul>
                    <li><a href="http://localhost/my/19-Org_Chart/job_titles.html"><i class="fas fa-sitemap icon"></i><span class="text">إدارة المسميات الوظيفية</span></a></li>
                    <li><a href="http://localhost/my/19-Org_Chart/departments_management.html"><i class="fas fa-users-cog icon"></i><span class="text">إدارة الأقسام</span></a></li>
                    <li><a href="http://localhost/my/19-Org_Chart/job_levels.html"><i class="fas fa-level-up-alt icon"></i><span class="text">إدارة المستويات الوظيفية</span></a></li>
                    <li><a href="http://localhost/my/19-Org_Chart/job_types_settings.html"><i class="fas fa-th-large icon"></i><span class="text">إدارة أنواع الوظائف</span></a></li>
                </ul>
            </li>
            <li>
                <a href="javascript:void(0);" onclick="toggleMenu(event)"><i class="fas fa-calendar-check icon"></i><span class="text">سجلات الحضور</span></a>
                <ul>
                    <li><a href="http://localhost/my/20-Attendance_Records/attendance_records.html"><i class="fas fa-calendar-alt icon"></i><span class="text">سجلات الحضور</span></a></li>
                    <li><a href="http://localhost/my/20-Attendance_Records/attendance_days.html"><i class="fas fa-calendar-alt icon"></i><span class="text">أيام الحضور</span></a></li>
                    <li><a href="http://localhost/my/20-Attendance_Records/attendance_registers.html"><i class="fas fa-clipboard-list icon"></i><span class="text">دفاتر الحضور</span></a></li>
                    <li><a href="http://localhost/my/20-Attendance_Records/leave_permissions.html"><i class="fas fa-plane-departure icon"></i><span class="text">أذونات أجازة</span></a></li>
                    <li><a href="http://localhost/my/20-Attendance_Records/leave_requests.html"><i class="fas fa-file-alt icon"></i><span class="text">طلبات الأجازة</span></a></li>
                    <li><a href="http://localhost/my/20-Attendance_Records/manage_shifts.html"><i class="fas fa-business-time icon"></i><span class="text">إدارة الورديات</span></a></li>
                    <li><a href="http://localhost/my/20-Attendance_Records/attendance_settings.htmll"><i class="fas fa-sliders-h icon"></i><span class="text">الإعدادات</span></a></li>
                </ul>
            </li>
            <li>
                <a href="javascript:void(0);" onclick="toggleMenu(event)"><i class="fas fa-money-check icon"></i><span class="text">المرتبات</span></a>
                <ul>
                    <li><a href="http://localhost/my/21-Salary_Payments/contracts.html"><i class="fas fa-file-contract icon"></i><span class="text">العقود</span></a></li>
                    <li><a href="http://localhost/my/21-Salary_Payments/payroll_track.html"><i class="fas fa-money-bill-wave icon"></i><span class="text">مسير الرواتب</span></a></li>
                    <li><a href="http://localhost/my/21-Salary_Payments/payroll_vouchers.html"><i class="fas fa-receipt icon"></i><span class="text">قسائم الرواتب</span></a></li>
                    <li><a href="http://localhost/my/21-Salary_Payments/loans.html"><i class="fas fa-hand-holding-usd icon"></i><span class="text">السلف</span></a></li>
                    <li><a href="http://localhost/my/21-Salary_Payments/salary_items.html"><i class="fas fa-file-alt icon"></i><span class="text">بنود الرواتب</span></a></li>
                    <li><a href="http://localhost/my/21-Salary_Payments/salary_templates.html"><i class="fas fa-file-invoice icon"></i><span class="text">قوالب الرواتب</span></a></li>
                    <li><a href="http://localhost/my/21-Salary_Payments/salary_settings.html"><i class="fas fa-cogs icon"></i><span class="text">الإعدادات</span></a></li>
                </ul>
            </li>
            <li>
                <a href="javascript:void(0);" onclick="toggleMenu(event)"><i class="fas fa-chart-pie icon"></i><span class="text">التقارير</span></a>
                <ul>
                    <li><a href="http://localhost/my/22-Reports/reports.html"><i class="fas fa-chart-line icon"></i><span class="text">تقارير المبيعات</span></a></li>
                    <li><a href="http://localhost/my/22-Reports/purchase-reports.html"><i class="fas fa-chart-bar icon"></i><span class="text">تقارير المشتريات</span></a></li>
                    <li><a href="http://localhost/my/22-Reports/financial-reports-summary.html"><i class="fas fa-file-invoice icon"></i><span class="text">تقارير الحسابات العامة</span></a></li>
                    <li><a href="http://localhost/my/22-Reports/check-reports.html"><i class="fas fa-money-check icon"></i><span class="text">تقارير الشيكات</span></a></li>
                    <li><a href="http://localhost/my/22-Reports/points-balances-reports.html"><i class="fas fa-wallet icon"></i><span class="text">تقارير النقاط والأرصدة</span></a></li>
                    <li><a href="http://localhost/my/22-Reports/employee-reports.html"><i class="fas fa-users icon"></i><span class="text">تقارير الموظفين</span></a></li>
                    <li><a href="http://localhost/my/22-Reports/supply-orders-reports.html"><i class="fas fa-clipboard-list icon"></i><span class="text">تقرير أوامر التوريد</span></a></li>
                    <li><a href="http://localhost/my/22-Reports/client-reports.html"><i class="fas fa-handshake icon"></i><span class="text">تقارير العملاء</span></a></li>
                    <li><a href="http://localhost/my/22-Reports/inventory-reports.html"><i class="fas fa-clipboard-list icon"></i><span class="text">تقارير المخزون</span></a></li>
                    <li><a href="http://localhost/my/22-Reports/account-activity-log.html"><i class="fas fa-clipboard-list icon"></i><span class="text">سجل نشاطات الحساب</span></a></li>
                </ul>
            </li>
            <li>
                <a href="javascript:void(0);" onclick="toggleMenu(event)"><i class="fas fa-code-branch icon"></i><span class="text">الفروع</span></a>
                <ul>
                    <li><a href="http://localhost/my/23-Branches/branches.html"><i class="fas fa-code-branch icon"></i><span class="text">إدارة الفروع</span></a></li>
                    <li><a href="http://localhost/my/23-Branches/add-branch.html"><i class="fas fa-plus-circle icon"></i><span class="text">أضف فرع</span></a></li>
                    <li><a href="http://localhost/my/23-Branches/branch-settings.html"><i class="fas fa-cog icon"></i><span class="text">إعدادات الفروع</span></a></li>
                </ul>
            </li>
            <li>
                <a href="javascript:void(0);" onclick="toggleMenu(event)"><i class="fas fa-print icon"></i><span class="text">القوالب</span></a>
                <ul>
                    <li><a href="http://localhost/my/24-Form_Designs/printing-templates.html"><i class="fas fa-print icon"></i><span class="text">قوالب الطباعة</span></a></li>
                    <li><a href="http://localhost/my/24-Form_Designs/invoice_templates.html"><i class="fas fa-receipt icon"></i><span class="text">قوالب الفواتير الجاهزة</span></a></li>
                    <li><a href="http://localhost/my/24-Form_Designs/email_template.html"><i class="fas fa-envelope icon"></i><span class="text">قوالب البريد الإلكتروني</span></a></li>
                    <li><a href="http://localhost/my/24-Form_Designs/terms_conditions.html"><i class="fas fa-file-contract icon"></i><span class="text">الشروط والأحكام</span></a></li>
                    <li><a href="http://localhost/my/24-Form_Designs/documents.html"><i class="fas fa-folder-open icon"></i><span class="text">إدارة الملفات والمستندات</span></a></li>
                    <li><a href="http://localhost/my/24-Form_Designs/automated_sending_rules.html"><i class="fas fa-sync-alt icon"></i><span class="text">قواعد الإرسال الآلي</span></a></li>
                </ul>
            </li>
            <li>
                <a href="javascript:void(0);" onclick="toggleMenu(event)"><i class="fas fa-cogs icon"></i><span class="text">الإعدادات</span></a>
                <ul>
                    <li><a href="http://localhost/my/25-Settings/account_information.html"><i class="fas fa-info-circle icon"></i><span class="text">معلومات الحساب</span></a></li>
                    <li><a href="http://localhost/my/25-Settings/account-settings.html"><i class="fas fa-sliders-h icon"></i><span class="text">إعدادات الحساب</span></a></li>
                    <li><a href="http://localhost/my/25-Settings/smtp_settings.html"><i class="fas fa-at icon"></i><span class="text">إعدادات SMTP</span></a></li>
                    <li><a href="http://localhost/my/25-Settings/payment_methods.html"><i class="fas fa-wallet icon"></i><span class="text">طرق الدفع</span></a></li>
                    <li><a href="http://localhost/my/25-Settings/serial_number_settings.html"><i class="fas fa-list-ol icon"></i><span class="text">إعدادات الترقيم التسلسلي</span></a></li>
                    <li><a href="http://localhost/my/25-Settings/tax_settings.html"><i class="fas fa-percentage icon"></i><span class="text">إعدادات الضرائب</span></a></li>
                    <li><a href="http://localhost/my/25-Settings/manage_apps.html"><i class="fas fa-cogs icon"></i><span class="text">إدارة التطبيقات</span></a></li>
                    <li><a href="http://localhost/my/25-Settings/system_logo_color_settings.html"><i class="fas fa-paint-brush icon"></i><span class="text">شعار وألوان النظام</span></a></li>
                    <li><a href="http://localhost/my/25-Settings/api_management.html"><i class="fas fa-code icon"></i><span class="text">API</span></a></li>
                </ul>
            </li>
        </ul>
    </div>

    <!-- المحتوى الرئيسي -->
    <div class="content" id="content">
        <h1>محتوى الصفحة الرئيسية</h1>

        <!-- الشبكة للأقسام الرئيسية -->
        <div class="container-fluid">
            <div class="row">
                
                <!-- Left Sidebar start-->
                <div class="side-menu-fixed">
                    <div class="scrollbar side-menu-bg">
                        <ul class="nav navbar-nav side-menu" id="sidebarnav">
                            <!-- القائمة الجانبية هنا -->
                        </ul>
                    </div>
                </div>
        
                <!-- المحتوى الرئيسي -->
                <div class="col-12">
                    <div class="row">
                        <div class="col col-sm-6">
                            <div class="small-box box color-green">
                                <div class="icon"><i class="fa fa-user-plus"></i></div>
                                <div class="box-header">
                                    <h3 style="color: white" class="box-title">
                                        تعريفات أساسية
                                    </h3>
                                </div>
                                <div class="widget-stats">
                                    <div class="wrap transparent">
                                        <a href="Stores/items_form2.aspx" class="item-title">
                                            إضافة
                                            <span>
                                            صنف</span></a>
                                    </div>
                                </div>
                                <div class="widget-stats">
                                    <div class="wrap transparent">
                                        <a href="Customers/customers.aspx" class="item-title">
                                            إضافة
                                            <span>
                                            عميل</span></a>
                                    </div>
                                </div>
                                <div id="ctl00_ContentPlaceHolder1_li_vendor" class="widget-stats">
                                    <div class="wrap last">
                                        <a href="Vendors/vendors.aspx" class="item-title">
                                            إضافة
                                            <span>
                                            مورد</span></a>
                                    </div>
                                </div>
                                <div class="progress dd">
                                    <div class="progress-bar" style="width: 50%"></div>
                                </div>
                            </div>
                        </div>
            
                        <div class="col col-sm-6">
                            <div class="small-box box color-blue">
                                <div class="icon"><i class="fa fa-file-text-o"></i></div>
                                <div class="box-header">
                                    <h3 style="color: white" class="box-title">
                                        الفواتير
                                    </h3>
                                </div>
                                <div class="widget-stats">
                                    <div class="wrap transparent">
                                        <a href="Invoices/SellInvoice.aspx" id="ctl00_ContentPlaceHolder1_li_OpenSellInvoice" class="item-title">
                                            فاتورة
                                            <span>
                                            بيع</span></a>
                                    </div>
                                </div>
                                <div class="widget-stats">
                                    <div class="wrap transparent">
                                        <a href="Invoices/buyInvoice.aspx" id="ctl00_ContentPlaceHolder1_li_OpenbuyInvoice" class="item-title">
                                            فاتورة
                                            <span>
                                            شراء</span></a>
                                    </div>
                                </div>
                                <div class="widget-stats">
                                    <div class="wrap transparent">
                                        <a href="Invoices/SellBackInvoice.aspx" id="ctl00_ContentPlaceHolder1_li_OpenSellBackInvoice" class="item-title">
                                            مرتجع
                                            <span>
                                            بيع</span></a>
                                    </div>
                                </div>
                                <div class="widget-stats">
                                    <div class="wrap last">
                                        <a href="Invoices/BuybackInvoice.aspx" id="ctl00_ContentPlaceHolder1_li_OpenBuybackInvoice" class="item-title">
                                            مرتجع
                                            <span>
                                            شراء</span></a>
                                    </div>
                                </div>
                                <div class="progress dd">
                                    <div class="progress-bar" style="width: 50%"></div>
                                </div>
                            </div>
            
                        </div>
            
            
            
                        <div id="ctl00_ContentPlaceHolder1_pnlSafe2" class="col col-sm-6">
            
            
                            <div class="small-box box color-purple">
                                <div class="icon"><i class="fa fa-archive"></i></div>
                                <div class="box-header">
                                    <h3 style="color: white" class="box-title">
                                        الخزينة
                                    </h3>
                                </div>
                                <div class="widget-stats">
                                    <div class="wrap transparent">
                                        <a href="Safe/Safe_Move.aspx" class="item-title">
                                            رصيد
                                            <span>
                                                الخزينة
                                            </span></a>
                                    </div>
                                </div>
                                <div class="widget-stats">
                                    <div class="wrap last">
                                        <a href="Safe/safe_payment.aspx" class="item-title">
                                            تسجيل
                                            <span>
                                                نقدية</span></a>
                                    </div>
                                </div>
                                <div class="progress dd">
                                    <div class="progress-bar" style="width: 50%"></div>
                                </div>
                            </div>
            
                        
            </div>
            
                        <div class="col col-sm-6">
                            <div class="small-box box color-red">
                                <div class="icon"><i class="fa fa-database"></i></div>
                                <div class="box-header">
                                    <h3 style="color: white" class="box-title">
                                        المخزن
                                    </h3>
                                    
                                </div>
                                <div class="widget-stats">
                                    <div class="wrap transparent">
                                        <a href="Stores/LastTotalStores.aspx" class="item-title">
                                            رصيد
                                            <span>
                                            المخزن</span></a>
                                    </div>
                                </div>
                                <div id="ctl00_ContentPlaceHolder1_li_RequiredItems" class="widget-stats">
                                    <div class="wrap last">
                                        <a href="Stores/RequiredItems.aspx" class="item-title">
                                            الأصناف
                                            <span>
                                            الناقصة</span></a>
                                    </div>
                                </div>
                                <div class="progress dd">
                                    <div class="progress-bar" style="width: 50%"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-8">
                            <!-- TABLE: LATEST ORDERS -->
                            <div class="box box-info">
                                <div class="box-header with-border">
                                    <h3 class="box-title">آخر فواتير البيع</h3>
                                    <div class="box-tools pull-right">
                                        <a id="ctl00_ContentPlaceHolder1_btn_Print" class="btn btn-flat bg-green" href="javascript:__doPostBack(&#39;ctl00$ContentPlaceHolder1$btn_Print&#39;,&#39;&#39;)">
                                            <i class="fa fa-print"></i>
                                            طباعة فواتير اليوم</a>
                                        <button type="button" class="btn btn-box-tool" data-widget="collapse">
                                            <i class="fa fa-minus"></i>
                                        </button>
                                    </div>
                                </div>
                                <!-- /.box-header -->
                                <div class="box-body">
                                    <div class="table-responsive">
                                        <table id="tbl_LastOrder" class="table no-margin">
                                            <thead>
                                                <tr>
                                                    <th>رقم الفاتورة</th>
                                                    <th>التاريخ</th>
                                                    <th>العميل</th>
                                                    <th>القيمة</th>
                                                    <th>المستخدم</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                            </tbody>
                                        </table>
                                    </div>
                                    <!-- /.table-responsive -->
                                </div>
                                <!-- /.box-body -->
                                <div class="box-footer clearfix">
                                    <a href="Invoices/SellInvoice.aspx" id="ctl00_ContentPlaceHolder1_li_SellInvoice" class="btn btn-sm btn-info btn-flat pull-left">
                                        فاتورة بيع جديدة
                                    </a>
                                    <a href="Invoices/SellInvoiceGrid.aspx" class="btn btn-sm btn-default btn-flat pull-right">
                                        عرض كل فواتير البيع
                                    </a>
                                </div>
                                <!-- /.box-footer -->
                            </div>
                            <!-- /.box -->
                        </div>
                    
                        <div class="col-md-4">
                            <div id="ctl00_ContentPlaceHolder1_pnl_HomeWidgets">
                                <!-- Info Boxes Style 2 -->
                                <div class="info-box bg-yellow">
                                    <span class="info-box-icon"><i class="fa fa-tags"></i></span>
                                    <div class="info-box-content">
                                        <span class="info-box-text">مبيعات</span>
                                        <span class="info-box-number">0</span>
                                        <div class="progress">
                                            <div class="progress-bar" style="width: 50%"></div>
                                        </div>
                                        <span class="progress-description">تقرير حسابات المبيعات اليومية</span>
                                    </div>
                                    <!-- /.info-box-content -->
                                </div>
                                <!-- /.info-box -->
                    
                                <div class="info-box bg-green">
                                    <span class="info-box-icon"><i class="fa fa-usd"></i></span>
                                    <div class="info-box-content">
                                        <span class="info-box-text">مصروفات</span>
                                        <span class="info-box-number">0</span>
                                        <div class="progress">
                                            <div class="progress-bar" style="width: 20%"></div>
                                        </div>
                                        <span class="progress-description">تقرير حسابات المصروفات اليومية</span>
                                    </div>
                                    <!-- /.info-box-content -->
                                </div>
                                <!-- /.info-box -->
                    
                                <div id="ctl00_ContentPlaceHolder1_pnlSafe">
                                    <div class="info-box bg-red">
                                        <span class="info-box-icon"><i class="fa fa-hdd-o"></i></span>
                                        <div class="info-box-content">
                                            <span class="info-box-text">الخزينة</span>
                                            <span class="info-box-number">0</span>
                                            <div class="progress">
                                                <div class="progress-bar" style="width: 70%"></div>
                                            </div>
                                            <span class="progress-description">تقرير حسابات الخزينة اليومية</span>
                                        </div>
                                        <!-- /.info-box-content -->
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-5">
                            <div class="box box-primary">
                                <div class="box-header with-border">
                                    <h3 class="box-title">فيديو شرح للنظام</h3>
                                    <div class="box-tools pull-right">
                                        <button type="button" class="btn btn-box-tool" data-widget="collapse">
                                            <i class="fa fa-minus"></i>
                                        </button>
                                    </div>
                                </div>
                                <div class="box-body">
                                    <a href="https://www.youtube.com/watch?v=MbdLkLzOWD4&list=UUdWCRilSc83__QvnbETripw" class="html5lightbox">
                                        <img src="Design/Images/video.png" class="img-fluid" alt="">
                                    </a>
                                </div>
                            </div>
                        </div>
                    
                        <!-- /.col -->
                        <div class="col-md-3">
                            <!-- DIRECT CHAT -->
                            <div class="box box-warning direct-chat direct-chat-warning">
                                <div class="box-header with-border">
                                    <h3 class="box-title">الشات</h3>
                                    <div class="box-tools pull-right">
                                        <span id="sp_Notification" data-toggle="tooltip" title="No Messages" class="badge bg-yellow">0</span>
                                        <button type="button" class="btn btn-box-tool" data-widget="collapse">
                                            <i class="fa fa-minus"></i>
                                        </button>
                                    </div>
                                </div>
                                <!-- /.box-header -->
                                <div class="box-body">
                                    <!-- Conversations are loaded here -->
                                    <div id="ChatBody" class="direct-chat-messages"></div>
                                    <!--/.direct-chat-messages-->
                                </div>
                                <!-- /.box-body -->
                                <div class="box-footer">
                                    <div class="input-group">
                                        <input id="txt_Message" type="text" name="message" placeholder="Type Message ..." class="form-control">
                                        <span class="input-group-btn">
                                            <button id="btn_SendMessage" type="button" class="btn btn-warning btn-flat">Send</button>
                                        </span>
                                    </div>
                                </div>
                                <!-- /.box-footer-->
                            </div>
                            <!--/.direct-chat -->
                        </div>
                    
                        <div class="col-md-4">
                            <div class="box box-primary">
                                <div class="box-header with-border">
                                    <h3 class="box-title">آخر التحديثات</h3>
                                    <div class="box-tools pull-right">
                                        <button type="button" class="btn btn-box-tool" data-widget="collapse">
                                            <i class="fa fa-minus"></i>
                                        </button>
                                    </div>
                                </div>
                                <div class="box-body">
                                    <ul id="ctl00_ContentPlaceHolder1_ul_Updates" class="products-list product-list-in-box">
                                        <li class='item'>
                                            <div class='product-img'><img src='Design/images/be.png' alt=''></div>
                                            <div class='product-info'>
                                                <a href='javascript:void(0)' class='product-title'>إصـــدار 18.0<span class='label label-danger pull-right'>2/6/2022</span></a>
                                                <span class='product-description'>تصميم جديد وتحسينات فى اداء النظام</span>
                                            </div>
                                        </li>
                                        <li class='item'>
                                            <div class='product-img'><img src='Design/images/be.png' alt=''></div>
                                            <div class='product-info'>
                                                <a href='javascript:void(0)' class='product-title'>إصـــدار 5.7<span class='label label-warning pull-right'>11/28/2016</span></a>
                                                <span class='product-description'>تحسين طباعة فاتورة البيع واضافة البيانات الضريبة للشركة ودعم احتساب الضريبة الجديدة ضريبة القيمة المضافة</span>
                                            </div>
                                        </li>
                                        <li class='item'>
                                            <div class='product-img'><img src='Design/images/be.png' alt=''></div>
                                            <div class='product-info'>
                                                <a href='javascript:void(0)' class='product-title'>إصـــدار 5.6<span class='label label-success pull-right'>10/3/2016</span></a>
                                                <span class='product-description'>جرد المخازن عن طريق اسكانر الباركود وتسوية الجرد سواء بالعجز او الزيادة. دعم السكانر الاسلكى واضافة امكانية جرد المخزن ككل او جزء من المخزن وتسوية</span>
                                            </div>
                                        </li>
                                        <li class='item'>
                                            <div class='product-img'><img src='Design/images/be.png' alt=''></div>
                                            <div class='product-info'>
                                                <a href='javascript:void(0)' class='product-title'>إصـــدار 5.1<span class='label label-info pull-right'>2/10/2016</span></a>
                                                <span class='product-description'>امكانية عمل النظام بدون اتصال بالانترنت لحين توفره يقوم النظام بتحديث البيانات Becreative Offline Mode</span>
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    
                        <div class="col-md-4">
                            <!-- USERS LIST -->
                            <div class="box box-danger">
                                <div class="box-header with-border">
                                    <h3 class="box-title">المستخدمين المتواجدين حاليا</h3>
                                    <div class="box-tools pull-right">
                                        <button type="button" class="btn btn-box-tool" data-widget="collapse">
                                            <i class="fa fa-minus"></i>
                                        </button>
                                    </div>
                                </div>
                                <!-- /.box-header -->
                                <div class="box-body no-padding">
                                    <ul class="users-list clearfix">
                                        <li>
                                            <img src='Design/Images/avatar5.png' alt='User Image'>
                                            <a class='users-list-name' href='#'>Admin</a>
                                            <span class='users-list-Date'>Today</span>
                                        </li>
                                    </ul>
                                    <!-- /.users-list -->
                                </div>
                                <!-- /.box-body -->
                                <div class="box-footer text-center">
                                    <a href="managment/users_grid.aspx" class="uppercase">عرض كل المستخدمين</a>
                                </div>
                                <!-- /.box-footer -->
                            </div>
                            <!--/.box -->
                        </div>
                    </div>
                                        
                        <div id="ctl00_ContentPlaceHolder1_UpdatePanelFeesMessage">
        
        
                                <div id="ctl00_ContentPlaceHolder1_pnlPrintMessage" class="modalPopup" style="display: none;">
        
                                    <div class="header">
                                        <span id="ctl00_ContentPlaceHolder1_Label2"> BeCreative </span>
                                    </div>
                                    <div class="body">
                                        <h4>
                                             لتجنب وقف الخدمه برجاء تجديد الباقة قبل الموعد المحدد لها باقى اقل من خمس ايام  
                                        </h4>
                                    </div>
                                    <div class="footer">
                                        <a id="ctl00_ContentPlaceHolder1_btn_PayLater" class="btn bg-red" href="javascript:__doPostBack(&#39;ctl00$ContentPlaceHolder1$btn_PayLater&#39;,&#39;&#39;)">
                                            <i class="fa fa-bookmark"></i>
                                            التذكير لاحقا</a>
                                        <a id="ctl00_ContentPlaceHolder1_btnPay" class="btn btn-sm btn-flat bg-green" href="javascript:__doPostBack(&#39;ctl00$ContentPlaceHolder1$btnPay&#39;,&#39;&#39;)">
                                            <i class="fa fa-usd"></i>
                                            تجديد الاشتراك</a>
                                    </div>
                                
        </div>
                                
                            
        </div>
                        
                    </div>
                
                    <!-- جدول الفواتير -->
                    <div class="table-card">
                        <h3>آخر فواتير البيع</h3>
                        <table>
                            <thead>
                                <tr>
                                    <th>رقم الفاتورة</th>
                                    <th>التاريخ</th>
                                    <th>العميل</th>
                                    <th>القيمة</th>
                                    <th>المستخدم</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>36</td>
                                    <td>8/9/2021</td>
                                    <td>نقدي</td>
                                    <td>100.00</td>
                                    <td>admin</td>
                                </tr>
                                <tr>
                                    <td>35</td>
                                    <td>8/8/2021</td>
                                    <td>نقدي</td>
                                    <td>120.00</td>
                                    <td>admin</td>
                                </tr>
                            </tbody>
                        </table>
                        <button class="btn">عرض كل فواتير البيع</button>
                    </div>
                </div>
                
                
            </div>
        </div>
        

        <script type="text/javascript" src="/js/navigation-shortcuts.js"></script>
        <script type="text/javascript" src="/js/navigation-listener.js"></script>  

        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/2.10.2/umd/popper.min.js"></script>
        <script src="Design/js/bootstrap.js"></script> 
        <script src="Design/js/global.js"></script>
        <script src="Design/js/textfield.js"></script>
        <script src="Design/js/select2.js"></script>
        <script src="Design/js/custom-file-input.js"></script>
        <script src="Design/js/after-refresh.js"></script>
         <script src="Design/js/Chart.js"></script>
    
        <script src="Design/js/bootstrap-datetimepicker.js"></script>
        
       
        <!-- fullscreen -->
        <script src="Design/js/screenfull.js"></script>
     
        
        <script src="Design/js/app.min.js"></script>
        <script src="Design/js/ActiveMenu.js"></script>
        <script src="Design/js/autocomplete.js"></script>
    <!-- JavaScript لتفاعل القوائم -->
    <script>
    function showSubmenu(event) {
    const parentLi = event.target.closest('li'); // العثور على العنصر الأب
    const submenu = parentLi.querySelector('.submenu'); // العثور على القائمة الفرعية

    // التأكد من أن القائمة الفرعية موجودة
    if (submenu) {
        submenu.style.display = 'block'; // إظهار القائمة الفرعية
    }
}

// دالة لإخفاء القائمة الفرعية عند الابتعاد عن الأيقونة
function hideSubmenu(event) {
    const parentLi = event.target.closest('li'); // العثور على العنصر الأب
    const submenu = parentLi.querySelector('.submenu'); // العثور على القائمة الفرعية

    // التأكد من أن القائمة الفرعية موجودة
    if (submenu) {
        submenu.style.display = 'none'; // إخفاء القائمة الفرعية
    }
}

// فتح/غلق القائمة الجانبية
const sidebar = document.getElementById('sidebar');
const content = document.getElementById('content');
const toggleSidebarBtn = document.getElementById('toggleSidebarBtn');

toggleSidebarBtn.addEventListener('click', function() {
    sidebar.classList.toggle('collapsed');
    content.classList.toggle('collapsed');
});

// إضافة أحداث الماوس لتظهر وتخفي القوائم الفرعية
const sidebarItems = document.querySelectorAll('.sidebar li');

sidebarItems.forEach(item => {
    item.addEventListener('mouseover', showSubmenu); // إظهار القائمة عند تمرير الماوس
    item.addEventListener('mouseout', hideSubmenu); // إخفاء القائمة عند الابتعاد عن الماوس
});
        // يمكنك الإبقاء على دالة toggleMenu إذا كنت بحاجة إليها في مكان آخر
    </script>
    
    
</body>
</html>
