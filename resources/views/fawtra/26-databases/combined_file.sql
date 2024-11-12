-- 1. إنشاء قاعدة البيانات إذا لم تكن موجودة بالفعل
CREATE DATABASE IF NOT EXISTS my_database;

-- 2. استخدام قاعدة البيانات
USE my_database;

-- جدول المستخدمين (Users)
CREATE TABLE IF NOT EXISTS users (
  id INT(11) NOT NULL AUTO_INCREMENT,          -- معرف المستخدم (المفتاح الأساسي)
  username VARCHAR(100) NOT NULL,              -- اسم المستخدم
  password VARCHAR(255) NOT NULL,              -- كلمة المرور
  email VARCHAR(100) NOT NULL,                 -- البريد الإلكتروني
  created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,  -- تاريخ الإنشاء
  role VARCHAR(50) DEFAULT 'user',             -- الدور (مدير، مستخدم، إلخ)
  PRIMARY KEY (id)                             -- المفتاح الأساسي
);

-- جدول الموظفين (Employees)
CREATE TABLE IF NOT EXISTS employees (
  employee_id INT AUTO_INCREMENT PRIMARY KEY,  -- معرف الموظف
  first_name VARCHAR(100) NOT NULL,            -- اسم الموظف الأول
  last_name VARCHAR(100) NOT NULL,             -- اسم العائلة
  position VARCHAR(100),                       -- الوظيفة
  department VARCHAR(100),                     -- القسم
  hire_date DATE NOT NULL,                     -- تاريخ التوظيف
  salary DECIMAL(10, 2),                       -- الراتب
  contact_info VARCHAR(255),                   -- معلومات الاتصال
  status ENUM('Active', 'Inactive') DEFAULT 'Active' -- حالة الموظف
);

-- جدول الفروع (Branches)
CREATE TABLE IF NOT EXISTS branches (
  branch_id INT AUTO_INCREMENT PRIMARY KEY,     -- معرف الفرع
  branch_name VARCHAR(100) NOT NULL,            -- اسم الفرع
  location VARCHAR(255),                        -- موقع الفرع
  manager_id INT,                               -- معرف المدير (ربط مع جدول الموظفين)
  contact_info VARCHAR(255),                    -- معلومات الاتصال
  status ENUM('Active', 'Inactive') DEFAULT 'Active', -- حالة الفرع
  FOREIGN KEY (manager_id) REFERENCES employees(employee_id) -- الربط مع جدول الموظفين
);

-- جدول العملاء (Clients)
CREATE TABLE IF NOT EXISTS clients (
  client_id INT(11) NOT NULL AUTO_INCREMENT,    -- معرف العميل
  trade_name VARCHAR(255) NOT NULL,             -- الاسم التجاري
  first_name VARCHAR(100),                      -- الاسم الأول
  last_name VARCHAR(100),                       -- الاسم الأخير
  phone VARCHAR(20),                            -- الهاتف
  mobile VARCHAR(20),                           -- الجوال
  city VARCHAR(100),                            -- المدينة
  region VARCHAR(100),                          -- المنطقة
  postal_code VARCHAR(20),                      -- الرمز البريدي
  country VARCHAR(100) DEFAULT 'المملكة العربية السعودية', -- البلد الافتراضي
  tax_number VARCHAR(50),                       -- الرقم الضريبي
  commercial_registration VARCHAR(100),         -- السجل التجاري
  credit_limit DECIMAL(10, 2),                  -- الحد الائتماني
  credit_period INT(11),                        -- المدة الائتمانية (بالأيام)
  account_code VARCHAR(100) NOT NULL,           -- رقم الكود
  printing_method ENUM('طباعة', 'إلكتروني'),    -- طريقة الطباعة
  opening_balance DECIMAL(10, 2),               -- الرصيد الافتتاحي
  opening_balance_date DATE,                    -- تاريخ الرصيد الافتتاحي
  currency VARCHAR(50) DEFAULT 'ريال سعودي',   -- العملة الافتراضية
  email VARCHAR(255),                           -- البريد الإلكتروني
  client_type ENUM('عميل نقدي', 'عميل آجل') DEFAULT 'عميل نقدي', -- نوع العميل
  notes TEXT,                                   -- الملاحظات
  attachments TEXT,                             -- المرفقات
  display_language ENUM('العربية', 'الإنجليزية') DEFAULT 'العربية', -- لغة العرض
  created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP, -- تاريخ الإنشاء
  PRIMARY KEY (client_id)                       -- المفتاح الأساسي
);

