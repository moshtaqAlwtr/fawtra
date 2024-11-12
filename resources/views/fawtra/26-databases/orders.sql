CREATE TABLE orders (
    order_id INT AUTO_INCREMENT PRIMARY KEY,  -- معرف الطلب (فريد)
    client_id INT,  -- معرف العميل (ربط مع جدول العملاء)
    supplier_id INT,  -- معرف المورد (ربط مع جدول الموردين)
    order_date DATE NOT NULL,  -- تاريخ الطلب
    total_amount DECIMAL(10, 2) NOT NULL,  -- إجمالي المبلغ
    status ENUM('Pending', 'Completed', 'Cancelled') DEFAULT 'Pending',  -- حالة الطلب
    payment_status ENUM('Paid', 'Unpaid', 'Partial') DEFAULT 'Unpaid',  -- حالة الدفع
    delivery_date DATE,  -- تاريخ التسليم
    notes TEXT,  -- ملاحظات إضافية
    FOREIGN KEY (client_id) REFERENCES clients(client_id),  -- الربط مع جدول العملاء
    FOREIGN KEY (supplier_id) REFERENCES suppliers(supplier_id)  -- الربط مع جدول الموردين
);
