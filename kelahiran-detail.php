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
            <h1>Halaman Detail Kelahiran</h1>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
<?php
          include('koneksi.php');

          $id = $_GET['id']; 
          $data   = mysqli_query($koneksi, "select * from data_kelahiran where id = '$id'");
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
              <label>NIKS</label>
              <input type="text" name="NIKS"  class="form-control" autofocus="" value="<?= $row['NIKS']; ?>"  required="">
            </div>
            <div class="form-group">
              <label>No Surat</label>
              <input type="text" name="No_Surat"  class="form-control" value="<?= $row['No_Surat']; ?>"  required="">
            </div>
            <div class="form-group">
              <label>No KK</label>
              <input type="text" name="No_KK"  class="form-control" value="<?= $row['No_KK']; ?>"  required="">
            </div>
            <div class="form-group">
              <label>Nama</label>
              <input type="text" name="Nama"  class="form-control" value="<?= $row['Nama']; ?>" required="">
            </div>
            <div class="form-group">
              <label>Jenis Kelamin</label>
              <select class="form-control  col-sm-4" name="J_Kelamin"  required="">
                <option value="">Pilih Jenis Kelamin</option>
                <option value="Pria" <?php echo ($row['J_Kelamin'] == 'Pria') ? 'selected' : ''; ?> >Pria</option>
                <option value="Wanita" <?php echo ($row['J_Kelamin'] == 'Wanita') ? 'selected' : ''; ?> >Wanita</option>
              </select>
            </div>
            <div class="form-group">
              <label>Tempat Lahir</label>
              <input type="text" name="Tempat_Lahir"  class="form-control" value="<?= $row['Tempat_Lahir']; ?>" required="">
            </div>
            <div class="form-group">
              <label>Hari Lahir</label>
              <select class="form-control  col-sm-4" name="Hari_Lahir"  required="">
                <option value="">Pilih Hari</option>
                <option value="Senin" <?php echo ($row['Hari_Lahir'] == 'Senin') ? 'selected' : ''; ?>>Senin</option>
                <option value="Selasa" <?php echo ($row['Hari_Lahir'] == 'Selasa') ? 'selected' : ''; ?>>Selasa</option>
                <option value="Rabu" <?php echo ($row['Hari_Lahir'] == 'Rabu') ? 'selected' : ''; ?>>Rabu</option>
                <option value="Kamis" <?php echo ($row['Hari_Lahir'] == 'Kamis') ? 'selected' : ''; ?>>Kamis</option>
                <option value="Jumat" <?php echo ($row['Hari_Lahir'] == 'Jumat') ? 'selected' : ''; ?>>Jumat</option>
                <option value="Sabtu" <?php echo ($row['Hari_Lahir'] == 'Sabtu') ? 'selected' : ''; ?>>Sabtu</option>
                <option value="Minggu" <?php echo ($row['Hari_Lahir'] == 'Minggu') ? 'selected' : ''; ?>>Minggu</option>
              </select>
            </div>
            <div class="form-group">
              <label>Pukul</label>
              <input type="time" name="Pukul"  class="form-control col-sm-2" value="<?= $row['Pukul']; ?>" required="">
            </div>
            <div class="form-group">
              <label>Tanggal Lahir</label>
              <input type="date" name="tgl_Lahir"  class="form-control col-sm-2" value="<?= $row['tgl_Lahir']; ?>" required="">
            </div>
            <div class="form-group">
              <label>Anak Ke</label>
              <input type="text" name="Anak_Ke"  class="form-control col-sm-2" value="<?= $row['Anak_Ke']; ?>" required="">
            </div>
             <div class="form-group">
              <label>Agama</label>
              <select class="form-control  col-sm-4" name="Agama"  required="">
                <option value="">Pilih</option>
                <option value="Islam" <?php echo ($row['Agama'] == 'Islam') ? 'selected' : ''; ?>>Islam</option>
                <option value="Protestan" <?php echo ($row['Agama'] == 'Protestan') ? 'selected' : ''; ?>>Protestan</option>
                <option value="Katholik" <?php echo ($row['Agama'] == 'Katholik') ? 'selected' : ''; ?>>Katholik</option>
                <option value="Hindu" <?php echo ($row['Agama'] == 'Hindu') ? 'selected' : ''; ?>>Hindu</option>
                <option value="Buddha" <?php echo ($row['Agama'] == 'Buddha') ? 'selected' : ''; ?>>Buddha</option>
              </select>
            </div>
            <div class="form-group">
              <label>Tanggal Pendaftaran</label>
              <input type="date" name="Tanggal_Pendaftaran"  class="form-control col-sm-2" value="<?= $row['Tanggal_Pendaftaran']; ?>"  required="">
            </div>
            <div class="form-group">
              <label>Foto KTP Pengantar </label> <br>
<a target="_blank" href="assets/gambar/<?= $row['Foto_KTP_Pengantar']; ?>">
                <img src="assets/gambar/<?= $row['Foto_KTP_Pengantar']; ?>" style="width: 400px;">
              </a>
            </div>
            <div class="form-group">
              <label>Foto KK Pengantar</label>
              <br>
<a target="_blank" href="assets/gambar/<?= $row['Foto_KK_Melahirkan']; ?>">
                <img src="assets/gambar/<?= $row['Foto_KK_Melahirkan']; ?>" style="width: 400px;">
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