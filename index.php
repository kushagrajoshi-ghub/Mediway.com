<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="css/bootstrap.css">
    <script src="jss/jquery-1.8.2.min.js"></script>
    <script src="jss/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
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
            //-------------------------------------------
            $("#signupemail").blur(function() {
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
                        if(msg.trim() == "needy")
                        location.href = "dash-needy.php";
                    else 
                        alert("Please enter Email Id" );
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
                var regExp=/^[a-zA-Z0-9+_.-]+@[a-zA-Z0-9.-]+$/;

                if (regExp.test(uid) == false) {
                    alert("Invalid email ID")
                }
            });
//-------------------------
            $("#forgot").click(function() {
              var email1= $("#loginuid").val();
                
//                    alert($("#loginuid").val());
            var url2="forgot-sms.php?forgotuid=" + email1;
                     $.get(url2, function(response) {
                       alert(response);
                    });
        
            });
        });

    </script>
    <style>
        #chakkar {
            display: none;

        }

        .d {
            display: flex;
            /*            border: 2px black solid;*/
            flex-direction: row;
            align-items: center;
            justify-content: space-around;
            flex-wrap: wrap;
            /*    border-radius: 12px 12px 12px 12px;*/
        }

        .bdr {
            /*            border: #0d6efd solid;*/
            box-shadow: 1px 1px 5px 2px grey;
        }

    </style>
    <style>
     #bt {
            padding: 10px 15px 10px 15px;
           background-color:#e1e4e6 ;
            color: black;
/*            font-weight: bolder;*/
            border-radius: 50px 50px 50px 50px;
            position: fixed;
            bottom: 25px;
            right: 15px;
/*            font-size: 30px;*/
           text-align: center;
        
        }

    </style>
</head>

<body style="background-color: #e3f2fd;" id="top">
    <div><a id="bt" href="#top" class="bg-gradient"><i class="fa fa-angle-double-up" aria-hidden="true"></i></a></div>
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
    <!--------------------------------------------------------------------------------------------------------------------------->
    <!--                                              crousel                                                                  -->
    <div id="carouselExampleIndicators" class="carousel slide mt-5" data-bs-ride="carousel">
        <div class="carousel-indicators">
            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button>
            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="3" aria-label="Slide 4"></button>
        </div>
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img src="pictures/carousel2.jpg" class="d-block w-100" alt="...">
            </div>
            <div class="carousel-item">
                <img src="pictures/pills.jpg" class="d-block w-100" alt="...">
            </div>
            <div class="carousel-item">
                <img src="pictures/6.jpg" class="d-block w-100" alt="...">
            </div>
            <div class="carousel-item">
                <img src="pictures/5.jpg" class="d-block w-100" alt="...">
            </div>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>
    
    <!--------------------------------------------------------------------------------------------------------------------------->
    <!--                                              Our Services                                                             -->
    <a id="services"></a>
        <div class="row mt-1" style="width:100.96%; ">
            <div style="background-color:#2d82c2; color:white;">
                <h4>
                    <center>Our Services</center>
                </h4>
            </div>
        </div>
    
    <div class="">
        <div class="container d">
            <div class="card mt-3 bdr" style="width: 18rem;">
                <img src="pictures/card.png" class="card-img-top" alt="..." height="160">
                <div class="card-body">
                    <h5 class="card-title"><u>
                            <center>
                                <font face="Constantia">Contributor</font>
                            </center>
                        </u></h5>
                    <p class="card-text">The inequality in the medication distribution is at high. The generous people who have excess of medication stocks or are willing to help the needful can donate the medicines. We have a very easy and convinient process, you can help by signing up.</p>

                </div>
            </div>
            <div class="card mt-3 bdr" style="width: 18rem;">
                <img src="pictures/carding.png" class="card-img-top" alt="..." height="160">
                <div class="card-body">
                    <h5 class="card-title mt-2 "><u>
                            <center>
                                <font face="Constantia">Needful</font>
                            </center>
                        </u></h5>
                    <p class="card-text mb-3">If you are one of the people who haven't had enough resources for the medications. We are here to help out and ensure that everyone's recieving the medicines they need. Signup here and find your suitable medication.</p>

                </div>
            </div>
            <div class="card mt-3 bdr" style="width: 18rem;">
                <img src="pictures/cardall.png" class="card-img-top" alt="..." height="160">
                <div class="card-body">
                    <h5 class="card-title"><u>
                            <center>
                                <font face="Constantia">Cause</font>
                            </center>
                        </u></h5>
                    <p class="card-text">Medway provides the assisatnce and contributes as a link between the donator and the needful so that the process remains convinient and trustworthy. We work to ensure the transparency of the project and provide the best support to the ones in need.</p>

                </div>
            </div>
        </div>
    </div>
    <!--------------------------------------------------------------------------------------------------------------------------->
    <!--                                              developed by                                                             -->
    <a id="developer"></a>
        <div class="row mt-4 mb-4" style="width:100.96%; ">
            <div style="background-color:#2d82c2; color:white;">
                <h4>
                    <center>Know the Developers</center>
                </h4>
            </div>
        </div>
        <div class="">
        <div class="container mt-3">
            <div class="col-md-6 mx-auto row vertical-align" style=" float:left;">
                <div class="col-md-12">
                    <center>
                        <div class="h4 btn-secondary">Under Guidance of</div>
                    </center>
                </div>
