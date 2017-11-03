<?php 
include "connectdb.php";
$data=json_decode(file_get_contents("php://input"));
$btnName=$dbhandle->real_escape_string($data->btnName);
// if($btnName=="Добавить"){
$l_name=$dbhandle->real_escape_string($data->l_name);
$f_name=$dbhandle->real_escape_string($data->f_name);
$pat_name=$dbhandle->real_escape_string($data->pat_name);
$iin=$dbhandle->real_escape_string($data->iin);
$position=$dbhandle->real_escape_string($data->position);

$query="INSERT INTO employers(l_name, f_name, pat_name, iin, position) VALUES('".$l_name."', '".$f_name."', '".$pat_name."', $iin, '".$position."')";
$dbhandle->query($query);
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

