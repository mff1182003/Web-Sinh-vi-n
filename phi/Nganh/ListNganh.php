<?php
$connect = mysqli_connect('localhost', 'root', '','quanlyhocphi')
    or die('loi ket noi');

$sql = "SELECT * FROM nganh";
$data = mysqli_query($connect, $sql);

if (isset($_POST['btnTimkiem'])) {
    $Manganh = $_POST['txtTimmanganh'];
    $Tennganh = $_POST['txtTimtennganh'];
 
    $sqlTim = "SELECT * FROM nganh WHERE Manganh like '%$Manganh%' and Tennganh like '%$Tennganh%'";
    $data = mysqli_query($connect, $sqlTim);
}
mysqli_close($connect);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title>Thêm ngành</title>
   
</head>

<body>
<form method="post" action="">
        <div class="container-fluid">
            <div class="card">
                <div class="card-header">
                    <h4>THÔNG TIN TÌM KIẾM NGÀNH HỌC</h4>
                </div>
                <div class="card-body">
                    <table>
                        <tr>
                            <td style="width: 100px;">
                                Mã ngành
                            </td>
                            <td>
                                <input class="form-control" type="text" name="txtTimmanganh">
                            </td>
                        </tr>

                        <tr>
                            <td>
                                Tên Ngành
                            </td>
                            <td>
                                <input class="form-control" type="text" name="txtTimtennganh">
                            </td>
                        </tr>

                        <tr>
                            <td align="center" colspan="2" style="padding-top: 20px;">
                                <button class="btn btn-primary" type="submit" name="btnTimkiem">Tìm kiếm</button>
                                &nbsp;
                            </td>
                        </tr>
                    </table>
    </form>
    </div>
    </div>
    </div>
    </div>
    </form>
    <form method="post">

    <div class="container-fluid">
        <div class="card">
            <div class="card-header">
                <h2>THÔNG TIN NGÀNH HỌC <a href="./Addnganh.php"><i class="fa-solid fa-plus fa-beat fa-2xs" style="color: #070808;"></i></a></h2>
            </div>

            <div class="card-body">
                <table class="table">
                    <thead class="thead-dark">
                        <tr>
                            <th>#</th>
                            <th>Mã ngành</th>
                            <th>Tên ngành</th>
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
                                    <td><?php echo $rows['Manganh'] ?></td>
                                    <td><?php echo $rows['Tennganh'] ?></td>
                                    <td width="200px" align="center">
                                        <a href="./Suanganh.php?manganh=<?php echo $rows['Manganh'] ?>"><img style="width: 35px;" src="../picture/changee.avif"></a>
                                        <a href="./Xoanganh.php?manganh=<?php echo $rows['Manganh'] ?>" onclick="return checkDelete()"><img style="width: 35px;" src="../picture/deletee.jpg"></a>
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