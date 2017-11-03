<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Админ-панель</title>
	<link href="https://fonts.googleapis.com/css?family=Fira+Sans+Condensed:300,400,700" rel="stylesheet">
	<link rel="stylesheet" href="main.css">
	<script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.4.5/angular.min.js"></script>
</head>
<body>

<div class="wrapper" ng-app="myApp" ng-controller="cntrl">
<div class="form-wrap">
	<form>
    	<label for="l_name">Фамилия: </label><input type="text" name="l_name" ng-model="l_name" id="l_name">
		<label for="f_name">Имя: </label><input type="text" name="f_name" ng-model="f_name" id="f_name">
		<label for="pat_name">Отчество: </label><input type="text" name="pat_name" ng-model="pat_name" id="pat_name">
		<label for="iin">ИИН: </label><input type="text" name="iin" ng-model="iin" id="iin">
		<label for="position">Должность: </label><input type="text" name="position" ng-model="position" id="position">
		<input type="button" id="submit" value="{{btnName}}" ng-click="insertdata()">
	</form>
</div>
{{msg}}
<div ng-repeat="employers in data">
<div class="added">
	<div><span>Фамилия: </span><p>{{employers.l_name}}</p></div>
	<div><span>Имя: </span><p>{{employers.f_name}}</p></div>
	<div><span>Отчество: </span><p>{{employers.pat_name}}</p></div>
	<div><span>ИИН: </span><p>{{employers.iin}}</p></div>
	<div><span>Дожность: </span><p>{{employers.position}}</p></div>
	<div class="del_ee"><button ng-click="deleteEmpl(employers.id);" class="del_empl">Удалить</button></div>
	<div class="edit_ee"><button ng-click="editEmpl(employers.l_name, employers.f_name, employers.pat_name, employers.iin, employers.position);" class="edit_empl">Изменить</button></div>
</div>
</div>
</div>

<script src="common.js"></script>
</body>
</html>