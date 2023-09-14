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
            <h1>Halaman Edit Janda/Duda</h1>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
<?php
          include('koneksi.php');

          $id = $_GET['id']; 
          $data   = mysqli_query($koneksi, "select * from data_janda_duda where id = '$id'");
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
              <label>NIK Suami</label>
              <input type="text" name="nik_suami"  class="form-control"  required="" value="<?= $row['nik_suami']; ?>">
            </div>
            <div class="form-group">
              <label>Nama Suami</label>
              <input type="text" name="nama_suami"  class="form-control"  required="" value="<?= $row['nama_suami']; ?>">
            </div>
            <div class="form-group">
              <label>Pekerjaan Suami</label>
              <input type="text" name="pekerjaan_suami"  class="form-control"  required="" value="<?= $row['pekerjaan_suami']; ?>">
            </div>
            <div class="form-group">
              <label>NIK Istri</label>
              <input type="text" name="nik_istri"  class="form-control"  required="" value="<?= $row['nik_istri']; ?>">
            </div>
            <div class="form-group">
              <label>Nama Istri</label>
              <input type="text" name="nama_istri"  class="form-control"  required="" value="<?= $row['nama_istri']; ?>">
            </div>
            <div class="form-group">
              <label>Pekerjaan Istri</label>
              <input type="text" name="pekerjaan_istri"  class="form-control"  required="" value="<?= $row['pekerjaan_istri']; ?>">
            </div>
            <div class="form-group">
              <label>Tanggal Dispensasi Nikah</label>
              <input type="date" name="tanggal"  class="form-control col-sm-2"  required="" value="<?= $row['tanggal']; ?>">
            </div>
            
            <div class="form-group">
              <label>Keterangan</label>
              <input type="text" name="keterangan"  class="form-control"  required="" value="<?= $row['keterangan']; ?>">
            </div>

            <div class="form-group">
              <label>Status</label>
              <select class="form-control  col-sm-4 select2" name="status" required="">
                <option value="">Pilih</option>
                <option value="janda" <?php echo ($row['status'] == 'janda') ? 'selected' : ''; ?> >Janda</option>
                <option value="duda" <?php echo ($row['status'] == 'duda') ? 'selected' : ''; ?> >Duda</option>
              </select>
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
         
           $nik_suami = $_POST['nik_suami'];
          $nama_suami = $_POST['nama_suami'];
          $pekerjaan_suami = $_POST['pekerjaan_suami'];
          $nik_istri = $_POST['nik_istri'];
          $nama_istri = $_POST['nama_istri'];
          $pekerjaan_istri = $_POST['pekerjaan_istri'];
          $tanggal = $_POST['tanggal'];
          $keterangan = $_POST['keterangan'];
          $status = $_POST['status'];$status_data = $_POST['status_data'];

      $datas = mysqli_query($koneksi, "update data_janda_duda set status_data ='$status_data',
nik_suami ='$nik_suami',nama_suami ='$nama_suami',pekerjaan_suami ='$pekerjaan_suami', nik_istri ='$nik_istri',nama_istri ='$nama_istri',pekerjaan_istri ='$pekerjaan_istri',tanggal ='$tanggal',keterangan = '$keterangan',status = '$status' where id = '$id'") or die(mysqli_error($koneksi));
      echo "<script>alert('data berhasil diubah.');window.location='janda_duda-index.php';</script>";
  }
  ?>
  <?php
    include('templates/footer.php');
  ?>

