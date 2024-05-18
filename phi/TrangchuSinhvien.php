<?php
$masv=$_GET['masv'];
$con=mysqli_connect('localhost','root', '','quanlyhocphi') or die ('Lỗi kết nối');
$sql1 = "select *  from sinhvien, nganh, lop where sinhvien.MaLop=lop.MaLop and lop.Manganh=nganh.Manganh and MaSV ='$masv'";
$data1=mysqli_query($con,$sql1);
$sql="Select MaSV, MaMon, TenMon, Sotinchi FROM sinhvien, lop, nganh, monhoc WHERE sinhvien.MaLop=lop.MaLop and lop.MaNganh=nganh.Manganh and nganh.Manganh=monhoc.MaNganh and MaSV='$masv'";
$data=mysqli_query($con,$sql);
mysqli_close($con);
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Sinh viên</title>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css">
  	<link rel="stylesheet" href="./css/style.css" />
</head>
<style type="text/css">
	.name-user{
		margin-right: 8%;
		color: #f1e0e0;
		font-size: 20px;
		font-family: 'Courier New', Courier, monospace;
	}
</style>
<body>
	<!-- header -->
<div class="fixed">
<header>
	<div class="header-sup">
		<strong style="color: #9eb82b;">Support: </strong>
		<a href="" style="color:white !important;">support@st.utt.edu.vn</a>
	</div>		
</header>
<div class="nav-menu">
	<div class="imgl">
		<img src="/phi/picture/Picture1.png" class="imglogo" alt="Trường Đại Học Công Nghệ Giao Thông Vận Tải">
	</div>
	<div class="name-user">
		<?php
        // print_r($data);
        if ($data1->num_rows > 0) {
			while ($row = $data1->fetch_assoc()) {
				echo $row['MaSV'] . " - " . $row['TenSV'];
            }
        }
        ?>
		</div>
</div>
</div>

