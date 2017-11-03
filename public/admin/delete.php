<?php 

include "connectdb.php";
$data=json_decode(file_get_contents("php://input"));
$query="DELETE FROM users WHERE id='$data->id'";
$con->query($query);
?>