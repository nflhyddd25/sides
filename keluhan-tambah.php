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
            <h1>Halaman Tambah Keluhan Masyarakat</h1>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
<?php
 include('koneksi.php'); //memanggil file koneksi
    $query = mysqli_query($koneksi, "SELECT max(no_laporan) as kodeTerbesar FROM data_keluhan");
    $data = mysqli_fetch_array($query);
    $kode = $data['kodeTerbesar'];
     
    $urutan = (int) substr($kode, 1, 4);
    $urutan++;
     
    $huruf = "K";
    $kode = $huruf . sprintf("%04s", $urutan);
?>
      <!-- Default box -->
      <div class="card">
        <div class="card-header">
          <h3 class="card-title">Tambah Data</h3>
        </div>
        <div class="card-body">
           <form method="POST" action=""> 
          <div class="form-group">
              <label>No. Laporan</label>
              <input type="text" name="no_laporan"  class="form-control"  required="" readonly="" value="<?= $kode; ?>"> 
            </div>

            <div class="form-group">
              <label>Nama</label>
              <input type="text" name="nama_pelapor"  class="form-control"  required="" autofocus>
            </div>
            
            <div class="form-group">
              <label>No. Hp</label>
              <input type="text" name="no_hp"  class="form-control"  required="">
            </div>
            
            <div class="form-group">
              <label>Alamat</label>
              <input type="text" name="alamat"  class="form-control"  required="">
            </div>
            <div class="form-group">
              <label>Detail Keluhan</label>
              <textarea class="form-control" name="detail_keluhan" required=""></textarea>
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
         
         $no_laporan = $_POST['no_laporan'];
          $tanggal = date('Y-m-d');
          $detail_keluhan = $_POST['detail_keluhan'];
          $alamat = $_POST['alamat'];
          $status = 'belum_selesai';
          $nama_pelapor = $_POST['nama_pelapor'];
          $no_hp = $_POST['no_hp'];
          $user_id = $_SESSION['user_id'];

          //query untuk menambahkan pegawai ke database, pastikan urutan nya sama dengan di database
          $datas = mysqli_query($koneksi, "insert into data_keluhan (no_laporan,tanggal,detail_keluhan,nama_pelapor,status,no_hp,alamat,user_id)values('$no_laporan','$tanggal','$detail_keluhan','$nama_pelapor','$status','$no_hp','$alamat','$user_id')") or die(mysqli_error($koneksi));
      echo "<script>alert('data berhasil diubah.');window.location='keluhan-index.php';</script>";
  }
  ?>
  <?php
    include('templates/footer.php');
  ?>

