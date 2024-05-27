<?php
$server = "localhost";
$username = "root";
$password = "";
$database = "perpus";
// Koneksi dan memilih database di server
mysql_connect($server,$username,$password) or die("Koneksi gagal");
mysql_select_db($database) or die("Database tidak bisa dibuka");
switch($_GET[act]) {
	// Tampil Mahasiswa
	default:
echo"<div class='panel panel-primary'>
            <div class='box-header with-border'>
              <h3 class='box-title'>Form Import Exel</h3>
			   <div class='box-header'>
				<a href='mhs_contoh.xls' class='btn btn-info'>Download Template</a>
				</div>
            </div>
            <div class='box-body'>
			<form name='myForm' id='myForm' onSubmit='return validateForm()' action='?module=mahasiswa&act=importexel' method='post' enctype='multipart/form-data'>
     <div class='col-md-12'><div class='form-group'> <input class='form-control' type='file' id='filemahasiswaall' name='filemahasiswaall' /></div></div>
   <br/>
     <input class='btn btn-default' type='submit' name='submit' value='Import' />
		<input type='button' class='btn btn-default' value='Batal' onclick='self.history.back()'>
</form></br>";
if (isset($_POST['submit'])) {
	echo"
<div id='progress' style='width:500px;border:1px solid #ccc;'></div>
<div id='info'></div>";
}
require "excel_reader.php";
//jika tombol import ditekan
if(isset($_POST['submit'])){
    $target = basename($_FILES['filemahasiswaall']['name']) ;
    move_uploaded_file($_FILES['filemahasiswaall']['tmp_name'], $target);
    
    $data = new Spreadsheet_Excel_Reader($_FILES['filemahasiswaall']['name'],false);
    
//    menghitung jumlah baris file xls
    $baris = $data->rowcount($sheet_index=0);
    
//    jika kosongkan data dicentang jalankan kode berikut
    if($_POST['drop']==1){
//             kosongkan tabel mahasiswa
             $truncate ="TRUNCATE TABLE mahasiswa";
             mysql_query($truncate);
    };
    
//    import data excel mulai baris ke-2 (karena tabel xls ada header pada baris 1)
    for ($i=2; $i<=$baris; $i++)
    {
//        menghitung jumlah real data. Karena kita mulai pada baris ke-2, maka jumlah baris yang sebenarnya adalah 
//        jumlah baris data dikurangi 1. Demikian juga untuk awal dari pengulangan yaitu i juga dikurangi 1
        $barisreal = $baris-1;
        $k = $i-1;
        
// menghitung persentase progress
        $percent = intval($k/$barisreal * 100)."%";

// mengupdate progress
        echo '<script language="javascript">
        document.getElementById("progress").innerHTML="<div style=\"width:'.$percent.'; background-color:lightblue\">&nbsp;</div>";
        document.getElementById("info").innerHTML="'.$k.' data berhasil diinsert ('.$percent.' selesai).";
        </script>';

//       membaca data (kolom ke-1 sd terakhir)
   
      $id_session          = $data->val($i, 1);
	  $nim          = $data->val($i, 2);
      $password  = $data->val($i, 3);
      $nama = $data->val($i, 4);
	  $konsen = $data->val($i, 5);
	  $kdjur = $data->val($i, 6);
	  $nama_dosen = $data->val($i, 7);

	 

//      setelah data dibaca, masukkan ke tabel mahasiswa sql
      $query = "INSERT into mahasiswa (id_session,nim,password,nama,konsen,kdjur,nama_dosen)values('$id_session','$nim','$password','$nama','$konsen','$kdjur','$nama_dosen')";
      $hasil = mysql_query($query);
      
      flush();

//      kita tambahkan sleep agar ada penundaan, sehingga progress terbaca bila file yg diimport sedikit
//      pada prakteknya sleep dihapus aja karena bikin lama hehe
      

    }
        
//    hapus file xls yang udah dibaca
    unlink($_FILES['filemahasiswaall']['name']);
	
}
	echo"  </div>
	 </div>";
break;
}
?>