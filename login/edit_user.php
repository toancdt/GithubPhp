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
$conn=mysql_connect("localhost","root","") or die("can't connect this database");
mysql_select_db("dbtest",$conn);
$id=$_GET['userid'];
//echo "Id:".$id."</br>";
if(isset($_POST['ok']))
{
	$u = $p ="";
	if($_POST['user'] == NULL)
	{
		echo "Please enter your username";
	}
	else
	{
		$u=$_POST['user'];
	}
	if($_POST['pass'] != $_POST['repass'])
	{
		echo "Password and re-password is not correct";
	}
	else
	{
		if($_POST['pass'] != NULL)
		{
			$p=$_POST['pass'];
		}
	}
	$l = $_POST['level'];
	if($u && $p && $l )
	{
		$sql="update user set username='".$u."', password='".$p."', level='".$l."' where id='".$id."'";
		mysql_query($sql);
		header("location:manage_user.php");
		exit();
	}
	else
	{
		if($u && $l)
		{
			$sql="update user set username='".$u."', level='".$l."' where id='".$id."'";
			mysql_query($sql);
			header("location:manage_user.php");
			exit();
		}
	}
}
$sql="select * from user where id='".$id."'";
$query=mysql_query($sql);
$row=mysql_fetch_array($query);
}
else
{
	header("location: login.php");
	exit();
}
?>
<form action="edit_user.php?userid=<?=$id?>" method="post">
Level: <select name='level'>
<option value="1" > <?php if($row['level'] == 1) {echo "Member";}else {echo "Administrator";} ?></option>
<option value="2" > <?php if($row['level'] == 2) {echo "Member";}else {echo "Administrator";} ?></option>
</select><br />
Username: <input type="text" name="user" size="20" value="<?php echo $row['username']; ?>" /><br />
Password: <input type="password" name="pass" size="20" /> <br />
Re-password: <input type="password" name="repass" size="20" /><br />
<input type="submit" name="ok" value="Edit User" />
</form>

</body>
</html>