<!-- MENU -->
<div class="space">
</div>
<nav class="navbar">
	<ul class="navbar-nav">
		<li class="logo">
			<a href="./picture/main1.png" target="aaa" class="nav-link">
				<span class="link-text logo-text">HOME</span>
				<svg
				aria-hidden="true"
				focusable="false"
				data-prefix="fad"
				data-icon="angle-double-right"
				role="img"
				xmlns="http://www.w3.org/2000/svg"
				viewBox="0 0 448 512"
				class="svg-inline--fa fa-angle-double-right fa-w-14 fa-5x"
				>
				<g class="fa-group">
					<path
					fill="currentColor"
					d="M224 273L88.37 409a23.78 23.78 0 0 1-33.8 0L32 386.36a23.94 23.94 0 0 1 0-33.89l96.13-96.37L32 159.73a23.94 23.94 0 0 1 0-33.89l22.44-22.79a23.78 23.78 0 0 1 33.8 0L223.88 239a23.94 23.94 0 0 1 .1 34z"
					class="fa-secondary"
					></path>
			  <path
				fill="currentColor"
				d="M415.89 273L280.34 409a23.77 23.77 0 0 1-33.79 0L224 386.26a23.94 23.94 0 0 1 0-33.89L320.11 256l-96-96.47a23.94 23.94 0 0 1 0-33.89l22.52-22.59a23.77 23.77 0 0 1 33.79 0L416 239a24 24 0 0 1-.11 34z"
				class="fa-primary"
			  ></path>
			</g>
		  </svg>
		</a>
	  </li>

	  <li class="nav-item">
		<a href="./TrangchuSinhvien.php?masv=<?php echo "$masv" ?>" target="_self" class="nav-link">
		<svg 
		xmlns="http://www.w3.org/2000/svg" 
		viewBox="0 0 448 512"
		class="sgv-inline--fa fa-solid fa-user-graduate">
		<g class="fa-group">
			<path
			  fill="currentColor"
			  d="M219.3 .5c3.1-.6 6.3-.6 9.4 0l200 40C439.9 42.7 448 52.6 448 64s-8.1 21.3-19.3 23.5L352 102.9V160c0 70.7-57.3 128-128 128s-128-57.3-128-128V102.9L48 93.3v65.1l15.7 78.4c.9 4.7-.3 9.6-3.3 13.3s-7.6 5.9-12.4 5.9H16c-4.8 0-9.3-2.1-12.4-5.9s-4.3-8.6-3.3-13.3L16 158.4V86.6C6.5 83.3 0 74.3 0 64C0 52.6 8.1 42.7 19.3 40.5l200-40zM111.9 327.7c10.5-3.4 21.8 .4 29.4 8.5l71 75.5c6.3 6.7 17 6.7 23.3 0l71-75.5c7.6-8.1 18.9-11.9 29.4-8.5C401 348.6 448 409.4 448 481.3c0 17-13.8 30.7-30.7 30.7H30.7C13.8 512 0 498.2 0 481.3c0-71.9 47-132.7 111.9-153.6z"
			  class="fa-primary"
			></path>
		  </g>
	</svg>
		  <span class="link-text">THÔNG TIN CÁ NHÂN</span>
		</a>
	  </li>

	  <li class="nav-item">
		<a href="./Tracuuhocphi.php?masv=<?php echo "$masv" ?>" target="aaa" class="nav-link">
		  <svg
			xmlns="http://www.w3.org/2000/svg"
			viewBox="0 0 640 512"
			class="svg-inline--fa fa-solid fa-chalkboard-user fa-w-18 fa-9x"
		  >
			<g class="fa-group">
			  <path
				fill="currentColor"
				d="M160 64c0-35.3 28.7-64 64-64H576c35.3 0 64 28.7 64 64V352c0 35.3-28.7 64-64 64H336.8c-11.8-25.5-29.9-47.5-52.4-64H384V320c0-17.7 14.3-32 32-32h64c17.7 0 32 14.3 32 32v32h64V64L224 64v49.1C205.2 102.2 183.3 96 160 96V64zm0 64a96 96 0 1 1 0 192 96 96 0 1 1 0-192zM133.3 352h53.3C260.3 352 320 411.7 320 485.3c0 14.7-11.9 26.7-26.7 26.7H26.7C11.9 512 0 500.1 0 485.3C0 411.7 59.7 352 133.3 352z"
				class="fa-primary"
			  ></path>
			</g>
		  </svg>
		  <span class="link-text">TRA CỨU HỌC PHÍ</span>
		</a>
	  </li>

	  <li class="nav-item">
		<a href="./donghocphionline.php?masv=<?php echo "$masv" ?>" target="_self" class="nav-link">
		  <svg
			xmlns="http://www.w3.org/2000/svg"
			viewBox="0 0 512 512"
			class="svg-inline--fa fa-space-station-moon-alt fa-w-16 fa-5x"
		  >
			<g class="fa-group">
			  <path
				fill="currentColor"
				d="M184 48H328c4.4 0 8 3.6 8 8V96H176V56c0-4.4 3.6-8 8-8zm-56 8V96H64C28.7 96 0 124.7 0 160v96H192 320 512V160c0-35.3-28.7-64-64-64H384V56c0-30.9-25.1-56-56-56H184c-30.9 0-56 25.1-56 56zM512 288H320v32c0 17.7-14.3 32-32 32H224c-17.7 0-32-14.3-32-32V288H0V416c0 35.3 28.7 64 64 64H448c35.3 0 64-28.7 64-64V288z"
				class="fa-primary"
			  ></path>
			</g>
		  </svg>
		  <span class="link-text">ĐÓNG HỌC PHÍ ONLINE</span>
		</a>
	  </li>

	  <li class="nav-item" id="themeButton">
				<a href="./Trangchu.php" target="_self" class="nav-link">
				  <svg
					class="theme-icon"
					id="lightIcon"
					aria-hidden="true"
					focusable="false"
					data-prefix="fad"
					data-icon="moon-stars"
					role="img"
					xmlns="http://www.w3.org/2000/svg"
					viewBox="0 0 512 512"
					class="svg-inline--fa fa-moon-stars fa-w-16 fa-7x"
				  >
					<g class="fa-group">
					  <path
						fill="currentColor"
						d="M320 32L304 0l-16 32-32 16 32 16 16 32 16-32 32-16zm138.7 149.3L432 128l-26.7 53.3L352 208l53.3 26.7L432 288l26.7-53.3L512 208z"
						class="fa-secondary"
					  ></path>
					  <path
						fill="currentColor"
						d="M332.2 426.4c8.1-1.6 13.9 8 8.6 14.5a191.18 191.18 0 0 1-149 71.1C85.8 512 0 426 0 320c0-120 108.7-210.6 227-188.8 8.2 1.6 10.1 12.6 2.8 16.7a150.3 150.3 0 0 0-76.1 130.8c0 94 85.4 165.4 178.5 147.7z"
						class="fa-primary"
					  ></path>
					</g>
				  </svg>
				  <span class="link-text">SIGN OUT</span>
				</a>
			  </li>
	</ul>
  </nav>
  
<main>
<iframe src="./Thongtincanhan.php?masv=<?php echo "$masv"?>" name="aaa" frameborder="0">

</iframe>
</main>

</body>
</html>