CREATE TABLE activity_logs (
    log_id INT AUTO_INCREMENT PRIMARY KEY,  -- معرف السجل
    user_id INT,  -- معرف المستخدم الذي قام بالنشاط
    activity_type ENUM('Add', 'Edit', 'Delete') NOT NULL,  -- نوع النشاط (إضافة، تعديل، حذف)
    activity_description TEXT NOT NULL,  -- وصف النشاط
    activity_date DATETIME DEFAULT CURRENT_TIMESTAMP,  -- تاريخ ووقت النشاط
    ip_address VARCHAR(45),  -- عنوان الـ IP الخاص بالمستخدم (اختياري)
    module_affected VARCHAR(100),  -- الوحدة المتأثرة (مثل الفواتير، المنتجات)
    FOREIGN KEY (user_id) REFERENCES users(user_id)  -- الربط مع جدول المستخدمين
);
