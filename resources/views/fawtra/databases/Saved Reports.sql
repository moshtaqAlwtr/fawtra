CREATE TABLE saved_reports (
    report_id INT AUTO_INCREMENT PRIMARY KEY,  -- معرف التقرير
    report_name VARCHAR(100) NOT NULL,  -- اسم التقرير
    created_by INT,  -- معرف المستخدم الذي أنشأ التقرير (ربط مع جدول المستخدمين)
    created_at DATETIME DEFAULT CURRENT_TIMESTAMP,  -- تاريخ ووقت إنشاء التقرير
    report_data TEXT NOT NULL,  -- البيانات المحفوظة في التقرير بصيغة JSON أو XML
    FOREIGN KEY (created_by) REFERENCES users(user_id)  -- الربط مع جدول المستخدمين
);
