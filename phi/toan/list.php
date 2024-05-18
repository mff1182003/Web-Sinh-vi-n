<?php
$connect=mysqli_connect('localhost','root','','quanlyhocphi') or die ('Lỗi kết nối');

$sql = "SELECT * FROM sinhvien";


if (isset($_POST['search'])) {

    $masv = $_POST['timkiem'];
    
    $sql1 = "SELECT * FROM sinhvien WHERE MaSV='$masv'";

    $result = mysqli_query($connect, $sql1);
    } else {
        echo "Không tìm thấy kết quả.";
    }
    $data = mysqli_query($connect, $sql);
mysqli_close($connect);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <!-- Latest compiled and minified CSS -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Latest compiled JavaScript -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"></script>

    <title>Document</title>
</head>

<body>

    <form action="./sinhvien.php" method="POST">
        <button name="them" type="submit">thêm sinh viên</button>
    </form>
<form method="POST" action="">
    
    <input type="text" name="timkiem" placeholder="Từ khóa tìm kiếm">
    <button type="submit" name="search">Tìm kiếm</button>

    <table class="table">
    <thead class="table-success">
      <tr>
        <th>mã sinh viên</th>
        <th>tên sinh viên</th>
        <th>mã lớp</th>
        <th colspan="2">tác vụ</th>
      </tr>
    </thead>
    <tbody class="table-success">
                        <?php
                        if (isset($result) && $result != null) {
                            while ($rows = mysqli_fetch_array($result)) {
                        
                        ?>
                                <tr>
                                    <td><?php echo $rows['MaSV'] ?></td>
                                    <td><?php echo $rows['TenSV'] ?></td>
                                    <td><?php echo $rows['MaLop'] ?></td>
                                    <td ><a href="./sua.php?masv=<?php echo $rows['MaSV'] ?>">sửa</a></td>
                                    <td ><a href="./xoa.php?masv=<?php echo $rows['MaSV'] ?>">xóa</a></td>
                                </tr>
                        <?php
                            
                            }
                        }
                        ?>
    </tbody>
                </table>
                <table class="table">
    <thead class="table-success">
      <tr>
        <th>mã sinh viên</th>
        <th>tên sinh viên</th>
        <th>mã lớp</th>
        <th colspan="2">tác vụ</th>
      </tr>
    </thead>
    <tbody class="table-success">
                        <?php
                        if (isset($data) && $data != null) {
                            while ($rows = mysqli_fetch_array($data)) {
                        
                        ?>
                                <tr>
                                    <td><?php echo $rows['MaSV'] ?></td>
                                    <td><?php echo $rows['TenSV'] ?></td>
                                    <td><?php echo $rows['MaLop'] ?></td>
                                    <td><a href="./sua.php?masv=<?php echo $rows['MaSV'] ?>">sửa</a></td>
                                    <td><a href="./xoa.php?masv=<?php echo $rows['MaSV'] ?>">xóa</a></td>
                                </tr>
                        <?php
                            
                            }
                        }
                        ?>
    </tbody>
                </table>

    
</form>
</body>

</html>