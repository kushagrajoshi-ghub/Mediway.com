<?php

include_once("connection.php");

$med=$_GET["med"];	
$query="select distinct city from medicines where medname='$med'";

	$table=mysqli_query($dbcon,$query);//1 or 0 possibility

$ary=array();//creation of empty array
while($row=mysqli_fetch_array($table))
{
	$ary[]=$row;//storing row in array
}
echo json_encode($ary);//gives us JSON format

?>