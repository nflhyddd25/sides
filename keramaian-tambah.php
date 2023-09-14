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
            <h1>Halaman Tambah Keramaian</h1>
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
              <label>No Hp</label>
              <input type="text" name="no_hp"  class="form-control"  required="">
            </div>
            <div class="form-group">
              <label>Acara</label>
              <input type="text" name="acara"  class="form-control"  required="">
            </div>
            <div class="form-group">
              <label>Lokasi</label>
              <input type="text" name="lokasi"  class="form-control"  required="">
            </div>
            <div class="form-group">
              <label>Perkiraan Keramaian</label>
              <input type="number" name="jumlah_keramaian"  class="form-control"  required="">
            </div>
            
            <div class="form-group">
              <label>Tanggal </label>
              <input type="date" name="tanggal"  class="form-control col-sm-2"  required="">
            </div>
            
            <div class="form-group">
              <label>Jam </label>
              <input type="time" name="jam"  class="form-control col-sm-2"  required="">
            </div>
            
            <div class="form-group">
              <label>Foto KTP </label>
              <input type="file" name="foto_ktp"  class="form-control col-sm-4"  required="">
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
          $acara = $_POST['acara'];
          $tanggal = $_POST['tanggal'];
          $jam = $_POST['jam'];
          $lokasi = $_POST['lokasi'];
          $nik = $_POST['nik'];
          $nama = $_POST['nama'];
          $no_hp = $_POST['no_hp'];
          $user_id = $_SESSION['user_id'];
          $jumlah_keramaian = $_SESSION['jumlah_keramaian'];



          $nama_gambar1   = $_FILES['foto_ktp']['name'];
          $file_tmp1    = $_FILES['foto_ktp']['tmp_name'];   
          $acak1      = rand(1,99999);
          if($nama_gambar1 != "") {
            $nama_unik1     = $acak1.$nama_gambar1;
            move_uploaded_file($file_tmp1,'assets/gambar/'.$nama_unik1);
          } else {
            $nama_unik1 = NULL;
          }
          $foto_ktp = $nama_unik1;
          
  $datas = mysqli_query($koneksi, "insert into data_keramaian (acara,tanggal,jam,lokasi,nik,no_hp,user_id,nama,jumlah_keramaian,foto_ktp)values('$acara','$tanggal','$jam','$lokasi','$nik','$no_hp','$user_id','$nama','$jumlah_keramaian','$foto_ktp')") or die(mysqli_error($koneksi));
          echo "<script>alert('data berhasil disimpan.');window.location='keramaian-index.php';</script>";
        }
        ?>
  <?php
    include('templates/footer.php');
  ?>

