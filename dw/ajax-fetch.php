<?php
include_once("connection.php");
$id=$_GET["chk"];
$query="select * from profile where Userid='$id'";
$check=mysqli_query($dbcon,$query);
$count=mysqli_num_rows($check);
if($count==0)
    echo "Username Available";
else 
    echo "Username already registred";
?>
