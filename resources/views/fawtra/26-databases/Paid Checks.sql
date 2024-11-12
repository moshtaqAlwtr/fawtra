CREATE TABLE paid_checks (
    check_id INT AUTO_INCREMENT PRIMARY KEY,  -- معرف الشيك
    supplier_id INT,  -- معرف المورد (ربط مع جدول الموردين)
    check_number VARCHAR(50) NOT NULL,  -- رقم الشيك
    amount DECIMAL(10, 2) NOT NULL,  -- مبلغ الشيك
    payment_date DATE NOT NULL,  -- تاريخ الدفع
    status ENUM('Pending', 'Cleared', 'Bounced') DEFAULT 'Pending',  -- حالة الشيك
    FOREIGN KEY (supplier_id) REFERENCES suppliers(supplier_id)  -- الربط مع جدول الموردين
);
