CREATE TABLE job_types (
    job_type_id INT AUTO_INCREMENT PRIMARY KEY,  -- معرف نوع الوظيفة
    job_type_name VARCHAR(100) NOT NULL,  -- اسم نوع الوظيفة
    description TEXT  -- وصف الوظيفة
);
