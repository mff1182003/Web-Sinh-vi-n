<?php
$con = mysqli_connect('localhost', 'root', '','quanlyhocphi')
or die('loi let noi roi huhu');

require '../bienlai-excel/vendor/autoload.php';
// require 'vendor/autoload.php';

use PhpOffice\PhpSpreadsheet\IOFactory;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

if (isset($_POST['btnExcel'])) {

    $spreadsheet = new Spreadsheet();
    $sheet = $spreadsheet->getActiveSheet();
    $masv= $_POST['txtmasv'];
    $sqlex = "SELECT * from bienlai";
    $data_export = mysqli_query($con, $sqlex);
    //định dạng cột tiêu đề
    $sheet->getColumnDimension('A')->setAutoSize(true);
    $sheet->getColumnDimension('B')->setAutoSize(true);
    $sheet->getColumnDimension('C')->setAutoSize(true);
    $sheet->getColumnDimension('D')->setAutoSize(true);
    $sheet->getColumnDimension('E')->setAutoSize(true);
    // $sheet->getColumnDimension('F')->setAutoSize(true);
  
    // căn lề cácc tiêu đề trong các ô
    $sheet->getStyle('A1:E1')->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
    // Tạo tiêu đề
    $sheet
        ->setCellValue('A1', 'Mã sinh viên')
        ->setCellValue('B1', 'Tên sinh viên')
        ->setCellValue('C1', 'số tiền')
        ->setCellValue('D1', 'ngày đóng')
        ->setCellValue('E1', 'Note');
        // ->setCellValue('F1', 'Tổng');
        
    // Ghi dữ liệu
    $rowCount = 2;
    foreach ($data_export as $key => $value) {
        $sheet->setCellValue('A' . $rowCount, $value['MaSV']);
        $sheet->setCellValue('B' . $rowCount, $value['TenSV']);
        $sheet->setCellValue('C' . $rowCount, $value['SoTien']);
        $sheet->setCellValue('D' . $rowCount, $value['NgayDong']);
        $sheet->setCellValue('E' . $rowCount, $value['Note']);
        // $sheet->setCellValue('F' . $rowCount, $value['SUM(SoTien)']);
       
        //căn lề cho các văn bản trong các ô thuộc mỗi hàng
$sheet->getStyle('A' . $rowCount . ':E' . $rowCount)->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
        $rowCount++;
    }

    $writer = new Xlsx($spreadsheet);
    $writer->setOffice2003Compatibility(true);
    $filename = "BienLai" . time() . ".xlsx";
    $writer->save($filename);
    header("location:" . $filename);
}

///////////////


if(isset($_POST['btnBL'])){
    $masv= $_POST['txtmasv'];

    $sql="SELECT * FROM bienlai where MaSV = '$masv'";
    $data= mysqli_query($con,$sql);
    
    $sql_tong ="SELECT *, SUM(SoTien) from bienlai where MaSV = '$masv'";
    $data_tong = mysqli_query($con,$sql_tong);
    
}else
echo "ko thay";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bien Lai</title>
         <!-- Latest compiled and minified CSS -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Latest compiled JavaScript -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"></script>
<style>
    .search{
        width:40% ;
        height: 30px;
       
    }
    .input{
        margin-bottom:100px;
        margin-left: 200px;
    }
    .title{
        margin-bottom: 100px;
        /* margin-top: 100px; */
    }
</style>
</head>
<body>
<div class="con-title img">
        <img height="200" width="200" src="/public/img/logo-utt-border.png" alt="anh truong cngtvt">
    </div>
    <div class="con-title title" align="center">
        <h1 >BIÊN LAI</h1>
    </div>
    <form method="POST" action="">
        <div class="input" > <div class="input-group mb-3 search">
                <input type="text" class="form-control" name="txtmasv" placeholder="nhập mã sinh viên">
                <button class="btn btn-success" name="btnBL" type="">tìm kiếm</button> 
                <button class="btn btn-success" name="btnExcel" type="">xuat excel</button>
    </div></div>
   
    
    <div class="container mt-3">
  <table class="table">
    <thead>
      <tr class="table-secondary">
        <th>mã sinh viên</th>
        <th>tên</th>
        <th>số tiền</th>
        <th>ngày đóng</th>
        <th>ghi chú</th>
      </tr>
    </thead>
    <tbody>
        <?php 
            if(isset($data)) {
                while($rows = mysqli_fetch_array($data)){
            ?>
                <tr >
                    <td class="table-danger"><?php echo $rows['MaSV']; ?></td>
                <td class="table-primary"><?php echo $rows['TenSV']; ?></td>
                <td class="table-info"><?php echo $rows['SoTien']; ?></td>
                <td class="table-warning"><?php echo $rows['NgayDong']; ?></td>
                <td class="table-success"><?php echo $rows['Note']; ?></td>
                
                </tr>
                
        <?php     
            }
            
        }
        ?>
        <?php 
         if(isset($data_tong)) {
            while($row = mysqli_fetch_array($data_tong)){
                ?>
            <tr>
                <th></th>
            <th></th>
            <th>tổng tiền = <?php echo $row['SUM(SoTien)']?> </th>
                </tr>
       <?php 
       }
    }
    ?>
    </tbody>
  </table>
</div>

    </form>
</body>
</html>