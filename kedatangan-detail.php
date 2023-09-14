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
            <h1>Halaman Detail Kedatangan</h1>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
<?php
          include('koneksi.php');

          $id = $_GET['id']; 
          $data   = mysqli_query($koneksi, "select * from data_kedatangan where id = '$id'");
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
           <!--  <div class="form-group">
              <label>Pilih Penduduk</label>
              <select class="form-control  col-sm-4 select2" name="NIK" disabled="">
                <option value="">Pilih Penduduk</option>
                <?php
                  $datas = mysqli_query($koneksi, "select * from data_kependudukan") or die(mysqli_error($koneksi));
                  while($dt = mysqli_fetch_assoc($datas)) {
                ?> 
                <option value="<?= $dt['NIK']; ?>" <?php echo ($dt['NIK'] == $row['NIK']) ? 'selected' : ''; ?>><?= $dt['Nama'] ?></option>
              <?php } ?>
              </select>
            </div> -->
             <div class="form-group">
              <label>NIK</label>
              <input type="text" name="NIK" required="" class="form-control col-sm-4" value="<?= $row['NIK']; ?>" >
            </div> 
             <div class="form-group">
              <label>Nama</label>
              <input type="text" name="nama" required="" class="form-control col-sm-4" value="<?= $row['nama']; ?>" >
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
              <label>Pekerjaan</label>
              <input type="text" name="pekerjaan"  class="form-control col-sm-4" required=""  value="<?= $row['pekerjaan']; ?>">
            </div>
            <div class="form-group">
              <label>No Surat</label>
              <input type="text" name="No_Surat"  class="form-control"   value="<?= $row['No_Surat']; ?>"  required="">
            </div>
            
            <div class="form-group">
              <label>Alamat Asal</label>
              <input type="text" name="Alamat_Asal"  class="form-control"  required="" value="<?= $row['Alamat_Asal']; ?>">
            </div>
            
            <div class="form-group">
              <label>Alamat Sekarang</label>
              <input type="text" name="Alamat_Sekarang"  class="form-control"  required="" value="<?= $row['Alamat_Sekarang']; ?>">
            </div>
            <div class="form-group">
              <label>Tanggal Kedatangan</label>
              <input type="date" name="Tanggal_Kedatangan"  class="form-control col-sm-2"  required="" value="<?= $row['Tanggal_Kedatangan']; ?>">
            </div>
            
            <div class="form-group">
              <label>Foto Surat Pengantar </label> <a target="_blank" href="assets/gambar/<?= $row['Foto_Surat_Pengantar']; ?>">
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