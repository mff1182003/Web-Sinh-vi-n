<?php
$conn = mysqli_connect('localhost', 'root', '', 'quanlyhocphi')
    or die('failed');

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Lấy dữ liệu từ form
        $malop = $_POST["malop"];
        $tenlop = $_POST["tenlop"];
        $manganh = $_POST["manganh"];

        $sql_check = "SELECT * FROM lop ";
        $result_check = mysqli_query($conn, $sql_check);
     $sql = "INSERT INTO lop (MaLop, Tenlop,MaNganh) VALUES ('$malop', '$tenlop','$manganh')";
     $sql_checks = "SELECT * FROM lop where MaLop='$malop' ";
        $result_checks = mysqli_query($conn, $sql_check);
     if (mysqli_query($conn, $sql)) {
        echo "Lớp đã được thêm thành công.";
        echo "loi1";
    } else {
        echo "Lỗi thêm lớp: " . mysqli_error($conn);
    }

    // if (mysqli_num_rows($result_checks) > 0) {
    //     echo "Mã lớp đã tồn tại. Vui lòng chọn mã lớp khác.";
    // } else {
    //     // Thêm lớp vào bảng lop
    //     $sql = "INSERT INTO lop (MaLop,Tenlop,MaNganh) VALUES ('$malop', '$tenlop','$manganh')";

    //     if (mysqli_query($conn, $sql)) {
    //         echo "Lớp đã được thêm thành công.";
    //         echo "loi 2";
    //     } else {
    //         echo "Lỗi thêm lớp: " . mysqli_error($conn);
    //     }
    // }


    mysqli_close($conn);
}

    ?>
<!DOCTYPE html>
<html>
<head>
    <title>Thêm lớp mới</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1 class="text-center">Thêm lớp mới</h1>

        <form action="addlopp.php" method="POST">
            <div class="mb-3">
                <label for="malop" class="form-label">Mã lớp:</label>
                <input type="text" class="form-control" name="malop">
            </div>

            <div class="mb-3">
                <label for="tenlop" class="form-label">Tên lớp:</label>
                <input type="text" class="form-control" name="tenlop">
            </div>

            <div class="mb-3">
                <label for="manganh" class="form-label">Mã ngành:</label>
                <input type="text" class="form-control" name="manganh">
            </div>

            <button type="submit" class="btn btn-primary">Thêm lớp</button>
        </form>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>