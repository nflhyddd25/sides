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
            <h1>Halaman Detail Domisili</h1>
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
          <h3 class="card-title">Detail Data</h3>
        </div>
        <div class="card-body">
          <form action="" method="post" role="form" enctype="multipart/form-data" 
id="formId">
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