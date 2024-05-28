<?php
// Bagian Home
if ($_GET['module']=='home'){
 echo"      <div class='row'>
     
        <!-- /.col -->
        <div class='col-md-12'>
          <div class='nav-tabs-custom'>
            <ul class='nav nav-tabs'>
              <li class='active'><a href='#activity' data-toggle='tab'>Syarat Peminjaman Buku</a></li>
     
              <li><a href='#settings' data-toggle='tab'>Daftar Buku</a></li>
            </ul>
            <div class='tab-content'>
              <div class='active tab-pane' id='activity'>
                <!-- Post -->
				<div class='alert alert-danger alert-dismissable'>
                    <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
                    <h4><i class='icon fa fa-warning'></i> Persayaratan Peminjaman Buku Secara Online di $k_k[nama] Tahun Ajaran $k_k[tahun_ajar] !</h4>
                    <p align='justify'>$k_k[isi] </p>
                </div>
              </div>
              <!-- /.tab-pane -->

              <!-- /.tab-pane -->

              <div class='tab-pane' id='settings'>
                                      <div class='panel panel-default'>
                                <div class='panel-heading'>
									Form Daftar Buku
                                 </div>
                                
                                <div class='panel-body'>";


 echo" <form name='form1' id='form_combo' role='form'  method='post' action='proses'>
  <div class='table-responsive'>
                               <table id='dataTables-example' class='table table-striped table-bordered table-hover'>
                                    <thead>
<tr>
                                           <th align='center' >No</th>
   	            <th>Judul Buku</th>
   	            
   	            
   	            <th >Jumlah</th>
             
					  
					    <th>Pilihan</th>
                                        </tr>
                                    </thead><tbody>
				    ";
				
$tebaru=mysqli_query($koneksi, "SELECT * FROM tbl_buku ORDER by judul ");
while ($t=mysqli_fetch_array($tebaru)){	
$no++;
                                    echo"
                                        <tr class='odd gradeX'>
                                            <td>$no</td>
                                            <td>$t[judul]</td>
							<td>$t[pengarang]</td>
							
							
					    <td>
				<center>
				<a href='xxx.php?module=lihatbuku&id=$t[id_buku]' title='lihat'><i class='fa  fa-external-link-square'></i>
				</center></td>
                                        </tr>
                                       
                                  ";
}
                                echo"</tbody></table>
                            </div>
   </form> ";

	      echo" </div></div></div>
              </div>
              <!-- /.tab-pane -->
            </div>
            <!-- /.tab-content -->
          </div>
          <!-- /.nav-tabs-custom -->
        </div>   ";
}


