CREATE TABLE pos_transactions (
    transaction_id INT AUTO_INCREMENT PRIMARY KEY,  -- معرف العملية
    employee_id INT,  -- معرف الموظف (ربط مع جدول الموظفين)
    product_id INT,  -- معرف المنتج (ربط مع جدول المنتجات)
    transaction_date DATE NOT NULL,  -- تاريخ العملية
    quantity INT NOT NULL,  -- كمية المنتجات المباعة
    total_amount DECIMAL(10, 2) NOT NULL,  -- المبلغ الإجمالي
    payment_method ENUM('Cash', 'Credit Card', 'Other') NOT NULL,  -- طريقة الدفع
    status ENUM('Completed', 'Pending', 'Cancelled') DEFAULT 'Completed',  -- حالة العملية
    FOREIGN KEY (employee_id) REFERENCES employees(employee_id),  -- الربط مع جدول الموظفين
    FOREIGN KEY (product_id) REFERENCES products(product_id)  -- الربط مع جدول المنتجات
);
