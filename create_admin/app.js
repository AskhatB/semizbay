var app = new Vue({
	el: "#main",
	data: {
		showingAddModal: false,
		showingEditModal: false,
		showingDeleteModal: false,
		errorMessage: "",
		successMessage: "",
		addValidateMessage: "",
		admins: [],
		areas:[],
		newUser: {login: "", password: "", nameLocation: ""},
		clickedAdmin: {},
		selected: null
	},

	mounted: function(){
		this.getAllAdmins();
	},
	methods: {
		getAllAdmins: function(){
			axios.get("http://localhost:8000/api/users")
			.then(function(response){
				if(response.data.error){
					app.errorMessage = response.data.message;
				}else{
					app.admins = response.data;
				}
			});
		},
		updateUser: function(){
			if(this.clickedAdmin.login == "" || this.clickedAdmin.password == "" || this.clickedAdmin.iin == ""){
				this.addValidateMessage = "Вы не заполнили необходимые поля!";
				return false;
			}else{
				this.showingEditModal = false;
				this.addValidateMessage= "";
				var admin = { id: this.clickedAdmin.id,
					login: this.clickedAdmin.login,
					password: this.clickedAdmin.password,
					nameLocation: this.clickedAdmin.nameLocation
				};

				axios.put("http://localhost:8000/api/user/"+ admin.id, admin)
				.then(function(response){
					app.clickedAdmin = {};
					if(response.data.error){
						app.errorMessage = response.data.message;
					}else{
						app.successMessage = response.data.message;
						app.getAllAdmins();
					}
				});
			}
		},
		deleteUser: function(){
			axios.delete("http://localhost:8000/api/user/" + this.clickedAdmin.id)
			.then(function(response){
				app.clickedAdmin = {};
				if(response.data.error){
					app.errorMessage = response.data.message;
				}else{
					app.successMessage = response.data.message;
					app.getAllAdmins();
				}
			});
		},
		selectUser: function(user){
			app.clickedAdmin = user;
		},
		clearMessage: function(){
			app.errorMessage = "";
			app.successMessage = "";
		},

		clearAll: function(){
			this.addValidateMessage = "";
			this.getAllUsers();
		}
	}
});