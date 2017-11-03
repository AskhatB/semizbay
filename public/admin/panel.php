<?php
if(!isset($_COOKIE['admin'])){
	header("Location: http://semyzbay-u.kapsafety.kz/admin/index.php");
} 
?> 
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width,initial-scale=1,user-scalable=no">
	<title>Админ-панель</title>
	<link href="https://fonts.googleapis.com/css?family=Fira+Sans+Condensed:300,400,700" rel="stylesheet">
	<link rel="stylesheet" href="main.css">
	<script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.4.5/angular.min.js"></script>
</head>
<body>

<div class="wrapper" ng-app="myApp" ng-controller="cntrl">
<div class="form-wrap">
	<form>
    	<input type="text" name="l_name" ng-model="l_name" id="l_name" placeholder="Фамилия">
		<input type="text" name="f_name" ng-model="f_name" id="f_name" placeholder="Имя">
		<input type="text" name="pat_name" ng-model="pat_name" id="pat_name" placeholder="Отчество">
		<input type="text" name="iin" ng-model="iin" id="iin" placeholder="ИИН" pattern="[0-9]{12}">
		<input type="text" name="phone" ng-model="phone" id="phone" placeholder="Телефон">
		<input type="text" name="email" ng-model="email" id="email" placeholder="E-mail">
		<input type="text" name="position" ng-model="position" id="position" placeholder="Должность">
		<input type="button" id="submit" value="{{btnName}}" ng-click="insertdata()">
	</form>
</div>
<a href="http://semyzbay-u.kapsafety.kz/events" class="fix_sit">Исправить ситуации</a>
<a href="http://semyzbay-u.kapsafety.kz/fixed_events" class="fix_sit">Исправленные ситуации</a>
<a href="logout.php" class="fix_sit" style="float:right;">Выход</a>
<div ng-repeat="users in data">
<div class="added">
	<div><span>Фамилия: </span><p>{{users.l_name}}</p></div>
	<div><span>Имя: </span><p>{{users.f_name}}</p></div>
	<div><span>Отчество: </span><p>{{users.pat_name}}</p></div>
	<div><span>ИИН: </span><p>{{users.iin}}</p></div>
	<div><span>Телефон: </span><p>{{users.phone}}</p></div>
	<div><span>E-mail: </span><p>{{users.email}}</p></div>
	<div><span>Дожность: </span><p>{{users.position}}</p></div>
	<div class="del_ee"><button ng-click="deleteEmpl(users.id);" class="del_empl">Удалить</button></div>
	<div class="edit_ee"><button ng-click="editEmpl(users.l_name, users.f_name, users.pat_name, users.iin, users.phone, users.email, users.position);" class="edit_empl">Изменить</button></div>
</div>
</div>
</div>

<script src="common.js"></script>
</body>
</html>