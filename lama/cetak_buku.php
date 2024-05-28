<?php
include "config/koneksi.php";
$nim = $_GET['nim'];
$stmt = $koneksi->prepare("SELECT * FROM tbl_transaksi WHERE nim=?");
$stmt->bind_param("s", $nim);
$stmt->execute();
$result = $stmt->get_result();
$hasil = $result->fetch_assoc();
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
    <div align="right"><img src="foto/logo.png" width="170" height="169"></div></td>
    <td colspan="7" class="style5"><div align="center" class="style5"></div>      <div align="center" class="style8"></div>      <div align="center" class="style8"></div>      
    <div align="center" class="style5"><span class="style8"><strong><?php echo"$k_k[alias]";?> </strong></span></div></td>
  </tr>
  <tr>
    <td colspan="7" >&nbsp;</td>
  </tr>
  <tr>
    <td colspan="7" class="style5"><div align="center" class="style8"><strong><?php echo"$k_k[nama]";?>  </strong></div></td>
  </tr>
  <tr>
    <td height="21" colspan="7">&nbsp;</td>
  </tr>
  <tr>
    <td colspan="2">&nbsp;</td>
    <td colspan="7"><div align="justify"></div>    
    <div align="center" class="style6"> 
      <div align="center">Alamat : <?php echo"$k_k[alamat]";?> <br>
      </div>
    </div></td>
  </tr>
  <tr>
    <td colspan="9"><div align="center">==========================================================================================================</div></td>
  </tr>
  <tr>
    <td width="170">&nbsp;</td>
    <td colspan="8"><p align="center" style=" font-size: 18px;"><strong>FORMULIR PEMINJAMAN BUKU ONLINE </strong></p>    </td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td colspan="8"><div align="center" class="style4"><strong><?php echo"$k_k[nama]";?>  </strong></div></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td colspan="8"><div align="center"><span class="style10">TAHUN AJARAN <?php echo"$k_k[tahun_ajar]";?>  </span></div></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td colspan="8">&nbsp;</td>
  </tr>
  <tr>
    <td><div align="right"><strong><em>#</em></strong></div></td>
    <td colspan="8"><span class="style23">DATA PEMINJAM BUKU PERPUSTAKAAN SECARA ONLINE :</span></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td colspan="2">Id </td>
    <td width="7"><div align="center" class="style18">:</div></td>
    <td colspan="3"><span class="style18"><?php echo"$hasil[id]";?></span></td>
    <td width="101">&nbsp;</td>
    <td width="466">&nbsp;</td>
  </tr>
    <tr>
    <td>&nbsp;</td>
    <td colspan="2">Nama </td>
    <td width="7"><div align="center" class="style18">:</div></td>
    <td colspan="3"><span class="style18"><?php echo"$hasil[nama]";?></span></td>
    <td width="101">&nbsp;</td>
    <td width="466">&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td colspan="2"><span class="style18">Nik/Nisn</span></td>
    <td><div align="center" class="style18">:</div></td>
    <td colspan="3"><span class="style18"><?php echo"$hasil[nim]";?></span></td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td colspan="2"><span class="style18">Judul Buku</span></td>
    <td><div align="center" class="style18">:</div></td>
    <td colspan="3"><span class="style18"><?php echo"$hasil[judul]";?></span></td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td colspan="2"><span class="style18">Tanggal Peminjaman Buku</span></td>
    <td><div align="center" class="style18">:</div></td>
    <td colspan="3"><span class="style18"><?php echo"$hasil[tgl_pinjam]";?></span></td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td colspan="2"><span class="style18">Tanggal Pengembalian Buku</span></td>
    <td><div align="center" class="style18">:</div></td>
    <td colspan="3"><span class="style18"><?php echo"$hasil[tgl_kembali]";?></span></td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td colspan="2">&nbsp;</td>
    <td>&nbsp;</td>
    <td colspan="3"><div align="center" class="style18">Mengetahui</div></td>
    <td colspan="2"><p class="style20">Tanggamus  , <?php echo  $tanggal ." ". $bulan ." ". $tahun; ?></p>      </td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td colspan="2" rowspan="7" align="center" valign="top"><span class="style18"><img src="foto/mhs.png" width="312" height="193"  border="1"></span></td>
    <td><span class="style18"></span></td>
    <td width="296" class="style7"><div align="center" class="style18">Petugas Perpustakaan </div></td>
    <td width="22" class="style18">&nbsp;</td>
    <td width="332" class="style7">&nbsp;</td>
    <td colspan="2"><div align="center" class="style18"> Siswa/Siswi</div></td>
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















