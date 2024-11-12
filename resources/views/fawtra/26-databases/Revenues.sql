CREATE TABLE revenues (
    revenue_id INT AUTO_INCREMENT PRIMARY KEY,  -- معرف الإيراد
    revenue_date DATE NOT NULL,  -- تاريخ تسجيل الإيراد
    revenue_category VARCHAR(100) NOT NULL,  -- فئة الإيراد
    amount DECIMAL(10, 2) NOT NULL,  -- المبلغ المحصل
    client_id INT,  -- معرف العميل (إذا كان الإيراد مرتبطًا بعميل)
    payment_method ENUM('Cash', 'Bank Transfer', 'Credit Card', 'Other') NOT NULL,  -- طريقة الدفع
    notes TEXT,  -- ملاحظات إضافية
    status ENUM('Completed', 'Pending', 'Cancelled') DEFAULT 'Pending',  -- حالة الإيراد
    FOREIGN KEY (client_id) REFERENCES clients(client_id)  -- الربط مع جدول العملاء
);
