<?php
if(isset($_POST['ok']))
{
	$u=$p="";
 	if($_POST['username'] == NULL)
 	{
  		echo "Please enter your username<br />";
 	}
 	else
 	{
  		$u=$_POST['username'];
 	}
 	if($_POST['password'] == NULL)
 	{
  		echo "Please enter your password<br />";
 	}
 	else
 	{
  		$p=$_POST['password'];
	}
 	if($u && $p)
 	{
		$conn=mysql_connect("localhost","root","") or die("can't connect this database");
		mysql_select_db("dbtest",$conn);
		$sql="select * from user where username='".$u."' and password='".$p."'";
		$query=mysql_query($sql);
		if(mysql_num_rows($query) == 0)
  		{
   			echo "Username or password is not correct, please try again";
  		}
  		else
  		{
			$row=mysql_fetch_array($query);
			session_start();
			$_SESSION['userid'] = $row['id'];
			$_SESSION['level'] = $row['level'];
			if(isset($_SESSION['userid']) && $_SESSION['level'] == 2)
			{
				header("location: main.php");
			}
			else
			{
				echo "Bạn không có quyền quản trị";
			}
		}
	}
}
?>
<form action='login.php' method='post'>
<table>
<tr>
	<td>Username: </td>
    <td><input type='text' name='username' size='25' /><br /></td>
</tr>
<tr>
	<td>Password:</td>
    <td> <input type='password' name='password' size='25' /> <br /></td>
</tr>
<tr>
	<td></td>
    <td><input type='submit' name='ok' value='Dang Nhap' /></td>
</tr>
</table>
</form>