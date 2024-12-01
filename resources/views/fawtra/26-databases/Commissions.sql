CREATE TABLE commissions (
    commission_id INT AUTO_INCREMENT PRIMARY KEY,  -- معرف العمولة
    employee_id INT,  -- معرف الموظف (ربط مع جدول الموظفين)
    sales_amount DECIMAL(10, 2) NOT NULL,  -- المبلغ الذي تم تحقيقه من المبيعات
    commission_rate DECIMAL(5, 2) NOT NULL,  -- نسبة العمولة
    commission_amount DECIMAL(10, 2) AS (sales_amount * commission_rate / 100),  -- مبلغ العمولة
    payment_status ENUM('Pending', 'Paid') DEFAULT 'Pending',  -- حالة دفع العمولة
    FOREIGN KEY (employee_id) REFERENCES employees(employee_id)  -- الربط مع جدول الموظفين
);
