<?php
session_start();
if(isset($_SESSION["active_user"])==false) {
    header("location:index.php");
}
?>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="css/bootstrap.css">
    <script src="jss/jquery-1.8.2.min.js"></script>
    <script src="jss/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
   <script src="jss/geolocation.js"></script>
    <link rel="shortcut icon" href="pictures/icon2.jfif">
    <title>Mediway.com</title>


    <script>
        function showpreview(file, strId) {

            if (file.files && file.files[0]) {
                var reader = new FileReader();
                reader.onload = function(e) {
                    $(strId).prop('src', e.target.result);
                }
                reader.readAsDataURL(file.files[0]);
            }
        }

    </script>
    <script>
        $(document).ready(function() {

            $("#fetch").click(function() {

                var uid = $("#proemail").val();

                var url = "provider-json.php?uidy=" + uid;

                $.getJSON(url, function(jsonAry) {
//                    alert(JSON.stringify(jsonAry));
                    $("#proname").val(jsonAry[0].name);
                    $("#pronum").val(jsonAry[0].contact);
                    $("#proadd").val(jsonAry[0].address);
                    $("#procity").val(jsonAry[0].city);
                    $("#proid").val(jsonAry[0].idtype);
                    $("#prev1").prop("src", "myuploads/" + jsonAry[0].picpath);
                    $("#prev2").prop("src", "myuploads/" + jsonAry[0].idpath);
                    $("#hdn1").val(jsonAry[0].picpath);
                    $("#hdn2").val(jsonAry[0].idpath);
                    $("#update").prop("disabled",false);
                });
            });
        });

    </script>
    <style>
        .rang {
            background-color: #283747;
        }
        html,body{
            max-width: 100%;
            overflow-x: hidden;
        }
    </style>
    <title>dash-provide</title>
</head>

<body style="background-color: #EAF2F8;">
<!--

    <div class="row bg-primary" style="width:100.9%;">
        <h2>
            <center>
                <font color="white">Profile Manager</font>
            </center>
        </h2>
    </div>
-->


   
<!--
    <div class="bg-primary" style="height:50px;">
    
            <center>
                <h3>
                    <font color="white">Profile Manager</font>
                </h3>
            </center>
        </div>
-->
         <nav class="navbar navbar-expand-lg bg-primary text-light ml-auto">
  <div class="container-fluid">
   

  <label style="position: absolute; left: 50%; transform: translatex(-50%); " class="">
                <h2>Profile Manager</h2>
            </label>
            
                    <a class="navbar-brand" href="#">Navbar</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
                   
    </div>

</nav>

    <div class="container">
<!--
   
-->
   
        <form action="p-profile-process.php" method="post" enctype="multipart/form-data">
            <input type="hidden" id="hdn1" name="hdn1">
            <input type="hidden" id="hdn2" name="hdn2">

            <div class="row">
                <div class="col-md-5 form-group ">
                    <label for=""><br>Email/User Id:</label>
                    <input type="text" class="form-control" name="proemail" required placeholder="Enter User id" id="proemail" readonly value="<?php echo $_SESSION['active_user']?>">
                    <span id="errUid"></span>
                </div>
                <div class="col-md-1 mt-4 form-group">
                    <label for="">&nbsp;</label>
                    <input type="button" class="form-control btn btn-outline-primary" id="fetch" value="Search">
                </div>
            </div>
            <div class="row mt-4">
                <div class="col-md-5 form-group ">
                    <label for="">Name:</label>
                    <input type="text" class="form-control" name="proname" placeholder="Enter Full Name" id="proname" required>
                    <span id="errname"></span>

                </div>

                <div class="col-md-4 <form-group></form-group>">
                    <label for="">Mobile Number:</label>
                    <input type="text" class="form-control" name="pronum" placeholder="Enter 10 digit mobile no." id="pronum" required>
                    <span id="errmob"></span>
                </div>
            </div>
            <div class="row mt-2">
                <div class="col-md-7 form-group ">
                    <label for="" class="">Address:</label>
                    <input type="text" class="form-control mt-2" id="proadd" name="proadd" aria-describedby="emailHelp" placeholder="Enter Complete Address" required>
                    <!--<span id="errUid">*</span>-->
                </div>
<!--
                <div class="col-md-2  form-group">
                    <label><i class="fa fa-map-pin" aria-hidden="true"></i>&nbsp;City:</label><br>
                    <select name="procity" id="procity" class="form-control" onclick="getCoordintes();">
                        <option selected>Select</option>
                        <option value="Delhi">Delhi</option>
                        <option value="Mumbai">Mumbai</option>

                    </select>
                </div>
-->
<!--                <input type="text" id="city" name="city" onclick="getCoordintes();">-->
                 <div class="col-md-2 form-group">
                    <label class="form-label"><i class="fa fa-map-pin" aria-hidden="true"></i>&nbsp;City:</label>
                    <input list="atype" id="procity" name="procity" class="form-control"  placeholder="Select" onclick="getCoordintes();" required>
                    <datalist id="atype">
                        <option value="Delhi"></option>
                        <option value="Mumbai"></option>
                        <option value="Chandigarh"></option>
                        <option value="Pune"></option>
                        <option value="Kolkata"></option>
                    </datalist>
                    <div class="form-text">&nbsp;*Enter the city manually</div>
                </div>
                
            </div>
            <div class="row mt-2 ">
                <div class="col-md-4 form-group">
                    <label for="">Profile Pic:</label>
                    <input type="file" name="ppic" id="ppic" class="form-control" onchange="showpreview(this,prev1);">

                </div>

                <div class=" col-md-2 form-group">
                    <img src="pictures/inviuser.jfif" width="100" height="110" id="prev1">
                </div>

            </div>
            <div class="row mt-2">

                <div class=" col-md-2 form-group">
                    <label>Choose ID Proof:<br></label>&nbsp;<br>
                    <select name="proid" id="proid" class="form-control" required>
                        <option selected>Select</option>
                        <option value="aadhar">Aadhar Card</option>
                        <option value="pan">PAN Card</option>
                        <option value="drive">Driving License</option>
                        <option value="voter">Voter Id</option>
                    </select>
                </div>

                <div class="col-md-4 mb-1 form-group">
                    <label for="">ID Proof:</label>
                    <input type="file" name="idpic" id="idpic" class="form-control" onchange="showpreview(this,prev2);">

                </div>

                <div class=" col-md-1 form-group" style="">
                    <img src="pictures/download.png" width="130" height="100" id="prev2">
                </div>
            </div>
            <!------------------------------------------------>
            <div class="row mt-4">

                <div class="">
                    <input type="submit" class="btn btn-primary btn-outline-success " value="Submit" name="btn" id="save" style="color:white;">
                    <input type="submit" class="btn btn-outline-primary " value="Update" name="btn" id="update"  disabled>


                    
                </div>
            </div>

        </form>
    </div>

</body>
