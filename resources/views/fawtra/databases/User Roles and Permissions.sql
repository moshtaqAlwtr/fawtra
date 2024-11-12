CREATE TABLE employee_roles_permissions (
    role_id INT AUTO_INCREMENT PRIMARY KEY,  -- معرف الدور
    role_name VARCHAR(100) NOT NULL,  -- اسم الدور
    permission_category VARCHAR(100) NOT NULL,  -- فئة الصلاحيات (مثل المبيعات، المخزون)
    permission_name VARCHAR(100) NOT NULL,  -- اسم الصلاحية (مثل إضافة فاتورة)
    has_access BOOLEAN DEFAULT FALSE,  -- تحديد ما إذا كان لديه الوصول
    user_id INT,  -- معرف المستخدم (ربط مع جدول المستخدمين)
    FOREIGN KEY (user_id) REFERENCES users(user_id)  -- الربط مع جدول المستخدمين
);
