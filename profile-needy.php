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

                var uid = $("#needemail").val();

                var url = "p-needy-json.php?uidy=" + uid;

                $.getJSON(url, function(jsonAry) {
                    //alert(JSON.stringify(jsonAry));
                    $("#needname").val(jsonAry[0].name);
                    $("#needmob").val(jsonAry[0].cantact);
                    $("#needadd").val(jsonAry[0].address);
                    $("#needstate").val(jsonAry[0].state);
                    $("#needcity").val(jsonAry[0].city);
                    $("#needid").val(jsonAry[0].idtype);
                    $("#prev").prop("src", "myuploads/" + jsonAry[0].idpath);
                    $("#hdn").val(jsonAry[0].idpath);
                    $("#update").prop("disabled", false);
                });
            });
        });

    </script>
    <script>
        function getCoordintes() {

            var options = {
                enableHighAccuracy: true,
                timeout: 5000,
                maximumAge: 0
            };

            function success(pos) {
                var crd = pos.coords;
                var lat = crd.latitude.toString();
                var lng = crd.longitude.toString();
                var coordinates = [lat, lng];
                console.log(`Latitude: ${lat}, Longitude: ${lng}`);
                getCity(coordinates);
                return;

            }

            function error(err) {
                console.warn(`ERROR(${err.code}): ${err.message}`);
            }

            navigator.geolocation.getCurrentPosition(success, error, options);
        }

        // Step 2: Get city name 
        function getCity(coordinates) {
            var xhr = new XMLHttpRequest();
            var lat = coordinates[0];
            var lng = coordinates[1];

            // Paste your LocationIQ token below. 
            xhr.open('GET', "https://us1.locationiq.com/v1/reverse.php?key=pk.03fe7c91ec5e96e2f0040a170753f494&lat=" +
                lat + "&lon=" + lng + "&format=json", true);
            xhr.send();
            xhr.onreadystatechange = processRequest;
            xhr.addEventListener("readystatechange", processRequest, false);

            function processRequest(e) {
                if (xhr.readyState == 4 && xhr.status == 200) {
                    var response = JSON.parse(xhr.responseText);
                    var city = response.address.state_district;
                    //					document.write(JSON.stringify(response));
                    //console.log(response);
                    //					document.write(city+" <br> "+response.address.state+"<br>  "+response.address.country);

                    document.getElementById("needcity").value = response.address.state_district;
                    document.getElementById("needstate").value = response.address.state;
                    return;
                }
            }
        }

    </script>
</head>

