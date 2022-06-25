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
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="jss/jquery-1.8.2.min.js"></script>
    <script src="jss/bootstrap.bundle.min.js"></script>
    <link rel="shortcut icon" href="pictures/icon2.jfif">
   <title>Mediway.com</title>
    <script>
        $(document).ready(function() {

            //-----------------------------------------
            $(document).ajaxStart(function() {
                $("#chakkar").css("display", "inline");
            });
            $(document).ajaxStop(function() {
                $("#chakkar").css("display", "none");
            });
            $(".fa").mousedown(function() {

                $(this).removeClass("fa fa-eye-slash").addClass("fa fa-eye");
                $("#oldpwd").prop("type", "text");
            });
            $(".fa").mouseup(function() {

                $(this).removeClass("fa fa-eye").addClass("fa fa-eye-slash");
                $("#oldpwd").attr("type", "password");
            });


            //                $(".fa").mousedown(function() {
            //
            //                $(this).removeClass("fa fa-eye-slash").addClass("fa fa-eye");
            //                $("#newpwd").prop("type", "text");
            //            });
            //                $(".fa").mouseup(function() {
            //
            //                $(this).removeClass("fa fa-eye").addClass("fa fa-eye-slash");
            //                $("#newpwd").attr("type", "password");
            //            }); 
            ////////////////////////////////////////////////////////////////////

            //--------------------------------------------------------------//
        });

    </script>
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
</head>

<body style="background-color: #EAF2F8;">
    <div class="row bg-primary" style="width:100.92%;">
        <h2>
            <center>
                <font color="white">Medicine Donor</font>
            </center>
        </h2>
    </div>
    <form method="post" enctype="multipart/form-data" action="p-process-medpost.php">
        <div class="container">
            <div class="row mt-4">
                <div class="col-md-5 form-group">
                    <label for="">Email:</label>
                    <input type="text" class="form-control" name="name" required placeholder="Enter Your EmailId" id="name" readonly value="<?php echo $_SESSION['active_user']?>">
                    <span id="errUid"></span>
                </div>
            </div>
            <div class="row mt-2">
                <div class="col-md-5 form-group ">
                    <label for="">Medicine:</label>
                    <input type="text" class="form-control" name="medname" placeholder="Enter name of medicine" id="medname">
                    <span id="errname"></span>

                </div>

                <div class="col-md-4 form-group">
                    <label for="">Company:</label>
                    <input type="text" class="form-control" name="company" placeholder="Enter name of company" id="company">
                    <span id="errmob"></span>
                </div>
                <div class="col-md-3 form-group">
                    <label class="form-label">Type:</label>
                    <input list="atype" id="type" name="type" class="form-control"  placeholder="Select the category of medicine">
                    <datalist id="atype">
                        <option value="Tablet"></option>
                        <option value="Capsule"></option>
                        <option value="Syrup"></option>
                        <option value="Gel"></option>
                        <option value="Box"></option>
                        <option value="Injection"></option>
                    </datalist>
                </div>
            </div>
            <div class="row mt-2">
                <div class="col-md-5 form-group ">
                    <label for="">Date of Expiry:</label>
                    <input type="text" class="form-control" name="date" placeholder="dd-mm-yyyy" id="date">
                    <span id="errname"></span>

                </div>
                <div class="col-md-4 form-group ">
                    <label for="">Quantity:</label>
                    <input type="text" class="form-control" name="qty" placeholder="Amount of medicine available" id="qty">
                    <span id="errname"></span>

                </div>
                <div class="col-md-3 form-group ">
                    <label for="">Dosage:</label>
                    <input type="text" class="form-control" name="dosage" placeholder="(mg)" id="dosage">
                    <div><div class="form-text">&nbsp;Nil (if any)</div></div>
                    <span id="errname"></span>

                </div>
            </div>
            <div class="row mt-2">
                <div class="col-md-4 mb-1 form-group">
                    <label for="">Front Pic:</label>
                    <input type="file" name="fpic" id="fpic" class="form-control" onchange="showpreview(this,prev);">

                </div>
                <!--

                <div class=" col-md-1 form-group" style="margin-left:20px;">
                    <img src="pictures/download.png" width="130" height="100" id="prev2">
                </div>
-->
                <div class="col-md-1"></div>
                <div class="col-md-4 mb-1 form-group">
                    <label for="">Back Pic:</label>
                    <input type="file" name="bpic" id="bpic" class="form-control" onchange="showpreview(this,prev2);">

                </div>
            </div>
            <div class="row mt-2">
                <div class=" col-md-5 form-group mt-2">
                    <img src="pictures/blank.jfif" width="200" height="140" id="prev">
                </div>
                <div class=" col-md-5 mt-2 form-group">
                    <img src="pictures/blank.jfif" width="200" height="140" id="prev2">
                </div>
            </div>
            <div class="row mt-5">

                <div class="">
                    <input type="submit" class="btn btn-primary btn-outline-success " value="Save" name="btn" id="save" style="color:white;">
                </div>
            </div>
        </div>
    </form>
</body>
