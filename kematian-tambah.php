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
            <h1>Halaman Tambah Kematian</h1>
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
              <input type="text" name="NIK"  class="form-control"  required="">
            </div>
            <div class="form-group">
              <label>Nama</label>
              <input type="text" name="nama"  class="form-control"  required="">
            </div>
            
            <div class="form-group">
              <label>Hari Meninggal</label>
              <select class="form-control  col-sm-4" name="Hari_Meninggal"  required="">
                <option value="">Pilih Hari</option>
                <option value="Senin">Senin</option>
                <option value="Selasa">Selasa</option>
                <option value="Rabu">Rabu</option>
                <option value="Kamis">Kamis</option>
                <option value="Jumat">Jumat</option>
                <option value="Sabtu">Sabtu</option>
                <option value="Minggu">Minggu</option>
              </select>
            </div>
            <div class="form-group">
              <label>Tempat Meninggal</label>
              <input type="text" name="Tempat"  class="form-control"  required="">
            </div>
            <div class="form-group">
              <label>Tanggal </label>
              <input type="date" name="Tgl_Meninggal"  class="form-control col-sm-2"  required="">
            </div>
            
            <div class="form-group">
              <label>Umur</label>
              <input type="text" name="Umur"  class="form-control col-sm-2"  required="">
            </div>
            <div class="form-group">
              <label>Foto Surat Pengantar</label>
              <input type="file" name="Foto_Surat_Pengantar"  class="form-control col-sm-4"  required="">
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
         
                  include('koneksi.php'); //memanggil file koneksi
          //menampung data dari inputan
          $NIK = $_POST['NIK'];
          $nama = $_POST['nama'];
          $Hari_Meninggal = $_POST['Hari_Meninggal'];
          $Tgl_Meninggal = $_POST['Tgl_Meninggal'];
          $Tempat = $_POST['Tempat'];
          $Umur = $_POST['Umur'];
          $user_id = $_SESSION['user_id'];
          $nama_gambar1   = $_FILES['Foto_Surat_Pengantar']['name'];
          $file_tmp1    = $_FILES['Foto_Surat_Pengantar']['tmp_name'];   
          $acak1      = rand(1,99999);
          if($nama_gambar1 != "") {
            $nama_unik1     = $acak1.$nama_gambar1;
            move_uploaded_file($file_tmp1,'assets/gambar/'.$nama_unik1);
          } else {
            $nama_unik1 = NULL;
          }
          $Foto_Surat_Pengantar = $nama_unik1;

  $datas = mysqli_query($koneksi, "insert into data_kematian (NIK,nama,Hari_Meninggal,Tgl_Meninggal,Tempat,Umur,Foto_Surat_Pengantar,user_id)values('$NIK','$nama','$Hari_Meninggal','$Tgl_Meninggal','$Tempat','$Umur','$Foto_Surat_Pengantar','$user_id')") or die(mysqli_error($koneksi));
          echo "<script>alert('data berhasil disimpan.');window.location='kematian-index.php';</script>";
        }
        ?>
  <?php
    include('templates/footer.php');
  ?>

