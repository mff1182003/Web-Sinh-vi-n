<?php
$con=mysqli_connect('localhost','root','','quanlyhocphi') or die ('Lỗi kết nối');
// Kiểm tra xem có yêu cầu đóng tiền hay không
    // Lấy giá trị của biến masv từ URL
    $masv = $_GET['masv'];
    
    // Tiến hành cập nhật tiền và cột Dadong trong bảng thuno
    
        echo "Thêm dữ liệu thành công";
        $dadong_value = $_GET['txtDongtien']; // Lấy giá trị số tiền cần đóng từ trường nhập
        $ngay_dong = $_GET['ngaydong'];
        
        $note = $_GET['note'];

        $sql_BL = "SELECT * FROM bienlai,thuno where bienlai.MaSV = '$masv' and thuno.MaSV='$masv'";
        $result_BL= mysqli_query($con,$sql_BL);
        
        echo "lay dc ten ";
        $dataBL= mysqli_fetch_assoc($result_BL);
        $tenBL = $dataBL['TenSV'];
    

        if($result_BL ){
            print_r($result_BL);
          $sql_themBL = "INSERT INTO bienlai Value ('$masv','$tenBL','$dadong_value','$ngay_dong','$note')";
          $data_themBL = mysqli_query($con,$sql_themBL);
          print_r($data_themBL);
        }
          
    // Thực hiện câu truy vấn cập nhật tiền và cột Dadong trong bảng thuno
    $sql_check = "SELECT * FROM thuno where MaSV= '$masv' ";

    $result_check = mysqli_query($con, $sql_check);
    
	 // Nếu đã có dữ liệu, thì cộng thêm giá trị mới

	 if (mysqli_num_rows($result_check) > 0) {
		$row = mysqli_fetch_assoc($result_check);
		$current_value = $row['Dadong'];
		$new_value = $current_value + $dadong_value;
		
		// Cập nhật giá trị mới vào cột "dadong"
		$sql_update = "UPDATE thuno SET Dadong = $new_value where MaSV='$masv' ";
		$data_up=mysqli_query($con,$sql_update);
		if ($data_up) {
		  echo "Cập nhật dữ liệu thành công";
          echo "<script>window.history.back(); location.reload();</script>";

		} else {
		  echo "Có lỗi xảy ra khi cập nhật dữ liệu: " . mysqli_error($con);
          echo "<script>window.history.back(); location.reload();</script>";
		}
	  
	  // Nếu chưa có dữ liệu, thì thêm giá trị mới vào cột "dadong"
	  } else {
		$sql_insert = "INSERT INTO thuno (Dadong) VALUES ($dadong_value) where MaSV='$masv'";
		if (mysqli_query($con, $sql_insert)) {
		  echo "Thêm dữ liệu thành công";
          
          echo "<script>window.history.back(); location.reload();</script>";
		} else {
		  echo "Có lỗi xảy ra khi thêm dữ liệu: " . mysqli_error($con);
          echo "<script>window.history.back(); location.reload();</script>";
		}
	  }


     
?>

<!-- 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<form action="" method="POST">
        <table cellspacing="25">
            <tr align="center">
                <td colspan="2">
                    <h2>Đóng học phí</h2>
                </td>
            </tr>
            <?php
            if(isset($result_check)&&$result_check!=null){
                print_r($row);
                while($rows = mysqli_fetch_array($result_check)){
        ?>
      
        <tr>
            <td class="col1">Mã sinh viên</td>
            <td class ="col2"><?php echo $rows['MaSV'] ?></td>
        </tr>
        <tr>
            <td class="col1">Tên sinh viên</td>
            <td class="col2"><?php echo $rows['TenSV'] ?></td>
        </tr>
        <tr>
            <td class="col1">Học kỳ</td>
            <td class="col2"><?php echo $rows['Phaidong'] ?></td>
        </tr>
        <tr>
            <td class="col1">Số tiền</td>
            <td class ="col2"><?php echo $rows['Dadong'] ?></td>
        </tr>
        <?php
            }
            }
        ?>
        <tr>
            <td class="col1"></td>
            <td class="col2">
                <input type="submit" name="btnLuu" value="Đóng"> 
                <input type="submit" name="btnBack" value ="Quay lai">
                </td>
            
        </tr>
    </table>
</form>
</body>
</html> -->