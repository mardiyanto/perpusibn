
<?php
include "../../config/koneksi.php";
$act=$_GET[act];
$date=date ('d/m/Y');
$time=date ('h:i A');

if($act=='inputagenda'){
if (empty($_POST[tm]) || empty($_POST[tglm]) || empty($_POST[tgls]) || empty($_POST[jm]) || empty($_POST[tp]) || empty($_POST[isi])){
 echo "<script>window.alert('Data yang Anda isikan belum lengkap');
        window.location=('javascript:history.go(-1)')</script>";
     }else{
mysql_query("insert into agenda (tema,isi_agenda,tempat,pengirim,tgl_mulai,tgl_selesai,tgl_posting,jam) values                                ('$_POST[tm]',
                                 '$_POST[isi]',
								 '$_POST[tp]',
								 '$_POST[pg]',
								 '$_POST[tglm]',
								 '$_POST[tgls]',
								 '$date',
								 '$_POST[jm]')");
   
echo "<script>window.location=('../index.php?aksi=agenda')</script>";

  } 
}

elseif($act=='editagenda'){
if (empty($_POST[tm]) || empty($_POST[tglm]) || empty($_POST[tgls]) || empty($_POST[jm]) || empty($_POST[tp]) || empty($_POST[isi])){
 echo "<script>window.alert('Data yang Anda isikan belum lengkap');
        window.location=('javascript:history.go(-1)')</script>";
     }else{
mysql_query("UPDATE agenda SET       
                           tema='$_POST[tm]',
						   isi_agenda='$_POST[isi]',
						   tempat='$_POST[tp]',
						   pengirim='$_POST[pg]',
						   tgl_mulai='$_POST[tglm]',
						   tgl_selesai='$_POST[tgls]',
						   jam='$_POST[jm]' 
						   WHERE id_agenda='$_GET[id_a]'");                                
  
echo "<script>window.location=('../index.php?aksi=agenda')</script>";

  } 
}

elseif($act=='hapus'){
mysql_query("DELETE FROM agenda WHERE id_agenda='$_GET[id_a]'");
echo "<script>window.location=('../index.php?aksi=agenda')</script>";
}
?>
