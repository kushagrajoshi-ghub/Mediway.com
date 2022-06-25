<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="jss/jquery-1.8.2.min.js"></script>
    <script src="jss/bootstrap.bundle.min.js"></script>
    <script src="jss/angular.min.js"></script>
    <title>Wordsheet.com</title>
    <link rel="shortcut icon" href="pictures/iconimp.png">
    <script>
        function dis(val) {
            alert(val);
            document.getElementById("screen").value += val;
            document.querySelector("#button").onclick;
            document.querySelector("#textarea").select();
            document.execCommand('copy');
        }

    </script>
</head>

<body style="background-color:#F8F9F9;">
    <nav class="navbar navbar-expand-lg navbar-light bg-warning fixed-top" style="background-color: #e3f2fd;">
        <div class="container-fluid">
            <a class="navbar-brand">
                <img src="pictures/pasteit.jpg" alt="" height="50">
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mt-3 mb-lg-0">
                    <a class="navbar-brand" href="#" style="font-family:Oblique;">Share text and images the easy way</a>

                </ul>
                <form class="d-flex">
                    <button class="btn btn-danger btn-outline-light me-2" type="button">Add Note</button>
                </form>
                &nbsp;
                <form class="d-flex">
                    <button class="btn btn-danger btn-outline-light me-2" type="button">Account</button>
                </form>
            </div>
        </div>
    </nav>
    <div class="container">
        <div class="row mt-5">
            <div class="col-md-6 form-group">

                <input type="text" class="form-control mt-5" id="" name="" placeholder="Title">
            </div>
        </div>
        <div class="row mt-1">
            <div class="container">
                <textarea class="me-5 me-auto" name="txt" id="txt" style="height: 400px; width:650px; " spellchweck="true" aria-hidden="true" class="form-control"></textarea>
            </div>

            <div class="form-group col-md-2 mt-4 mb-3">

                <input type="button" class="form-control btn btn-danger btn-outline-warning" value="Save as Pdf" id="" onclick="dis()">

            </div>
        </div>
    </div>
</body>
