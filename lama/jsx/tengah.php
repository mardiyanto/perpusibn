<?php

if($aksi=='home'){
echo "
<div class='row'>
    <div class='col-lg-12'>
        <div class='panel panel-default'>
            <div class='panel-heading'>
                Sambutan
            </div>
            <div class='panel-body'>
                <p>Selamat Datang Di halaman Admin, Silahkan Pilih menu untuk pengaturan data yang di butuhkan guna mendapatkan hasil yang maksimal sesuai keinginan.</p>
            </div>
        </div>
    </div>
</div>

<div class='row'>
    <div class='col-xs-12'>
        <div class='panel panel-primary'>
            <div class='box-header'>
                <h3 class='box-title'>Daftar Peminjam buku</h3>
            </div>
            <div class='box-body'>
                <div class='table-responsive'>
                    <div class='col-lg-3 col-xs-6'>
                        <div class='small-box bg-aqua'>
                            <div class='icon'>
                                <i class='fa fa-newspaper-o'></i>
                            </div>
                            <div class='inner'>
                                <h3><i class='fa fa-newspaper-o'></i></h3>
                                <p>Buku</p>
                            </div>
                            <a href='index.php?aksi=buku' class='small-box-footer'>
                                More info <i class='fa fa-arrow-circle-right'></i>
                            </a>
                        </div>
                    </div>
                    <div class='col-lg-3 col-xs-6'>
                        <div class='small-box bg-yellow'>
                            <div class='icon'>
                                <i class='fa fa-child'></i>
                            </div>
                            <div class='inner'>
                                <h3><i class='fa fa-child'></i></h3>
                                <p>Laporan Buku</p>
                            </div>
                            <a href='index.php?aksi=laporan' class='small-box-footer'>
                                More info <i class='fa fa-arrow-circle-right'></i>
                            </a>
                        </div>
                    </div>
                    <div class='col-lg-3 col-xs-6'>
                        <div class='small-box bg-red'>
                            <div class='icon'>
                                <i class='fa fa-group'></i>
                            </div>
                            <div class='inner'>
                                <h3><i class='fa fa-group'></i></h3>
                                <p>Anggota</p>
                            </div>
                            <a href='index.php?aksi=anggota' class='small-box-footer'>
                                More info <i class='fa fa-arrow-circle-right'></i>
                            </a>
                        </div>
                    </div>
                    <div class='col-lg-3 col-xs-6'>
                        <div class='small-box bg-green'>
                            <div class='icon'>
                                <i class='fa fa-cc-visa'></i>
                            </div>
                            <div class='inner'>
                                <h3><i class='fa fa-cc-visa'></i></h3>
                                <p>Profil</p>
                            </div>
                            <a href='index.php?aksi=profil' class='small-box-footer'>
                                More info <i class='fa fa-arrow-circle-right'></i>
                            </a>
                        </div>
                    </div>
                    <div class='col-lg-3 col-xs-6'>
                        <div class='small-box bg-purple'>
                            <div class='icon'>
                                <i class='fa fa-mars-double'></i>
                            </div>
                            <div class='inner'>
                                <h3><i class='fa fa-mars-double'></i></h3>
                                <p>Admin</p>
                            </div>
                            <a href='index.php?aksi=admin' class='small-box-footer'>
                                More info <i class='fa fa-arrow-circle-right'></i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
";
}

elseif($aksi=='transaksibukukembali'){
    $id = $_GET['id'];
    $judul = $_GET['judul'];

    $us = mysqli_query($koneksi, "UPDATE tbl_transaksi SET status='Kembali' WHERE id='$id'") or die ("Gagal update: ".mysqli_error($koneksi));
    $uj = mysqli_query($koneksi, "UPDATE tbl_buku SET jumlah_buku=(jumlah_buku+1) WHERE judul='$judul'") or die ("Gagal update: ".mysqli_error($koneksi));

    if ($us || $uj) {
        echo "<script>alert('Berhasil Dikembalikan')</script>";
        echo "<meta http-equiv='refresh' content='0; url=index.php?aksi=kembalibuku'>";
    } else {
        echo "<script>alert('Gagal Dikembalikan')</script>";
        echo "<meta http-equiv='refresh' content='0; url=index.php?aksi=pinjam'>";
    }
}

