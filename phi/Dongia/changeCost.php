<?php
$con = mysqli_connect('localhost', 'root', '', 'quanlyhocphi')
    or die('loi let noi roi huhu');
$id = $_GET['id'];

$sql = mysqli_query($con, "SELECT *FROM dongia WHERE MaMon = '$id'");

if (isset($_POST['btnSAVE'])) {
    $cost = $_POST['txtDongia'];

    $sqlUP = "UPDATE dongia SET Giatin = '$cost' WHERE MaMon = '$id'";
    $kq = mysqli_query($con, $sqlUP);
    if ($kq)
        echo "<script>alert('Update đơn giá thành công')</script>";
    else
        echo "<script>alert('Update đơn giá thất bại')</script>";
}


if (isset($_POST['btnBack'])) {
    header("location: indexCost.php");
    exit;
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cập nhật học phí</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css">
    <style type="text/css">
        .dialog {
            position: fixed;
            top: 0;
            bottom: 0;
            left: 0;
            right: 0;
            z-index: 10;
            display: flex;
            align-items: center;
            justify-content: center;
            opacity: 1;
            transition: opacity linear 0.5s;
        }

        .close-btn {
            position: absolute;
            top: 2px;
            right: 6px;
            text-decoration: none;
        }

        .card-header {
            background-color: darkgray;
        }

        .btn-sys {
            height: 100px;
            display: flex;
            align-items: center;
            justify-content: space-between;
        }

        table tr td {
            width: 250px;
        }
    </style>
</head>

<body>
    <form method="post" action="">

        <div class="dialog overlay" id="change">
            <div class="dialog-body">

                <div class="card-header">
                    <h2>THÔNG TIN HỌC PHÍ</h2>
                </div>
                <div class="card-body">
                    <table>
                        <?php
                        if (isset($sql) && $sql != null) {
                            while ($rows = mysqli_fetch_array($sql)) {
                        ?>
                                <tr>
                                    <td align="center" style="width: 150px;">
                                        Mã môn học
                                    </td>
                                    <td>
                                        <input class="form-control" type="text" name="txtMamon" value="<?php echo $rows['MaMon'] ?>" disabled>
                                    </td>
                                </tr>

                                <tr>
                                    <td align="center" style="width: 150px;">
                                        Tên môn học
                                    </td>
                                    <td>
                                        <input class="form-control" type="text" name="txtTenmon" value="<?php echo $rows['TenMon'] ?>" disabled>
                                    </td>
                                </tr>

                                <tr>
                                    <td align="center" style="width: 150px;">
                                        Số tín chỉ
                                    </td>
                                    <td>
                                        <input class="form-control" type="text" name="txtSotinchi" value="<?php echo $rows['Sotinchi'] ?>" disabled>
                                    </td>
                                </tr>

                                <tr>
                                    <td align="center" style="width: 150px;">
                                        Đơn giá
                                    </td>
                                    <td>
                                        <input class="form-control" type="text" name="txtDongia" value="<?php echo $rows['Giatin'] ?>">
                                    </td>
                                </tr>
                        <?php
                            }
                        }
                        ?>

                    </table>
                    <div class="btn-sys">

                        <button class="btn btn-primary" type="submit" name="btnSAVE">SAVE CHANGE</button>
                        <button class="btn btn-primary" type="submit" name="btnBack">BACK</button>
                    </div>
                </div>
            </div>
        </div>
    </form>

</body>

</html>