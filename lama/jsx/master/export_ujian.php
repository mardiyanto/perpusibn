<?php
include "../../config/koneksi.php";
$nama_file = date('Y-m-d').date('h:m:s').'_laporan_data_calon_siswa.xls';
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
<tr>
                                               <td rowspan='2' valign='middle'><div align='center'>No</div></td>
			                      
					       <td rowspan='2' valign='middle'><div align='center'>NISN</div></td>
					       <td rowspan='2' valign='middle'><div align='center'>Nama Lengkap</div></td>
					       <td rowspan='2' valign='middle'><div align='center'>Waktu Ujian</div></td>
					       
					       <td colspan='4' valign='middle'><div align='center'>Informasi Hasil Ujian </div></td>
						
						</tr>
						
						<tr>
						<td><div align='center'>Benar</div></td>
						 <td><div align='center'>Salah</div></td>
						 <td><div align='center'>Kosong</div></td>
						 <td><div align='center'>Score</div></td>
						 </tr>
<?php
$q = mysql_query('select * from tbl_nilai order by nisn DESC');
$n = 1;
$hitung=mysql_numrows($q);
while($r = mysql_fetch_array($q))
$ket=$r[keterangan]

{
	if($ket=='Lulus'){ $warna='#D87676'; } else {$warna='#B3D577';}
	echo "<tr bgcolor='$warna'>
	<td>$n</td>
	<td>$r[nisn]</td>
	<td>$r[nama]</td>
	<td>$r[tanggal]</td>
	
	<td>$r[benar]</td>
	<td>$r[salah]</td>
	
	<td>$r[kosong]</td>
	<td>$r[score]</td>
	
	
	</tr>";
	$n++;
}
?>
</table>
