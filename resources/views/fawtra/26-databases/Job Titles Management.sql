CREATE TABLE job_titles (
    job_title_id INT AUTO_INCREMENT PRIMARY KEY,  -- معرف المسمى الوظيفي
    title_name VARCHAR(100) NOT NULL,  -- اسم المسمى الوظيفي
    job_type_id INT,  -- معرف نوع الوظيفة (ربط مع جدول أنواع الوظائف)
    description TEXT,  -- وصف المسمى الوظيفي
    FOREIGN KEY (job_type_id) REFERENCES job_types(job_type_id)  -- الربط مع جدول أنواع الوظائف
);
