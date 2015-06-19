<?php
session_start();
if(isset($_SESSION["user"]))
{
	echo "Xin chào, ".$_SESSION["user"]."<br>";
	echo "Bài viết lập trình học session.";
	echo "<br>";
	echo "<a href='logout.php'>Logout</a>";
}
else
{
	echo "Bạn phải <a href='login.php'>đăng nhập</a> mới xem được bài viết.";
}

?>