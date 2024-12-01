CREATE TABLE invoices (
  invoice_id INT(11) NOT NULL AUTO_INCREMENT,              -- رقم الفاتورة (المعرف الفريد)
  client_id INT(11) NOT NULL,                              -- معرف العميل (يربط بجدول العملاء)
  invoice_number VARCHAR(100) NOT NULL,                    -- رقم الفاتورة (يمكن أن يكون تلقائي أو يدوي)
  invoice_date DATE,                                       -- تاريخ الفاتورة
  sales_manager VARCHAR(100),                              -- مسؤول المبيعات
  issue_date DATE,                                         -- تاريخ الإصدار
  payment_terms VARCHAR(255),                              -- شروط الدفع
  total DECIMAL(10, 2),                                    -- الإجمالي
  grand_total DECIMAL(10, 2),                              -- المجموع الكلي
  created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,          -- تاريخ الإنشاء
  PRIMARY KEY (invoice_id),                                -- المفتاح الأساسي
  FOREIGN KEY (client_id) REFERENCES clients(client_id)     -- ربط العميل بجدول العملاء
);
