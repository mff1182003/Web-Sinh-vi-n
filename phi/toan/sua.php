<?php
$connect = mysqli_connect('localhost', 'root', '', 'quanlyhocphi')
    or die('failed connecti');
$MaSV = $_GET['masv'];




$sql =  "SELECT * FROM sinhvien WHERE MaSV = '$MaSV'";
$data = mysqli_query($connect, $sql);
if (isset($_POST['btnSAVE'])) {
    $TenSV = $_POST['txtMaSV'];
    $MaLop = $_POST['txtMaLop'];




    $sqlUpdate = "UPDATE sinhvien SET TenSV = '$TenSV', MaLop = '$MaLop' WHERE MaSV = '$MaSV'";
    $resultUpdate = mysqli_query($connect, $sqlUpdate);
    if ($resultUpdate) {
        echo "<script>alert('Cập nhật thông tin sinh viên thành công')</script>";
        echo "<script>window.location.href='./list.php'</script>";
    } else {
        echo "<script>alert('Cập nhật thông tin sinh viên thất bại')</script>";
    }
}

if (isset($_POST['btnBack'])) {
    header("location: list.php");
    exit;
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chỉnh sửa sinh viên</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css">
    <style>
        .container {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        form {
            width: 400px;
            padding: 20px;
            background-color: #f8f9fa;
            border-radius: 10px;
        }

        input[type="submit"] {
            margin-right: 10px;
        }
    </style>
</head>

<body>
    <div class="container">
        <form method="post" action="">
            <h1 class="text-center mb-4">Chỉnh sửa thông tin sinh viên</h1>

            <table>
                <?php
                if ($data) {
                    $rows = mysqli_fetch_array($data);
                ?>
                <tr>
                    <td>Mã sinh viên</td>
                    <td>
                        <input type="text" name="txtMaSV" value="<?php echo $rows['MaSV'] ?>" disabled>
                    </td>
                </tr>
                <tr>
                    <td>Tên sinh viên:</td>
                    <td>
                        <input type="text" name="txtTenSV" value="<?php echo $rows['TenSV'] ?>">
                    </td>
                </tr>
                <tr>
                    <td>Lớp:</td>
                    <td>
                        <input type="text" name="txtMaLop" value="<?php echo $rows['MaLop'] ?>">
                    </td>
                </tr>
            <?php
                }
            ?>

            </table>
            <div class="text-center mt-4">
                <input type="submit" name="btnSAVE" value="Lưu" class="btn btn-primary">
                <input type="submit" name="btnBack" value="Quay lại" class="btn btn-secondary">
            </div>
        </form>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>