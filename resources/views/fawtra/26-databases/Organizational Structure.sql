CREATE TABLE organizational_structure (
    structure_id INT AUTO_INCREMENT PRIMARY KEY,  -- معرف الهيكل
    structure_name VARCHAR(100) NOT NULL,  -- اسم الهيكل
    description TEXT,  -- وصف الهيكل
    parent_structure_id INT,  -- الهيكل الأب (في حالة وجود تقسيمات داخلية)
    FOREIGN KEY (parent_structure_id) REFERENCES organizational_structure(structure_id)  -- الربط مع الهيكل الأب
);
