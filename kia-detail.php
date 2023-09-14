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
            <h1>Halaman Detail Kartu Identitas Anak</h1>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
<?php
          include('koneksi.php');

          $id = $_GET['id']; 
          $data   = mysqli_query($koneksi, "select * from data_kia where id = '$id'");
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
              <label>No Registrasi</label>
              <input type="text" name="no_reg"  class="form-control"  required="" value="<?= $row['no_reg']; ?>" readonly>
            </div>
            <div class="form-group">
              <label>No KK</label>
              <input type="text" name="no_kk"  class="form-control"  required="" autofocus="" value="<?= $row['no_kk']; ?>" >
            </div>
            <div class="form-group">
              <label>Nama Anak</label>
              <input type="text" name="nama_anak"  class="form-control"  required="" value="<?= $row['nama_anak']; ?>" >
            </div>
            <div class="form-group">
              <label>Nik Anak</label>
              <input type="text" name="nik_anak"  class="form-control"  required="" value="<?= $row['nik_anak']; ?>" >
            </div>
            <div class="form-group">
              <label>No. Akta Kelahiran</label>
              <input type="text" name="no_akta"  class="form-control"  required="" value="<?= $row['no_akta']; ?>" >
            </div>
            <div class="form-group">
              <label>Tempat Lahir</label>
              <input type="text" name="tempat_lahir"  class="form-control"  required="" value="<?= $row['tempat_lahir']; ?>" >
            </div>
            <div class="form-group">
              <label>Tanggal Lahir</label>
              <input type="date" name="tgl_lahir"  class="form-control col-sm-2"  required="" value="<?= $row['tgl_lahir']; ?>" >
            </div>
            <div class="form-group">
              <label>Anak Ke-</label>
              <input type="text" name="anak_ke"  class="form-control col-sm-2"  required="" value="<?= $row['anak_ke']; ?>" >
            </div>
            <div class="form-group">
              <label>Gol. Darah</label>
              <input type="text" name="gol_darah"  class="form-control col-sm-2"  required="" value="<?= $row['gol_darah']; ?>" >
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
              <label>Alamat</label>
              <input type="text" name="alamat"  class="form-control"  required="" value="<?= $row['alamat']; ?>">
            </div>
            
            <div class="form-group">
               <label>Foto </label> 
<br>
<a target="_blank" href="assets/gambar/<?= $row['foto']; ?>">
                <img src="assets/gambar/<?= $row['foto']; ?>" style="width: 400px;">
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