elseif($aksi=='perpananjang'){
    $id = $_GET['id'];
    $judul = $_GET['judul'];
    $tgl_kembali = $_GET['tgl_kembali'];
    $lambat = $_GET['lambat'];

    if($lambat > 7) {
        echo "<script>alert('Buku yang dipinjam tidak dapat diperpanjang, karena sudah terlambat lebih dari 7 hari. Kembalikan dahulu, kemudian pinjam kembali !');</script>";
        echo "<meta http-equiv='refresh' content='0; url=index.php?aksi=pinjam'>";
    } else {
        $pecah = explode("-", $tgl_kembali);
        $next_7_hari = mktime(0,0,0,$pecah[1],$pecah[0]+7,$pecah[2]);
        $hari_next = date("d-m-Y", $next_7_hari);

        $update_tgl_kembali = mysqli_query($koneksi, "UPDATE tbl_transaksi SET tgl_kembali='$hari_next' WHERE id='$id'");

        if ($update_tgl_kembali) {
            echo "<script>alert('Berhasil Diperpanjang');</script>";
            echo "<meta http-equiv='refresh' content='0; url=index.php?aksi=pinjam'>";
        } else {
            echo "<script>alert('Gagal Diperpanjang');</script>";
            echo "<meta http-equiv='refresh' content='0; url=index.php?aksi=pinjam'>";
        }
    }
}

elseif($aksi=='profil'){
echo "
<div class='row'>
    <div class='col-xs-12'>
        <div class='panel panel-primary'>
            <div class='box-header'>
                <h3 class='box-title'>INFORMASI PROFIL</h3>
            </div>
            <div class='box-body'>
                <div class='table-responsive'>
                    <table id='example1' class='table table-bordered table-striped'>
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Profil</th>
                                <th>Tahun/Ajaran</th>
                                <th>Gambar</th>
                                <th>Pilihan</th>
                            </tr>
                        </thead>
                        <tbody>";
                            $tebaru = mysqli_query($koneksi, "SELECT * FROM profil ORDER BY id_profil DESC");
                            while ($t = mysqli_fetch_array($tebaru)) {
                                $isi_berita = strip_tags($t['isi']); 
                                $isi = substr($isi_berita,0,70); 
                                $isi = substr($isi_berita,0,strrpos($isi," ")); 
                                if($t['aktif']=='Y'){$mk='<strong>Tampil</strong>';}else{$mk='Tidak';}
                                $no++;    
                                echo "
                                <tr>
                                    <td>$no</td>
                                    <td>$t[nama]</td>
                                    <td>$t[tahun_ajar]</td>
                                    <td>$mk</td>
                                    <td>
                                        <a href='index.php?aksi=editprofil&id_p=$t[id_profil]' class='icon-edit' title='Edit'><i class='fa fa-pencil'></a>&nbsp;
                                        <a href='index.php?aksi=viewprofil&id_p=$t[id_profil]' title='Lihat' class='icon-eye-open'><i class='fa fa-remove'></a>&nbsp;
                                    </td>
                                </tr>";
                            }
                        echo "</tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>";
}

