<?

    include "config/koneksi.php";
	include 'config/transaksi_fungsi.php';
?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>:PMP ONLINE: STMIK PRINGSEWU</title>
	    <!-- Bootstrap 3.3.5 -->
		   <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <link rel="stylesheet" href="sys/bootstrap/bootstrap/css/bootstrap.min.css">
    <!-- Font Awesome -->
      <link rel="stylesheet" href="sys/bootstrap/font/css/font-awesome.min.css">
    <!-- Ionicons -->
  <link rel="stylesheet" href="sys/bootstrap/plugins/datatables/dataTables.bootstrap.css">
    <!-- daterange picker -->
    <link rel="stylesheet" href="sys/bootstrap/plugins/select2/select2.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="sys/bootstrap/dist/css/AdminLTE.min.css">
	
    <!-- AdminLTE Skins. Choose a skin from the css/skins
         folder instead of downloading all of them to reduce the load. -->
    <link rel="stylesheet" href="sys/bootstrap/dist/css/skins/_all-skins.min.css">
	 	<script src="sys/bootstrap/plugins/ckeditor/ckeditor.js"></script>  
		 <script src="sys/bootstrap/plugins/jQuery/jQuery-2.1.4.min.js"></script>
    <!-- DataTables -->
    <script src="sys/bootstrap/plugins/datatables/jquery.dataTables.min.js"></script>
    <script src="sys/bootstrap/plugins/datatables/dataTables.bootstrap.min.js"></script>

    <!-- page script -->
    <script>
      $(function () {
        $("#example1").DataTable();
        $('#example2').DataTable({
          "paging": true,
          "lengthChange": false,
          "searching": false,
          "ordering": true,
          "info": true,
          "autoWidth": false
        });
      });
    </script>
<script src="sys/bootstrap/bootstrap/js/bootstrap.min.js"></script>
<!-- FastClick -->
<script src="sys/bootstrap/plugins/fastclick/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="sys/bootstrap/dist/js/app.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="sys/bootstrap/dist/js/demo.js"></script>
<link rel="stylesheet" href="sys/bootstrap/plugins/datepicker/datepicker3.css"/>
	         <script src="sys/bootstrap/plugins/datepicker/bootstrap-datepicker.js"></script>
        <script type="text/javascript">
            $(document).ready(function () {
                $('#tanggal').datepicker({
                    format: "dd-mm-yyyy",
                    autoclose:true
                });
            });
        </script>

  </head>
  <body class="hold-transition skin-blue sidebar-mini">
  <header class="main-header">
    <!-- Logo -->
    <a href="#" class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini"><b>P</b>MB</span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg"><b>STIT</b> pmb</span>
    </a>
    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top">
      <!-- Sidebar toggle button-->
      <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </a>

      <div class="navbar-custom-menu">

      </div>
    </nav>
  </header>


    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
       PENDAFTARAN ONLINE MAHASISWA BARU
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Examples</a></li>
        <li class="active">User profile</li>
      </ol>
    </section>

        <!-- Main content -->
        <section class="content">
     
     <div class='table-responsive'>
                               <table id='example1' class='table table-bordered table-striped'>
                                    <thead>
<tr>
                                           <th align='center' width='5%' >No</th>
   	            <th width='30%'>Judul Buku</th>
   	            <th width='20%'>Pengarang</th>
   	            <th width='15%'>Penerbit</th>
   	            <th width='15%'>Jumlah</th>
             
					  
					    <th>Pilihan</th>
                                        </tr>
                                    </thead><tbody>
				  <?
				
$tebaru = mysqli_query($koneksi, "SELECT * FROM tbl_buku ORDER BY judul");
while ($t = mysqli_fetch_assoc($tebaru)) {
$no++;
                                    echo"
                                        <tr>
                                            <td>$no</td>
                                            <td>$t[judul]</td>
							<td>$t[pengarang]</td>
							<td >$t[penerbit]</td>
							<td >$t[jumlah_buku]</td>
					    <td>
				<center>
				<a href='index.php?aksi=editbuku&id=$t[id]' title='Edit'><i class='fa fa-pencil'></i></a>&nbsp;
				<a href='master/buku.php?id=$t[id]&act=hapus&gbr=$t[gambar]' onclick=\"return confirm ('Apakah yakin ingin menghapus $t[judul] ?')\" title='Hapus'><i class='fa fa-remove'></i>&nbsp;
				<a href='index.php?aksi=editbuku&id=$t[id]' title='lihat'><i class='fa  fa-external-link-square'></i>
				</center></td>
                                        </tr>
                                       
                                  ";
}
                              ?> </tbody></table>
                            </div>
		
            </section><!-- /.content -->
    
       <footer class="main">
    <div class="pull-right hidden-xs">
      <b>Version</b> 2.3.8
    </div>
    <strong>Copyright &copy; 2014-2016 <a href="#">Almsaeed Studio / Web Progremer (<?php echo"$k_k[akabest]";?> )</a>.</strong> All rights
    reserved.
  </footer>
      <div class="control-sidebar-bg"></div>
    </div><!-- ./wrapper -->
	   
  </body>
</html>




