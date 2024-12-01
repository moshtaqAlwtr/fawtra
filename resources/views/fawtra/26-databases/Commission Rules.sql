CREATE TABLE commission_rules (
    rule_id INT AUTO_INCREMENT PRIMARY KEY,  -- معرف قاعدة العمولة
    rule_name VARCHAR(100) NOT NULL,  -- اسم قاعدة العمولة
    min_sales_amount DECIMAL(10, 2) NOT NULL,  -- الحد الأدنى للمبيعات لتطبيق العمولة
    max_sales_amount DECIMAL(10, 2),  -- الحد الأقصى للمبيعات لتطبيق العمولة (اختياري)
    commission_rate DECIMAL(5, 2) NOT NULL,  -- نسبة العمولة
    applicable_date DATE NOT NULL  -- تاريخ بدء تطبيق القاعدة
);
