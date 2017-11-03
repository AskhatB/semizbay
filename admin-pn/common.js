var app = angular.module('myApp', []);
app.controller('cntrl', function($scope,$http){
	$scope.obj={'idisable':false};
	$scope.btnName="Добавить";
	$scope.insertdata=function(){
		$http.post("insert.php",{'l_name':$scope.l_name, 'f_name':$scope.f_name,'pat_name':$scope.pat_name, 'iin':$scope.iin,'position':$scope.position, 'btnName':$scope.btnName}).success(function(){
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

	$scope.editEmpl=function(l_name, f_name, pat_name, iin, position){
		$scope.l_name=l_name;
		$scope.f_name=f_name;
		$scope.pat_name=pat_name;
		$scope.iin=iin;
		$scope.position=position;
    	$scope.btnName="Изменить";
    	$http.post("edit.php", {'iin': iin}).then(function(response){
    		$scope.displayEmpl();
    	})
    	$scope.displayEmpl();
    };

	$scope.displayEmpl();
});	