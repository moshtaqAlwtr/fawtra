CREATE TABLE stock_transfers (
    transfer_id INT AUTO_INCREMENT PRIMARY KEY,  -- معرف التحويل
    from_warehouse_id INT NOT NULL,  -- معرف المستودع المصدر
    to_warehouse_id INT NOT NULL,  -- معرف المستودع الوجهة
    transfer_date DATE NOT NULL,  -- تاريخ التحويل
    product_id INT NOT NULL,  -- معرف المنتج
    quantity DECIMAL(10, 2) NOT NULL,  -- كمية المنتج
    status ENUM('In Progress', 'Completed', 'Cancelled') DEFAULT 'In Progress',  -- حالة التحويل
    notes TEXT,  -- ملاحظات إضافية
    FOREIGN KEY (from_warehouse_id) REFERENCES warehouses(warehouse_id),  -- الربط مع جدول المستودعات
    FOREIGN KEY (to_warehouse_id) REFERENCES warehouses(warehouse_id),  -- الربط مع جدول المستودعات
    FOREIGN KEY (product_id) REFERENCES products(product_id)  -- الربط مع جدول المنتجات
);
