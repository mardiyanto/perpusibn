<?php
require_once('fungsi_validasi.php');
$server = "localhost";
$username = "u1732927_wp";
$password = "m4rd1best";
$database = "u1732927_elybfeb";

// Koneksi dan memilih database di server
$koneksi = mysqli_connect($server, $username, $password, $database) or die("Koneksi gagal");
$val = new Lokovalidasi;
$kontak_kami = mysqli_query($koneksi, "SELECT * FROM profil");
$k_k = mysqli_fetch_array($kontak_kami);
$denda1 = 2000;
?>