<body style="background-color: #EAF2F8;">

    <div class="bg-primary" style="height:50px;">

        <center>
            <h3>
                <font color="white">Profile Manager</font>
            </h3>
        </center>
    </div>


    <form method="post" enctype="multipart/form-data" action="p-needy-process.php">
        <div class="container">

            <div class="row">
                <div><br></div>
                <div class="col-md-6 form-group">
                    <label>Email/User Id:</label>
                    <input type="email" class="form-control" required id="needemail" name="needemail" placeholder="Enter Registered Email" readonly value="<?php echo $_SESSION['active_user']?>">
                    <input type="hidden" id="hdn" name="hdn">
                </div>
                <div class="col-md-1 form-group">
                    <label>&nbsp;</label>
                    <input type="button" class="btn btn-outline-primary form-control" value="fetch" id="fetch" name="fetch" >
                </div>
            </div>
            <div class="row">
                <div><br></div>
                <div class="col-md-6 form-group">
                    <label>Name:</label>
                    <input type="text" class="form-control" id="needname" name="needname" placeholder="Enter Full Name" required>
                </div>
                <div class="col-md-5 form-group">
                    <label>Contact No:</label>
                    <input type="text" class="form-control" id="needmob" name="needmob" placeholder="Enter 10 Digit mobile number" required>
                </div>
            </div>
            <div class="row">
                <div><br></div>
                <div class="col-md-6 form-group">
                    <label>Address:</label>
                    <input type="text" class="form-control" id="needadd" name="needadd" placeholder="Enter Address" required>
                </div>
                <div class="form-group col-md-2">
                    <label for="state">State:</label>
                    <select name="needstate" id="needstate" class="form-control">
                        <option value="Select">Select</option>
                        <option value="Andhra Pradesh">Andhra Pradesh</option>
                        <option value="Andaman and Nicobar Islands">Andaman and Nicobar Islands</option>
                        <option value="Arunachal Pradesh">Arunachal Pradesh</option>
                        <option value="Assam">Assam</option>
                        <option value="Bihar">Bihar</option>
                        <option value="Chandigarh">Chandigarh</option>
                        <option value="Chhattisgarh">Chhattisgarh</option>
                        <option value="Dadar and Nagar Haveli">Dadar and Nagar Haveli</option>
                        <option value="Daman and Diu">Daman and Diu</option>
                        <option value="Delhi">Delhi</option>
                        <option value="Lakshadweep">Lakshadweep</option>
                        <option value="Puducherry">Puducherry</option>
                        <option value="Goa">Goa</option>
                        <option value="Gujarat">Gujarat</option>
                        <option value="Haryana">Haryana</option>
                        <option value="Himachal Pradesh">Himachal Pradesh</option>
                        <option value="Jammu and Kashmir">Jammu and Kashmir</option>
                        <option value="Jharkhand">Jharkhand</option>
                        <option value="Karnataka">Karnataka</option>
                        <option value="Kerala">Kerala</option>
                        <option value="Madhya Pradesh">Madhya Pradesh</option>
                        <option value="Maharashtra">Maharashtra</option>
                        <option value="Manipur">Manipur</option>
                        <option value="Meghalaya">Meghalaya</option>
                        <option value="Mizoram">Mizoram</option>
                        <option value="Nagaland">Nagaland</option>
                        <option value="Odisha">Odisha</option>
                        <option value="Punjab">Punjab</option>
                        <option value="Rajasthan">Rajasthan</option>
                        <option value="Sikkim">Sikkim</option>
                        <option value="Tamil Nadu">Tamil Nadu</option>
                        <option value="Telangana">Telangana</option>
                        <option value="Tripura">Tripura</option>
                        <option value="Uttar Pradesh">Uttar Pradesh</option>
                        <option value="Uttarakhand">Uttarakhand</option>
                        <option value="West Bengal">West Bengal</option>
                    </select>
                </div>
                <div class="form-group col-md-3">
                    <label for="city">City/Locality:</label>
                    <input type="text" class="form-control" id="needcity" name="needcity" required placeholder="Enter Locality">
                    <div class="form-text">&nbsp;*Enter the city manually</div>
                </div>
            </div>
            <div class="row">
                <div><br></div>
                <div class="form-group col-md-2">
                    <label for="">Id Proof:</label>
                    <select class="form-control" id="needid" name="needid" required>
                        <option value="Select">Select</option>
                        <option value="Adhaar">Adhaar</option>
                        <option value="PAN Card">PAN Card</option>
                        <option value="Voter Id">Voter Id</option>
                        <option value="Driving License">Driving License</option>
                        <option value=""></option>
                        <option value=""></option>
                    </select>
                </div>
                <div class="form-group col-md-4">
                    <label>Upload Id Proof:</label>
                    <input type="file" class="form-control" id="ppic" name="ppic" onchange="showpreview(this,prev);">
                </div>
                <div class="col-md-3">
                    <img src="pictures/download.png" width="200" height="130" id="prev">
                </div>
                <div class="form-group col-md-2">
                    <label></label>
                    <input type="button" class="form-control btn btn-warning" value="Location" id="location" name="location" onclick="getCoordintes();">
                </div>
            </div>

            <div class="row">
                <div class="">
                    <span id="profilemsg" class=""><br><br></span>
                    <div><br></div>
                    <input type="submit" class="btn btn-primary btn-outline-success" value="Submit" name="btn" id="save" style="color:white;">
                    <input type="submit" class="btn btn-outline-primary" value="Update" name="btn" id="update" disabled>

                </div>
            </div>
        </div>
    </form>
</body>

</html>
