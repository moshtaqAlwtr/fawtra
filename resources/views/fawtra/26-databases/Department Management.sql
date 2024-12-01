CREATE TABLE department_management (
    management_id INT AUTO_INCREMENT PRIMARY KEY,  -- معرف الإدارة
    department_id INT NOT NULL,  -- معرف القسم
    employee_id INT NOT NULL,  -- معرف الموظف
    role_name VARCHAR(100),  -- اسم الدور الوظيفي في القسم
    start_date DATE NOT NULL,  -- تاريخ بدء الدور
    end_date DATE,  -- تاريخ نهاية الدور (في حال انتهاء المدة)
    FOREIGN KEY (department_id) REFERENCES departments(department_id),  -- الربط مع جدول الأقسام
    FOREIGN KEY (employee_id) REFERENCES employees(employee_id)  -- الربط مع جدول الموظفين
);
