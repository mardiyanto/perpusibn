<?php
///pemanggilan tabel calon_mhs
$data = mysqli_query($koneksi, "SELECT * FROM tbl_transaksi WHERE status='Kembali'");
$k2 = mysqli_num_rows($data);

$data2 = mysqli_query($koneksi, "SELECT * FROM tbl_transaksi WHERE status!=''");
$k = mysqli_num_rows($data2);

$data1 = mysqli_query($koneksi, "SELECT * FROM tbl_transaksi WHERE status='Pinjam'");
$k1 = mysqli_num_rows($data1);

$k3 = mysqli_query($koneksi, "SELECT * FROM tbl_buku");
$kk = mysqli_num_rows($k3);

$k3 = mysqli_query($koneksi, "SELECT * FROM tbl_buku");
$kk = mysqli_num_rows($k3);

$agt = mysqli_query($koneksi, "SELECT * FROM tbl_anggota");
$agt = mysqli_num_rows($agt);

$posting = mysqli_query($koneksi, "SELECT SUM(jumlah_buku) AS b FROM tbl_buku");
$post = mysqli_fetch_array($posting);
?>