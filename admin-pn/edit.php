<?php 

include "connectdb.php";
$data=json_decode(file_get_contents("php://input"));
$query="DELETE FROM employers WHERE iin='$data->iin'";
$dbhandle->query($query);
?>