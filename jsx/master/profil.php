<?php
include "../../config/koneksi.php";
$act = $_GET['act'];

if ($act == 'editpro') {
    if (empty($_POST['jd'])) {
        echo "<script>window.alert('Data yang Anda isikan belum lengkap');
        window.location=('javascript:history.go(-1)')</script>";
    } else {
        $alamat = mysqli_real_escape_string($koneksi, $_POST['alamat']);
        $nama = mysqli_real_escape_string($koneksi, $_POST['jd']);
        $alias = mysqli_real_escape_string($koneksi, $_POST['alias']);
        $tahun_ajar = mysqli_real_escape_string($koneksi, $_POST['tahun_ajar']);
        $isi = mysqli_real_escape_string($koneksi, $_POST['isi']);
        $id_profil = mysqli_real_escape_string($koneksi, $_GET['id_p']);

        $query = "UPDATE profil SET alamat='$alamat', nama='$nama', alias='$alias', tahun_ajar='$tahun_ajar', isi='$isi' WHERE id_profil='$id_profil'";
        mysqli_query($koneksi, $query);
        echo "<script>window.location=('../index.php?aksi=profil')</script>";
    }
}
?>