
<?php
include "../../config/koneksi.php";
$act=$_GET[act];

if($act=='editpro'){
if (empty($_POST[jd])){
 echo "<script>window.alert('Data yang Anda isikan belum lengkap');
        window.location=('javascript:history.go(-1)')</script>";
     }else{
mysql_query("UPDATE profil SET alamat='$_POST[alamat]', nama='$_POST[jd]', alias='$_POST[alias]', tahun_ajar='$_POST[tahun_ajar]', isi='$_POST[isi]' WHERE id_profil='$_GET[id_p]'"); 
echo "<script>window.location=('../index.php?aksi=profil')</script>";

    }
}

?>