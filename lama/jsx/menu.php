  <ul class="sidebar-menu">
  <li>
              <a href='index.php?aksi=home'>
                <i class='fa fa-dashboard'></i> <span>Dashboard</span> <i class='fa fa-angle-left pull-right'></i>
              </a> 
 </li>
     <li >
          <a href="#">
            <i class="fa  fa-server"></i> <span>Transaksi</span>
         <span class="label pull-right bg-red"><?php echo"$k1";?></span>
          </a>
          <ul class="treeview-menu">
 <li class="active"><a href="index.php?aksi=transaksi"><i class="fa fa-circle-o"></i> <span>Transaksi Buku</span>
         <span class="label bg-blue pull-right"><?php echo"$k";?></span></a></li>
            <li class="active"><a href="index.php?aksi=pinjam"><i class="fa fa-circle-o"></i> <span>Peminjam Buku</span>
         <span class="label bg-yellow pull-right"><?php echo"$k1";?></span></a></li>
            <li><a href="index.php?aksi=kembalibuku"><i class="fa fa-circle-o"></i><span>Pengembalian Buku</span>
         <span class="label pull-right bg-green"><?php echo"$k2";?></span></a></li>
	
          </ul>
        </li>  
       <li >
          <a href="#">
            <i class="fa fa-newspaper-o"></i> <span>Buku</span>
         <span class="label pull-right bg-red"><?php echo"$kk";?></span>
          </a>
          <ul class="treeview-menu">
 <li class="active"><a href="index.php?aksi=buku"><i class="fa fa-circle-o"></i> <span>Data Buku</span>
         <span class="label bg-blue pull-right"><?php echo"$kk";?></span></a></li>
            <li class="active"><a href="index.php?aksi=pendaftaran"><i class="fa fa-circle-o"></i> <span>Laporan Data Buku</span>
        </a></li>
          </ul>
        </li>  
		    <li >
          <a href="#">
            <i class="fa fa-mortar-board"></i> <span>Angota</span>
         <span class="label pull-right bg-red"><?php echo"$agt";?></span>
          </a>
          <ul class="treeview-menu">
 <li class="active"><a href="index.php?aksi=anggota"><i class="fa fa-circle-o"></i> <span>Data Anggota</span>
         <span class="label bg-blue pull-right"><?php echo"$agt";?></span></a></li>
            <li class="active"><a href="index.php?aksi=pendaftaran"><i class="fa fa-circle-o"></i> <span>Laporan Data Anggota</span>
         <span class="label bg-yellow pull-right">#</span></a></li>
          </ul>
        </li> 

 <li>
              <a href='index.php?aksi=profil'>
                <i class='fa  fa-user-plus'></i> <span>Profil</span> <i class='fa fa-angle-left pull-right'></i>
              </a> 
 </li>
  <li>
              <a href='index.php?aksi=admin'>
                <i class='fa  fa-bar-chart'></i> <span>Data Admin</span> <i class='fa fa-angle-left pull-right'></i>
              </a> 
 </li>
	  <li><a href=logout.php><i class='fa fa-cog'></i> <span>Logout</span> <i class='fa fa-angle-left pull-right'></i></a> </li>
</ul>