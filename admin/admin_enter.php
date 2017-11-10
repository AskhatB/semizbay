<?php 
include 'connectdb.php'; 
$login = $_POST['login']; 
$password = $_POST['password']; 
$query = mysqli_query($con,"SELECT * FROM admins WHERE login = '$login'"); 
$myrow = mysqli_fetch_array($query); 
if(empty($myrow['login'])){ 
	echo "<SCRIPT type='text/javascript'> //not showing me this 
	alert('Ошибка. Неправильный логин или пароль.'); 
	window.location.replace(\"index.php\"); 
	</SCRIPT>"; 
	exit(); 
} else { 
	if($myrow['password']==$password && $myrow['isAdmin'] == 0){ 
		$cookie_name = $_POST['login']; 
		setcookie("admin",$cookie_name,time() + (86400 * 30)); 
		header("Location: http://localhost/semizbay/admin/panel.php"); 
	} else if($myrow['password'] == $password && $myrow['isAdmin'] == 1){
		$cookie_name = $_POST['login']; 
		setcookie("admin2",$cookie_name,time() + (86400 * 30)); 
		header("Location: http://localhost:8000/events/".$myrow['area_id']); 
	} else { 
		echo "<SCRIPT type='text/javascript'> //not showing me this 
		alert('Ошибка. Неправильный логин или пароль.'); 
		window.location.replace(\"index.php\"); 
		</SCRIPT>"; 
		exit(); 
	} 
} 

?>

