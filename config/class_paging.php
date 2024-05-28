<?php
// class paging untuk halaman administrator
class Paging{
// Fungsi untuk mencek halaman dan posisi data
function cariPosisi($batas){
if(empty($_GET['halaman'])){
	$posisi=0;
	$_GET['halaman']=1;
}
else{
	$posisi = ($_GET['halaman']-1) * $batas;
}
return $posisi;
}

// Fungsi untuk menghitung total halaman
function jumlahHalaman($jmldata, $batas){
$jmlhalaman = ceil($jmldata/$batas);
return $jmlhalaman;
}

// Fungsi untuk link halaman 1,2,3 (untuk admin)
function navHalaman($halaman_aktif, $jmlhalaman){
$link_halaman = "";

// Link ke halaman pertama (first) dan sebelumnya (prev)
if($halaman_aktif > 1){
	$prev = $halaman_aktif-1;
	$link_halaman .= "<a href=beranda.php?aksi=agenda&halaman=1><< First</a> |
                    <a href=beranda.php?aksi=agenda&halaman=$prev>< Prev</a> | ";
}
else{ 
	$link_halaman .= "<< First | < Prev | ";
}

// Link halaman 1,2,3, ...
$angka = ($halaman_aktif > 3 ? " ... " : " "); 
for ($i=$halaman_aktif-2; $i<$halaman_aktif; $i++){
  if ($i < 1)
  	continue;
	  $angka .= "<a href=beranda.php?aksi=agenda&halaman=$i>$i</a> | ";
  }
	  $angka .= "  <b>$halaman_aktif</b> |  ";
	  
    for($i=$halaman_aktif+1; $i<($halaman_aktif+3); $i++){
    if($i > $jmlhalaman)
      break;
	  $angka .= "<a href=beranda.php?aksi=agenda&halaman=$i>$i</a> |";
    }
	  $angka .= ($halaman_aktif+2<$jmlhalaman ? " ... <a href=beranda.php?aksi=agenda&halaman=$jmlhalaman>$jmlhalaman</a> | " : " ");

$link_halaman .= "$angka";

// Link ke halaman berikutnya (Next) dan terakhir (Last) 
if($halaman_aktif < $jmlhalaman){
	$next = $halaman_aktif+1;
	$link_halaman .= " <a href=beranda.php?aksi=agenda&halaman=$next>Next ></a> |
                     <a href=beranda.php?aksi=agenda&halaman=$jmlhalaman>Last >></a> ";
}
else{
	$link_halaman .= " Next > | Last >>";
}
return $link_halaman;
}
}

// class paging untuk halaman administrator
class Paging2{
// Fungsi untuk mencek halaman dan posisi data
function cariPosisi($batas){
if(empty($_GET['halaman'])){
	$posisi=0;
	$_GET['halaman']=1;
}
else{
	$posisi = ($_GET['halaman']-1) * $batas;
}
return $posisi;
}

// Fungsi untuk menghitung total halaman
function jumlahHalaman($jmldata, $batas){
$jmlhalaman = ceil($jmldata/$batas);
return $jmlhalaman;
}

// Fungsi untuk link halaman 1,2,3 (untuk admin)
function navHalaman($halaman_aktif, $jmlhalaman){
$link_halaman = "";

// Link ke halaman pertama (first) dan sebelumnya (prev)
if($halaman_aktif > 1){
	$prev = $halaman_aktif-1;
	$link_halaman .= "<a href=beranda.php?aksi=bukutamu&halaman=1><< First</a> |
                    <a href=beranda.php?aksi=bukutamu&halaman=$prev>< Prev</a> | ";
}
else{ 
	$link_halaman .= "<< First | < Prev |";
}

// Link halaman 1,2,3, ...
$angka = ($halaman_aktif > 3 ? " ... " : " "); 
for ($i=$halaman_aktif-2; $i<$halaman_aktif; $i++){
  if ($i < 1)
  	continue;
	  $angka .= "<a href=beranda.php?aksi=bukutamu&halaman=$i>$i</a> | ";
  }
	  $angka .= "  <b>$halaman_aktif</b> | ";
	  
    for($i=$halaman_aktif+1; $i<($halaman_aktif+3); $i++){
    if($i > $jmlhalaman)
      break;
	  $angka .= "<a href=beranda.php?aksi=bukutamu&halaman=$i>$i</a> | ";
    }
	  $angka .= ($halaman_aktif+2<$jmlhalaman ? " ... <a href=beranda.php?aksi=bukutamu&halaman=$jmlhalaman>$jmlhalaman</a> | " : " ");

$link_halaman .= "$angka";

// Link ke halaman berikutnya (Next) dan terakhir (Last) 
if($halaman_aktif < $jmlhalaman){
	$next = $halaman_aktif+1;
	$link_halaman .= " <a href=beranda.php?aksi=bukutamu&halaman=$next>Next ></a> |
                     <a href=beranda.php?aksi=bukutamu&halaman=$jmlhalaman>Last >></a> ";
}
else{
	$link_halaman .= " Next > | Last >>";
}
return $link_halaman;
}
}

