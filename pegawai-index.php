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
            <h1>Halaman Pegawai</h1>
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
          <a href="pegawai-laporan.php" class="btn btn-sm btn-secondary ">Cetak Laporan</a>
          <a href="pegawai-tambah.php" class="btn btn-sm btn-success float-right">+ Tambah Data</a>
        </div>
        </div>
        <div class="card-body">
        <table class="table table-bordered"  id="example2">
          <thead>
            <tr>
              <th>No</th>
              <th>Nip</th>
              <th>Nama</th>
              <th>Umur</th>
              <th>Tgl Masuk Kerja</th>
              <th>Lama Kerja</th>
              <th>Foto</th>
              <th>Aksi</th>
            </tr>
          </thead>
          <tbody>
            <?php
              include('koneksi.php'); //memanggil file koneksi
              $datas = mysqli_query($koneksi, "select data_pegawai.* from data_pegawai") or die(mysqli_error($koneksi));

              $no = 1;//untuk pengurutan nomor

              //melakukan perulangan
              while($row = mysqli_fetch_assoc($datas)) {
            ?>  

          <tr>
            <td><?= $no; ?></td>
            <td><?= $row['nip']; ?></td>
            <td><?= $row['Nama']; ?></td>
            <td><span class="badge badge-info"><?= hitung_tanggal(date("Y-m-d"), $row['Tgl_Lahir']); ?></span></td>
            <td><?= format_tanggal($row['tgl_masuk']); ?></td>
            <td><span class="badge badge-info"><?= hitung_tanggal(date("Y-m-d"), $row['tgl_masuk']); ?></span></td>
            <td style="text-align: center;vertical-align: middle;">
              <a target="_blank" href="assets/gambar/<?= $row['Foto_Pegawai']; ?>">
                <img src="assets/gambar/<?= $row['Foto_Pegawai']; ?>" style="width: 100px;">
              </a>
            </td>
            <td style="vertical-align: middle;text-align: center;">
                <a href="pegawai-detail.php?id=<?= $row['id']; ?>" class="btn btn-sm btn-secondary">Detail</a>
                <a href="pegawai-edit.php?id=<?= $row['id']; ?>" class="btn btn-sm btn-warning">Edit</a>
                <a href="pegawai-index.php?aksi=hapus&id=<?= $row['id']; ?>" class="btn btn-sm btn-danger" onclick="return confirm('anda yakin ingin hapus data ini?');">Hapus</a>
            </td>
          </tr>

            <?php $no++; } ?>
          </tbody>
        </table>
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
        $datas = mysqli_query($koneksi, "delete from data_pegawai where id ='$id'") or die(mysqli_error($koneksi));

        //alert dan redirect ke index.php
        echo "<script>alert('data berhasil dihapus.');window.location='pegawai-index.php';</script>";
    }


?>

