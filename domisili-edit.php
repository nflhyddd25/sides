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
            <h1>Halaman Edit Domisili</h1>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
<?php
          include('koneksi.php');

          $id = $_GET['id']; 
          $data   = mysqli_query($koneksi, "select * from data_domisili where id = '$id'");
          $row  = mysqli_fetch_assoc($data);
          ?>
      <!-- Default box -->
      <div class="card">
        <div class="card-header">
          <h3 class="card-title">Edit Data</h3>
        </div>
        <div class="card-body">
          <form action="" method="post" role="form" enctype="multipart/form-data">
             <input type="hidden" name="id" required="" value="<?= $row['id']; ?>">
           <div class="form-group">
              <label>Nama</label>
              <input type="text" name="nama"  class="form-control"  required="" value="<?= $row['nama']; ?>">
            </div>
            <div class="form-group">
              <label>Tempat Lahir</label>
              <input type="text" name="tempat_lahir"  class="form-control"  required="" value="<?= $row['tempat_lahir']; ?>">
            </div>
            <div class="form-group">
              <label>Tanggal Lahir</label>
              <input type="date" name="tgl_lahir"  class="form-control col-sm-2"  required="" value="<?= $row['tgl_lahir']; ?>">
            </div>
            <div class="form-group">
              <label>Agama</label>
               <select class="form-control  col-sm-4" name="agama"  required="">
                <option value="">Pilih</option>
                <option value="Islam" <?php echo ($row['agama'] == 'Islam') ? 'selected' : ''; ?>>Islam</option>
                <option value="Protestan" <?php echo ($row['agama'] == 'Protestan') ? 'selected' : ''; ?>>Protestan</option>
                <option value="Katholik" <?php echo ($row['agama'] == 'Katholik') ? 'selected' : ''; ?>>Katholik</option>
                <option value="Hindu" <?php echo ($row['agama'] == 'Hindu') ? 'selected' : ''; ?>>Hindu</option>
                <option value="Buddha" <?php echo ($row['agama'] == 'Buddha') ? 'selected' : ''; ?>>Buddha</option>
              </select>
            </div>
            <div class="form-group">
              <label>Nama Ayah</label>
              <input type="text" name="ayah"  class="form-control"  required="" value="<?= $row['ayah']; ?>">
            </div>
            <div class="form-group">
              <label>Nama Ibu</label>
              <input type="text" name="ibu"  class="form-control"  required="" value="<?= $row['ibu']; ?>">
            </div>
            <div class="form-group">
              <label>Lama Tinggal (Tahun)</label>
              <input type="number" name="lama"  class="form-control"  required="" value="<?= $row['lama']; ?>">
            </div>
            <div class="form-group">
              <label>Alamat</label>
              <input type="text" name="alamat"  class="form-control"  required="" value="<?= $row['alamat']; ?>">
            </div>
            <div class="form-group">
              <label>Kelurahan</label>
              <input type="text" name="kelurahan"  class="form-control"  required="" value="<?= $row['kelurahan']; ?>">
            </div>
            <div class="form-group">
              <label>Kecamatan</label>
              <input type="text" name="kecamatan"  class="form-control"  required="" value="<?= $row['kecamatan']; ?>">
            </div>
            <?php if($_SESSION['hak_akses'] == 'admin') { ?>
            <div class="form-group">
              <label>Status Validasi</label>
              <select class="form-control  col-sm-4 select2" name="status_data" required="">
                <option value="">Pilih</option>
                <option value="Diajukan" <?php echo ($row['status_data'] == 'Diajukan') ? 'selected' : ''; ?> >Diajukan</option>
                <option value="Proses" <?php echo ($row['status_data'] == 'Proses') ? 'selected' : ''; ?> >Proses</option>
                <option value="Selesai" <?php echo ($row['status_data'] == 'Selesai') ? 'selected' : ''; ?> >Selesai</option>
              </select>
            </div>
             <?php } else { ?>
                <input type="hidden" name="status_data"  value="<?= $row['status_data']; ?>">
             <?php }  ?>
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
          $id = $_POST['id'];
           $nama = $_POST['nama'];
          $tempat_lahir = $_POST['tempat_lahir'];
          $tgl_lahir = $_POST['tgl_lahir'];
          $agama = $_POST['agama'];
          $ayah = $_POST['ayah'];
          $ibu = $_POST['ibu'];
          $lama = $_POST['lama'];
          $alamat = $_POST['alamat'];
          $kelurahan = $_POST['kelurahan'];
          $kecamatan = $_POST['kecamatan'];$status_data = $_POST['status_data'];
         

  $datas = mysqli_query($koneksi, "update data_domisili set status_data ='$status_data',nama = '$nama',tempat_lahir ='$tempat_lahir',tgl_lahir = '$tgl_lahir',agama = '$agama',ayah='$ayah' ,ibu= '$ibu' ,lama='$lama' ,alamat='$alamat' ,kelurahan='$kelurahan',kecamatan='$kecamatan' where id = '$id'") or die(mysqli_error($koneksi));
          echo "<script>alert('data berhasil diubah.');window.location='domisili-index.php';</script>";
        }
        ?>
  <?php
    include('templates/footer.php');
  ?>

