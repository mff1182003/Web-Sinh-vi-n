<?php
$con = mysqli_connect('localhost', 'root', '', 'quanlyhocphi')
    or die('loi let noi roi huhu');

$mhk = $_GET['mahk'];
$sqltk = "SELECT *FROM hocky WHERE MaHK='$mhk'";
$data = mysqli_query($con, $sqltk);


if (isset($_POST['btnSave'])) {
    $thk = $_POST['txtTenhk'];

    $sqlup = "UPDATE hocky SET TenHK ='$thk' WHERE MaHK='$mhk'";
    $kq = mysqli_query($con, $sqlup);
    if ($kq)
        echo "<script>alert('Update học kỳ thành công')</script>";
    else
        echo "<script>alert('Update học kỳ thất bại')</script>";
}

if (isset($_POST['btnBack'])) {
    header("location: ListHK.php");
    exit;
}
mysqli_close($con);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css">

    <title>Cập nhật học kỳ</title>
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
        .btn-sys{
            height: 100px;
            display: flex;
            align-items: center;
            justify-content: space-between;
        }

        table tr td{
            width: 250px;
        }
    </style>
</head>

<body>

    <form method="post" action="">
    <div class="dialog overlay" id="change">
            <div class="dialog-body">
                <div class="card-header">
                    <h2>THÔNG TIN HỌC KỲ</h2>
                </div>
                <div class="card-body">
                    <table>
                        <?php
                        if (isset($data)) {
                            while ($row = mysqli_fetch_array($data)) {
                        ?>
                                <tr>
                                    <td align="center" style="width: 150px;">
                                        Mã học kỳ
                                    </td>
                                    <td>
                                        <input class="form-control" type="text" name="txtMahk" value="<?php echo $row['MaHK'] ?>" disabled>
                                    </td>
                                </tr>

                                <tr>
                                    <td align="center" style="width: 150px;">
                                        Tên học kỳ
                                    </td>
                                    <td>
                                        <input class="form-control" type="text" name="txtTenhk" value="<?php echo $row['TenHK'] ?>">
                                    </td>
                                </tr>
                        <?php
                            }
                        }
                        ?>
                    </table>
                    <div class="btn-sys">

                        <button class="btn btn-primary" type="submit" name="btnSave">SAVE CHANGE</button>
                        <button class="btn btn-primary" type="submit" name="btnBack">BACK</button>
                    </div>
                </div>
            </div>
        </div>
    </form>

</body>

</html>