
<?php
include "../../config/koneksi.php";
$act=$_GET[act];
$date=date ('d/m/Y');
$time=date ('h:i A');

if($act=='inputangoota'){
$pass=md5($_POST['pw']);
if (empty($_POST[nm]) || empty($_POST[kel]) || empty($_POST[st]) || empty($_POST[sk]) || empty($_POST[jb]) || empty($_POST[tm])){
 echo "<script>window.alert('Data yang Anda isikan belum lengkap');
        window.location=('javascript:history.go(-1)')</script>";
     }else{
	
$lokasi_file=$_FILES[gambar][tmp_name];

if(empty($lokasi_file)){
	
mysql_query("insert into tbl_anggota (nama,password,nip,jabatan,kelamin,status,tamatan,sertifikasi) values
								 ('$_POST[nm]',
								 '$pass',
								  '$_POST[nip]',
								  '$_POST[jb]',
								  '$_POST[kel]',
								  '$_POST[st]',
								  '$_POST[tm]',
								  '$_POST[sk]')");
   
echo "<script>window.location=('../index.php?aksi=anggota')</script>";
}else{
$tanggal=date("dmYhis");
$file=$_FILES['gambar']['tmp_name'];
$file_name=$_FILES['gambar']['name'];
copy($file,"../../foto/guru/".$tanggal.".jpg");
mysql_query("insert into anggota (nama,nip,jabatan,kelamin,status,tamatan,sertifikasi,foto) values
								 ('$_POST[nm]',
								  '$_POST[nip]',
								  '$_POST[jb]',
								  '$_POST[kel]',
								  '$_POST[st]',
								  '$_POST[tm]',
								  '$_POST[sk]',
								  '$tanggal.jpg')");
   
echo "<script>window.location=('../index.php?aksi=anggota')</script>";
   }
  } 
}

elseif($act=='editanggota'){

if (empty($_POST[nama]) ||  empty($_POST[nim]) ||  empty($_POST[prodi]) || empty($_POST[kelas]) || empty($_POST[jk])){
 echo "<script>window.alert('Data yang Anda isikan belum lengkap');
        window.location=('javascript:history.go(-1)')</script>";
     }else{

mysql_query("UPDATE tbl_anggota SET nama='$_POST[nama]',
								
								nim='$_POST[nim]',
								tempat_lahir='$_POST[lahir]',
								tgl_lahir='$_POST[tgl_lahir]',
								jk='$_POST[jk]',
								prodi='$_POST[prodi]',
								kelas='$_POST[kelas]',
								tgl='$_POST[tgl]'
								WHERE id_agt='$_GET[id_agt]'");
echo "<script>window.location=('../index.php?aksi=anggota')</script>";
    }
}

elseif($act=='hapus'){
mysql_query("DELETE FROM tbl_anggota WHERE id_agt='$_GET[id_agt]'");

echo "<script>window.location=('../index.php?aksi=anggota')</script>";
}
?>
