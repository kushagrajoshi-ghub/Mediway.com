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
            $("#eye1").mousedown(function() {

                $(this).removeClass("fa fa-eye-slash").addClass("fa fa-eye");
                $("#oldpwd").prop("type", "text");
            });
            $("#eye1").mouseup(function() {

                $(this).removeClass("fa fa-eye").addClass("fa fa-eye-slash");
                $("#oldpwd").attr("type", "password");
            });


            $("#eye").mousedown(function() {

                $(this).removeClass("fa fa-eye-slash").addClass("fa fa-eye");
                $("#newpwd").prop("type", "text");
            });
            $("#eye").mouseup(function() {

                $(this).removeClass("fa fa-eye").addClass("fa fa-eye-slash");
                $("#newpwd").attr("type", "password");
            });
            ////////////////////////////////////////////////////////////////////

            //--------------------------------------------------------------//

        });

    </script>
    <script>
        $(document).ready(function() {
            $("#save").click(function() {
                var uid = $("#email").val();
                var oldpwd = $("#oldpwd").val();
                var newpwd = $("#newpwd").val();
                var url = "needy-setting-pwd-ajax.php?uid=" + uid + "&oldpwd=" + oldpwd + "&newpwd=" + newpwd;
                $.get(url, function(response) {
                    //                    alert(response);
                    $("#msg").html(response);
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
              border: #0d6efd solid;
            box-shadow: 0px 0px 10px 2px #0d6efd;
        }

    </style>
    <style>
    #boxtxt {
            padding: 10px 5px 10px 5px;
            background-color:#D0D3D4  ;
            color: black;
/*            font-weight: bolder;*/
            border-radius: 25px 25px 0px 25px;
            position: fixed;
            bottom: 25px;
            right: 5px;
/*            font-size: 30px;*/
/*            text-align: center;*/
        }
#lt{
            position: absolute;
            right: 3%;
            
        }
    </style>
</head>

<body>

<!--
    <div class="row bg-primary" style="width:100.92%;">
        <center>
            



            <font color="white" size="6"><b>Needy Dashboard</b></font>

            <ul class="navbar-nav ml-auto" style="float:right;">
                <li class="nav-item">
                    <a type="button" class="nav-pills" href="logout.php" style="color:white;">
                        <i class="fa fa-sign-out" aria-hidden="true"> Logout</i>
                    </a>
                </li>
            </ul>
        </center>


    </div>
-->
  <nav class="navbar navbar-expand-lg bg-primary text-light ml-auto">
  <div class="container-fluid">
<!--   <label><font color="white"><i class="fa fa-user" aria-hidden="true"></i> <?php echo $_SESSION['active_user']?></font></label>-->

  <label style="position: absolute; left: 50%; transform: translatex(-50%); " class="">
                <h2>Needy DashBoard</h2>
            </label>
            
                    <a class="navbar-brand" href="#">Navbar</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
                    <a type="button" class="nav-link mt-1" href="logout.php" style="color:white;" id="lt">
                       <h5> <i class="fa fa-sign-out" aria-hidden="true"> Logout</i></h5>
                    </a>
                
    </div>

</nav>
   <div class="row container">
           <label><font color="black"><i class="fa fa-user" aria-hidden="true"></i> <?php echo $_SESSION['active_user']?></font></label>
       </div>

<!--                                                                                   -->
<!--                                                                                   -->
<!--                                                                                   -->
    <div class="container ">
        <div class="row d-flex d">
            <div class="card d-flex bdr  mt-4 " style="width: 18rem;">
                <img src="pictures/theuser.png" class="card-img-top" alt="...">
                <div class="card-body">
                    <h5 class="card-title">Manage your profile</h5>
                    <p class="card-text"></p>
                    <a href="profile-needy.php" class="btn btn-primary">Profile Editor</a>
                </div>
            </div>
            <div class="card  bdr mt-4 " style="width: 18rem;">
                <img src="pictures/search.jfif" class="card-img-top" alt="...">
                <div class="card-body">
                    <h5 class="card-title">Find Medicines</h5>
                    <p class="card-text"></p>
                    <a href="find-medicine.php" class="btn btn-primary">Open Form</a>
                </div>
            </div>
            <div class="card d-flex bdr  mt-4 " style="width: 18rem;">
                <img src="pictures/lg.jfif" width="100px" class="card-img-top" alt="...">
                <div class="card-body ">
                    <h5 class="card-title ">Change Password</h5>
                    <p class="card-text"></p>

                    <button class="btn btn-primary me-2" type="button" data-bs-toggle="modal" data-bs-target="#signupWin">Open Form</button>

                </div>
            </div>

        </div>
        <!------------------------------------------------------------------>
        <!------------------------------------------------------------------>
        <!------------------------------------------------------------------>
        <div class="modal fade" id="signupWin" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header bg-light text-dark">
                        <h5 class="modal-title" id="exampleModalLabel"><u>Generate password </u></h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form method="post" name="frmSignup" id="frmSignup">
                            <div class="mb-3">
                                <label for="exampleInputEmail1" class="form-label"><i class="fa fa-user-o" aria-hidden="true"></i>&nbsp;Email address:</label>
                                <div style="float:right;"><img src="pictures/loading9.gif" id="chakkar"></div>
                                <input type="email" class="form-control" id="email" name="email" aria-describedby="emailHelp" placeholder="Enter Email Address" readonly value="<?php echo $_SESSION['active_user']?>">
                                <span id="erruid"></span>
                            </div>
                            <div class="mb-3">
                                <label for="exampleInputPassword1" class="form-label"><i class="fa fa-lock" aria-hidden="true"></i>&nbsp;Password:</label>
                                <input type="password" class="form-control" id="oldpwd" name="oldpwd" placeholder="Enter the Password">
                                <i class="fa fa-eye-slash" id="eye1" aria-hidden="true"></i>
                                <span id="errpwd" style="float:right"></span>
                            </div>
                            <div class="mb-3">
                                <label for="exampleInputEmail1" class="form-label"><i class="fa fa-unlock-alt" aria-hidden="true"></i>&nbsp;New Password:</label>
                                <input type="password" class="form-control" id="newpwd" name="newpwd" aria-describedby="emailHelp" placeholder="Enter the New Password">
                                <i class="fa fa-eye-slash" id="eye" aria-hidden="true"></i>
                                <span id="errmob"></span>
                            </div>

                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>

                                <input type="button" class="btn btn-primary" id="save" name="save" value="Submit">
                            </div>
                            <center>
                                <span id="msg"></span>
                            </center>
                            <br>
                        </form>
                    </div>

                </div>
            </div>
        </div>
    </div>
</body>
