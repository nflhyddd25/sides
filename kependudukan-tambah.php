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
            <h1>Halaman Tambah Kependudukan</h1>
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
              <input type="text" name="NIK"  class="form-control" autofocus="" required="">
            </div>
            <div class="form-group">
              <label>No KK</label>
              <input type="text" name="No_KK"  class="form-control"  required="">
            </div>
            <div class="form-group">
              <label>Nama</label>
              <input type="text" name="Nama"  class="form-control"  required="">
            </div>
            <div class="form-group">
              <label>Jenis Kelamin</label>
              <select class="form-control  col-sm-4" name="J_Kelamin"  required="">
                <option value="">Pilih Jenis Kelamin</option>
                <option value="Pria">Pria</option>
                <option value="Wanita">Wanita</option>
              </select>
            </div>
            <div class="form-group">
              <label>Tempat Lahir</label>
              <input type="text" name="Tempat_Lahir"  class="form-control"  required="">
            </div>
            <div class="form-group">
              <label>Tanggal Lahir</label>
              <input type="date" name="Tanggal_Lahir"  class="form-control col-sm-2"  required="">
            </div>
            <div class="form-group">
              <label>Alamat</label>
              <input type="text" name="Alamat"  class="form-control"  required="">
            </div>
            <div class="form-group">
              <label>Agama</label>
              <select class="form-control  col-sm-4" name="Agama"  required="">
                <option value="">Pilih</option>
                <option value="Islam">Islam</option>
                <option value="Protestan">Protestan</option>
                <option value="Katholik">Katholik</option>
                <option value="Hindu">Hindu</option>
                <option value="Buddha">Buddha</option>
              </select>
            </div>
            <div class="form-group">
              <label>Status Kawin</label>
              <select class="form-control  col-sm-4" name="S_Kawin"  required="">
                <option value="">Pilih Status</option>
                <option value="Belum Kawin">Belum Kawin</option>
                <option value="Sudah Kawin">Sudah Kawin</option>
                <option value="Cerai Hidup">Cerai Hidup</option>
                <option value="Cerai Mati">Cerai Mati</option>
              </select>
            </div>
            
            <div class="form-group">
              <label>Pekerjaan</label>
              <input type="text" name="Pekerjaan"  class="form-control col-sm-4" required="" >
            </div>
            <div class="form-group">
              <label>Pend. Terakhir</label>
              <select class="form-control  col-sm-4" name="Pen_Terakhir"  required="">
                <option value="">Pilih </option>
                <option value="Tidak Sekolah">Tidak Sekolah</option>
                <option value="TK">TK</option>
                <option value="SD">SD</option>
                <option value="SMP">SMP</option>
                <option value="SMA Sederajat">SMA Sederajat</option>
                <option value="S1">S1</option>
                <option value="S2">S2</option>
                <option value="S3">S3</option>
                <option value="dll">dll</option>
              </select>
            </div>
            <div class="form-group">
              <label>Kewarganegaraan</label>
              <select class="form-control  col-sm-4" name="Kewarganegaraan"  required="">
                <option value="">Pilih</option>
                <option value="WNI">WNI</option>
                <option value="WNA">WNA</option>
              </select>
            </div>
            <div class="form-group">
              <label>Tgl Pelaporan</label>
              <input type="date" name="Tgl_Pelaporan"  class="form-control col-sm-2"  >
            </div>
            <div class="form-group">
              <label>Keterangan</label>
              <input type="text" name="Keterangan"  class="form-control"  >
            </div>

            <div class="form-group">
              <label>Tidak Mampu?</label>
              <select class="form-control  col-sm-4" name="ket_mampu"  required="">
                <option value="">Pilih</option>
                <option value="mampu">mampu</option>
                <option value="tidak_mampu">tidak mampu</option>
              </select>
            </div>
            <div class="form-group">
              <label>Foto KTP </label>
              <input type="file" name="Foto_KTP"  class="form-control col-sm-4"  required="">
            </div>
            <div class="form-group">
              <label>Foto KK </label>
              <input type="file" name="Foto_KK"  class="form-control col-sm-4"  required="">
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
            include 'koneksi.php';
          //menampung data dari inputan
          $NIK = $_POST['NIK'];
          $No_KK = $_POST['No_KK'];
          $Nama = $_POST['Nama'];
          $J_Kelamin = $_POST['J_Kelamin'];
          $Tempat_Lahir = $_POST['Tempat_Lahir'];
          $Tanggal_Lahir = $_POST['Tanggal_Lahir'];
          $Alamat = $_POST['Alamat'];
          $Agama = $_POST['Agama'];
          $S_Kawin = $_POST['S_Kawin'];
          $Pekerjaan = $_POST['Pekerjaan'];
          $Pen_Terakhir = $_POST['Pen_Terakhir'];
          $Kewarganegaraan = $_POST['Kewarganegaraan'];
          $Tgl_Pelaporan = $_POST['Tgl_Pelaporan'];
          $Keterangan = $_POST['Keterangan'];
          $ket_mampu = $_POST['ket_mampu'];

          $nama_gambar1   = $_FILES['Foto_KTP']['name'];
          $file_tmp1    = $_FILES['Foto_KTP']['tmp_name'];   
          $acak1      = rand(1,99999);
          if($nama_gambar1 != "") {
            $nama_unik1     = $acak1.$nama_gambar1;
            move_uploaded_file($file_tmp1,'assets/gambar/'.$nama_unik1);
          } else {
            $nama_unik1 = NULL;
          }
          $Foto_KTP = $nama_unik1;

          $nama_gambar2   = $_FILES['Foto_KK']['name'];
          $file_tmp2    = $_FILES['Foto_KK']['tmp_name'];   
          $acak2      = rand(1,99999);
          if($nama_gambar2 != "") {
            $nama_unik2     = $acak2.$nama_gambar2;
            move_uploaded_file($file_tmp2,'assets/gambar/'.$nama_unik2);
          } else {
            $nama_unik2 = NULL;
          }
          $Foto_KK = $nama_unik2;

  $datas = mysqli_query($koneksi, "insert into data_kependudukan (NIK,No_KK,Nama,J_Kelamin,Tempat_Lahir,Alamat,Agama,Tanggal_Lahir,S_Kawin,Pekerjaan,Pen_Terakhir,Kewarganegaraan,Tgl_Pelaporan,Keterangan,Foto_KTP,Foto_KK,ket_mampu)values('$NIK','$No_KK','$Nama','$J_Kelamin','$Tempat_Lahir','$Alamat','$Agama','$Tanggal_Lahir','$S_Kawin','$Pekerjaan','$Pen_Terakhir','$Kewarganegaraan','$Tgl_Pelaporan','$Keterangan','$Foto_KTP','$Foto_KK','$ket_mampu')") or die(mysqli_error($koneksi));
          echo "<script>alert('data berhasil disimpan.');window.location='kependudukan-index.php';</script>";
        }
        ?>
  <?php
    include('templates/footer.php');
  ?>

