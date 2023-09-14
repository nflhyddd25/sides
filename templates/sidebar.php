  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="#" class="brand-link">
      <span class="brand-text font-weight-light">Kelurahan Utara</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="info">
          <a href="#" class="d-block">Halo <?= $_SESSION['username']; ?>! </a>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item">
            <a href="index.php" class="nav-link">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Dashboard
              </p>
            </a>
          </li>
          <?php if($_SESSION['hak_akses'] == 'admin') { ?>
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-chart-pie"></i>
              <p>
                Data Master
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="pegawai-index.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>
                    Pegawai
                  </p>
                </a>
              </li>
        <!--   <li class="nav-item">
            <a href="kependudukan-index.php" class="nav-link">
              <i class="far fa-circle nav-icon"></i>
              <p>
                Penduduk
              </p>
            </a>
          </li> -->
          <li class="nav-item">
            <a href="pelapor-index.php" class="nav-link">
              <i class="far fa-circle nav-icon"></i>
              <p>
                Pelapor
              </p>
            </a>
          </li>
            </ul>
          </li>
        <?php } ?>
          <?php if($_SESSION['hak_akses'] == 'admin') { ?>

          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-chart-pie"></i>
              <p>
                Data Mutasi penduduk
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
               <li class="nav-item">
            <a href="kependudukan-index.php" class="nav-link">
              <i class="far fa-circle nav-icon"></i>
              <p>
                Penduduk
              </p>
            </a>
          </li>
              <li class="nav-item">
                <a href="kedatangan-index.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>
                    Kedatangan
                  </p>
                </a>
              </li>
              <li class="nav-item">
                <a href="kepindahan-index.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>
                    Kepindahan
                  </p>
                </a>
              </li>
            </ul>
          </li>

           <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-chart-pie"></i>
              <p>
                Data Perkawinan
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
            <a href="dispensasi-index.php" class="nav-link">
              <i class="far fa-circle nav-icon"></i>
              <p>
                Dispensasi Nikah
              </p>
            </a>
          </li>

          <li class="nav-item">
            <a href="janda_duda-index.php" class="nav-link">
              <i class="far fa-circle nav-icon"></i>
              <p>
               Janda Duda
              </p>
            </a>
          </li>
            </ul>
          </li>

           <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-chart-pie"></i>
              <p>
                Data Surat Lahir Mati
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
             
          <li class="nav-item">
            <a href="kelahiran-index.php" class="nav-link">
              <i class="far fa-circle nav-icon"></i>
              <p>
                Kelahiran
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="kematian-index.php" class="nav-link">
              <i class="far fa-circle nav-icon"></i>
              <p>
                Kematian
              </p>
            </a>
          </li>

            </ul>
          </li>


           <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-chart-pie"></i>
              <p>
                Data Surat Umum
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
             
          <li class="nav-item">
            <a href="domisili-index.php" class="nav-link">
              <i class="far fa-circle nav-icon"></i>
              <p>
               Domisili
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="keramaian-index.php" class="nav-link">
              <i class="far fa-circle nav-icon"></i>
              <p>
               Izin Keramaian
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="kia-index.php" class="nav-link">
              <i class="far fa-circle nav-icon"></i>
              <p>
               KIA
              </p>
            </a>
          </li>

          <li class="nav-item">
            <a href="ghoib-index.php" class="nav-link">
              <i class="far fa-circle nav-icon"></i>
              <p>
               Surat Ghoib
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="skck-index.php" class="nav-link">
              <i class="far fa-circle nav-icon"></i>
              <p>
               Pengantar SKCK
              </p>
            </a>
          </li>
          
          <li class="nav-item">
            <a href="keterangan_sama-index.php" class="nav-link">
              <i class="far fa-circle nav-icon"></i>
              <p>
               Ket. Beda/Sama Orang
              </p>
            </a>
          </li>

            </ul>
          </li>
 <?php } ?>
 <?php if($_SESSION['hak_akses'] == 'penduduk') { ?>
      <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-chart-pie"></i>
              <p>
                Data Mutasi penduduk
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="kedatangan-index.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>
                    Kedatangan
                  </p>
                </a>
              </li>
              <li class="nav-item">
                <a href="kepindahan-index.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>
                    Kepindahan
                  </p>
                </a>
              </li>
            </ul>
          </li>

           <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-chart-pie"></i>
              <p>
                Data Perkawinan
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
            <a href="dispensasi-index.php" class="nav-link">
              <i class="far fa-circle nav-icon"></i>
              <p>
                Dispensasi Nikah
              </p>
            </a>
          </li>

          <li class="nav-item">
            <a href="janda_duda-index.php" class="nav-link">
              <i class="far fa-circle nav-icon"></i>
              <p>
               Janda Duda
              </p>
            </a>
          </li>
            </ul>
          </li>

           <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-chart-pie"></i>
              <p>
                Data Surat Lahir Mati
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
             
          <li class="nav-item">
            <a href="kelahiran-index.php" class="nav-link">
              <i class="far fa-circle nav-icon"></i>
              <p>
                Kelahiran
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="kematian-index.php" class="nav-link">
              <i class="far fa-circle nav-icon"></i>
              <p>
                Kematian
              </p>
            </a>
          </li>

            </ul>
          </li>


           <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-chart-pie"></i>
              <p>
                Data Surat Umum
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
             
          <li class="nav-item">
            <a href="domisili-index.php" class="nav-link">
              <i class="far fa-circle nav-icon"></i>
              <p>
               Domisili
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="keramaian-index.php" class="nav-link">
              <i class="far fa-circle nav-icon"></i>
              <p>
               Izin Keramaian
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="kia-index.php" class="nav-link">
              <i class="far fa-circle nav-icon"></i>
              <p>
               KIA
              </p>
            </a>
          </li>

          <li class="nav-item">
            <a href="ghoib-index.php" class="nav-link">
              <i class="far fa-circle nav-icon"></i>
              <p>
               Surat Ghoib
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="skck-index.php" class="nav-link">
              <i class="far fa-circle nav-icon"></i>
              <p>
               Pengantar SKCK
              </p>
            </a>
          </li>
          
          <li class="nav-item">
            <a href="keterangan_sama-index.php" class="nav-link">
              <i class="far fa-circle nav-icon"></i>
              <p>
               Ket. Beda/Sama Orang
              </p>
            </a>
          </li>

            </ul>
          </li>


          <li class="nav-item">
            <a href="keluhan-index.php" class="nav-link">
              <i class="far fa-circle nav-icon"></i>
              <p>
               Keluhan Masyarakat
              </p>
            </a>
          </li>




 <?php } ?>
      <?php if($_SESSION['hak_akses'] == 'admin') { ?>
          <li class="nav-item">
            <a href="penduduk-index.php" class="nav-link">
              <i class="nav-icon fas fa-th"></i>
              <p>
                Akun Penduduk
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="user-index.php" class="nav-link">
              <i class="nav-icon fas fa-th"></i>
              <p>
                Akun Admin
              </p>
            </a>
          </li>
         <!--  <li class="nav-item">
            <a href="laporan-index.php" class="nav-link">
              <i class="nav-icon fas fa-th"></i>
              <p>
                Laporan
              </p>
            </a>
          </li> -->
        <?php } ?>

       <?php if(($_SESSION['hak_akses'] == 'admin') || ($_SESSION['hak_akses'] == 'pimpinan')) { ?>
           <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-chart-pie"></i>
              <p>
                Data Laporan
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              
          <li class="nav-item">
            <a href="pegawai-laporan.php" class="nav-link">
              <i class="far fa-circle nav-icon"></i>
              <p>
                Laporan Pegawai
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="kependudukan-laporan.php" class="nav-link">
              <i class="far fa-circle nav-icon"></i>
              <p>
                Laporan Penduduk
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="pelapor-laporan.php" class="nav-link">
              <i class="far fa-circle nav-icon"></i>
              <p>
                Laporan Pelapor
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="kedatangan-laporan.php" class="nav-link">
              <i class="far fa-circle nav-icon"></i>
              <p>
                Laporan Kedatangan
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="kepindahan-laporan.php" class="nav-link">
              <i class="far fa-circle nav-icon"></i>
              <p>
                Laporan Kepindahan
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="kelahiran-laporan.php" class="nav-link">
              <i class="far fa-circle nav-icon"></i>
              <p>
                Laporan Kelahiran
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="kematian-laporan.php" class="nav-link">
              <i class="far fa-circle nav-icon"></i>
              <p>
                Laporan Kematian
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="keluhan-laporan.php" class="nav-link">
              <i class="far fa-circle nav-icon"></i>
              <p>
                Laporan Keluhan
              </p>
            </a>
          </li>
            </ul>
          </li>
        <?php }  ?>


        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>