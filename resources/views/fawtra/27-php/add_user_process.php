<?php
// استدعاء ملف الاتصال بقاعدة البيانات
include 'db_connect.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    // استعلام SQL لإدخال البيانات في جدول users
    $sql = "INSERT INTO users (username, email, password) VALUES ('$username', '$email', '$password')";

    if ($conn->query($sql) === TRUE) {
        echo "تم إضافة المستخدم بنجاح!";
    } else {
        echo "حدث خطأ: " . $conn->error;
    }

    // إغلاق الاتصال بقاعدة البيانات
    $conn->close();
} else {
    echo "الطلب غير صحيح.";
}
?>
