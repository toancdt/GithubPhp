<?php

$aryTest =array(10,10,10,10,10,10,10,10,10,10,10,10,10,10,10,10,10,10,10,10,10,10,10,10,10,10,10,10,10,10,10,10,10,10,10,10,10,10,10,10,10,10,10,10,10,10,10,10,10,10,10,10,10,10,10,10,10,10,10,10,10,10,10,10,10,10,10,10,10,10,10,10,10,10,10,10,10,10,10,10,10,10,10,10,10,10,10,10,10,10,10,10,10,10,10,10,10,10,10,10);
//foreach($aryTest as $tmp)
//{echo $tmp."<br>";}
$arynum = count($aryTest);
echo "So phan tu mang: ".$arynum."<br>";
for($i=0;$i<$arynum;$i++)
{
	$aryTest[$i] +=rand(1,1000);
}
echo "Mang ban dau <br>";
foreach($aryTest as $tmp)
{
	echo $tmp."<br>";
}
// Sap xem mang tang dan
sort($aryTest);
echo "Mang sap xep tang dan <br>";
foreach($aryTest as $tmp)
{
	echo $tmp."<br>";
}
// Sap xem mang giam dan
rsort($aryTest);
echo "Mang sap xep giam dan <br>";
foreach($aryTest as $tmp)
{
	echo $tmp."<br>";
}
		
?>
