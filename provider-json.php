<?php

include_once("connection.php");

$uidy=$_GET["uidy"];
$query="select * from profiles where uid='$uidy'";

	$table=mysqli_query($dbcon,$query);

$ary=array();
while($row=mysqli_fetch_array($table))
{
	$ary[]=$row;
}
echo json_encode($ary);

?>