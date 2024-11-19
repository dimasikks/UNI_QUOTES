<!DOCTYPE html>
<html>
<head>
	<title>registration.localhost</title>
	<link rel="stylesheet" type="text/css" href="CSS/style_login_registration.css">
    <meta charset="utf-8">
   <!--<link href="https://fonts.googleapis.com/css2?family=Jost:wght@500&display=swap" rel="stylesheet">-->
</head>
<body>

    <div class="container">
        <h2>Регистрация</h2>
        <form method="POST">
            <div class="form-group">
                <input type="text" name="username_register" placeholder="Имя пользователя" required="">
            </div>
            <div class="form-group">
                <input type="email" name="email_register" placeholder="Ваша@почта.ру" required="">
            </div>
            <div class="form-group">
                <input type="password" name="password_register" placeholder="Введите пароль" required="">
            </div>
            <div class="form-group">
                <input type="password" name="password_register_confirmed" placeholder="Подтвердите введенный пароль" required="">
            </div>
            <button type="submit" class="btn" name="submit">Зарегистрироваться</button>
        </form>
    </div>
	<div class="sign">
        made by dimasikks
    </div>
</body>
</html>
<?php
include('database_register.php');
?>