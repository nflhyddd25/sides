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
            <h1>Halaman Edit Keluhan Masyarakat</h1>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
<?php
          include('koneksi.php');

          $id = $_GET['id']; 
          $data   = mysqli_query($koneksi, "select * from data_keluhan where id = '$id'");
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
              <label>No. Laporan</label>
              <input type="text" name="no_laporan"  class="form-control"  required="" readonly="" value="<?= $row['no_laporan']; ?>"> 
            </div>

            <div class="form-group">
              <label>Tanggal</label>
              <input type="date" name="tanggal"  class="form-control col-sm-2"  required="" value="<?= $row['tanggal']; ?>">
            </div>
            

            <div class="form-group">
              <label>Nama</label>
              <input type="text" name="nama_pelapor"  class="form-control"  required="" autofocus value="<?= $row['nama_pelapor']; ?>">
            </div>
            
            <div class="form-group">
              <label>No. Hp</label>
              <input type="text" name="no_hp"  class="form-control"  required="" value="<?= $row['no_hp']; ?>">
            </div>
            
            <div class="form-group">
              <label>Alamat</label>
              <input type="text" name="alamat"  class="form-control"  required="" value="<?= $row['alamat']; ?>">
            </div>
            <div class="form-group">
              <label>Detail Keluhan</label>
              <textarea class="form-control" name="detail_keluhan" required=""><?= $row['detail_keluhan']; ?></textarea>
            </div>

            <div class="form-group">
              <label>Status</label>
              <select class="form-control  col-sm-4 select2" name="status" required="">
                <option value="">Pilih</option>
                <option value="belum_selesai" <?php echo ($row['status'] == 'belum_selesai') ? 'selected' : ''; ?> >belum selesai</option>
                <option value="sudah_selesai" <?php echo ($row['status'] == 'sudah_selesai') ? 'selected' : ''; ?> >sudah selesai</option>
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
          $tanggal = $_POST['tanggal'];
          $detail_keluhan = $_POST['detail_keluhan'];
          $alamat = $_POST['alamat'];
          $status = $_POST['status'];
          $nama_pelapor = $_POST['nama_pelapor'];
          $no_hp = $_POST['no_hp'];$status_data = $_POST['status_data'];

      $datas = mysqli_query($koneksi, "update data_keluhan set status_data ='$status_data',tanggal ='$tanggal',detail_keluhan ='$detail_keluhan',alamat = '$alamat',status = '$status',no_hp = '$no_hp',nama_pelapor = '$nama_pelapor' where id = '$id'") or die(mysqli_error($koneksi));
      echo "<script>alert('data berhasil diubah.');window.location='keluhan-index.php';</script>";
  }
  ?>
  <?php
    include('templates/footer.php');
  ?>