elseif($aksi=='editprofil'){
    $tebaru = mysqli_query($koneksi, "SELECT * FROM profil WHERE id_profil=$_GET[id_p]");
    $t = mysqli_fetch_array($tebaru);
    echo "
    <div class='row'>
        <div class='col-lg-12'>
            <div class='panel panel-default'>
                <div class='panel-heading'>EDIT PROFIL
                </div>
                <div class='panel-body'>
                    <form id='form1'  method='post' action='master/profil.php?act=editpro&id_p=$_GET[id_p]'>
                        <div class='form-grup'>
                            <label>Nama Akademik</label>
                            <input type='text' class='form-control' value='$t[nama]' name='jd'/><br>
                            <label>Alias</label>
                            <input type='text' class='form-control' value='$t[alias]' name='alias'/><br>
                            <label>Tahun/Ajaran</label>
                            <input type='text' class='form-control' value='$t[tahun_ajar]' name='tahun_ajar'/><br>
                            <label>Alamat</label>
                            <input type='text' class='form-control' value='$t[alamat]' name='alamat'/><br>
                            <label>Isi</label>
                            <textarea id='text-ckeditor' class='form-control' name='isi'>$t[isi]</textarea></br>
                            <script>CKEDITOR.replace('text-ckeditor');</script>
                            <div class='modal-footer'>
                                <button type='button' class='btn btn-default' data-dismiss='modal'>Close</button>
                                <button type='submit' class='btn btn-primary'>Save </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>";
}

elseif($aksi=='viewprofil'){
    $tebaru = mysqli_query($koneksi, "SELECT * FROM profil WHERE id_profil=$_GET[id_p]");
    $t = mysqli_fetch_array($tebaru);
    echo "
    <div class='row'>
        <div class='col-lg-12'>
            <div class='panel panel-default'>
                <div class='panel-heading'>$t[nama]
                </div>
                <div class='panel-body'>
                    <a href='javascript:history.go(-1)' class='btn btn-info'> Kembali</a>
                </div>";
    if($t['aktif'] =='Y'){
        echo "<img src='../foto/foto_profil/$t[foto]' class='box-shadow2' width='50%' /><br /><br />";
    }
    echo "$t[isi] 
        </div>
    </div>
</div>
</div>";
}

elseif($aksi=='galeri'){
    echo "
    <div class='row'>
        <div class='col-lg-12'>
            <div class='panel panel-default'>
                <div class='panel-heading'>INFORMASI GALERI
                </div>
                <div class='panel-body'>
                    <button class='btn btn-info' data-toggle='modal' data-target='#uiModal'>
                        Tambah Data
                    </button>
                    <div class='table-responsive'>
                        <table class='table table-striped table-bordered table-hover'>
                            <thead>
                                <tr>
                                    <th width='1%'>No</th>
                                    <th width='20%'>Judul</th>
                                    <th width='5%'>Foto</th>
                                    <th width='35%'>Keterangan</th>
                                    <th width='5%'>Pilihan</th>
                                </tr>
                            </thead>
                            <tbody>";
                                $tebaru = mysqli_query($koneksi, "SELECT * FROM galeri ORDER BY id_galeri DESC");
                                while ($t = mysqli_fetch_array($tebaru)){
                                    $no++;
                                    echo "
                                    <tr class='gradeA'>
                                        <td align='center' valign='top'>$no</td>
                                        <td valign='top'>$t[judul]</td>
                                        <td valign='top' align='center'><img alt='galeri' src='../foto/galleri/$t[gambar]' width='80' height='60' class='box-shadow2'/></td>
                                        <td valign='top'>$t[keterangan]</td>
                                        <td>
                                            <a href='index.php?aksi=editgaleri&id_g=$t[id_galeri]' title='Edit' class='icon-edit'></a>&nbsp;
                                            <a href='master/galleri.php?id_g=$t[id_galeri]&act=hapus&gbr=$t[gambar]' onclick=\"return confirm ('Apakah yakin ingin menghapus $t[judul] ?')\" title='Hapus' class='icon-trash'>
                                        </td>
                                    </tr>";
                                }
                            echo "
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class='col-lg-12'>
        <div class='modal fade' id='uiModal' tabindex='-1' role='dialog' aria-labelledby='myModalLabel' aria-hidden='true'>
            <div class='modal-dialog'>
                <div class='modal-content'>
                    <div class='modal-header'>
                        <button type='button' class='close' data-dismiss='modal' aria-hidden='true'>&times;</button>
                        <h4 class='modal-title' id='H3'>Input Data Galeri</h4>
                    </div>
                    <div class='modal-body'>
                        <form id='form1'  method='post' enctype='multipart/form-data' action='master/galleri.php?act=inputgalleri'>
                            <div class='form-grup'>
                                <label>Gambar</label>
                                <input type='file' size='50' name='gambar'/>
                                <label>Judul</label>
                                <input type='text' class='form-control'  name='jd'/>
                                <label>Isi</label>
                                <textarea id='text-ckeditor' class='form-control' name='isi'></textarea></br>
                                <script>CKEDITOR.replace('text-ckeditor');</script>
                                <div class='modal-footer'>
                                    <button type='button' class='btn btn-default' data-dismiss='modal'>Close</button>
                                    <button type='submit' class='btn btn-primary'>Save </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>";
}

