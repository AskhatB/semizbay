<?php 
include "connectdb.php";
$data=json_decode(file_get_contents("php://input"));
$btnName=$con->real_escape_string($data->btnName);
// if($btnName=="Добавить"){
$l_name=$con->real_escape_string($data->l_name);
$f_name=$con->real_escape_string($data->f_name);
$pat_name=$con->real_escape_string($data->pat_name);
$iin=$con->real_escape_string($data->iin);
$phone=$con->real_escape_string($data->phone);
$email=$con->real_escape_string($data->email);
$position=$con->real_escape_string($data->position);

$query="INSERT INTO users(l_name, f_name, pat_name, iin, phone, email, position) VALUES('".$l_name."', '".$f_name."', '".$pat_name."', $iin, '".$phone."', '".$email."', '".$position."')";
$con->query($query);
 // else {
 // 	$id=$dbhandle->real_escape_string($data->id);
 // 	$l_name=$dbhandle->real_escape_string($data->l_name);
	// $f_name=$dbhandle->real_escape_string($data->f_name);
	// $pat_name=$dbhandle->real_escape_string($data->pat_name);
	// $iin=$dbhandle->real_escape_string($data->iin);
	// $position=$dbhandle->real_escape_string($data->position);
	// $query="UPDATE employers SET l_name ='".$l_name."', f_name = '".$f_name."', pat_name = '".$pat_name."', iin= $iin,position= '".$position."' WHERE id= $id";
	// $dbhandle->query($query);
 // }

?>

