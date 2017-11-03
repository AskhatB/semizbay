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
if($myrow['password']==$password){ 
$cookie_name = $_POST['login']; 
setcookie("admin",$cookie_name,time() + (86400 * 30)); 
header("Location: http://semyzbay-u.kapsafety.kz/admin/panel.php"); 
} else { 
echo "<SCRIPT type='text/javascript'> //not showing me this 
alert('Ошибка. Неправильный логин или пароль.'); 
window.location.replace(\"index.php\"); 
</SCRIPT>"; 
exit(); 

} 
} 

?>

	