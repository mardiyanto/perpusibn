
<?php
include "../../config/koneksi.php";
$act=$_GET[act];

if($act=='inputheader'){

	
$lokasi_file=$_FILES[gambar][tmp_name];
if(empty($lokasi_file)){
mysql_query("insert into header (judul,gambar,ket) values ('$_POST[judul]','$_POST[gambar]','$_POST[ket]')");
   
echo "<script>window.location=('../index.php?aksi=header')</script>";
}else{
$tanggal=date("dmYhis");
$file=$_FILES['gambar']['tmp_name'];
$file_name=$_FILES['gambar']['name'];
copy($file,"../../foto/header/".$tanggal.".jpg");
mysql_query("insert into header (judul,gambar,ket) values ('$_POST[judul]','$tanggal.jpg','$_POST[ket]')");
   
echo "<script>window.location=('../index.php?aksi=header')</script>";
   }
  } 




elseif($act=='editheader'){
$lokasi_file=$_FILES[gambar][tmp_name];
if(empty($lokasi_file)){

echo "<script>window.location=('../index.php?aksi=header')</script>";

}else{
$a=$_GET['gb'];
$file=$_FILES['gambar']['tmp_name'];
$file_name=$_FILES['gambar']['name'];
copy($file,"../../foto/header/".$a);
echo "<script>window.location=('../index.php?aksi=header')</script>";

   }
  } 

  
  
elseif($act=='hapus'){
mysql_query("DELETE FROM header WHERE id_header='$_GET[id_h]'");
$b=$_GET['gbr'];
$pathFile="../../foto/header/$b";	   
unlink($pathFile);

echo "<script>window.location=('../index.php?aksi=header')</script>";
}
?>
