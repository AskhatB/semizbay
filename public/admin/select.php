<?php
include "connectdb.php";

$query="SELECT * FROM users ORDER BY id DESC";

$rs=$con->query($query);

while($row=$rs->fetch_array()){
	$data[] = $row;
}
	print json_encode($data);
?>