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
            <h1>Halaman Detail Kependudukan</h1>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
<?php
          include('koneksi.php');

          $id = $_GET['id']; 
          $data   = mysqli_query($koneksi, "select * from data_kependudukan where id = '$id'");
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
              <input type="text" name="NIK"  class="form-control" autofocus="" value="<?= $row['NIK']; ?>"  required="">
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
              <label>Tanggal Lahir</label>
              <input type="date" name="Tanggal_Lahir"  class="form-control col-sm-2"  value="<?= $row['Tanggal_Lahir']; ?>" required="">
            </div>
            <div class="form-group">
              <label>Alamat</label>
              <input type="text" name="Alamat"  class="form-control"  required=""  value="<?= $row['Alamat']; ?>">
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
              <label>Status Kawin</label>
              <select class="form-control  col-sm-4" name="S_Kawin"  required="">
                <option value="">Pilih Status</option>
                <option value="Belum Kawin"  <?php echo ($row['S_Kawin'] == 'Belum Kawin') ? 'selected' : ''; ?>>Belum Kawin</option>
                <option value="Sudah Kawin" <?php echo ($row['S_Kawin'] == 'Sudah Kawin') ? 'selected' : ''; ?>>Sudah Kawin</option>
                <option value="Cerai Hidup" <?php echo ($row['S_Kawin'] == 'Cerai Hidup') ? 'selected' : ''; ?>>Cerai Hidup</option>
                <option value="Cerai Mati" <?php echo ($row['S_Kawin'] == 'Cerai Mati') ? 'selected' : ''; ?>>Cerai Mati</option>
              </select>
            </div>  
            <div class="form-group">
              <label>Pekerjaan</label>
              <input type="text" name="Pekerjaan"  class="form-control col-sm-4" required="" value="<?= $row['Pekerjaan']; ?>">
            </div>
            <div class="form-group">
              <label>Pend. Terakhir</label>
              <select class="form-control  col-sm-4" name="Pen_Terakhir"  required="">
                <option value="">Pilih </option>
                <option value="Tidak Sekolah" <?php echo ($row['Pen_Terakhir'] == 'Tidak Sekolah') ? 'selected' : ''; ?>>Tidak Sekolah</option>
                <option value="TK" <?php echo ($row['Pen_Terakhir'] == 'TK') ? 'selected' : ''; ?>>TK</option>
                <option value="SD" <?php echo ($row['Pen_Terakhir'] == 'SD') ? 'selected' : ''; ?>>SD</option>
                <option value="SMP" <?php echo ($row['Pen_Terakhir'] == 'SMP') ? 'selected' : ''; ?>>SMP</option>
                <option value="SMA" <?php echo ($row['Pen_Terakhir'] == 'SMA') ? 'selected' : ''; ?>>SMA Sederajat</option>
                <option value="S1" <?php echo ($row['Pen_Terakhir'] == 'S1') ? 'selected' : ''; ?>>S1</option>
                <option value="S2" <?php echo ($row['Pen_Terakhir'] == 'S2') ? 'selected' : ''; ?>>S2</option>
                <option value="S3" <?php echo ($row['Pen_Terakhir'] == 'S3') ? 'selected' : ''; ?>>S3</option>
                <option value="dll" <?php echo ($row['Pen_Terakhir'] == 'dll') ? 'selected' : ''; ?>>dll</option>
              </select>
            </div><div class="form-group">
              <label>Kewarganegaraan</label>
              <select class="form-control  col-sm-4" name="Kewarganegaraan"  required="">
                <option value="">Pilih</option>
                <option value="WNI" <?php echo ($row['Kewarganegaraan'] == 'WNI') ? 'selected' : ''; ?>>WNI</option>
                <option value="WNA" <?php echo ($row['Kewarganegaraan'] == 'WNA') ? 'selected' : ''; ?>>WNA</option>
              </select>
            </div>
            <div class="form-group">
              <label>Tidak Mampu?</label>
              <select class="form-control  col-sm-4" name="ket_mampu"  required="">
                <option value="">Pilih</option>
                <option value="mampu" <?php echo ($row['ket_mampu'] == 'mampu') ? 'selected' : ''; ?>>mampu</option>
                <option value="tidak_mampu" <?php echo ($row['ket_mampu'] == 'tidak_mampu') ? 'selected' : ''; ?>>tidak mampu</option>
              </select>
            </div>
            <div class="form-group">
              <label>Tgl Pelaporan</label>
              <input type="date" name="Tgl_Pelaporan"  class="form-control col-sm-2" value="<?= $row['Tgl_Pelaporan']; ?>" >
            </div>
            <div class="form-group">
              <label>Keterangan</label>
              <input type="text" name="Keterangan"  class="form-control"  value="<?= $row['Keterangan']; ?>" >
            </div>
            <div class="form-group">
              <label>Foto KTP Pengantar</label><a target="_blank" href="assets/gambar/<?= $row['Foto_KTP']; ?>">
                <img src="assets/gambar/<?= $row['Foto_KTP']; ?>" style="width: 100px;">
              </a>
            </div>
            <div class="form-group">
              <label>Foto KK Pengantar</label>
              <a target="_blank" href="assets/gambar/<?= $row['Foto_KK']; ?>">
                <img src="assets/gambar/<?= $row['Foto_KK']; ?>" style="width: 100px;">
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
