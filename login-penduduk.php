<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>SI Pengolahan Data Kelurahan Utara</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">

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
<div class="login-box">
  <div class="login-logo">
    
    <img src="assets/gambar/logo.png" style="width: 120px;">
    <br>
    
    <h1 style="font-size: 28px;color: white;">KELURAHAN Utara</h1>
  </div>
  <!-- /.login-logo -->
  <div class="card">
    <div class="card-body login-card-body">
      <p class="login-box-msg text-danger bg-success"><br>LOGIN PENDUDUK</p>

      <form action="" method="post" role="form">
        <div class="input-group mb-3">
          <input type="text" class="form-control" placeholder="ketikkan username.." name="username" required="" autofocus="">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-user"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="password" class="form-control" placeholder="ketikkan password.." name="password" required="">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>
        <div class="row">
          <!-- /.col -->
          <div class="col-12">
            <a href=""  data-toggle="modal" data-target="#modal-1">--> Daftar Penduduk</a>
            <button type="submit" class="btn btn-success float-right " name="submit" value="simpan">Login sekarang!</button>
          </div>
          <!-- /.col -->
        </div>
      </form>
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

<?php
 
include('koneksi.php');

if(isset($_POST['submit'])) {
   session_start();
  $username = $_POST['username'];
  $password = $_POST['password'];

  $result = mysqli_query($koneksi ,"SELECT login_penduduk.* from login_penduduk where username = '$username' and password = '$password' and validasi = '1'");

  $cek = mysqli_num_rows($result);

  if($cek > 0) {
    $data = mysqli_fetch_assoc($result);

      $_SESSION['username'] = $username;
      $_SESSION['status'] = 'sudah_login';
      $_SESSION['user_id'] = $data['id'];
      $_SESSION['hak_akses'] = 'penduduk';
      $_SESSION['nama'] = $data['nama'];
      
      header("location:index.php");
    } else {
      echo "<script>alert('Gagal Login! Username / Password Salah. / Belum Validasi ADMIN');window.location='login-penduduk.php';</script>";
    }
  }
?>


<!-- Modal -->
<div class="modal fade" id="modal-1" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Daftar Penduduk</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      
     <form action="" method="post" role="form" enctype="multipart/form-data">
      <div class="modal-body">
          <div class="row">
            <div class="col-md-6">
            <div class="form-group">
              <label>Nik</label>
              <input type="text" name="nik" required="" class="form-control" autofocus="">
            </div>
          </div>

            <div class="col-md-6">
            <div class="form-group">
              <label>Nama</label>
              <input type="text" name="nama" required="" class="form-control" >
            </div>
            </div>

            <div class="col-md-12">
            <div class="form-group">
              <label>No Hp</label>
              <input type="text" name="hp" required="" class="form-control" >
            </div>
            </div>

            <div class="col-md-12">
            <div class="form-group">
              <label>Alamat</label>
              <input type="text" name="alamat" required="" class="form-control" >
            </div>
            </div>

            <div class="col-md-6">
            <div class="form-group">
              <label>Username</label>
              <input type="text" name="username" required="" class="form-control" >
            </div>
            </div>

            <div class="col-md-6">
            <div class="form-group">
              <label>Password</label>
              <input type="password" name="password" required="" class="form-control" >
            </div>
            </div>
            </div>


      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary" name="simpan-penduduk" value="simpan-penduduk">Submit</button>
      </div>

          </form>

     </form>
    </div>
  </div>
</div>


<?php 
   if (isset($_POST['simpan-penduduk'])) {
          $nik = $_POST['nik'];
          $nama = $_POST['nama'];
          $password = $_POST['password'];
          $hp = $_POST['hp'];
          $alamat = $_POST['alamat'];
          $username = $_POST['username'];
          $validasi = '0';

          $datas = mysqli_query($koneksi, "insert into login_penduduk (nik,nama,password,hp,alamat,username,validasi)values('$nik','$nama','$password','$hp','$alamat','$username','$validasi')") or die(mysqli_error($koneksi));

          echo "<script>alert('data berhasil disimpan. silahkan tunggu verifikasi admin.');window.location='login-penduduk.php';</script>";
   }


?>