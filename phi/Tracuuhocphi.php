<?php
$masv = $_GET['masv'];
$hk = '';
$con = mysqli_connect('localhost', 'root', '', 'quanlyhocphi') or die('Lỗi kết nối');
$sql_hk = "SELECT * FROM hocky";
$data_hk = mysqli_query($con, $sql_hk);
$sql1 = "select *  from sinhvien, nganh, lop where sinhvien.MaLop=lop.MaLop and lop.Manganh=nganh.Manganh and MaSV ='$masv'";
$data1 = mysqli_query($con, $sql1);
$sql_t = "UPDATE thuno 
SET Phaidong =(SELECT SUM(monhoc.Sotinchi*Giatin) FROM sinhvien, lop, nganh, monhoc, dongia WHERE sinhvien.MaLop=lop.MaLop and lop.MaNganh=nganh.Manganh and nganh.Manganh=monhoc.MaNganh and monhoc.MaMon=dongia.MaMon and MaSV='$masv' GROUP BY MaSV) 
WHERE MaSV='$masv'";
$data_t = mysqli_query($con, $sql_t);
if (isset($_POST['btnTim'])) {
    $hk = $_POST['cbHK'];
    $sql = "Select *, (monhoc.Sotinchi* Giatin) as Thanhtien FROM sinhvien, lop, nganh, monhoc, dongia WHERE sinhvien.MaLop=lop.MaLop and lop.MaNganh=nganh.Manganh and nganh.Manganh=monhoc.MaNganh and monhoc.MaMon=dongia.MaMon and MaSV='$masv'and  MaHK like '%$hk%'";
    $data = mysqli_query($con, $sql);
    $sql2 = "SELECT*,SUM(monhoc.Sotinchi*Giatin) FROM sinhvien, lop, nganh, monhoc, dongia WHERE sinhvien.MaLop=lop.MaLop and lop.MaNganh=nganh.Manganh and nganh.Manganh=monhoc.MaNganh and monhoc.MaMon=dongia.MaMon and MaSV='$masv' and  MaHK like '%$hk%' GROUP BY MaSV";
    $data2 = mysqli_query($con, $sql2);
    $sql_t = "UPDATE thuno SET Phaidong =(SELECT SUM(monhoc.Sotinchi*Giatin) FROM sinhvien, lop, nganh, monhoc, dongia WHERE sinhvien.MaLop=lop.MaLop and lop.MaNganh=nganh.Manganh and nganh.Manganh=monhoc.MaNganh and monhoc.MaMon=dongia.MaMon and MaSV='$masv' GROUP BY MaSV) 
            WHERE MaSV='$masv'";
    $data_t = mysqli_query($con, $sql_t);
} else {
    $sql = "Select *, (monhoc.Sotinchi* Giatin) as Thanhtien FROM sinhvien, lop, nganh, monhoc, dongia WHERE sinhvien.MaLop=lop.MaLop and lop.MaNganh=nganh.Manganh and nganh.Manganh=monhoc.MaNganh and monhoc.MaMon=dongia.MaMon and MaSV='$masv'";
    $data = mysqli_query($con, $sql);
    $sql2 = "SELECT*,SUM(monhoc.Sotinchi*Giatin) FROM sinhvien, lop, nganh, monhoc, dongia WHERE sinhvien.MaLop=lop.MaLop and lop.MaNganh=nganh.Manganh and nganh.Manganh=monhoc.MaNganh and monhoc.MaMon=dongia.MaMon and MaSV='$masv' GROUP BY MaSV";
    $data2 = mysqli_query($con, $sql2);
}

mysqli_close($con);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css">
    <title>Tra cứu học phí</title>
    <style type="text/css">
        .loc {
            margin-left: 30%;
            margin-bottom: 1%;
        }

        .table-SJ {
            border-collapse: collapse;
            border-spacing: 0;
            width: 90%;
            border: 1px solid #ddd;
            margin-left: 4%;
        }

        .table-SJ th,
        td {
            text-align: left;
            padding: 16px;
        }

        .table-SJ tr:nth-child(even) {
            background-color: lightgray;
        }
    </style>
</head>
<body>
    <form action="" method="POST">
        <table class="loc">
            <tr>
                <th class="col1"> Nhập học kỳ: </th>
                <td class="col2">
                    <select class='form-control' name="cbHK" id="HK">
                        <option value="">------Chọn học kỳ------</option>
                        <?php
                        if (isset($data_hk) && $data_hk != null) {
                            while ($row_hk = mysqli_fetch_array($data_hk)) {
                        ?>
                                <option <?php if ($hk == $row_hk['MaHK']) {
                                            echo "selected";
                                        } ?> value="<?php echo $row_hk['MaHK'] ?>"><?php echo $row_hk['TenHK'] ?></option>
                        <?php
                            }
                        }
                        ?>
                    </select>
                </td>
                <td style="padding-left: 5%;"> <input class="btn btn-success" type="submit" name="btnTim" value="Tìm kiếm"></td>
        </table>
        <table class="table-SJ" cellspacing=20px>
            <tr>
                <th>#</th>
                <th>Mã môn</th>
                <th>Tên môn</th>
                <th>Số tín chỉ</th>
                <th>Đơn giá</th>
                <th>Thành tiền</th>
            </tr>
            <?php
            if (isset($data) && $data != null) {
                $i = 0;
                while ($row = mysqli_fetch_array($data)) {
            ?>
                    <tr>
                        <td> <?php echo ++$i ?> </td>
                        <td> <?php echo $row['MaMon'] ?> </td>
                        <td> <?php echo $row['TenMon'] ?> </td>
                        <td> <?php echo $row['Sotinchi'] ?> </td>
                        <td><?php echo $row['Giatin'] ?></td>
                        <td><?php echo $row['Thanhtien'] ?></td>
                    </tr>
            <?php
                }
            }
            ?>
            <tr>
                <th> Phải đóng:</th>
                <td> </td>
                <td> </td>
                <td> </td>
                <td> </td>
                <th>
                    <?php

                    // print_r($data);
                    if ($data2->num_rows > 0) {
                        while ($row = $data2->fetch_assoc()) {
                            echo $row['SUM(monhoc.Sotinchi*Giatin)'];
                        }
                    }
                    ?>
                </th>
            </tr>
        </table>

    </form>
</body>

</html>