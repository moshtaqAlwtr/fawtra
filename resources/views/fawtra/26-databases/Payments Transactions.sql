CREATE TABLE payment_transactions (
    transaction_id INT AUTO_INCREMENT PRIMARY KEY,  -- معرف العملية
    payment_id INT,  -- معرف الدفع (ربط مع جدول مدفوعات العملاء أو الموردين)
    transaction_date DATE NOT NULL,  -- تاريخ إجراء العملية
    amount DECIMAL(10, 2) NOT NULL,  -- المبلغ الذي تم دفعه
    payment_method ENUM('Cash', 'Bank Transfer', 'Credit Card', 'Other') NOT NULL,  -- طريقة الدفع
    status ENUM('Completed', 'Pending', 'Failed') DEFAULT 'Pending',  -- حالة العملية
    reference_number VARCHAR(100),  -- رقم المرجع لعملية الدفع
    notes TEXT,  -- ملاحظات إضافية
    FOREIGN KEY (payment_id) REFERENCES payments(payment_id)  -- الربط مع جدول مدفوعات العملاء أو الموردين
);
