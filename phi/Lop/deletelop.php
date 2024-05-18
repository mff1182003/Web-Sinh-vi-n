<?php

$conn = mysqli_connect('localhost', 'root', '', 'quanlyhocphi')
    or die('failed');

// Xóa lớp dựa trên mã lớp 
$malop = $_GET['MaLop'];

$sql = "DELETE FROM lop WHERE MaLop = '$malop'";

if (mysqli_query($conn, $sql)) {
    echo "Lớp đã được xóa thành công.";
} else {
    echo "Lỗi xóa lớp: " . mysqli_error($conn);
}

mysqli_close($conn);
?>