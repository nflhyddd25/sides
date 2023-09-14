
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>SI Pengolahan Data Kelurahan Utara</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="./assets/gambar/logo.png" rel="icon">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="./assets/plugins/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="./assets/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="./assets/dist/css/adminlte.min.css">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
</head>
<body class="hold-transition login-page" style="background: url('assets/gambar/a.jpg');background-size: 100% 120%; background-repeat: no-repeat;">
<div class="login-bosx">
  <div class="login-logo">
    
    <img src="assets/gambar/logo.png" style="width: 120px;">
    <br>
    
    <h1 style="font-size: 28px;color: white;">KELURAHAN Utara</h1>
  </div>
  <!-- /.login-logo -->
  <div class="card">
    <div class="card-body ldy text-center">
    
      <a class="btn btn-app " href="#" data-toggle="modal" data-target="#modal-data-keluhan">
                  <i class="fas fa-info"></i> Lihat Keluhan
                </a>
     <!-- <a class="btn btn-app bg-primary" href="#" data-toggle="modal" data-target="#modal-lapor">
                  <i class="fas fa-plus"></i> Lapor Keluhan Masyarakat
                </a> -->
      <a class="btn btn-app bg-success " href="login-penduduk.php">
                  <i class="fas fa-user"></i> Login Penduduk
                </a>
                   <a class="btn btn-app bg-primary" href="login.php">
                  <i class="fas fa-user"></i> Login Admin
                </a>
    </div>
    <!-- /.login-card-body -->
  </div>
  <div class="row">
        <div class="col-sm-12">
          
        </div>
      </div>
</div>
<!-- /.login-box -->

<!-- jQuery -->
<script src="./assets/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="./assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="./assets/dist/js/adminlte.min.js"></script>

</body>
</html>

<!-- Modal -->
<div class="modal fade" id="modal-data-keluhan" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Data Keluhan Masyarakat</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
            <div class="table-responsive">
        <table class="table table-bordered no-wrap" style="white-space: nowrap;"  id="example2">
          <thead>
            <tr>
              <th>No Laporan</th>
              <th>Tanggal</th>
              <th>Nama Pelapor</th>
              <th>Detail Keluhan</th>
              <th>Status</th>
            </tr>
          </thead>
          <tbody>
            <?php
              include('koneksi.php'); //memanggil file koneksi
              $datas = mysqli_query($koneksi, "select * from data_keluhan") or die(mysqli_error($koneksi));

              $no = 1;//untuk pengurutan nomor

              //melakukan perulangan
              while($row = mysqli_fetch_assoc($datas)) {
            ?>  

          <tr style="white-space: nowrap !important;">
            <td><?= $row['no_laporan']; ?></td>
            <td><?= format_tanggal($row['tanggal']); ?></td>
            <td><?= $row['nama_pelapor']; ?></td>
            <td><?= $row['detail_keluhan']; ?></td>
            <td><?= $row['status']; ?></td>
          </tr>

            <?php $no++; } ?>
          </tbody>
        </table>
      </div>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>

    </div>
  </div>
</div>

<!-- Modal -->
<div class="modal fade" id="modal-lapor" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Lapor Keluhan Masyarakat</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
<?php
    $query = mysqli_query($koneksi, "SELECT max(no_laporan) as kodeTerbesar FROM data_keluhan");
    $data = mysqli_fetch_array($query);
    $kode = $data['kodeTerbesar'];
     
    $urutan = (int) substr($kode, 1, 4);
    $urutan++;
     
    $huruf = "K";
    $kode = $huruf . sprintf("%04s", $urutan);
?>
     <form method="POST" action="">
      <div class="modal-body">
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

            
            

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary" name="submit" value="submit">Submit</button>
      </div>

     </form>
    </div>
  </div>
</div>

<?php
        
        //melakukan pengecekan jika button submit diklik maka akan menjalankan perintah simpan dibawah ini
        if (isset($_POST['submit'])) {
          //menampung data dari inputan
          $no_laporan = $_POST['no_laporan'];
          $tanggal = date('Y-m-d');
          $detail_keluhan = $_POST['detail_keluhan'];
          $alamat = $_POST['alamat'];
          $status = 'belum_selesai';
          $nama_pelapor = $_POST['nama_pelapor'];
          $no_hp = $_POST['no_hp'];


          //query untuk menambahkan pegawai ke database, pastikan urutan nya sama dengan di database
          $datas = mysqli_query($koneksi, "insert into data_keluhan (no_laporan,tanggal,detail_keluhan,nama_pelapor,status,no_hp,alamat)values('$no_laporan','$tanggal','$detail_keluhan','$nama_pelapor','$status','$no_hp','$alamat')") or die(mysqli_error($koneksi));
          //id pegawai tidak dimasukkan, karena sudah menggunakan AUTO_INCREMENT, id akan otomatis

          //ini untuk menampilkan alert berhasil dan redirect ke halaman index
          echo "<script>alert('Laporan berhasil ditambah. Harap catat no laporan berikut : $no_laporan');window.location='utama.php';</script>";
        }
        ?>