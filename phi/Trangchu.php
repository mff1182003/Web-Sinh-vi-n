<?php
$con = mysqli_connect('localhost', 'root', '', 'quanlyhocphi') or die('Lỗi kết nối');
$tdn = '';
$mk = '';
if (isset($_POST['btnDangnhap'])) {
	$tdn = $_POST['txtTendn'];
	$mk = $_POST['txtMatkhau'];
	$sql1 = "SELECT * FROM sinhvien WHERE MaSV ='$tdn' AND MaSV='$mk'";
	$data1 = mysqli_query($con, $sql1);
	$sql = "SELECT * FROM taikhoan WHERE Tendangnhap = '$tdn' AND Matkhau ='$mk'";
	$data = mysqli_query($con, $sql);
	if (mysqli_num_rows($data) > 0) {
		header("location: TrangchuAdmin.php?Tendangnhap={$tdn}");
		exit;
	} elseif (mysqli_num_rows($data1) > 0) {
		header("location: TrangchuSinhvien.php?masv={$tdn}");
		exit;
	} else echo " <script> alert('Tài khoản hoặc mật khẩu không đúng') </script> ";
}
mysqli_close($con);
?>
<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Trang chủ đăng nhập</title>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css">
	<link rel="stylesheet" href="./css/style.css" />
	<link rel="stylesheet" href="./css/login_trangchu.css" />
</head>

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
			<button onclick="document.getElementById('id01').style.display='block'" style="background-color: #23232e; width: 100px; margin-right: 10%; font-size: 20px;">
				<i class="fa-solid fa-circle-user fa-bounce" style="color: #f1e0e0;"> Login </i></a>
			</button>
		</div>
	</div>
	<div class="space">
	</div>

		<!-- LOGIN -->
	<div id="id01" class="modal">
		<form class="modal-content animate" action="" method="post">
			<div class="imgcontainer">
				<span onclick="document.getElementById('id01').style.display='none'" class="close" title="Close Modal">&times;</span>
				<img src="/phi/picture/login.svg" alt="Avatar" class="avatar">
			</div>

			<div class="container">
				<label for="uname"><b>Username</b></label>
				<input type="text" placeholder="Enter Username" type="text" name="txtTendn" <?php echo "$tdn" ?> required>

				<label for="psw"><b>Password</b></label>
				<input type="password" placeholder="Enter Password" name="txtMatkhau" <?php echo "$mk" ?> required>

				<input class="btn btn-success" type="submit" name="btnDangnhap" value="Đăng nhập">
				<label style="margin-left: 50%;">
					<input type="checkbox" checked="checked" name="remember"> Remember me
				</label>
			</div>

			<div class="containerf">
				<button type="button" onclick="document.getElementById('id01').style.display='none'" class="cancelbtn">Cancel</button>
				<span class="psw">Forgot <a href="#">password?</a></span>
			</div>
		</form>
	</div>

		<!-- MENU -->
	<nav class="navbar">
		<ul class="navbar-nav">
			<li class="logo">
				<a href="./picture/main1.png" target="aaa" class="nav-link">
					<span class="link-text logo-text">HOME</span>
					<svg aria-hidden="true" focusable="false" data-prefix="fad" data-icon="angle-double-right" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" class="svg-inline--fa fa-angle-double-right fa-w-14 fa-5x">
						<g class="fa-group">
							<path fill="currentColor" d="M224 273L88.37 409a23.78 23.78 0 0 1-33.8 0L32 386.36a23.94 23.94 0 0 1 0-33.89l96.13-96.37L32 159.73a23.94 23.94 0 0 1 0-33.89l22.44-22.79a23.78 23.78 0 0 1 33.8 0L223.88 239a23.94 23.94 0 0 1 .1 34z" class="fa-secondary"></path>
							<path fill="currentColor" d="M415.89 273L280.34 409a23.77 23.77 0 0 1-33.79 0L224 386.26a23.94 23.94 0 0 1 0-33.89L320.11 256l-96-96.47a23.94 23.94 0 0 1 0-33.89l22.52-22.59a23.77 23.77 0 0 1 33.79 0L416 239a24 24 0 0 1-.11 34z" class="fa-primary"></path>
						</g>
					</svg>
				</a>
			</li>
		</ul>
	</nav>

	<main>
		<iframe src="./picture/main1.png" name="aaa" frameborder="0"></iframe>
	</main>


	<script>
		// Get the modal
		var modal = document.getElementById('id01');

		// When the user clicks anywhere outside of the modal, close it
		window.onclick = function(event) {
			if (event.target == modal) {
				modal.style.display = "none";
			}
		}
	</script>
</body>

</html>