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
            <h1>Halaman Tambah User</h1>
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
          <form action="" method="post" role="form">

            <div class="form-group">
              <label>Pilih Pegawai</label>
              <select class="form-control  col-sm-4" name="pegawai_id" required="">
                <option value="">Pilih Pegawai</option>
                <?php
                  include('koneksi.php'); //memanggil file koneksi
                  $datas = mysqli_query($koneksi, "select * from data_pegawai WHERE data_pegawai.id NOT IN (SELECT pegawai_id FROM login)") or die(mysqli_error($koneksi));
                  while($row = mysqli_fetch_assoc($datas)) {
                ?> 
                <option value="<?= $row['id'] ?>"><?= $row['Nama'] ?></option>
              <?php } ?>
              </select>
            </div>
            <div class="form-group">
              <label>Username</label>
              <input type="text" name="username" required="" class="form-control" >
            </div>
            <div class="form-group">
              <label>Password</label>
              <input type="password" name="password" required="" class="form-control" >
            </div>
            <div class="form-group">
              <label>Hak Akses</label>
              <select class="form-control  col-sm-4" name="hak_akses" required="">
                <option value="">Pilih Hak Akses</option>
                <option value="admin">admin</option>
                <option value="pimpinan">pimpinan</option>
              </select>
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
        
        if (isset($_POST['submit'])) {
          //menampung data dari inputan
          $hak_akses = $_POST['hak_akses'];
          $username = $_POST['username'];
          $password = $_POST['password'];
          $pegawai_id = $_POST['pegawai_id'];

          $datas = mysqli_query($koneksi, "insert into login (hak_akses,username,password,pegawai_id)values('$hak_akses','$username','$password','$pegawai_id')") or die(mysqli_error($koneksi));

          echo "<script>alert('data berhasil disimpan.');window.location='user-index.php';</script>";
        }
        ?>
  <?php
    include('templates/footer.php');
  ?>

