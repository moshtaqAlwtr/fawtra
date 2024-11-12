CREATE TABLE employees (
    employee_id INT AUTO_INCREMENT PRIMARY KEY,  -- معرف الموظف
    first_name VARCHAR(100) NOT NULL,  -- اسم الموظف الأول
    last_name VARCHAR(100) NOT NULL,  -- اسم العائلة
    position VARCHAR(100),  -- الوظيفة
    department VARCHAR(100),  -- القسم
    hire_date DATE NOT NULL,  -- تاريخ التوظيف
    salary DECIMAL(10, 2),  -- المرتب
    contact_info VARCHAR(255),  -- معلومات الاتصال
    status ENUM('Active', 'Inactive') DEFAULT 'Active'  -- حالة الموظف
);
