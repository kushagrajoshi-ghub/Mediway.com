<?php
include_once("connection.php");
//$uid=$_GET["chk"];
//$pwd=$_GET["pwd"];
//$query="select * from users where email='$uid'";
//$check=mysqli_query($dbcon,$query);
//$count=mysqli_num_rows($check);
//if($count==1)
//    echo "Correct";
//else
//    echo "<font color='red'>Incorrect</font>";

$uid=$_GET["uid"];
$oldpwd=$_GET["oldpwd"];
$newpwd=$_GET["newpwd"];
$query="select * from users where email='$uid' and pwd='$oldpwd'";


$table=mysqli_query($dbcon,$query);

$ary=array();
while($row=mysqli_fetch_array($table))
{
	$ary[]=$row;
}


if(count($ary)==0)
    echo "<font color='red'>Invalid Email Id or password</font>";
else
{

    $query="update users set pwd='$newpwd' where email='$uid' and pwd='$oldpwd'";
	mysqli_query($dbcon,$query);
    $msg=mysqli_error($dbcon);
	if($msg=="")
	{
		$count=mysqli_affected_rows($dbcon);
		if($count==1)
			echo "<font color='green'>Password Changed!</font>";
		else
			echo "<font color='red'>Invalid Id or Password <br><u>Else old & new Password Same</u></font>";

	}
	else
		echo $msg;
}

?>