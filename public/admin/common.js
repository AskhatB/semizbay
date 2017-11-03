var app = angular.module('myApp', []);
app.controller('cntrl', function($scope,$http){
	$scope.obj={'idisable':false};
	$scope.btnName="Добавить";
	$scope.insertdata=function(){
		$http.post("insert.php",{'l_name':$scope.l_name, 'f_name':$scope.f_name,'pat_name':$scope.pat_name, 'iin':$scope.iin, 'phone':$scope.phone, 'email':$scope.email, 'position':$scope.position, 'btnName':$scope.btnName}).success(function(){
			$scope.l_name="";
			$scope.f_name="";
			$scope.pat_name="";
			$scope.iin="";
			$scope.phone="";
			$scope.email="";
			$scope.position="";
			$scope.msg="Добавлено";
			$scope.displayEmpl();
		})
	}

	$scope.displayEmpl=function(){
		$http.get("select.php").success(function(data){
			$scope.data=data;
		})
	}

	$scope.deleteEmpl=function(id){
		$http.post("delete.php", {'id':id}).success(function(){
			$scope.msg = "Работник удален из базы!"
			$scope.displayEmpl();
		})
	}

	$scope.editEmpl=function(l_name, f_name, pat_name, iin, phone, email, position){
		$scope.l_name=l_name;
		$scope.f_name=f_name;
		$scope.pat_name=pat_name;
		$scope.iin=iin;
		$scope.phone=phone;
		$scope.email=email;
		$scope.position=position;
    	$scope.btnName="Изменить";
    	$http.post("edit.php", {'iin': iin}).then(function(response){
    		$scope.displayEmpl();
    	})
    	$scope.displayEmpl();
    };

	$scope.displayEmpl();
});	

