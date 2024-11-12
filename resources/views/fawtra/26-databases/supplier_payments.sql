CREATE TABLE supplier_payments (
    payment_id INT AUTO_INCREMENT PRIMARY KEY,  -- معرف الدفع (فريد)
    supplier_id INT,  -- معرف المورد (ربط مع جدول الموردين)
    invoice_id INT,  -- معرف الفاتورة المرتبطة بالدفع
    payment_date DATE NOT NULL,  -- تاريخ الدفع
    amount DECIMAL(10, 2) NOT NULL,  -- المبلغ المدفوع
    payment_method ENUM('Cash', 'Bank Transfer', 'Credit Card', 'Other') NOT NULL,  -- طريقة الدفع
    status ENUM('Paid', 'Pending', 'Failed') DEFAULT 'Pending',  -- حالة الدفع
    notes TEXT,  -- ملاحظات إضافية
    FOREIGN KEY (supplier_id) REFERENCES suppliers(supplier_id),  -- الربط مع جدول الموردين
    FOREIGN KEY (invoice_id) REFERENCES invoices(invoice_id)  -- الربط مع جدول الفواتير
);
