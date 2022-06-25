<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
    <script src="../jss/jquery-1.8.2.min.js">
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
<body>
    <br>
    <center>
       <table rules="all" border="1">
        <form action="picupload-process.php" method="post" enctype="multipart/form-data">
           <tr><td>
            <p>Uid:&nbsp;&nbsp;<input type="text" autofocus name="txtU"></p></td></tr>
            <tr><td>
            <p>Profile pic:&nbsp;&nbsp;<input type="file" name="ppic" required onchange="showpreview(this,prev);"></p></td></tr>
            <tr><td>
            <center>
            <p><img src="../pictures/BG-1.2" id="prev" width="250" height="200"></p></center></td></tr>
            <tr><td>
            <center>
            <p><input type="submit" value="Upload"></p></center></td></tr>
        </form>
        </table>
    </center>
</body>
</html>