-- جدول الفواتير (Invoices)
CREATE TABLE IF NOT EXISTS invoices (
  invoice_id INT(11) NOT NULL AUTO_INCREMENT,   -- معرف الفاتورة
  client_id INT(11) NOT NULL,                   -- معرف العميل (ربط مع جدول العملاء)
  invoice_number VARCHAR(100) NOT NULL,         -- رقم الفاتورة
  invoice_date DATE,                            -- تاريخ الفاتورة
  sales_manager VARCHAR(100),                   -- مدير المبيعات
  issue_date DATE,                              -- تاريخ الإصدار
  payment_terms VARCHAR(255),                   -- شروط الدفع
  total DECIMAL(10, 2),                         -- الإجمالي
  grand_total DECIMAL(10, 2),                   -- المجموع الكلي
  created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP, -- تاريخ الإنشاء
  PRIMARY KEY (invoice_id),                     -- المفتاح الأساسي
  FOREIGN KEY (client_id) REFERENCES clients(client_id) -- الربط مع جدول العملاء
);

-- جدول مدفوعات العملاء (Client Payments)
CREATE TABLE IF NOT EXISTS client_payments (
  payment_id INT AUTO_INCREMENT PRIMARY KEY,    -- معرف الدفع
  client_id INT,                                -- معرف العميل (ربط مع جدول العملاء)
  invoice_id INT,                               -- معرف الفاتورة (ربط مع جدول الفواتير)
  payment_date DATE NOT NULL,                   -- تاريخ الدفع
  amount DECIMAL(10, 2) NOT NULL,               -- المبلغ المدفوع
  payment_method ENUM('Cash', 'Bank Transfer', 'Credit Card', 'Other') NOT NULL, -- طريقة الدفع
  status ENUM('Paid', 'Pending', 'Failed') DEFAULT 'Pending', -- حالة الدفع
  notes TEXT,                                   -- ملاحظات إضافية
  FOREIGN KEY (client_id) REFERENCES clients(client_id),  -- الربط مع جدول العملاء
  FOREIGN KEY (invoice_id) REFERENCES invoices(invoice_id) -- الربط مع جدول الفواتير
);

-- جدول بنود الفواتير (Invoice Items)
CREATE TABLE IF NOT EXISTS invoice_items (
  item_id INT(11) NOT NULL AUTO_INCREMENT,      -- معرف البند
  invoice_id INT(11) NOT NULL,                  -- معرف الفاتورة (ربط مع جدول الفواتير)
  description TEXT,                             -- وصف البند
  unit_price DECIMAL(10, 2),                    -- سعر الوحدة
  quantity INT(11),                             -- الكمية
  discount DECIMAL(10, 2),                      -- الخصم
  tax_1 DECIMAL(5, 2),                          -- الضريبة الأولى
  tax_2 DECIMAL(5, 2),                          -- الضريبة الثانية
  total DECIMAL(10, 2),                         -- المجموع
  PRIMARY KEY (item_id),                        -- المفتاح الأساسي
  FOREIGN KEY (invoice_id) REFERENCES invoices(invoice_id) -- الربط مع جدول الفواتير
);

-- جدول الموردين (Suppliers)
CREATE TABLE IF NOT EXISTS suppliers (
  supplier_id INT(11) NOT NULL AUTO_INCREMENT,  -- معرف المورد
  trade_name VARCHAR(255) NOT NULL,             -- الاسم التجاري
  first_name VARCHAR(100),                      -- الاسم الأول
  last_name VARCHAR(100),                       -- الاسم الأخير
  phone VARCHAR(20),                            -- الهاتف
  mobile VARCHAR(20),                           -- الجوال
  email VARCHAR(255),                           -- البريد الإلكتروني
  city VARCHAR(100),                            -- المدينة
  region VARCHAR(100),                          -- المنطقة
  postal_code VARCHAR(20),                      -- الرمز البريدي
  country VARCHAR(100) DEFAULT 'المملكة العربية السعودية', -- البلد الافتراضي
  tax_number VARCHAR(50),                       -- الرقم الضريبي
  commercial_registration VARCHAR(100),         -- السجل التجاري
  currency VARCHAR(50) DEFAULT 'ريال سعودي',   -- العملة الافتراضية
  opening_balance DECIMAL(10, 2),               -- الرصيد الافتتاحي
  opening_balance_date DATE,                    -- تاريخ الرصيد الافتتاحي
  notes TEXT,                                   -- الملاحظات
  attachments TEXT,                             -- المرفقات
  created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP, -- تاريخ الإنشاء
  PRIMARY KEY (supplier_id)                     -- المفتاح الأساسي
);

