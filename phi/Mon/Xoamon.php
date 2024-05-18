<?php
    $mm = $_GET['mamon'];

    $con = mysqli_connect('localhost', 'root', '','quanlyhocphi')
    or die('loi ket noi rui huhu');

    $sql = "DELETE FROM monhoc WHERE MaMon='$mm'";
    $kq = mysqli_query($con, $sql);

    $sqlGia = "DELETE FROM dongia WHERE MaMon='$mm'";
    $kqa = mysqli_query($con, $sqlGia);

    mysqli_close($con);
    if($kq) echo "<script>alert('Xóa môn học thành công!!')</script>";
    else echo "<script>alert('Xóa môn học thất bại!!')</script>";

    echo "<script>window.location.href='./ListSj.php'</script>";
?>