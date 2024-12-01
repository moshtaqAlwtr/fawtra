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
  country VARCHAR(100) DEFAULT 'المملكة العربية السعودية',
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
  client_type ENUM('عميل نقدي', 'عميل آجل') DEFAULT 'عميل نقدي',
  notes TEXT,
  attachments TEXT,
  display_language ENUM('العربية', 'الإنجليزية') DEFAULT 'العربية',
  created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (client_id)
);

-- جدول الحسابات المالية (Financial Accounts)
CREATE TABLE IF NOT EXISTS financial_accounts (
  account_id INT AUTO_INCREMENT PRIMARY KEY,
  account_name VARCHAR(255) NOT NULL,
  account_code VARCHAR(100) NOT NULL,
  account_type ENUM('Asset', 'Liability', 'Equity', 'Revenue', 'Expense') NOT NULL,
  parent_account_id INT,
  opening_balance DECIMAL(15, 2) DEFAULT 0.00,
  current_balance DECIMAL(15, 2) DEFAULT 0.00,
  currency VARCHAR(50) DEFAULT 'ريال سعودي',
  status ENUM('Active', 'Inactive') DEFAULT 'Active',
  created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
  updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  FOREIGN KEY (parent_account_id) REFERENCES financial_accounts(account_id)
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
  created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (invoice_id),
  FOREIGN KEY (client_id) REFERENCES clients(client_id)
);

-- جدول مدفوعات العملاء (Client Payments)
CREATE TABLE IF NOT EXISTS client_payments (
  payment_id INT AUTO_INCREMENT PRIMARY KEY,
  client_id INT,
  invoice_id INT,
  payment_date DATE NOT NULL,
  amount DECIMAL(10, 2) NOT NULL,
  payment_method ENUM('Cash', 'Bank Transfer', 'Credit Card', 'Other') NOT NULL,
  status ENUM('Paid', 'Pending', 'Failed') DEFAULT 'Pending',
  notes TEXT,
  FOREIGN KEY (client_id) REFERENCES clients(client_id),
  FOREIGN KEY (invoice_id) REFERENCES invoices(invoice_id)
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
  user_id INT,
  permission_name VARCHAR(255) NOT NULL,
  permission_level ENUM('Full', 'Partial', 'View') DEFAULT 'View',
  FOREIGN KEY (user_id) REFERENCES users(id)
);

