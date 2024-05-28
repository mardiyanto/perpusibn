
<?php
include "../../config/koneksi.php";
$act=$_GET[act];
$date=date ('d/m/Y');
$time=date ('h:i A');

if($act=='inputdw'){
if (empty($_POST[jd])){
 echo "<script>window.alert('Data yang Anda isikan belum lengkap');
        window.location=('javascript:history.go(-1)')</script>";
     }
elseif (ereg ("[0]","$_POST[kat]")){
  echo "<script>window.alert('Kategori Belum dipilih');
        window.location=('javascript:history.go(-1)')</script>";
	}else{
	
$lokasi_file=$_FILES[gambar][tmp_name];
if(empty($lokasi_file)){
mysql_query("insert into download (kategori,nama,keterangan,link) values ('$_POST[kat]','$_POST[jd]','$_POST[isi]','$_POST[lk]')");
   
echo "<script>window.location=('../index.php?aksi=download')</script>";
}else{
$tanggal=date("dmYhis");
$file=$_FILES['gambar']['tmp_name'];
$file_name=$_FILES['gambar']['name'];
copy($file,"../../foto/file/".$file_name);

$tanggal=date("dmYhis");
$file=$_FILES['video']['tmp_name'];
$file_video=$_FILES['video']['name'];
copy($file,"../../video/".$file_video);
mysql_query("insert into download (kategori,nama,kelas,keterangan,link,file,video) values ('$_POST[kat]','$_POST[jd]','$_POST[kelas]','$_POST[isi]','$_POST[lk]','$file_name','$file_video')");
   
echo "<script>window.location=('../index.php?aksi=download')</script>";
   }
  } 
}

elseif($act=='editdw'){
if (empty($_POST[jd])){
 echo "<script>window.alert('Data yang Anda isikan belum lengkap');
        window.location=('javascript:history.go(-1)')</script>";
     }
elseif (ereg ("[0]","$_POST[kat]")){
  echo "<script>window.alert('Kategori Belum dipilih');
        window.location=('javascript:history.go(-1)')</script>";
	}else{
	
$lokasi_file=$_FILES[gambar][tmp_name];
if(empty($lokasi_file)){

mysql_query("UPDATE download SET kategori='$_POST[kat]', nama='$_POST[jd]', keterangan='$_POST[isi]', link='$_POST[lk]' WHERE id_d='$_GET[id_d]'");
echo "<script>window.location=('../index.php?aksi=download')</script>";

}else{
if($_GET[gb]==''){
$tanggal=date("dmYhis");
$file=$_FILES['gambar']['tmp_name'];
$file_name=$_FILES['gambar']['name'];
copy($file,"../../foto/file/".$file_name);
mysql_query("UPDATE download SET kategori='$_POST[kat]', nama='$_POST[jd]', keterangan='$_POST[isi]', link='$_POST[lk]',file='$file_name' WHERE id_d='$_GET[id_d]'");
echo "<script>window.location=('../index.php?aksi=download')</script>";
}else{


$a=$_GET['gb'];
$file=$_FILES['gambar']['tmp_name'];
$file_name=$_FILES['gambar']['name'];
copy($file,"../../foto/file/".$a);
mysql_query("UPDATE download SET kategori='$_POST[kat]', nama='$_POST[jd]', keterangan='$_POST[isi]', link='$_POST[lk]' WHERE id_d='$_GET[id_d]'");
echo "<script>window.location=('../index.php?aksi=download')</script>";
    }
   }
  } 
}

elseif($act=='hapus'){
mysql_query("DELETE FROM download WHERE id_d='$_GET[id_d]'");
$b=$_GET['gbr'];
$pathFile="../../foto/file/$b";	   
unlink($pathFile);

echo "<script>window.location=('../index.php?aksi=download')</script>";
}
?>
