<?php
    $mn = $_GET['manganh'];

    $con = mysqli_connect('localhost', 'root', '','quanlyhocphi')
    or die('loi ket noi rui huhu');

    $sql = "DELETE FROM nganh WHERE Manganh='$mn'";
    $kq = mysqli_query($con, $sql);

    mysqli_close($con);
    if($kq){
        echo "<script>alert('Xóa ngành học thành công!!')</script>";
    } 
    else{
        echo "<script>alert('Xóa ngành học thất bại!!')</script>";
    } 

    echo "<script>window.location.href='./ListNganh.php'</script>";
