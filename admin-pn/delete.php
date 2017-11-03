<?php 

include "connectdb.php";
$data=json_decode(file_get_contents("php://input"));
$query="DELETE FROM employers WHERE id='$data->id'";
$dbhandle->query($query);
?>