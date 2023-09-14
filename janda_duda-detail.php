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
            <h1>Halaman Detail Janda/Duda</h1>
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
          <h3 class="card-title">Detail Data</h3>
        </div>
        <div class="card-body">
          <form action="" method="post" role="form" enctype="multipart/form-data" id="formId">
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