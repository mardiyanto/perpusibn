<?php
include "config/koneksi.php";
function anti_injection($data){
  $filter = mysqli_real_escape_string($koneksi, stripslashes(strip_tags(htmlspecialchars($data,ENT_QUOTES))));
  return $filter;
}

$username = anti_injection($_POST['user']);
$pass     = anti_injection(md5($_POST['pass']));

// pastikan username dan password adalah berupa huruf atau angka.
if (!ctype_alnum($username) OR !ctype_alnum($pass)){
echo "<script>window.location=('javascript:history.go(-1)')</script>";
}
else{
$login=mysqli_query($koneksi, "SELECT * FROM users WHERE BINARY username='$username' AND password='$pass'");
$ketemu=mysqli_num_rows($login);
$r=mysqli_fetch_array($login);

// Apabila username dan password ditemukan
if ($ketemu > 0){
  session_start();
   include "config/timeout.php";
 $_SESSION['anggota']  = $r['id_agt'];
  $_SESSION['user']     = $r['username'];
  $_SESSION['nama']  = $r['nama_lengkap'];
  $_SESSION['pass']     = $r['password'];

  
  // session timeout
  $_SESSION['login'] = 1;
  timer();

	$sid_lama = session_id();
	
	session_regenerate_id();

	$sid_baru = session_id();
 $tgl=date('d/m/Y');
 $dt=date('h:i A');
  mysqli_query($koneksi, "UPDATE users SET id_session='$sid_baru', tgl_log='$tgl', jam_log='$dt' WHERE username='$username'");
  echo "<script>window.location=('jsx/index.php?aksi=home')</script>";
}
else{
echo "<script>window.location=('login.php?salah=salah')</script>";
}
}
?>

