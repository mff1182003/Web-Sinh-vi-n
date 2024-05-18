<?php
$con = mysqli_connect('localhost', 'root', '', 'quanlyhocphi')
    or die('loi let noi roi huhu');
$mm = $_GET['mamon'];

$sql = mysqli_query($con, "SELECT MaMon, TenMon, hocky.TenHK, nganh.Tennganh, Sotinchi
    FROM monhoc, nganh, hocky WHERE monhoc.MaHK = hocky.MaHK 
                                          and monhoc.MaNganh = nganh.Manganh and MaMon = '$mm'");

if (isset($_POST['btnSAVE'])) {
    $nameS = $_POST['txtTenmon'];
    $hk = $_POST['txtHk'];
    $tn = $_POST['txtTennganh'];
    $stc = $_POST['txtStc'];

    if ($tn == '') {
        echo '<script>alert("NGÀNH GÌ ???")</script>';
        echo "<script>window.location.href='./Suamon.php'</script>";
    } else {
        $sqlUP = "UPDATE monhoc SET TenMon = '$nameS', MaHK = '$hk', MaNganh = '$tn', Sotinchi = '$stc' WHERE MaMon = '$mm'";
        $kq = mysqli_query($con, $sqlUP);

        $sqlGia = "UPDATE dongia SET TenMon = '$nameS', Sotinchi = '$stc' WHERE MaMon = '$mm'";
        $kqa = mysqli_query($con, $sqlGia);
        if ($kq)
            echo "<script>alert('Thêm môn học thành công')</script>";
        else
            echo "<script>alert('Thêm môn học thất bại')</script>";
    }
}

if (isset($_POST['btnBack'])) {
    header("location: ListSj.php");
    exit;
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sửa môn học</title>
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
                    <h2>THÔNG TIN MÔN HỌC</h2>
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
                                        <input class="form-control" type="text" name="txtTenmon" value="<?php echo $rows['TenMon'] ?>">
                                    </td>
                                </tr>

                                <tr>
                                    <td align="center" style="width: 150px;">
                                        Học kỳ
                                    </td>
                                    <td>
                                        <Select class="form-control hk" name="txtHk" id="select">
                                            <option>--HỌC KỲ--</option>
                                            <?php
                                            $sqlHk = mysqli_query($con, "SELECT * FROM hocky");
                                            if (isset($sqlHk) && $sqlHk != null) {
                                                while ($row = mysqli_fetch_array($sqlHk)) {
                                            ?>
                                                    <option value="<?php echo $row['MaHK'] ?>"><?php echo $row['TenHK'] ?></option>
                                            <?php
                                                }
                                            }
                                            ?>
                                        </Select>
                                    </td>
                                </tr>

                                <tr>
                                    <td align="center" style="width: 150px;">
                                        Tên ngành
                                    </td>
                                    <td>
                                        <select name="txtTennganh" class="form-control tennganh">
                                            <option>--Ngành--</option>
                                            <?php
                                            $sqlnganh = mysqli_query($con, "SELECT * FROM nganh");
                                            if (isset($sqlnganh) && $sqlnganh != null) {
                                                while ($row = mysqli_fetch_array($sqlnganh)) {
                                            ?>
                                                    <option value="<?php echo $row['Manganh'] ?>"><?php echo $row['Tennganh'] ?></option>
                                            <?php
                                                }
                                            }
                                            ?>
                                        </select>
                                    </td>
                                </tr>

                                <tr>
                                    <td align="center" style="width: 150px;">
                                        Số tín chỉ
                                    </td>
                                    <td>
                                        <input class="form-control" type="text" name="txtStc" value="<?php echo $rows['Sotinchi'] ?>">
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