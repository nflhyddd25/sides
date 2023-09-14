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
            <h1>Halaman Kependudukan</h1>
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
       <!--    <a href="kependudukan-laporan.php" class="btn btn-sm btn-secondary ">Cetak Laporan</a> -->
          <a href="kependudukan-tambah.php" class="btn btn-sm btn-success float-right">+ Tambah Data</a>
        </div>
        </div>
        <div class="card-body">
          <div class="table-responsive">
        <table class="table table-bordered no-wrap" style="white-space: nowrap;"  id="example2">
          <thead>
            <tr>
              <th>No</th>
              <th>NIK</th>
              <th>No KK</th>
              <th>Nama</th>
              <th>Jenkel</th>
              <th>Tgl Lahir</th>
              <th>Tempat Lahir</th>
              <th>Agama</th>
              <th>Ket. Mampu</th>
              <th>Aksi</th>
            </tr>
          </thead>
          <tbody>
            <?php
              include('koneksi.php'); //memanggil file koneksi
              $datas = mysqli_query($koneksi, "select * from data_kependudukan") or die(mysqli_error($koneksi));

              $no = 1;//untuk pengurutan nomor

              //melakukan perulangan
              while($row = mysqli_fetch_assoc($datas)) {
            ?>  

          <tr >
            <td><?= $no; ?></td>
            <td><?= $row['NIK']; ?></td>
            <td><?= $row['No_KK']; ?></td>
            <td><?= $row['Nama']; ?></td>
            <td><?= $row['J_Kelamin']; ?></td>
            <td><?= format_tanggal($row['Tanggal_Lahir']); ?></td>
            <td><?= $row['Tempat_Lahir']; ?></td>
            <td><?= $row['Agama']; ?></td>
            <td><?= $row['ket_mampu']; ?></td>
            <td style="vertical-align: middle;text-align: center;">
              <?php if($row['ket_mampu'] == 'tidak_mampu') { ?>
                <a href="tidak_mampu-laporan.php?id=<?= $row['id']; ?>" class="btn btn-sm btn-success">Cetak Tidak Mampu</a>
              <?php } ?>
                <a href="kependudukan-detail.php?id=<?= $row['id']; ?>" class="btn btn-sm btn-secondary">Detail</a>
                <a href="kependudukan-edit.php?id=<?= $row['id']; ?>" class="btn btn-sm btn-warning">Edit</a>
                <a href="kependudukan-index.php?aksi=hapus&id=<?= $row['id']; ?>" class="btn btn-sm btn-danger" onclick="return confirm('anda yakin ingin hapus data ini?');">Hapus</a>
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
        $datas = mysqli_query($koneksi, "delete from data_kependudukan where id ='$id'") or die(mysqli_error($koneksi));

        //alert dan redirect ke index.php
        echo "<script>alert('data berhasil dihapus.');window.location='kependudukan-index.php';</script>";
    }


?>

