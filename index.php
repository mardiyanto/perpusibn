<!DOCTYPE html>
<?php 
$tanggal=date("dmY");
session_cache_limiter(FALSE); 
session_start();
include "config/koneksi.php";
include "config/fungsi_indotgl.php";
include "config/library.php";
include "config/class_paging.php";
include 'config/transaksi_fungsi.php';
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $k_k['nama']; ?></title>
    <!-- Core CSS - Include with every page -->
    <link href="tema/assets/plugins/bootstrap/bootstrap.css" rel="stylesheet">
    <link href="tema/assets/font-awesome/css/font-awesome.css" rel="stylesheet">
    <link href="tema/assets/plugins/pace/pace-theme-big-counter.css" rel="stylesheet">
    <link href="tema/assets/css/style.css" rel="stylesheet">
    <link href="tema/assets/css/main-style.css" rel="stylesheet">
    <!-- Page-Level CSS -->
    <link href="tema/assets/plugins/dataTables/dataTables.bootstrap.css" rel="stylesheet">
    <script src="tema/assets/plugins/jquery-1.10.2.js"></script>
    <script src="tema/assets/plugins/bootstrap/bootstrap.min.js"></script>
    <script src="tema/assets/plugins/metisMenu/jquery.metisMenu.js"></script>
    <script src="tema/assets/plugins/pace/pace.js"></script>
    <script src="tema/assets/scripts/siminta.js"></script>
    <!-- Page-Level Plugin Scripts-->
    <script src="tema/assets/plugins/dataTables/jquery.dataTables.js"></script>
    <script src="tema/assets/plugins/dataTables/dataTables.bootstrap.js"></script>
    <script>
        $(document).ready(function () {
            $('#dataTables-example').dataTable();
        });
    </script>
</head>
<body>
    <!--  wrapper -->
    <div><br>
        <!-- navbar top -->
        <nav class="navbar navbar-default navbar-fixed-top" role="navigation" id="navbar">
            <!-- navbar-header -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".sidebar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="index.php">
                   <div class="user-text-online"><?php echo $k_k['nama']; ?></div>
                </a>
            </div>
        </nav>
        <!-- end navbar top -->

        <!-- navbar side -->
        <nav class="navbar-default navbar-static-side" role="navigation">
            <!-- sidebar-collapse -->
            <div class="sidebar-collapse">
                <!-- side-menu -->
                <ul class="nav" id="side-menu">
                    <li>
                        <!-- user image section-->
                        <div class="user-section">
                            <div class="user-section-inner">
                                <img src="tema/assets/img/user.jpg" alt="">
                            </div>
                            <div class="user-info">
                                <div><strong>ONLINE</strong></div>
                                <div class="user-text-online">
                                   SYSTEM
                                </div>
                            </div>
                        </div>
                        <!--end user image section-->
                    </li>
             
                    <li class="selected">
                        <a href='xxx.php?module=home'>
                            <i class='fa fa-dashboard'></i> <span>Beranda</span> <i class='fa fa-angle-left pull-right'></i>
                        </a> 
                    </li>
                    <li>
                        <a href='xxx.php?module=bukulih'>
                            <i class="fa fa-bar-chart-o fa-fw"></i><span> Daftar Buku</span> <i class='fa fa-angle-left pull-right'></i>
                        </a> 
                    </li>
                    <?php if ($_SESSION['anggota'] == ''): ?>
                        <li>
                            <a href='xxx.php?module=daftarango'>
                                <i class="fa fa-sitemap fa-fw"></i><span> Daftar Anggota</span> <i class='fa fa-angle-left pull-right'></i>
                            </a> 
                        </li>
                        <li>
                            <a href='xxx.php?module=loginango'>
                                <i class="fa fa-edit fa-fw"></i><span> Login Anggota</span> <i class='fa fa-angle-left pull-right'></i>
                            </a> 
                        </li>
                    <?php else: ?>
                        <li><a href='xxx.php?module=histori'>
                                <i class="fa fa-flask fa-fw"></i><span>Peminjaman Anda</span><i class='fa fa-angle-left pull-right'></i>
                            </a> 
                        </li>
                        <li><a href="logout.php"><i class='fa fa-cog'></i> <span> Logout</span> <i class='fa fa-angle-left pull-right'></i></a></li>

                    <?php endif; ?>
                </ul>
                <!-- end side-menu -->
            </div>
            <!-- end sidebar-collapse -->
        </nav>
        <!-- end navbar side -->
        <!--  page-wrapper -->
        <div id="page-wrapper">
            <div class="row">
                <!-- Page Header -->
                <div class="col-lg-12">
                    <h1 class="page-header">Dashboard</h1>
                </div>
                <!--End Page Header -->
            </div>
            <div class="row">
                <!-- Welcome -->
                <div class="col-lg-12">
                    <div class="alert alert-info">
                        <i class="fa fa-folder-open"></i><b>&nbsp;Hello ! </b>Welcome Back <b><?php echo $k_k['nama']; ?></b>
                        <i class="fa fa-pencil"></i><b>&nbsp;2,000 </b>Support Tickets Pending to Answer. nbsp;
                    </div>
                </div>
                <!--end  Welcome -->
            </div>
            <?php echo "<div class='row'>
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
                                    <h4><i class='icon fa fa-warning'></i> Persyaratan Peminjaman Buku Secara Online di " . $k_k['nama'] . " Tahun Ajaran " . $k_k['tahun_ajar'] . "!</h4>
                                    <p align='justify'>" . $k_k['isi'] . "</p>
                                </div>
                            </div>
                            <!-- /.tab-pane -->
                            <div class='tab-pane' id='settings'>
                                <div class='panel panel-default'>
                                    <div class='panel-heading'>
                                        Form Daftar Buku
                                    </div>
                                    <div class='panel-body'>
                                        <form name='form1' id='form_combo' role='form' method='post' action='proses'>
                                            <div class='table-responsive'>
                                                <table id='dataTables-example' class='table table-striped table-bordered table-hover'>
                                                    <thead>
                                                        <tr>
                                                            <th align='center'>No</th>
                                                            <th>Judul Buku</th>
                                                            <th>Jumlah</th>
                                                            <th>Pilihan</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>";
                                                        $tebaru = mysqli_query($koneksi, "SELECT * FROM tbl_buku ORDER by judul");
                                                        while ($t = mysqli_fetch_array($tebaru)) {
                                                            $no++;
                                                            echo "
                                                                <tr class='odd gradeX'>
                                                                    <td>$no</td>
                                                                    <td>$t[judul]</td>
                                                                    <td>$t[pengarang]</td>
                                                                    <td>
                                                                        <center>
                                                                            <a href='xxx.php?module=lihatbuku&id=$t[id_buku]' title='lihat'><i class='fa fa-external-link-square'></i>
                                                                        </center>
                                                                    </td>
                                                                </tr>";
                                                        }
                                                    echo "</tbody>
                                                </table>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            <!-- /.tab-pane -->
                        </div>
                        <!-- /.tab-content -->
                    </div>
                    <!-- /.nav-tabs-custom -->
                </div>"; ?>
        </div>
        <!-- end page-wrapper -->
    </div>
</body>
</html>
