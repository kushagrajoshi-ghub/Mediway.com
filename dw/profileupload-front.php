<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="../css/bootstrap.css">
    <script src="../jss/bootstrap.bundle.min.js"></script>
    <script src="../jss/jquery-1.8.2.min.js"></script>
    <title>Document</title>
    <script>function showpreview(file, strId) {

            if (file.files && file.files[0]) {
                var reader = new FileReader();
                reader.onload = function(e) {
                    $(strId).prop('src', e.target.result);
                }
                reader.readAsDataURL(file.files[0]);
            }
        }</script>  
    <script>
    $(document).ready(function(){
//---------------------------
       $("#txtUid").blur(function(){
         var uid=$("#txtUid").val();
         var url="ajax-fetch.php?chk="+uid;
           $.get(url,function(display){
              $("#errUid").html(display).css("color","green"); 
           });
       });
//------------------------------------------------
        $("#record").click(function(){
			
			var uid=$("#txtUid").val();
			
			var url="json-profile.php?chk="+uid;
			
			$.getJSON(url,function(fetch)
            {
    $("#txtpwd").val(fetch[0].password);
    $("#txt").val(fetch[0].Name);
    $("#txtmob").val(fetch[0].mobile);
    $("#prev").prop("src","../myuploads/"+fetch[0].picpath);
				
			});
		});
//--------------------------------------------------
        $("#update").click(function(){
            
        });
    });
    </script>     
</head>

<body>
    <div class="container">
        <div class="row bg-primary">
            <h2>
                <center>User Profile</center>
            </h2>
        </div>
        <form action="profileupload-process.php" method="post" enctype="multipart/form-data">
            <div class="row">
                <div class="col-md-6 form-group bg-light" style="margin-left:250px;">
                    <label for=""><br>Email Id:</label>
                    
                    <input type="text" class="form-control" name="txtUid" required placeholder="Enter User id" id="txtUid">
             <span id="errUid"></span>
                </div>
                <div class="col-md-2 form-group">
                    <label for=""></label>
                    <br><br>
                    <input type="button" class="form-control btn btn-secondary"  id="record" value="Search">
                </div>
            </div>
            <div class="row">
                <div class="col-md-6 form-group bg-light" style="margin-left:250px;">
                    <label for=""><br>Password:</label>
                    <input type="password" class="form-control" name="txtpwd" placeholder="Enter Password" id="txtpwd">
                     <span id="errpwd"></span>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6 form-group bg-light" style="margin-left:250px;">
                    <label for=""><br>Name:</label>
                    <input type="text" class="form-control" name="txt"  placeholder="Enter Full Name" id="txt">
                    <span id="errname"></span>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6 form-group bg-light" style="margin-left:250px;">
                    <label for=""><br>Mobile Number:</label>
                    <input type="text" class="form-control" name="txtmob" placeholder="Enter 10 digit mobile no." id="txtmob">
                  <span id="errmob"></span>
                </div>
            </div>
            <div class="row" style="margin-top:10px;">
                <div class="col-md-4 form-group bg-light" style="margin-left:250px;">
                    <label for="" style="margin-top:20px;">Profile Pic:</label>
                    <input type="file" name="ppic" class="form-control" onchange="showpreview(this,prev);">
                    
                </div>

                <div class=" col-md-4 form-group">
                    <img src="../pictures/nopic.png" width="180" height="160" id="prev">
                </div>

            </div>
            <div class="row">
                <div><br><br></div>
                <div class="col-md-6 offset-md-4">
                    <input type="submit" class="btn btn-primary btn-outline-success" value="Signup" name="btn" style="color:white;">
                    <input type="submit" class="btn btn-primary btn-outline-success" value="Update" name="btn" style="color:white;" id="update">
                    <input type="submit" class="btn btn-primary btn-outline-success" value="Delete" name="btn" style="color:white;">
                    <input type="submit" class="btn btn-primary btn-outline-success" value="View All" name="btn" style="color:white;" formaction="fetch-all.php" >
               <br><br><br><br><br>
                </div>
            </div>
        </form>
    </div>
</body>

</html>
