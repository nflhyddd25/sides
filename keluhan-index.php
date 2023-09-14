<?php
  include('templates/header.php');
  include('templates/sidebar.php');
?>
<style type="text/css">
  td {
    vertical-align: middle !important;
  }
</style>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Halaman Keluhan Masyarakat</h1>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">

      <!-- Default box -->
      <div class="card">
        <div class="card-header">
          <h3 class="card-title">Data</h3>

          <div class="btn-group float-right">
         <!--    <a href="keluhan-laporan.php" class="btn btn-sm btn-secondary ">Cetak Laporan</a> -->
        
          <a href="keluhan-tambah.php" class="btn btn-sm btn-success float-right">+ Tambah Data</a>
        </div>
        </div>
        <div class="card-body">
          <div class="table-responsive"><ul style="font-size: 13px;">
          <li><strong>Diajukan</strong> : Surat masih direview admin, Menunggu dicetak. | <strong>Proses </strong>: Surat sudah dicetak, Menunggu tanda tangan kepala dinas. | <strong>Selesai</strong> : Surat sudah selesai, siap diambil.</li>
        </ul>
        <table class="table table-bordered no-wrap" style="white-space: nowrap;"  id="example2">
          <thead>
            <tr>
              <th>No</th>
              <th>No Laporan</th>
              <th>Tanggal</th>
              <th>Nama Pelapor</th>
              <th>No. Hp</th> 
              <th>Status</th>
              <th>Status Validasi</th><th>Aksi</th>
            </tr>
          </thead>
          <tbody>
            <?php
              include('koneksi.php'); //memanggil file koneksi
              if($_SESSION['hak_akses'] == 'admin') {
              $datas = mysqli_query($koneksi, "select * from data_keluhan") or die(mysqli_error($koneksi));
                } else {
                $id = $_SESSION['user_id'];
              $datas = mysqli_query($koneksi, "select * from data_keluhan  where data_keluhan.user_id = '$id' ") or die(mysqli_error($koneksi));
               }
              $no = 1;//untuk pengurutan nomor

              //melakukan perulangan
              while($row = mysqli_fetch_assoc($datas)) {
            ?>  

          <tr style="white-space: nowrap !important;">
            <td><?= $no; ?></td>
            <td><?= $row['no_laporan']; ?></td>
            <td><?= format_tanggal($row['tanggal']); ?></td>
            <td><?= $row['nama_pelapor']; ?></td>
            <td><?= $row['no_hp']; ?></td> 
            <td><?= $row['status']; ?></td>
            <td><?= $row['status_data']; ?></td><td style="vertical-align: middle;text-align: center;">
              <?php  if($_SESSION['hak_akses'] == 'admin') { ?>
                <a href="keluhan-detail.php?id=<?= $row['id']; ?>" class="btn btn-sm btn-secondary">Detail</a>
                <a href="keluhan-edit.php?id=<?= $row['id']; ?>" class="btn btn-sm btn-warning">Edit</a>
                <a href="keluhan-index.php?aksi=hapus&id=<?= $row['id']; ?>" class="btn btn-sm btn-danger" onclick="return confirm('anda yakin ingin hapus data ini?');">Hapus</a>
                 <?php  }?>
            </td>
          </tr>

            <?php $no++; } ?>
          </tbody>
        </table>
      </div>
      </div>
    </div>
        <!-- /.card-body -->
      <!-- /.card -->

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <?php
    include('templates/footer.php');
  ?>
  

  <?php
        
    if ((isset($_GET['aksi'])) && ($_GET['aksi'] == 'hapus')) {
        $id = $_GET['id']; //menampung id

        //query hapus
        $datas = mysqli_query($koneksi, "delete from data_keluhan where id ='$id'") or die(mysqli_error($koneksi));

        //alert dan redirect ke index.php
        echo "<script>alert('data berhasil dihapus.');window.location='keluhan-index.php';</script>";
    }


?>

