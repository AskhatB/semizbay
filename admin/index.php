<?php
if(isset($_COOKIE['admin'])){
	header("Location: http://localhost/semizbay/admin_panel/panel.php");
}
?>
<!DOCTYPE html>
<html lang="en/ru">
<head>
	<meta charset="UTF-8">
	<title>Вход в админ-панель</title>
	<link rel="stylesheet" href="main.css">
</head>
<body>
    <div>
	<form class="loginForm" method="POST" action="admin_enter.php">
		<h1 class="enter_admin_header">Вход в админ-панель</h1>
		<input type="text" name="login" id="login" placeholder="Логин"><br>
		<input type="password"  name="password" id="password" placeholder="Пароль"><br>
		<input type="submit" name="logBtn" id="logBtn" value="Вход">
	</form>
	</div>
</body>
</html>

