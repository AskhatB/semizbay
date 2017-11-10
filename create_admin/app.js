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
		clickedAdmin: {}
	},

	mounted: function(){
		this.getAllAdmins();
	},
	methods: {
		getAllAdmins: function(){
			axios.get("http://localhost:8000/api/admins")
			.then(function(response){
				if(response.data.error){
					app.errorMessage = response.data.message;
				}else{
					app.admins = response.data;
				}
			});
		},
		updateUser: function(){
			if(this.clickedAdmin.login == "" || this.clickedAdmin.password == ""){
				this.addValidateMessage = "Вы не заполнили необходимые поля!";
				return false;
			}else{
				this.showingEditModal = false;
				this.addValidateMessage= "";
				var admin = { 
					id: this.clickedAdmin.id,
					login: this.clickedAdmin.login,
					password: this.clickedAdmin.password
				};

				axios.put("http://localhost:8000/api/admins/"+ admin.id, admin)
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