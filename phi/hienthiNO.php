<?php
$connect = mysqli_connect('localhost', 'root', '', 'quanlyhocphi')
or die('loi let noi roi huhu');


$sql = " SELECT *
            FROM thuno, sinhvien
            WHERE thuno.Masv = sinhvien.MaSV";

$sqltest = "SELECT sinhvien.*, SUM(monhoc.Sotinchi*dongia.Giatin) 
AS Phaidong
FROM sinhvien, lop, nganh, monhoc, dongia, thuno
WHERE thuno.MaSV=sinhvien.MaSV
AND sinhvien.MaLop=lop.MaLop 
AND lop.MaNganh=nganh.Manganh 
AND nganh.Manganh=monhoc.MaNganh 
AND monhoc.MaMon=dongia.MaMon 
GROUP BY sinhvien.MaSV
";
$dataPhaidong = mysqli_query($connect, $sqltest);

$sqlphaidong = "UPDATE thuno 
SET Phaidong = (SELECT SUM(monhoc.Sotinchi*dongia.Giatin) 
    FROM sinhvien, lop, nganh, monhoc, dongia 
        WHERE thuno.MaSV=sinhvien.MaSV
            AND sinhvien.MaLop=lop.MaLop 
            AND lop.MaNganh=nganh.Manganh 
            AND nganh.Manganh=monhoc.MaNganh 
            AND monhoc.MaMon=dongia.MaMon 
            )
WHERE EXISTS (SELECT * FROM sinhvien, lop, nganh, monhoc, dongia ,thuno
    WHERE sinhvien.MaLop=lop.MaLop 
        AND lop.MaNganh=nganh.Manganh 
        AND nganh.Manganh=monhoc.MaNganh 
        AND monhoc.MaMon=dongia.MaMon 
        AND thuno.MaSV=sinhvien.MaSV)";
$datas = mysqli_query($connect, $sqlphaidong);

$sqlconno="UPDATE thuno Set ConNo = Phaidong- Dadong";
$dataconno=mysqli_query($connect,$sqlconno);

$data = mysqli_query($connect, $sql);

if (isset($_POST['btntim'])) 
{
    $HK = $_POST['txtHK'];
    $NG= $_POST['txtNganh'];

    $sqlHK_NG="SELECT * FROM thuno, sinhvien, dongia, lop, monhoc
    WHERE thuno.MaSV = sinhvien.MaSV
    AND sinhvien.MaLop = lop.MaLop 
    AND lop.MaNganh = monhoc.Manganh
    
    AND monhoc.MaMon = dongia.MaMon 
    
    AND monhoc.Manganh = '$NG'
    AND monhoc.MaHK = '$HK' 
    GROUP BY thuno.MaSV
    ";

    $sqlTim = "SELECT sinhvien.*, SUM(monhoc.Sotinchi*dongia.Giatin) AS Phaidong
    FROM sinhvien, lop, monhoc, dongia, thuno
    WHERE thuno.MaSV=sinhvien.MaSV
    AND sinhvien.MaLop=lop.MaLop 
    AND lop.MaNganh=monhoc.Manganh 
    
    AND monhoc.MaMon=dongia.MaMon 
    AND monhoc.MaHK = '$HK'
    AND monhoc.Manganh = '$NG'
    GROUP BY sinhvien.MaSV";

    $dataTim = mysqli_query($connect, $sqlTim);

    $sqlHK_ng_phaidong="UPDATE thuno 
    SET Phaidong = (SELECT SUM(monhoc.Sotinchi*dongia.Giatin) 
        FROM sinhvien, lop, monhoc, dongia 
        WHERE thuno.MaSV=sinhvien.MaSV
            AND sinhvien.MaLop=lop.MaLop 
            AND lop.MaNganh=monhoc.Manganh 
             
            AND monhoc.MaMon=dongia.MaMon 
            AND monhoc.Manganh = '$NG'
            AND monhoc.MaHK = '$HK')
    WHERE EXISTS (SELECT * FROM sinhvien, lop, nganh, monhoc, dongia ,thuno
        WHERE sinhvien.MaLop=lop.MaLop 
            AND lop.MaNganh=monhoc.Manganh 
            
            AND monhoc.MaMon=dongia.MaMon 
            AND thuno.MaSV=sinhvien.MaSV)";
    $dataHK_Ng = mysqli_query($connect, $sqlHK_ng_phaidong);

    $sqlconnoHK="UPDATE thuno Set ConNo = Phaidong- Dadong";
    $dataconnoHK=mysqli_query($connect,$sqlconnoHK);

    $dataHK_NG=mysqli_query($connect,$sqlHK_NG);

    
    
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/MVC/public/Css/about.css">
     <!-- Latest compiled and minified CSS -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Latest compiled JavaScript -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"></script>


<style>
    .divcb{
        width: 500px;
    }
    .body {
        background-image: image-set(logo-utt);
       
    }
    .btn_BL{
        float: right;
    }
    #BL{
        color: white;
    }
