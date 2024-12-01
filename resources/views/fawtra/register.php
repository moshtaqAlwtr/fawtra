<?php
session_start();
include 'connect.php';

// Get form data
$business_name = $_POST['business_name'];
$email = $_POST['email'];
$phone = $_POST['phone'];
$password = $_POST['password'];
$confirm_password = $_POST['confirm_password'];

// Check if email already exists
$query = "SELECT * FROM users WHERE email = '$email'";
$result = mysqli_query($conn, $query);

if (mysqli_num_rows($result) > 0) {
    $_SESSION['error_message'] = 'انت مسجل بالفعل بهذا البريد الالكتروني.';
    header("Location: auth.php");
    exit();
}

// Check if passwords match
if ($password !== $confirm_password) {
    $_SESSION['error_message'] = 'كلمة المرور غير متطابقة.';
    header("Location: auth.php");
    exit();
}

// Encrypt password
$hashed_password = password_hash($password, PASSWORD_DEFAULT);

// Insert new user
$insert_query = "INSERT INTO users (business_name, email, phone, password) VALUES ('$business_name', '$email', '$phone', '$hashed_password')";
if (mysqli_query($conn, $insert_query)) {
    header("Location: index2024.html"); // Redirect to login
} else {
    $_SESSION['error_message'] = 'حدث خطأ أثناء إنشاء الحساب.';
    header("Location: auth.php");
}

$conn->close();
?>
