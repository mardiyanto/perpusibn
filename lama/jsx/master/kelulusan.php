<?php
session_start();
include "../../config/koneksi.php";
$act=$_GET[act];
$date=date ('d/m/Y');
$time=date ('h:i A');

if($act=='status'){
if($_GET[beku]=='beku'){
  $query1=mysql_query("UPDATE tbl_nilai SET tampil='N' WHERE id_nilai='$_GET[id_bk]'");
   echo "<script>window.location=('../index.php?aksi=kelulusan')</script>";
   }else{
   $query2=mysql_query("UPDATE tbl_nilai SET tampil='Y' WHERE id_nilai='$_GET[id_bk]'");
   echo "<script>window.location=('../index.php?aksi=kelulusan')</script>";
        }
  }

elseif($act=='hapus'){
mysql_query("DELETE FROM tbl_nilai WHERE id_nilai='$_GET[id_bk]'");
  echo "<script>window.location=('../index.php?aksi=kelulusan')</script>";
}



?>
