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
            <h1>Halaman Tambah Ghoib</h1>
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
              <label>NIK</label>
              <input type="text" name="nik"  class="form-control"  required="">
            </div>
            <div class="form-group">
              <label>Nama</label>
              <input type="text" name="nama"  class="form-control"  required="">
            </div>
            <div class="form-group">
              <label>Jenis Kelamin</label>
              <select class="form-control  col-sm-4" name="jenkel"  required="">
                <option value="">Pilih Jenis Kelamin</option>
                <option value="Pria">Pria</option>
                <option value="Wanita">Wanita</option>
              </select>
            </div>
            <div class="form-group">
              <label>Tempat Lahir</label>
              <input type="text" name="tempat_lahir"  class="form-control"  required="">
            </div>
            <div class="form-group">
              <label>Tgl Lahir</label>
              <input type="date" name="tgl_lahir"  class="form-control"  required="">
            </div>
            <div class="form-group">
              <label>Alamat</label>
              <input type="text" name="alamat"  class="form-control"  required="">
            </div>
              <hr>

            <div class="form-group">
              <div class="form-group">
              <label>Keterangan</label>
              <textarea class="textarea" name="keterangan" 
                          style="width: 100%; height: 300px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"></textarea>
            </div>
            </div>
            <div class="form-group">
              <label>Tanggal Berlaku</label>
              <input type="date" name="tgl_berlaku"  class="form-control"  required="">
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
          //menampung data dari inputan
          $tempat_lahir = $_POST['tempat_lahir'];
          $tgl_lahir = $_POST['tgl_lahir'];
          $jenkel = $_POST['jenkel'];
          $alamat = $_POST['alamat'];
          $nik = $_POST['nik'];
          $nama = $_POST['nama'];
          $keterangan = $_POST['keterangan'];
          $tgl_berlaku = $_POST['tgl_berlaku'];
          $user_id = $_SESSION['user_id'];

          
  $datas = mysqli_query($koneksi, "insert into data_ghoib (tempat_lahir,tgl_lahir,jenkel,alamat,nik,keterangan,user_id,nama,tgl_berlaku)values('$tempat_lahir','$tgl_lahir','$jenkel','$alamat','$nik','$keterangan','$user_id','$nama','$tgl_berlaku')") or die(mysqli_error($koneksi));
          echo "<script>alert('data berhasil disimpan.');window.location='ghoib-index.php';</script>";
        }
        ?>
  <?php
    include('templates/footer.php');
  ?>

