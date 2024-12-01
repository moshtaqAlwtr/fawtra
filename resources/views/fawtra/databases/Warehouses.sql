CREATE TABLE warehouses (
    warehouse_id INT AUTO_INCREMENT PRIMARY KEY,  -- معرف المستودع
    warehouse_name VARCHAR(100) NOT NULL,  -- اسم المستودع
    location VARCHAR(100) NOT NULL,  -- موقع المستودع
    capacity DECIMAL(10, 2) NOT NULL,  -- السعة الكلية للمستودع
    current_stock DECIMAL(10, 2) DEFAULT 0.00,  -- المخزون الحالي
    manager VARCHAR(100),  -- مدير المستودع
    contact_info VARCHAR(255),  -- معلومات الاتصال
    status ENUM('Active', 'Closed', 'Maintenance') DEFAULT 'Active',  -- حالة المستودع
    notes TEXT  -- ملاحظات إضافية
);
