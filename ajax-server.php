<?php
include_once("connection.php");
$uid=$_GET["uid"];
$pwd=$_GET["pwd"];
$mob=$_GET["mob"];
$category=$_GET["category"];
$query="insert into users 
values('$uid','$pwd','$mob','$category',current_date()) where email='$uid'";
mysqli_query($dbcon,$query);
$msg=mysqli_error($dbcon);
if($msg=="")
{
    echo "Signup successful";
}
else $msg;

?>
<!--action="p-signup-process.php"-->