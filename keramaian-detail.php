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
            <h1>Halaman Detail Keramaian</h1>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
<?php
          include('koneksi.php');

          $id = $_GET['id']; 
          $data   = mysqli_query($koneksi, "select * from data_keramaian where id = '$id'");
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
              <label>NIK</label>
              <input type="text" name="nik"  class="form-control"  required="" value="<?= $row['nik']; ?>">
            </div>
            <div class="form-group">
              <label>Nama</label>
              <input type="text" name="nama"  class="form-control"  required="" value="<?= $row['nama']; ?>">
            </div>
            
            <div class="form-group">
              <label>No Hp</label>
              <input type="text" name="no_hp"  class="form-control"  required="" value="<?= $row['no_hp']; ?>">
            </div>
            <div class="form-group">
              <label>Acara</label>
              <input type="text" name="acara"  class="form-control"  required="" value="<?= $row['acara']; ?>">
            </div>
            <div class="form-group">
              <label>Lokasi</label>
              <input type="text" name="lokasi"  class="form-control"  required="" value="<?= $row['lokasi']; ?>">
            </div>
            <div class="form-group">
              <label>Perkiraan Keramaian</label>
              <input type="number" name="jumlah_keramaian"  class="form-control"  required="" value="<?= $row['jumlah_keramaian']; ?>">
            </div>
            
            <div class="form-group">
              <label>Tanggal </label>
              <input type="date" name="tanggal"  class="form-control col-sm-2"  required="" value="<?= $row['tanggal']; ?>">
            </div>
            
            <div class="form-group">
              <label>Jam </label>
              <input type="time" name="jam"  class="form-control col-sm-2"  required="" value="<?= $row['jam']; ?>">
            </div>
            <div class="form-group">
              <label>Status</label>
              <select class="form-control  col-sm-4 select2" name="status" >
                <option value="">Pilih Status</option>
                <option value="diizinkan" <?php echo ($row['status'] == 'diizinkan') ? 'selected' : ''; ?>>diizinkan</option>
                <option value="tidak_diizinkan" <?php echo ($row['status'] == 'tidak_diizinkan') ? 'selected' : ''; ?>>tidak diizinkan</option>
              </select>
            </div>
             <div class="form-group">
              <label><a target="_blank" href="assets/gambar/<?= $row['foto_ktp']; ?>">Lihat lampiran KTP</a></label>
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
