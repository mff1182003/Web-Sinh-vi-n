<?php
$con = mysqli_connect('localhost', 'root', '', 'quanlyhocphi') or die('Lỗi kết nối');
$masv = $_GET['masv'];
$sql1 = "select *  from sinhvien, nganh, lop where sinhvien.MaLop=lop.MaLop and lop.Manganh=nganh.Manganh and MaSV ='$masv'";
$data1 = mysqli_query($con, $sql1);
$sql = "Select MaSV, MaMon, TenMon, Sotinchi FROM sinhvien, lop, nganh, monhoc WHERE sinhvien.MaLop=lop.MaLop and lop.MaNganh=nganh.Manganh and nganh.Manganh=monhoc.MaNganh and MaSV='$masv'";
$data = mysqli_query($con, $sql);
mysqli_close($con);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=, initial-scale=1.0">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css">
	<link rel="stylesheet" href="./css/inforSV.css" />
    <title>Thông tin cá nhân</title>
</head>

<body>
    <form action="" method="GET" class="dialog">
        <div class="row">
            <div class="column">
                <table class="table-infor" style="margin-left: 4%; font-family: Cambria, Cochin, Georgia, Times, 'Times New Roman', serif; font-size: 20px;">
                    <?php
                    // print_r($data);
                    if ($data1->num_rows > 0) {
                        while ($row = $data1->fetch_assoc()) {
                    ?>
                    
                            <tr >
                                <th class="icon-infor" rowspan="4"><img src="./picture/icon-infor.svg" alt=""></th>
                                <th><?php echo $row['MaSV']?></th>
                            </tr>
                            <tr>
                                <th><?php echo $row['TenSV']?></th>
                            </tr>
                            <tr>
                                <th><?php echo "Lớp: " . $row['MaLop']?></th>
                            </tr>
                            <tr>
                                <th><?php echo "Ngành: " . $row['Tennganh'] . " - " . $row['Manganh'] ?></th>
                            </tr>

                    <?php
                        }
                    }
                    ?>
                </table>
            </div>
            <div class="column">
                <h3 style="width: 130%; margin-left: 24%;">DANH SÁCH CÁC MÔN HỌC ĐÃ ĐĂNG KÝ</h3>
                <br>
                <table class="table-SJ">
                    <thead class="header-table">
                        <tr>
                            <th>#</th>
                            <th>Mã môn</th>
                            <th>Tên môn</th>
                            <th>Số tín chỉ</th>
                        </tr>
                    </thead>
                    <?php
                    if (isset($data) && $data != null) {
                        $i = 0;
                        while ($row = mysqli_fetch_array($data)) {
                    ?>
                            <tr>
                                <td class="col1"> <?php echo ++$i ?> </td>
                                <td align="center"> <?php echo $row['MaMon'] ?> </td>
                                <td align="center"> <?php echo $row['TenMon'] ?> </td>
                                <td align="center"> <?php echo $row['Sotinchi'] ?> </td>
                            </tr>
                    <?php
                        }
                    }
                    ?>
                </table>
            </div>
        </div>

    </form>
</body>

</html>