elseif($aksi=='admin'){
    echo "
    <div class='row'>
        <div class='col-lg-12'>
            <div class='panel panel-default'>
                <div class='panel-heading'>INFORMASI KOMENTAR
                </div>
                <div class='panel-body'>
                    <button class='btn btn-info' data-toggle='modal' data-target='#uiModal'>
                        Tambah Data Admin
                    </button>
                    <div class='table-responsive'>
                        <table class='table table-striped table-bordered table-hover'>
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nama</th>
                                    <th>User</th>
                                    <th>Email</th>
                                    <th>Pilihan</th>
                                </tr>
                            </thead>";
                            $tebaru = mysqli_query($koneksi, "SELECT * FROM users");
                            while ($t = mysqli_fetch_array($tebaru)){
                                $no++;
                                echo "
                                <tbody>
                                    <tr>
                                        <td>$no</td>
                                        <td>$t[nama_lengkap]</td>
                                        <td>$t[username]</td>
                                        <td>$t[email]</td>
                                        <td>
                                            <center>
                                                <a href='index.php?aksi=editadmin&id=$t[id]' title='Edit'><i class='fa fa-pencil'></i></a>&nbsp;
                                                <a href='master/admin.php?id=$t[id]&act=hapus' onclick=\"return confirm ('Apakah yakin ingin menghapus $t[nama_lengkap] ?')\" title='Hapus'><i class='fa fa-remove'></i>
                                            </center>
                                        </td>
                                    </tr>
                                </tbody>";
                            }
                        echo "
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class='col-lg-12'>
        <div class='modal fade' id='uiModal' tabindex='-1' role='dialog' aria-labelledby='myModalLabel' aria-hidden='true'>
            <div class='modal-dialog'>
                <div class='modal-content'>
                    <div class='modal-header'>
                        <button type='button' class='close' data-dismiss='modal' aria-hidden='true'>&times;</button>
                        <h4 class='modal-title' id='H3'>Input Data Guru</h4>
                    </div>
                    <div class='modal-body'>
                        <form role='form' method='post' action='master/admin.php?act=inputadmin'>
                            <div class='form-group'>
                                <label>Nama Lengkap</label>
                                <input type='text' class='form-control' name='nm'/><br>
                                <label>Email</label>
                                <input type='text' class='form-control' name='em'/><br>
                                <label>User Name</label>
                                <input type='text' class='form-control'  name='um'/><br>
                                <label>Password</label>
                                <input type='text' class='form-control'  name='pw'/><br><br />
                                <button type='button' class='btn btn-default' data-dismiss='modal'>Close</button>
                                <button type='submit' class='btn btn-primary'>Save </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>";
}

