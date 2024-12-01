CREATE TABLE products (
  product_id INT(11) NOT NULL AUTO_INCREMENT,           -- المعرف الفريد للمنتج
  product_name VARCHAR(255) NOT NULL,                   -- اسم المنتج
  serial_number VARCHAR(255),                           -- الرقم التسلسلي
  description TEXT,                                     -- الوصف
  images TEXT,                                          -- روابط الصور (يمكن تخزينها كنص طويل)
  category VARCHAR(100),                                -- التصنيف
  brand_name VARCHAR(100),                              -- الماركة
  supplier_name VARCHAR(100),                           -- اسم المورد
  barcode VARCHAR(100),                                 -- الباركود
  available_online BOOLEAN DEFAULT 0,                   -- متاح أون لاين (0 = غير متاح، 1 = متاح)
  featured_product BOOLEAN DEFAULT 0,                   -- منتج مميز (0 = لا، 1 = نعم)
  track_inventory BOOLEAN DEFAULT 0,                    -- تتبع المخزون (0 = لا، 1 = نعم)
  tracking_type VARCHAR(100),                           -- نوع التتبع
  low_stock_alert INT(11),                              -- نبهني عند وصول الكمية لأقل من
  internal_notes TEXT,                                  -- ملاحظات داخلية
  tags VARCHAR(255),                                    -- الوسوم
  status ENUM('نشط', 'غير نشط') DEFAULT 'نشط',         -- الحالة (نشط أو غير نشط)
  purchase_price DECIMAL(10, 2),                        -- سعر الشراء
  selling_price DECIMAL(10, 2),                         -- سعر البيع
  tax_1 DECIMAL(5, 2),                                  -- الضريبة الأولى
  tax_2 DECIMAL(5, 2),                                  -- الضريبة الثانية
  min_selling_price DECIMAL(10, 2),                     -- أقل سعر بيع
  discount DECIMAL(10, 2),                              -- الخصم
  discount_type ENUM('نسبة مئوية', 'رقم'),              -- نوع الخصم
  profit_margin DECIMAL(5, 2),                          -- هامش الربح (نسبة مئوية)
  created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,       -- تاريخ الإنشاء
  PRIMARY KEY (product_id)                              -- المفتاح الأساسي
);