-- جدول صلاحيات المستخدمين (User Permissions)
CREATE TABLE IF NOT EXISTS user_permissions (
  user_id INT AUTO_INCREMENT PRIMARY KEY,      -- معرف المستخدم (المفتاح الأساسي)
  user_name VARCHAR(255) NOT NULL,             -- اسم المستخدم
  status ENUM('نشط', 'غير نشط') NOT NULL,      -- حالة المستخدم (نشط أو غير نشط)
  allow_approve_reject TINYINT(1) DEFAULT 0,   -- السماح بالموافقة أو رفض الطلبات
  permission_add_new_order TINYINT(1) DEFAULT 0, -- الصلاحية: إضافة طلب جديد
  permission_approve_reject_orders TINYINT(1) DEFAULT 0, -- الصلاحية: موافقة / رفض الطلبات
  permission_view_orders TINYINT(1) DEFAULT 1, -- الصلاحية: عرض الطلبات
  FOREIGN KEY (user_id) REFERENCES users(id)   -- ربط مع جدول المستخدمين
);

-- جدول الأنشطة (Activity Logs)
CREATE TABLE IF NOT EXISTS activity_logs (
  log_id INT AUTO_INCREMENT PRIMARY KEY,       -- معرف السجل
  user_id INT,                                 -- معرف المستخدم الذي قام بالنشاط
  activity_type ENUM('Add', 'Edit', 'Delete') NOT NULL, -- نوع النشاط
  activity_description TEXT NOT NULL,          -- وصف النشاط
  activity_date DATETIME DEFAULT CURRENT_TIMESTAMP,  -- تاريخ ووقت النشاط
  ip_address VARCHAR(45),                      -- عنوان IP
  module_affected VARCHAR(100),                -- الوحدة المتأثرة (مثل الفواتير، المنتجات)
  FOREIGN KEY (user_id) REFERENCES users(id)   -- ربط مع جدول المستخدمين
);

-- جدول الحضور (Attendance)
CREATE TABLE IF NOT EXISTS attendance (
  attendance_id INT AUTO_INCREMENT PRIMARY KEY, -- معرف الحضور
  employee_id INT,                              -- معرف الموظف (ربط مع جدول الموظفين)
  date DATE NOT NULL,                           -- التاريخ
  check_in_time TIME,                           -- وقت الدخول
  check_out_time TIME,                          -- وقت الخروج
  status ENUM('Present', 'Absent', 'Late', 'On Leave') DEFAULT 'Present', -- حالة الحضور
  FOREIGN KEY (employee_id) REFERENCES employees(employee_id) -- الربط مع جدول الموظفين
);

-- جدول إدارة الفروع (Branch Management)
CREATE TABLE IF NOT EXISTS branch_management (
  management_id INT AUTO_INCREMENT PRIMARY KEY, -- معرف الإدارة
  branch_id INT,                                -- معرف الفرع (ربط مع جدول الفروع)
  employee_id INT,                              -- معرف الموظف (ربط مع جدول الموظفين)
  role_in_branch VARCHAR(100),                  -- دور الموظف في الفرع
  start_date DATE NOT NULL,                     -- تاريخ بدء الدور
  end_date DATE,                                -- تاريخ نهاية الدور (إن وجدت)
  FOREIGN KEY (branch_id) REFERENCES branches(branch_id),  -- الربط مع جدول الفروع
  FOREIGN KEY (employee_id) REFERENCES employees(employee_id) -- الربط مع جدول الموظفين
);
