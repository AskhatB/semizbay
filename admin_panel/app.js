var app = new Vue({
	el: "#main",
	data: {
		showingAddModal: false,
		showingEditModal: false,
		showingDeleteModal: false,
		errorMessage: "",
		successMessage: "",
		addValidateMessage: "",
		users: [],
		areas:[],
		newUser: {l_name: "", f_name: "", pat_name: "",
		iin: "", area_id: "", position: ""},
		clickedUser: {},
		selected: null,
		options: [
		{ text:'Участок 1', value: '0'},
		{ text:'Участок 2', value: '1'},
		{ text:'Участок 3', value: '2'}
		]
	},

	mounted: function(){
		this.getAllUsers();
	},

	methods: {
		getAllUsers: function(){
			axios.get("http://localhost:8000/api/users")
			.then(function(response){
				if(response.data.error){
					app.errorMessage = response.data.message;
				}else{
					app.users = response.data;
				}
			});
		},

		saveUser: function(){
			if(this.newUser.l_name == "" || this.newUser.f_name == "" || this.newUser.iin == "" || this.selected == null){
				this.addValidateMessage = "Вы не заполнили необходимые поля!";
				return false;
			}else{
				this.showingAddModal = false;
				this.addValidateMessage = "";
				var user = { id: this.newUser.id,
					l_name: this.newUser.l_name,
					f_name: this.newUser.f_name,
					pat_name: this.newUser.pat_name,
					iin: this.newUser.iin,
					position: this.newUser.position,
					area_id: this.selected
				};
				axios.post("http://localhost:8000/api/user/create", user)
				.then(function(response){
					app.newUser = {l_name: "", f_name: "", pat_name: "", iin: "", area_id: "", position: ""};
					if(response.data.error){
						error = true;
						app.errorMessage = response.data.message;
					}else{
						success = true;
						app.successMessage = response.data.message;
						app.getAllUsers();
					}
				});
			}
		},

		updateUser: function(){

			if(this.clickedUser.l_name == "" || this.clickedUser.f_name == "" || this.clickedUser.iin == "" || this.selected == null){
				this.addValidateMessage = "Вы не заполнили необходимые поля!";
				return false;
			}else{
				this.showingEditModal = false;
				this.addValidateMessage= "";
				var user = { id: this.clickedUser.id,
					l_name: this.clickedUser.l_name,
					f_name: this.clickedUser.f_name,
					pat_name: this.clickedUser.pat_name,
					iin: this.clickedUser.iin,
					position: this.clickedUser.position,
					area_id: this.selected
				};

				axios.put("http://localhost:8000/api/user/"+ user.id, user)
				.then(function(response){
					app.clickedUser = {};
					if(response.data.error){
						app.errorMessage = response.data.message;
					}else{
						app.successMessage = response.data.message;
						app.getAllUsers();
					}
				});
			}
		},

		deleteUser: function(){
			axios.delete("http://localhost:8000/api/user/" + this.clickedUser.id)
			.then(function(response){
				app.clikedUser = {};
				if(response.data.error){
					app.errorMessage = response.data.message;
				}else{
					app.successMessage = response.data.message;
					app.getAllUsers();
				}
			});
		},


		selectUser: function(user){
			app.selected = user.area_id;
			app.clickedUser = user;
		},

	// toFormData: function(obj){
	// 	vconsolear form_data = new FormData();
	// 	for(var key in obj){
	// 		form_data.append(key, obj[key]);
	// 	}
	// 	return form_data;
	// },

	clearMessage: function(){
		app.errorMessage = "";
		app.successMessage = "";
	},

	clearAll: function(){
		this.addValidateMessage = "";
		this.newUser = {l_name: "", f_name: "", pat_name: "", iin: "", area_id: "", position: ""};
		this.getAllUsers();
	}
}
});