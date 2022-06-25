<?php
include_once("connection.php");
$search=$_GET["chk"];
$query="select * from profile where Userid='$search'";
$rec=mysqli_query($dbcon,$query);
$arr=array();
while($row=mysqli_fetch_array($rec))
{
	$arr[]=$row;
}
echo json_encode($arr);
?>