<!--                <div class="bg-light row align-items-center" >-->
                <div class="col-md-5 row  align-items-center mx-auto " >
                                    <img src="pictures/guidance.jfif" width="" height="" class="rounded  ">

                </div>
                <div class="col-md-8 row mx-auto " >
                    <u>
                                <h5><center>Rajesh Bansal</center></h5>
                            </u><p>
                            A brilliant coder with
                            20 Years of experience in Training &amp; Development. Founder of realJavaOnline.com and also the author of book <b>"</b>Real Java<b>"</b>.</p>
                            <p>
                            Contact info:<br>
                            Email: bcebti@gmail.com<br>
                            Contact: +91 98722-46056 
                            </p>
                            
                </div>
<!--                </div>-->
            </div>
            
            <div class="col-md-6 mx-auto row vertical-align" style="float:left; ">
                <div class="col-md-12">
                    <center>
                        <div class="h4 btn-secondary">Developed by</div>
                    </center>
                </div>
<!--                <div class="bg-light row align-items-center" >-->
                <div class="col-md-5 row align-items-center mx-auto" >
                                    <img src="pictures/picturemy.jpg" width="" height="" class="rounded ">

                </div>
                
                <div class="col-md-8 row align-items-center center-block mx-auto" >
                    <u>
                                <h5>Kushagra Joshi</h5>
                            </u><p>
                              A second year student currently pursuing Bachelor of Technology  in computer science engineering at SRM Institute of Science and Technology, Delhi-NCR.
                            <p>
                            Contact info:<br>
                            Email: kushagrasandeep@gmail.com<br>
                            Contact:+91 99716-37228  
                            </p>
                            
                </div>
<!--                </div>-->
            </div>
            </div>
            </div>
            <!--
            <div class="row mt-3">
                <div class="col-md-6">
                    <center>
                        <div class="h4 btn-secondary">Under Guidance of</div>
                    </center>
                    <div class="btn-light" style="float:left;"><img src="pictures/guidance.jfif" width="200" height="200" class="mt-2 rounded float-left">
                        <div class=" col-md-7 font-weight-bold" style="float:right;">
                            <u>
                                <h5>Rajesh Bansal</h5>
                            </u>
                            A brilliant coder with
                            20 Years of experience in Training &amp; Development. Founder of realJavaOnline.com and also the author of book <b>"</b>Real Java<b>"</b>.
                            <br>Contact info:<br>
                            Email: bcebti@gmail.com<br>
                            Contact: +91 98722-46056 <br>
                            <br>
                        </div>
                    </div>
                </div>

                <div class="col-md-6 float-right">
                    <center>
                        <div class=" h4 btn-secondary "> Developed by</div>
                    </center>
                    <div class="btn-light card">
                    <div class="btn-light" style="float:left;">
                       <img src="pictures/mypic.jpg" width="200" height="200" class="mt-2 rounded float-left">
                        </div>
                        <div class=" col-md-7 font-weight-bold btn-light" style="float:right;">
                            <u>
                                <h5>Kushagra Joshi</h5>
                            </u>
                            A second year student currently pursuing Bachelor of Technology (B. Tech) in computer science engineering at SRM Institute of Science and Technology, Delhi-NCR.<br>
                            Contact info:<br>
                            Email: kushagrasandeep@gmail.com<br>
                            Contact: +91 99716-37228<br>
                            <br>
                        </div>
                   </div>
                </div>
            </div>
