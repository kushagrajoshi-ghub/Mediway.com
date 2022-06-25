<?php
include_once("connection.php");
$uid=$_GET["chk"];
$query="select * from users where email='$uid'";
$check=mysqli_query($dbcon,$query);
$count=mysqli_num_rows($check);
if($count==0)
    echo "Username Available";
else 
    echo "Username already registred";
?>