</style>
</head>
<body class="body">
<div class="par-title">
    <div class="con-title">
        <img height="200" width="200" src="/public/img/logo-utt-border.png" alt="anh truong cngtvt">
    </div>
    <div align="center" class="con-title">
        <h1>
            Thống Kê Nợ
        </h1>
    </div>
    </div>
    <form action="" method="POST">

        <div class="divcb">
            <p>nhap thông tin cần tìm kiếm</p>
            <div class="input-group mb-3">
                <input type="text" class="form-control" name="txtHK" placeholder="HỌC kỲ">
                <input type="text" class="form-control" name="txtNganh" placeholder="NGÀNH">
                <button class="btn btn-success" name="btntim" type="submit">tìm kiếm</button>
                <button class="btn btn_BL btn-success" name ="btn_BL" type=""><a id="BL" href="./bienlai-excel/bienlai.php">Biên Lai</a></button>
               
            </div>
        </div>
    <div>
    <table class="table">
    <thead class="table-success">
      <tr>
        <th>mã sinh viên</th>
        <th>tên sinh viên</th>
        <th>đã đóng</th>
        <th>phải đóng</th>
        <th>còn nợ</th>
      </tr>
    </thead>
    <tbody class="table-success">
                        <?php
                        if (isset($dataHK_NG) && $dataHK_NG != null) {
                            while ($rows = mysqli_fetch_array($dataHK_NG)) {
                        
                        ?>
                                <tr>
                                    <td><?php echo $rows['MaSV'] ?></td>
                                    <td><?php echo $rows['TenSV'] ?></td>
                                    <td><?php echo $rows['Dadong'] ?></td>
                                    <td><?php echo $rows['Phaidong']?></td>
                                    <td><?php echo $rows['ConNo']?></td>
                                </tr>
                        <?php
                            
                            }
                        }
                        ?>
    </tbody>
                </table>

    
  </table>
        </div>
        <div>
                <table class="table">
    <thead class="table-success">
      <tr>
        <th>mã sinh viên</th>
        <th>tên sinh viên</th>
        <th>đã đóng</th>
        <th>phải đóng</th>
        <th>còn nợ</th>
      </tr>
    </thead>
    <tbody class="table-success">
                        <?php
                        if (isset($data) && $data != null) {
                            while ($rows = mysqli_fetch_assoc($data)) {
                        
                        ?>
                                <tr>
                                    <td><?php echo $rows['MaSV'] ?></td>
                                    <td><?php echo $rows['TenSV'] ?></td>
                                    <td><?php echo $rows['Dadong'] ?></td>
                                    <td><?php echo $rows['Phaidong']?></td>
                                    <td><?php echo $rows['ConNo']?></td>
                                </tr>
                        <?php
                            
                            }
                        }
                        ?>
    </tbody>
                </table>

    
  </table>
        </div>
    </form>
</body>
<script src="/MVC/Models/js/" type="text/javascript"></script>
</html>