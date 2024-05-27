<?php
include "../config/koneksi.php";
$no_daftar=$_GET['no_daftar'];
$con=mysql_query("SELECT * FROM calon_mhs WHERE no_daftar='$no_daftar'");
$hasil=mysql_fetch_array($con);
//menentukan hari
$a_hari = array(1=>"Senin","Selasa","Rabu","Kamis","Jumat", "Sabtu","Minggu");
$hari = $a_hari[date("N")];
//menentukan tanggal
$tanggal = date ("j");
//menentukan bulan
$a_bulan = array(1=>"Januari","Februari","Maret", "April", "Mei", "Juni","Juli","Agustus","September","Oktober", "November","Desember");
$bulan = $a_bulan[date("n")];
//menentukan tahun
$tahun = date("Y");
//dan untuk menampilkan nya dengan format contoh Jumat, 22 Februari 2013
?>

 
<html xmlns="http://www.w3.org/1999/xhtml"> <!-- Bagian halaman HTML yang akan konvert -->  
<head>  
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" /><head>
<title>Cetak Data</title>

<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<style type="text/css">
<!--
.style4 {font-size: 18px}
.style5 {font-size: 34px}
.style6 {
	font-size: 21px;
	font-style: italic;
	font-weight: bold;
}
.style7 {font-size: 20px}
.style8 {font-size: 31px}
.style10 {font-size: 18px; font-weight: bold; }
.style18 {font-size: 21px}
.style19 {
	font-size: 19px;
	font-weight: bold;
}
.style20 {font-size: 19px}
.style23 {
	font-size: 20px;
	font-style: italic;
	font-weight: bold;
}
-->
</style>
</head>

<body onLoad="window.print()">
<p>&nbsp;</p>

