<?php
$masv = $_GET['masv'];

$con = mysqli_connect('localhost', 'root', '', 'quanlyhocphi') or die('Lỗi kết nối');
$sql1 = "SELECT * from sinhvien, nganh, lop where sinhvien.MaLop=lop.MaLop and lop.Manganh=nganh.Manganh and MaSV ='$masv'";
$data1 = mysqli_query($con, $sql1);
$sql2 = "SELECT* ,SUM(monhoc.Sotinchi*Giatin) FROM sinhvien, lop, nganh, monhoc, dongia, hocky WHERE sinhvien.MaLop=lop.MaLop and lop.MaNganh=nganh.Manganh and nganh.Manganh=monhoc.MaNganh and monhoc.MaMon=dongia.MaMon and monhoc.MaHK=hocky.MaHK and MaSV='$masv' GROUP BY monhoc.MaHK";
$data2 = mysqli_query($con, $sql2);

$sql_dadong = "SELECT * FROM thuno WHERE MaSV='$masv'";
$sqlconno = "UPDATE thuno Set Conno = Phaidong - Dadong ";
$dataconno = mysqli_query($con, $sqlconno);
$data_dadong = mysqli_query($con, $sql_dadong);

$sqlBL = "SELECT * from bienlai, thuno where  ";
mysqli_close($con);
?>
<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css">
	<title>Đóng học phí</title>
	<style>
		.bienlai-btn {
			margin-left: 30%;
		}

		.tacvu {
			margin-left: 15%;
		}
		.infor{
			background-color: gainsboro;
			border-radius: 2px;
			font-size: 20px;
			display: flex;
			justify-content: center;
			padding: 1px 0 22px 0;
			font-family: 'Courier New', Courier, monospace;
		}
		.close-w{
			padding-top: 10px;
			padding-right: 20px;
			display: flex;
			justify-content: right;
			background-color: gainsboro;
		}
		.close-w a{
			color: black
		}
	</style>
</head>

<body>
	<form action="" method="GET">
		<div class="close-w">
			<a href="./TrangchuSinhvien.php?masv=<?php echo $masv?>"><i class=" fa-solid fa-square-xmark fa-xl"></i></a>
		</div>
		<div class="infor">
			<?php
			// print_r($data);
			if ($data1->num_rows > 0) {
				while ($row = $data1->fetch_assoc()) {
					echo $row['MaSV'] . " - " . $row['TenSV'] . " - Lớp: " . $row['MaLop'] . " - Ngành: " . $row['Tennganh'] . " - " . $row['Manganh'];
				}
			}
			?>
		</div>
		<div class="card-body">

			<table class="table">
				<thead class="thead-dark">
					<tr>
						<th>#</th>
						<th>Loại</th>
						<th>Học kỳ</th>
						<th>Số tiền</th>
					</tr>
				</thead>
				<tbody>

					<?php
					if (isset($data2) && $data2 != null) {
						$i = 0;
						while ($row = mysqli_fetch_array($data2)) {
					?>
							<tr>
								<td class='col1'> <?php echo ++$i ?> </td>
								<td>Học phí</td>
								<td> <?php echo $row['TenHK'] ?> </td>
								<td> <?php echo $row['SUM(monhoc.Sotinchi*Giatin)'] ?> </td>
							</tr>
					<?php
						}
					}
					?>
					<tr>
						<td></td>
						<td></td>
						<td>Tổng:</td>
						<th>
							<?php
							// print_r($data);
							if (isset($data_dadong) && $data_dadong != null) {
								while ($row = mysqli_fetch_array($data_dadong)) {
									echo $row['Phaidong'];
							?>
						</th>
					</tr>
					<tr>
						<td></td>
						<td></td>
						<td>Đã đóng:</td>
						<th> <?php echo $row['Dadong']; ?> </th>
					</tr>
					<tr>
						<td></td>
						<td></td>
						<td>Còn phải đóng:</td>
						<th>
							<?php echo $row['ConNo']; ?>
						</th>
					</tr>
			<?php
								}
							}
			?>
				</tbody>
			</table>
		</div>

	</form>
	<div class="tacvu">
		<form action="./Donghoc.php?masv=<?PHP echo $masv ?>>" method="">
			<?php
			$masv = $_GET['masv'];
			?>
			<div>
				<div class="input-group-prepend">
					<span class="input-group-text">Nhập số tiền đóng</span>
					<input name="txtDongtien" style="width: 39.5%;" placeholder="money in here =)">
					<input value="<?php echo $masv ?>" name="masv" hidden>
					<input hidden name="ngaydong" value="<?php echo date('Y-m-d'); ?>">
					<div class="input-group-append">
					<button name="dongtien" class="btn btn-success" type="submit">Đóng tiển</button>
				</div>
				</div>
				<br>
				<div class="input-group-prepend" style="margin-left: 7%;">
					<span class="input-group-text">Ghi chú</span>
					<input type="text" name="note" style="width: 50%;" placeholder="note">
				</div>
				
			</div>
		</form>
		<br>
		<form class="bienlai-btn" action="./BienlaiSV.php?masv=<?php echo '$masv' ?>">
			<button class="btn btn-success" id="BL" name="bienlai">xem bien lai</button>
			<input class='form-control' value="<?php echo $masv ?>" name="masv" hidden>
		</form>
	</div>
</body>

</html>