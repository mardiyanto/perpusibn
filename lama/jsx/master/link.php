
<?php
include "../../config/koneksi.php";
$act=$_GET[act];

if($act=='inputlink'){
if (empty($_POST[nm]) || empty($_POST[lk])){
 echo "<script>window.alert('Data yang Anda isikan belum lengkap');
        window.location=('javascript:history.go(-1)')</script>";
     }else{
	
$lokasi_file=$_FILES[gambar][tmp_name];
if(empty($lokasi_file)){
echo "<script>window.alert('File icon masih kosong');
        window.location=('javascript:history.go(-1)')</script>";
}else{
$tanggal=date("dmYhis");
$file=$_FILES['gambar']['tmp_name'];
$file_name=$_FILES['gambar']['name'];
copy($file,"../../foto/link/".$tanggal.".jpg");
mysql_query("insert into link (icon,nama,isi,link) values ('$tanggal.jpg','$_POST[nm]','$_POST[isi]','$_POST[lk]')");
   
echo "<script>window.location=('../index.php?aksi=link')</script>";
   }
  } 
}

elseif($act=='editlink'){
if (empty($_POST[nm]) || empty($_POST[lk])){
 echo "<script>window.alert('Data yang Anda isikan belum lengkap');
        window.location=('javascript:history.go(-1)')</script>";
}else{
$lokasi_file=$_FILES[gambar][tmp_name];
if(empty($lokasi_file)){

mysql_query("UPDATE link SET nama='$_POST[nm]',isi='$_POST[isi]',link='$_POST[lk]' WHERE id='$_GET[id_l]'");
echo "<script>window.location=('../index.php?aksi=link')</script>";

}else{
$a=$_GET['gb'];
$file=$_FILES['gambar']['tmp_name'];
$file_name=$_FILES['gambar']['name'];
copy($file,"../../foto/link/".$a);
mysql_query("UPDATE link SET nama='$_POST[nm]',isi='$_POST[isi]', link='$_POST[lk]' WHERE id='$_GET[id_l]'");
echo "<script>window.location=('../index.php?aksi=link')</script>";

   }
  } 
}

elseif($act=='hapus'){
mysql_query("DELETE FROM link WHERE id='$_GET[id_l]'");
$b=$_GET['gbr'];
$pathFile="../../gambar/link/$b";	   
unlink($pathFile);
echo "<script>window.location=('../index.php?aksi=link')</script>";
}
?>
