CREATE TABLE report_history (
    history_id INT AUTO_INCREMENT PRIMARY KEY,  -- معرف السجل
    report_id INT,  -- معرف التقرير (ربط مع جدول التقارير)
    viewed_by INT,  -- معرف المستخدم الذي عرض التقرير (ربط مع جدول المستخدمين)
    viewed_at DATETIME DEFAULT CURRENT_TIMESTAMP,  -- تاريخ ووقت عرض التقرير
    action VARCHAR(50) NOT NULL,  -- الإجراء الذي تم (مثل "عرض"، "تعديل"، "حذف")
    FOREIGN KEY (report_id) REFERENCES saved_reports(report_id),  -- الربط مع جدول التقارير المحفوظة
    FOREIGN KEY (viewed_by) REFERENCES users(user_id)  -- الربط مع جدول المستخدمين
);
