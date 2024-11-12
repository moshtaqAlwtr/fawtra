CREATE TABLE departments (
    department_id INT AUTO_INCREMENT PRIMARY KEY,  -- معرف القسم
    department_name VARCHAR(100) NOT NULL,  -- اسم القسم
    manager_id INT,  -- معرف المدير (ربط مع جدول الموظفين)
    structure_id INT,  -- معرف الهيكل التنظيمي (ربط مع جدول الهيكل التنظيمي)
    description TEXT,  -- وصف القسم
    FOREIGN KEY (manager_id) REFERENCES employees(employee_id),  -- الربط مع جدول الموظفين
    FOREIGN KEY (structure_id) REFERENCES organizational_structure(structure_id)  -- الربط مع الهيكل التنظيمي
);
