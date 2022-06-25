<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="css/bootstrap.css">
    <script src="jss/jquery-1.8.2.min.js"></script>
    <script src="jss/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    
    <title>Task</title>
    <script>
        $(document).ready(function() {
            //-----------------------------------------
            $(document).ajaxStart(function() {
                $("#chakkar").css("display", "inline");
            });
            $(document).ajaxStop(function() {
                $("#chakkar").css("display", "none");
            });
            //-------------------------------------------
            $("#signupemail").keyup(function() {
                var uid = $("#signupemail").val();
                var url = "ajax-signup.php?chk=" + uid;

                $.get(url, function(display) {
                    $("#erruid").html(display).css("color", "green");
                });
            });
            //-----------------------------------------
            $("#signup").click(function() {
                var qstring = $("#frmSignup").serialize();
                //alert(qstring);
                var uid = document.getElementById("signupemail").value;
                var uid1 = document.getElementById("signuppwd").value;
                var uid2 = document.getElementById("signupmob").value;
                var uid3 = document.getElementById("category").value;

                if (uid == "") {
                    alert("Please enter Email Id");
                } else
                if (uid1 == "") {
                    alert("Please enter password");
                } else
                if (uid2 == "") {
                    alert("please enter mobile number");
                } else
                if (uid3 == "") {
                    alert("Please select category");
                } else {
                    var url = "p-signup-process.php?" + qstring;
                    $.get(url, function(response) {
                        $("#signupmsg").html(response);
                    });
                }
            });
            //----------------------------------------------
            $("#login").click(function() {

                var email1 = $("#loginuid").val();
                var pass1 = $("#loginpwd").val();

                var url = "json-login.php?email1=" + email1 + "&pass1=" + pass1;

                $.get(url, function(msg) {
                    if (msg.trim() == "Invalid")
                        $("#loginmsg").html("<u>Invalid Email Or Password</u>").css("color", "red");
                    else
                    if (msg.trim() == "provider")
                        location.href = "dash-provider.php";
                    else
                    if (msg.trim() == "needy")
                        location.href = "dash-needy.php";
                    else
                        alert("Please enter Email Id");
                });
            });
            //-------------------------------------------------------------------------------------------------------------
            $("#eye1").mousedown(function() {

                $(this).removeClass("fa fa-eye-slash").addClass("fa fa-eye");
                $("#signuppwd").prop("type", "text");
            });
            $("#eye1").mouseup(function() {

                $(this).removeClass("fa fa-eye").addClass("fa fa-eye-slash");
                $("#signuppwd").attr("type", "password");
            });
            $("#eye2").mousedown(function() {

                $(this).removeClass("fa fa-eye-slash").addClass("fa fa-eye");
                $("#loginpwd").prop("type", "text");
            });
            $("#eye2").mouseup(function() {

                $(this).removeClass("fa fa-eye").addClass("fa fa-eye-slash");
                $("#loginpwd").attr("type", "password");
            });
            //---------------------------------------------
            $("#signupemail").blur(function() {
                var uid = $(this).val();
                //                var regExp = /^\w+@[a-zA-Z_]+?\.[a-zA-Z]{2,3}$/;
                var regExp = /^[a-zA-Z0-9+_.-]+@[a-zA-Z0-9.-]+$/;

                if (regExp.test(uid) == false) {
                    alert("Invalid email ID")
                }
            });
            //-------------------------
            $("#forgot").click(function() {
                var email1 = $("#loginuid").val();

                //                    alert($("#loginuid").val());
                var url2 = "forgot-sms.php?forgotuid=" + email1;
                $.get(url2, function(response) {
                    alert(response);
                });

            });
        });

    </script>

</head>

<body style="background-color: #e3f2fd;" id="top">
 <nav class="navbar navbar-expand-lg navbar-light  fixed-top" style="background-color: #e3f2fd;">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">
                <img src="pictures/logo12.jpg" alt="" width="30" height="30" style="border-radius:50%;">
                <a class="navbar-brand" href="#" style="font-size:25px;font-family:Constantia;">Mediway.com</a>
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">


                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            About Us
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown ">
                            <li><a class="dropdown-item" href="#services">Our services</a></li>
                            <li><a class="dropdown-item" href="#developer">Developed by</a></li>
                            <li>
                                <hr class="dropdown-divider">
                            </li>
                            <li><a class="dropdown-item" href="#reach">Reach us</a></li>
                        </ul>
                    </li>

                </ul>
                <form class="d-flex">
                    <button class="btn btn-success me-2" type="button" data-bs-toggle="modal" data-bs-target="#signupWin">SignUp</button>
                </form>
                &nbsp;
                <form class="d-flex">
                    <button class="btn btn-outline-success me-2" type="button" data-bs-toggle="modal" data-bs-target="#loginWin">Login</button>
                </form>
            </div>
        </div>
    </nav>
  <div class="modal fade" id="signupWin" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header bg-light text-dark">
                    <h5 class="modal-title" id="exampleModalLabel"><i class="fa fa-user-plus" aria-hidden="true"></i>&nbsp;Signup</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form method="post" name="frmSignup" id="frmSignup">
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">&nbsp;<i class="fa fa-user-o" aria-hidden="true"></i>&nbsp;Email address:</label>
                            <div style="float:right;"><img src="pictures/loading9.gif" id="chakkar"></div>
                            <input type="email" class="form-control" required id="signupemail" name="signupemail" aria-describedby="emailHelp">
                            <span id="erruid"></span>
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputPassword1" class="form-label">&nbsp;<i class="fa fa-lock" aria-hidden="true"></i>&nbsp;Password:</label> <i class="fa fa-eye-slash mt-1 float-end" id="eye1" aria-hidden="true" style="float:right;"></i>
                            <input type="password" class="form-control" id="signuppwd" name="signuppwd">
                            <!--                            <i class="fa fa-eye-slash" id="eye1" aria-hidden="true" style="float:right;"></i>-->
                            <span id="errpwd"></span>
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">&nbsp;<i class="fa fa-mobile" aria-hidden="true"></i>&nbsp;Mobile:</label>
                            <input type="text" class="form-control" id="signupmob" name="signupmob" aria-describedby="emailHelp" onkeypress="return (event.charCode >= 48 && event.charCode <= 57)">
                            <span id="errmob"></span>
                        </div>
                        <div class="col-md-12 form-group">
                            <label class="form-label"><i class="fa fa-server" aria-hidden="true"></i>&nbsp;Category:</label>
                            <select id="category" name="category" class="form-control" placeholder="select category" required>
                                <option></option>
                                <option value="provider">Contributor</option>
                                <option value="needy">Needful</option>
                            </select>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>

                            <input type="button" class="btn btn-primary" id="signup" name="btn" value="signup">
                        </div>
                        <center>
                            <span id="signupmsg"></span>
                        </center>
                        <br><br>
                    </form>
                </div>

            </div>
        </div>
    </div>
</body>

</html>
