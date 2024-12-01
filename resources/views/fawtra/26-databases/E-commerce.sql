CREATE TABLE ecommerce_orders (
    order_id INT AUTO_INCREMENT PRIMARY KEY,  -- معرف الطلب
    client_id INT,  -- معرف العميل (ربط مع جدول العملاء)
    product_id INT,  -- معرف المنتج (ربط مع جدول المنتجات)
    order_date DATE NOT NULL,  -- تاريخ الطلب
    quantity INT NOT NULL,  -- كمية المنتجات
    total_amount DECIMAL(10, 2) NOT NULL,  -- المبلغ الإجمالي
    status ENUM('Pending', 'Shipped', 'Delivered', 'Cancelled') DEFAULT 'Pending',  -- حالة الطلب
    payment_method ENUM('Credit Card', 'PayPal', 'Other') NOT NULL,  -- طريقة الدفع
    FOREIGN KEY (client_id) REFERENCES clients(client_id),  -- الربط مع جدول العملاء
    FOREIGN KEY (product_id) REFERENCES products(product_id)  -- الربط مع جدول المنتجات
);
