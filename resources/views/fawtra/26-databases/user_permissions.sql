CREATE TABLE user_permissions (
    user_id INT AUTO_INCREMENT PRIMARY KEY,            -- معرف المستخدم
    user_name VARCHAR(255) NOT NULL,    -- اسم المستخدم
    status ENUM('نشط', 'غير نشط') NOT NULL, -- حالة المستخدم (نشط أو غير نشط)
    allow_approve_reject TINYINT(1) DEFAULT 0,  -- السماح بالموافقة أو رفض الطلبات (0 = لا، 1 = نعم)
    permission_add_new_order TINYINT(1) DEFAULT 0, -- الصلاحية: إضافة طلب جديد (0 = لا، 1 = نعم)
    permission_approve_reject_orders TINYINT(1) DEFAULT 0, -- الصلاحية: موافقة / رفض الطلبات (0 = لا، 1 = نعم)
    permission_view_orders TINYINT(1) DEFAULT 1 -- الصلاحية: عرض الطلبات (0 = لا، 1 = نعم)
);
