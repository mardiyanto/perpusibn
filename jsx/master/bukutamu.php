<?php
session_start();
include "../../config/koneksi.php";
$act=$_GET[act];
$date=date ('d/m/Y');
$time=date ('h:i A');

if($act=='status'){
if($_GET[beku]=='beku'){
  $query1=mysql_query("UPDATE komentar SET status='N' WHERE id_tamu='$_GET[id_bk]'");
   echo "<script>window.location=('../index.php?aksi=bukutamu')</script>";
   }else{
   $query2=mysql_query("UPDATE komentar SET status='Y' WHERE id_tamu='$_GET[id_bk]'");
   echo "<script>window.location=('../index.php?aksi=bukutamu')</script>";
        }
  }
 
elseif($act=='balas'){
  $query1=mysql_query("UPDATE komentar SET admin='$_SESSION[nama]',jawab='$_POST[jw]',tanggal='$date' WHERE id_tamu='$_GET[id_bk]'");
  echo "<script>window.location=('../index.php?aksi=bukutamu')</script>";
}


elseif($act=='hapus'){
mysql_query("DELETE FROM komentar WHERE id_tamu='$_GET[id_bk]'");
  echo "<script>window.location=('../index.php?aksi=bukutamu')</script>";
}



?>
