<?php
if(!isset($_COOKIE['admin'])){
	header("Location: http://localhost/admin_panel/index.php");
} 
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Админ панель</title>
	<link rel="stylesheet" href="main.css">
	<link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
	<script src="https://use.fontawesome.com/7cda8fcf2d.js"></script>
</head>
<body>
	<h1 class="text_heading"><i class="fa fa-users" aria-hidden="true"></i> semyzbay-u.kapsafety</h1>
	<p class="text_paragraph">Список работников</p>
	<hr>
	<div id="main">
		<button class="add_new" @click="showingAddModal = true"><i class="fa fa-plus" aria-hidden="true"></i> Добавить пользователя</button>
		<a href="#" class="btn_situations"><i class="fa fa-list" aria-hidden="true"></i>
		Исправить ситуации</a>
		<a href="#" class="btn_situations"><i class="fa fa-pencil-square-o" aria-hidden="true"></i>
		Исправленные ситуации</a>
		<a href="logout.php" class="btn_situations btn_exit"><i class="fa fa-sign-out" aria-hidden="true"></i>
		Выход</a>
		<p class="error_message" v-if="errorMessage">{{errorMessage}}</p>
		<p class="success_message" v-if="successMessage">{{successMessage}}</p>
		<div class="users_list_wrapper">
			<table class="list">
				<tr>
					<th>Фамилия</th>
					<th>Имя</th>
					<th>Отчество</th>
					<th>ИИН</th>
					<th>Участок</th>
					<th>Должность</th>
					<th><i class="fa fa-pencil" aria-hidden="true"></i></th>
					<th><i class="fa fa-trash-o" aria-hidden="true"></i></th>
				</tr>
				<tr v-for="user in users">
					<td>{{user.l_name}}</td>
					<td>{{user.f_name}}</td>
					<td>{{user.pat_name}}</td>
					<td>{{user.iin}}</td>
					<td>{{user.nameLocation}}</td>
					<td>{{user.position}}</td>
					<td><button @click="showingEditModal = true; selectUser(user)"><i class="fa fa-pencil" aria-hidden="true"></i>
					Исправить</button></td>
					<td><button @click="showingDeleteModal = true; selectUser(user)"><i class="fa fa-trash-o" aria-hidden="true"></i>
					Удалить</button></td>
				</tr>
			</table>
		</div>
		<!-- ADDING NEW USER -->
		<div class="modal_bg" id="add_modal" v-if="showingAddModal">
			<div class="modal_container">
				<div class="modal_header">
					<p class="fleft">Добавление нового пользователя</p>
					<button class="fright close_modal" @click="showingAddModal = false; clearAll();"><i class="fa fa-times" aria-hidden="true"></i></button>
					<div class="clear"></div>
				</div>
				<div class="modal_content">
					<div class="adding_form">
						<p class="validate_message" v-if="addValidateMessage">{{addValidateMessage}}</p>
						<input type="text" name="last_name" required placeholder="Фамилия" v-model="newUser.l_name"><br>
						<input type="text" name="first_name" required placeholder="Имя" v-model="newUser.f_name"><br>
						<input type="text" name="pat_name" placeholder="Отчество" v-model="newUser.pat_name"><br>
						<input type="text" name="iin" required placeholder="ИИН"
						v-model="newUser.iin"><br>
						<!-- <input type="text" name="area" placeholder="Участок" v-model="newUser.area_id"><br> -->
						<select v-model="selected" class="area_select">
							<option v-for="option in options" v-bind:value="option.value">
								{{ option.text }}
							</option>
						</select>
						<input type="text" name="position" placeholder="Должность" v-model="newUser.position"><br>
						<button class="add_user_modal" @click="saveUser();">Добавить</button> 
					</div>
				</div>
			</div>
		</div>
		<!-- EDITING USER -->
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
						<input type="text" name="last_name" placeholder="Фамилия" v-model="clickedUser.l_name"><br>
						<input type="text" name="first_name" placeholder="Имя" v-model="clickedUser.f_name"><br>
						<input type="text" name="pat_name" placeholder="Отчество" v-model="clickedUser.pat_name"><br>
						<input type="text" name="iin" placeholder="ИИН" v-model="clickedUser.iin"><br>
						<!-- <input type="text" name="area" placeholder="Участок" v-model="clickedUser.area"><br> -->
						<select v-model="selected" class="area_select">
							<option v-for="option in options" v-bind:value="option.value">
								{{ option.text }}
							</option>
						</select>
						<input type="text" name="position" placeholder="Должность" v-model="clickedUser.position"><br>
						<button class="add_user_modal" @click="updateUser();">Изменить</button>
					</div>
				</div>
			</div>
		</div>
		<!-- DELETE USER -->
		<div class="modal_bg" id="edit_modal" v-if="showingDeleteModal">
			<div class="modal_container">
				<div class="modal_header">
					<p class="fleft">Удаление пользователя</p>
					<button class="fright close_modal" @click="showingDeleteModal = false"><i class="fa fa-times" aria-hidden="true"></i></button>
					<div class="clear"></div>
				</div>
				<div class="modal_content">
					<br><br>
					<p>Вы действительно хотите удалить этого пользователя?</p>
					<br><br><br><br>
					<br>
					<br>
					<button @click="showingDeleteModal = false; deleteUser()" class="delete_btn_">Да</button>
					<button @click="showingDeleteModal = false" class="delete_btn_">Нет</button>
				</div>
			</div>
		</div>
	</div>
	<script src="https://unpkg.com/axios/dist/axios.min.js"></script>
	<script src="vue.js"></script>
	<script src="app.js"></script>
</body>
</html>