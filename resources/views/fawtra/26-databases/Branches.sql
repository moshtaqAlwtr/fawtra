CREATE TABLE branches (
    branch_id INT AUTO_INCREMENT PRIMARY KEY,  -- معرف الفرع
    branch_name VARCHAR(100) NOT NULL,  -- اسم الفرع
    location VARCHAR(255),  -- موقع الفرع
    manager_id INT,  -- معرف المدير (ربط مع جدول الموظفين)
    contact_info VARCHAR(255),  -- معلومات الاتصال
    status ENUM('Active', 'Inactive') DEFAULT 'Active',  -- حالة الفرع
    FOREIGN KEY (manager_id) REFERENCES employees(employee_id)  -- الربط مع جدول الموظفين
);
