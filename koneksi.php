<?php
$koneksi = mysqli_connect("localhost","root","","db_dma_nurul");
//mysqli_select_db("penggajian");

//fungsi format rupiah 
function format_rupiah($rp) {
	$hasil = number_format($rp, 0, "", ".") . "";
	return $hasil;
}
?>
