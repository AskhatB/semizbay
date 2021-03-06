<?php
if(!isset($_COOKIE['admin'])){
	header("Location: http://localhost/semizbay/admin/index.php");
} 
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Система контроля адмистраторов</title>
	<link rel="stylesheet" href="main.css">
	<link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
	<script src="https://use.fontawesome.com/7cda8fcf2d.js"></script>
</head>
<body>
	<div id="main">
		<div class="users_list_wrapper">
			<table class="list">
				<tr>
					<th>Логин</th>
					<th>Пароль</th>
					<th>Участок</th>
					<th><i class="fa fa-pencil" aria-hidden="true"></i></th>
				</tr>
				<tr v-for="admin in admins">
					<td>{{admin.login}}</td>
					<td>{{admin.password}}</td>
					<td>{{admin.nameLocation}}</td>
					<td><button @click="showingEditModal = true; selectUser(admin)"><i class="fa fa-pencil" aria-hidden="true"></i>
					Исправить</button></td>
				</tr>
			</table>
		</div>

		<div class="modal_bg" id="edit_modal" v-if="showingEditModal">
			<div class="modal_container">
				<div class="modal_header">
					<p class="fleft">Изменить данные о пользователе</p>
					<button class="fright close_modal" @click="showingEditModal = false; clearAll()"><i class="fa fa-times" aria-hidden="true"></i></button>
					<div class="clear"></div>
				</div>
				<div class="modal_content">
					<div class="adding_form">
						<p class="validate_message" v-if="addValidateMessage">{{addValidateMessage}}</p>
						<input type="text" name="login" placeholder="Логин" v-model="clickedAdmin.login"><br>
						<input type="text" name="first_name" placeholder="Пароль" v-model="clickedAdmin.password"><br>
						<button class="add_user_modal" @click="updateUser();">Изменить</button>
					</div>
				</div>
			</div>
		</div>
	</div>
	<script src="https://unpkg.com/axios/dist/axios.min.js"></script>
	<script src="vue.js"></script>
	<script src="app.js"></script>
</body>
</html>