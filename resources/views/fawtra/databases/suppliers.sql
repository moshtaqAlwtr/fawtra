CREATE TABLE suppliers (
  supplier_id INT(11) NOT NULL AUTO_INCREMENT,            -- رقم المورد (المعرف الفريد)
  trade_name VARCHAR(255) NOT NULL,                       -- الاسم التجاري
  first_name VARCHAR(100),                                -- الاسم الأول
  last_name VARCHAR(100),                                 -- الاسم الأخير
  phone VARCHAR(20),                                      -- الهاتف
  mobile VARCHAR(20),                                     -- الجوال
  email VARCHAR(255),                                     -- البريد الإلكتروني
  street_address_1 VARCHAR(255),                          -- عنوان الشارع 1
  street_address_2 VARCHAR(255),                          -- عنوان الشارع 2
  city VARCHAR(100),                                      -- المدينة
  region VARCHAR(100),                                    -- المنطقة
  postal_code VARCHAR(20),                                -- الرمز البريدي
  country VARCHAR(100) DEFAULT 'المملكة العربية السعودية', -- البلد (القيمة الافتراضية: المملكة العربية السعودية)
  tax_number VARCHAR(50),                                 -- الرقم الضريبي
  commercial_registration VARCHAR(100),                   -- السجل التجاري
  currency VARCHAR(50) DEFAULT 'ريال سعودي',              -- العملة (القيمة الافتراضية: ريال سعودي)
  opening_balance DECIMAL(10, 2),                         -- الرصيد الافتتاحي
  opening_balance_date DATE,                              -- تاريخ الرصيد الافتتاحي
  notes TEXT,                                             -- الملاحظات
  attachments TEXT,                                       -- المرفقات (يمكن أن تخزن روابط الملفات)
  created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,         -- تاريخ الإنشاء
  PRIMARY KEY (supplier_id)                               -- المفتاح الأساسي
);
