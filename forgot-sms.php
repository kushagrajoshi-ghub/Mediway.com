<?php
//session_start();
include_once("connection.php");
include_once("SMS_OK_sms.php");
//include_once("");
$email=$_GET["forgotuid"];
$query="select * from users where email='$email' ";

$table=mysqli_query($dbcon,$query);
$count=mysqli_num_rows($table);

if($count==0)
    echo "Enter Email ID";
else{
    while($row=mysqli_fetch_array($table))
    {
        $resp=SendSMS($row['mobile']," Password:".$row['pwd']);
        echo $resp."*Server is down for maintainance*";
    }
}


?>