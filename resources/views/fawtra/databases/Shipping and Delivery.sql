CREATE TABLE shipping (
    shipping_id INT AUTO_INCREMENT PRIMARY KEY,  -- معرف الشحن
    order_id INT,  -- معرف الطلب (ربط مع جدول الطلبات)
    shipping_date DATE NOT NULL,  -- تاريخ الشحن
    delivery_date DATE,  -- تاريخ التسليم
    shipping_method ENUM('Express', 'Standard', 'Courier') NOT NULL,  -- طريقة الشحن
    shipping_address VARCHAR(255) NOT NULL,  -- عنوان الشحن
    delivery_status ENUM('In Transit', 'Delivered', 'Cancelled') DEFAULT 'In Transit',  -- حالة التسليم
    tracking_number VARCHAR(100),  -- رقم التتبع
    FOREIGN KEY (order_id) REFERENCES orders(order_id)  -- الربط مع جدول الطلبات
);
