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
            <h1>Halaman Tambah Domisili</h1>
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
              <label>Nama</label>
              <input type="text" name="nama"  class="form-control"  required="">
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
              <label>Agama</label>
              <select class="form-control  col-sm-4" name="agama"  required="">
                <option value="">Pilih</option>
                <option value="Islam">Islam</option>
                <option value="Protestan">Protestan</option>
                <option value="Katholik">Katholik</option>
                <option value="Hindu">Hindu</option>
                <option value="Buddha">Buddha</option>
              </select>
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
              <label>Lama Tinggal (Tahun)</label>
              <input type="number" name="lama"  class="form-control"  required="">
            </div>
            <div class="form-group">
              <label>Alamat</label>
              <input type="text" name="alamat"  class="form-control"  required="">
            </div>
            <div class="form-group">
              <label>Kelurahan</label>
              <input type="text" name="kelurahan"  class="form-control"  required="">
            </div>
            <div class="form-group">
              <label>Kecamatan</label>
              <input type="text" name="kecamatan"  class="form-control"  required="">
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
        if (isset($_POST['submit'])) { include('koneksi.php');
          //menampung data dari inputan
          $nama = $_POST['nama'];
          $tempat_lahir = $_POST['tempat_lahir'];
          $tgl_lahir = $_POST['tgl_lahir'];
          $agama = $_POST['agama'];
          $ayah = $_POST['ayah'];
          $ibu = $_POST['ibu'];
          $lama = $_POST['lama'];
          $alamat = $_POST['alamat'];
          $kelurahan = $_POST['kelurahan'];
          $kecamatan = $_POST['kecamatan'];
          $user_id = $_SESSION['user_id'];
  $datas = mysqli_query($koneksi, "insert into data_domisili (nama,tempat_lahir,tgl_lahir,agama,ayah,ibu,lama,alamat,kelurahan,kecamatan,user_id)values('$nama','$tempat_lahir','$tgl_lahir','$agama','$ayah','$ibu','$lama','$alamat','$kelurahan','$kecamatan','$user_id')") or die(mysqli_error($koneksi));
   echo "<script>alert('data berhasil disimpan.');window.location='domisili-index.php';</script>";
        }
        ?>
  <?php
    include('templates/footer.php');
  ?>

