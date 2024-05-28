
<?php
include "../../config/koneksi.php";
$act=$_GET[act];
$date=date ('d/m/Y');
$time=date ('h:i A');

if($act=='inputberita'){
if (empty($_POST[jd]) || empty($_POST[isi])){
 echo "<script>window.alert('Data yang Anda isikan belum lengkap');
        window.location=('javascript:history.go(-1)')</script>";
     }
elseif (ereg ("[0]","$_POST[kat]")){
  echo "<script>window.alert('Kategori Belum dipilih');
        window.location=('javascript:history.go(-1)')</script>";
	}else{
	
$lokasi_file=$_FILES[gambar][tmp_name];
if(empty($lokasi_file)){
mysql_query("insert into berita (id_kat,judul,tanggal,jam,isi) values ('$_POST[kat]','$_POST[jd]','$date','$time','$_POST[isi]')");
   
echo "<script>window.location=('../index.php?aksi=artikel')</script>";
}else{
$tanggal=date("dmYhis");
$file=$_FILES['gambar']['tmp_name'];
$file_name=$_FILES['gambar']['name'];
copy($file,"../../foto/data/".$tanggal.".jpg");
mysql_query("insert into berita (id_kat,judul,tanggal,jam,isi,gambar) values ('$_POST[kat]','$_POST[jd]','$date','$time','$_POST[isi]','$tanggal.jpg')");
   
echo "<script>window.location=('../index.php?aksi=artikel')</script>";
   }
  } 
}

elseif($act=='editberita'){
if (empty($_POST[jd]) || empty($_POST[isi])){
 echo "<script>window.alert('Data yang Anda isikan belum lengkap');
        window.location=('javascript:history.go(-1)')</script>";
     }
elseif (ereg ("[0]","$_POST[kat]")){
  echo "<script>window.alert('Kategori Belum dipilih');
        window.location=('javascript:history.go(-1)')</script>";
	}else{
	
$lokasi_file=$_FILES[gambar][tmp_name];
if(empty($lokasi_file)){

mysql_query("UPDATE berita SET id_kat='$_POST[kat]', judul='$_POST[jd]', tanggal='$date', jam='$time', isi='$_POST[isi]' WHERE id_berita='$_GET[id_b]'");
echo "<script>window.location=('../index.php?aksi=artikel')</script>";

}else{
if($_GET[gb]==''){
$tanggal=date("dmYhis");
$file=$_FILES['gambar']['tmp_name'];
$file_name=$_FILES['gambar']['name'];
copy($file,"../../foto/data/".$tanggal.".jpg");
mysql_query("UPDATE berita SET id_kat='$_POST[kat]', judul='$_POST[jd]', tanggal='$date', jam='$time', isi='$_POST[isi]',gambar='$tanggal.jpg' WHERE id_berita='$_GET[id_b]'");
echo "<script>window.location=('../index.php?aksi=artikel')</script>";
}else{


$a=$_GET['gb'];
$file=$_FILES['gambar']['tmp_name'];
$file_name=$_FILES['gambar']['name'];
copy($file,"../../foto/data/".$a);
mysql_query("UPDATE berita SET id_kat='$_POST[kat]', judul='$_POST[jd]', tanggal='$date', jam='$time', isi='$_POST[isi]' WHERE id_berita='$_GET[id_b]'");
echo "<script>window.location=('../index.php?aksi=artikel')</script>";
    }
   }
  } 
}

elseif($act=='hapus'){
mysql_query("DELETE FROM berita WHERE id_berita='$_GET[id_b]'");
$b=$_GET['gbr'];
$pathFile="../../foto/data/$b";	   
unlink($pathFile);

echo "<script>window.location=('../index.php?aksi=artikel')</script>";
}
?>
