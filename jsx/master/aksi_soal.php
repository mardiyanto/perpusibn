<?php
include "../../config/koneksi.php";

$module=$_GET[aksi];
$act=$_GET[act];

// Input soal
if ($module=='soal' AND $act=='input'){
  $lokasi_file    = $_FILES['fupload']['tmp_name'];

  
  // Apabila ada gambar yang diupload
  if (!empty($lokasi_file)){
   $tanggal=date("dmYhis");
$file=$_FILES['fupload']['tmp_name'];
$file_name=$_FILES['fupload']['name'];
copy($file,"../../foto/soal/".$tanggal.".jpg");
  mysql_query("INSERT INTO tbl_soal(soal,a,b,c,d,knc_jawaban,tanggal,gambar) 
  				VALUES('$_POST[soal]',
					   '$_POST[a]',
					   '$_POST[b]',
					   '$_POST[c]',
					   '$_POST[d]',
					   '$_POST[knc_jawaban]',
                       '$tanggal',
                       '$tanggal.jpg')");
  }
  else{
  mysql_query("INSERT INTO tbl_soal(soal,a,b,c,d,knc_jawaban) 
  				VALUES('$_POST[soal]',
					   '$_POST[a]',
					   '$_POST[b]',
					   '$_POST[c]',
					   '$_POST[d]',
					   '$_POST[knc_jawaban]',
					   '$tanggal'
					   )");
  }
    echo "<script>window.alert('Data Berhasil Diismpan');
        window.location=('../index.php?aksi=soal')</script>";
	
}
//Hapus Soal
elseif ($module=='soal' AND $act=='hapus') {
	mysql_query("DELETE FROM tbl_soal WHERE id_soal='$_GET[id]'");
    header('location:../index.php?aksi=soal');
}
// Update soal
elseif ($module=='soal' AND $act=='update'){
  $lokasi_file    = $_FILES['fupload']['tmp_name'];

  $tanggal=date("dmYhis");

  // Apabila gambar tidak diganti
  if (empty($lokasi_file)){
    mysql_query("UPDATE tbl_soal SET soal       = '$_POST[soal]',
                                   			 a  = '$_POST[a]' ,
								             b  = '$_POST[b]',
											 c  = '$_POST[c]',
											 d  = '$_POST[d]',
											knc_jawaban= '$_POST[knc_jawaban]',
											tanggal= '$tanggal'
                             WHERE id_soal   = '$_POST[id]'");
  }
  else{
   $tanggal=date("dmYhis");
$file=$_FILES['fupload']['tmp_name'];
$file_name=$_FILES['fupload']['name'];
copy($file,"../../foto/soal/".$tanggal.".jpg");
    mysql_query("UPDATE tbl_soal SET soal       = '$_POST[soal]',
                                   			 a  = '$_POST[a]' ,
								             b  = '$_POST[b]',
											 c  = '$_POST[c]',
											 d  = '$_POST[d]',
											knc_jawaban= '$_POST[knc_jawaban]',
											tanggal= '$tanggal',
                                   gambar      = '$tanggal.jpg' 
                             WHERE id_soal   = '$_POST[id]'");
  }
  header('location:../index.php?aksi=soal');
}
//Pengaktifan dan Pengnonaktifan
elseif ($module=='soal' AND $act=='nonaktif'){
$aktif='N';
    mysql_query("UPDATE tbl_soal SET aktif  = '$aktif'  WHERE id_soal='$_GET[id]'");
  header('location:../index.php?aksi=soal');
  echo "tes";
  
 }
elseif ($module=='soal' AND $act=='aktif'){
$aktif='Y';
    mysql_query("UPDATE tbl_soal SET aktif  = '$aktif'  WHERE id_soal='$_GET[id]'");
  header('location:../index.php?aksi=soal');
  echo "tes";
  
 }

?>
