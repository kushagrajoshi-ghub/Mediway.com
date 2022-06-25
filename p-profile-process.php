<?php

     include_once("connection.php");
    
   $btn=$_POST["btn"];
      $uid=$_POST["proemail"];
      $fname=$_POST["proname"];
      $mob=$_POST["pronum"];
      $add=$_POST["proadd"];
      $city=$_POST["procity"];
      $idproof=$_POST["proid"];

      $name=$_FILES["ppic"]["name"];
      $tmp_name=$_FILES["ppic"]["tmp_name"];
      $name=$uid."-".$name;

      $name2=$_FILES["idpic"]["name"];
      $tmp_name2=$_FILES["idpic"]["tmp_name"];
      $name2=$uid."-".$name2;

      if($btn=="Submit")
      {
      $query="insert into profiles(uid,name,contact,address,city,picpath,idpath,idtype) values('$uid','$fname','$mob','$add','$city','$name','$name2','$idproof')";
      
      move_uploaded_file($tmp_name,"myuploads/".$name);
      move_uploaded_file($tmp_name2,"myuploads/".$name2);

      mysqli_query($dbcon,$query);

      $msg=mysqli_error($dbcon);
      if($msg=="")   
      {      echo "<script type='text/javascript'>
        alert('Saved Successfully');
        window.location='dash-provider.php';
        </script>";
//          header("location:response-provider.php?uid=".$uid);
//           echo "<font color='green'><b>Registered Successfully&#9996;</b></font>" ;     
//          ."$msg=<font color='green'><b>Registered Successfully</b></font>"

      }
      else
         
        echo $msg;
      }



      else if($btn=="Update")
      { 
      $uid=$_POST["proemail"];
      $fname=$_POST["proname"];
      $mob=$_POST["pronum"];
      $add=$_POST["proadd"];
      $city=$_POST["procity"];
      $idproof=$_POST["proid"];

      $name=$_FILES["ppic"]["name"];
      $tmp_name=$_FILES["ppic"]["tmp_name"];
//      $name=$uid."-".$name;

      $name2=$_FILES["idpic"]["name"];
      $tmp_name2=$_FILES["idpic"]["tmp_name"];
//      $name2=$uid."-".$name2;

          $oldpic=$_POST["hdn1"];
          if($name=="")
          {
            $name=$oldpic;
          }
          else 
          {
              $name=$uid."-".$name;
               move_uploaded_file($tmp_name,"myuploads/".$name);
          }
          /////////////////////
           $oldpic2=$_POST["hdn2"];
          if($name2=="")
          {
            $name2=$oldpic2;
          }
          else 
          {
              $name2=$uid."-".$name2;
               move_uploaded_file($tmp_name2,"myuploads/".$name2);
          }
          ////////////////////////
       $query="update profiles 
       set name='$fname', contact='$mob',address='$add',city='$city',picpath='$name', idpath='$name2',idtype='$idproof' where uid='$uid'";

	  mysqli_query($dbcon,$query);
	
      move_uploaded_file($tmp_name,"myuploads/".$name);
      move_uploaded_file($tmp_name2,"myuploads/".$name2);



	$msg=mysqli_error($dbcon);
	if($msg=="")
	{
		$count=mysqli_affected_rows($dbcon);
		if($count==1)
			echo "<script type='text/javascript'>
        alert('SUCCESSFULLY UPDATED');
        window.location='dash-provider.php';
        </script>";
		else
			echo "Invalid Id";
			
	}
	else
		echo $msg;
	}
      

?>