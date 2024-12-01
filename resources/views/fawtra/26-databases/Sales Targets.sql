CREATE TABLE sales_targets (
    target_id INT AUTO_INCREMENT PRIMARY KEY,  -- معرف المبيعات المستهدفة
    employee_id INT,  -- معرف الموظف (ربط مع جدول الموظفين)
    target_amount DECIMAL(10, 2) NOT NULL,  -- قيمة المبيعات المستهدفة
    start_date DATE NOT NULL,  -- تاريخ بدء الفترة المستهدفة
    end_date DATE NOT NULL,  -- تاريخ نهاية الفترة المستهدفة
    status ENUM('Achieved', 'Not Achieved') DEFAULT 'Not Achieved',  -- حالة تحقيق الهدف
    FOREIGN KEY (employee_id) REFERENCES employees(employee_id)  -- الربط مع جدول الموظفين
);