elseif ($_GET['module']=='bukulih'){
 echo"      <div class='row'>
     
        <!-- /.col -->
        <div class='col-md-12'>
          
              <div class='tab-pane' id='settings'>
                                      <div class='panel panel-default'>
                                <div class='panel-heading'>
									Form Daftar Buku
                                 </div>
                                
                                <div class='panel-body'>";


 echo" <form name='form1' id='form_combo' role='form'  method='post' action='proses'>
  <div class='table-responsive'>
                               <table id='dataTables-example' class='table table-striped table-bordered table-hover'>
                                    <thead>
<tr>
                                           <th align='center' >No</th>
   	            <th>Judul Buku</th>
   	            
   	            
   	            <th >Jumlah</th>
             
					  
					    <th>Pilihan</th>
                                        </tr>
                                    </thead><tbody>
				    ";
				
$tebaru=mysqli_query($koneksi, "SELECT * FROM tbl_buku ORDER by judul ");
while ($t=mysqli_fetch_array($tebaru)){	
$no++;
                                    echo"
                                        <tr>
                                            <td>$no</td>
                                            <td>$t[judul]</td>
							<td>$t[pengarang]</td>
							
							
					    <td>
				<center>
				<a href='xxx.php?module=lihatbuku&id=$t[id_buku]' title='lihat'><i class='fa  fa-external-link-square'></i>
				</center></td>
                                        </tr>
                                       
                                  ";
}
                                echo"</tbody></table>
                            </div>
   </form> ";

	      echo" 
              </div>
              <!-- /.tab-pane -->
            </div>
            <!-- /.tab-content -->
          </div>
          <!-- /.nav-tabs-custom -->
        </div>   ";
}
elseif ($_GET['module']=='lihatbuku'){
	$tebaru=mysqli_query($koneksi, "SELECT * FROM tbl_buku WHERE id_buku=$_GET[id]");
$t=mysqli_fetch_array($tebaru);
 echo "<section class='content'>

          <!-- Default box -->
          <div class='box'>
            <div class='box-header with-border'>
              <h4><i class='icon fa fa-warning'></i> Detail Buku</h4>
              <div class='box-tools pull-right'>
           
                <button class='btn btn-box-tool' data-widget='remove' data-toggle='tooltip' title='Remove'><i class='fa fa-times'></i></button>
              </div>
            </div>

  <div class='table-responsive'>
  <table  class='table table-striped table-bordered table-hover'>
  <tr>
    <td  rowspan='9'><center><img width='200' src='foto/data/$t[gambar]'  title='Lihat $t[pengarang]' /></center></td>
    <td >judul Buku </td>
    <td width='8'>:</td>
    <td>$t[judul]</td>
  </tr>
  <tr>
    <td>pengarang </td>
    <td>:</td>
    <td>$t[pengarang]</td>
  </tr>
  <tr>
    <td>Penerbit </td>
    <td>:</td>
    <td>$t[penerbit]</td>
  </tr>
  <tr>
    <td>Stok Buku </td>
    <td>:</td>
    <td>$t[jumlah_buku]</td>
  </tr>
  <tr>
    <td>Tahun Terbit</td>
    <td>:</td>
    <td>$t[thn_terbit]</td>
  </tr>
  <tr>
    <td>Kode Buku</td>
    <td>:</td>
    <td>$t[isbn]</td>
  </tr>
  <tr>
    <td>Lokasi Buku</td>
    <td>:</td>
    <td>$t[lokasi]</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>";
	if( $_SESSION['anggota']==''){
		echo"<a class='btn btn-default' href='xxx.php?module=loginango'>Baca Buku</a> ";
		}else{
			echo"
	<a class='btn btn-default' href='downlot.php?file=$t[file_upload]'>Baca Buku</a>
	 <a  class='btn btn-primary' href=xxx.php?module=pinjambuku&id=$t[id_buku]>Pinjam</a>
	";
	 }
	echo"</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  </table>
                            </div>

            <div class='box-footer'>
              <a class='btn btn-default' href=index.php>Kembali</a> 
			 
            </div><!-- /.box-footer-->
          </div><!-- /.box -->

        </section>";

}




