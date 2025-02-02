-- 1. إنشاء قاعدة البيانات إذا لم تكن موجودة بالفعل
CREATE DATABASE IF NOT EXISTS my_database;

-- 2. استخدام قاعدة البيانات
USE my_database;

-- جدول المستخدمين (Users)
CREATE TABLE IF NOT EXISTS users (
  id INT(11) NOT NULL AUTO_INCREMENT,
  username VARCHAR(100) NOT NULL,
  password VARCHAR(255) NOT NULL,
  email VARCHAR(100) NOT NULL,
  created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
  role VARCHAR(50) DEFAULT 'user',
  PRIMARY KEY (id)
);


-- جدول الموظفين (Employees)
CREATE TABLE IF NOT EXISTS employees (
  employee_id INT AUTO_INCREMENT PRIMARY KEY,
  first_name VARCHAR(100) NOT NULL,
  last_name VARCHAR(100) NOT NULL,
  position VARCHAR(100),
  department VARCHAR(100),
  hire_date DATE NOT NULL,
  salary DECIMAL(10, 2),
  contact_info VARCHAR(255),
  status ENUM('Active', 'Inactive') DEFAULT 'Active'
);

-- جدول الفروع (Branches)
CREATE TABLE IF NOT EXISTS branches (
  branch_id INT AUTO_INCREMENT PRIMARY KEY,
  branch_name VARCHAR(100) NOT NULL,
  location VARCHAR(255),
  manager_id INT,
  contact_info VARCHAR(255),
  status ENUM('Active', 'Inactive') DEFAULT 'Active',
  FOREIGN KEY (manager_id) REFERENCES employees(employee_id)
);

-- جدول العملاء (Clients)
CREATE TABLE IF NOT EXISTS clients (
  client_id INT(11) NOT NULL AUTO_INCREMENT,
  trade_name VARCHAR(255) NOT NULL,
  first_name VARCHAR(100),
  last_name VARCHAR(100),
  phone VARCHAR(20),
  mobile VARCHAR(20),
  city VARCHAR(100),
  region VARCHAR(100),
  postal_code VARCHAR(20),
  country VARCHAR(100) ,
  tax_number VARCHAR(50),
  commercial_registration VARCHAR(100),
  credit_limit DECIMAL(10, 2),
  credit_period INT(11),
  account_code VARCHAR(100) NOT NULL,
  printing_method ENUM('طباعة', 'إلكتروني'),
  opening_balance DECIMAL(10, 2),
  opening_balance_date DATE,
  currency VARCHAR(50) DEFAULT 'ريال سعودي',
  email VARCHAR(255),
  client_type ENUM('0', '1') DEFAULT ,
  notes TEXT,
  attachments TEXT,
  display_language ENUM('العربية', 'الإنجليزية') DEFAULT 'العربية',
  created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (client_id)
);

-- جدول الفواتير (Invoices)
CREATE TABLE IF NOT EXISTS invoices (
  invoice_id INT(11) NOT NULL AUTO_INCREMENT,
  client_id INT(11) NOT NULL,
  invoice_number VARCHAR(100) NOT NULL,
  invoice_date DATE,
  sales_manager VARCHAR(100),
  issue_date DATE,
  payment_terms VARCHAR(255),
  total DECIMAL(10, 2),
  grand_total DECIMAL(10, 2),
  currency VARCHAR(50) DEFAULT 'ريال سعودي',
  payment_status ENUM('Paid', 'Unpaid', 'Partially Paid') DEFAULT 'Unpaid',
  created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (invoice_id),
  FOREIGN KEY (client_id) REFERENCES clients(client_id)
);

