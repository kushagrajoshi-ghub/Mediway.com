<?php
//Service
include_once("connection.php");

	$rid=$_GET["rid"];
$query="delete from medicines where rid='$rid'";
//$query1="select * from providermed";


	mysqli_query($dbcon,$query);
	

    echo "deleted";
?>