<?php
session_start();
if(isset($_SESSION['userid']) && $_SESSION['level'] == 2)
{
	if(isset($_POST['adduser']))
 	{
		$u = $p ="";
		if($_POST['username'] == NULL)
		{
			 echo "Vui long nhap username<br />";
		}
		else
		{
			$u=$_POST['username'];
		}
		if($_POST['password'] != $_POST['re-password'])
		{
			echo "Password va re-password khong chinh xac<br />";
		}
		else
		{
			if($_POST['password'] == NULL)
			{
				echo "Vui long nhap password<br />";
			}
			else
			{
				$p=$_POST['password'];
			}
  		}
  		$l=$_POST['level'];
		if($u && $p && $l)
		{
			$conn=mysql_connect("localhost","root","") or die("can't connect this database");
			mysql_select_db("dbtest",$conn);
			$sql="select * from user where username='".$u."'";
			$query=mysql_query($sql);
			if(mysql_num_rows($query) != "" )
			{
				echo "Username nay da ton tai roi<br />";
			}
			else
			{
				$sql2="insert into user(username,password,level) values('".$u."','".$p."','".$l."')";
				$query2=mysql_query($sql2);
				echo "Da them thanh vien moi thanh cong";
			}
		}
 	}
}
else
{
	header("location: login.php");
	exit();
}
?>

<form action='add_user.php' method='POST'>
<table>
<tr>
	<td>Level: </td>
    <td>
    <select name='level'>
    <option value='1'>Member</option>
    <option value='2'>Admin </option>
    </select><br />    
    </td>
</tr>
<tr>
	<td>Username: </td>
    <td><input type='text' name='username' size='25' /><br /></td>
</tr>
<tr>
	<td>Password:</td>
    <td> <input type='password' name='password' size='25' /> <br /></td>
</tr>
<tr>
	<td>Re-Password: </td>
    <td><input type='password' name='re-password' size='25' /><br /></td>
</tr>
<tr>
	<td></td>
    <td><input type='submit' name='adduser' value='Add New User' /></td>
</tr>
</table>
</form>