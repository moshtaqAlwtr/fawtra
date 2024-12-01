<?php
// الاتصال بقاعدة البيانات
include 'db_connect.php';  // تأكد من وجود db_connect.php في نفس المجلد أو تعديل المسار إذا كان مختلفًا

// استعلام لجلب بيانات المستخدمين
$sql = "SELECT id, username, email FROM users";
$result = $conn->query($sql);

// التحقق من وجود بيانات
if ($result->num_rows > 0) {
    // عرض البيانات في جدول
    echo "<table border='1'>
            <tr>
                <th>ID</th>
                <th>Username</th>
                <th>Email</th>
            </tr>";
    // طباعة كل صف من البيانات
    while($row = $result->fetch_assoc()) {
        echo "<tr><td>" . $row["id"]. "</td><td>" . $row["username"]. "</td><td>" . $row["email"]. "</td></tr>";
    }
    echo "</table>";
} else {
    echo "لا توجد بيانات.";
}

// إغلاق الاتصال
$conn->close();
?>
