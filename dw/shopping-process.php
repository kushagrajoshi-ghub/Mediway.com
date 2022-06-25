<?php

	$m=$_GET["txtM"];
	$b=$_GET["txtB"];
    $l=$_GET["txtL"];
//----------------initialising outside------
$total=$m+$b+$l;
$discount=($total)*0.08;
$net=$total-$discount;
//---------------is-set stetements----------
if(isset($_GET["ntot"])==true)
	$btn=$_GET["ntot"];
else
	if(isset($_GET["ndis"])==true)
		$btn=$_GET["ndis"];
else
	if(isset($_GET["nnet"])==true)
		$btn=$_GET["nnet"];	
//------------------If/Else-----------------
if($btn=="Total")
{
//	$total=$m+$b+$l;
	echo "Total=".$total;
}
else
  if($btn=="Discount")  
{  
//	$discount=($m+$b+$l)*0.08;
	echo "Discount=".$discount;
}
else
{
//	$net=$total-$discount;
	echo "The Net Price=".$net;
}
//------------------------------------------
?>
