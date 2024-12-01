<?php
$servername = "localhost";
$username = "root";  // اسم المستخدم الافتراضي لـ MySQL هو root
$password = "";  // اتركه فارغًا إذا لم تقم بتعيين كلمة مرور
$dbname = "nwo1";  // اسم قاعدة البيانات التي قمت بإنشائها

// إنشاء الاتصال
$conn = new mysqli($servername, $username, $password, $dbname);

// التحقق من الاتصال
if ($conn->connect_error) {
    die("فشل الاتصال بقاعدة البيانات: " . $conn->connect_error);
}
?>
