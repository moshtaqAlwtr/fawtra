CREATE TABLE purchase_orders (
    purchase_order_id INT AUTO_INCREMENT PRIMARY KEY,  -- معرف أمر الشراء
    supplier_id INT,  -- معرف المورد (ربط مع جدول الموردين)
    order_date DATE NOT NULL,  -- تاريخ تقديم الطلب
    expected_delivery_date DATE,  -- تاريخ التسليم المتوقع
    total_amount DECIMAL(10, 2) NOT NULL,  -- إجمالي المبلغ
    paid_amount DECIMAL(10, 2) DEFAULT 0.00,  -- المبلغ المدفوع
    remaining_amount DECIMAL(10, 2) AS (total_amount - paid_amount),  -- المبلغ المتبقي
    status ENUM('Pending', 'Completed', 'Cancelled') DEFAULT 'Pending',  -- حالة الطلب
    notes TEXT,  -- ملاحظات إضافية
    FOREIGN KEY (supplier_id) REFERENCES suppliers(supplier_id)  -- الربط مع جدول الموردين
);