elseif ($_GET['module']=='daftar'){

  echo"      <div class='row'>
     
        <!-- /.col -->
        <div class='col-md-12'>
          <div class='nav-tabs-custom'>
            <ul class='nav nav-tabs'>
              <li class='active'><a href='#activity' data-toggle='tab'>Login</a></li>
     
              <li><a href='#settings' data-toggle='tab'>Daftar Anggota</a></li>
            </ul>
            <div class='tab-content'>
			
              <div class='active tab-pane' id='activity'>
			   <div class='panel panel-default'>
                                <div class='panel-heading'>
									Form login Anggota
                                 </div>
                                
                                <div class='panel-body'>
                <form name='form1' id='form_combo' role='form'  method='post' action='cek_login.php'>
 
        <div style='font-weigth:bold; font-size:15px; border-bottom: 1px solid #000000; margin-bottom:5px;'>Peminjam Buku di beri waktu 1 minggu jika dalam satu minggu buku tidak di kembalikan makan akan kena denda Rp.2.000 /Hari</div>
    	<div class='col-md-12'>
		
		<label>NIK/NISN</label>
			<div class='form-group input-group'>
        <input type='text' class='form-control'  name='nim'  required>
		<span class='input-group-addon'><i class='fa fa-spinner fa' aria-hidden='true'></i></span></div>
		
		<label>Password</label>
			<div class='form-group input-group'>
        <input type='password' class='form-control'   name='pass'  required>
		<span class='input-group-addon'><i class='fa fa-spinner fa' aria-hidden='true'></i></span></div>
				
	</div>
	<br />
		<div class='col-md-12'>
            <button class='btn btn-primary btn-sm' type='submit'>Login</button>
          
			<a href='index.php' class='btn btn-primary btn-sm'>Kembali</a></div>
	</form>
              </div></div></div>
              <!-- /.tab-pane -->

              <!-- /.tab-pane -->

              <div class='tab-pane' id='settings'>
                                      <div class='panel panel-default'>
                                <div class='panel-heading'>
									Form Daftar Anggota
                                 </div>
                                
                                <div class='panel-body'>";


 echo" 
<form name='form1' id='form_combo' role='form'  method='post' action='simpan.php'>
 
        <div style='font-weigth:bold; font-size:15px; border-bottom: 1px solid #000000; margin-bottom:5px;'>Peminjam Buku di beri waktu 1 minggu jika dalam satu minggu buku tidak di kembalikan makan akan kena denda Rp.2.000 /Hari</div>
    	<div class='col-md-6'>
		<label>NIK/NISN</label>
		<div class='form-group input-group'>
      		 <input type='text' class='form-control'   name='nim'>
	
		<span class='input-group-addon'><i class='fa fa-spinner fa' aria-hidden='true'></i></span></div>
		
		<label>Nama Siswa</label>
			<div class='form-group input-group'>
        <input type='text' class='form-control'  name='nama' id='Namalengkap' onKeyUp=\"this.value=this.value.replace(/[^A-Z | a-z]/g,'')\"/ required>
		<span class='input-group-addon'><i class='fa fa-spinner fa' aria-hidden='true'></i></span></div>
		
		<label>Jurusan</label>
			<div class='form-group input-group'>
        <input type='text' class='form-control' name='prodi' id='Namalengkap' onKeyUp=\"this.value=this.value.replace(/[^A-Z | a-z]/g,'')\"/ required>
		<span class='input-group-addon'><i class='fa fa-spinner fa' aria-hidden='true'></i></span></div>
		
	<label>Password</label>
			<div class='form-group input-group'>
        <input type='password' class='form-control' name='password'  required>
		<span class='input-group-addon'><i class='fa fa-spinner fa' aria-hidden='true'></i></span></div>
			
	<label>Konfrimasi Password</label>
			<div class='form-group input-group'>
        <input type='password' class='form-control' name='password1' required>
		<span class='input-group-addon'><i class='fa fa-spinner fa' aria-hidden='true'></i></span></div>
						
	</div>
	<div class='col-md-6'>	
<label>Kelas</label>
		 <div class='form-group input-group'>
		 <input type='text' class='form-control'  name='kelas' required>
		<span class='input-group-addon'><i class='fa fa-spinner fa' aria-hidden='true'></i></span></div>
		
		<label>Jenis Kelamin</label>
		 <div class='form-group input-group'>
		 <input type='text' class='form-control' name='jk' required>
		<span class='input-group-addon'><i class='fa fa-spinner fa' aria-hidden='true'></i></span></div>

<label>Tempat Lahir</label>
			<div class='form-group input-group'>
        <input type='text' class='form-control'  name='tempat_lahir' required>
		<span class='input-group-addon'><i class='fa fa-spinner fa' aria-hidden='true'></i></span></div>
		
<label>Tanggal Lahir</label>
			<div class='form-group input-group'>
        <input type='text' class='form-control'  name='tgl_lahir' required>
		<span class='input-group-addon'><i class='fa fa-spinner fa' aria-hidden='true'></i></span></div>
								
		</div> 
				
		<br />
		<div class='col-md-12'>
            <button class='btn btn-primary btn-sm' type='submit'>Daftar</button>
          
			<a href='index.php' class='btn btn-primary btn-sm'>Kembali</a></div>
   </form> 
 ";

	      echo" </div></div></div>
              </div>
              <!-- /.tab-pane -->
            </div>
            <!-- /.tab-content -->
          </div>
          <!-- /.nav-tabs-custom -->
        </div>   ";

}

