<?php
session_start();
//Xử lý nhập username

$arywarn=array();
$arywarn["username"]=NULL;
$arywarn["password"]=NULL;

if(isset($_POST["submitcheck"]))
{
	$username=$_POST["txtname"];
	$password=$_POST["txtpass"];
	if($username==NULL)
		{
			$arywarn["username"]="Hãy nhập username";
		}
	
	//Xử lý nhập password
	if($password==NULL)
		{
			$arywarn["password"]="Hãy nhập password";
		}
}
?>


<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <title>cookie-session</title>
    </head>
    
    <body>
        <form action = "login.php" method = "post">
        	<table>
            	<tr>
                	<td>Username</td>
                    <td><input type = "text" size ="25" name = "txtname" /></td>
                    <td><?php echo $arywarn["username"];?></td>
                </tr>
                <tr>
                	<td>Password</td>
                    <td><input type = "password" size ="25" name = "txtpass" /></td>
                    <td><?php echo $arywarn["password"];?></td>
                </tr>
                <tr>
                	<td></td>
                    <td><input type = "submit" value = "Submit" name="submitcheck" /></td>                    
                </tr>
            </table>
         </form>
            
    </body>
</html>

<?php
if(isset($_POST["submitcheck"]))
{
	//Xử lý nhập username và password
	if($username && $password)
		{
			if($username =="admin" && $password == "123456")
				{
					$_SESSION["user"]="admin";
					header("location:baiviet.php");
					exit();
				}
			else
				{
					echo "Sai tên Username hoặc Password<br>";
				}
		}
}
?>
