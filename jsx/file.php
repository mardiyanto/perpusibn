<?
///pemanggilan tabel calon_mhs
$data=mysql_query("SELECT * FROM tbl_transaksi where status='Kembali'");
$k2=mysql_num_rows($data);

$data2=mysql_query("SELECT * FROM tbl_transaksi where status!=''");
$k=mysql_num_rows($data2);

$data1=mysql_query("SELECT * FROM tbl_transaksi where status='Pinjam'");
$k1=mysql_num_rows($data1);

$k3=mysql_query("SELECT * FROM tbl_buku ");
$kk=mysql_num_rows($k3);

$k3=mysql_query("SELECT * FROM tbl_buku ");
$kk=mysql_num_rows($k3);

$agt=mysql_query("SELECT * FROM tbl_anggota ");
$agt=mysql_num_rows($agt);

$posting=mysql_query("SELECT SUM(jumlah_buku)as b FROM tbl_buku");
$post=mysql_fetch_array($posting);
?>