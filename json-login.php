<?php
session_start();
include_once("connection.php");
$email=$_GET["email1"];
$pass=$_GET["pass1"];
$query="select * from users where email='$email' and pwd='$pass'";

$table=mysqli_query($dbcon,$query);
$num=mysqli_num_rows($table);

if($num==0)
    echo "Invalid";
else 
{
    while($row=mysqli_fetch_array($table))
    {
        $_SESSION["active_user"]=$email;
        echo $row["category"];
    }
        
}
//$search=$_GET["chk"];
//$query="select * from users where email='$search'";
//$rec=mysqli_query($dbcon,$query);
//$arr=array();
//while($row=mysqli_fetch_array($rec))
//{
//	$arr[]=$row;
//}
//echo json_encode($arr);

?>