elseif($aksi=='editadmin'){
    $tebaru = mysqli_query($koneksi, "SELECT * FROM users WHERE id=$_GET[id]");
    $t = mysqli_fetch_array($tebaru);
    echo "
    <div class='col-lg-6'>
        <h4 class='modal-title' id='H3'>Edit Data Admin</h4>
        <div class='modal-body'>
            <form id='form1'  method='post' action='master/admin.php?act=editadmin&id=$t[id]'>
                <label>Nama Lengkap</label>
                <input type='text' class='form-control'  name='nm' value='$t[nama_lengkap]'/>
                <label>Email</label>
                <input type='text' class='form-control' name='em' value='$t[email]' />
                <label>User Name</label>
                <input type='text' class='form-control'  name='um' value='$t[username]'/>
                <label>Password</label>
                <input type='text' class='form-control'  name='pw'/> </br>
                <button type='button' class='btn btn-default' data-dismiss='modal'>Close</button>
                <button type='submit' class='btn btn-primary'>Save </button>
            </form>
        </div>
    </div>";
}

elseif($aksi=='terimamhs'){
    mysqli_query($koneksi, "UPDATE calon_mhs SET status='$_POST[status]' WHERE no_daftar='$_GET[no_daftar]'");
    echo "<script>window.alert('Data berhasil disimpan terimakasih..... ');
        window.location=('index.php?aksi=pendaftaran')</script>";
}

elseif($aksi=='pinjam'){
echo "
<div class='row'>
    <div class='col-xs-12'>
        <div class='panel panel-primary'>
            <div class='box-header'>
                <h3 class='box-title'>INFORMASI DATA TRANTSAKSI BUKU</h3>
            </div>
            <div class='box-header'>
                <a href='master/export_psb.php' class='btn btn-info'>
                    Export Data 
                </a>
            </div>
            <div class='box-body'>
                <div class='table-responsive'>
                    <table id='example1' class='table table-bordered table-striped'>
                        <thead>
                            <tr>
                                <th align='center' width='5%'>No</th>
                                <th width='25%'>Judul Buku</th>
                                <th width='25%'>Peminjam</th>
                                <th width='15%'>Tgl Pinjam</th>
                                <th width='15%'>Tgl Kembali</th>
                                <th width='10%'>Terlambat</th>
                                <th width='10%'>Kembali</th>
                                <th width='10%'>Perpanjang</th>
                            </tr>
                        </thead>
                        <tbody>";
                            $data = mysqli_query($koneksi, "SELECT * FROM tbl_transaksi WHERE status='Pinjam' ORDER by id");
                            while($p = mysqli_fetch_array($data)){
                                $no++;
                                echo "
                                <tr>
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
                                        }
                                        echo "
                                    </td>
                                    <td><a href='index.php?aksi=transaksibukukembali&id=$p[id]&judul=$p[judul]'>kembali</a></td>
                                    <td><a href='index.php?aksi=transaksibukukembali&id=$p[id]&judul=$p[judul]'>perpaanjang</a></td>
                                </tr>";
                            }
                        echo "
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>";
}

elseif($aksi=='transaksi'){
echo "
<div class='row'>
    <div class='col-xs-12'>
        <div class='panel panel-primary'>
            <div class='box-header'>
                <h3 class='box-title'>INFORMASI DATA TRANTSAKSI BUKU</h3>
            </div>
            <div class='box-header'>
                <a href='master/export_psb.php' class='btn btn-info'>
                    Export Data
                </a>
            </div>
            <div class='box-body'>
                <div class='table-responsive'>
                    <table id='example1' class='table table-bordered table-striped'>
                        <thead>
                            <tr>
                                <th align='center' width='5%'>No</th>
                                <th width='25%'>Judul Buku</th>
                                <th width='25%'>Peminjam</th>
                                <th width='15%'>Tgl Pinjam</th>
                                <th width='15%'>Tgl Kembali</th>
                            </tr>
                        </thead>
                        <tbody>";
                            $data = mysqli_query($koneksi, "SELECT * FROM tbl_transaksi  ORDER by id");
                            while($p = mysqli_fetch_array($data)){
                                $no++;
                                echo "
                                <tr>
                                    <td>$no</td>
                                    <td>$p[judul]</td>
                                    <td>$p[nama]</td>
                                    <td>$p[tgl_pinjam]</td>
                                    <td>$p[tgl_kembali]</td>
                                </tr>";
                            }
                        echo "
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>";
}

