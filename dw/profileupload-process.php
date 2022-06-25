<?php
include_once("connection.php");
$btn=$_POST["btn"];

if($btn=="Signup")
{
    $Uid=$_POST["txtUid"];
$pwd=$_POST["txtpwd"];
$name=$_POST["txt"];
$mob=$_POST["txtmob"];

$tmpname=$_FILES["ppic"]["tmp_name"]; $orgname=$_FILES["ppic"]["name"];

$path=$name."_".$orgname;

$query="insert into profile values('$Uid','$pwd','$name','$mob','$path',current_date())";
mysqli_query($dbcon,$query);//fire
move_uploaded_file($tmpname,"../myuploads/".$path);

$msg=mysqli_error($dbcon);
if($msg=="")
echo "Record Saved...";
else
	echo $msg;
echo "<center><b><u>Data uploaded as...</u></b></center>";

  echo "<hr><br><center>";
$t="<table border='1' rules='all'>";
$t=$t."<tr><td>User name:</td><td>".$Uid."</td></tr>";
$t=$t."<tr><td>Password:</td><td>".$pwd."</td></tr>";
$t=$t."<tr><td>Name:</td><td>".$name."</td></tr>";
$t=$t."<tr><td>profile pic:</td><td>".$path."</td></tr>";
//$t=$t."<tr><td colspan='2'><b><u>File uploaded successfully</u>..</b></td></tr>";
$t=$t."<tr><td colspan='2'>"?> <img src="../myuploads/<?php echo $path?>" width="300" height="200"><br><?php echo"</td></tr>";        
$t=$t."</table><br>";
echo  "<br>".$t;
echo "</center>";
}
else 
    if($btn=="Delete")
    {
        $Uid=$_POST["txtUid"];
        $query="delete from profile where Userid='$Uid'";
        mysqli_query($dbcon,$query);
        $count=mysqli_affected_rows($dbcon);
        if($count==0)
        {
            echo "Invalid ID";
        }
        else 
            echo $count."Record Deleted";
    }
else 
    if($btn=="Update")
    {
      
    
$Uid=$_POST["txtUid"];
$pwd=$_POST["txtpwd"];
$name=$_POST["txt"];
$mob=$_POST["txtmob"];

$tmpname=$_FILES["ppic"]["tmp_name"]; $orgname=$_FILES["ppic"]["name"];

$path=$name."_".$orgname;

$query="update profile set password='$pwd',Name='$name', mobile='$mob', picpath='$path' where Userid='$Uid'";
mysqli_query($dbcon,$query);//fire
move_uploaded_file($tmpname,"../myuploads/".$path);

$msg=mysqli_error($dbcon);
if($msg=="")
echo "Record Saved...";
else
	echo $msg;
    }
            
?>
