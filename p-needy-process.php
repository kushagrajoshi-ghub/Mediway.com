<?php

     include_once("connection.php");
    
   $btn=$_POST["btn"];
      $uid=$_POST["needemail"];
      $fname=$_POST["needname"];
      $mob=$_POST["needmob"];
      $add=$_POST["needadd"];
      $state=$_POST["needstate"];
      $city=$_POST["needcity"];
      $idproof=$_POST["needid"];

      $name=$_FILES["ppic"]["name"];
      $tmp_name=$_FILES["ppic"]["tmp_name"];
      $name=$uid."-".$name;

      if($btn=="Submit")
      {
      $query="insert into needyprofile(uid,name,cantact,address,state,city,idtype,idpath) values('$uid','$fname','$mob','$add','$state','$city','$idproof','$name')";
      
      move_uploaded_file($tmp_name,"myuploads/".$name);
      
      mysqli_query($dbcon,$query);

      $msg=mysqli_error($dbcon);
      if($msg=="")   
      {
         echo "<script type='text/javascript'>
        alert('Saved Successfully');
        window.location='dash-needy.php';
        </script>";           

      }
      else
         
        echo $msg;
      }



      else if($btn=="Update")
      { 
      $uid=$_POST["needemail"];
      $fname=$_POST["needname"];
      $mob=$_POST["needmob"];
      $add=$_POST["needadd"];
      $state=$_POST["needstate"];
      $city=$_POST["needcity"];
      $idproof=$_POST["needid"];

      $name=$_FILES["ppic"]["name"];
      $tmp_name=$_FILES["ppic"]["tmp_name"];
//      $name=$uid."-".$name; 
//////////////////////////////////////////////////
           $oldpic=$_POST["hdn"];
          if($name=="")
          {
            $name=$oldpic;
          }
          else 
          {
              $name=$uid."-".$name;
               move_uploaded_file($tmp_name,"myuploads/".$name);
          }
//////////////////////////////////////////////////
       $query="update needyprofile 
       set name='$fname', cantact='$mob',address='$add',state='$state',city='$city', idpath='$name',idtype='$idproof' where uid='$uid'";

	  mysqli_query($dbcon,$query);
	
      move_uploaded_file($tmp_name,"myuploads/".$name);
     

	$msg=mysqli_error($dbcon);
	if($msg=="")
	{
		$count=mysqli_affected_rows($dbcon);
		if($count==1)
             echo "<script type='text/javascript'>
        alert('Updated Successfully');
        window.location='dash-needy.php';
        </script>"; 
			
		else
			echo "Invalid Id";
			
	}
	else
		echo $msg;
	}
      

?>