elseif($aksi=='kembalibuku'){
echo "
<div class='row'>
    <div class='col-xs-12'>
        <div class='panel panel-primary'>
            <div class='box-header'>
                <h3 class='box-title'>INFORMASI DATA TRANTSAKSI BUKU</h3>
            </div>
            <div class='box-header'>
                <a href='master/export_psb.php' class='btn btn-info'>
                    Export Data
                </a>
            </div>
            <div class='box-body'>
                <div class='table-responsive'>
                    <table id='example1' class='table table-bordered table-striped'>
                        <thead>
                            <tr>
                                <th align='center' width='5%'>No</th>
                                <th width='25%'>Judul Buku</th>
                                <th width='25%'>Peminjam</th>
                                <th width='15%'>Tgl Kembali</th>
                            </tr>
                        </thead>
                        <tbody>";
                            $data = mysqli_query($koneksi, "SELECT * FROM tbl_transaksi WHERE status='Kembali' ORDER by id");
                            while($p = mysqli_fetch_array($data)){
                                $no++;
                                echo "
                                <tr>
                                    <td>$no</td>
                                    <td>$p[judul]</td>
                                    <td>$p[nama]</td>
                                    <td>$p[tgl_kembali]</td>
                                </tr>";
                            }
                        echo "
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>";
}

