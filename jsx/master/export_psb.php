<?php
include "../../config/koneksi.php";
$nama_file = date('Y-m-d').date('h:m:s').'_laporan_data_perpus.xls';
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
<tr><td>No.</td><td>Nama Siswa</td><td>Npm</td><td>Judul Buku</td><td>Tanggal Pinjam</td><td>Tanggal Kembali</td><td>Status</td>
<?php
$q = mysql_query('select * from tbl_transaksi order by id ASC');
$n = 1;
$hitung=mysql_numrows($q);
while($r = mysql_fetch_array($q))
{
	if($hitung > 100){ $warna='#D87676'; } else {$warna='#B3D577';}
	echo "<tr bgcolor='$warna'>
	<td>$n</td>
	<td>$r[nama]</td>
	<td>$r[nim]</td>
	<td>$r[judul]</td>
	<td>$r[tgl_pinjam]</td>
	<td>$r[tgl_pinjam]</td>
	
	<td>$r[status]</td>

	
	</tr>";
	$n++;
}
?>
</table>
