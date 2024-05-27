
<?php
include "../../config/koneksi.php";
$act=$_GET[act];

if($act=='hapus'){
mysql_query("DELETE FROM pendaftaran WHERE no_daftar='$_GET[id]'"); 
echo "<script>window.location=('../index.php?aksi=siswa')</script>";
}

?>
