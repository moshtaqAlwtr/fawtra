<?php
session_start(); // Start session for error message storage
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>تسجيل الدخول - برنامج فوترة</title>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css"
        integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
    <link rel="stylesheet" href="assets/CSS/style.css">
    <style>
        @import url('https://fonts.googleapis.com/css?family=Montserrat:400,800');

        * {
            box-sizing: border-box;
        }

        body {
            font-family: 'Montserrat', sans-serif;
            background: #f6f5f7;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: -20px 0 50px;
            margin-top: 20px;
        }

        h1 {
            font-weight: bold;
            margin: 0;
        }

        p {
            font-size: 14px;
            font-weight: 100;
            line-height: 20px;
            letter-spacing: .5px;
            margin: 20px 0 30px;
        }

        span {
            font-size: 12px;
        }

        a {
            color: #0e263d;
            font-size: 14px;
            text-decoration: none;
            margin: 15px 0;
        }

        .container {
            background: #fff;
            border-radius: 10px;
            box-shadow: 0 14px 28px rgba(0, 0, 0, .2), 0 10px 10px rgba(0, 0, 0, .2);
            position: relative;
            overflow: hidden;
            width: 80vw;
            max-width: 1300px;
            max-height: 90vh;
        }

        .form-container {
            background: #fff;
            display: flex;
            flex-direction: column;
            padding: 20px 50px;
            height: 100%;
            justify-content: center;
            align-items: center;
            text-align: center;
            overflow-y: auto;
        }

        .social-container {
            margin: 20px 0;
        }

        .social-container a {
            border: 1px solid #008ecf;
            border-radius: 50%;
            display: inline-flex;
            justify-content: center;
            align-items: center;
            margin: 0 5px;
        }

        .form-container input {
            background: #eee;
            border: none;
            padding: 12px 15px;
            margin: 8px 0;
            width: 100%;
        }

        button {
            border-radius: 20px;
            border: 1px solid #008ecf;
            background: #008ecf;
            color: #fff;
            font-size: 12px;
            font-weight: bold;
            padding: 12px 45px;
            letter-spacing: 1px;
            text-transform: uppercase;
            transition: transform 80ms ease-in;
        }

        button:active {
            transform: scale(.95);
        }

        button:focus {
            outline: none;
        }

        button.ghost {
            background: transparent;
            border-color: #fff;
        }

        .sign-in-container {
            left: 0;
            z-index: 2;
        }

        .sign-up-container {
            left: 0;
            z-index: 1;
            opacity: 0;
            min-height: 500px;
            padding: 20px;
        }

        .overlay-container {
            position: absolute;
            top: 0;
            left: 50%;
            overflow: hidden;
            transition: transform .6s ease-in-out;
            z-index: 100;
        }

        .overlay {
            background: linear-gradient(to right, #008ecf, #008ecf) no-repeat 0 0 / cover;
            color: #fff;
            position: relative;
            left: -100%;
            height: 100%;
            width: 200%;
            transform: translateY(0);
            transition: transform .6s ease-in-out;
        }

        .overlay-panel {
            position: absolute;
            top: 0;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            padding: 0 40px;
            text-align: center;
            transform: translateY(0);
            transition: transform .6s ease-in-out;
        }

        .overlay-right {
            right: 0;
            transform: translateY(0);
        }

        .overlay-left {
            transform: translateY(-20%);
        }

        .container.right-panel-active .sign-in-container {
            transform: translateY(100%);
        }

        .container.right-panel-active .overlay-container {
            transform: translateX(-100%);
        }

        .container.right-panel-active .sign-up-container {
            transform: translateX(100%);
            opacity: 1;
            z-index: 5;
        }

        .container.right-panel-active .overlay {
            transform: translateX(50%);
        }

        .container.right-panel-active .overlay-left {
            transform: translateY(0);
        }

        .container.right-panel-active .overlay-right {
            transform: translateY(20%);
        }

        .error-message {
            color: red;
            margin-bottom: 10px;
        }
    </style>
</head>

<body>
    <div class="container" id="container">
        <div class="form-container sign-in-container">
            <form action="login.php" method="POST">
                <h1>تسجيل الدخول</h1>
                <div class="social-container">
                    <a href="#" class="social"><i class="fab fa-facebook-f"></i></a>
                    <a href="#" class="social"><i class="fab fa-google-plus-g"></i></a>
                    <a href="#" class="social"><i class="fab fa-linkedin-in"></i></a>
                </div>
                <span>أو استخد حسابك</span>
                
                <input type="email" name="email" placeholder="البريد الالكتروني" required />
                <input type="password" name="password" placeholder="كلمة المرور" required />
                <a href="#">هل نسيت كلمة المرور؟</a>
                <button type="submit">تسجيل الدخول</button>
            </form>
        </div>

        <div class="form-container sign-up-container">
        <form action="register.php" method="POST">
                <h1>إنشاء حساب</h1>

                <!-- Display error message if exists -->
                <?php if (!empty($_SESSION['error_message'])): ?>
                    <div class="error-message">
                        <?php 
                            echo $_SESSION['error_message'];
                            unset($_SESSION['error_message']); // Clear message after display
                        ?>
                    </div>
                <?php endif; ?>

                <input type="text" name="business_name" placeholder="الاسم التجاري" required />
                <input type="email" name="email" placeholder="البريد الالكتروني" required />
                <input type="text" name="phone" placeholder="رقم الجوال" required />
                <input type="password" name="password" placeholder="كلمة المرور" required />
                <input type="password" name="confirm_password" placeholder="تأكيد كلمة المرور" required />
                <button type="submit">إنشاء حساب ؟</button>
            </form>
        </div>

        <div class="overlay-container">
            <div class="overlay">
                <div class="overlay-panel overlay-left">
                    <h1>مرحبًا بك من جديد!</h1>
                    <p>لديك حساب؟ تسجيل الدخول للمتابعة.</p>
                    <button class="ghost" id="signIn">تسجيل الدخول</button>
                </div>
                <div class="overlay-panel overlay-right">
                    <h1>مرحبًا بك!</h1>
                    <p>أدخل تفاصيلك لتسجيل حساب جديد.</p>
                    <button class="ghost" id="signUp">إنشاء حساب</button>
                </div>

            </div>
            
        </div>
    </div>

    <script src="assets/JS/main.js"></script>
</body>
</html>
