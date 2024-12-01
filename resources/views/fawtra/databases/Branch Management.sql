CREATE TABLE branch_management (
    management_id INT AUTO_INCREMENT PRIMARY KEY,  -- معرف الإدارة
    branch_id INT,  -- معرف الفرع
    employee_id INT,  -- معرف الموظف
    role_in_branch VARCHAR(100),  -- دور الموظف في الفرع
    start_date DATE NOT NULL,  -- تاريخ بدء الدور
    end_date DATE,  -- تاريخ نهاية الدور (إذا انتهت المدة)
    FOREIGN KEY (branch_id) REFERENCES branches(branch_id),  -- الربط مع جدول الفروع
    FOREIGN KEY (employee_id) REFERENCES employees(employee_id)  -- الربط مع جدول الموظفين
);
