<?php
if(isset($_POST['ok']))
{
	$u=$p="";
 	if($_POST['username'] == NULL)
 	{
  		echo "<b style='color:red;'>*Please enter your username<br />";
 	}
 	else
 	{
  		$u=$_POST['username'];
 	}
 	if($_POST['password'] == NULL)
 	{
  		echo "<b style='color:red;'>*Please enter your password<br />";
 	}
 	else
 	{
		$p=md5($_POST['password']."toandv");
	}
 	if($u && $p)
 	{
		$conn=mysqli_connect("localhost","root","") or die("Can not connect to database".mysqli_connect_error());
		mysqli_select_db($conn,"dbtest");
		
		$stmt=mysqli_prepare($conn,"select * from tbl_user where username= ? and password= ? ");
		mysqli_stmt_bind_param($stmt,'ss',$u,$p);
		mysqli_stmt_execute($stmt);
		/*Phai luu ket qua cua exe moi dung duoc lenh num row*/
		mysqli_stmt_store_result($stmt);
		$rownum = mysqli_stmt_num_rows($stmt);

		if($rownum == 0)
  		{
   			echo "<b style='color:red;'>Username or password is not correct, please try again";
  		}
  		else
  		{
			/*Phai bound ket qua vao bien moi fetch tung cot ra bien duoc*/
			mysqli_stmt_bind_result($stmt,$col1,$col2,$col3,$col4,$col5,$col6,$col7,$col8,$col9,$col10,$col11,$col12,$col13,$col14,$col15);
			mysqli_stmt_fetch($stmt);
			session_start();
			$_SESSION['user_id'] = $col1;
			if(isset($_SESSION['user_id']))
			{
				echo "<b style='color:green;'>Chúc mừng bạn đã đăng nhập thành công</b>";
				//header("location: main.php");
				session_unset("user_id");
			}
		}
		/* free result */
		mysqli_stmt_free_result($stmt);

		/* close statement */
		mysqli_stmt_close($stmt);

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