-->
        
    
    <!--------------------------------------------------------------------------------------------------------------------------->
    <!-----------                                         Reach Us                                                      --------->
    <a id="reach"></a>
    <div class="row mt-5" style="width:100.96%; ">
        <div style="background-color:#2d82c2; color:white;">
            <h4>
                <center>Reach Us</center>
            </h4>
        </div>
    </div>
    <div class="container mt-2 mb-2">
        <center>
            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3447.8835125064206!2d74.95000951511905!3d30.211871981821712!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x391732a4f014b8f7%3A0x7fa736d540603db!2sSun-Soft%20Technologies%20(%20Android%20Java%20PHP%20Angular%20)!5e0!3m2!1sen!2sin!4v1616068025640!5m2!1sen!2sin" width="" height="350" style="border:0; width:100%;" allowfullscreen="" loading="lazy"></iframe>
        </center>
    </div>
    <!--------------------------------------------------------------------------------------------------------------------------->
    <!--                                                  Copyright                                                            -->
    <div class="row " style="width:100.96%; ">
        <div style="background-color:#2d82c2; color:white;" class="navbar navbar-expand-lg container-fluid">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item"><a href="https://www.facebook.com/kushagra.joshi.509/" class="nav-link" style="color: white;"> <i class="fa fa-facebook" aria-hidden="true" style="color:white;"> Facebook</i></a></li>
                <li class="nav-item"><a href="https://www.instagram.com/musical_paranoid_/" class="nav-link" style="color: white;"> <i class="fa fa-instagram" aria-hidden="true" style="color:white;"> Instagram</i></a></li>
                <li class="nav-item"><a href="https://twitter.com/Kushagr55389516" class="nav-link" style="color: white;"><i class="fa fa-twitter-square" aria-hidden="true" style="color:white;"> Twitter</i></a></li>
                <li class="nav-item"><a href="https://www.linkedin.com/in/kushagra-joshi-b830131b2/" class="nav-link" style="color: white;"> <i class="fa fa-linkedin" aria-hidden="true" style="color:white;"> LinkedIn</i></a></li>
                <li class="nav-item"><a href="kushagrasandeep@gmail.com" class="nav-link" style="color: white;"><i class="fa fa-envelope" aria-hidden="true" style="color:white;"> E-Mail</i></a></li>
                <li class="nav-item"><a href="tel:+919971637228" class="nav-link" style="color: white;"><i class="fa fa-phone" aria-hidden="true" style="color:white;"> Phone</i></a></li>
                
            </ul>
            &copy;Copyright Reserved
        </div>
    </div>
    <!--------------------------------------------------------------------------------------------------------------------------->
    <!--------------------------------------------------------------------------------------------------------------------------->
    <!--------------------------------------------------------------------------------------------------------------------------->
    <!-- Login Modal -->
    <div class="modal fade" id="loginWin" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header bg-light text-dark">
                    <h5 class="modal-title" id="exampleModalLabel">LOGIN</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="json-login.php">
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">&nbsp;<i class="fa fa-user-o" aria-hidden="true"></i>&nbsp;Email address:</label>
                            <input type="email" class="form-control" id="loginuid" aria-describedby="emailHelp">
                            <!--							<div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>-->
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputPassword1" class="form-label">&nbsp;<i class="fa fa-lock" aria-hidden="true"></i>&nbsp;Password:</label><i class="fa fa-eye-slash mt-1 float-end" id="eye2" aria-hidden="true"></i>
                            <input type="password" class="form-control" id="loginpwd" name="loginpwd">
                            <!--                            <i class="fa fa-eye-slash" id="eye2" aria-hidden="true"></i>-->
                        </div> 
                       <div class="form-text btn-link" style="display:flex; justify-content: flex-start;" name="forgot" id="forgot">Forgot password?</div>
                        <div class="modal-footer">
                           
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <input type="button" class="btn btn-primary" id="login" name="login" value="Login">
                            
                        </div>
                        
                       <div>
                            <center>
                            <span id="loginmsg"></span>
                        </center>
                       </div>
                        <br><br>
                    </form>
                </div>

            </div>
        </div>
    </div>
    <!-- Signup Modal -->
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
