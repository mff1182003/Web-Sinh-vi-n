<?php
$con = mysqli_connect('localhost', 'root', '', 'quanlyhocphi')
    or die('failed connection');

if (isset($_POST['btnInsert'])) {
    $masv = $_POST['txtmasv'];
    $tensv = $_POST['txttensv'];
    $malop = $_POST['txtmalop'];

    //rỗng
    if ($masv == '') {
        echo '<script>alert("RỖNG!!!")</script>';
    } else {
        $slqtrungma = "SELECT *FROM sinhvien WHERE MaSV = '$masv'";
        $data = mysqli_query($con, $slqtrungma);
        if (mysqli_num_rows($data) > 0) {
            echo "<script>alert('already have')</script>";
            echo "<script>window.location.href='./list.php'</script>";
        } else {
            $sql = "INSERT INTO sinhvien VALUES('$masv','$tensv','$malop')";
            $kq = mysqli_query($con, $sql);
            if ($kq){
                  echo "<script>alert('success')</script>";
                echo "<script>window.location.href='./list.php'</script>";
            }
              
            else
                echo "<script>alert('nguuuu')</script>";
                echo "<script>window.location.href='./list.php'</script>";
        }
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css">
    <style>
        body {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }
    </style>
</head>

<body>

    <form class="container" method="post" action="">
        <table class="table table-bordered">
            <tr>
                <th class="text-center" colspan="2">CẬP NHẬT THÊM SINH VIÊN</th>
            </tr>

            <tr>
                <td>Mã sinh viên</td>
                <td>
                    <input type="text" name="txtmasv" class="form-control">
                </td>
            </tr>
            <tr>
                <td>Tên sinh viên</td>
                <td>
                    <input type="text" name="txttensv" class="form-control">
                </td>
            </tr>
            <tr>
                <td>Mã lớp</td>
                <td>
                    <input type="text" name="txtmalop" class="form-control">
                </td>
            </tr>

            <tr align="center">
                <td colspan="2">
                    <input type="submit" name="btnInsert" value="INSERT" class="btn btn-primary">
                </td>
            </tr>
        </table>
    </form>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html