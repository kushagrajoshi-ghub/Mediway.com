<?php
include_once("connection.php");
$docity;
$uid=$_POST["name"];
$medname=$_POST["medname"];
$company=$_POST["company"];
$date=$_POST["date"];
$unit=$_POST["type"];
$qty=$_POST["qty"];
$dosage=$_POST["dosage"];
 
      $name=$_FILES["fpic"]["name"];
      $tmp_name=$_FILES["fpic"]["tmp_name"];
      $name=$uid."-".$name;

      $name2=$_FILES["bpic"]["name"];
      $tmp_name2=$_FILES["bpic"]["tmp_name"];
      $name2=$uid."-".$name2;
//----------------------------------//
$query1="select city from profiles where uid='$uid'";
$city=mysqli_query($dbcon,$query1);
$num=mysqli_num_rows($city);
if($num==0)
{
    echo "Invalid ID";
}
else{
    

    while($row=mysqli_fetch_array($city))
    {
        $docity=$row["city"];
    }
        
}
//----------------------------------//
$query="insert into medicines(uid,medname,company,date,unit,qty,dosage,city,fpic,bpic) values('$uid','$medname','$company','$date','$unit','$qty','$dosage','$docity','$name','$name2')";


      mysqli_query($dbcon,$query);
	
      move_uploaded_file($tmp_name,"myuploads/".$name);
      move_uploaded_file($tmp_name2,"myuploads/".$name2);
 $msg=mysqli_error($dbcon);
      if($msg=="")   
          echo "<script type='text/javascript'>
        alert('Saved Successfully');
        window.location='dash-provider.php';
        </script>";
    else
        echo $msg;

?>