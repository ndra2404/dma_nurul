<!-- import excel ke mysql -->

<?php 
// menghubungkan dengan koneksi
include 'koneksi.php';
?>

<?php
 if (isset($_POST['upload'])) {
  $query=mysqli_query($koneksi,"truncate table tbl_penjualan");
  require('spreadsheet-reader-master/php-excel-reader/excel_reader2.php');
  require('spreadsheet-reader-master/SpreadsheetReader.php');

  //upload data excel kedalam folder uploads
  $target_dir = "uploads/".basename($_FILES['dataforecasting']['name']);
  
  move_uploaded_file($_FILES['dataforecasting']['tmp_name'],$target_dir);

  $Reader = new SpreadsheetReader($target_dir);

  foreach ($Reader as $Key => $Row)
  {
   // import data excel mulai baris ke-2 (karena ada header pada baris 1)
   if ($Key < 1) continue;   
   $query=mysqli_query($koneksi,"INSERT INTO tbl_penjualan(periode,item,value) VALUES ('$Row[0]', '$Row[1]','$Row[2]')");
  }
  if ($query) {
    echo "Import data berhasil";
   }else{
    echo mysqli_error($koneksi);
   }
 }
 ?>
<?php
// hapus kembali file .xls yang di upload tadi
unlink($_FILES['dataforecasting']['name']);

// alihkan halaman ke index.php
header("location:upload.php");
?>