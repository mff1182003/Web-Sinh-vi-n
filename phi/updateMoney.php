<?php
$con=mysqli_connect('localhost','root', '','quanlyhocphi') or die ('Lỗi kết nối');
$masv=$_GET['masv'];

$sql1 = "SELECT * from thuno,sinhvien, nganh, lop where sinhvien.MaLop=lop.MaLop and lop.Manganh=nganh.Manganh and MaSV ='DCTM20068'";
$data1=mysqli_query($con,$sql1);

$sql2="SELECT* ,SUM(monhoc.Sotinchi*Giatin) FROM sinhvien, lop, nganh, monhoc, dongia, hocky WHERE sinhvien.MaLop=lop.MaLop and lop.MaNganh=nganh.Manganh and nganh.Manganh=monhoc.MaNganh and monhoc.MaMon=dongia.MaMon and monhoc.MaHK=hocky.MaHK and MaSV='DCTM20068' GROUP BY hocky.MaHK";
$data2=mysqli_query($con,$sql2);

$sql_dadong="SELECT * FROM thuno WHERE MaSV='$masv'";
$data_dadong=mysqli_query($con,$sql_dadong);

if(isset($_POST['btnDongtien'])){
	$masv=$_GET['masv'];
if(!$con){
	die ('Lỗi kết nối');
}
	$dadong_value = $_POST['txtDongtien'];
	 // Kiểm tra xem cột "dadong" đã có dữ liệu chưa
	 $sql_check = "SELECT * FROM thuno where MaSV='$masv' ";
	 $result_check = mysqli_query($con, $sql_check);
	 echo $result_check;

	 // Nếu đã có dữ liệu, thì cộng thêm giá trị mới
	 if (mysqli_num_rows($result_check) > 0) {
		$row = mysqli_fetch_assoc($result_check);
		$current_value = $row['Dadong'];
		$new_value = $current_value + $dadong_value;
		
		// Cập nhật giá trị mới vào cột "dadong"
		$sql_update = "UPDATE thuno SET Dadong = $new_value where thuno.MaSV=sinhvien.MaSV and MaSV='$masv' ";
		$data_up=mysqli_query($con,$sql_update);
		if ($data_up) {
		  echo "Cập nhật dữ liệu thành công";
		} else {
		  echo "Có lỗi xảy ra khi cập nhật dữ liệu: " . mysqli_error($con);
		}
	  
	  // Nếu chưa có dữ liệu, thì thêm giá trị mới vào cột "dadong"
	  } else {
		$sql_insert = "INSERT INTO thuno (Dadong) VALUES ($dadong_value) where thuno.MaSV=sinhvien.MaSV and MaSV='$masv'";
		if (mysqli_query($con, $sql_insert)) {
		  echo "Thêm dữ liệu thành công";
		} else {
		  echo "Có lỗi xảy ra khi thêm dữ liệu: " . mysqli_error($con);
		}
	  }
	  
	  // Đóng kết nối với cơ sở dữ liệu
	  mysqli_close($con);
}
mysqli_close($con);
?>