<?php
$con = mysqli_connect('localhost', 'root', '', 'quanlyhocphi')
    or die('loi let noi roi huhu');

if (isset($_POST['btnInsert'])) {
    $mm = $_POST['txtMamon'];
    $nameS = $_POST['txtTenmon'];
    $hk = $_POST['txtHk'];
    $tn = $_POST['txtTennganh'];
    $stc = $_POST['txtStc'];
    $gia = 'null';

    //trung ma
    if ($mm == '') {
        echo '<script>alert("RỖNG!!!")</script>';
    } else if ($tn == '') {
        echo '<script>alert("NGÀNH GÌ ???")</script>';
        echo "<script>window.location.href='./AddSJ.php'</script>";
    } else {
        $slqtrungma = "SELECT * FROM monhoc WHERE MaMon = '$mm'";
        $data = mysqli_query($con, $slqtrungma);
        if (mysqli_num_rows($data) > 0) {
            echo "<script>alert('TRÙNG MÃ RỒI!!!')</script>";
        } elseif ($hk == '--HỌC KỲ--') {
            echo "<script>alert('CHOOSE HK!!!')</script>";
        } elseif ($tn == '--Ngành--') {
            echo "<script>alert('CHOOSE NGANH!!!')</script>";
        } else {
            $sql = "INSERT INTO monhoc VALUES('$mm','$nameS','$hk', '$stc','$tn')";
            $kq = mysqli_query($con, $sql);

            $sqlGia = "INSERT INTO dongia VALUES('$mm','$nameS','$stc', '$gia')";
            $kqa = mysqli_query($con, $sqlGia);

            if ($kq)
                echo "<script>alert('Thêm môn học thành công')</script>";
            else
                echo "<script>alert('Thêm môn học thất bại')</script>";
        }
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thêm môn</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
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
            justify-content: center;
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
                    <h2>THÔNG TIN MÔN HỌC </h2>
                </div>
                <div class="card-body">
                    <table>
                        <tr>
                            <td align="center" style="width: 150px;">Mã môn học</td>
                            <td>
                                <input class="form-control" type="text" name="txtMamon">
                            </td>
                        </tr>

                        <tr>
                            <td align="center" style="width: 150px;">
                                Tên môn học</td>
                            <td>
                                <input class="form-control" type="text" name="txtTenmon">
                            </td>
                        </tr>

                        <tr>
                            <td align="center" style="width: 150px;">Học kỳ</td>
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
                            <td align="center" style="width: 150px;">Tên Ngành</td>
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
                            <td align="center" style="width: 150px;">Số tín chỉ</td>
                            <td>
                                <input class="form-control" type="text" name="txtStc">
                            </td>
                        </tr>
                    </table>
                    <div class="btn-sys">
                        <input class="btn btn-primary" type="submit" name="btnInsert" value="INSERT">
                    </div>
                </div>
            </div>
        </div>
    </form>
</body>

</html>