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
            <h1>Halaman Tambah Kelahiran</h1>
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
              <label>NIKS</label>
              <input type="text" name="NIKS"  class="form-control" autofocus="" required="">
            </div>
            <div class="form-group">
              <label>No Surat</label>
              <input type="text" name="No_Surat"  class="form-control"  required="">
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
              <label>Hari Lahir</label>
              <select class="form-control  col-sm-4" name="Hari_Lahir"  required="">
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
              <label>Pukul</label>
              <input type="time" name="Pukul"  class="form-control col-sm-2" required="" >
            </div>
            <div class="form-group">
              <label>Tanggal Lahir</label>
              <input type="date" name="tgl_Lahir"  class="form-control col-sm-2"  required="">
            </div>
            <div class="form-group">
              <label>Anak Ke</label>
              <input type="text" name="Anak_Ke"  class="form-control col-sm-2"  required="">
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
              <label>Tanggal Pendaftaran</label>
              <input type="date" name="Tanggal_Pendaftaran"  class="form-control col-sm-2" required="" >
            </div>
            <div class="form-group">
              <label>Foto KTP Pengantar</label>
              <input type="file" name="Foto_KTP_Pengantar"  class="form-control col-sm-4"  required="">
            </div>
            <div class="form-group">
              <label>Foto KK Pengantar</label>
              <input type="file" name="Foto_KK_Melahirkan"  class="form-control col-sm-4"  required="">
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
          $NIKS = $_POST['NIKS'];$user_id = $_SESSION['user_id'];
          $No_Surat = $_POST['No_Surat'];
          $No_KK = $_POST['No_KK'];
          $Nama = $_POST['Nama'];
          $J_Kelamin = $_POST['J_Kelamin'];
          $Hari_Lahir = $_POST['Hari_Lahir'];
          $tgl_Lahir = $_POST['tgl_Lahir'];
          $Pukul = $_POST['Pukul'];
          $Tempat_Lahir = $_POST['Tempat_Lahir'];
          $Anak_Ke = $_POST['Anak_Ke'];
          $Agama = $_POST['Agama'];
          $Tanggal_Pendaftaran = $_POST['Tanggal_Pendaftaran'];

          $nama_gambar1   = $_FILES['Foto_KTP_Pengantar']['name'];
          $file_tmp1    = $_FILES['Foto_KTP_Pengantar']['tmp_name'];   
          $acak1      = rand(1,99999);
          if($nama_gambar1 != "") {
            $nama_unik1     = $acak1.$nama_gambar1;
            move_uploaded_file($file_tmp1,'assets/gambar/'.$nama_unik1);
          } else {
            $nama_unik1 = NULL;
          }
          $Foto_KTP_Pengantar = $nama_unik1;

          $nama_gambar2   = $_FILES['Foto_KK_Melahirkan']['name'];
          $file_tmp2    = $_FILES['Foto_KK_Melahirkan']['tmp_name'];   
          $acak2      = rand(1,99999);
          if($nama_gambar2 != "") {
            $nama_unik2     = $acak2.$nama_gambar2;
            move_uploaded_file($file_tmp2,'assets/gambar/'.$nama_unik2);
          } else {
            $nama_unik2 = NULL;
          }
          $Foto_KK_Melahirkan = $nama_unik2;

  $datas = mysqli_query($koneksi, "insert into data_kelahiran (NIKS,No_Surat,No_KK,Nama,J_Kelamin,Hari_Lahir,Pukul,Tempat_Lahir,tgl_Lahir,Anak_Ke,Agama,Tanggal_Pendaftaran,Foto_KTP_Pengantar,Foto_KK_Melahirkan,user_id)values('$NIKS','$No_Surat','$No_KK','$Nama','$J_Kelamin','$Hari_Lahir','$Pukul','$Tempat_Lahir','$tgl_Lahir','$Anak_Ke','$Agama','$Tanggal_Pendaftaran','$Foto_KTP_Pengantar','$Foto_KK_Melahirkan','$user_id')") or die(mysqli_error($koneksi));
          echo "<script>alert('data berhasil disimpan.');window.location='kelahiran-index.php';</script>";
        }
        ?>
  <?php
    include('templates/footer.php');
  ?>

