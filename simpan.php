<?php
include "config/koneksi.php";

$pan = strlen($_POST['password']);
// Cek NIM anggota di database
$cek_nim = mysqli_num_rows(mysqli_query($koneksi, "SELECT nim FROM tbl_anggota WHERE nim='" . mysqli_real_escape_string($koneksi, $_POST['nim']) . "'"));

// Kalau NIM sudah ada yang pakai
if ($cek_nim > 0) {
    echo "<script>window.alert('NPM " . $_POST['nim'] . " Sudah Terdaftar');
          window.location=('javascript:history.go(-1)')</script>";
} elseif (empty($_POST['nama']) || empty($_POST['password']) || empty($_POST['nim'])) {
    echo "<script>window.alert('Data yang Anda isikan belum lengkap');
          window.location=('javascript:history.go(-1)')</script>";
} elseif ($pan <= 5) {
    echo "<script>window.alert('Password Lemah Minimal 6 Karakter');
          window.location=('javascript:history.go(-1)')</script>";
} elseif ($_POST['password'] !== $_POST['password1']) {
    echo "<script>window.alert('Password Yang Anda Masukan Tidak Sama');
          window.location=('javascript:history.go(-1)')</script>";
} else {
    $nama = mysqli_real_escape_string($koneksi, $_POST['nama']);
    $nim = mysqli_real_escape_string($koneksi, $_POST['nim']);
    $tempat_lahir = mysqli_real_escape_string($koneksi, $_POST['tempat_lahir']);
    $tgl_lahir = mysqli_real_escape_string($koneksi, $_POST['tgl_lahir']);
    $jk = mysqli_real_escape_string($koneksi, $_POST['jk']);
    $prodi = mysqli_real_escape_string($koneksi, $_POST['prodi']);
    $kelas = mysqli_real_escape_string($koneksi, $_POST['kelas']);
    $password = md5($_POST['password']);
    $date = date('d/m/Y');

    mysqli_query($koneksi, "INSERT INTO tbl_anggota(password, nama, nim, tempat_lahir, tgl_lahir, jk, prodi, kelas, tgl) 
             VALUES('$password', '$nama', '$nim', '$tempat_lahir', '$tgl_lahir', '$jk', '$prodi', '$kelas', '$date')");

    $sql = "SELECT * FROM tbl_anggota WHERE BINARY nim='$nim' AND password='$password'";
    $hasil = mysqli_query($koneksi, $sql);
    $r = mysqli_fetch_array($hasil);

    $_SESSION['nim'] = $r['nim'];
    $_SESSION['nama'] = $r['nama'];
    $_SESSION['kelas'] = $r['kelas'];
    $_SESSION['password'] = $r['password'];

    if ($_GET['cek'] == 'cek') {
        echo "<script>window.alert('Pendaftaran Berhasil Silahkan lihat buku');
              window.location=('index.php')</script>";
    } else {
        echo "<script>window.alert('Pendaftaran Berhasil silahkan login untuk meminjam buku');
              window.location=('index.php')</script>";
    }
}
?>
