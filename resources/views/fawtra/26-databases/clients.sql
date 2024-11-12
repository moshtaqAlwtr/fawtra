CREATE TABLE clients (
  client_id INT(11) NOT NULL AUTO_INCREMENT,              -- رقم العميل (المعرف الفريد)
  trade_name VARCHAR(255) NOT NULL,                       -- الاسم التجاري (إلزامي)
  first_name VARCHAR(100),                                -- الاسم الأول
  last_name VARCHAR(100),                                 -- الاسم الأخير
  phone VARCHAR(20),                                      -- الهاتف
  mobile VARCHAR(20),                                     -- الجوال
  city VARCHAR(100),                                      -- المدينة
  region VARCHAR(100),                                    -- المنطقة
  postal_code VARCHAR(20),                                -- الرمز البريدي
  country VARCHAR(100) DEFAULT 'المملكة العربية السعودية', -- البلد (القيمة الافتراضية: المملكة العربية السعودية)
  tax_number VARCHAR(50),                                 -- الرقم الضريبي
  commercial_registration VARCHAR(100),                   -- السجل التجاري
  credit_limit DECIMAL(10, 2),                            -- الحد الائتماني
  credit_period INT(11),                                  -- المدة الائتمانية (بالأيام)
  account_code VARCHAR(100) NOT NULL,                     -- رقم الكود (إلزامي)
  printing_method ENUM('طباعة', 'إلكتروني'),              -- طريقة الطباعة
  opening_balance DECIMAL(10, 2),                         -- الرصيد الافتتاحي
  opening_balance_date DATE,                              -- تاريخ الرصيد الافتتاحي
  currency VARCHAR(50) DEFAULT 'ريال سعودي',              -- العملة (القيمة الافتراضية: ريال سعودي)
  email VARCHAR(255),                                     -- البريد الإلكتروني
  client_type ENUM('عميل نقدي', 'عميل آجل') DEFAULT 'عميل نقدي', -- التصنيف
  notes TEXT,                                             -- الملاحظات
  attachments TEXT,                                       -- المرفقات (روابط أو نص)
  display_language ENUM('العربية', 'الإنجليزية') DEFAULT 'العربية', -- لغة العرض
  created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,         -- تاريخ الإنشاء
  PRIMARY KEY (client_id)                                 -- المفتاح الأساسي
);
