<!DOCTYPE html>
<html>
<head>
	<title>reg_log</title>
	<link rel="stylesheet" type="text/css" href="CSS/style_login_registration.css">
        <meta charset="utf-8">  
<!--<link href="https://fonts.googleapis.com/css2?family=Jost:wght@500&display=swap" rel="stylesheet">-->
</head>
<body>
	<div class="main">  	
		<input type="checkbox" id="chk" aria-hidden="true">

			<div class="register">
				<form method="POST">
					<label for="chk" aria-hidden="true">Регистрация</label>
					<input type="text" name="username_register" placeholder="Имя пользователя" required="">
					<input type="email" name="email_register" placeholder="Ваша@почта.ру" required="">
                    <input type="password" name="password_register" placeholder="Введите пароль" required="">
					<input type="password" name="password_register_confirmed" placeholder="Подтвердите введенный пароль" required="">
					<button type="submit">Зарегистрироваться</button>
				</form>
			</div>

			<div class="login">
				<form method="POST">
					<label for="chk" aria-hidden="true">Авторизация</label>
					<input type="email" name="email_login" placeholder="Ваша@почта.ру" required="">
					<input type="password" name="password_login" placeholder="Ваш пароль" required="">
					<button type="submit">Войти</button>
				</form>
			</div>
	</div>
	<div class="sign">
        made by dimasikks
    </div>
</body>
</html>
<?php
include('database_login.php');
include('database_register.php');
?>
