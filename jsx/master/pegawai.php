
<?php
include "../../config/koneksi.php";
$act=$_GET[act];
$date=date ('d/m/Y');
$time=date ('h:i A');

if($act=='inputpegawai'){
$pass=md5($_POST['pw']);
if (empty($_POST[nm]) || empty($_POST[kel]) || empty($_POST[st]) || empty($_POST[sk]) || empty($_POST[jb]) || empty($_POST[tm])){
 echo "<script>window.alert('Data yang Anda isikan belum lengkap');
        window.location=('javascript:history.go(-1)')</script>";
     }else{
	
$lokasi_file=$_FILES[gambar][tmp_name];

if(empty($lokasi_file)){
	
mysql_query("insert into pegawai (nama,password,nip,jabatan,kelamin,status,tamatan,sertifikasi) values
								 ('$_POST[nm]',
								 '$pass',
								  '$_POST[nip]',
								  '$_POST[jb]',
								  '$_POST[kel]',
								  '$_POST[st]',
								  '$_POST[tm]',
								  '$_POST[sk]')");
   
echo "<script>window.location=('../index.php?aksi=pegawai')</script>";
}else{
$tanggal=date("dmYhis");
$file=$_FILES['gambar']['tmp_name'];
$file_name=$_FILES['gambar']['name'];
copy($file,"../../foto/guru/".$tanggal.".jpg");
mysql_query("insert into pegawai (nama,nip,jabatan,kelamin,status,tamatan,sertifikasi,foto) values
								 ('$_POST[nm]',
								  '$_POST[nip]',
								  '$_POST[jb]',
								  '$_POST[kel]',
								  '$_POST[st]',
								  '$_POST[tm]',
								  '$_POST[sk]',
								  '$tanggal.jpg')");
   
echo "<script>window.location=('../index.php?aksi=pegawai')</script>";
   }
  } 
}

elseif($act=='editpegawai'){
	$pass = md5($_POST[pw]);
if (empty($_POST[nm]) ||  empty($_POST[kel]) ||  empty($_POST[st]) || empty($_POST[sk]) || empty($_POST[jb]) || empty($_POST[tm])){
 echo "<script>window.alert('Data yang Anda isikan belum lengkap');
        window.location=('javascript:history.go(-1)')</script>";
     }else{
$lokasi_file=$_FILES[gambar][tmp_name];
if(empty($lokasi_file)){
mysql_query("UPDATE pegawai SET nama='$_POST[nm]',
								password = '$pass',
								nip='$_POST[nip]',
								jabatan='$_POST[jb]',
								kelamin='$_POST[kel]',
								status='$_POST[st]',
								tamatan='$_POST[tm]',
								sertifikasi='$_POST[sk]'
								WHERE id_gr='$_GET[id_gr]'");
echo "<script>window.location=('../index.php?aksi=pegawai')</script>";

}else{

if($_GET[gb]==''){
$tanggal=date("dmYhis");
$file=$_FILES['gambar']['tmp_name'];
$file_name=$_FILES['gambar']['name'];
copy($file,"../../foto/guru/".$tanggal.".jpg");
mysql_query("UPDATE pegawai SET nama='$_POST[nm]',
				password = '$pass',
								nip='$_POST[nip]',
								jabatan='$_POST[jb]',
								kelamin='$_POST[kel]',
								status='$_POST[st]',
								tamatan='$_POST[tm]',
								sertifikasi='$_POST[sk]',
								foto='$tanggal.jpg'
								WHERE id_gr='$_GET[id_gr]'");
echo "<script>window.location=('../index.php?aksi=pegawai')</script>";
}else{


$a=$_GET['gb'];
$file=$_FILES['gambar']['tmp_name'];
$file_name=$_FILES['gambar']['name'];
copy($file,"../../foto/guru/".$a);
mysql_query("UPDATE pegawai SET nama='$_POST[nm]',
								nip='$_POST[nip]',
								jabatan='$_POST[jb]',
								kelamin='$_POST[kel]',
								status='$_POST[st]',
								tamatan='$_POST[tm]',
								sertifikasi='$_POST[sk]'
								WHERE id_gr='$_GET[id_gr]'");
echo "<script>window.location=('../index.php?aksi=pegawai')</script>";
    }
   }
  } 
}

elseif($act=='hapus'){
mysql_query("DELETE FROM pegawai WHERE id_gr='$_GET[id_gr]'");
$b=$_GET['gbr'];
$pathFile="../../foto/guru/$b";	   
unlink($pathFile);

echo "<script>window.location=('../index.php?aksi=pegawai')</script>";
}
?>
