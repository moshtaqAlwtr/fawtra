CREATE TABLE payroll (
    payroll_id INT AUTO_INCREMENT PRIMARY KEY,  -- معرف المرتب
    employee_id INT,  -- معرف الموظف (ربط مع جدول الموظفين)
    payment_date DATE NOT NULL,  -- تاريخ دفع المرتب
    basic_salary DECIMAL(10, 2),  -- المرتب الأساسي
    allowances DECIMAL(10, 2),  -- البدلات
    deductions DECIMAL(10, 2),  -- الخصومات
    net_salary DECIMAL(10, 2) AS (basic_salary + allowances - deductions),  -- المرتب الصافي
    payment_status ENUM('Paid', 'Unpaid') DEFAULT 'Unpaid',  -- حالة الدفع
    FOREIGN KEY (employee_id) REFERENCES employees(employee_id)  -- الربط مع جدول الموظفين
);