elseif ($_GET['module']=='daftarango'){

  echo"      <div class='row'>
     
        <!-- /.col -->
        <div class='col-md-12'>
          <div class='nav-tabs-custom'>
    
                                      <div class='panel panel-default'>
                                <div class='panel-heading'>
									Form Daftar Anggota
                                 </div>
                                
                                <div class='panel-body'>";


 echo" 
<form name='form1' id='form_combo' role='form'  method='post' action='simpan.php'>
 
      	<div class='col-md-6'>
		<label>NIK/NISN</label>
		<div class='form-group input-group'>
      		 <input type='text' class='form-control'   name='nim'>
	
		<span class='input-group-addon'><i class='fa fa-spinner fa' aria-hidden='true'></i></span></div>
		
		<label>Nama Siswa</label>
			<div class='form-group input-group'>
        <input type='text' class='form-control'  name='nama' id='Namalengkap' onKeyUp=\"this.value=this.value.replace(/[^A-Z | a-z]/g,'')\"/ required>
		<span class='input-group-addon'><i class='fa fa-spinner fa' aria-hidden='true'></i></span></div>
		
		<label>Jurusan</label>
			<div class='form-group input-group'>
        <input type='text' class='form-control' name='prodi' id='Namalengkap' onKeyUp=\"this.value=this.value.replace(/[^A-Z | a-z]/g,'')\"/ required>
		<span class='input-group-addon'><i class='fa fa-spinner fa' aria-hidden='true'></i></span></div>
		
	<label>Password</label>
			<div class='form-group input-group'>
        <input type='password' class='form-control' name='password'  required>
		<span class='input-group-addon'><i class='fa fa-spinner fa' aria-hidden='true'></i></span></div>
			
	<label>Konfrimasi Password</label>
			<div class='form-group input-group'>
        <input type='password' class='form-control' name='password1' required>
		<span class='input-group-addon'><i class='fa fa-spinner fa' aria-hidden='true'></i></span></div>
						
	</div>
	<div class='col-md-6'>	
<label>Kelas</label>
		 <div class='form-group input-group'>
		 <input type='text' class='form-control'  name='kelas' required>
		<span class='input-group-addon'><i class='fa fa-spinner fa' aria-hidden='true'></i></span></div>
		
		<label>Jenis Kelamin</label>
		 <div class='form-group input-group'>
		 <input type='text' class='form-control' name='jk' required>
		<span class='input-group-addon'><i class='fa fa-spinner fa' aria-hidden='true'></i></span></div>

<label>Tempat Lahir</label>
			<div class='form-group input-group'>
        <input type='text' class='form-control'  name='tempat_lahir' required>
		<span class='input-group-addon'><i class='fa fa-spinner fa' aria-hidden='true'></i></span></div>
		
<label>Tanggal Lahir</label>
			<div class='form-group input-group'>
        <input type='text' class='form-control'  name='tgl_lahir' required>
		<span class='input-group-addon'><i class='fa fa-spinner fa' aria-hidden='true'></i></span></div>
								
		</div> 
				
		<br />
		<div class='col-md-12'>
            <button class='btn btn-primary btn-sm' type='submit'>Daftar</button>
          
			<a href='index.php' class='btn btn-primary btn-sm'>Kembali</a></div>
   </form> 
 ";

	      echo" 
              </div>
              <!-- /.tab-pane -->
            </div>
            <!-- /.tab-content -->
          </div>
          <!-- /.nav-tabs-custom -->
        </div>   ";

}

elseif ($_GET['module']=='loginango'){
  echo"      <div class='row'>
     
        <!-- /.col -->
        <div class='col-md-12'>
          <div class='nav-tabs-custom'>
    			   <div class='panel panel-default'>
                                <div class='panel-heading'>
									Form login Anggota
                                 </div>
                                
                                <div class='panel-body'>
                <form name='form1' id='form_combo' role='form'  method='post' action='cek_login.php'>
 
        <div class='col-md-12'>
		
		<label>NIK/NISN</label>
			<div class='form-group input-group'>
        <input type='text' class='form-control'  name='nim'  required>
		<span class='input-group-addon'><i class='fa fa-spinner fa' aria-hidden='true'></i></span></div>
		
		<label>Password</label>
			<div class='form-group input-group'>
        <input type='password' class='form-control'   name='pass'  required>
		<span class='input-group-addon'><i class='fa fa-spinner fa' aria-hidden='true'></i></span></div>
				
	</div>
	<br />
		<div class='col-md-12'>
            <button class='btn btn-primary btn-sm' type='submit'>Login</button>
          
			<a href='index.php' class='btn btn-primary btn-sm'>Kembali</a></div>
	</form>
              </div>
			  
			  </div>
              
              <!-- /.tab-pane -->
            </div>
            <!-- /.tab-content -->
          </div>
          <!-- /.nav-tabs-custom -->
        </div>   ";

}