-- جدول الأنشطة (Activity Logs)
CREATE TABLE IF NOT EXISTS activity_logs (
  log_id INT AUTO_INCREMENT PRIMARY KEY,
  user_id INT,
  activity_type ENUM('Add', 'Edit', 'Delete') NOT NULL,
  activity_description TEXT,
  activity_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
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
  status ENUM('Present', 'Absent', 'Late', 'On Leave') DEFAULT 'Present',
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

-- تابع في الرسالة التالية...
-- جدول المنتجات (Products)
CREATE TABLE IF NOT EXISTS products (
  product_id INT AUTO_INCREMENT PRIMARY KEY,
  product_name VARCHAR(255) NOT NULL,
  category_id INT,
  purchase_price DECIMAL(10, 2),
  selling_price DECIMAL(10, 2),
  stock_quantity INT,
  created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
  FOREIGN KEY (category_id) REFERENCES categories(category_id)
);

-- جدول الفئات (Categories)
CREATE TABLE IF NOT EXISTS categories (
  category_id INT AUTO_INCREMENT PRIMARY KEY,
  category_name VARCHAR(255) NOT NULL,
  description TEXT
);

-- جدول الرواتب (Salaries)
CREATE TABLE IF NOT EXISTS salaries (
  salary_id INT AUTO_INCREMENT PRIMARY KEY,
  employee_id INT,
  base_salary DECIMAL(10, 2),
  allowances DECIMAL(10, 2),
  deductions DECIMAL(10, 2),
  total_salary DECIMAL(10, 2),
  payment_date DATE,
  FOREIGN KEY (employee_id) REFERENCES employees(employee_id)
);

-- جدول العقود (Contracts)
CREATE TABLE IF NOT EXISTS contracts (
  contract_id INT AUTO_INCREMENT PRIMARY KEY,
  employee_id INT,
  start_date DATE,
  end_date DATE,
  contract_type VARCHAR(100),
  salary DECIMAL(10, 2),
  status ENUM('Active', 'Expired') DEFAULT 'Active',
  FOREIGN KEY (employee_id) REFERENCES employees(employee_id)
);

-- جدول الإيرادات (Revenues)
CREATE TABLE IF NOT EXISTS revenues (
  revenue_id INT AUTO_INCREMENT PRIMARY KEY,
  revenue_name VARCHAR(255) NOT NULL,
  amount DECIMAL(10, 2) NOT NULL,
  date DATE NOT NULL,
  category_id INT,
  FOREIGN KEY (category_id) REFERENCES categories(category_id)
);

-- جدول المصروفات (Expenses)
CREATE TABLE IF NOT EXISTS expenses (
  expense_id INT AUTO_INCREMENT PRIMARY KEY,
  expense_name VARCHAR(255) NOT NULL,
  amount DECIMAL(10, 2) NOT NULL,
  date DATE NOT NULL,
  category_id INT,
  FOREIGN KEY (category_id) REFERENCES categories(category_id)
);

-- جدول تصنيفات العملاء (Client Categories)
CREATE TABLE IF NOT EXISTS client_categories (
  category_id INT AUTO_INCREMENT PRIMARY KEY,
  category_name VARCHAR(255) NOT NULL,
  description TEXT
);

-- جدول حالات العملاء (Client Status)
CREATE TABLE IF NOT EXISTS client_status (
  status_id INT AUTO_INCREMENT PRIMARY KEY,
  status_name VARCHAR(100) NOT NULL,
  description TEXT
);

-- جدول قوالب الطباعة (Print Templates)
CREATE TABLE IF NOT EXISTS print_templates (
  template_id INT AUTO_INCREMENT PRIMARY KEY,
  template_name VARCHAR(255) NOT NULL,
  template_type ENUM('Contract', 'Invoice', 'Salary Slip') NOT NULL,
  template_content TEXT
);

-- جدول الشيكات المستلمة (Received Checks)
CREATE TABLE IF NOT EXISTS received_checks (
  check_id INT AUTO_INCREMENT PRIMARY KEY,
  client_id INT,
  check_number VARCHAR(100) NOT NULL,
  amount DECIMAL(10, 2) NOT NULL,
  received_date DATE,
  status ENUM('Cleared', 'Pending', 'Bounced') DEFAULT 'Pending',
  notes TEXT,
  FOREIGN KEY (client_id) REFERENCES clients(client_id)
);

-- جدول الشيكات المصدرة (Issued Checks)
CREATE TABLE IF NOT EXISTS issued_checks (
  check_id INT AUTO_INCREMENT PRIMARY KEY,
  supplier_id INT,
  check_number VARCHAR(100) NOT NULL,
  amount DECIMAL(10, 2) NOT NULL,
  issue_date DATE,
  status ENUM('Cleared', 'Pending', 'Returned') DEFAULT 'Pending',
  notes TEXT,
  FOREIGN KEY (supplier_id) REFERENCES suppliers(supplier_id)
);

-- جدول الحجوزات (Reservations)
CREATE TABLE IF NOT EXISTS reservations (
  reservation_id INT AUTO_INCREMENT PRIMARY KEY,
  client_id INT,
  reservation_date DATE NOT NULL,
  reservation_status ENUM('Confirmed', 'Pending', 'Cancelled') DEFAULT 'Pending',
  notes TEXT,
  FOREIGN KEY (client_id) REFERENCES clients(client_id)
);

-- جدول المتجر الإلكتروني (E-commerce)
CREATE TABLE IF NOT EXISTS ecommerce (
  product_id INT AUTO_INCREMENT PRIMARY KEY,
  product_name VARCHAR(255) NOT NULL,
  category_id INT,
  price DECIMAL(10, 2) NOT NULL,
  stock_quantity INT NOT NULL,
  description TEXT,
  status ENUM('Available', 'Out of Stock') DEFAULT 'Available',
  FOREIGN KEY (category_id) REFERENCES categories(category_id)
);

-- جدول نقاط البيع (POS)
CREATE TABLE IF NOT EXISTS pos (
  transaction_id INT AUTO_INCREMENT PRIMARY KEY,
  product_id INT,
  quantity INT NOT NULL,
  total_price DECIMAL(10, 2) NOT NULL,
  transaction_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
  FOREIGN KEY (product_id) REFERENCES products(product_id)
);

-- جدول أوامر التوريد (Supply Orders)
CREATE TABLE IF NOT EXISTS supply_orders (
  order_id INT AUTO_INCREMENT PRIMARY KEY,
  supplier_id INT,
  order_date DATE NOT NULL,
  delivery_date DATE,
  total_amount DECIMAL(10, 2),
  status ENUM('Pending', 'Delivered', 'Cancelled') DEFAULT 'Pending',
  notes TEXT,
  FOREIGN KEY (supplier_id) REFERENCES suppliers(supplier_id)
);

-- جدول الطلبات (Orders)
CREATE TABLE IF NOT EXISTS orders (
  order_id INT AUTO_INCREMENT PRIMARY KEY,
  client_id INT,
  order_date DATE NOT NULL,
  delivery_date DATE,
  order_status ENUM('Pending', 'Shipped', 'Delivered', 'Cancelled') DEFAULT 'Pending',
  total_amount DECIMAL(10, 2),
  notes TEXT,
  FOREIGN KEY (client_id) REFERENCES clients(client_id)
);

-- جدول الهيكل التنظيمي (Organizational Structure)
CREATE TABLE IF NOT EXISTS organizational_structure (
  structure_id INT AUTO_INCREMENT PRIMARY KEY,
  branch_id INT,
  department_id INT,
  job_level_id INT,
  position_id INT,
  FOREIGN KEY (branch_id) REFERENCES branches(branch_id),
  FOREIGN KEY (department_id) REFERENCES departments(department_id),
  FOREIGN KEY (job_level_id) REFERENCES job_levels(job_level_id),
  FOREIGN KEY (position_id) REFERENCES job_titles(position_id)
);

-- جدول إدارة الأقسام (Departments)
CREATE TABLE IF NOT EXISTS departments (
  department_id INT AUTO_INCREMENT PRIMARY KEY,
  department_name VARCHAR(255) NOT NULL,
  manager_id INT,
  status ENUM('Active', 'Inactive') DEFAULT 'Active',
  FOREIGN KEY (manager_id) REFERENCES employees(employee_id)
);

-- جدول إدارة المستويات الوظيفية (Job Levels)
CREATE TABLE IF NOT EXISTS job_levels (
  job_level_id INT AUTO_INCREMENT PRIMARY KEY,
  job_level_name VARCHAR(255) NOT NULL,
  description TEXT
);

-- جدول إدارة المسميات الوظيفية (Job Titles)
CREATE TABLE IF NOT EXISTS job_titles (
  position_id INT AUTO_INCREMENT PRIMARY KEY,
  position_name VARCHAR(255) NOT NULL,
  department_id INT,
  FOREIGN KEY (department_id) REFERENCES departments(department_id)
);

-- جدول إدارة أنواع الوظائف (Job Types)
CREATE TABLE IF NOT EXISTS job_types (
  job_type_id INT AUTO_INCREMENT PRIMARY KEY,
  job_type_name VARCHAR(255) NOT NULL,
  description TEXT
);

-- تابع في الرسالة التالية...
-- جدول تقارير المبيعات (Sales Reports)
CREATE TABLE IF NOT EXISTS sales_reports (
  report_id INT AUTO_INCREMENT PRIMARY KEY,
  report_date DATE NOT NULL,
  total_sales DECIMAL(10, 2),
  total_invoices INT,
  total_products_sold INT,
  branch_id INT,
  FOREIGN KEY (branch_id) REFERENCES branches(branch_id)
);

-- جدول تقارير المشتريات (Purchase Reports)
CREATE TABLE IF NOT EXISTS purchase_reports (
  report_id INT AUTO_INCREMENT PRIMARY KEY,
  report_date DATE NOT NULL,
  total_purchases DECIMAL(10, 2),
  total_orders INT,
  total_items_purchased INT,
  supplier_id INT,
  FOREIGN KEY (supplier_id) REFERENCES suppliers(supplier_id)
);

-- جدول تقارير الحسابات العامة (General Accounts Reports)
CREATE TABLE IF NOT EXISTS general_accounts_reports (
  report_id INT AUTO_INCREMENT PRIMARY KEY,
  report_date DATE NOT NULL,
  total_revenue DECIMAL(10, 2),
  total_expense DECIMAL(10, 2),
  net_balance DECIMAL(10, 2)
);

-- جدول تقارير الشيكات (Checks Reports)
CREATE TABLE IF NOT EXISTS checks_reports (
  report_id INT AUTO_INCREMENT PRIMARY KEY,
  report_date DATE NOT NULL,
  total_received_checks DECIMAL(10, 2),
  total_issued_checks DECIMAL(10, 2),
  total_cleared_checks DECIMAL(10, 2),
  total_bounced_checks DECIMAL(10, 2)
);

-- جدول تقارير النقاط والأرصدة (Balance Points Reports)
CREATE TABLE IF NOT EXISTS balance_points_reports (
  report_id INT AUTO_INCREMENT PRIMARY KEY,
  report_date DATE NOT NULL,
  total_points INT,
  total_client_balances DECIMAL(10, 2)
);

-- جدول تقارير الموظفين (Employee Reports)
CREATE TABLE IF NOT EXISTS employee_reports (
  report_id INT AUTO_INCREMENT PRIMARY KEY,
  report_date DATE NOT NULL,
  total_employees INT,
  total_active_employees INT,
  total_salary DECIMAL(10, 2)
);

-- جدول تقارير أوامر التوريد (Supply Orders Reports)
CREATE TABLE IF NOT EXISTS supply_orders_reports (
  report_id INT AUTO_INCREMENT PRIMARY KEY,
  report_date DATE NOT NULL,
  total_orders INT,
  total_pending_orders INT,
  total_completed_orders INT
);

-- جدول تقارير العملاء (Client Reports)
CREATE TABLE IF NOT EXISTS client_reports (
  report_id INT AUTO_INCREMENT PRIMARY KEY,
  report_date DATE NOT NULL,
  total_clients INT,
  total_active_clients INT,
  total_client_debts DECIMAL(10, 2)
);

-- جدول تقارير المخزون (Inventory Reports)
CREATE TABLE IF NOT EXISTS inventory_reports (
  report_id INT AUTO_INCREMENT PRIMARY KEY,
  report_date DATE NOT NULL,
  total_products INT,
  total_stock_value DECIMAL(10, 2)
);

-- جدول سجل نشاطات الحساب (Account Activity Log)
CREATE TABLE IF NOT EXISTS account_activity_log (
  log_id INT AUTO_INCREMENT PRIMARY KEY,
  user_id INT,
  activity_type ENUM('Login', 'Edit', 'Add', 'Delete') NOT NULL,
  activity_description TEXT,
  activity_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
  FOREIGN KEY (user_id) REFERENCES users(id)
);

-- جدول تقارير الأرباح والخسائر (Profit and Loss Reports)
CREATE TABLE IF NOT EXISTS profit_loss_reports (
  report_id INT AUTO_INCREMENT PRIMARY KEY,
  report_date DATE NOT NULL,
  total_revenue DECIMAL(10, 2),
  total_expenses DECIMAL(10, 2),
  net_profit DECIMAL(10, 2)
);

-- جدول تقارير التدفقات النقدية (Cash Flow Reports)
CREATE TABLE IF NOT EXISTS cash_flow_reports (
  report_id INT AUTO_INCREMENT PRIMARY KEY,
  report_date DATE NOT NULL,
  total_inflows DECIMAL(10, 2),
  total_outflows DECIMAL(10, 2),
  net_cash_flow DECIMAL(10, 2)
);

-- جدول تقارير الميزانية العمومية (Balance Sheet Reports)
CREATE TABLE IF NOT EXISTS balance_sheet_reports (
  report_id INT AUTO_INCREMENT PRIMARY KEY,
  report_date DATE NOT NULL,
  total_assets DECIMAL(10, 2),
  total_liabilities DECIMAL(10, 2),
  total_equity DECIMAL(10, 2)
);
-- جدول المستودعات (Warehouses)
CREATE TABLE IF NOT EXISTS warehouses (
  warehouse_id INT AUTO_INCREMENT PRIMARY KEY,
  warehouse_name VARCHAR(100) NOT NULL,
  location VARCHAR(255),
  manager_id INT,
  status ENUM('Active', 'Inactive') DEFAULT 'Active',
  created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
  FOREIGN KEY (manager_id) REFERENCES employees(employee_id)
);

-- جدول ربط المنتجات بالمستودعات (Warehouse Products)
CREATE TABLE IF NOT EXISTS warehouse_products (
  warehouse_product_id INT AUTO_INCREMENT PRIMARY KEY,
  warehouse_id INT,
  product_id INT,
  stock_quantity INT DEFAULT 0,
  FOREIGN KEY (warehouse_id) REFERENCES warehouses(warehouse_id),
  FOREIGN KEY (product_id) REFERENCES products(product_id)
);
