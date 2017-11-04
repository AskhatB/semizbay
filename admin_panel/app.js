var app = new Vue({
	el: "#main",
	data: {
		showingAddModal: false,
		showingEditModal: false,
		showingDeleteModal: false,
		errorMessage: "",
		successMessage: "",
		users: [],
		newsUser: {last_name: "", first_name: "", pat_name: "", iin: "", area: "", position: ""},
		clikedUser: {}
	},

	mounted: function(){
		console.log("mounted");
		this.getAllUsers();
	},

	methods: {
		getAllUsers: function(){
			axios.get("http://localhost:8000/api/users")
			.then(function(response){
				//console.log(response);
				if(response.data.error){
					app.errorMessage = response.data.message;
				}else{
					app.users = response.data.users;
				}
			});
		},

		saveUser: function(){
			//console.log(app.newsUser);
			var formData = app.toFormData(app.newUser);
			axios.post("some/api ", formData)
			.then(function(response){
				//console.log(response);
				app.newUser = {last_name: "", first_name: "", pat_name: "", iin: "", area: "", position: ""};
				if(response.data.error){
					app.errorMessage = response.data.message;
				}else{
					app.getAllUsers();
				}
			});
		},

		updateUser: function(){
			//console.log(app.newsUser);
			var formData = app.toFormData(app.clikedUser);
			axios.post("some/api", formData)
			.then(function(response){
				//console.log(response);
				app.clikedUser = {};
				if(response.data.error){
					app.errorMessage = response.data.message;
				}else{
					app.successMessage = response.data.message;
					app.getAllUsers();
				}
			});
		},

		deleteUser: function(){
			//console.log(app.newsUser);
			var formData = app.toFormData(app.clikedUser);
			axios.post("some/api", formData)
			.then(function(response){
				//console.log(response);
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
			app.clikedUser = user;
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