<?php
include "connectdb.php";

$query="SELECT * FROM employers ORDER BY id DESC";

$rs=$dbhandle->query($query);

while($row=$rs->fetch_array()){
	$data[] = $row;
}
	print json_encode($data);
?>