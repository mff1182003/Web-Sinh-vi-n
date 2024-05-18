<?php
$connect = mysqli_connect('localhost', 'root', '', 'quanlyhocphi')
    or die('failed connecti');
    
        $masv = $_GET['masv'];
    
        $sql = "SELECT * FROM sinhvien WHERE MaSV = '$masv'";
        $result = mysqli_query($connect, $sql);
    
        
    
        if (isset($_POST['btnDELETE'])) {
            $sqlDelete = "DELETE FROM sinhvien WHERE MaSV = '$masv'";
            $resultDelete = mysqli_query($connect, $sqlDelete);
    
            if ($resultDelete) {
                echo "<script>alert('Xóa sinh viên thành công')</script>";
                echo "<script>window.location.href='./list.php'</script>";
                exit;
            } else {
                echo "<script>alert('Xóa sinh viên thất bại')</script>";
            }
        }
    
        if (isset($_POST['btnCANCEL'])) {
            echo "<script>window.location.href='./list.php'</script>";
            exit;
        }
   
    ?>
    
    <!DOCTYPE html>
<html lang="en">
<head>
    <!-- Add Bootstrap 5.1 stylesheet link -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/5.1.0/css/bootstrap.min.css" rel="stylesheet">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Xóa sinh viên</title>
    <!-- Embed Bootstrap JavaScript -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/5.1.0/js/bootstrap.bundle.min.js"></script>
</head>
<body class="d-flex justify-content-center align-items-center vh-100">
    <div class="text-center">
        <h1>Xóa sinh viên</h1>
        <table><?php 
        if ($result) {
            $row=mysqli_fetch_array($result)
            ?>
            <tr>
                <td>Mã sinh viên:</td>
                <td><?php echo $row['MaSV']; ?></td>
            </tr>
            <tr>
                <td>Tên sinh viên:</td>
                <td><?php echo $row['TenSV']; ?></td>
            </tr>
            <tr>
                <td>Lớp:</td>
                <td><?php echo $row['MaLop']; ?></td>
            </tr>
        <?php
        }
        ?>
        </table>

        <p>Bạn có chắc chắn muốn xóa sinh viên này?</p>

        <form method="post" class="d-flex justify-content-center">
            <input type="submit" name="btnDELETE" value="Xóa" class="btn btn-danger me-3">
            <input type="submit" name="btnCANCEL" value="Hủy" class="btn btn-secondary">
        </form>
    </div>
</body>
</html>