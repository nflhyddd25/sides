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
            <h1>Halaman Tambah Kartu Identitas Anak</h1>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
<?php
    include 'koneksi.php';
    $query = mysqli_query($koneksi, "SELECT max(no_reg) as kodeTerbesar FROM data_kia");
    $data = mysqli_fetch_array($query);
    $kode = $data['kodeTerbesar'];
     
    $urutan = (int) substr($kode, 4, 8);
    $urutan++;
     
    $huruf = "KIA-";
    $kode = $huruf . sprintf("%04s", $urutan);
?>
      <!-- Default box -->
      <div class="card">
        <div class="card-header">
          <h3 class="card-title">Tambah Data</h3>
        </div>
        <div class="card-body">
          <form action="" method="post" role="form" enctype="multipart/form-data">
            <div class="form-group">
              <label>No Registrasi</label>
              <input type="text" name="no_reg"  class="form-control"  required="" value="<?= $kode; ?>" readonly>
            </div>
            <div class="form-group">
              <label>No KK</label>
              <input type="text" name="no_kk"  class="form-control"  required="" autofocus="">
            </div>
            <div class="form-group">
              <label>Nama Anak</label>
              <input type="text" name="nama_anak"  class="form-control"  required="">
            </div>
            <div class="form-group">
              <label>Nik Anak</label>
              <input type="text" name="nik_anak"  class="form-control"  required="">
            </div>
            <div class="form-group">
              <label>No. Akta Kelahiran</label>
              <input type="text" name="no_akta"  class="form-control"  required="">
            </div>
            <div class="form-group">
              <label>Tempat Lahir</label>
              <input type="text" name="tempat_lahir"  class="form-control"  required="">
            </div>
            <div class="form-group">
              <label>Tanggal Lahir</label>
              <input type="date" name="tgl_lahir"  class="form-control col-sm-2"  required="">
            </div>
            <div class="form-group">
              <label>Anak Ke-</label>
              <input type="text" name="anak_ke"  class="form-control col-sm-2"  required="">
            </div>
            <div class="form-group">
              <label>Gol. Darah</label>
              <input type="text" name="gol_darah"  class="form-control col-sm-2"  required="">
            </div>
            <div class="form-group">
              <label>Nama Ayah</label>
              <input type="text" name="ayah"  class="form-control"  required="">
            </div>
            <div class="form-group">
              <label>Nama Ibu</label>
              <input type="text" name="ibu"  class="form-control"  required="">
            </div>
            <div class="form-group">
              <label>Alamat</label>
              <input type="text" name="alamat"  class="form-control"  required="">
            </div>
            
            <div class="form-group">
              <label>Foto </label>
              <input type="file" name="foto"  class="form-control col-sm-4"  required="">
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
          //menampung data dari inputan
          $no_reg = $_POST['no_reg'];
          $nik_anak = $_POST['nik_anak'];
          $no_kk = $_POST['no_kk'];
          $nama_anak = $_POST['nama_anak'];
          $no_akta = $_POST['no_akta'];
          $tempat_lahir = $_POST['tempat_lahir'];
          $tgl_lahir = $_POST['tgl_lahir'];
          $alamat = $_POST['alamat'];
          $anak_ke = $_POST['anak_ke'];
          $gol_darah = $_POST['gol_darah'];
          $ayah = $_POST['ayah'];
          $ibu = $_POST['ibu'];
          $user_id = $_SESSION['user_id'];
          $nama_gambar1   = $_FILES['foto']['name'];
          $file_tmp1    = $_FILES['foto']['tmp_name'];   
          $acak1      = rand(1,99999);
          if($nama_gambar1 != "") {
            $nama_unik1     = $acak1.$nama_gambar1;
            move_uploaded_file($file_tmp1,'assets/gambar/'.$nama_unik1);
          } else {
            $nama_unik1 = NULL;
          }
          $foto = $nama_unik1;


  $datas = mysqli_query($koneksi, "insert into data_kia (no_reg,no_kk,nama_anak,no_akta,tempat_lahir,alamat,anak_ke,tgl_lahir,gol_darah,ayah,foto,nik_anak,ibu,user_id)values('$no_reg','$no_kk','$nama_anak','$no_akta','$tempat_lahir','$alamat','$anak_ke','$tgl_lahir','$gol_darah','$ayah','$foto','$nik_anak','$ibu','$user_id')") or die(mysqli_error($koneksi));
   echo "<script>alert('data berhasil disimpan.');window.location='kia-index.php';</script>";
        }
        ?>
  <?php
    include('templates/footer.php');
  ?>

