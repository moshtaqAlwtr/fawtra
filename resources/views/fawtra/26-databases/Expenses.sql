CREATE TABLE expenses (
    expense_id INT AUTO_INCREMENT PRIMARY KEY,  -- معرف المصروف
    expense_date DATE NOT NULL,  -- تاريخ صرف المصروف
    expense_category VARCHAR(100) NOT NULL,  -- فئة المصروف
    amount DECIMAL(10, 2) NOT NULL,  -- المبلغ المصروف
    supplier_id INT,  -- معرف المورد (إذا كان المصروف مرتبطًا بمورد)
    payment_method ENUM('Cash', 'Bank Transfer', 'Credit Card', 'Other') NOT NULL,  -- طريقة الدفع
    notes TEXT,  -- ملاحظات إضافية
    status ENUM('Completed', 'Pending', 'Cancelled') DEFAULT 'Pending',  -- حالة المصروف
    FOREIGN KEY (supplier_id) REFERENCES suppliers(supplier_id)  -- الربط مع جدول الموردين
);