// class paging untuk halaman administrator
class Paging3{
// Fungsi untuk mencek halaman dan posisi data
function cariPosisi($batas){
if(empty($_GET['halaman'])){
	$posisi=0;
	$_GET['halaman']=1;
}
else{
	$posisi = ($_GET['halaman']-1) * $batas;
}
return $posisi;
}

// Fungsi untuk menghitung total halaman
function jumlahHalaman($jmldata, $batas){
$jmlhalaman = ceil($jmldata/$batas);
return $jmlhalaman;
}

// Fungsi untuk link halaman 1,2,3 (untuk admin)
function navHalaman($halaman_aktif, $jmlhalaman){
$link_halaman = "";

// Link ke halaman pertama (first) dan sebelumnya (prev)
if($halaman_aktif > 1){
	$prev = $halaman_aktif-1;
	$link_halaman .= "<a href=beranda.php?aksi=kategori&id_k=$_GET[id_k]&halaman=1><< First</a> |
                    <a href=beranda.php?aksi=kategori&id_k=$_GET[id_k]&halaman=$prev>< Prev</a> | ";
}
else{ 
	$link_halaman .= "<< First | < Prev  |";
}

// Link halaman 1,2,3, ...
$angka = ($halaman_aktif > 3 ? " ... " : " "); 
for ($i=$halaman_aktif-2; $i<$halaman_aktif; $i++){
  if ($i < 1)
  	continue;
	  $angka .= "<a href=beranda.php?aksi=kategori&id_k=$_GET[id_k]&halaman=$i>$i</a> | ";
  }
	  $angka .= "  <strong>$halaman_aktif</strong>  | ";
	  
    for($i=$halaman_aktif+1; $i<($halaman_aktif+3); $i++){
    if($i > $jmlhalaman)
      break;
	  $angka .= "<a href=beranda.php?aksi=kategori&id_k=$_GET[id_k]&halaman=$i>$i</a> | ";
    }
	  $angka .= ($halaman_aktif+2<$jmlhalaman ? " ... <a href=beranda.php?aksi=kategori&id_k=$_GET[id_k]&halaman=$jmlhalaman>$jmlhalaman</a> | " : " ");

$link_halaman .= "$angka";

// Link ke halaman berikutnya (Next) dan terakhir (Last) 
if($halaman_aktif < $jmlhalaman){
	$next = $halaman_aktif+1;
	$link_halaman .= " <a href=beranda.php?aksi=kategori&id_k=$_GET[id_k]&halaman=$next>Next ></a> |
                     <a href=beranda.php?aksi=kategori&id_k=$_GET[id_k]&halaman=$jmlhalaman>Last >></a> ";
}
else{
	$link_halaman .= " Next > | Last >>";
}
return $link_halaman;
}
}
// class paging untuk halaman administrator
class Paging4{
// Fungsi untuk mencek halaman dan posisi data
function cariPosisi($batas){
if(empty($_GET['halaman'])){
	$posisi=0;
	$_GET['halaman']=1;
}
else{
	$posisi = ($_GET['halaman']-1) * $batas;
}
return $posisi;
}

// Fungsi untuk menghitung total halaman
function jumlahHalaman($jmldata, $batas){
$jmlhalaman = ceil($jmldata/$batas);
return $jmlhalaman;
}

// Fungsi untuk link halaman 1,2,3 (untuk admin)
function navHalaman($halaman_aktif, $jmlhalaman){
$link_halaman = "";

// Link ke halaman pertama (first) dan sebelumnya (prev)
if($halaman_aktif > 1){
	$prev = $halaman_aktif-1;
	$link_halaman .= "<a href=beranda.php?aksi=galeri&halaman=1><< First</a> |
                    <a href=beranda.php?aksi=galeri&halaman=$prev>< Prev</a> | ";
}
else{ 
	$link_halaman .= "<< First | < Prev  ";
}

// Link halaman 1,2,3, ...
$angka = ($halaman_aktif > 3 ? " ... " : " "); 
for ($i=$halaman_aktif-2; $i<$halaman_aktif; $i++){
  if ($i < 1)
  	continue;
	  $angka .= "<a href=beranda.php?aksi=galeri&halaman=$i>$i</a> | ";
  }
	  $angka .= "  <strong>$halaman_aktif</strong> | ";
	  
    for($i=$halaman_aktif+1; $i<($halaman_aktif+3); $i++){
    if($i > $jmlhalaman)
      break;
	  $angka .= "<a href=beranda.php?aksi=galeri&halaman=$i>$i</a> | ";
    }
	  $angka .= ($halaman_aktif+2<$jmlhalaman ? " ... <a href=beranda.php?aksi=galeri&halaman=$jmlhalaman>$jmlhalaman</a> | " : " ");

$link_halaman .= "$angka";

// Link ke halaman berikutnya (Next) dan terakhir (Last) 
if($halaman_aktif < $jmlhalaman){
	$next = $halaman_aktif+1;
	$link_halaman .= " <a href=beranda.php?aksi=galeri&halaman=$next>Next ></a> |
                     <a href=beranda.php?aksi=galeri&halaman=$jmlhalaman>Last >></a>  ";
}
else{
	$link_halaman .= " Next > | Last >>";
}
return $link_halaman;
}
}
// class paging untuk halaman administrator
class Paging5{
// Fungsi untuk mencek halaman dan posisi data
function cariPosisi($batas){
if(empty($_GET['halaman'])){
	$posisi=0;
	$_GET['halaman']=1;
}
else{
	$posisi = ($_GET['halaman']-1) * $batas;
}
return $posisi;
}

// Fungsi untuk menghitung total halaman
function jumlahHalaman($jmldata, $batas){
$jmlhalaman = ceil($jmldata/$batas);
return $jmlhalaman;
}

// Fungsi untuk link halaman 1,2,3 (untuk admin)
function navHalaman($halaman_aktif, $jmlhalaman){
$link_halaman = "";

// Link ke halaman pertama (first) dan sebelumnya (prev)
if($halaman_aktif > 1){
	$prev = $halaman_aktif-1;
	$link_halaman .= "<a href=index.php?aksi=berita&halaman=1><< First</a> |
                    <a href=index.php?aksi=berita&halaman=$prev>< Prev</a> | ";
}
else{ 
	$link_halaman .= "<< First | < Prev  ";
}

// Link halaman 1,2,3, ...
$angka = ($halaman_aktif > 3 ? " ... " : " "); 
for ($i=$halaman_aktif-2; $i<$halaman_aktif; $i++){
  if ($i < 1)
  	continue;
	  $angka .= "<a href=index.php?aksi=berita&halaman=$i>$i</a> | ";
  }
	  $angka .= "  <strong>$halaman_aktif</strong> | ";
	  
    for($i=$halaman_aktif+1; $i<($halaman_aktif+3); $i++){
    if($i > $jmlhalaman)
      break;
	  $angka .= "<a href=index.php?aksi=berita&halaman=$i>$i</a> | ";
    }
	  $angka .= ($halaman_aktif+2<$jmlhalaman ? " ... <a href=index.php?aksi=berita&halaman=$jmlhalaman>$jmlhalaman</a> | " : " ");

$link_halaman .= "$angka";

// Link ke halaman berikutnya (Next) dan terakhir (Last) 
if($halaman_aktif < $jmlhalaman){
	$next = $halaman_aktif+1;
	$link_halaman .= " <a href=index.php?aksi=berita&halaman=$next>Next ></a> |
                     <a href=index.php?aksi=berita&halaman=$jmlhalaman>Last >></a>  ";
}
else{
	$link_halaman .= " Next > | Last >>";
}
return $link_halaman;
}
}
// class paging untuk halaman administrator
class Paging6{
// Fungsi untuk mencek halaman dan posisi data
function cariPosisi($batas){
if(empty($_GET['halaman'])){
	$posisi=0;
	$_GET['halaman']=1;
}
else{
	$posisi = ($_GET['halaman']-1) * $batas;
}
return $posisi;
}

// Fungsi untuk menghitung total halaman
function jumlahHalaman($jmldata, $batas){
$jmlhalaman = ceil($jmldata/$batas);
return $jmlhalaman;
}

// Fungsi untuk link halaman 1,2,3 (untuk admin)
function navHalaman($halaman_aktif, $jmlhalaman){
$link_halaman = "";

// Link ke halaman pertama (first) dan sebelumnya (prev)
if($halaman_aktif > 1){
	$prev = $halaman_aktif-1;
	$link_halaman .= "<a href=beranda.php?aksi=pegawai&halaman=1><< First</a> |
                    <a href=beranda.php?aksi=pegawai&halaman=$prev>< Prev</a> | ";
}
else{ 
	$link_halaman .= "<< First | < Prev  ";
}

// Link halaman 1,2,3, ...
$angka = ($halaman_aktif > 3 ? " ... " : " "); 
for ($i=$halaman_aktif-2; $i<$halaman_aktif; $i++){
  if ($i < 1)
  	continue;
	  $angka .= "<a href=beranda.php?aksi=pegawai&halaman=$i>$i</a> | ";
  }
	  $angka .= "  <strong>$halaman_aktif</strong> | ";
	  
    for($i=$halaman_aktif+1; $i<($halaman_aktif+3); $i++){
    if($i > $jmlhalaman)
      break;
	  $angka .= "<a href=beranda.php?aksi=pegawai&halaman=$i>$i</a> | ";
    }
	  $angka .= ($halaman_aktif+2<$jmlhalaman ? " ... <a href=beranda.php?aksi=pegawai&halaman=$jmlhalaman>$jmlhalaman</a> | " : " ");

$link_halaman .= "$angka";

// Link ke halaman berikutnya (Next) dan terakhir (Last) 
if($halaman_aktif < $jmlhalaman){
	$next = $halaman_aktif+1;
	$link_halaman .= " <a href=beranda.php?aksi=pegawai&halaman=$next>Next ></a> |
                     <a href=beranda.php?aksi=pegawai&halaman=$jmlhalaman>Last >></a>  ";
}
else{
	$link_halaman .= " Next > | Last >>";
}
return $link_halaman;
}
}
// class paging untuk halaman administrator
class Paging7{
// Fungsi untuk mencek halaman dan posisi data
function cariPosisi($batas){
if(empty($_GET['halaman'])){
	$posisi=0;
	$_GET['halaman']=1;
}
else{
	$posisi = ($_GET['halaman']-1) * $batas;
}
return $posisi;
}

// Fungsi untuk menghitung total halaman
function jumlahHalaman($jmldata, $batas){
$jmlhalaman = ceil($jmldata/$batas);
return $jmlhalaman;
}

// Fungsi untuk link halaman 1,2,3 (untuk admin)
function navHalaman($halaman_aktif, $jmlhalaman){
$link_halaman = "";

// Link ke halaman pertama (first) dan sebelumnya (prev)
if($halaman_aktif > 1){
	$prev = $halaman_aktif-1;
	$link_halaman .= "<a href=index.php?aksi=galeri&halaman=1><< First</a> |
                    <a href=index.php?aksi=galeri&halaman=$prev>< Prev</a> | ";
}
else{ 
	$link_halaman .= "<< First | < Prev  ";
}

// Link halaman 1,2,3, ...
$angka = ($halaman_aktif > 3 ? " ... " : " "); 
for ($i=$halaman_aktif-2; $i<$halaman_aktif; $i++){
  if ($i < 1)
  	continue;
	  $angka .= "<a href=index.php?aksi=galeri&halaman=$i>$i</a> | ";
  }
	  $angka .= "  <strong>$halaman_aktif</strong> | ";
	  
    for($i=$halaman_aktif+1; $i<($halaman_aktif+3); $i++){
    if($i > $jmlhalaman)
      break;
	  $angka .= "<a href=index.php?aksi=galeri&halaman=$i>$i</a> | ";
    }
	  $angka .= ($halaman_aktif+2<$jmlhalaman ? " ... <a href=index.php?aksi=kategori&halaman=$jmlhalaman>$jmlhalaman</a> | " : " ");

$link_halaman .= "$angka";

// Link ke halaman berikutnya (Next) dan terakhir (Last) 
if($halaman_aktif < $jmlhalaman){
	$next = $halaman_aktif+1;
	$link_halaman .= " <a href=index.php?aksi=galeri&halaman=$next>Next ></a> |
                     <a href=index.php?aksi=galeri&halaman=$jmlhalaman>Last >></a>  ";
}
else{
	$link_halaman .= " Next > | Last >>";
}
return $link_halaman;
}
}
// class paging untuk halaman administrator
class Paging8{
// Fungsi untuk mencek halaman dan posisi data
function cariPosisi($batas){
if(empty($_GET['halaman'])){
	$posisi=0;
	$_GET['halaman']=1;
}
else{
	$posisi = ($_GET['halaman']-1) * $batas;
}
return $posisi;
}

// Fungsi untuk menghitung total halaman
function jumlahHalaman($jmldata, $batas){
$jmlhalaman = ceil($jmldata/$batas);
return $jmlhalaman;
}

// Fungsi untuk link halaman 1,2,3 (untuk admin)
function navHalaman($halaman_aktif, $jmlhalaman){
$link_halaman = "";

// Link ke halaman pertama (first) dan sebelumnya (prev)
if($halaman_aktif > 1){
	$prev = $halaman_aktif-1;
	$link_halaman .= "<a href=index.php?aksi=inventaris&halaman=1><< First</a> |
                    <a href=index.php?aksi=inventaris&halaman=$prev>< Prev</a> | ";
}
else{ 
	$link_halaman .= "<< First | < Prev  ";
}

// Link halaman 1,2,3, ...
$angka = ($halaman_aktif > 3 ? " ... " : " "); 
for ($i=$halaman_aktif-2; $i<$halaman_aktif; $i++){
  if ($i < 1)
  	continue;
	  $angka .= "<a href=index.php?aksi=inventaris&halaman=$i>$i</a> | ";
  }
	  $angka .= "  <strong>$halaman_aktif</strong> | ";
	  
    for($i=$halaman_aktif+1; $i<($halaman_aktif+3); $i++){
    if($i > $jmlhalaman)
      break;
	  $angka .= "<a href=index.php?aksi=inventaris&halaman=$i>$i</a> | ";
    }
	  $angka .= ($halaman_aktif+2<$jmlhalaman ? " ... <a href=index.php?aksi=inventaris&halaman=$jmlhalaman>$jmlhalaman</a> | " : " ");

$link_halaman .= "$angka";

// Link ke halaman berikutnya (Next) dan terakhir (Last) 
if($halaman_aktif < $jmlhalaman){
	$next = $halaman_aktif+1;
	$link_halaman .= " <a href=index.php?aksi=inventaris&halaman=$next>Next ></a> |
                     <a href=index.php?aksi=inventaris&halaman=$jmlhalaman>Last >></a>  ";
}
else{
	$link_halaman .= " Next > | Last >>";
}
return $link_halaman;
}
}
// class paging untuk halaman administrator
class Paging9{
// Fungsi untuk mencek halaman dan posisi data
function cariPosisi($batas){
if(empty($_GET['halaman'])){
	$posisi=0;
	$_GET['halaman']=1;
}
else{
	$posisi = ($_GET['halaman']-1) * $batas;
}
return $posisi;
}

// Fungsi untuk menghitung total halaman
function jumlahHalaman($jmldata, $batas){
$jmlhalaman = ceil($jmldata/$batas);
return $jmlhalaman;
}

// Fungsi untuk link halaman 1,2,3 (untuk admin)
function navHalaman($halaman_aktif, $jmlhalaman){
$link_halaman = "";

// Link ke halaman pertama (first) dan sebelumnya (prev)
if($halaman_aktif > 1){
	$prev = $halaman_aktif-1;
	$link_halaman .= "<a href=index.php?aksi=kepegawaian&halaman=1><< First</a> |
                    <a href=index.php?aksi=kepegawaian&halaman=$prev>< Prev</a> | ";
}
else{ 
	$link_halaman .= "<< First | < Prev  ";
}

// Link halaman 1,2,3, ...
$angka = ($halaman_aktif > 3 ? " ... " : " "); 
for ($i=$halaman_aktif-2; $i<$halaman_aktif; $i++){
  if ($i < 1)
  	continue;
	  $angka .= "<a href=index.php?aksi=kepegawaian&halaman=$i>$i</a> | ";
  }
	  $angka .= "  <strong>$halaman_aktif</strong> | ";
	  
    for($i=$halaman_aktif+1; $i<($halaman_aktif+3); $i++){
    if($i > $jmlhalaman)
      break;
	  $angka .= "<a href=index.php?aksi=kepegawaian&halaman=$i>$i</a> | ";
    }
	  $angka .= ($halaman_aktif+2<$jmlhalaman ? " ... <a href=index.php?aksi=kepegawaian&halaman=$jmlhalaman>$jmlhalaman</a> | " : " ");

$link_halaman .= "$angka";

// Link ke halaman berikutnya (Next) dan terakhir (Last) 
if($halaman_aktif < $jmlhalaman){
	$next = $halaman_aktif+1;
	$link_halaman .= " <a href=index.php?aksi=kepegawaian&halaman=$next>Next ></a> |
                     <a href=index.php?aksi=kepegawaian&halaman=$jmlhalaman>Last >></a>  ";
}
else{
	$link_halaman .= " Next > | Last >>";
}
return $link_halaman;
}
}
// class paging untuk halaman administrator
class Paging10{
// Fungsi untuk mencek halaman dan posisi data
function cariPosisi($batas){
if(empty($_GET['halaman'])){
	$posisi=0;
	$_GET['halaman']=1;
}
else{
	$posisi = ($_GET['halaman']-1) * $batas;
}
return $posisi;
}

// Fungsi untuk menghitung total halaman
function jumlahHalaman($jmldata, $batas){
$jmlhalaman = ceil($jmldata/$batas);
return $jmlhalaman;
}

// Fungsi untuk link halaman 1,2,3 (untuk admin)
function navHalaman($halaman_aktif, $jmlhalaman){
$link_halaman = "";

// Link ke halaman pertama (first) dan sebelumnya (prev)
if($halaman_aktif > 1){
	$prev = $halaman_aktif-1;
	$link_halaman .= "<a href=index.php?aksi=agenda&halaman=1><< First</a> |
                    <a href=index.php?aksi=agenda&halaman=$prev>< Prev</a> | ";
}
else{ 
	$link_halaman .= "<< First | < Prev  ";
}

// Link halaman 1,2,3, ...
$angka = ($halaman_aktif > 3 ? " ... " : " "); 
for ($i=$halaman_aktif-2; $i<$halaman_aktif; $i++){
  if ($i < 1)
  	continue;
	  $angka .= "<a href=index.php?aksi=agenda&halaman=$i>$i</a> | ";
  }
	  $angka .= "  <strong>$halaman_aktif</strong> | ";
	  
    for($i=$halaman_aktif+1; $i<($halaman_aktif+3); $i++){
    if($i > $jmlhalaman)
      break;
	  $angka .= "<a href=index.php?aksi=agenda&halaman=$i>$i</a> | ";
    }
	  $angka .= ($halaman_aktif+2<$jmlhalaman ? " ... <a href=index.php?aksi=agenda&halaman=$jmlhalaman>$jmlhalaman</a> | " : " ");

$link_halaman .= "$angka";

// Link ke halaman berikutnya (Next) dan terakhir (Last) 
if($halaman_aktif < $jmlhalaman){
	$next = $halaman_aktif+1;
	$link_halaman .= " <a href=index.php?aksi=agenda&halaman=$next>Next ></a> |
                     <a href=index.php?aksi=agenda&halaman=$jmlhalaman>Last >></a>  ";
}
else{
	$link_halaman .= " Next > | Last >>";
}
return $link_halaman;
}
}

