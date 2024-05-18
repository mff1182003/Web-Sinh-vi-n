<?php 

$con=mysqli_connect('localhost','root', '','quanlyhocphi') or die ('Lỗi kết nối');
$masv=$_GET['masv'];

$sql="SELECT * FROM sinhvien Where MaSV ='$masv'";
$data=mysqli_query($con,$sql);

$sql_BL="SELECT * FROM bienlai Where MaSV = '$masv'";
$data_BL=mysqli_query($con,$sql_BL);

$sql_tong ="SELECT *, SUM(SoTien) FROM bienlai Where MaSV = '$masv'";
$data_tong= mysqli_query($con,$sql_tong);

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        td{
           padding: 15px;
        }
        .content{
           background-color: bisque;
            border: solid;
            width: 600px;
            margin-left: 30%;
            align-items: center;
        }
        .form{
            align-items: center;
            border:solid ;
            background-color: orange;
        }


    </style>
</head>
<body>
    <div class="content">
        <h1 align = "center" >Biên lai</h1>
    <form class="form" action="" >
    <div class="title">
    <table align=center>
			<tr >
				<td   align="center" height="30">
				<?php
					
						if($data->num_rows>0){
							while($row=$data->fetch_assoc()){
								echo $row['MaSV']." - ".$row['TenSV']."-". " lớp ".$row['MaLop'] ;
							}
						}
				?>
				</td>
			</tr>
		</table>
    </div>
	<div class="listBL">
    <table >
            <tr>
                <th>Số tiền</th>
                <th></th>
                <th>ngày đóng</th>
                <th></th>
                <th>ghi chú</th> 
            </tr>
        <?php
        if(isset($data_BL)){
            while($rows=mysqli_fetch_array($data_BL)){
        ?>
        <tr >
            <td> <?php echo $rows['SoTien'] ?> </td>
            <td></td>
            <td> <?php echo $rows['NgayDong'] ?> </td>
            <td></td>
            <td> <?php echo $rows['Note'] ?> </td>
            <td></td>
        </tr>
        <?php
            }
        }
        ?>
         <?php
        if(isset($data_tong)){
            while($rows=mysqli_fetch_array($data_tong)){
        ?>
        <tr >
            <td>TỔNG TIỀN = <?php echo $rows['SUM(SoTien)'] ?> VND</td> 
            <td></td>
            <td> </td>
            <td></td>
            <td> </td>
            <td></td>
        </tr>
        <?php
            }
        }
        ?>
        </table>
    </div>
		
	</form>
    </div>

</body>
</html>