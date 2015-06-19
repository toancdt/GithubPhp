<?php
if(isset($_COOKIE["user"]))
{
	echo "Xin chào, ".$_COOKIE["user"]."<br>";
	echo "Bài viết lập trình học cookie.";
	echo "<br>";
	echo "<a href='logout.php'>Logout</a>";
}
else
{
	echo "Bạn phải <a href='login.php'>đăng nhập</a> mới xem được bài viết.";
}

?>