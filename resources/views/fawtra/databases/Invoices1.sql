CREATE TABLE invoices (
    invoice_id INT AUTO_INCREMENT PRIMARY KEY,  -- معرف الفاتورة
    client_id INT,  -- معرف العميل (ربط مع جدول العملاء)
    supplier_id INT,  -- معرف المورد (ربط مع جدول الموردين)
    invoice_number VARCHAR(50) NOT NULL,  -- رقم الفاتورة الفريد
    invoice_date DATE NOT NULL,  -- تاريخ إصدار الفاتورة
    due_date DATE,  -- تاريخ استحقاق الدفع
    total_amount DECIMAL(10, 2) NOT NULL,  -- إجمالي المبلغ
    paid_amount DECIMAL(10, 2) DEFAULT 0.00,  -- المبلغ المدفوع
    remaining_amount DECIMAL(10, 2) AS (total_amount - paid_amount),  -- المبلغ المتبقي
    status ENUM('Paid', 'Unpaid', 'Partially Paid') DEFAULT 'Unpaid',  -- حالة الفاتورة
    tax_amount DECIMAL(10, 2) DEFAULT 0.00,  -- المبلغ الضريبي
    discount DECIMAL(5, 2) DEFAULT 0.00,  -- الخصم
    notes TEXT,  -- ملاحظات إضافية
    FOREIGN KEY (client_id) REFERENCES clients(client_id),  -- الربط مع جدول العملاء
    FOREIGN KEY (supplier_id) REFERENCES suppliers(supplier_id)  -- الربط مع جدول الموردين
);
