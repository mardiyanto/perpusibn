
<?php
include "../../config/koneksi.php";
$act=$_GET[act];

if($act=='X'){

mysql_query("UPDATE calon_mhs SET status='$_POST[status]' WHERE id_daftar='$_GET[id_daftar]'");
echo "<script>window.alert('Data berhasil disimpan terimakasih');
        window.location=('../index.php?aksi=pendaftarantrima)</script>";

}
elseif($act=='XI'){

mysql_query("UPDATE calon_mhs SET kelas='$_POST[kelas]' WHERE no_daftar='$_GET[no_daftar]'");
echo "<script>window.location=('../index.php?aksi=siswa')</script>";

}
elseif($act=='XII'){
mysql_query("UPDATE calon_mhs SET kelas='$_POST[kelas]' WHERE no_daftar='$_GET[no_daftar]'");
echo "<script>window.location=('../index.php?aksi=siswa')</script>";
}

elseif($act=='Alumni'){
mysql_query("UPDATE calon_mhs SET kelas='$_POST[kelas]' WHERE no_daftar='$_GET[no_daftar]'");
echo "<script>window.location=('../index.php?aksi=siswa')</script>";
 
}
?>