elseif ($_GET['module']=='histori'){
  echo"      <div class='row'>
     
        <!-- /.col -->
        <div class='col-md-12'>
          <div class='nav-tabs-custom'>
    			   <div class='panel panel-default'>
                                <div class='panel-heading'>
									Form login Anggota
                                 </div>
                                
                                <div class='panel-body'>
               <div class='table-responsive'>		
	 <table id='dataTables-example' class='table table-striped table-bordered table-hover'>
                                    <thead>
<tr>
                                          <th align='center' width='5%' >No</th>
   	            <th width='25%'>Judul Buku</th>
   	            <th width='25%'>Peminjam</th>
   	            <th width='15%'>Tgl Pinjam</th>
   	            <th width='15%'>Tgl Kembali</th>
                <th width='10%'>Terlambat</th>
     
                                   </tr></thead>
                    <tbody>";
				    
						$data=mysqli_query($koneksi, "SELECT * FROM tbl_transaksi WHERE status='Pinjam' AND nim=$_SESSION[nim]");
						while($p=mysqli_fetch_array($data)){
									$no++;

                                        echo"<tr>
                                            <td>$no</td>
                                            <td>$p[judul]</td>
                                            <td>$p[nama]</td>
                                            <td>$p[tgl_pinjam]</td>
											<td>$p[tgl_kembali]</td>
											<td>";
					$tgl_dateline=$p['tgl_kembali'];
					$tgl_kembali=date('d-m-Y');
					$lambat=terlambat($tgl_dateline, $tgl_kembali);
					$denda=$lambat*$denda1;
					if ($lambat>0) {
						echo "<font color='red'>$lambat hari<br>(Rp $denda)</font>";
					}
					else {
						echo $lambat." hari";
					} echo" </td>
					                </tr>

                                        

                                    ";
						}
						
                                echo"</tbody></table>
                            </div>
              </div>
			  
			
              
              <!-- /.tab-pane -->
            </div>
            <!-- /.tab-content -->
          </div>
          <!-- /.nav-tabs-custom -->
        </div>   ";

}
elseif ($_GET['module']=='pinjambuku'){

  if(empty($_SESSION['nim']) || empty($_SESSION['pass'])){
  echo "<script>window.alert('Silahkan login atau daftar untuk meminjam buku');
          window.location=('xxx.php?module=daftar')</script>";
  
  }else{	
  $pinjam			= date("d-m-Y");
  $tuju_hari		= mktime(0,0,0,date("n"),date("j")+7,date("Y"));
  $kembali		= date("d-m-Y", $tuju_hari);
    $tebaru=mysqli_query($koneksi, "SELECT * FROM tbl_buku WHERE id_buku=$_GET[id]");
  $t=mysqli_fetch_array($tebaru);
   echo "<section class='content'>
  
            <!-- Default box -->
            <div class='box'>
              <div class='box-header with-border'>
                <h4><i class='icon fa fa-warning'></i> Detail Buku</h4>
                <div class='box-tools pull-right'>
             
                  <button class='btn btn-box-tool' data-widget='remove' data-toggle='tooltip' title='Remove'><i class='fa fa-times'></i></button>
                </div>
              </div>
    <form name='form1' id='form_combo' role='form'  method='post' action='xxx.php?module=prosespinjam'>
   
          <div style='font-weigth:bold; font-size:15px; border-bottom: 1px solid #000000; margin-bottom:5px;'>Peminjam Buku di beri waktu 1 minggu jika dalam satu minggu buku tidak di kembalikan makan akan kena denda Rp.2.000 /Hari</div>
        <div class='col-md-6'>
      <label>Kode Buku</label>
      <div class='form-group input-group'>
          <input type='text' class='form-control'  value='SMA/$t[isbn], $t[id_buku]'  disabled='disabled'>
       <input type='hidden' class='form-control' value='SMA/$t[isbn]'  name='no_daftar'>
        <input type='hidden' class='form-control' value='$t[id_buku]'  name='id_buku'>
        <input type='hidden' class='form-control' value='$_SESSION[nim]'  name='id_mhs'>
      <span class='input-group-addon'><i class='fa fa-spinner fa' aria-hidden='true'></i></span></div>
      
      <label>Judul Buku</label>
        <div class='form-group input-group'>
          <input type='text' class='form-control' value='$t[judul]'  name='buku' id='Namalengkap' onKeyUp=\"this.value=this.value.replace(/[^A-Z | a-z]/g,'')\"/ required>
      <span class='input-group-addon'><i class='fa fa-spinner fa' aria-hidden='true'></i></span></div>
      
      <label>Nama Peminjam Buku</label>
        <div class='form-group input-group'>
          <input type='text' class='form-control' value='$_SESSION[nama]'  name='peminjam' id='Namalengkap' onKeyUp=\"this.value=this.value.replace(/[^A-Z | a-z]/g,'')\"/ required>
      <span class='input-group-addon'><i class='fa fa-spinner fa' aria-hidden='true'></i></span></div>
          
    </div>
    <div class='col-md-6'>	
  <label>Tanggal Pinjam</label>
       <div class='form-group input-group'>
          <input type='text' class='form-control'  value='$pinjam'  disabled='disabled'>
       <input type='hidden' class='form-control' value='$pinjam'  name='tgl_pinjam'>
      <span class='input-group-addon'><i class='fa fa-spinner fa' aria-hidden='true'></i></span></div>
      
      <label>Tanggal Kembali</label>
       <div class='form-group input-group'>
          <input type='text' class='form-control'  value='$kembali'  disabled='disabled'>
       <input type='hidden' class='form-control' value='$kembali'  name='tgl_kembali'>
      <span class='input-group-addon'><i class='fa fa-spinner fa' aria-hidden='true'></i></span></div>
  
  <label>Keterangan </label>
        <div class='form-group input-group'>
          <input type='text' class='form-control'  name='ket' id='Namalengkap' onKeyUp=\"this.value=this.value.replace(/[^A-Z | a-z]/g,'')\"/ required>
      <span class='input-group-addon'><i class='fa fa-spinner fa' aria-hidden='true'></i></span></div>
          
      </div> 
          
      <br />
      <div class='col-md-12'>
              <button class='btn btn-primary btn-sm' type='submit'>Pinjam</button>
            
        <a href='index.php' class='btn btn-primary btn-sm'>Kembali</a></div>
     </form> 
              <div class='box-footer'>
         
              </div><!-- /.box-footer-->
            </div><!-- /.box -->
  
          </section>";
  
  }
  }
