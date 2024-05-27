<?php
session_start();
include "../../config/koneksi.php";
$act=$_GET[act];
$date=date ('d/m/Y');
$time=date ('h:i A');

if($act=='status'){
if($_GET[beku]=='beku'){
  $query1=mysql_query("UPDATE bukutamu SET status='N' WHERE id_bukutm='$_GET[id_bk]'");
   echo "<script>window.location=('../index.php?aksi=buku_tamu')</script>";
   }else{
   $query2=mysql_query("UPDATE bukutamu SET status='Y' WHERE id_bukutm='$_GET[id_bk]'");
   echo "<script>window.location=('../index.php?aksi=buku_tamu')</script>";
        }
  }
elseif($act=='balas'){
  $query1=mysql_query("UPDATE bukutamu SET admin='$_SESSION[nama]',jawab='$_POST[jw]',tgl='$date' WHERE id_bukutm='$_GET[id_bk]'");
  echo "<script>window.location=('../index.php?aksi=buku_tamu')</script>";
}
elseif($act=='hapus'){
mysql_query("DELETE FROM bukutamu WHERE id_bukutm='$_GET[id_bk]'");
  echo "<script>window.location=('../index.php?aksi=buku_tamu')</script>";
}



?>
