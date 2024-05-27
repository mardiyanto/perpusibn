
<?php
include "../../config/koneksi.php";
$act=$_GET[act];

	$tanggal = date('Y-m-d');
	$jam = date('H:i:s');
	$waktu = $tanggal.' '.$jam;
	
if($act=='inputbuku'){
if (empty($_POST[judul]) || empty($_POST[penerbit]) || empty($_POST[pengarang]) || empty($_POST[thn_terbit]) || empty($_POST[lokasi])){
 echo "<script>window.alert('Data yang Anda isikan belum lengkap');
        window.location=('javascript:history.go(-1)')</script>";
     }
else{
	
$lokasi_file=$_FILES[gambar][tmp_name];
if(empty($lokasi_file)){
mysql_query("insert into tbl_buku (judul,pengarang,penerbit,thn_terbit,isbn,jumlah_buku,lokasi,tgl_input) values 
('$_POST[judul]','$_POST[pengarang]','$_POST[penerbit]','$_POST[thn_terbit]','$_POST[isbn]','$_POST[jumlah_buku]','$_POST[lokasi]','$waktu')");
   
echo "<script>window.location=('../index.php?aksi=buku')</script>";
}else{
$tanggal=date("dmYhis");
$file=$_FILES['gambar']['tmp_name'];
$file_name=$_FILES['gambar']['name'];
copy($file,"../../foto/data/".$tanggal.".jpg");
mysql_query("insert into tbl_buku (judul,pengarang,penerbit,thn_terbit,isbn,jumlah_buku,lokasi,tgl_input,gambar) values 
('$_POST[judul]','$_POST[pengarang]','$_POST[penerbit]','$_POST[thn_terbit]','$_POST[isbn]','$_POST[jumlah_buku]','$_POST[lokasi]','$waktu','$tanggal.jpg')");
  
echo "<script>window.location=('../index.php?aksi=buku')</script>";
   }
  } 
}

elseif($act=='editbuku'){
$lokasi_file=$_FILES[gambar][tmp_name];
if(empty($lokasi_file)){

mysql_query("UPDATE tbl_buku SET  judul='$_POST[judul]',
								  pengarang='$_POST[pengarang]', 
								  thn_terbit='$_POST[thn_terbit]', 
								  isbn='$_POST[isbn]',
								  jumlah_buku='$_POST[jumlah_buku]',
								  lokasi='$_POST[lokasi]',
								  tgl_input='$waktu'
								  WHERE id_buku='$_GET[id_buku]'");
echo "<script>window.location=('../index.php?aksi=buku')</script>";

}else{
if($_GET[gb]==''){
$tanggal=date("dmYhis");
$file=$_FILES['gambar']['tmp_name'];
$file_name=$_FILES['gambar']['name'];
copy($file,"../../foto/data/".$tanggal.".jpg");
mysql_query("UPDATE tbl_buku SET judul='$_POST[judul]', 
								  pengarang='$_POST[pengarang]', 
								  thn_terbit='$_POST[thn_terbit]', 
								  isbn='$_POST[isbn]',
								  jumlah_buku='$_POST[jumlah_buku]',
								  lokasi='$_POST[lokasi]',
								  tgl_input='$waktu',
								  gambar='$tanggal.jpg' 
								  WHERE id_buku='$_GET[id_buku]'");
echo "<script>window.location=('../index.php?aksi=buku')</script>";
}else{


$a=$_GET['gb'];
$file=$_FILES['gambar']['tmp_name'];
$file_name=$_FILES['gambar']['name'];
copy($file,"../../foto/data/".$a);
mysql_query("UPDATE tbl_buku SET judul='$_POST[judul]', 
								  pengarang='$_POST[pengarang]', 
								  thn_terbit='$_POST[thn_terbit]', 
								  isbn='$_POST[isbn]',
								  jumlah_buku='$_POST[jumlah_buku]',
								  lokasi='$_POST[lokasi]',
								  tgl_input='$waktu'
 WHERE id_buku='$_GET[id_buku]'");
echo "<script>window.location=('../index.php?aksi=buku')</script>";
    }
   }

}

elseif($act=='hapus'){
mysql_query("DELETE FROM tbl_buku WHERE id_buku='$_GET[id_buku]'");
$b=$_GET['gbr'];
$pathFile="../../foto/data/$b";	   
unlink($pathFile);

echo "<script>window.location=('../index.php?aksi=buku')</script>";
}
?>
