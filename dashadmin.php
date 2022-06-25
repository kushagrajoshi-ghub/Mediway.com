<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="jss/jquery-1.8.2.min.js"></script>
    <script src="jss/bootstrap.bundle.min.js"></script>
     <link rel="shortcut icon" href="pictures/icon2.jfif">
    <title>Mediway.com/admin</title>
    <script>
    
    </script>
    <style>
     .d {
            display: flex;
            /*            border: 2px black solid;*/
            flex-direction: row;
            align-items: center;
            justify-content: space-around;
            flex-wrap: wrap;
            /*    border-radius: 12px 12px 12px 12px;*/
        }
        .bdr{
/*            border:#0d6efd solid;*/
            box-shadow: 3px 3px 7px 3px  grey;
    
        }
    </style>
    </head>
    <body>
         <div class="row bg-warning" style="width:100.94%;">
        <h2>
            <center>
                <font color="white">Administator Dashboard</font>
            </center>
        </h2>
    </div>
    <div class="container d mt-4">
        
        <div class="card  bdr" style="width: 18rem;">
            <img src="pictures/medshelf.jfif" class="card-img-top" alt="...">
            <div class="card-body">
                <h5 class="card-title">Medicines</h5>
                <p class="card-text"></p>
                <a href="admin-medicine.php" class="btn btn-primary">Console</a>
            </div>
            
        </div>
        <div class="card  bdr " style="width: 18rem;">
            <img src="pictures/adminuser.png" class="card-img-top" alt="...">
            <div class="card-body">
                <h5 class="card-title">Manage user profiles</h5>
                <p class="card-text"></p>
                <a href="admin-users.php" class="btn btn-primary">Console</a>
            </div>
        </div>
         <div class="card  bdr" style="width: 18rem;">
            <img src="pictures/admindon.png" class="card-img-top" alt="...">
            <div class="card-body">
                <h5 class="card-title">Provider Profiles</h5>
                <p class="card-text"></p>
                <a href="admin-provider.php" class="btn btn-primary">Console</a>
            </div>
        </div>
    </div>
    </body>
</html>