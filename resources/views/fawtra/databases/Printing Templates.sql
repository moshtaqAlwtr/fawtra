CREATE TABLE printing_templates (
    template_id INT AUTO_INCREMENT PRIMARY KEY,  -- معرف القالب
    template_name VARCHAR(100) NOT NULL,  -- اسم القالب
    template_type ENUM('Invoice', 'Receipt', 'Contract', 'Other') NOT NULL,  -- نوع القالب
    template_content TEXT NOT NULL,  -- محتوى القالب
    description TEXT  -- وصف القالب
);
