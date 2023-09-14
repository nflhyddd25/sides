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
            <h1>Halaman Detail Keluhan Masyarakat</h1>
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
          <h3 class="card-title">Detail Data</h3>
        </div>
        <div class="card-body">
          <form action="" method="post" role="form" enctype="multipart/form-data" id="formId">
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
    include('templates/footer.php');
  ?>

<script type="text/javascript">
  var form  = document.getElementById("formId");
var allElements = form.elements;
for (var i = 0, l = allElements.length; i < l; ++i) {
    // allElements[i].readOnly = true;
       allElements[i].disabled=true;
}
</script>

