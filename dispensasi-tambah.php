<?php
  include('templates/header.php');
  include('templates/sidebar.php');
?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Halaman Tambah Dispensasi Nikah</h1>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">

      <!-- Default box -->
      <div class="card">
        <div class="card-header">
          <h3 class="card-title">Tambah Data</h3>
        </div>
        <div class="card-body">
          <form action="" method="post" role="form" enctype="multipart/form-data">

            <div class="form-group">
              <label>NIK Suami</label>
              <input type="text" name="nik_suami"  class="form-control"  required="">
            </div>
            <div class="form-group">
              <label>Nama Suami</label>
              <input type="text" name="nama_suami"  class="form-control"  required="">
            </div>
            <div class="form-group">
              <label>Pekerjaan Suami</label>
              <input type="text" name="pekerjaan_suami"  class="form-control"  required="">
            </div>
            <div class="form-group">
              <label>NIK Istri</label>
              <input type="text" name="nik_istri"  class="form-control"  required="">
            </div>
            <div class="form-group">
              <label>Nama Istri</label>
              <input type="text" name="nama_istri"  class="form-control"  required="">
            </div>
            <div class="form-group">
              <label>Pekerjaan Istri</label>
              <input type="text" name="pekerjaan_istri"  class="form-control"  required="">
            </div>
            <div class="form-group">
              <label>Tanggal Dispensasi Nikah</label>
              <input type="date" name="tanggal"  class="form-control col-sm-2"  required="">
            </div>
            
            <div class="form-group">
              <label>Keterangan</label>
              <input type="text" name="keterangan"  class="form-control"  required="">
            </div>


            <button type="submit" class="btn btn-primary" name="submit" value="simpan">Simpan data</button>
          </form>
      </div>
    </div>
        <!-- /.card-body -->
      <!-- /.card -->

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
<?php
        
        //melakukan pengecekan jika button submit diklik maka akan menjalankan perintah simpan dibawah ini
        if (isset($_POST['submit'])) {
  include('koneksi.php');
          $user_id = $_SESSION['user_id'];
          $nik_suami = $_POST['nik_suami'];
          $nama_suami = $_POST['nama_suami'];
          $pekerjaan_suami = $_POST['pekerjaan_suami'];
          $nik_istri = $_POST['nik_istri'];
          $nama_istri = $_POST['nama_istri'];
          $pekerjaan_istri = $_POST['pekerjaan_istri'];
          $tanggal = $_POST['tanggal'];
          $keterangan = $_POST['keterangan'];
          $datas = mysqli_query($koneksi, "insert into data_dispensasi (nik_suami,nama_suami,pekerjaan_suami,nik_istri,nama_istri,pekerjaan_istri,tanggal,keterangan,user_id)values('$nik_suami','$nama_suami','$pekerjaan_suami','$nik_istri','$nama_istri','$pekerjaan_istri','$tanggal','$keterangan','$user_id')") or die(mysqli_error($koneksi));
          echo "<script>alert('data berhasil disimpan.');window.location='dispensasi-index.php';</script>";
        }
        ?>
  <?php
    include('templates/footer.php');
  ?>

