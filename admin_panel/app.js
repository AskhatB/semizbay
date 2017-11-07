var app = new Vue({
	el: "#main",
	data: {
		showingAddModal: false,
		showingEditModal: false,
		showingDeleteModal: false,
		errorMessage: "",
		successMessage: "",
		users: [],
		areas:[],
		newUser: {l_name: "", f_name: "", pat_name: "", iin: "", area: "", position: ""},
		clickedUser: {}
	},

	mounted: function(){
		console.log("mounted");
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
			var formData = app.toFormData(app.newUser);

			var user = { 
				l_name: formData.get('l_name'),
				f_name: formData.get('f_name'),
				pat_name: formData.get('pat_name'),
				iin: formData.get('iin'),
				position: formData.get('position')
			};

			axios.post("http://localhost:8000/api/user/create", user)
			.then(function(response){
				app.newUser = {l_name: "", f_name: "", pat_name: "", iin: "", area: "", position: ""};
				if(response.data.error){
					app.errorMessage = response.data.message;
				}else{
					app.successMessage = response.data.message;
					app.getAllUsers();
				}
			});
		},

		updateUser: function(){
			var formData = app.toFormData(app.clickedUser);


			var user = { id: formData.get('id'),
			l_name: formData.get('l_name'),
			f_name: formData.get('f_name'),
			pat_name: formData.get('pat_name'),
			iin: formData.get('iin'),
			position: formData.get('position')
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
	},

	deleteUser: function(){
		var formData = app.toFormData(app.clickedUser);
		axios.delete("http://localhost:8000/api/user/" + formData.get('id'), formData)
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
		app.clickedUser = user;
	},

	toFormData: function(obj){
		var form_data = new FormData();
		for(var key in obj){
			form_data.append(key, obj[key]);
		}
		return form_data;
	},

	clearMessage: function(){
		app.errorMessage = "";
		app.successMessage = "";
	}
}
});