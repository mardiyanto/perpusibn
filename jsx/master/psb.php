
<?php
include "../../config/koneksi.php";
$act=$_GET[act];
$date=date ('d/m/Y');
$time=date ('h:i A');


if($act=='hapus'){
mysql_query("DELETE FROM pendaftaran WHERE no_daftar='$_GET[id_b]'");
echo "<script>window.location=('../index.php?aksi=psb')</script>";
}
?>
