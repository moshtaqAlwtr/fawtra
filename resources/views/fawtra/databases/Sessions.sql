CREATE TABLE sessions (
    session_id INT AUTO_INCREMENT PRIMARY KEY,  -- معرف الجلسة
    user_id INT,  -- معرف المستخدم (ربط مع جدول المستخدمين)
    session_start DATETIME NOT NULL,  -- وقت بدء الجلسة
    session_end DATETIME,  -- وقت انتهاء الجلسة
    ip_address VARCHAR(45),  -- عنوان IP المستخدم
    status ENUM('Active', 'Closed') DEFAULT 'Active',  -- حالة الجلسة
    FOREIGN KEY (user_id) REFERENCES users(user_id)  -- الربط مع جدول المستخدمين
);