elseif($aksi=='buku'){
    echo "
    <div class='row'>
        <div class='col-lg-12'>
            <div class='panel panel-default'>
                <div class='panel-heading'>INFORMASI BUKU</div>
                <div class='box-header'>
                    <button class='btn btn-info' data-toggle='modal' data-target='#uiModal'>
                        Tambah Data Buku
                    </button>
                    <div class='btn btn-info'>
                        STOK BUKU :$post[b]
                    </div>	
                </div>
                <div class='panel-body'>
                    <div class='table-responsive'>
                        <table id='example1' class='table table-bordered table-striped'>
                            <thead>
                                <tr>
                                    <th align='center' width='5%'>No</th>
                                    <th width='30%'>Judul Buku</th>
                                    <th width='20%'>Pengarang</th>
                                    <th width='15%'>Penerbit</th>
                                    <th width='15%'>Jumlah</th>
                                    <th>Pilihan</th>
                                </tr>
                            </thead>
                            <tbody>";

    $query = mysqli_query($koneksi, "SELECT * FROM tbl_buku ORDER BY judul");
    while ($t = mysqli_fetch_array($query)) {
        $no++;
        echo "
                                <tr>
                                    <td>$no</td>
                                    <td>$t[judul]</td>
                                    <td>$t[pengarang]</td>
                                    <td>$t[penerbit]</td>
                                    <td>$t[jumlah_buku]</td>
                                    <td>
                                        <center>
                                            <a href='index.php?aksi=editbuku&id_buku=$t[id_buku]' title='Edit'><i class='fa fa-pencil'></i></a>&nbsp;
                                            <a href='master/buku.php?id_buku=$t[id_buku]&act=hapus&gbr=$t[gambar]' onclick=\"return confirm('Apakah yakin ingin menghapus $t[judul]?')\" title='Hapus'><i class='fa fa-remove'></i></a>&nbsp;
                                            <a href='index.php?aksi=editbuku&id=$t[id]' title='lihat'><i class='fa fa-external-link-square'></i></a>
                                        </center>
                                    </td>
                                </tr>";
    }
    echo "
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class='col-lg-12'>
        <div class='modal fade' id='uiModal' tabindex='-1' role='dialog' aria-labelledby='myModalLabel' aria-hidden='true'>
            <div class='modal-dialog'>
                <div class='modal-content'>
                    <div class='modal-header'>
                        <button type='button' class='close' data-dismiss='modal' aria-hidden='true'>&times;</button>
                        <h4 class='modal-title' id='H3'>Input Data</h4>
                    </div>
                    <div class='modal-body'>
                        <form role='form' enctype='multipart/form-data' method='post' action='master/buku.php?act=inputbuku'>
                            <div class='form-group'>
                                <label>Judul Buku</label>
                                <input type='text' class='form-control' name='judul'/><br>
                                <label>Pengarang Buku</label>
                                <input type='text' class='form-control' name='pengarang'/><br>
                                <label>Penerbit Buku</label>
                                <input type='text' class='form-control' name='penerbit'/><br>
                                <label>Tahun Terbit</label>
                                <input type='text' class='form-control' name='thn_terbit'/><br>
                                <label>Kode ISBN/BUKU</label>
                                <input type='text' class='form-control' name='isbn'/><br>
                                <label>Jumlah Buku</label>
                                <input type='text' class='form-control' name='jumlah_buku'/><br>
                                <label>Tempat/Rak Buku</label>
                                <input type='text' class='form-control' name='lokasi'/><br>
                                <label>Gambar</label>
                                <input type='file' class='smallInput' size='50' name='gambar'/><br>
                                <label>FILE BUKU</label>
                                <input type='file' class='smallInput' size='50' name='data_upload'/><br>
                                <button type='button' class='btn btn-default' data-dismiss='modal'>Close</button>
                                <button name='btnUpload' type='submit' class='btn btn-primary'>Save</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>";
}
elseif($aksi=='editbuku'){
    $id_buku = mysqli_real_escape_string($koneksi, $_GET['id_buku']);
    $query = "SELECT * FROM tbl_buku WHERE id_buku=$id_buku";
    $hasil_query = mysqli_query($koneksi, $query);
    $t = mysqli_fetch_array($hasil_query);

    echo "
    <div class='row'>
        <div class='col-lg-12'>
            <div class='panel panel-default'>
                <div class='panel-heading'>INFORMASI BUKU</div>
                <div class='panel-body'>
                    <form id='form1' enctype='multipart/form-data' method='post' action='master/buku.php?act=editbuku&id_buku=$id_buku&gb={$t['gambar']}'>
                        <div class='form-group'>
                            <label>Judul buku</label>
                            <input type='text' value='{$t['judul']}' name='judul' class='form-control'/><br>
                            <label>Pengarang Buku</label>
                            <input type='text' class='form-control' value='{$t['pengarang']}' name='pengarang'/><br>
                            <label>Penerbit Buku</label>
                            <input type='text' class='form-control' value='{$t['penerbit']}' name='penerbit'/><br>
                            <label>Tahun Terbit</label>
                            <input type='text' class='form-control' value='{$t['thn_terbit']}' name='thn_terbit'/><br>
                            <label>Kode ISBN/BUKU</label>
                            <input type='text' class='form-control' value='{$t['isbn']}' name='isbn'/><br>
                            <label>Jumlah Buku</label>
                            <input type='text' class='form-control' value='{$t['jumlah_buku']}' name='jumlah_buku'/><br>
                            <label>Tempat/Rak Buku</label>
                            <input type='text' class='form-control' value='{$t['lokasi']}' name='lokasi'/><br>
                            <input type='file' class='smallInput' size='50' name='gambar'/><br><br />";
    if($t['gambar'] != 0){
        echo "<img src='../foto/data/{$t['gambar']}' width='150' />";
    }
    echo "
                            <div class='modal-footer'>
                                <button type='button' class='btn btn-default' data-dismiss='modal'>Close</button>
                                <button type='submit' class='btn btn-primary'>Save</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    ";
}
elseif($aksi=='anggota'){
    echo "<div class='row'>
        <div class='col-lg-12'>
            <div class='panel panel-default'>
                <div class='panel-heading'>INFORMASI</div>
                <div class='box-header'></div>
                <div class='panel-body'>
                    <div class='table-responsive'>
                        <table id='example1' class='table table-bordered table-striped'>
                            <thead>
                                <tr>
                                    <th align='center'>No</th>
                                    <th>Nim</th>
                                    <th>Nama</th>
                                    <th>Tempat lahir</th>
                                    <th>Jurusan</th>
                                    <th>Pilihan</th>
                                </tr>
                            </thead>
                            <tbody>";
    $query = "SELECT * FROM tbl_anggota ORDER by nim";
    $hasil_query = mysqli_query($koneksi, $query);
    $no = 1;
    while ($t = mysqli_fetch_array($hasil_query)){
        echo "
                                <tr>
                                    <td>$no</td>
                                    <td>{$t['nim']}</td>
                                    <td>{$t['nama']}</td>
                                    <td>{$t['tempat_lahir']},{$t['tgl_lahir']}</td>
                                    <td>{$t['jurusan']}</td>
                                    <td>
                                        <center>
                                            <a href='index.php?aksi=editangota&id_agt={$t['id_agt']}' title='Edit'><i class='fa fa-pencil'></i></a>&nbsp;
                                            <a href='master/anggota.php?id_agt={$t['id_agt']}&act=hapus' onclick=\"return confirm ('Apakah yakin ingin menghapus {$t['judul']} ?')\" title='Hapus'><i class='fa fa-remove'></i></a>
                                        </center>
                                    </td>
                                </tr>";
        $no++;
    }
    echo "</tbody></table>
                    </div>
                </div>
            </div>
        </div>
    </div>";
}

