<!DOCTYPE html>
<html>
<head>
	<title>login.localhost</title>
	<link rel="stylesheet" type="text/css" href="CSS/style_login_registration.css">
    <meta charset="utf-8">
   <!--<link href="https://fonts.googleapis.com/css2?family=Jost:wght@500&display=swap" rel="stylesheet">-->
</head>
<body>
    <div class="container">
        <h2>Авторизация</h2>
        <form method="POST">
            <div class="form-group">
                <input type="text" name="username_login" placeholder="Введите имя пользователя" required="">
            </div>
            <div class="form-group">
                <input type="password" name="password_login" placeholder="Введите пароль" required="">
            </div>
            <button type="submit" class="btn" name="submit">Войти</button>
        </form>
    </div>
	<div class="sign">
        made by dimasikks
    </div>
</body>
</html>
<?php
include('database_login.php');
?>