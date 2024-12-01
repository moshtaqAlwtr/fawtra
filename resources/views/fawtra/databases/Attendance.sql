CREATE TABLE attendance (
    attendance_id INT AUTO_INCREMENT PRIMARY KEY,  -- معرف الحضور
    employee_id INT,  -- معرف الموظف (ربط مع جدول الموظفين)
    date DATE NOT NULL,  -- التاريخ
    check_in_time TIME,  -- وقت الدخول
    check_out_time TIME,  -- وقت الخروج
    status ENUM('Present', 'Absent', 'Late', 'On Leave') DEFAULT 'Present',  -- حالة الحضور
    FOREIGN KEY (employee_id) REFERENCES employees(employee_id)  -- الربط مع جدول الموظفين
);
