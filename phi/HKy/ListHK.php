<?php
$connect = mysqli_connect('localhost', 'root', '', 'quanlyhocphi')
    or die('loi ket noi');

$sql = "SELECT * FROM hocky";
$data = mysqli_query($connect, $sql);

mysqli_close($connect);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title>List học kỳ</title>
</head>

<body>
    <div class="container-fluid">
        <div class="card">
            <div class="card-header">
                <h2>THÔNG TIN HỌC KỲ <a href="./AddHK.php"><i class="fa-solid fa-plus fa-beat fa-2xs" style="color: #070808;"></i></a></h2>
            </div>

            <div class="card-body">
                <table class="table">
                    <thead class="thead-dark">
                        <tr>
                            <th>#</th>
                            <th>Mã học kỳ</th>
                            <th>Tên học kỳ</th>
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
                                    <td><?php echo $rows['MaHK'] ?></td>
                                    <td><?php echo $rows['TenHK'] ?></td>
                                    <td width="200px" align="center">
                                        <a href="./SuaHK.php?mahk=<?php echo $rows['MaHK'] ?>"><img style="width: 35px;" src="../picture/changee.avif"></a>
                                        <a href="./XoaHK.php?mahk=<?php echo $rows['MaHK'] ?>"><img style="width: 35px;" src="../picture/deletee.jpg"></a>
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

</body>

</html>