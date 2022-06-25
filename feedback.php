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
   <title>Mediway.com/feedback</title>
    <script>
        $(document).ready(function() {
           $("#hello").click(function() { 
               alert("Feedback sent");
           });
        });
    </script>
    </head>
    <body style="background-color: #EAF2F8;">

    <div class="bg-primary" style="height:50px;">
    
            <center>
                <h3>
                    <font color="white">Feedback Form</font>
                </h3>
            </center>
        </div>
  

    <form method="post" action="dash-provider.php">
        <div class="container">

            <div class="row">
                <div><br></div>
                <div class="col-md-6 form-group">
                    <label>Email Id:</label>
                    <input type="email" class="form-control" required id="needemail" name="needemail" placeholder="Enter Registered Email" readonly value="<?php echo $_SESSION['active_user']?>">
                </div>
                    <div class="col-md-4 form-group">
                    <label>Name:</label>
                    <input type="text" class="form-control" id="needname" name="needname" placeholder="Enter Full Name">
                </div>
               
            </div>
            <div class="row">   
<!--
                <div class="col-md-5 form-group">
                    <label>Contact No:</label>
                    <input type="text" class="form-control" id="needmob" name="needmob" placeholder="Enter 10 Digit mobile number">
                </div>
-->
            </div>
            <div class="row">
                <div><br></div>
                <div class="col-md-10 form-group">
                    <label>Subject:</label>
                    <input type="text" class="form-control" id="needadd" name="needadd" placeholder="Feedback related to which field">
                </div>

              
            </div>
            <div class="row mt-3">
             <div class="col-md-8 form-group">
                 <label for="" class="form-label">Feedback:</label>
                 <textarea name="" id="" cols="30" rows="6" class="form-control"></textarea>
             </div>
            </div>

            <div class="row mt-5"> 
            <div>
          <input type="submit" class="btn btn-primary btn-outline-light col-md-1" value="Submit" id="hello" >
            </div>
            </div>
        </div>
    </form>
</body>
</html>