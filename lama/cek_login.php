<?php
include "config/koneksi.php";
function anti_injection($data){
  $filter = mysqli_real_escape_string($koneksi, stripslashes(strip_tags(htmlspecialchars($data,ENT_QUOTES))));
  return $filter;
}

$nim = anti_injection($_POST['nim']);
$pass = anti_injection(md5($_POST['pass']));

// pastikan username dan password adalah berupa huruf atau angka.
if (!ctype_alnum($nim) OR !ctype_alnum($pass)){
echo "<script>window.location=('javascript:history.go(-1)')</script>";
}
else{
$login=mysqli_query($koneksi, "SELECT * FROM tbl_anggota WHERE BINARY nim='$nim' AND password='$pass'");
$ketemu=mysqli_num_rows($login);
$r=mysqli_fetch_array($login);

// Apabila username dan password ditemukan
if ($ketemu > 0){
  session_start();
  include "config/timeout.php";
  $_SESSION['anggota'] = $r['id_agt'];
  $_SESSION['nim'] = $r['nim'];
  $_SESSION['nama'] = $r['nama'];
  $_SESSION['pass'] = $r['password'];

  // session timeout
  $_SESSION['login'] = 1;
  timer();

  $sid_lama = session_id();
  
  session_regenerate_id();

  $sid_baru = session_id();
  $tgl=date('d/m/Y');
  $dt=date('h:i A');
  mysqli_query($koneksi, "UPDATE tbl_anggota SET id_session='$sid_baru', tgl_log='$tgl', jam_log='$dt' WHERE nim='$nim'");
  echo "<script>window.location=('index.php')</script>";
}
else{
echo "<script>window.alert('Email atau Password Anda tidak benar');
        window.location=('javascript:history.go(-1)')</script>";
}
}
