<?php
$fname = $_GET["filename"];

// mở file ở chế độ nhị phân để không hiển thị trên web browser
$file = fopen("filedown/".$fname,"rb");

// Báo cho localhost biết dữ liệu là nhị phân
header("Content-Type: application/octet-stream");

// nếu không có hàm này thì trình duyệt download mặc định file .php
header("content-Disposition: attachment; filename = ".$fname);

//đọc file và hiển thị khung download ra màn hình
fpassthru($file);
fclose($file);
?>