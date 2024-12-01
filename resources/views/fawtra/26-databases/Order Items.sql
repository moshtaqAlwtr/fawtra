CREATE TABLE order_items (
    order_item_id INT AUTO_INCREMENT PRIMARY KEY,  -- معرف العنصر في الطلب
    order_id INT,  -- معرف الطلب (ربط مع جدول الطلبات)
    product_id INT,  -- معرف المنتج (ربط مع جدول المنتجات)
    quantity INT NOT NULL,  -- الكمية المطلوبة
    unit_price DECIMAL(10, 2) NOT NULL,  -- سعر الوحدة
    discount DECIMAL(5, 2) DEFAULT 0.00,  -- الخصم المطبق على المنتج (إذا وجد)
    total_price DECIMAL(10, 2) AS (quantity * unit_price - discount),  -- السعر الإجمالي (كمية × سعر - خصم)
    FOREIGN KEY (order_id) REFERENCES orders(order_id),  -- الربط مع جدول الطلبات
    FOREIGN KEY (product_id) REFERENCES products(product_id)  -- الربط مع جدول المنتجات
);
