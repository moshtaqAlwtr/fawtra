CREATE TABLE invoice_items (
  item_id INT(11) NOT NULL AUTO_INCREMENT,                 -- رقم البند (المعرف الفريد)
  invoice_id INT(11) NOT NULL,                             -- معرف الفاتورة (يربط بجدول الفواتير)
  description TEXT,                                        -- الوصف
  unit_price DECIMAL(10, 2),                               -- سعر الوحدة
  quantity INT(11),                                        -- الكمية
  discount DECIMAL(10, 2),                                 -- الخصم
  tax_1 DECIMAL(5, 2),                                     -- الضريبة 1
  tax_2 DECIMAL(5, 2),                                     -- الضريبة 2
  total DECIMAL(10, 2),                                    -- المجموع
  PRIMARY KEY (item_id),                                   -- المفتاح الأساسي
  FOREIGN KEY (invoice_id) REFERENCES invoices(invoice_id)  -- ربط الفاتورة بجدول الفواتير
);
