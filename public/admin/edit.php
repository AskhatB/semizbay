<?php 

include "connectdb.php";
$data=json_decode(file_get_contents("php://input"));
$query="DELETE FROM users WHERE iin='$data->iin'";
$con->query($query);
?>