elseif($aksi=='editangota'){
    $id_agt = $_GET['id_agt'];
    $query = "SELECT * FROM tbl_anggota WHERE id_agt = ?";
    $stmt = mysqli_prepare($koneksi, $query);
    mysqli_stmt_bind_param($stmt, "i", $id_agt);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);
    $t = mysqli_fetch_array($result);

    $tgl = date('d/m/Y');

    echo "
    <div class='row'>
        <div class='col-lg-12'>
            <div class='panel panel-default'>
                <div class='panel-heading'>INFORMASI BUKU</div>
                <div class='panel-body'>
                    <form id='form1' enctype='multipart/form-data' method='post' action='master/anggota.php?act=editanggota&id_agt=$id_agt'>
                        <div class='form-group'>
                            <label>Nama</label>
                            <input type='text' value='{$t['nama']}' name='nama' class='form-control'/><br>
                            <label>NPM</label>
                            <input type='text' class='form-control' value='{$t['nim']}' name='nim'/><br>
                            <label>Jenis Kelamin</label>
                            <input type='text' class='form-control' value='{$t['jk']}' name='jk'/><br>
                            <label>Tempat Lahir</label>
                            <input type='text' class='form-control' value='{$t['tempat_lahir']}' name='lahir'/><br>
                            <label>Tanggal Lahir</label>
                            <input type='text' class='form-control' value='{$t['tgl_lahir']}' name='tgl_lahir'/><br>
                            <label>Program Studi</label>
                            <input type='text' class='form-control' value='{$t['prodi']}' name='prodi'/><br>
                            <label>Kelas</label>
                            <input type='text' class='form-control' value='{$t['kelas']}' name='kelas'/><br>
                            <input type='hidden' class='form-control' value='$tgl' name='tgl'/><br>
                            <div class='modal-footer'>
                                <button type='button' class='btn btn-default' data-dismiss='modal'>Close</button>
                                <button type='submit' class='btn btn-primary'>Save</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>";
}
elseif($aksi=='laporan'){
    echo "<div class='row'>
            <div class='col-lg-12'>
                <h1 class='page-header'>Laporan Transaksi Buku</h1>
            </div>
            <!-- /.col-lg-12 -->
        </div>
        <div class='row'>
            <div class='col-lg-12'>
                <div class='panel panel-default'>
                    <div class='panel-heading'>
                        <i class='fa fa-bar-chart-o fa-fw'></i> Laporan Transaksi Buku
                                       </div>
                    <div class='panel-body'>
                        <div class='table-responsive'>";
    include "mod_laporan/laporan.php";
    echo "
                        </div>
                    </div>
                </div>
            </div>
        </div>";
}
?>