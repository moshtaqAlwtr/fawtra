CREATE TABLE report_settings (
    setting_id INT AUTO_INCREMENT PRIMARY KEY,  -- معرف الإعداد
    report_id INT,  -- معرف التقرير (ربط مع جدول التقارير)
    setting_name VARCHAR(100) NOT NULL,  -- اسم الإعداد
    setting_value VARCHAR(255) NOT NULL,  -- قيمة الإعداد (مثل الأعمدة، الفلاتر)
    FOREIGN KEY (report_id) REFERENCES saved_reports(report_id)  -- الربط مع جدول التقارير المحفوظة
);
