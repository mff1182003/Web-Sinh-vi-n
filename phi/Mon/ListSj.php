<?php
$connect = mysqli_connect('localhost', 'root', '', 'quanlyhocphi')
    or die('loi ket noi');

$sql = "SELECT MaMon, TenMon, hocky.TenHK, nganh.Tennganh, Sotinchi FROM monhoc, nganh, hocky WHERE monhoc.MaHK = hocky.MaHK and monhoc.MaNganh = nganh.Manganh";
$data = mysqli_query($connect, $sql);

if (isset($_POST['btnTimkiem'])) {
    $Mamon = $_POST['txtTimmamon'];
    $Tenmon = $_POST['txtTimtenmon'];
    $Hocky = $_POST['txtHocky'];
    $sqlTim = "SELECT MaMon, TenMon, hocky.TenHK, nganh.Tennganh, Sotinchi FROM monhoc, nganh, hocky
     WHERE monhoc.MaHK = hocky.MaHK and monhoc.MaNganh = nganh.Manganh 
     and MaMon like '%$Mamon%' and TenMon like '%$Tenmon%' and like '%$Hocky%'";
    $data = mysqli_query($connect, $sqlTim);
}
mysqli_close($connect);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css">
  	<link rel="stylesheet" href="style.css" />

    <title>List môn học</title>
</head>

<body>
<form method="post" action="">
        <div class="container-fluid">
            <div class="card">
                <div class="card-header">
                    <h4>THÔNG TIN TÌM KIẾM MÔN HỌC</h4>
                </div>
                <div class="card-body">
                    <table>
                        <tr>
                            <td style="width: 120px;">
                                Mã môn học
                            </td>
                            <td>
                                <input class="form-control" type="text" name="txtTimmamon">
                            </td>
                        </tr>

                        <tr>
                            <td>
                                Tên môn
                            </td>
                            <td>
                                <input class="form-control" type="text" name="txtTimtenmon">
                            </td>
                        </tr>
                        
                        <tr>
                            <td>
                                Học kỳ
                            </td>
                            <td>
                                <input class="form-control" type="text" name="txtHocky">
                            </td>
                        </tr>
                        <tr>
                            <td align="center" colspan="2" style="padding-top: 20px;">
                                <button class="btn btn-primary" type="submit" name="btnTimkiem">Tìm kiếm</button>
                                &nbsp;
                            </td>
                        </tr>
                    </table>
            
    
    </div>
    </div>
    </div>
    </form>
    <div class="container-fluid">
        <div class="card">
            <div class="card-header">
                <h2>THÔNG TIN MÔN HỌC <a href="./AddSJ.php"><i class="fa-solid fa-plus fa-beat fa-2xs" style="color: #070808;"></i></a></h2>
            </div>

            <div class="card-body">
                <table class="table">
                    <thead class="thead-dark">
                        <tr>
                            <th>#</th>
                            <th>Mã môn</th>
                            <th>Tên môn</th>
                            <th>Học kỳ</th>
                            <th>Ngành</th>
                            <th>Số tín chỉ</th>
                            <th>Tác vụ</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        if (isset($data) && $data != null) {
                            $i = 1;
                            while ($rows = mysqli_fetch_array($data)) {
                        ?>
                                <tr>
                                    <td><?php echo $i++ ?></td>
                                    <td><?php echo $rows['MaMon'] ?></td>
                                    <td><?php echo $rows['TenMon'] ?></td>
                                    <td><?php echo $rows['TenHK'] ?></td>
                                    <td><?php echo $rows['Tennganh'] ?></td>
                                    <td><?php echo $rows['Sotinchi'] ?></td>
                                    <td width="200px">
                                        <a href="./Suamon.php?mamon=<?php echo $rows['MaMon'] ?>"><img style="width: 35px;" src="../picture/changee.avif"></a>
                                        <a href="./Xoamon.php?mamon=<?php echo $rows['MaMon'] ?>" onclick="return checkDelete()"><img style="width: 35px;" src="../picture/deletee.jpg"></a>
                                    </td>
                                </tr>
                        <?php
                            }
                        }
                        ?>
                    </tbody>
                </table>

            </div>
        </div>
    </div>
 
    <script>
        function checkDelete() {
            return confirm("XÁC NHẬN XÓA?");
        }
    </script>
</body>

</html>