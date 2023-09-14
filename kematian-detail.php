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
            <h1>Halaman Detail Kematian</h1>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
<?php
          include('koneksi.php');

          $id = $_GET['id']; 
          $data   = mysqli_query($koneksi, "select * from data_kematian where id = '$id'");
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
              <label>NIK</label>
              <input type="text" name="NIK"  class="form-control"  required="" value="<?= $row['NIK']; ?>">
            </div>
            <div class="form-group">
              <label>Nama</label>
              <input type="text" name="nama"  class="form-control"  required="" value="<?= $row['nama']; ?>">
            </div>
            
            
            <div class="form-group">
              <label>Hari Meninggal</label>
              <select class="form-control  col-sm-4" name="Hari_Meninggal"  required="">
                <option value="">Pilih Hari</option>
                <option value="Senin" <?php echo ($row['Hari_Meninggal'] == 'Senin') ? 'selected' : ''; ?>>Senin</option>
                <option value="Selasa" <?php echo ($row['Hari_Meninggal'] == 'Selasa') ? 'selected' : ''; ?>>Selasa</option>
                <option value="Rabu" <?php echo ($row['Hari_Meninggal'] == 'Rabu') ? 'selected' : ''; ?>>Rabu</option>
                <option value="Kamis" <?php echo ($row['Hari_Meninggal'] == 'Kamis') ? 'selected' : ''; ?>>Kamis</option>
                <option value="Jumat" <?php echo ($row['Hari_Meninggal'] == 'Jumat') ? 'selected' : ''; ?>>Jumat</option>
                <option value="Sabtu" <?php echo ($row['Hari_Meninggal'] == 'Sabtu') ? 'selected' : ''; ?>>Sabtu</option>
                <option value="Minggu" <?php echo ($row['Hari_Meninggal'] == 'Minggu') ? 'selected' : ''; ?>>Minggu</option>
              </select>
            </div>
            <div class="form-group">
              <label>Tempat Meninggal</label>
              <input type="text" name="Tempat"  class="form-control"  required="" value="<?= $row['Tempat']; ?>">
            </div>
            <div class="form-group">
              <label>Tanggal </label>
              <input type="date" name="Tgl_Meninggal"  class="form-control col-sm-2"  required="" value="<?= $row['Tgl_Meninggal']; ?>">
            </div>
            
            <div class="form-group">
              <label>Umur</label>
              <input type="text" name="Umur"  class="form-control col-sm-2"  required="" value="<?= $row['Umur']; ?>">
            </div>
            <div class="form-group">
              <label>Foto Surat Pengantar </label> 
              <br>
                <a target="_blank" href="assets/gambar/<?= $row['Foto_Surat_Pengantar']; ?>">
                <img src="assets/gambar/<?= $row['Foto_Surat_Pengantar']; ?>" style="width: 400px;">
              </a>
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