// Modul hubungi aksi
elseif ($_GET['module']=='prosespinjam'){

$tgl_pinjam		= isset($_POST['tgl_pinjam']) ? $_POST['tgl_pinjam'] : "";
$tgl_kembali	= isset($_POST['tgl_kembali']) ? $_POST['tgl_kembali'] : "";
$dapat_buku		= isset($_POST['buku']) ? $_POST['buku'] : "";
$id_buku		= isset($_POST['id_buku']) ? $_POST['id_buku'] : "";
$dapat_mhs		= isset($_POST['peminjam']) ? $_POST['peminjam'] : "";
$id_mhs 		= isset($_POST['id_mhs']) ? $_POST['id_mhs'] : "";
$ket			= isset($_POST['ket']) ? $_POST['ket'] : "";

	$query=mysqli_query($koneksi, "SELECT * FROM tbl_buku WHERE judul = '$dapat_buku'");
	while ($hasil=mysqli_fetch_array($query)) {
		$sisa=$hasil['jumlah_buku'];
	} 
		if ($sisa == 0) {
		echo "<script>alert('Stok bukunya telah habis/Sedang Di Pinjam');</script>";
		echo "<meta http-equiv='refresh' content='0; url=index.php'>";
	
	} else {
    $qt = mysqli_query($koneksi, "INSERT INTO tbl_transaksi (kode,judul,nim,nama,tgl_pinjam,tgl_kembali,status,ket) 
                values ('$_POST[no_daftar]','$dapat_buku','$id_mhs','$dapat_mhs','$tgl_pinjam','$tgl_kembali','pinjam','$ket')")
		or die ("Gagal Masuk".mysqli_error($koneksi));
		$qu			= mysqli_query($koneksi, "UPDATE tbl_buku SET jumlah_buku=(jumlah_buku-1) WHERE id_buku=$id_buku ");		
		if ($qt&&$qu) {
	        echo "<script>window.alert('Transaksi Peminjam Berhasil, Silahkan mencetak Butik Pemijaman Buku dan di bawa ke petugas perpustakaan untuk pengambilan buku');
        window.location=('xxx.php?module=pesanwarning&nim=$_POST[id_mhs]')</script>";
		} else {
			echo "<script>alert('Transaksi Gagal');</script>";
				echo "<meta http-equiv='refresh' content='0; url=index.php'>";
	
		}
	}

}

elseif ($_GET['module']=='pesanwarning'){
	$con=mysqli_query($koneksi, "SELECT * FROM tbl_transaksi WHERE nim='$_GET[nim]'");
	$ok=mysqli_fetch_array($con);
 echo "<section class='content'>

          <!-- Default box -->
          <div class='box'>
            <div class='box-header with-border'>
              <h4><i class='icon fa fa-warning'></i> PEMINJAMAN BERHASIL</h4>
              <div class='box-tools pull-right'>
           
                <button class='btn btn-box-tool' data-widget='remove' data-toggle='tooltip' title='Remove'><i class='fa fa-times'></i></button>
              </div>
            </div>
			<div class='alert alert-success alert-dismissable'>
                                      
                    <p align='justify'>
				<center>
<b>Biodata Anda </b>
 <p><b> Nama : $ok[nama]</b></p>
<p> <b>NIK/NISN: $ok[nim]</b></p>
<p> <b>Judul Buku : $ok[judul]</b></p>
 <p>1. Peminjaman Buku Berhasil Silahkan  cetak bukti Pemijaman Buku/Tujukan Bukti Peminjaman Buku Ke Petugas Perpus </p>
</center>
<center><a href='cetak_buku.php?nim=$ok[nim]' target='_blank' class='cetak' ><i class='fa fa-print fa-4x' aria-hidden='true'></i></span></a></center>
					
					</p>
              </div>
            <div class='box-footer'>
              <a href=index.php>Kembali</a>
            </div><!-- /.box-footer-->
          </div><!-- /.box -->

        </section>";

}

// Modul hubungi aksi
elseif ($_GET['module']=='prosespesan'){
$tgl_skrg = date("Y-m-d");
$jam_skrg = gmdate('H:i:s',time()+60*60*7);
    mysqli_query($koneksi, "INSERT INTO calon_mhs(no_daftar, nisn, nama, jurusan, no_hp, email, tplhr, tglhr, jk, agama,
    desa, rt_rw, kc, sekolah_asl, th_ijasah, ayah, ibu, pekerjaan_ortu, status, tgl_daftar, jam_daftar)
             VALUES('$_POST[no_daftar]',
             '$_POST[nisn]',
             '$_POST[nama]',
             '$_POST[jurusan]',
             '$_POST[no_hp]',
             '$_POST[email]',
             '$_POST[tplhr]',
             '$_POST[tglhr]',
             '$_POST[jk]',
             '$_POST[agama]',
             '$_POST[desa]',
             '$_POST[rt_rw]',
             '$_POST[kc]',
             '$_POST[sekolah_asl]',
             '$_POST[th_ijasah]',
             '$_POST[ayah]',
             '$_POST[ibu]',
             '$_POST[pekerjaan_ortu]',
             'baru',
             '$tgl_skrg',
             '$jam_skrg')"); 
 $ok=$_POST['no_daftar'];
echo "<script>window.alert('Kami Akan Segera Memprosesnya dalam waktu 1 x 24 jam Terimakasih Banyak..... ');
        window.location=('xxx.php?module=pesanwarning&no_daftar=$_POST[no_daftar]')</script>";

}


?>

