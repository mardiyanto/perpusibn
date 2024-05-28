
<?php
include "../../config/koneksi.php";
$act=$_GET[act];
$date=date ('d/m/Y');
$time=date ('h:i A');

if($act=='inputbanner'){
if (empty($_POST[lk])){
 echo "<script>window.alert('Data yang Anda isikan belum lengkap');
        window.location=('javascript:history.go(-1)')</script>";
     }else{
	 
$lokasi_file=$_FILES[gambar][tmp_name];
if(empty($lokasi_file)){
echo "<script>window.alert('File gambar masih kosong');
        window.location=('javascript:history.go(-1)')</script>";
}else{
$tanggal=date("dmYhis");
$file=$_FILES['gambar']['tmp_name'];
$file_name=$_FILES['gambar']['name'];
copy($file,"../../foto/foto_banner/".$tanggal.".jpg");
mysql_query("insert into banner (url,gambar) values ('$_POST[lk]','$tanggal.jpg')");
   
echo "<script>window.location=('../index.php?aksi=banner')</script>";
   }
  } 
}

elseif($act=='editbanner'){
if (empty($_POST[lk])){
 echo "<script>window.alert('Data yang Anda isikan belum lengkap');
        window.location=('javascript:history.go(-1)')</script>";
     }else{
	 
$lokasi_file=$_FILES[gambar][tmp_name];
if(empty($lokasi_file)){
mysql_query("UPDATE banner SET url='$_POST[lk]' WHERE id_banner='$_GET[id_b]'");
echo "<script>window.location=('../index.php?aksi=banner')</script>";
}else{
$a=$_GET['gb'];
$file=$_FILES['gambar']['tmp_name'];
$file_name=$_FILES['gambar']['name'];
copy($file,"../../foto/foto_banner/".$a);
mysql_query("UPDATE banner SET url='$_POST[lk]' WHERE id_banner='$_GET[id_b]'");
echo "<script>window.location=('../index.php?aksi=banner')</script>";
   }
  } 
}

elseif($act=='hapus'){
mysql_query("DELETE FROM banner WHERE id_banner='$_GET[id_b]'");
$b=$_GET['gbr'];
$pathFile="../../foto/foto_banner/$b";	   
unlink($pathFile);

echo "<script>window.location=('../index.php?aksi=banner')</script>";
}
?>
