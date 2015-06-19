<?php

$aryAlphabet =array("a","b","c","d","e","f","g","h","i","j","k","l","m","n","o","p","q","r","s","t","u","v","w","x","y","z");
//foreach($aryTest as $tmp)
//{echo $tmp."<br>";}
$arynum = count($aryAlphabet);
echo "So phan tu mang: ".$arynum."<br>";

echo "Mang ban dau <br>";
foreach($aryAlphabet as $tmp)
{
	echo $tmp;
}
// Loai bo phan tu e va o
$j=0;
$tim_thay =0;
for($i=0;$i<$arynum;$i++)
{
if($aryAlphabet[$i] == "e" || $aryAlphabet[$i] == "o")
	{
	$tim_thay +=1;
	continue;
	}
$aryAlphabet[$j]=$aryAlphabet[$i];
$j++;
}
for($i=0;$i<$tim_thay;$i++)
{
	$aryAlphabet[$arynum-$tim_thay+$i] = NULL;
}

echo "<br>Mang sau khi loai bo e, o <br>";
foreach($aryAlphabet as $tmp)
{
	echo $tmp;
}

		
?>