-- جدول مدفوعات العملاء (Client Payments)
CREATE TABLE IF NOT EXISTS client_payments (
  payment_id INT AUTO_INCREMENT PRIMARY KEY, -- معرف الدفع
  client_id INT, -- معرف العميل
  invoice_id INT, -- معرف الفاتورة
  employee_id INT, -- معرف الموظف
  entry_id INT, -- معرف القيد
  treasury_id INT, -- معرف الخزينة
  payment_date DATE NOT NULL, -- تاريخ الدفع
  amount DECIMAL(10, 2) NOT NULL, -- المبلغ المدفوع
  payment_method ENUM('Cash', 'Bank Transfer', 'Credit Card', 'Other') NOT NULL, -- طريقة الدفع
  discount_amount DECIMAL(10, 2) DEFAULT 0, -- مبلغ الخصم
  partial_payment_amount DECIMAL(10, 2) DEFAULT 0, -- مبلغ الدفع الجزئي
  status ENUM('Paid', 'Pending', 'Failed') DEFAULT 'Pending', -- حالة الدفع
  notes TEXT, -- ملاحظات إضافية

  -- المفاتيح الخارجية
  FOREIGN KEY (client_id) REFERENCES clients(client_id), -- الربط مع جدول العملاء
  FOREIGN KEY (invoice_id) REFERENCES invoices(invoice_id), -- الربط مع جدول الفواتير
  FOREIGN KEY (employee_id) REFERENCES employees(employee_id), -- الربط مع جدول الموظفين
  FOREIGN KEY (entry_id) REFERENCES journal_entries(entry_id), -- الربط مع جدول القيود اليومية
  FOREIGN KEY (treasury_id) REFERENCES treasuries(treasury_id) -- الربط مع جدول الخزينة
);


-- جدول بنود الفواتير (Invoice Items)
CREATE TABLE IF NOT EXISTS invoice_items (
  item_id INT(11) NOT NULL AUTO_INCREMENT,
  invoice_id INT(11) NOT NULL,
  description TEXT,
  unit_price DECIMAL(10, 2),
  quantity INT(11),
  discount DECIMAL(10, 2),
  tax_1 DECIMAL(5, 2),
  tax_2 DECIMAL(5, 2),
  total DECIMAL(10, 2),
  PRIMARY KEY (item_id),
  FOREIGN KEY (invoice_id) REFERENCES invoices(invoice_id)
);

-- جدول الموردين (Suppliers)
CREATE TABLE IF NOT EXISTS suppliers (
  supplier_id INT(11) NOT NULL AUTO_INCREMENT,
  trade_name VARCHAR(255) NOT NULL,
  first_name VARCHAR(100),
  last_name VARCHAR(100),
  phone VARCHAR(20),
  mobile VARCHAR(20),
  email VARCHAR(255),
  city VARCHAR(100),
  region VARCHAR(100),
  postal_code VARCHAR(20),
  country VARCHAR(100) DEFAULT 'المملكة العربية السعودية',
  tax_number VARCHAR(50),
  commercial_registration VARCHAR(100),
  currency VARCHAR(50) DEFAULT 'ريال سعودي',
  opening_balance DECIMAL(10, 2),
  opening_balance_date DATE,
  notes TEXT,
  attachments TEXT,
  created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (supplier_id)
);

-- جدول صلاحيات المستخدمين (User Permissions)
CREATE TABLE IF NOT EXISTS user_permissions (
  user_id INT AUTO_INCREMENT PRIMARY KEY,
  user_name VARCHAR(255) NOT NULL,
  status ENUM('نشط', 'غير نشط') NOT NULL,
  allow_approve_reject TINYINT(1) DEFAULT 0,
  permission_add_new_order TINYINT(1) DEFAULT 0,
  permission_approve_reject_orders TINYINT(1) DEFAULT 0,
  permission_view_orders TINYINT(1) DEFAULT 1,
  permission_manage_inventory TINYINT(1) DEFAULT 0,
  permission_manage_products TINYINT(1) DEFAULT 0,
  FOREIGN KEY (user_id) REFERENCES users(id)
);

-- جدول الأنشطة (Activity Logs)
CREATE TABLE IF NOT EXISTS activity_logs (
  log_id INT AUTO_INCREMENT PRIMARY KEY,
  user_id INT,
  activity_type ENUM('Add', 'Edit', 'Delete') NOT NULL,
  activity_description TEXT NOT NULL,
  activity_date DATETIME DEFAULT CURRENT_TIMESTAMP,
  ip_address VARCHAR(45),
  module_affected VARCHAR(100),
  FOREIGN KEY (user_id) REFERENCES users(id)
);

