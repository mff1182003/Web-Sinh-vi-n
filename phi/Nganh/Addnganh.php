<?php
$con = mysqli_connect('localhost', 'root', '', 'quanlyhocphi')
    or die('loi let noi roi huhu');

if (isset($_POST['btnInsert'])) {
    $mn = $_POST['txtManganh'];
    $tn = $_POST['txtTennganh'];
    //trung ma
    if ($mn == '') {
        echo '<script>alert("RỖNG!!!")</script>';
    } else {
        $slqtrungma = "SELECT *FROM nganh WHERE Manganh = '$mn'";
        $data = mysqli_query($con, $slqtrungma);
        if (mysqli_num_rows($data) > 0) {
            echo "<script>alert('TRÙNG MÃ RỒI!!!')</script>";
        } else {
            $sql = "INSERT INTO nganh VALUES('$mn','$tn')";
            $kq = mysqli_query($con, $sql);
            if ($kq)
                echo "<script>alert('Thêm ngành học thành công')</script>";
            else
                echo "<script>alert('Thêm ngành học thất bại')</script>";
        }
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thêm ngành</title>
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
                    <h2>THÔNG TIN NGÀNH HỌC</h2>
                </div>
                <div class="card-body">
                    <table>
                        <tr>
                            <td align="center" style="width: 150px;">
                                Mã ngành
                            </td>
                            <td>
                                <input class="form-control" type="text" name="txtManganh">
                            </td>
                        </tr>
                        <tr>
                            <td align="center" style="width: 150px;">Tên ngành</td>
                            <td>
                                <input class="form-control" type="text" name="txtTennganh">
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