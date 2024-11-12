CREATE TABLE recurring_invoices (
    recurring_invoice_id INT AUTO_INCREMENT PRIMARY KEY,  -- معرف الفاتورة الدورية
    client_id INT,  -- معرف العميل (ربط مع جدول العملاء)
    invoice_id INT,  -- معرف الفاتورة (ربط مع جدول الفواتير)
    start_date DATE NOT NULL,  -- تاريخ البدء للفواتير الدورية
    end_date DATE,  -- تاريخ الانتهاء، إذا كان محددًا
    frequency ENUM('Monthly', 'Yearly', 'Weekly') NOT NULL,  -- التكرار (شهري، سنوي، أسبوعي)
    next_invoice_date DATE NOT NULL,  -- تاريخ الفاتورة التالية
    amount DECIMAL(10, 2) NOT NULL,  -- المبلغ الخاص بالفاتورة الدورية
    status ENUM('Active', 'Cancelled', 'Completed') DEFAULT 'Active',  -- حالة الفاتورة الدورية
    notes TEXT,  -- ملاحظات إضافية
    FOREIGN KEY (client_id) REFERENCES clients(client_id),  -- الربط مع جدول العملاء
    FOREIGN KEY (invoice_id) REFERENCES invoices(invoice_id)  -- الربط مع جدول الفواتير
);
