<?php
//include("dbconnection.php");
//$db = new dbconnection();
//$db->connect();
//$db->createtable();
//$sql= 'insert into tbl_user value(1,"Do Van Toan","toandv","11c361ccb4824165e935fa9748f23dfb","abc@gmail.com","femail","","0.123","","","","","","","xyz")';
//$db->execute($sql);

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
 	    include("dbconnection.php");
 	    $db = new dbconnection();
		$db->connect();
		$stmt = $db->conn->prepare("select username,password from tbl_user where username= ? and password= ? ");
		$stmt->bind_param('ss',$u,$p);
		$stmt->execute();
		/*Phai luu ket qua cua exe moi dung duoc lenh num row*/
		$stmt->store_result();
		$rownum = $stmt->num_rows();
		if($rownum == 0)
  		{
   			echo "<b style='color:red;'>Username or password is not correct, please try again";
  		}
  		else
  		{
			/*Phai bound ket qua vao bien moi fetch tung cot ra bien duoc*/
			$stmt->bind_result($col1,$col2);
			$stmt->fetch();
			session_start();
			$_SESSION['username'] = $col1;
			if(isset($_SESSION['username']))
			{
				echo "<b style='color:green;'>Chúc mừng bạn đã đăng nhập thành công</b>";
				//header("location: main.php");
				session_unset("username");
			}
		}
		/* free result */
		$stmt->free_result();

		/* close statement */
		$stmt->close();

	}
}
?>
<form action='login_class_oop.php' method='post'>
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