// class paging untuk halaman administrator
class Paging11{
// Fungsi untuk mencek halaman dan posisi data
function cariPosisi($batas){
if(empty($_GET['halaman'])){
	$posisi=0;
	$_GET['halaman']=1;
}
else{
	$posisi = ($_GET['halaman']-1) * $batas;
}
return $posisi;
}

// Fungsi untuk menghitung total halaman
function jumlahHalaman($jmldata, $batas){
$jmlhalaman = ceil($jmldata/$batas);
return $jmlhalaman;
}

// Fungsi untuk link halaman 1,2,3 (untuk admin)
function navHalaman($halaman_aktif, $jmlhalaman){
$link_halaman = "";

// Link ke halaman pertama (first) dan sebelumnya (prev)
if($halaman_aktif > 1){
	$prev = $halaman_aktif-1;
	$link_halaman .= "<a href=index.php?aksi=bukutamu&halaman=1><< First</a> |
                    <a href=index.php?aksi=bukutamu&halaman=$prev>< Prev</a> | ";
}
else{ 
	$link_halaman .= "<< First | < Prev  ";
}

// Link halaman 1,2,3, ...
$angka = ($halaman_aktif > 3 ? " ... " : " "); 
for ($i=$halaman_aktif-2; $i<$halaman_aktif; $i++){
  if ($i < 1)
  	continue;
	  $angka .= "<a href=index.php?aksi=bukutamu&halaman=$i>$i</a> | ";
  }
	  $angka .= "  <strong>$halaman_aktif</strong> | ";
	  
    for($i=$halaman_aktif+1; $i<($halaman_aktif+3); $i++){
    if($i > $jmlhalaman)
      break;
	  $angka .= "<a href=index.php?aksi=bukutamu&halaman=$i>$i</a> | ";
    }
	  $angka .= ($halaman_aktif+2<$jmlhalaman ? " ... <a href=index.php?aksi=bukutamu&halaman=$jmlhalaman>$jmlhalaman</a> | " : " ");

$link_halaman .= "$angka";

// Link ke halaman berikutnya (Next) dan terakhir (Last) 
if($halaman_aktif < $jmlhalaman){
	$next = $halaman_aktif+1;
	$link_halaman .= " <a href=index.php?aksi=bukutamu&halaman=$next>Next ></a> |
                     <a href=index.php?aksi=bukutamu&halaman=$jmlhalaman>Last >></a>  ";
}
else{
	$link_halaman .= " Next > | Last >>";
}
return $link_halaman;
}
}
// class paging untuk halaman administrator
class Paging12{
// Fungsi untuk mencek halaman dan posisi data
function cariPosisi($batas){
if(empty($_GET['halaman'])){
	$posisi=0;
	$_GET['halaman']=1;
}
else{
	$posisi = ($_GET['halaman']-1) * $batas;
}
return $posisi;
}

// Fungsi untuk menghitung total halaman
function jumlahHalaman($jmldata, $batas){
$jmlhalaman = ceil($jmldata/$batas);
return $jmlhalaman;
}

// Fungsi untuk link halaman 1,2,3 (untuk admin)
function navHalaman($halaman_aktif, $jmlhalaman){
$link_halaman = "";

// Link ke halaman pertama (first) dan sebelumnya (prev)
if($halaman_aktif > 1){
	$prev = $halaman_aktif-1;
	$link_halaman .= "<a href=beranda.php?aksi=kepegawaian&halaman=1><< First</a> |
                    <a href=beranda.php?aksi=kepegawaian&halaman=$prev>< Prev</a> | ";
}
else{ 
	$link_halaman .= "<< First | < Prev  ";
}

// Link halaman 1,2,3, ...
$angka = ($halaman_aktif > 3 ? " ... " : " "); 
for ($i=$halaman_aktif-2; $i<$halaman_aktif; $i++){
  if ($i < 1)
  	continue;
	  $angka .= "<a href=beranda.php?aksi=kepegawaian&halaman=$i>$i</a> | ";
  }
	  $angka .= "  <strong>$halaman_aktif</strong> | ";
	  
    for($i=$halaman_aktif+1; $i<($halaman_aktif+3); $i++){
    if($i > $jmlhalaman)
      break;
	  $angka .= "<a href=beranda.php?aksi=kepegawaian&halaman=$i>$i</a> | ";
    }
	  $angka .= ($halaman_aktif+2<$jmlhalaman ? " ... <a href=beranda.php?aksi=kepegawaian&halaman=$jmlhalaman>$jmlhalaman</a> | " : " ");

$link_halaman .= "$angka";

// Link ke halaman berikutnya (Next) dan terakhir (Last) 
if($halaman_aktif < $jmlhalaman){
	$next = $halaman_aktif+1;
	$link_halaman .= " <a href=beranda.php?aksi=kepegawaian&halaman=$next>Next ></a> |
                     <a href=beranda.php?aksi=kepegawaian&halaman=$jmlhalaman>Last >></a>  ";
}
else{
	$link_halaman .= " Next > | Last >>";
}
return $link_halaman;
}
}
?>


