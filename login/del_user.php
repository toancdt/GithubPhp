<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<body>
<?php
session_start();
if(isset($_SESSION['userid']) && $_SESSION['level'] == 2)
{
$id=$_GET['userid'];
//echo "Id:".$id."</br>";
$conn=mysql_connect("localhost","root","") or die("can't connect this database");
mysql_select_db("dbtest",$conn);
$sql="delete from user where id='".$id."'";
mysql_query($sql);
header("location:manage_user.php");
exit();
}
else
{
	header("location: login.php");
	exit();
}

?>
</body>
</html>