CREATE TABLE returns (
    return_id INT AUTO_INCREMENT PRIMARY KEY,  -- معرف المرتجع
    order_id INT,  -- معرف الطلب (ربط مع جدول الطلبات)
    product_id INT,  -- معرف المنتج (ربط مع جدول المنتجات)
    client_id INT,  -- معرف العميل (ربط مع جدول العملاء)
    return_date DATE NOT NULL,  -- تاريخ المرتجع
    quantity INT DEFAULT 1,  -- الكمية المرجعة
    return_reason VARCHAR(255),  -- سبب المرتجع
    refund_amount DECIMAL(10, 2),  -- المبلغ المسترد
    return_status ENUM('Completed', 'Pending', 'Rejected') DEFAULT 'Pending',  -- حالة المرتجع
    notes TEXT,  -- ملاحظات إضافية
    FOREIGN KEY (order_id) REFERENCES orders(order_id),  -- الربط مع جدول الطلبات
    FOREIGN KEY (product_id) REFERENCES products(product_id),  -- الربط مع جدول المنتجات
    FOREIGN KEY (client_id) REFERENCES clients(client_id)  -- الربط مع جدول العملاء
);