-- جدول الحضور (Attendance)
CREATE TABLE IF NOT EXISTS attendance (
  attendance_id INT AUTO_INCREMENT PRIMARY KEY,
  employee_id INT,
  date DATE NOT NULL,
  check_in_time TIME,
  check_out_time TIME,
  break_start_time TIME,
  break_end_time TIME,
  status ENUM('Present', 'Absent', 'Late', 'On Leave') DEFAULT 'Present',
  location VARCHAR(255),
  FOREIGN KEY (employee_id) REFERENCES employees(employee_id)
);

-- جدول إدارة الفروع (Branch Management)
CREATE TABLE IF NOT EXISTS branch_management (
  management_id INT AUTO_INCREMENT PRIMARY KEY,
  branch_id INT,
  employee_id INT,
  role_in_branch VARCHAR(100),
  start_date DATE NOT NULL,
  end_date DATE,
  FOREIGN KEY (branch_id) REFERENCES branches(branch_id),
  FOREIGN KEY (employee_id) REFERENCES employees(employee_id)
);

-- جدول المنتجات (Products)
CREATE TABLE IF NOT EXISTS products (
  product_id INT AUTO_INCREMENT PRIMARY KEY,
  product_name VARCHAR(255) NOT NULL,
  description TEXT,
  category VARCHAR(100),
  price DECIMAL(10, 2) NOT NULL,
  stock_quantity INT DEFAULT 0,
  reorder_level INT DEFAULT 0,
  created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- جدول المخزون (Inventory)
CREATE TABLE IF NOT EXISTS inventory (
  inventory_id INT AUTO_INCREMENT PRIMARY KEY,
  product_id INT NOT NULL,
  branch_id INT,
  quantity INT NOT NULL,
  movement_type ENUM('In', 'Out') NOT NULL,
  movement_date DATE NOT NULL,
  notes TEXT,
  FOREIGN KEY (product_id) REFERENCES products(product_id),
  FOREIGN KEY (branch_id) REFERENCES branches(branch_id)
);

-- جدول أوامر الشراء (Purchase Orders)
CREATE TABLE IF NOT EXISTS purchase_orders (
  order_id INT AUTO_INCREMENT PRIMARY KEY,
  supplier_id INT NOT NULL,
  order_date DATE NOT NULL,
  expected_delivery_date DATE,
  total_amount DECIMAL(10, 2),
  status ENUM('Pending', 'Approved', 'Rejected', 'Received') DEFAULT 'Pending',
  created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
  FOREIGN KEY (supplier_id) REFERENCES suppliers(supplier_id)
);

-- جدول بنود أوامر الشراء (Purchase Order Items)
CREATE TABLE IF NOT EXISTS purchase_order_items (
  item_id INT AUTO_INCREMENT PRIMARY KEY,
  order_id INT NOT NULL,
  product_id INT NOT NULL,
  quantity INT NOT NULL,
  unit_price DECIMAL(10, 2),
  total_price DECIMAL(10, 2),
  FOREIGN KEY (order_id) REFERENCES purchase_orders(order_id),
  FOREIGN KEY (product_id) REFERENCES products(product_id)
);

-- جدول الإشعارات (Notifications)
CREATE TABLE IF NOT EXISTS notifications (
  notification_id INT AUTO_INCREMENT PRIMARY KEY,
  user_id INT NOT NULL,
  message TEXT NOT NULL,
  status ENUM('Unread', 'Read') DEFAULT 'Unread',
  created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
  FOREIGN KEY (user_id) REFERENCES users(id)
);

-- إدارة شحن الأرصدة (Balance Recharge Management)
CREATE TABLE IF NOT EXISTS balance_recharges (
  recharge_id INT AUTO_INCREMENT PRIMARY KEY,
  user_id INT NOT NULL,
  client_id INT,
  recharge_amount DECIMAL(10, 2) NOT NULL,
  recharge_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
  payment_method ENUM('Cash', 'Credit Card', 'Bank Transfer', 'Other') NOT NULL,
  status ENUM('Pending', 'Completed', 'Failed') DEFAULT 'Pending',
  notes TEXT,
  FOREIGN KEY (user_id) REFERENCES users(id),
  FOREIGN KEY (client_id) REFERENCES clients(client_id)
);

-- التقارير (Reports)
CREATE TABLE IF NOT EXISTS reports (
  report_id INT AUTO_INCREMENT PRIMARY KEY,
  report_name VARCHAR(255) NOT NULL,
  created_by INT NOT NULL,
  report_type VARCHAR(100),
  created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
  data JSON,
  FOREIGN KEY (created_by) REFERENCES users(id)
);

-- المتجر الإلكتروني (E-Commerce Store)
CREATE TABLE IF NOT EXISTS ecom_products (
  product_id INT AUTO_INCREMENT PRIMARY KEY,
  name VARCHAR(255) NOT NULL,
  description TEXT,
  price DECIMAL(10, 2) NOT NULL,
  stock_quantity INT DEFAULT 0,
  category VARCHAR(100),
  status ENUM('Available', 'Out of Stock') DEFAULT 'Available',
  created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

CREATE TABLE IF NOT EXISTS ecom_orders (
  order_id INT AUTO_INCREMENT PRIMARY KEY,
  client_id INT NOT NULL,
  order_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
  total_amount DECIMAL(10, 2),
  status ENUM('Pending', 'Shipped', 'Delivered', 'Cancelled') DEFAULT 'Pending',
  payment_status ENUM('Paid', 'Unpaid') DEFAULT 'Unpaid',
  FOREIGN KEY (client_id) REFERENCES clients(client_id)
);

CREATE TABLE IF NOT EXISTS ecom_order_items (
  item_id INT AUTO_INCREMENT PRIMARY KEY,
  order_id INT NOT NULL,
  product_id INT NOT NULL,
  quantity INT NOT NULL,
  unit_price DECIMAL(10, 2),
  total_price DECIMAL(10, 2),
  FOREIGN KEY (order_id) REFERENCES ecom_orders(order_id),
  FOREIGN KEY (product_id) REFERENCES ecom_products(product_id)
);

-- نقاط البيع (Point of Sale - POS)
CREATE TABLE IF NOT EXISTS pos_transactions (
  transaction_id INT AUTO_INCREMENT PRIMARY KEY,
  transaction_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
  cashier_id INT NOT NULL,
  total_amount DECIMAL(10, 2) NOT NULL,
  payment_method ENUM('Cash', 'Card', 'Other'),
  status ENUM('Completed', 'Pending', 'Cancelled') DEFAULT 'Completed',
  FOREIGN KEY (cashier_id) REFERENCES users(id)
);

CREATE TABLE IF NOT EXISTS pos_transaction_items (
  item_id INT AUTO_INCREMENT PRIMARY KEY,
  transaction_id INT NOT NULL,
  product_id INT NOT NULL,
  quantity INT NOT NULL,
  unit_price DECIMAL(10, 2),
  total_price DECIMAL(10, 2),
  FOREIGN KEY (transaction_id) REFERENCES pos_transactions(transaction_id),
  FOREIGN KEY (product_id) REFERENCES ecom_products(product_id)
);

-- نقاط الولاء (Loyalty Points)
CREATE TABLE IF NOT EXISTS loyalty_points (
  loyalty_id INT AUTO_INCREMENT PRIMARY KEY,
  client_id INT NOT NULL,
  points_earned INT NOT NULL,
  points_redeemed INT DEFAULT 0,
  total_points INT GENERATED ALWAYS AS (points_earned - points_redeemed) STORED,
  last_updated TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  FOREIGN KEY (client_id) REFERENCES clients(client_id)
);

-- حضور العملاء (Client Attendance)
CREATE TABLE IF NOT EXISTS client_attendance (
  attendance_id INT AUTO_INCREMENT PRIMARY KEY,
  client_id INT NOT NULL,
  event_name VARCHAR(255) NOT NULL,
  date DATE NOT NULL,
  status ENUM('Attended', 'Absent') DEFAULT 'Attended',
  notes TEXT,
  FOREIGN KEY (client_id) REFERENCES clients(client_id)
);

-- جدول الحسابات العامة (General Ledger)
CREATE TABLE IF NOT EXISTS general_ledger (
  ledger_id INT AUTO_INCREMENT PRIMARY KEY,
  account_name VARCHAR(255) NOT NULL,
  account_type ENUM('Asset', 'Liability', 'Equity', 'Revenue', 'Expense') NOT NULL,
  balance DECIMAL(15, 2) DEFAULT 0,
  created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- جدول معاملات الحسابات العامة (Ledger Transactions)
CREATE TABLE IF NOT EXISTS ledger_transactions (
  transaction_id INT AUTO_INCREMENT PRIMARY KEY,
  ledger_id INT NOT NULL,
  transaction_date DATE NOT NULL,
  amount DECIMAL(15, 2) NOT NULL,
  transaction_type ENUM('Debit', 'Credit') NOT NULL,
  description TEXT,
  created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
  FOREIGN KEY (ledger_id) REFERENCES general_ledger(ledger_id)
);

-- جدول تتبع الوقت (Time Tracking)
CREATE TABLE IF NOT EXISTS time_tracking (
  time_tracking_id INT PRIMARY KEY AUTO_INCREMENT,
  representative_id INT, -- معرف المندوب
  start_time DATETIME,
  end_time DATETIME,
  task_description VARCHAR(255),
  created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
  FOREIGN KEY (representative_id) REFERENCES employees(employee_id)
);

-- جدول دورة الشيكات (Cheques Cycle)
CREATE TABLE IF NOT EXISTS cheques_cycle (
  cheque_cycle_id INT PRIMARY KEY AUTO_INCREMENT,
  cheque_number VARCHAR(50),
  issue_date DATE,
  due_date DATE,
  amount DECIMAL(10, 2),
  status ENUM('Issued', 'Cleared', 'Bounced', 'Pending'),
  client_id INT, -- معرف العميل
  created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
  FOREIGN KEY (client_id) REFERENCES clients(client_id)
);

-- جدول الدردشة (Chat)
CREATE TABLE IF NOT EXISTS chat (
  chat_id INT PRIMARY KEY AUTO_INCREMENT,
  sender_id INT, -- معرف المرسل
  receiver_id INT, -- معرف المستقبل
  message_content TEXT,
  sent_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
  is_read BOOLEAN DEFAULT FALSE,
  FOREIGN KEY (sender_id) REFERENCES users(id),
  FOREIGN KEY (receiver_id) REFERENCES users(id)
);

-- جدول مواقع العملاء (Customer Locations)
CREATE TABLE IF NOT EXISTS customer_locations (
  location_id INT PRIMARY KEY AUTO_INCREMENT,
  client_id INT, -- معرف العميل
  latitude DECIMAL(10, 8),
  longitude DECIMAL(11, 8),
  address VARCHAR(255),
  created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
  FOREIGN KEY (client_id) REFERENCES clients(client_id)
);

-- جدول الحضور والانصراف للمناديب (Attendance)
CREATE TABLE IF NOT EXISTS attendance (
  attendance_id INT PRIMARY KEY AUTO_INCREMENT,
  representative_id INT, -- معرف المندوب
  check_in_time DATETIME,
  check_out_time DATETIME,
  location_check_in VARCHAR(255),
  location_check_out VARCHAR(255),
  date DATE,
  created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
  FOREIGN KEY (representative_id) REFERENCES employees(employee_id)
);
-- جدول عروض الاسعار (Quotes)
CREATE TABLE IF NOT EXISTS quotes (
  quote_id INT AUTO_INCREMENT PRIMARY KEY,
  client_id INT, -- إذا كان لديك جدول للعملاء، يمكنك استخدام معرف العميل
  quote_date DATE NOT NULL,
  total_amount DECIMAL(10, 2),
  status ENUM('مبدئي', 'مقبول', 'مرفوض') DEFAULT 'مبدئي',
  created_by INT NOT NULL, -- معرف الموظف الذي أنشأ عرض السعر
  created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
  FOREIGN KEY (created_by) REFERENCES employees(employee_id) -- الربط مع جدول الموظفين
);
--  الاسعار تفاصيل المنتجات في عرض
CREATE TABLE IF NOT EXISTS quote_items (
  quote_item_id INT AUTO_INCREMENT PRIMARY KEY,
  quote_id INT NOT NULL, -- الربط مع جدول عروض الأسعار
  product_id INT NOT NULL, -- الربط مع جدول المنتجات
  quantity INT NOT NULL,
  unit_price DECIMAL(10, 2) NOT NULL,
  total_price DECIMAL(10, 2) NOT NULL,
  FOREIGN KEY (quote_id) REFERENCES quotes(quote_id) ON DELETE CASCADE,
  FOREIGN KEY (product_id) REFERENCES products(product_id) ON DELETE CASCADE
);
--جدول أشعارات مدينة

CREATE TABLE credit_notifications (
    id INT AUTO_INCREMENT PRIMARY KEY,
    client_name VARCHAR(255) NOT NULL, -- اسم العميل
    city VARCHAR(255), -- المدينة
    tax_number VARCHAR(50), -- الرقم الضريبي
    amount DECIMAL(10, 2) NOT NULL, -- المبلغ
    notification_number VARCHAR(50), -- رقم الإشعار
    created_by VARCHAR(255), -- اسم المستخدم الذي أنشأ الإشعار
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP, -- تاريخ ووقت الإنشاء
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP -- تاريخ ووقت التحديث
);

-- جدول chart_of_accounts (دليل الحسابات)
CREATE TABLE `chart_of_accounts` (
    `id` BIGINT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    `account_name` VARCHAR(255) NOT NULL,
    `account_type` ENUM('asset', 'liability', 'equity', 'revenue', 'expense') NOT NULL,
    `parent_id` BIGINT UNSIGNED DEFAULT NULL,
    `created_at` TIMESTAMP NULL DEFAULT NULL,
    `updated_at` TIMESTAMP NULL DEFAULT NULL
);

-- جدول bank_accounts (الحسابات البنكية)
CREATE TABLE `bank_accounts` (
    `id` BIGINT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    `bank_name` VARCHAR(255) NOT NULL,
    `account_number` VARCHAR(255) NOT NULL,
    `branch_name` VARCHAR(255) DEFAULT NULL,
    `account_holder_name` VARCHAR(255) NOT NULL,
    `account_status` ENUM('active', 'inactive') DEFAULT 'active',
    `currency` VARCHAR(10) NOT NULL,
    `description` TEXT DEFAULT NULL,
    `permissions` ENUM('withdraw', 'deposit', 'both') DEFAULT 'both',
    `balance` DECIMAL(15, 2) DEFAULT 0,
    `account_id` BIGINT UNSIGNED NOT NULL,
    `created_at` TIMESTAMP NULL DEFAULT NULL,
    `updated_at` TIMESTAMP NULL DEFAULT NULL,
    FOREIGN KEY (`account_id`) REFERENCES `chart_of_accounts`(`id`) ON DELETE CASCADE
);

-- جدول treasuries (الخزائن)
CREATE TABLE `treasuries` (
    `id` BIGINT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    `name` VARCHAR(255) NOT NULL,
    `location` VARCHAR(255) DEFAULT NULL,
    `treasury_status` ENUM('active', 'inactive') DEFAULT 'active',
    `description` TEXT DEFAULT NULL,
    `balance` DECIMAL(15, 2) DEFAULT 0,
    `created_at` TIMESTAMP NULL DEFAULT NULL,
    `updated_at` TIMESTAMP NULL DEFAULT NULL
);

-- جدول treasury_accounts (حسابات الخزائن)
CREATE TABLE `treasury_accounts` (
    `id` BIGINT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    `treasury_id` BIGINT UNSIGNED NOT NULL,
    `account_id` BIGINT UNSIGNED NOT NULL,
    `created_at` TIMESTAMP NULL DEFAULT NULL,
    `updated_at` TIMESTAMP NULL DEFAULT NULL,
    FOREIGN KEY (`treasury_id`) REFERENCES `treasuries`(`id`) ON DELETE CASCADE,
    FOREIGN KEY (`account_id`) REFERENCES `chart_of_accounts`(`id`) ON DELETE CASCADE
);

-- جدول journal_entries (قيود اليومية)
CREATE TABLE `journal_entries` (
    `id` BIGINT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    `date` DATE NOT NULL,
    `description` TEXT DEFAULT NULL,
    `currency` VARCHAR(255) DEFAULT NULL,
    `attachment` VARCHAR(255) DEFAULT NULL,
    `client_id` BIGINT UNSIGNED DEFAULT NULL,
    `employee_id` BIGINT UNSIGNED DEFAULT NULL,
    `invoice_id` BIGINT UNSIGNED DEFAULT NULL,
    `created_at` TIMESTAMP NULL DEFAULT NULL,
    `updated_at` TIMESTAMP NULL DEFAULT NULL,
    FOREIGN KEY (`client_id`) REFERENCES `clients`(`id`) ON DELETE CASCADE,
    FOREIGN KEY (`employee_id`) REFERENCES `employees`(`id`) ON DELETE CASCADE,
    FOREIGN KEY (`invoice_id`) REFERENCES `invoices`(`id`) ON DELETE CASCADE
);

-- جدول journal_entry_details (تفاصيل قيود اليومية)
CREATE TABLE `journal_entry_details` (
    `id` BIGINT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    `journal_entry_id` BIGINT UNSIGNED NOT NULL,
    `account_id` BIGINT UNSIGNED NOT NULL,
    `description` VARCHAR(255) DEFAULT NULL,
    `debit` DECIMAL(15, 2) DEFAULT 0,
    `credit` DECIMAL(15, 2) DEFAULT 0,
    `created_at` TIMESTAMP NULL DEFAULT NULL,
    `updated_at` TIMESTAMP NULL DEFAULT NULL,
    FOREIGN KEY (`journal_entry_id`) REFERENCES `journal_entries`(`id`) ON DELETE CASCADE,
    FOREIGN KEY (`account_id`) REFERENCES `chart_of_accounts`(`id`) ON DELETE CASCADE
);

-- جدول payment_vouchers (سندات الدفع)
CREATE TABLE `payment_vouchers` (
    `id` BIGINT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    `date` DATE NOT NULL,
    `payee_name` VARCHAR(255) NOT NULL,
    `amount` DECIMAL(15, 2) NOT NULL,
    `description` TEXT DEFAULT NULL,
    `account_id` BIGINT UNSIGNED NOT NULL,
    `created_by` VARCHAR(255) DEFAULT NULL,
    `created_at` TIMESTAMP NULL DEFAULT NULL,
    `updated_at` TIMESTAMP NULL DEFAULT NULL,
    FOREIGN KEY (`account_id`) REFERENCES `chart_of_accounts`(`id`) ON DELETE CASCADE
);

-- جدول receipt_vouchers (سندات القبض)
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateReceiptsTable extends Migration
{
    public function up()
    {
        Schema::create('receipts', function (Blueprint $table) {
            $table->id();
            $table->string('code')->unique(); // رقم السند
            $table->decimal('amount', 15, 2); // المبلغ
            $table->text('description')->nullable(); // الوصف
            $table->string('currency')->default('SAR'); // العملة
            $table->date('date'); // تاريخ السند
            $table->foreignId('unit_id')->constrained(); // جدول الوحدات
            $table->foreignId('employee_id')->constrained(); // جدول الموظفين
            $table->foreignId('treasury_id')->constrained(); // جدول الخزائن
            $table->enum('classification', ['default', 'custom'])->default('default'); // التصنيف
            $table->boolean('is_recurring')->default(false); // هل السند مكرر؟
            $table->enum('recurrence_type', ['daily', 'weekly', 'monthly'])->nullable(); // نوع التكرار
            $table->date('recurrence_start_date')->nullable(); // تاريخ بدء التكرار
            $table->date('recurrence_end_date')->nullable(); // تاريخ انتهاء التكرار (اختياري)
            $table->foreignId('account_id')->constrained(); // جدول الحسابات
            $table->foreignId('client_id')->constrained(); // العلاقة مع جدول العملاء
            $table->json('attachments')->nullable(); // المرفقات (تخزينها بصيغة JSON لحفظ روابط الملفات)
            $table->timestamps(); // تواريخ الإنشاء والتحديث
        });

        // جدول pivot لعلاقة عديدة إلى عديدة مع الضرائب
        Schema::create('receipt_tax', function (Blueprint $table) {
            $table->id();
            $table->foreignId('receipt_id')->constrained(); // مفتاح خارجي إلى سند القبض
            $table->foreignId('tax_id')->constrained(); // مفتاح خارجي إلى الضرائب
            $table->timestamps();
        });

        // جدول pivot لعلاقة عديدة إلى عديدة مع القيود المحاسبية
        Schema::create('receipt_journal_entry', function (Blueprint $table) {
            $table->id();
            $table->foreignId('receipt_id')->constrained(); // مفتاح خارجي إلى سند القبض
            $table->foreignId('journal_entry_id')->constrained(); // مفتاح خارجي إلى القيود
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('receipt_journal_entry');
        Schema::dropIfExists('receipt_tax');
        Schema::dropIfExists('receipts');
    }
}


-- جدول taxes (الضرائب)
CREATE TABLE `taxes` (
    `id` BIGINT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    `name` VARCHAR(255) NOT NULL,
    `rate` DECIMAL(5, 2) NOT NULL,
    `description` TEXT DEFAULT NULL,
    `account_id` BIGINT UNSIGNED NOT NULL,
    `created_at` TIMESTAMP NULL DEFAULT NULL,
    `updated_at` TIMESTAMP NULL DEFAULT NULL,
    FOREIGN KEY (`account_id`) REFERENCES `chart_of_accounts`(`id`) ON DELETE CASCADE
);

-- جدول expenses (المصروفات) مع الربط
CREATE TABLE `expenses` (
    `id` BIGINT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    `date` DATE NOT NULL,
    `expense_type` VARCHAR(255) NOT NULL,
    `amount` DECIMAL(15, 2) NOT NULL,
    `description` TEXT DEFAULT NULL,
    `account_id` BIGINT UNSIGNED NOT NULL,
    `treasury_id` BIGINT UNSIGNED DEFAULT NULL,
    `bank_account_id` BIGINT UNSIGNED DEFAULT NULL,
    `journal_entry_id` BIGINT UNSIGNED DEFAULT NULL,
    `created_by` VARCHAR(255) DEFAULT NULL,
    `created_at` TIMESTAMP NULL DEFAULT NULL,
    `updated_at` TIMESTAMP NULL DEFAULT NULL,
    FOREIGN KEY (`account_id`) REFERENCES `chart_of_accounts`(`id`) ON DELETE CASCADE,
    FOREIGN KEY (`treasury_id`) REFERENCES `treasuries`(`id`) ON DELETE SET NULL,
    FOREIGN KEY (`bank_account_id`) REFERENCES `bank_accounts`(`id`) ON DELETE SET NULL,
    FOREIGN KEY (`journal_entry_id`) REFERENCES `journal_entries`(`id`) ON DELETE SET NULL
);

-- جدول revenues (الإيرادات) مع الربط
CREATE TABLE `revenues` (
    `id` BIGINT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    `date` DATE NOT NULL,
    `source` VARCHAR(255) NOT NULL,
    `amount` DECIMAL(15, 2) NOT NULL,
    `description` TEXT DEFAULT NULL,
    `account_id` BIGINT UNSIGNED NOT NULL,
    `treasury_id` BIGINT UNSIGNED DEFAULT NULL,
    `bank_account_id` BIGINT UNSIGNED DEFAULT NULL,
    `journal_entry_id` BIGINT UNSIGNED DEFAULT NULL,
    `created_by` VARCHAR(255) DEFAULT NULL,
    `created_at` TIMESTAMP NULL DEFAULT NULL,
    `updated_at` TIMESTAMP NULL DEFAULT NULL,
    FOREIGN KEY (`account_id`) REFERENCES `chart_of_accounts`(`id`) ON DELETE CASCADE,
    FOREIGN KEY (`treasury_id`) REFERENCES `treasuries`(`id`) ON DELETE SET NULL,
    FOREIGN KEY (`bank_account_id`) REFERENCES `bank_accounts`(`id`) ON DELETE SET NULL,
    FOREIGN KEY (`journal_entry_id`) REFERENCES `journal_entries`(`id`) ON DELETE SET NULL
);
