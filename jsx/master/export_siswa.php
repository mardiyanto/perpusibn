<?php
include "../../config/koneksi.php";
$nama_file = date('DMY').'_laporan_data_siswa.xls';
	header('Pragma: public');
	header('Expires: 0');
	header('Cache-Control: must-revalidate, post-check=0,pre-check=0');
	header('Content-Type: application/force-download');
	header('Content-Type: application/octet-stream');
	header('Content-Type: application/download');
	header('Content-Disposition: attachment;filename='.$nama_file.'');
	header('Content-Transfer-Encoding: binary ');
?>
<table bordercolor='#807D79' width='100%' border='1' cellpadding='5' cellspacing='0'>
<tr><td>No.</td><td>NISN</td><td>Nama</td><td>Tempat Lahir</td><td>Tanggal Lahir</td><td>Alamat</td><td>Nama Ortu</td>
<td>Kelas</td><td>Tanggal Daftar</td>
<?php
$q = mysql_query('select * from siswa order by id_siswa ASC');
$n = 1;
$hitung=mysql_numrows($q);
while($r = mysql_fetch_array($q))
{
	if($hitung > 100){ $warna="#D87676"; } else {$warna="#B3D577";}
	echo '<tr bgcolor="'.$warna.'">
	<td>'.$n.'</td>
	<td>'.$r["nisn"].'</td>
	<td>'.$r["nama"].'</td>
	<td>'.$r["tmpt_l"].'</td>
	<td>'.$r["tgl_l"].'</td>
	<td>'.$r["alamat"].'</td>
	<td>'.$r["nm_ortu"].'</td>
	<td>'.$r["kelas"].' </td>
	<td>'.$r["tgl_daftar"].'</td>
	</tr>';
	$n++;
}
?>
</table>
