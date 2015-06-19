<?php
//Xử lý nhập username
if($_POST["txtname"]==NULL)
	{
		echo "Hãy nhập username<br>";
	}
else
	{
		$username = $_POST["txtname"];
	}
//Xử lý nhập password
if($_POST["txtpass"]==NULL)
	{
		echo "Hãy nhập password<br>";
	}
else
	{
		$password = $_POST["txtpass"];
	}
//Xử lý nhập username và password

if($_POST["txtname"] && $_POST["txtpass"])
	{
		if($username =="Admin" && $password == "123456")
			{
				echo "Bạn đã đăng nhập thành công!<br>";
			}
		else
			{
				echo "Sai tên Username hoặc Password<br>";
			}
	}

//Kiểm tra chọn ngày sinh
if($_POST["ngay"]=="ngay")
	{
		echo "Hãy chọn ngày sinh<br>";
	}
else
	{
		$ngay = $_POST["ngay"];
	}

//Kiểm tra chọn tháng sinh
if($_POST["thang"]=="thang")
	{
		echo "Hãy chọn tháng sinh<br>";
	}
else
	{
		$thang = $_POST["thang"];
	}
//Kiểm tra chọn năm sinh
if($_POST["nam"]=="nam")
	{
		echo "Hãy chọn năm sinh<br>";
	}
else
	{
		$nam = $_POST["nam"];
	}
//Kiểm tra chọn giới tính
if($_POST["gender"]==NULL)
	{
		echo "Hãy chọn giới tính<br>";
	}
else
	{
		$gender = $_POST["gender"];
	}
//Kiểm tra nhập information
if($_POST["info"]==NULL)
	{
		echo "Hãy nhập thông tin<br>";
	}
else
	{
		$info = $_POST["info"];
	}

// Kiểm tra thông tin có đúng không
if($_POST["txtname"] && $_POST["txtpass"] && ($_POST["ngay"] !="ngay")&& ($_POST["thang"] !="thang")&& ($_POST["nam"] !="nam")&& ($_POST["gender"] !=NULL) && ($_POST["info"]!=NULL))
{
echo "Username : $username <br>";
echo "Password : $password <br>";
echo "Ngày sinh : $ngay/$thang/$nam <br>";
echo "Giới tính : $gender <br>";
echo "Thông tin : $info <br>";
}


?>