<?php
include("dbconnection.php");
$db = new dbconnection();

echo "Check connection<br>";
$db->connect();
echo "connection status: ";
var_dump($db->connect());
/*
echo "<br>Check create table query";
$db->createtable();
echo "<br>createtable status: ";
var_dump($db->createtable());

echo "<br>Check insert query";
$sql= 'insert into tbl_user value(1,"Do Van Toan","toandv","11c361ccb4824165e935fa9748f23dfb","abc@gmail.com","femail","","0.123","","","","","","","xyz")';
$a=$db->execute($sql);
echo "<br>insert status: ";
var_dump($a);

echo "<br>Check table exists";
$a=$db->tableExists("tbl_user");
echo "<br>table exists status: ";
var_dump($a);

echo "<br>Check get number of rows";
$a=$db->getnumrows("tbl_user");
echo "<br>getnumrows status: ";
var_dump($a);
*/

$sql= 'insert into tbl_user value(3,"QuanLV","abc","11c361ccb4824165e935fa9748f23dfb","abc@gmail.com","femail","","0.123","","","","","","","xyz")';
$a=$db->execute($sql);
$nextid = $db->getnextid();
echo "<br>Next id: ".$nextid;
/*
echo "<br>Check select query";
$a=$db->select("tbl_user");
echo "<br>select status: ";
var_dump($a);

echo "<br>select result: ";
var_dump($db->result);
echo "<br><br>print_r: ";
print_r($db->result);
*/