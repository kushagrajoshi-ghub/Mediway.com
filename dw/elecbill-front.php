<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Document</title>
</head>

<body>
    <center>
        <h1>
            <font face="calibari">Electricity Bill</font>
        </h1>
        <hr><br><br>
        <form action="elecbill-process.php">
            <b>Units:</b><input type="text" name="txtU">
            <br><br>
            <hr>
            <input type="radio" name="dis" value="comm">Commercial(10%)&nbsp;&nbsp;&nbsp;&nbsp;
            <input type="radio" name="dis" value="res">Residential(20%)
            <br><br><br>
            Select Appliances:<br>
            <select name="apl[]" multiple>
                <option value="fan">Fan</option>
                <option value="ac">A.C.</option>
                <option value="cooler">Cooler</option>
                <option value="heater">Heater</option>
                <option value="wash">Washing machine</option>
            </select><br><br>
            Area Covered:<br>
            <select name="area">
                <option value="one">&ang;100</option>
                <option value="two">&ang;200</option>
                <option value="three">more</option>
            </select>
            <br><br><br>
            <hr>
            <input type="submit" value="Bill" class="button">
        </form>
    </center>
</body>

</html>
