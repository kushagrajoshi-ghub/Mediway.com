<?php
include_once("connection.php");
      $uid=$_GET["signupemail"];
      $pwd=$_GET["signuppwd"];
      $num=$_GET["signupmob"];
      $type=$_GET["category"];
     

      $query="insert into users(email,pwd,mobile,category,dos) values('$uid','$pwd','$num','$type',current_date())";


      mysqli_query($dbcon,$query);
    $msg=mysqli_error($dbcon);
      if($msg=="")   
          echo "<font color='green'>Sign up Successfull</font>";
    else
        echo "<font color='red'><b><u>Error Signing In</u></b></font>";
?>


