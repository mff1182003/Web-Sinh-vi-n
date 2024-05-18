<?php
    $id = $_GET['id'];

    $con = mysqli_connect('localhost', 'root', '','quanlyhocphi')
    or die('loi ket noi rui huhu');

    $sql = "DELETE FROM dongia WHERE MaMon='$id'";
    $kq = mysqli_query($con, $sql);

    mysqli_close($con);
    if($kq) echo "<script>alert('Xóa đơn giá thành công!!')</script>";
    else echo "<script>alert('Xóa đơn giá thất bại!!')</script>";

    echo "<script>window.location.href='./indexCost.php'</script>";
?>