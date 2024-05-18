<?php
$conn = mysqli_connect('localhost', 'root', '', 'quanlyhocphi')
    or die('failed');
    $malop = $_GET["malop"];
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Lấy dữ liệu từ form
       
        $tenlop = $_POST["tenlop"];
        $manganh = $_POST["manganh"];
        $sql_check = "SELECT * FROM lop WHERE MaLop = '$malop'";
        $result = mysqli_query($conn, $sql_check);
    
        if (mysqli_num_rows($result) > 0) {
            // Cập nhật thông tin lớp
            $sql_update = "UPDATE lop SET Tenlop = '$tenlop' WHERE MaLop = '$malop'";
    
            if (mysqli_query($conn, $sql_update)) {
                echo "Thông tin lớp đã được cập nhật thành công.";
            } else {
                echo "Lỗi cập nhật thông tin lớp: " . mysqli_error($conn);
            }
        } else {
            echo "Mã lớp không tồn tại.";
        }
    
        mysqli_close($conn);
    }
    
    ?>
    <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sửa thông tin lớp</title>
    
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" integrity="sha384-...">
</head>
<body>
    <div class="container d-flex justify-content-center align-items-center h-100">
        <div class="card">
            <h5 class="card-header">Sửa thông tin lớp</h5>
            <div class="card-body">
                <form>
                    <div class="mb-3">
                        <label for="malop" class="form-label">Mã lớp:</label>
                        <input type="text" class="form-control" id="malop"  value="<?php echo $malop ?>" disabled name="malop">
                    </div>
                    <div class="mb-3">
                        <label for="tenlop" class="form-label">Tên lớp:</label>
                        <input type="text" class="form-control" id="tenlop" name="tenlop">
                    </div>
                    <div class="mb-3">
                        <label for="tenlop" class="form-label">Mã ngành:</label>
                        <input type="text" class="form-control" id="tenlop" name="manganh">
                    </div>
                    <button type="submit" class="btn btn-primary">Lưu</button>
                </form>
            </div>
        </div>
    </div>

    <!-- Mã JavaScript Bootstrap -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.min.js" integrity="sha384-..."></script>
</body>
</html>
    