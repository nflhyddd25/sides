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
            <h1>Halaman Pelapor</h1>
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
          <a href="pelapor-laporan.php" class="btn btn-sm btn-secondary ">Cetak Laporan</a>
          <a href="pelapor-tambah.php" class="btn btn-sm btn-success float-right">+ Tambah Data</a>
        </div>
        </div>
        <div class="card-body">
          <div class="table-responsive">
        <table class="table table-bordered no-wrap" style="white-space: nowrap;"  id="example2">
          <thead>
            <tr>
              <th>No</th>
              <th>No Surat</th>
              <th>NIK</th>
              <th>Nama</th>
              <th>Tgl Lapor</th>
              <th>Keterangan</th>
              <th>Status Validasi</th><th>Aksi</th>
            </tr>
          </thead>
          <tbody>
            <?php
              include('koneksi.php'); //memanggil file koneksi
              $datas = mysqli_query($koneksi, "select data_pelapor.*, data_kependudukan.Nama from data_pelapor join data_kependudukan on data_kependudukan.NIK = data_pelapor.NIK group by data_pelapor.NIK") or die(mysqli_error($koneksi));

              $no = 1;//untuk pengurutan nomor

              //melakukan perulangan
              while($row = mysqli_fetch_assoc($datas)) {
            ?>  

          <tr >
            <td><?= $no; ?></td>
            <td><?= $row['No_Surat']; ?></td>
            <td><?= $row['NIK']; ?></td>
            <td><?= $row['Nama']; ?></td>
            <td><?= format_tanggal($row['tgl_lapor']); ?></td>
            <td><?= $row['keterangan']; ?></td>
            <td><?= $row['status_data']; ?></td><td style="vertical-align: middle;text-align: center;">
                <a href="pelapor-detail.php?id=<?= $row['id']; ?>" class="btn btn-sm btn-secondary">Detail</a>
                <a href="pelapor-edit.php?id=<?= $row['id']; ?>" class="btn btn-sm btn-warning">Edit</a>
                <a href="pelapor-index.php?aksi=hapus&id=<?= $row['id']; ?>" class="btn btn-sm btn-danger" onclick="return confirm('anda yakin ingin hapus data ini?');">Hapus</a>
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
        $datas = mysqli_query($koneksi, "delete from data_pelapor where id ='$id'") or die(mysqli_error($koneksi));

        //alert dan redirect ke index.php
        echo "<script>alert('data berhasil dihapus.');window.location='pelapor-index.php';</script>";
    }


?>

