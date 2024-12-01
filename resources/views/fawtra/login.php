<?php
session_start();
include 'connect.php';

// Get form data
$email = $_POST['email'];
$password = $_POST['password'];

// Find user by email
$query = "SELECT * FROM users WHERE email = '$email'";
$result = mysqli_query($conn, $query);

if (mysqli_num_rows($result) === 1) {
    $user = mysqli_fetch_assoc($result);
    // Verify password
    if (password_verify($password, $user['password'])) {
        $_SESSION['user_id'] = $user['id']; // Store user ID in session
        header("Location: index2024.html"); // Redirect to dashboard
    } else {
        $_SESSION['error_message'] = 'كلمة المرور غير صحيحة.';
        header("Location: auth.php");
    }
} else {
    $_SESSION['error_message'] = 'البريد الإلكتروني غير مسجل.';
    header("Location: auth.php");
}

$conn->close();
?>
