CREATE TABLE received_checks (
    check_id INT AUTO_INCREMENT PRIMARY KEY,  -- معرف الشيك
    client_id INT,  -- معرف العميل (ربط مع جدول العملاء)
    check_number VARCHAR(50) NOT NULL,  -- رقم الشيك
    amount DECIMAL(10, 2) NOT NULL,  -- مبلغ الشيك
    received_date DATE NOT NULL,  -- تاريخ الاستلام
    status ENUM('Pending', 'Cleared', 'Bounced') DEFAULT 'Pending',  -- حالة الشيك
    FOREIGN KEY (client_id) REFERENCES clients(client_id)  -- الربط مع جدول العملاء
);
