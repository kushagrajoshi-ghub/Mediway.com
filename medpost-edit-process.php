<?php

include_once("connection.php");

$rid=$_GET["rid"];	
$qty=$_GET["qty"];	
$query="update medicines set qty='$qty' where rid='$rid'";

mysqli_query($dbcon,$query);//1 or 0 possibility

  $msg=mysqli_error($dbcon);
	if($msg=="")
	
		
			echo "<font color='green'>Updated successfully!</font>";
		else
			echo "<font color='red'>Error occured</font>";
    
?>