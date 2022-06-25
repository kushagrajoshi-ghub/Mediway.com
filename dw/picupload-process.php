<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Document</title>
</head>

<body>
    <?php
    $Uid=$_POST["txtU"];
    $tmpname=$_FILES["ppic"]["tmp_name"];
    $orgname=$_FILES["ppic"]["name"];
    $size=$_FILES["ppic"]["size"];
    if($orgname=="")
    {
        echo "Pic Not Uploaded";
        $full="nopic.png";
    }
    else
    {
//        echo "Tmp_name: ".$tmpname."<br>";
//        echo "Original name: ".$orgname."<br>";
//        echo "Size= ".$size."<br>";
        $full=$Uid."_".$orgname;
        move_uploaded_file($tmpname,"../myuploads/".$full);
            
    echo "<br><hr><br><center>";
$t="<table border='1' rules='all'>";
$t=$t."<tr><td>temporary name</td><td>".$tmpname."</td></tr>";
$t=$t."<tr><td>Original Name:</td><td>".$orgname."</td></tr>";
$t=$t."<tr><td>Size</td><td>".$size."</td></tr>";
$t=$t."<tr><td>Uploaded as:</td><td>".$full."</td></tr>";
$t=$t."<tr><td colspan='2'><b><u>File uploaded successfully</u>..</b></td></tr>";
$t=$t."<tr><td colspan='2'>"?> <img src="../myuploads/<?php echo $full ?>" width="300" height="200"><?php echo"</td></tr>";        
$t=$t."</table>";
echo $t;
echo "</center>";

//echo "<br>File uploaded successfully..<br>";
    }
    ?>
<!--
    <center>
       <br><hr><br>
        <img src="../myuploads/<?php echo $full ?>" width="300" height="200">
        
    </center>
-->
</body>

</html>
