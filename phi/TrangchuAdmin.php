<?php
 $tendn=$_GET['Tendangnhap'];
$con=mysqli_connect('localhost','root', '','quanlyhocphi') or die ('Lỗi kết nối');
$sql1 = "SELECT * FROM taikhoan WHERE Tendangnhap = '$tendn'";
$data1=mysqli_query($con,$sql1);
mysqli_close($con);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin</title>
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
				echo "Xin chào, ". $row['Tendangnhap'];
            }
        }
        ?>
		</div>
		</div>
	</div>
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
				<a href="./toan/list.php" target="aaa" class="nav-link">
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
				  <span class="link-text">SINH VIÊN</span>
				</a>
			  </li>
		
			  <li class="nav-item">
				<a href="./Lop/hmm.php" target="aaa" class="nav-link">
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
				  <span class="link-text">LỚP HỌC</span>
				</a>
			  </li>
		
			  <li class="nav-item">
				<a href="./Nganh/ListNganh.php" target="aaa" class="nav-link">
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
				  <span class="link-text">NGÀNH HỌC</span>
				</a>
			  </li>
		
			  <li class="nav-item">
				<a href="./Mon/ListSj.php" target="aaa" class="nav-link">
				  <svg
					role="img"
					xmlns="http://www.w3.org/2000/svg"
					viewBox="0 0 576 512"
				  >
					<g class="fa-group">
					  <path
						fill="currentColor"
						d="M249.6 471.5c10.8 3.8 22.4-4.1 22.4-15.5V78.6c0-4.2-1.6-8.4-5-11C247.4 52 202.4 32 144 32C93.5 32 46.3 45.3 18.1 56.1C6.8 60.5 0 71.7 0 83.8V454.1c0 11.9 12.8 20.2 24.1 16.5C55.6 460.1 105.5 448 144 448c33.9 0 79 14 105.6 23.5zm76.8 0C353 462 398.1 448 432 448c38.5 0 88.4 12.1 119.9 22.6c11.3 3.8 24.1-4.6 24.1-16.5V83.8c0-12.1-6.8-23.3-18.1-27.6C529.7 45.3 482.5 32 432 32c-58.4 0-103.4 20-123 35.6c-3.3 2.6-5 6.8-5 11V456c0 11.4 11.7 19.3 22.4 15.5z"
						class="fa-primary"
					  ></path>
					</g>
				  </svg>
				  <span class="link-text">MÔN HỌC</span>
				</a>
			  </li>
			  
			  <li class="nav-item">
				<a href="./HKy/ListHK.php" target="aaa" class="nav-link">
				  <svg
					role="img"
					xmlns="http://www.w3.org/2000/svg"
					viewBox="0 0 512 512"
					class="svg-inline--fa fa-space-shuttle fa-w-20 fa-5x"
				  >
					<g class="fa-group">
					  <path
						fill="currentColor"
						d="M498.1 5.6c10.1 7 15.4 19.1 13.5 31.2l-64 416c-1.5 9.7-7.4 18.2-16 23s-18.9 5.4-28 1.6L284 427.7l-68.5 74.1c-8.9 9.7-22.9 12.9-35.2 8.1S160 493.2 160 480V396.4c0-4 1.5-7.8 4.2-10.7L331.8 202.8c5.8-6.3 5.6-16-.4-22s-15.7-6.4-22-.7L106 360.8 17.7 316.6C7.1 311.3 .3 300.7 0 288.9s5.9-22.8 16.1-28.7l448-256c10.7-6.1 23.9-5.5 34 1.4z"
						class="fa-primary"
					  ></path>
					</g>
				  </svg>
				  <span class="link-text">HỌC KỲ</span>
				</a>
			  </li>

			  <li class="nav-item">
				<a href="./Dongia/indexCost.php" target="aaa" class="nav-link">
				  <svg
				  	height="40px"
					role="img"
					xmlns="http://www.w3.org/2000/svg"
					viewBox="0 0 320 512"
					class="svg-inline--fa fa-space-shuttle fa-w-20 fa-5x"
				  >
					<g class="fa-group">
					  <path
						fill="currentColor"
						d="M160 0c17.7 0 32 14.3 32 32V67.7c1.6 .2 3.1 .4 4.7 .7c.4 .1 .7 .1 1.1 .2l48 8.8c17.4 3.2 28.9 19.9 25.7 37.2s-19.9 28.9-37.2 25.7l-47.5-8.7c-31.3-4.6-58.9-1.5-78.3 6.2s-27.2 18.3-29 28.1c-2 10.7-.5 16.7 1.2 20.4c1.8 3.9 5.5 8.3 12.8 13.2c16.3 10.7 41.3 17.7 73.7 26.3l2.9 .8c28.6 7.6 63.6 16.8 89.6 33.8c14.2 9.3 27.6 21.9 35.9 39.5c8.5 17.9 10.3 37.9 6.4 59.2c-6.9 38-33.1 63.4-65.6 76.7c-13.7 5.6-28.6 9.2-44.4 11V480c0 17.7-14.3 32-32 32s-32-14.3-32-32V445.1c-.4-.1-.9-.1-1.3-.2l-.2 0 0 0c-24.4-3.8-64.5-14.3-91.5-26.3c-16.1-7.2-23.4-26.1-16.2-42.2s26.1-23.4 42.2-16.2c20.9 9.3 55.3 18.5 75.2 21.6c31.9 4.7 58.2 2 76-5.3c16.9-6.9 24.6-16.9 26.8-28.9c1.9-10.6 .4-16.7-1.3-20.4c-1.9-4-5.6-8.4-13-13.3c-16.4-10.7-41.5-17.7-74-26.3l-2.8-.7 0 0C119.4 279.3 84.4 270 58.4 253c-14.2-9.3-27.5-22-35.8-39.6c-8.4-17.9-10.1-37.9-6.1-59.2C23.7 116 52.3 91.2 84.8 78.3c13.3-5.3 27.9-8.9 43.2-11V32c0-17.7 14.3-32 32-32z"
						class="fa-primary"
					  ></path>
					</g>
				  </svg>
				  <span class="link-text">HỌC PHÍ</span>
				</a>
			  </li>

			  <li class="nav-item">
				<a href="./hienthiNO.php" target="aaa" class="nav-link">
				  <svg
					role="img"
					xmlns="http://www.w3.org/2000/svg"
					viewBox="0 0 576 512"
					class="svg-inline--fa fa-space-shuttle fa-w-20 fa-5x"
				  >
					<g class="fa-group">
					  <path
						fill="currentColor"
						d="M64 64C28.7 64 0 92.7 0 128V384c0 35.3 28.7 64 64 64H512c35.3 0 64-28.7 64-64V128c0-35.3-28.7-64-64-64H64zM272 192H496c8.8 0 16 7.2 16 16s-7.2 16-16 16H272c-8.8 0-16-7.2-16-16s7.2-16 16-16zM256 304c0-8.8 7.2-16 16-16H496c8.8 0 16 7.2 16 16s-7.2 16-16 16H272c-8.8 0-16-7.2-16-16zM164 152v13.9c7.5 1.2 14.6 2.9 21.1 4.7c10.7 2.8 17 13.8 14.2 24.5s-13.8 17-24.5 14.2c-11-2.9-21.6-5-31.2-5.2c-7.9-.1-16 1.8-21.5 5c-4.8 2.8-6.2 5.6-6.2 9.3c0 1.8 .1 3.5 5.3 6.7c6.3 3.8 15.5 6.7 28.3 10.5l.7 .2c11.2 3.4 25.6 7.7 37.1 15c12.9 8.1 24.3 21.3 24.6 41.6c.3 20.9-10.5 36.1-24.8 45c-7.2 4.5-15.2 7.3-23.2 9V360c0 11-9 20-20 20s-20-9-20-20V345.4c-10.3-2.2-20-5.5-28.2-8.4l0 0 0 0c-2.1-.7-4.1-1.4-6.1-2.1c-10.5-3.5-16.1-14.8-12.6-25.3s14.8-16.1 25.3-12.6c2.5 .8 4.9 1.7 7.2 2.4c13.6 4.6 24 8.1 35.1 8.5c8.6 .3 16.5-1.6 21.4-4.7c4.1-2.5 6-5.5 5.9-10.5c0-2.9-.8-5-5.9-8.2c-6.3-4-15.4-6.9-28-10.7l-1.7-.5c-10.9-3.3-24.6-7.4-35.6-14c-12.7-7.7-24.6-20.5-24.7-40.7c-.1-21.1 11.8-35.7 25.8-43.9c6.9-4.1 14.5-6.8 22.2-8.5V152c0-11 9-20 20-20s20 9 20 20z"
						class="fa-primary"
					  ></path>
					</g>
				  </svg>
				  <span class="link-text">THỐNG KÊ HỌC PHÍ</span>
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
	<iframe src="./picture/main1.png" name="aaa" frameborder="0"></iframe>
  </main>
</body>
</html>