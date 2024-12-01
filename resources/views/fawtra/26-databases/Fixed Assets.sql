CREATE TABLE fixed_assets (
    asset_id INT AUTO_INCREMENT PRIMARY KEY,  -- معرف الأصل
    asset_name VARCHAR(100) NOT NULL,  -- اسم الأصل
    purchase_date DATE NOT NULL,  -- تاريخ الشراء
    purchase_price DECIMAL(10, 2) NOT NULL,  -- تكلفة شراء الأصل
    depreciation_rate DECIMAL(5, 2) DEFAULT 0.00,  -- معدل الاهلاك السنوي
    current_value DECIMAL(10, 2),  -- القيمة الحالية للأصل
    status ENUM('Active', 'Sold', 'Scrapped') DEFAULT 'Active',  -- حالة الأصل
    location VARCHAR(100),  -- موقع الأصل
    supplier_id INT,  -- معرف المورد (ربط مع جدول الموردين)
    notes TEXT,  -- ملاحظات إضافية
    FOREIGN KEY (supplier_id) REFERENCES suppliers(supplier_id)  -- الربط مع جدول الموردين
);
