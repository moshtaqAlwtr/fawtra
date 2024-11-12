CREATE TABLE employee_roles (
    role_id INT AUTO_INCREMENT PRIMARY KEY,  -- معرف الدور
    role_name VARCHAR(100) NOT NULL,  -- اسم الدور
    permissions TEXT  -- صلاحيات الدور
);
