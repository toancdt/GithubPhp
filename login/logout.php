<?php
session_start();
session_unset("userid");
session_unset("level");
echo "Bạn đã hủy session thành công!";
/*
Chú ý về session:
1. Khi còn thao tác trên website thì session không bao giờ tự hủy cho tới khi đăng xuất hoặc tắt trình duyệt.
2. Nếu không thao tác trên website thì session sẽ tự hủy sau 15 phút.
*/
?>