<table width="980" border="0" align="center" bgcolor="#FFFFFF">
  <tr>
    <td colspan="2" rowspan="4"><div align="center"></div>      
    <div align="right"></div>    
    <div align="right"><img src="../foto/logo.png" width="170" height="169"></div></td>
    <td colspan="7" class="style5"><div align="center" class="style5"></div>      <div align="center" class="style8"></div>      <div align="center" class="style8"></div>      
    <div align="center" class="style5"><span class="style8"><strong><?php echo" $k_k[alias] ";?></strong></span></div></td>
  </tr>
  <tr>
    <td colspan="7" >&nbsp;</td>
  </tr>
  <tr>
    <td colspan="7" class="style5"><div align="center" class="style8"><strong><?php echo" $k_k[nama] ";?> </strong></div></td>
  </tr>
  <tr>
    <td height="21" colspan="7">&nbsp;</td>
  </tr>
  <tr>
    <td colspan="2">&nbsp;</td>
    <td colspan="7"><div align="justify"></div>    
    <div align="center" class="style6"> 
      <div align="center">Alamat : <?php echo" $k_k[alamat] ";?><br>
      </div>
    </div></td>
  </tr>
  <tr>
    <td colspan="9"><div align="center">==========================================================================================================</div></td>
  </tr>
  <tr>
    <td width="72">&nbsp;</td>
    <td colspan="8"><p align="center" style=" font-size: 18px;"><strong>FORMULIR PENDAFTARAN SISWA BARU ONLINE </strong></p>    </td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td colspan="8"><div align="center" class="style4"><strong><?php echo" $k_k[nama] ";?> </strong></div></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td colspan="8"><div align="center"><span class="style10">TAHUN AJARAN <?php echo"$k_k[tahun_ajar]";?> </span></div></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td colspan="8">&nbsp;</td>
  </tr>
  <tr>
    <td><div align="right"><strong><em>A.</em></strong></div></td>
    <td colspan="8"><span class="style23">Identitas Calon Mahasiswa </span></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td colspan="2"><span class="style18">Nomor Peserta</span></td>
    <td width="12"><div align="center" class="style18">:</div></td>
    <td colspan="3"><span class="style18"><?php echo"$hasil[no_daftar]";?></span></td>
    <td width="54">&nbsp;</td>
    <td width="244">&nbsp;</td>
  </tr>
    <tr>
    <td>&nbsp;</td>
    <td colspan="2"><span class="style18">Jurusan Yang Dipilih</span></td>
    <td width="12"><div align="center" class="style18">:</div></td>
    <td colspan="3"><span class="style18"><?php echo"$hasil[jurusan]";?></span></td>
    <td width="54">&nbsp;</td>
    <td width="244">&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td colspan="2"><span class="style18">Nama Lengkap </span></td>
    <td><div align="center" class="style18">:</div></td>
    <td colspan="3"><span class="style18"><?php echo"$hasil[nama]";?></span></td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td colspan="2"><span class="style18">NISN</span></td>
    <td><div align="center" class="style18">:</div></td>
    <td colspan="3"><span class="style18"><?php echo"$hasil[nisn]";?></span></td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td colspan="2"><span class="style18">Tempat Tanggal Lahir </span></td>
    <td><div align="center" class="style18">:</div></td>
    <td colspan="3"><span class="style18"><?php echo"$hasil[tplhr]";?>, <?php echo"$hasil[tglhr]";?></span></td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td colspan="2"><span class="style18">Jenis Kelamin </span></td>
    <td><div align="center" class="style18">:</div></td>
    <td colspan="3"><span class="style18"><?php echo"$hasil[jk]";?></span></td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td colspan="2"><span class="style18">Agama</span></td>
    <td><div align="center" class="style18">:</div></td>
    <td colspan="3"><span class="style18"><?php echo"$hasil[agama]";?></span></td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td colspan="2"><span class="style18">Alamat Calon Mahasiswa </span></td>
    <td><div align="center" class="style18"></div></td>
    <td colspan="3"><span class="style18"><?php echo"$hasil[alamat]";?></span></td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td width="59" class="style18">&nbsp;</td>
    <td width="139" class="style7"><div align="right" class="style18">RT/RW</div></td>
    <td class="style7"><div align="center" class="style18">:</div></td>
    <td colspan="3" class="style7"><span class="style18"><?php echo"$hasil[rt_rw]";?></span></td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td colspan="2" class="style7"><div align="right" class="style18">Desa</div></td>
    <td class="style7"><div align="center" class="style18">:</div></td>
    <td colspan="3" class="style7"><span class="style18"><?php echo"$hasil[desa]";?></span></td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td colspan="2" class="style7"><div align="right" class="style18">Kecamatan</div></td>
    <td class="style7"><div align="center" class="style18">:</div></td>
    <td colspan="3" class="style7"><span class="style18"><?php echo"$hasil[kc]";?></span></td>
    <td><span class="style18"></span></td>
    <td><span class="style18"></span></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td colspan="2" class="style7"><div align="right" class="style18">
      <div align="left">No Telephone </div>
    </div></td>
    <td class="style7"><div align="center" class="style18"><strong>:</strong></div></td>
    <td colspan="3" class="style7"><span class="style18"><?php echo"$hasil[no_hp]";?></span></td>
    <td><span class="style18"></span></td>
    <td><span class="style18"></span></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td colspan="2" class="style7"><div align="left" class="style18">Sekolah Asal </div></td>
    <td class="style7"><div align="center" class="style18">:</div></td>
    <td colspan="3" class="style7"><span class="style18"><?php echo"$hasil[sekolah_asl]";?></span></td>
    <td><span class="style18"></span></td>
    <td><span class="style18"></span></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td colspan="2" class="style7"><div align="left" class="style18">Tahun Ijasah </div></td>
    <td class="style7"><div align="center" class="style18">:</div></td>
    <td colspan="3" class="style7"><span class="style18"><?php echo"$hasil[th_ijasah]";?></span></td>
    <td><span class="style18"></span></td>
    <td><span class="style18"></span></td>
  </tr>
  <tr>
    <td><div align="right"><strong><em>B.</em></strong></div></td>
    <td colspan="6" class="style7"><div align="left" class="style18"><strong><em>Identitas Orang Tua / Wali </em></strong></div>      </td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td colspan="2"><span class="style18">Nama Ayah / wali </span></td>
    <td class="style18">:</td>
    <td colspan="3"><span class="style7"><span class="style18"><?php echo"$hasil[ayah]";?></span></span></td>
    <td colspan="2">&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td colspan="2"><span class="style18">Nama Ibu / wali </span></td>
    <td class="style18">:</td>
    <td colspan="3"><span class="style7"><span class="style18"><?php echo"$hasil[ibu]";?></span></span></td>
    <td colspan="2">&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td colspan="2"><span class="style18">Pekerjaan Orang Tua </span></td>
    <td class="style18">:</td>
    <td colspan="3"><span class="style7"><span class="style18"><?php echo"$hasil[pekerjaan_ortu]";?></span></span></td>
    <td colspan="2">&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td colspan="2">&nbsp;</td>
    <td>&nbsp;</td>
    <td colspan="3">&nbsp;</td>
    <td colspan="2">&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td colspan="2">&nbsp;</td>
    <td>&nbsp;</td>
    <td colspan="3"><div align="center" class="style18">Mengetahui</div></td>
    <td colspan="2"><p class="style20">Pringsewu  , <?php echo  $tanggal ." ". $bulan ." ". $tahun; ?></p>      </td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td colspan="2" rowspan="7" align="center" valign="top"><span class="style18">
	
	<img src="../foto/mhs.png" width="221" height="206"  border="1">
	
	
	</span></td>
    <td><span class="style18"></span></td>
    <td width="177" class="style7"><div align="center" class="style18">Petugas Pendaftaran </div></td>
    <td width="13" class="style18">&nbsp;</td>
    <td width="172" class="style7">&nbsp;</td>
    <td colspan="2"><div align="center" class="style18">Calon Mahasiswa</div></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td colspan="3">&nbsp;</td>
    <td><div align="center"><span class="style4"><span class="style18"><span class="style18"></span></span></span></div></td>
    <td><div align="center"><span class="style4"><span class="style18"><span class="style18"></span></span></span></div></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td colspan="3">&nbsp;</td>
    <td><div align="center"><span class="style4"><span class="style18"><span class="style18"></span></span></span></div></td>
    <td><div align="center"><span class="style4"><span class="style18"><span class="style18"></span></span></span></div></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td><span class="style18"></span></td>
    <td colspan="3"><span class="style18"></span></td>
    <td colspan="2"><span class="style18"></span></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td colspan="3">&nbsp;</td>
    <td colspan="2"><div align="center" class="style4">
      <div align="center"><strong><span class="style7"><span class="style4"><span class="style18"><span class="style18"></span></span></span></span> </strong></div>
    </div></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td><div align="center" class="style19">(................................) </div></td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td colspan="2"><div align="center" class="style19">( <?php echo"$hasil[nama]"; ?>) </div></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td colspan="3">&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
</table>

</body>
</html>















