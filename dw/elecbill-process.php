<?php 
$unit=$_GET["txtU"];
echo "<br>Units=".$unit;
$units=($unit)*5;
$dis1=0;$dis2=0;
$face=$_GET["dis"];
if($face=="comm")
{  
    $dis1=($units)*0.1;
    echo "<br><br>Discount APPLIED: 10%<br><hr>";
}
else
if($face=="res")
{
    $dis1=($units)*0.2;
    echo "<br><br>Discount APPLIED: 20%<br><hr>";
}
//-------------------appliances------------------------
$app=$_GET["apl"];
$all="<ul>";
for($i=0;$i<count($app);$i++)
{
    $all=$all."<li>".$app[$i]."</li>";
}
$all=$all."</ul>";
echo"<br>Appliances USED:<br>";
echo $all;
echo "<br><hr>";
//---------------------AREA SECTION--------------------
$ar=$_GET["area"];
if($ar=="one")
{
    $dis2=($units)*0.1;
    echo "<br>Discount applied area vise=10%";
}
else 
    if($ar=="two")
{
    $dis2=($units)*0.07;
    echo "<br>Discount applied area vise=7%";
}
else
{
    $dis2=($units)*0.05;
    echo "<br>Discount applied area vise=5%";
}
//------------------Bill--------------------------
echo "<br><hr><br><br>";
$bill=$units-$dis1-$dis2;
echo "Total BILL Payable:".$bill;
//-----------------------TABLE--------------------------
echo "<br><br><hr><center>";
$t="<table border='1'>";
$t=$t."<tr><td>Units:</td><td>".$unit."</td></tr>";
$t=$t."<tr><td>Discount(consumption):</td><td>".$dis1."</td></tr>";
$t=$t."<tr><td>Appliances:</td><td>".$all."</td></tr>";
$t=$t."<tr><td>Discount(area):</td><td>".$dis2."</td></tr>";
$t=$t."<tr><td>Amount Payable:</td><td>".$bill."</td></tr>";
$t=$t."</table>";

echo $t;
echo "</center>";
