<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
	<link rel="stylesheet " href="./css_bootstrap.min.css"> 
    <style type="text/css">
		.wrapper{
			width: 960px;
			margin: 0px auto;
			background: #DBDBDB;
			font-size: 14px;
			line-height: 1.5 line;
		}
		header{
			height: 130px;
			background:#e9ecef;
		}
		h1{text-align: center;}
		.nav-menu ul{
			height: 50px;
			background: #00f3ff;
		}
		a{text-decoration: none; 
			color: white;}
		.nav-menu>ul>li{
			float: left;
			list-style: none;
			padding: 10px 60px;
		} 
		.nav-menu>ul>li:hover{
			display: block;
			background:#17a2b8;
		}
		*{
		margin:0px;
		padding: 0px;
		font-family:TimeNewRoman; 
		font-size: 20px;
		color:black;
		}
		.article{
			width: 20%;
			color: black;
			float: left;
			height: 450px;
		}
		.article>ul{padding: 0px;}
		.article>ul>li{
			list-style: none;
			padding: 10px 5px;
			border: #17a2b8 dotted 1px;
			
		}
		.article>ul>li:hover{
			display: block;
			background: #17a2b8;
		}
		table{width: 80%;padding-top: 20px;
		}
		.col1{
			width: 20%;
			text-align: left;
			height: 25px;
			padding: 5px 35px;
		}
		.col2{
			width: 55%;
			text-align: left;
			height: 25px;
			padding: 5px;
		}
		.aside{
			height: 400px;
			background-color:#17a2b8;
		}
		.footer{
			height: 70px;
			background: #4f3590;
		}
		.dd1{
			width: 250px;
			height: 20px;
		}
		tr{height: 40px}
		.dd2{
			width: 30%;
			padding-left: 80px;
			font-size: 18px;
		}
		.dd3{
			width: 70%;
		}
		
	</style>
</head>
<body>
		<header>
			<img src="./picture/logo-fit.png" alt="" height="70px" width = "250px">
			<h2 align = center>Website Quản lý thu học phí</h2>
		</header>
		<div class="nav-menu">
			<ul >
				<li ><a href="http://localhost/QuanlyHocphi/TrangchuAdmin.php">Trang chủ</a></li>
				<li ><a href="http://localhost/QuanlyHocphi/Trangchu.php">Thoát</a></li>
				<li ><a href="">Liên hệ</a></li>
			</ul>
	    </div>
		<div class="article">
			<ul class="list-group">
				<li class="list-group-item list-group-item-action list-group-item-warning"><a href="">Danh sách ngành học</a></li>
				<li class="list-group-item list-group-item-action list-group-item-warning"><a href="">Danh sách môn học</a></li>
				<li class="list-group-item list-group-item-action list-group-item-warning"><a href="">Danh sách lớp học</a></li>
				<li class="list-group-item list-group-item-action list-group-item-warning"><a href="">Danh sách sinh viên</a></li>
				<li class="list-group-item list-group-item-action list-group-item-warning"><a href="">Danh sách học kỳ</a></li>
				<li class="list-group-item list-group-item-action list-group-item-warning"><a href="">Cập nhật học phí</a></li>
				<li class="list-group-item list-group-item-action list-group-item-warning"><a href="">Thống kê học phí  </a></li>
			</ul>
		</div>
</body>
</html>